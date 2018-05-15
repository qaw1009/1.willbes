<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_Upload extends CI_Upload
{
    // 업로드 파일 경로
    public $_upload_path = '';
    // 업로드 파일 URL
    public $_upload_url = '';

    // 파일업로드 유형에 따른 디폴트 설정
    protected $_rules = [
        'img' => 'allowed_types:gif|jpg|jpeg|png|bmp',
        'file' => 'allowed_types:gif|jpg|jpeg|png|bmp|pdf|doc|docx|xls|xlsx|ppt|pptx|txt|hwp|mp3|zip',
    ];

    public function __construct(array $config = array())
    {
        // 디폴트 파일경로, URL 설정
        $this->_upload_path = element('upload_path', $config, STORAGEPATH . 'uploads/');
        $this->_upload_url = element('upload_url', $config, PUBLICURL . 'uploads/');

        parent::__construct($config);
    }

    /**
     * 파일 업로드 (멀티 업로드일 경우 1개의 파일이 업로드 실패할 경우 이전 성공한 업로드 파일 자동 삭제)
     * @param string $upload_type 업로드 파일 유형, img|file ...
     * @param array|string $input_names input file name
     * @param array|string $file_names 저장할 파일명 배열, 값이 없을 경우 원래 파일명 사용, 중복일 경우 파일명에 `(숫자)` 붙음
     * @param null|string $sub_dir 기본 업로드 디렉토리 하위 디렉토리 경로
     * @param null|string $rule 파일 업로드 설정, 기본 설정과 중복일 경우 추가 설정 우선, 추가 설정별로 쉼표(,)로 구분 (참조 : https://codeigniter.com/user_guide/libraries/file_uploading.html#setting-preferences)
     * @return array|string
     */
    public function uploadFile($upload_type = 'img', $input_names = [], $file_names = [], $sub_dir = null, $rule = null)
    {
        $results = [];

        try {
            // 업로드 파일이 없을 경우 리턴
            if ($this->_isEmptyFiles() === true) {
                return $results;
            }
            
            // 파일명이 배열이 아닐 경우 배열로 형변환
            empty($file_names) === true && $file_names = [];
            is_array($file_names) === false && $file_names = (array) $file_names;

            // 파일 업로드 환경설정 셋팅
            $config = [];
            $rule = (is_null($rule) === false) ? element($upload_type, $this->_rules, '') . ',' . $rule : element($upload_type, $this->_rules, '');
            $rules = explode(',', $rule);
            if (count($rules) > 0) {
                foreach ($rules as $val) {
                    if (empty($val) === false) {
                        $_key = substr($val, 0, strpos($val, ':'));
                        $_val = strtolower(substr($val, strpos($val, ':') + 1));
                        $config[$_key] = (in_array($_val, ['true', 'false']) === true) ? filter_var($_val, FILTER_VALIDATE_BOOLEAN) : $_val;
                    }
                }
            }

            // 파일명이 존재한다면 overwrite -> true
            if (empty($file_names) === false && isset($config['overwrite']) === false) {
                $config['overwrite'] = true;
            }

            // 파일 업로드 경로 설정 및 디렉토리 생성
            empty($sub_dir) === false && $config['upload_path'] = $this->upload_path . $sub_dir;
            $is_created = $this->_createDir($config['upload_path']);
            if ($is_created !== true) {
                throw new \Exception($is_created);
            }

            // 파일 업로드
            $input_files = $_FILES;
            $idx = 0;
            foreach ((array) $input_names as $input_name) {
                $results[$idx] = [];

                if (isset($input_files[$input_name]) === true) {
                    foreach ((array) $input_files[$input_name]['size'] as $sidx => $tmp_size) {
                        if (empty($tmp_size) === false) {
                            $config['file_name'] = (isset($file_names[$idx]) === true) ? $file_names[$idx] : '';
                            // 파일 업로드 설정 적용
                            $this->initialize($config, false);

                            $_FILES[$input_name]['name'] = ((array) $input_files[$input_name]['name'])[$sidx];
                            $_FILES[$input_name]['type'] = ((array) $input_files[$input_name]['type'])[$sidx];
                            $_FILES[$input_name]['tmp_name'] = ((array) $input_files[$input_name]['tmp_name'])[$sidx];
                            $_FILES[$input_name]['error'] = ((array) $input_files[$input_name]['error'])[$sidx];
                            $_FILES[$input_name]['size'] = $tmp_size;

                            if ($this->do_upload($input_name) === true) {
                                $results[$idx] = $this->data();
                            } else {
                                throw new \Exception(sprintf('%s 파일(%d번째)은 %s', $_FILES[$input_name]['name'], ($idx + 1), $this->error_msg[0]));
                            }
                        }
                        $idx++;
                    }
                } else {
                    $idx++;
                }
            }
        } catch (\Exception $e) {
            // 파일업로드가 실패한 경우 이전에 업로드 성공한 파일 삭제
            $is_deleted = $this->_uploadedFileDelete($results);
            if ($is_deleted !== true) {
                return $e->getMessage() . PHP_EOL . $is_deleted;
            }
            return $e->getMessage();
        }

        return $results;
    }

    /**
     * 업로드 파일 백업
     * @param array $uploaded_full_paths 파일명을 포함한 업로드 파일 경로 배열
     * @param bool $is_public_url 파일 경로가 public url 일 경우 true (실 파일경로 자동 변환)
     * @param string $bak_dir 백업 디렉토리 명
     * @return bool|string
     */
    public function bakUploadedFile($uploaded_full_paths = [], $is_public_url = false, $bak_dir = 'bak')
    {
        try {
            foreach ((array) $uploaded_full_paths as $uploaded_full_path) {
                $is_public_url === true && $uploaded_full_path = $this->_upload_path . substr($uploaded_full_path, strpos($uploaded_full_path, $this->_upload_url) + strlen($this->_upload_url));

                if (is_file($uploaded_full_path) === true && file_exists($uploaded_full_path) === true) {
                    $bak_file_path = dirname($uploaded_full_path) . '/' . $bak_dir;
                    $bak_full_path = $bak_file_path . '/' . basename($uploaded_full_path);

                    // 백업 디렉토리 생성
                    $is_created = $this->_createDir($bak_file_path);
                    if ($is_created !== true) {
                        throw new \Exception($is_created);
                    }

                    // 파일 이동
                    if (rename($uploaded_full_path, $bak_full_path) === false) {
                        throw new \Exception(sprintf('업로드 파일 이동에 실패했습니다. (%s)', $bak_full_path));
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * files 변수가 비어 있는지 체크
     * @return bool true:empty
     */
    private function _isEmptyFiles()
    {
        foreach ($_FILES as $name => $data) {
            foreach ($data as $key => $values) {
                if ($key == 'size') {
                    foreach ((array) $values as $val) {
                        if (empty($val) === false) {
                            return false;
                        }
                    }
                }
            }
        }

        return true;
    }

    /**
     * 디렉토리 생성
     * @param $dir
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

    /**
     * 업로드 성공한 파일 삭제
     * @param array $uploaded
     * @return bool|string
     */
    private function _uploadedFileDelete($uploaded = [])
    {
        foreach ($uploaded as $upload) {
            if (isset($upload['full_path']) === true && is_file($upload['full_path']) === true) {
                if (unlink($upload['full_path']) === false) {
                    return '업로드 파일 삭제에 실패했습니다.';
                }
            }
        }

        return true;
    }
}