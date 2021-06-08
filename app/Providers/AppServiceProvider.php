<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// to resolve the error with the class category not found
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //to share the categories name with all views  
      $categories = Category::orderBy('id')->get();
      
       //https://laravel.com/docs/8.x/views(more info)
      View::share([
          'categories'=> $categories
      ]);
    }
}
