<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Starplayer extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function Admin()
    {
        $error = '';
        $msg = '';
        $debug = '';

        echo("<axis-app>");
        echo("<error>".$error."</error>");
        echo("<message>".$msg."</message>");
        echo("<debug>".$debug."</debug>");
        echo("</axis-app>");
        exit ;
    }
}
