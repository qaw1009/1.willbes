<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontPreHook
{
    /**
     * 시스템 작동 초기 체크
     * TODO : 모바일, 학원 구분값 하드코딩
     */
    public function preCheck()
    {
        // 학원/모바일 사이트 리다이렉트
        if ($_SERVER['REQUEST_URI'] == '/m' || $_SERVER['REQUEST_URI'] == '/m/') {
            header('location: ' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/m/home/index');
            exit;
        } elseif ($_SERVER['REQUEST_URI'] == '/pass' || $_SERVER['REQUEST_URI'] == '/pass/') {
            header('location: ' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/pass/home/index');
            exit;
        } elseif ($_SERVER['REQUEST_URI'] == '/m/pass' || $_SERVER['REQUEST_URI'] == '/m/pass/') {
            header('location: ' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/m/pass/home/index');
            exit;
        }
    }
}