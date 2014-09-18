<?php

class BillingController extends BaseController {

	public function charge() {
		$billing = App::make('Acme\Billing\BillingInterface');

		$billing->charge([
			'email' => Input::get('email'),
			'token' => Input::get('stripeToken')
			]);

		return 'Charge was successful';		
	}	
}