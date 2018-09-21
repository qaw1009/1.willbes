<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 공통코드관리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCodeModel extends WB_Model
{
    private $_table = [

    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 목록조회
     * @param array $arr
     */
    public function list()
    {
        $result = array(
            '0' => array(
                '10005' => '국어',
                '10008' => '영어',
                '10056' => '해사영어',
            ),
            '1' => array(
                '10005' => '국어',
               // '10008' => '영어',
               // '10056' => '해사영어',
            ),
            '2' => array(
                '10005' => '국어',
               // '10008' => '영어',
                '10056' => '해사영어',
            ),
            '3' => array(
                //'10005' => '국어',
                '10008' => '영어',
                //'10056' => '해사영어',
            ),
            '4' => array(
                //'10005' => '국어',
                '10008' => '영어',
                '10056' => '해사영어',
            ),
            '5' => array(
               // '10005' => '국어',
               // '10008' => '영어',
                '10056' => '해사영어',
            ),
            '6' => array(
               // '10005' => '국어',
                '10008' => '영어',
               // '10056' => '해사영어',
            ),
        );

        return $result;
    }


    /**
     * 등록
     * @param array $params
     */
    public function store()
    {

    }


    /**
     * 수정
     * @param array $params
     */
    public function update()
    {

    }
}
