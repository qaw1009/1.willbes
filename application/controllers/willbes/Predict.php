<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/passpredict/BasePassPredict.php';

class Predict extends BasePassPredict
{
    public function __construct()
    {
        parent::__construct();
    }

}