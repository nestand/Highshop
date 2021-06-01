<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

//to avoid the repeat using of the variable $categories in the controller, better using it once in the boot
 

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
      $categories = Category::orderBy('id')->get();
      
      //https://laravel.com/docs/8.x/views
      View::share([
          'categories'=> $categories
      ]);
    }
}
