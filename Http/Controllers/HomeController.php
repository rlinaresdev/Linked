<?php
namespace Linked\Http\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Linked\Http\Support\HomeSupport;

class HomeController extends Controller {

   public function __construct( HomeSupport $app ) {
      $this->boot( $app );
   }

   public function index() {
      return $this->render( "home.index", $this->app->data() );
   }
}
