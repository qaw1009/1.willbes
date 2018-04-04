<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'admin' => 'wbs_sys_admin'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listProfessor($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        return [];
    }
}
