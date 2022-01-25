<?php
namespace Linked;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Kernel {

	public function providers() {
		return [
         \Linked\Providers\LinkedServiceProvider::class,
         \Linked\Providers\RouteServiceProvider::class
		];
	}

	public function alias() {
		return [
		];
	}

	public function handler($app) {
	}
}
