<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupportMainFModel extends WB_Model
{
    private $_table = [
        'board' => 'vw_board',
        'board_qna' => 'vw_board_qna'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }




}