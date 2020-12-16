<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestModel extends WB_Model
{
    public function connectionResponse(){
        return $this->_conn->query('select 1')->row_array();
    }

}
