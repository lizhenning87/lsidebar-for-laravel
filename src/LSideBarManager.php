<?php
/**
 * Created by PhpStorm.
 * User: lizhenning
 * Date: 2017/10/9
 * Time: 下午9:33
 */

namespace Zning\LaravelSideBar;


use Zning\LaravelSideBar\Generator\Generator;
use Zning\LaravelSideBar\Route\CurrentRoute;
use Zning\LaravelSideBar\View\View;

class LSideBarManager
{
    protected $currentRoute;
    protected $generator;
    protected $view;

    protected $callbacks = [];
    protected $viewName;


    public function __construct(CurrentRoute $currentRoute, Generator $generator, View $view)
    {
        $this->generator    = $generator;
        $this->currentRoute = $currentRoute;
        $this->view         = $view;
    }

    public function register($name, $callback)
    {
        if (isset($this->callbacks[$name]))
            throw new \Exception("LSideBar name \"{$name}\" has already been registered");
        $this->callbacks[$name] = $callback;
    }



    public function render($name) {

        if (is_null($name))
            list($name, $params) = $this->currentRoute->get();
        else
            $params = array_slice(func_get_args(), 1);

        $sidebars = $this->generator->generate($this->callbacks, $name, $params);

        return $this->view->render($this->viewName, $sidebars);

    }


    public function version() {

        return 'version beta';
    }


    public function setView($view) {

        $this->viewName = $view;

    }

}