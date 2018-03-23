<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| File Upload config
| -------------------------------------------------------------------------
*/
$config['upload_path'] = STORAGEPATH . 'uploads/';
$config['upload_url'] = PUBLICURL . 'uploads/';
$config['file_ext_tolower'] = true;
$config['max_size'] = '20480';
$config['max_width'] = '1024';
$config['max_height'] = '768';
