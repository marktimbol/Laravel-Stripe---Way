@extends('layouts.default')

@section('content')
	<div class="col-md-4">
		<h2>Buy for 10$</h2>

		{{ Form::open(['id'=>'billing-form']) }}
			<div class="form-group">
				<label>Credit Card Number:</label>
				<input type="text" class="form-control" data-stripe="number" />
			</div>

			<div class="form-group">
				<label>CVC:</label>
				<input type="text" class="form-control" data-stripe="cvc" />
			</div>	

			<div class="form-group">
				<label>Expiration Date:</label>

				<div class="clearfix"></div>

				<div class="col-md-6">
					{{ Form::selectMonth(null, null, ['data-stripe'=>'exp-month', 'class'=>'form-control']) }}
				</div>
				<div class="col-md-6">
					{{ Form::selectYear(null, date('Y'), date('Y')  + 10, null, ['data-stripe'=>'exp-year', 'class'=>'form-control']) }}
				</div>
			</div>	

			<div class="form-group">
				<label>Email Address:</label>
				<input type="email" class="form-control" name="email"  />
			</div>				

			<div class="form-group">
				{{ Form::submit('Buy Now', ['class' => 'btn btn-primary']) }}
			</div>		

			<div class="payment-error"></div>		
		{{ Form::close() }}
	</div>
@stop

@section('footer')
	<script src="/js/billing.js"></script>
@stop