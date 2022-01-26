<?php
namespace Linked\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class LinkedServiceProvider extends ServiceProvider {

   public function boot( Kernel $HTTP, Translator $LANG ) {
      require_once(__DIR__."/../../Http/App.php");
   }

   public function register() {
   }

   public function loadMiddlewareFrom($handler) {

		foreach ( $handler->middleware() as $middleware ) {
		   (new Kernel)->pushMiddleware( $middleware );
		}

		foreach ( $handler->middlewareGroups() as $group => $middlewares ) {
		   if(!empty($middlewares)) {
		      $this->app["router"]->middlewareGroup($group, $middlewares);
		   }
		}
	}

   public function getGrammars( $locale="es" ) {

      if( $this->app["files"]->exists(__VENDORPATH__."App/Http/Langs/$locale.php") ) {
         return $this->app["files"]->getRequire(__VENDORPATH__."App/Http/Langs/$locale.php");
      }

      return NULL;
   }
}
