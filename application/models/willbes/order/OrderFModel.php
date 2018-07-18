<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderFModel extends WB_Model
{
    private $_table = [
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }
}
