<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_Loader extends CI_Loader
{
    protected $_CI;
    // model name postfix
    protected $model_postfix = '%Model';

    public function __construct()
    {
        parent::__construct();

        $this->_CI =& get_instance();
    }

    /**
     * 모델 로드
     * @param array $models
     */
    public function loadModels($models = [])
    {
        foreach ($models as $key => $value) {
            if (is_int($key)) {
                $this->model($this->_getModelName($value));
            } else {
                $this->model($this->_getModelName($key), $value);
            }
        }
    }

    /**
     * 모델명에 서브 도메인과 후첨자를 더하여 리턴
     * @param $model string 언더스코어(_)로 시작하는 모델명은 서브 도메인을 조합하지 않고 리턴
     * @return mixed
     */
    private function _getModelName($model)
    {
        if(starts_with($model, '_') === true) {
            return substr(str_replace('%', $model, $this->model_postfix), 1);
        } else {
            return APP_NAME . '/' . str_replace('%', $model, $this->model_postfix);
        }
    }

    /**
     * 뷰 블레이드 렌더링
     * @param string $view
     * @param array $vars
     * @param bool $sub_domain
     * @param bool $return
     * @param bool $is_blade
     * @return object|string
     */
    public function view($view, $vars = array(), $sub_domain = true, $return = false, $is_blade = true)
    {
        if($is_blade === true) {
            $view_dir = VIEWPATH;
            $cache_dir = config_item('cache_path') . 'views/' . APP_NAME;

            $blade = new \eftec\bladeone\BladeOne($view_dir, $cache_dir);

            // 서브 도메인 적용 (PC/모바일 경로가 있을 경우 지정)
            $sub_domain === true && $view = APP_NAME . config_get('view_add_path', '') . '/' . $view;

            // blade path 형식으로 변환
            $view = str_replace('/', '.', $view);

            // config 값 추가
            $vars['__cfg'] = config_item(SUB_DOMAIN);

            // CI 전역변수에 설정된 데이터 셋팅
            foreach ($this->get_vars() as $key => $val) {
                if (starts_with($key, '__') === true) {
                    $vars[$key] = $val;
                }
            }

            // blade render
            $output = $blade->run($view, $this->_ci_prepare_view_vars($vars));

            if($return === false) {
                $this->_CI->output->_display($output);
            } else {
                return $output;
            }
        } else {
            return parent::view($view, $vars, $return);
        }
    }
}