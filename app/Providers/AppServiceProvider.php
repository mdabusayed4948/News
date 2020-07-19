<?php

namespace App\Providers;

use App\Category;
use App\Setting;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $settings = Setting::all();
        foreach ($settings as $key => $setting){
            if($key === 0 ) $system_name    = $setting->value;
            elseif($key === 1 ) $favicon    = $setting->value;
            elseif($key === 2 ) $front_logo = $setting->value;
            elseif($key === 3 ) $admin_logo = $setting->value;

        }
        $categories = Category::where('status',1)->get();
        $author = User::where('type','!=',1)->get();
        $shareData = array(
            'system_name' => $system_name,
            'favicon'     => $favicon,
            'front_logo'  => $front_logo,
            'admin_logo'  => $admin_logo,
            'categories'  => $categories,
            'author'      => $author
        );
        view()->share('shareData', $shareData);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
