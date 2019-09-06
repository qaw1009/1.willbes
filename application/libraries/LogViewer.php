<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogViewer
{
    protected $log_type = 'willbes';
    protected $log_pattern = 'log';
    protected $max_file_size = 52428800;    // 50M (52428800)

    public function __construct($config = [])
    {
        empty(element('log_type', $config)) === false && $this->log_type = element('log_type', $config);
        empty(element('log_pattern', $config)) === false && $this->log_pattern = element('log_pattern', $config);
    }

    /**
     * 로그파일 데이터 리턴
     * @param string $log_date
     * @param string $log_level
     * @param string $log_pattern
     * @param string $log_type
     * @return array
     */
    public function getLogData($log_date, $log_level = '', $log_pattern = '', $log_type = '')
    {
        $log_level === 'ALL' && $log_level = '';
        $log_path = $this->getLogPath($log_date, $log_pattern, $log_type);
        $log_method = $this->log_pattern == 'log' ? '_getLogData' : '_getQueryLogData';

        return $this->{$log_method}($log_path, $log_level);
    }

    /**
     * 일반 로그파일 데이터 리턴
     * @param string $log_path
     * @param string $log_level
     * @return array|string
     */
    private function _getLogData($log_path, $log_level = '')
    {
        $data = [];

        if (file_exists($log_path)) {
            $is_check = $this->_checkFileSize($log_path);
            if ($is_check !== true) {
                return $is_check;
            }

            $handle = fopen($log_path, 'r');
            $sub_line = '';
            $prev_line = '';

            while (! feof($handle)) {
                $line = trim(fgets($handle, 4096));
                //$line = trim(stream_get_line($handle, 1024 * 1024, PHP_EOL));

                if (starts_with($line, ['ERROR', 'DEBUG', 'INFO']) === true) {
                    $content = $prev_line . $sub_line;
                    $sub_line = '';
                    $prev_line = $line;
                } else {
                    // 하위로그 저장
                    $sub_line .= ' ' . $line;
                    continue;
                }

                if (empty($content) === true) {
                    continue;
                }

                if (empty($log_level) === false) {
                    if (starts_with($content, $log_level) === false) {
                        continue;
                    }
                }

                $data[] = [
                    'level' => str_first_pos_before($content, ' - '),
                    'time' => str_first_pos_after(str_first_pos_before($content, ' --> '), ' - '),
                    'message' => str_replace('\n', '', str_first_pos_after($content, ' --> '))
                ];
            }

            fclose ($handle);

            // last line
            if (empty($prev_line) === false) {
                if (empty($log_level) === true || (empty($log_level) === false && starts_with($prev_line, $log_level) === true)) {
                    $content = $prev_line . rtrim($sub_line);

                    $data[] = [
                        'level' => str_first_pos_before($content, ' - '),
                        'time' => str_first_pos_after(str_first_pos_before($content, ' --> '), ' - '),
                        'message' => str_replace('\n', '', str_first_pos_after($content, ' --> '))
                    ];
                }
            }
        }

        return $data;
    }

    /**
     * 쿼리 로그파일 데이터 리턴
     * @param string $log_path
     * @param string $log_level
     * @return array|bool
     */
    private function _getQueryLogData($log_path, $log_level = '')
    {
        $data = [];

        if (file_exists($log_path)) {
            $is_check = $this->_checkFileSize($log_path);
            if ($is_check !== true) {
                return $is_check;
            }

            $handle = fopen($log_path, 'r');
            $sub_line = '';
            $prev_line = '';

            while (! feof($handle)) {
                $line = trim(fgets($handle, 4096));
                //$line = trim(stream_get_line($handle, 1024 * 1024, PHP_EOL));

                if (starts_with($line, '/*=') === true) {
                    continue;
                }

                if (starts_with($line, '/* Query ') === true) {
                    $content = $prev_line . $sub_line;
                    $sub_line = '';
                    $prev_line = $line;
                } else {
                    // 하위로그 저장
                    $sub_line .= ' ' . $line;
                    continue;
                }

                if (empty($content) === true) {
                    continue;
                }

                $data[] = [
                    'seq' => str_replace('/* Query ', '', str_first_pos_before($content, ' - ')),
                    'time' => str_first_pos_after(str_first_pos_before($content, ' [URI: '), ' - '),
                    'uri' => str_first_pos_before(str_first_pos_after($content, ' [URI: '), ']'),
                    'exec_time' => str_first_pos_before(str_first_pos_after($content, ' [Execution Time: '), ']'),
                    'query' => str_replace('\n', '', str_first_pos_after($content, ' */ '))
                ];
            }

            fclose ($handle);

            // last line
            if (empty($prev_line) === false) {
                $content = $prev_line . rtrim($sub_line);

                $data[] = [
                    'seq' => str_replace('/* Query ', '', str_first_pos_before($content, ' - ')),
                    'time' => str_first_pos_after(str_first_pos_before($content, ' [URI: '), ' - '),
                    'uri' => str_first_pos_before(str_first_pos_after($content, ' [URI: '), ']'),
                    'exec_time' => str_first_pos_before(str_first_pos_after($content, ' [Execution Time: '), ']'),
                    'query' => str_replace('\n', '', str_first_pos_after($content, ' */ '))
                ];
            }
        }

        return $data;
    }

    /**
     * 로그파일 경로 리턴
     * @param string $log_date
     * @param string $log_pattern
     * @param string $log_type
     * @return string
     */
    public function getLogPath($log_date, $log_pattern, $log_type = '')
    {
        empty($log_type) === false && $this->log_type = strtolower($log_type);
        empty($log_pattern) === false && $this->log_pattern = strtolower($log_pattern);

        switch ($this->log_type) {
            case 'pg' :
            case 'deposit' :
                $log_path = 'pg/inisis';
                $log_file = ($this->log_type == 'deposit' ? 'deposit' : 'log') . '-' . $log_date . '.log';
                break;
            case 'pg_mobile' :
            case 'deposit_mobile' :
                $log_path = 'pg/inisis_mobile';
                $log_file = ($this->log_type == 'deposit_mobile' ? 'deposit' : 'log') . '-' . $log_date . '.log';
                break;
            default :
                $log_path = strtolower($this->log_type) . ($this->log_pattern == 'log' ? '' : '/sql');
                $log_file = $this->log_pattern == 'log' ? 'log-' . $log_date . '.log' : $this->log_pattern . '-' . $log_date . '.sql';
                break;
        }

        return STORAGEPATH . 'logs/' . $log_path . '/' . $log_file;
    }

    /**
     * 로그파일 사이즈 체크
     * @param string $log_path
     * @return bool
     */
    private function _checkFileSize($log_path)
    {
        $file_size = filesize($log_path);

        if ($file_size > $this->max_file_size) {
            return '로그파일 크기가 ' . number_format($this->max_file_size) . ' 바이트를 초과하였습니다.';
        } else {
            return true;
        }
    }
}