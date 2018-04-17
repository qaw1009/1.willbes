<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Rest Client config
| -------------------------------------------------------------------------
*/
$config['server'] = 'http://' . ENV_CHAR . 'api.willbes.net';
$config['format'] = 'json';
$config['http_realm'] = 'WILL-API';
$config['http_auth'] = false;    // false, basic, digest
$config['http_user'] = 'admin';
$config['http_pass'] = '1234';
