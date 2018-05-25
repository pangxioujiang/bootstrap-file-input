<?php

namespace Crab\Fileinput;

use Illuminate\Support\ServiceProvider;

class FileinputServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *在注册后进行服务的启动
     * @return void
     */
    public function boot()
    {
//        $this->publishes(); //发布到config 目录上
//        $this->loadRoutesFrom(); //路由
//        $this->loadMigrationsFrom();//数据库迁移
//        $this->loadViewsFrom(__DIR__.'/../views','Fileinput'); //视图
//        $this->publishes([__DIR__.'/../views' => base_path('resources/views/')]);  //发布视图到resources

        $this->loadViewsFrom(__DIR__ . '/views', 'Packagetest'); // 视图目录指定
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/packagetest'),  // 发布视图目录到resources 下
            __DIR__.'/config/packagetest.php' => config_path('packagetest.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('packagetest', function ($app) {
            return new Packagetest($app['session'], $app['config']);
        });
    }
}
