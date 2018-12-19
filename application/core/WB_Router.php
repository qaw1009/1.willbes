<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_Router extends CI_Router
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 디폴트 컨트롤러 확장 (서브 디렉토리 내의 컨트롤러 지정 가능하도록 확장)
     */
    protected function _set_default_controller()
    {
        if (empty($this->default_controller) === true) {
            show_error('Unable to determine what should be displayed. A default route has not been specified in the routing file.');
        }

        $directory = implode('/', explode('/', $this->default_controller, -2));
        $class_method = trim(str_replace($directory, '', $this->default_controller), '/');

        if (empty($directory) === false) {
            // 디렉토리가 존재할 경우
            if(is_dir(APPPATH.'controllers/'.$directory) === true) {
                // Set the class as the directory
                $this->set_directory($directory);
            }
        }

        // Re check for slash if method has been set
        $method = '';
        if (sscanf($class_method, '%[^/]/%s', $class, $method) !== 2) {
            $method = 'index';
        }

        if (file_exists(APPPATH.'controllers/'.$this->directory.ucfirst($class).'.php') === false) {
            // This will trigger 404 later
            return;
        }

        $this->set_class($class);
        $this->set_method($method);

        // Assign routed segments, index starting from 1
        $this->uri->rsegments = array(
            1 => $class,
            2 => $method
        );

        log_message('debug', 'No URI present. Default controller set.');
    }
}
