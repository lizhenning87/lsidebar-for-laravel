# LSideBar-For-Laravel

>参考 davejamesmiller/laravel-breadcrumbs 实现的侧边栏


### Feature
 1. [x] 基础框架
 2. [x] 支持自定义的侧边栏样式

  
### 1. 安装 LSideBar

在控制台中运行此命令

```

composer require zning/laravelsidebar

```

此命令运行后将会自动更新 `composer.json` 文件，并将扩展包安装在`vendor/`目录中


### 2. 配置 LSideBar

在项目config文件夹中，找到app.php

编辑如下对应内容

找到`providers`数组，添加 `Zning\LaravelSideBar\LSideBarServiceProvider::class,`

```
'providers' => 
[
    Zning\LaravelSideBar\LSideBarServiceProvider::class,
]

```

找到`aliases`数组，添加
`'LSideBar' => \Zning\LaravelSideBar\LSideBarFacade::class,`

```

'aliases' => 
[
    'LSideBar' => \Zning\LaravelSideBar\LSideBarFacade::class,
]

```

### 3. 发布 LSideBar

在控制台中运行此命令

```

php artisan vendor:publish

```

此命令运行后会自动在config文件夹中生成lsidebar.php配置文件

 
### 4. 部署 LSideBar

在`routes`文件夹中新建`lsidebar.php`文件，文件内容如下:

>若没有找到routes文件夹，也可以在`Http`文件夹中创建此文件
>


```

LSideBar::register('goods', function ($sidebars){

    $sidebars->push('商品管理', '', ['icon' => 'fa fa-table']);

});


LSideBar::register('goods-list', function ($sidebars){

    $sidebars->parent('goods');
    $sidebars->push('商品列表', route('goods-list'));

});


```

在后台管理页面中找到对应的侧边栏位置，部署如下代码：

```

@yield('LSideBar')

```


在每个管理页面中，部署如下代码：

```

@section('LSideBar')

    {!! LSideBar::render('goods-list') !!}

@endsection

```

 

### 注意事项



```

[Symfony\Component\Debug\Exception\FatalThrowableError]         
Class 'Zning\LaravelSideBar\LSideBarServiceProvider' not found 

```

如果使用中遇到上面的错误，请使用`composer dump-autoload -o`

