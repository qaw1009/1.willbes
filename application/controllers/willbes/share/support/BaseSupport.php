<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSupport extends \app\controllers\FrontController
{
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');
        $board_idx = $this->_reqG('board_idx');

        $this->downloadFModel->saveLog($board_idx);
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }

    /**
     * 게시판 내용 재가공 처리
     * @param $content
     * @param $arr_file_info
     * @param $reg_type
     * @return string
     */
    protected function _getBoardForContent($content, $arr_file_info, $reg_type = 0)
    {
        $tmp_images = '';
        if (empty($arr_file_info) === false && $arr_file_info != 'N') {
            $arr_file_info = json_decode($arr_file_info, true);
            foreach ($arr_file_info as $row) {
                if ($row['FileType'] == $reg_type) {
                    $tmp_images .= make_image_tag($row['FilePath'] . $row['FileName']);
                }
            }
        }
        return $tmp_images . $content;
    }
}