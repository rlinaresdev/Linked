<?php
namespace Linked\Http\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  protected $path    = "linked::";

   protected $parsers = [];

   protected $skin;

   public function boot( $app, $data=[] ) {

	$this->app = $app;

	if(!empty($data) && is_array($data) ) $this->share($data);

		if( method_exists($app, "share") ) {
			if( !empty( ($appShare = $app->share($this)) ) && is_array($appShare) ) {
			$this->share($appShare);
			}
		}

		$this->share([
			"path"    => $this->path,
			//"content" => $this->layout[config("content.layout", "md")]
		]);

		$this->config($this->share());
	}

   public function layout($key) {
      if(array_key_exists($key, $this->layout) )  {
         return $this->layout[$key];
      }

      return $this->layout["md"];
   }

   public function share($data=null) {
		if( !empty($data) && is_array($data) ) {
			foreach( $data as $key => $value ) {
				$this->parsers[$key] = $value;
			}
		}

      return $this->parsers;
	}

   public function config($data=[]) {
      $this->share($data);
      app("view")->share($this->share());
   }

  public function render($view=NULL, $data=[], $mergeData=[]) {
     
     if(view()->exists(($path = $this->path.$view))) {
        return view($path, $data, $mergeData);
     }

    abort(500, "La vista {$path} no existe");
  }

}
