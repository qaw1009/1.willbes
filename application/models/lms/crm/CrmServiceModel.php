<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrmServiceModel extends WB_Model
{
    public function __construct()
    {
        //parent::__construct('lms');

        // load model
        /*$this->load->loadModels(['sys/siteMenu', 'sys/site']);*/
    }

    public function test()
    {
        $this->load->library('upload');
        return $this->siteModel->getSiteArray();

    }




}