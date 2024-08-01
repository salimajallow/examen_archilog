<?php
namespace App\Modules\Users;
use Illuminate\Support\ServiceProvider;
class UserServiceProvider extends ServiceProvider{
public function register():void{
    $this->mergeConfigFrom(__DIR__.'/config.php','user');
}
public function boot():void{
    $this->loadRoutesFrom(__DIR__.'/routes.php');
    $this->loadViewsFrom(__DIR__.'/views','user');
}


}
