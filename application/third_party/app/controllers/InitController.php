<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

trait InitController
{
    // use models
    protected $models = array();
    // use helpers
    protected $helpers = array();

    /**
     * 컨트롤러 로드시 자동 실행
     */
    private function _init()
    {
        // 프로파일러 실행
        if (config_item('enable_profiler') === true) {
            $this->output->enable_profiler(true);
        }

        // 모델 자동 로드
        $this->load->_loadModels($this->models);

        // 헬퍼 자동 로드
        $this->load->helper($this->helpers);
    }
}