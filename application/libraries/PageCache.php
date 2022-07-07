<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageCache
{
    protected $_CI;
    protected $_base_path;

    public function __construct()
    {
        $this->_CI = &get_instance();
        $this->_base_path = config_item('cache_path') . 'page/';
    }

    /**
     * 페이지 캐시파일 생성 및 로드
     * @param int $ttl [리프레시시간(초단위, 기본값 10분, 0일 경우 리프레시 안함)]
     * @param null|string $url [캐시파일생성대상URL]
     * @param null|string $file_path [캐시파일하위경로]
     * @return false|void
     */
    public function cache($ttl = 600, $url = null, $file_path = null)
    {
        // 에이전트 체크
        $user_agent = $this->_CI->input->get_request_header('User-Agent');
        if (strpos($user_agent, 'PHP-Curl-Class') !== false) {
            return false;
        }

        // 캐시파일 생성
        if (empty($url) === true) {
            $current_url = ltrim(preg_replace('#^(https?://)#i', '', current_url()), '//');     // https:// 제거
            $url = (is_https() === true ? 'https' : 'http') . '://' . $current_url;
        }

        if (empty($file_path) === true) {
            $file_path = $this->getBaseFileName($url);
        }
        $real_path = $this->getRealPath($file_path);

        if (file_exists($real_path) === false) {
            if ($this->create($url, $file_path) === false) {
                return false;
            }
        }

        if ($ttl > 0) {
            // 리프레시 시간이 초과했을 경우 재생성
            $life_time = time() - filemtime($real_path);
            if ($ttl < $life_time) {
                if ($this->create($url, $file_path) === false) {
                    return false;
                }
            }
        }

        // 캐시파일 로드
        $this->load($real_path, true);
    }

    /**
     * 페이지 캐시파일 생성
     * @param string $url [캐시파일생성대상URL]
     * @param null|string $file_path [캐시파일하위경로]
     * @return false|string
     */
    public function create($url, $file_path = null)
    {
        $this->_CI->load->library('curl');
        $this->_CI->load->helper('file');

        try {
            $cache_path = $this->_base_path;

            // URL 연결
            $this->_CI->curl->setHeader('Content-Type', 'application/x-www-form-urlencoded');
            $this->_CI->curl->setCookies($this->_CI->input->cookie());
            $this->_CI->curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $this->_CI->curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
            $this->_CI->curl->setOpt(CURLOPT_RETURNTRANSFER, true);
            $this->_CI->curl->setOpt(CURLOPT_FAILONERROR, false);
            $this->_CI->curl->setOpt(CURLOPT_TIMEOUT, 10);
            $this->_CI->curl->get($url);
            $response = $this->_CI->curl->rawResponse;

            if ($this->_CI->curl->error === true) {
                throw new \Exception('[PageCache] ' . $this->_CI->curl->errorMessage);
            }

            if (empty($file_path) === true) {
                // 캐시파일 디폴트 파일명
                $file_name = $this->getBaseFileName($url);
            } else {
                // 캐시파일 서브 디렉토리 생성
                $path_info = pathinfo(ltrim($file_path, '/'));
                $file_name = $path_info['basename'];

                if ($path_info['dirname'] != '.') {
                    $cache_path .= $path_info['dirname'] . '/';
                    $is_created_dir = $this->_createDir($cache_path);
                    if ($is_created_dir !== true) {
                        throw new \Exception('[PageCache] Unable to create directory (' . $cache_path . ')');
                    }
                }
            }

            // 캐시파일 디렉토리 쓰기 가능여부 확인
            if (is_dir($cache_path) === false || is_really_writable($cache_path) === false) {
                throw new \Exception('[PageCache] Unable to write cache file (' . $cache_path . ')');
            }

            // 캐시파일 생성
            $cache_file = $cache_path . $file_name;
            if (write_file($cache_file, $response, 'wb') === false) {
                throw new \Exception('[PageCache] Unable to write cache file (' . $cache_file . ')');
            }
            chmod($cache_file, 0640);

            return $cache_file;
        } catch (\Exception $e) {
            log_message('ERROR', $e->getMessage());
            return false;
        } finally {
            $this->_CI->curl->close();
        }
    }

    /**
     * 페이지 캐시파일 삭제
     * @param null|string $file_path [캐시파일하위경로]
     * @param null|string $url [캐시파일생성대상URL]
     * @return bool
     */
    public function remove($file_path = null, $url = null)
    {
        // 실제 캐시파일 경로
        if (empty($file_path) === true) {
            if (empty($url) === true) {
                $url = current_url();
            }
            $file_path = $this->getBaseFileName($url);
        }
        $file_path = $this->getRealPath($file_path);

        // 캐시파일 삭제
        if (file_exists($file_path)) {
            return @unlink($file_path);
        }

        return false;
    }

    /**
     * 페이지 캐시파일 로드
     * @param string $file_path [캐시파일하위경로]
     * @param bool $is_real_path [캐시파일실제경로여부]
     */
    public function load($file_path, $is_real_path = false)
    {
        if ($is_real_path === false) {
            $file_path = $this->getRealPath($file_path);
        }

        $this->_CI->load->file($file_path);
    }

    /**
     * 페이지 캐시파일 실제경로 리턴
     * @param string $file_path [캐시파일하위경로]
     * @return string
     */
    public function getRealPath($file_path)
    {
        return $this->_base_path . ltrim($file_path, '/');
    }

    /**
     * 페이지 캐시파일 디폴트 파일명 리턴
     * @param string $url [캐시파일생성대상URL]
     * @return string
     */
    public function getBaseFileName($url)
    {
        $parse_url = parse_url($url);
        return md5($parse_url['host'] . $parse_url['path']) . '.php';
    }

    /**
     * 페이지 캐시파일 하위 디렉토리 생성
     * @param string $dir
     * @return bool|string
     */
    private function _createDir($dir)
    {
        try {
            if (is_dir($dir) === false && is_null($dir) === false) {
                if (mkdir($dir, 0707, true) === false) {
                    throw new \Exception(sprintf('디렉토리 생성에 실패했습니다. (%s)', $dir));
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
