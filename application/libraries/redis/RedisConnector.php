<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedisConnector
{
    protected $_CI;
    protected $_config;

    public function __construct()
    {
        $this->_CI =& get_instance();
    }

    /**
     * redis connector return
     *
     * @param $driver
     * @return bool|null|RedisCluster
     */
    public function connector($driver)
    {
        $_redis = null;
        switch ($driver) {
            case 'rediscluster':
                $_redis = $this->connectToCluster();
                break;
        }

        return $_redis;
    }

    /**
     * redis connection
     */
    public function connect()
    {
        // do nothing
    }

    /**
     * redis cluster connection
     *
     * @return bool|RedisCluster
     */
    public function connectToCluster()
    {
        try {
            if($this->_CI->config->load('redis', TRUE, TRUE)) {
                $this->_config = $this->_CI->config->item('redis')['rediscluster'];
            } else {
                throw new Exception('No Redis Cluster save path configured.');
            }

            $redis = new RedisCluster(null, $this->_config['seed'], $this->_config['timeout'], $this->_config['read_timeout'], $this->_config['persistent']);

            if(!$redis) {
                throw new Exception('Unable to connect to Redis Cluster with the configured settings.');
            }

            // set option
            if($this->_config['failover'] == 'none') {
                $redis->setOption(RedisCluster::OPT_SLAVE_FAILOVER, RedisCluster::FAILOVER_NONE);
            } elseif ($this->_config['failover'] == 'error') {
                $redis->setOption(RedisCluster::OPT_SLAVE_FAILOVER, RedisCluster::FAILOVER_ERROR);
            }

            if ($this->_config['distribute'] === true) {
                $redis->setOption(RedisCluster::OPT_SLAVE_FAILOVER, RedisCluster::FAILOVER_DISTRIBUTE);
            }

            return $redis;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
        }

        return false;
    }

    /**
     * redis cluster seed array return
     *
     * @return mixed
     */
    public function getRedisClusterSeed()
    {
        return $this->_config['seed'];
    }
}