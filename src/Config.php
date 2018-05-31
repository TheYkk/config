<?php
/**
 * @ Package: Config - simple config class for php
 * @ Class: Config
 * @ Author: Yusuf Kaan Karakaya / @TheYkk <yusufkaan142@gmail.com>
 * @ Web: http://theykk.net
 * @ URL: https://github.com/TheYkk/config
 * @ Licence: The MIT License (MIT) - Copyright (c) - http://opensource.org/licenses/MIT
 *
 */

namespace TheYkk;


class Config
{
    /**
     * @var array
     */
    protected $config = [];

    /**
     * @param $path
     * @return Config
     */
    public static function load($path)
    {
        return new static($path);
    }

    /**
     * Config constructor.
     * @param $file
     */
    function __construct ($file)
    {
        if (is_array($file)){
            foreach ($file as $item) {
                $this->upload($item);
            }
        }else{
            $this->upload($file);
        }
    }

    /**
     * @param $key
     * @param null $default
     * @return array|mixed|null
     */
    public function get($key, $default = null)
    {
        $config = $this->config;
        foreach (explode('.', $key) as $k) {
            if (! isset($config[$k])) {
                return $default;
            }
            $config = $config[$k];
        }
        return $config;
    }

    /**
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value)
    {
        $config = &$this->config;
        foreach (explode('.', $key) as $k) {
            $config = &$config[$k];
        }
        $config = $value;
        return true;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        $config = $this->config;
        foreach (explode('.', $key) as $k) {
            if (! isset($config[$k])) {
                return false;
            }
            $config = $config[$k];
        }
        return true;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->config;
    }

    /**
     * @param $file
     */
    public function upload($file){
        $temp = require realpath('.').'/'.$file;
        if (is_callable($temp)) {
            $temp = call_user_func($temp);
        }
        try {
            if (!is_array($temp)) {
                throw new \Exception("[$file]PHP dosyasi array bicminde degil");
            }
        } catch (Exception $e) {
            throw $e->getMessage();
        }
        $name = basename($file, ".php");
        $this->config = array_merge($this->config, [$name=>$temp]);
    }
}