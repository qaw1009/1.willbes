<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caching extends CI_Driver_Library
{
    /**
     * ci instance
     * @var CI_Controller
     */
    public $_CI;

    /**
     * database connection query builder
     * @var CI_DB_query_builder
     */
    public $_db;

    /**
     * valid drivers (caching driver(memcache에 저장할 데이터)가 추가될 경우 추가 필요)
     * @var array
     */
    protected $valid_drivers = array(
        'site',
        'site_menu',
        'site_subject_professor',
        'mobile_menu'
    );

    /**
     * this driver
     * @var string
     */
    protected $_driver = 'dummy';

    /**
     * cache backup adapter
     * @var string
     */
    protected $_cache_backup_adapter = 'file';

    /**
     * file cache adapter directory
     * @var string
     */
    protected $_file_adapter_dir = 'memcached' . DIRECTORY_SEPARATOR;

    /**
     * Caching constructor
     * @param array $config
     */
    public function __construct($config = array())
    {
        isset($config['driver']) && $this->_driver = $config['driver'];

        // get ci instance
        $this->_CI =& get_instance();

        // cache driver load
        $this->_CI->load->driver('cache');

        // cache config load
        $this->_CI->config->load('cache', true);

        // set backup adapter
        $cache_backup_adapter = config_get('cache.backup');
        is_null($cache_backup_adapter) === false && $this->_cache_backup_adapter = $cache_backup_adapter;
    }

    /**
     * Caching __get (set this driver)
     * @param $child
     * @return object
     */
    public function __get($child)
    {
        $this->_driver = $child;

        return parent::__get($child);
    }

    /**
     * get cache by key
     * @param $key
     * @return mixed
     */
    public function get($key = '')
    {
        $this->_driver != 'dummy' && $key =  $this->{$this->_driver}->_key;

        if (($data = @$this->_CI->cache->get($key)) === false) {
            // get backup cache
            $data = $this->_CI->cache->{$this->_cache_backup_adapter}->get($this->_file_adapter_dir . $key);
        }

        if ($data === false) {
            // save cache
            $this->save();

            return $this->get($key);
        }

        return $data;
    }

    /**
     * save cache by driver
     * @param string $driver
     * @return bool
     */
    public function save($driver = '')
    {
        try {
            empty($driver) === true && $driver = $this->_driver;
            $key = $this->{$driver}->_key;
            $ttl = $this->{$driver}->_ttl;

            // load database
            $this->_db = $this->_CI->load->database($this->{$driver}->_database, true);

            // get save driver data
            $data = $this->{$driver}->_getSaveData();

            // save backup cache
            $this->_CI->cache->{$this->_cache_backup_adapter}->save($this->_file_adapter_dir . $key, $data, $ttl);

            // save cache
            @$this->_CI->cache->save($key, $data, $ttl);
        } catch (\Exception $e) {
            log_message('error', 'Failed to save caching driver : ' . $driver);
            return false;
        } finally {
            $this->_db->close();
        }

        return true;
    }

    /**
     * delete cache by key
     * @param $key
     * @return bool
     */
    public function delete($key = '')
    {
        $this->_driver != 'dummy' && $key =  $this->{$this->_driver}->_key;

        // delete backup cache
        $this->_CI->cache->{$this->_cache_backup_adapter}->delete($this->_file_adapter_dir . $key);

        return @$this->_CI->cache->delete($key);
    }

    /**
     * set driver
     * @param $driver
     */
    public function setDriver($driver)
    {
        $this->_driver = $driver;
    }
}
