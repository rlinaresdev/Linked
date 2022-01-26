<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/*
* PATH */
Core::macro("path")->save([
   "__linked" => "__dirpath/linked/"
]);

Core::macro("linked", new \Hydra\Macro\Path());



/*
* MIDDLEWARE */
$this->loadMiddlewareFrom(new \Linked\Http\Middleware\Handler());

/*
* VIEWS */
$this->loadViewsFrom( __DIR__.'/Views', 'linked' );
