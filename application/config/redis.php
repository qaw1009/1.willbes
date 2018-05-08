<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Redis settings
| -------------------------------------------------------------------------
| Your Redis servers can be specified below.
|
|	See: https://codeigniter.com/user_guide/libraries/caching.html#redis
|
*/
$config = array(
    'redis' => array(
        'socket_type' => 'tcp',
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => 6379,
        'timeout' => 0
    ),
    'rediscluster' => array(
        'seed' => array('127.0.0.1:7001', '127.0.0.1:7002', '127.0.0.1:7003'),
        'timeout' => 3,
        'read_timeout' => 3,
        'failover' => 'error',
        'persistent' => true,
        'distribute' => false
    )
);