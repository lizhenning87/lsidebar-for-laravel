<?php
/**
 * Created by PhpStorm.
 * User: lizhenning
 * Date: 2017/10/10
 * Time: 下午4:31
 */

namespace Zning\LaravelSideBar\View;

use Illuminate\Contracts\View\Factory as ViewFactory;

class View
{

    protected $factory;

    public function __construct(ViewFactory $factory)
    {
        $this->factory = $factory;
    }

    public function render($view, $sidebars)
    {
        if (!$view)
            throw new \Exception('LSidebar view not specified');

        return $this->factory->make($view, compact('sidebars'))->render();
    }

}