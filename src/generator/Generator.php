<?php
/**
 * Created by PhpStorm.
 * User: lizhenning
 * Date: 2017/10/9
 * Time: 下午10:14
 */

namespace Zning\LaravelSideBar\Generator;



/**
 * Class Generator
 * @package Zning\LaravelSideBar\Generator
 *
 *
 */

class Generator
{
    protected $lsidebar = [];
    protected $callbacks = [];

    protected $key = '';
    protected $key_parent = '';

    protected $route_name = '';

    protected function call($name, $params)
    {
        if (!isset($this->callbacks[$name]))
            throw new \Exception("LSideBar not found with name \"{$name}\"");

        $this->key = $name;

        array_unshift($params, $this);

        call_user_func_array($this->callbacks[$name], $params);

    }


    public function parent($name)
    {
        $this->key_parent = $name;
    }



    public function push($title, $url = null, array $data = [])
    {

        $_activity = $this->route_name == $this->key;

        $obj = (object) array_merge($data, [
            'title' => $title,
            'url' => $url,
            'key' => $this->key,
            'child' => [],
            '_activity' => $_activity,
        ]);


        if ($this->key_parent == '')
        {
            $this->lsidebar[] = $obj;
        }else
        {
            $this->searchKey($this->lsidebar, $obj);
        }

    }


    protected function searchKey($array, $obj) {

        foreach ($array as &$item)
        {
            if ($item->key == $this->key_parent)
            {

                $item->_activity = $item->_activity ?:$obj->_activity;
                $item->child[] = $obj;

                break;
            }

            $this->searchKey($item->child, $obj);

        }

    }


    public function generate(array $callbacks, $name, $params)
    {

        $this->route_name = $name;

        $this->lsidebar = [];
        $this->callbacks   = $callbacks;

        $keys = array_keys($callbacks);

        foreach ($keys as &$key)
        {
            $this->key_parent = '';
            $this->call($key, []);
        }

        return $this->toArray();
    }


    public function toArray()
    {
        $lsidebar = $this->lsidebar;

        return $lsidebar;
    }

}