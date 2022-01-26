<?php
namespace Linked\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {
   public function boot() {
      parent::boot();
   }

   public function map() {
      Route::namespace( "Linked\Http\Controllers" )->group( __DIR__."/../../Http/Route/app.php" );
   }
}
