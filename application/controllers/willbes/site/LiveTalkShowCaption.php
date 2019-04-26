<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LiveTalkShowCaption extends \app\controllers\FrontController
{
    protected $models = array('subTitlesF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result_subTitles = $this->subTitlesFModel->getSubTitlesList();

        $data_subTitles = [];
        $data_content = [];
        foreach ($result_subTitles as $keys => $vals) {
            $data_subTitles[$keys]['PstIdx'] = $vals['PstIdx'];
            $data_subTitles[$keys]['Title'] = $vals['Title'];
            $data_subTitles[$keys]['BgImgPath'] = $vals['AttachFileFullPath'];

            $temp_arr_content = explode('|', $vals['Content']);
            foreach ($temp_arr_content as $c_key => $c_val) {
                $detail_content = explode('^', $c_val);
                foreach ($detail_content as $d_key => $d_val) {
                    if (empty($d_val) === false) {
                        $data_content[$vals['Title']][$c_key][$d_key] = $d_val;
                    }
                }
            }
        }
        $arr_input = [
            'menu' => $data_subTitles,
            'data' => $data_content
        ];

        $this->load->view('liveTalkShowCaption/index', [
            'arr_input' => $arr_input
        ]);
    }
}