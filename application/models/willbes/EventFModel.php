<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventFModel extends WB_Model
{
    private $_table = [
        'event' => 'lms_evnet_lecture'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }
}