<?php namespace Acme\Billing;

use Stripe;
use Stripe_Charge;
use Config;

class StripeBilling implements BillingInterface {

	public function __construct() {
		Stripe::setApiKey(Config::get('stripe.secret_key'));
	}

	public function charge(array $data) {

		try {
			Stripe_Charge::create([
				'amount' => 1000,
				'currency' => 'usd',
				'description' => $data['email'],
				'card' => $data['token']

			]);	
		} catch (Stripe_CardError $e) {
			dd( 'Card was declined');
		}

	}
}