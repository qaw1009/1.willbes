<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_URI extends CI_URI
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * URI multi slashes replace (slashe가 2개 이상 연속될 경우 null 값으로 치환하기 위해 코어 확장)
     * @param string $uri
     * @return string
     */
    protected function _remove_relative_directory($uri)
    {
        $uris = array();
        $uri = preg_replace('/\/\/+/', '/null/', $uri);
        $tok = strtok($uri, '/');
        while ($tok !== FALSE)
        {
            if (( ! empty($tok) OR $tok === '0') && $tok !== '..')
            {
                $uris[] = $tok;
            }
            $tok = strtok('/');
        }

        return implode('/', $uris);
    }
}
