<?php
/**
 * Created by PhpStorm.
 * User: lizhenning
 * Date: 2017/10/9
 * Time: 下午9:30
 */

namespace Zning\LaravelSideBar;


use Illuminate\Support\Facades\Facade;

class LSideBarFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'lsidebar';
    }
}