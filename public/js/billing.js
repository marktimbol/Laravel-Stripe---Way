(function() {
	var StripeBilling = {
		init: function() {
			this.form = $('#billing-form');
			this.submitButton = this.form.find('input[type=submit]');
			this.submitButtonValue = this.submitButton.val();

			var stripeKey = $('meta[name="publishable-key"]').attr('content');
			Stripe.setPublishableKey(stripeKey
			this.bindEvents();
		},);


		bindEvents: function() {
			this.form.on('submit', $.proxy(this.sendToken, this));
		},

		sendToken: function(event) {	
			event.preventDefault();
			this.submitButton.val('One moment...').prop('disabled', true);
			Stripe.createToken(this.form, $.proxy(this.stripeResponseHandler, this) );
		},

		stripeResponseHandler: function(status, response) {	

			this.submitButton.val(this.submitButtonValue).prop('disabled', false);

			if( response.error ) {
				return this.form.find('.payment-error').show().text(response.error.message);
				
			}

		    var token = response.id;
		    this.form.append($('<input type="hidden" name="stripeToken" />').val(token));
		    this.form.get(0).submit();			
		}


	};

	StripeBilling.init();

})();