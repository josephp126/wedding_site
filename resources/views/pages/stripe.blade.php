@extends('layouts.payment')
@section ('content')


<!-- display success message -->
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<body>
<div class="container">
	<div class="row">
	   <div class="col-md-6 col-md-offset-3 title-top">
		  <div class="panel panel-default credit-card-box">
			 <div class="panel-heading">
				<div class="row">
				   <h3 class="payment-details">Payment Details</h3>
				   <p>Invation Price: {{$price}} USD<p>
				</div>
			 </div>
			 <div class="panel-body">
				@if (Session::has('success'))
				<div class="alert alert-success text-center">
				   <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				   <p>{{ Session::get('success') }}</p><br>
				</div>
				@endif
 
				<form role="form" action="/stripe" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{config('app.STRIPE_KEY')}}" id="payment-form">
				   @csrf
				   <div class='form-row row form-change'>
					  <div class='form-row row form-margin'>
						 <div class='col-md-12 error form-group d-none'>
							<div class='alert-danger alert'>
								{{trans('message.error_alert')}}
							</div>
						 </div>
					  </div>
					  <div class='col-xs-12 col-md-6 form-group required form-margin'>
						 <label class='control-label'>{{trans('message.name_on_card')}}</label>
						 <input class='form-control' size='4' type='text'>
					  </div>
					  <div class='col-xs-12 col-md-6 form-group required form-margin'>
						 <label class='control-label'>{{trans('message.card_number')}}</label>
						 <input autocomplete='off' class='form-control card-number' size='20' type='text'>
					  </div>
					  <div class='col-xs-12 col-md-4 form-group cvc required form-margin'>
						 <label class='control-label'>{{trans('cvc')}}</label>
						 <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
					  </div>
				   </div>
					<div class="row font-change">
						<div class='col-xs-6 col-md-6  expiration required form-date'>
						<label class='control-label'>{{trans('expiration_month')}}</label>
						<input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
						</div>
						<div class='col-xs-6 col-md-6  expiration required form-date'>
						<label class='control-label'>{{trans('expiration_year')}}</label>
						<input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
						</div>
					</div>
				   <div class="form-row row form-change">
					  <div class="col-xs-12">
						 <button class="btn btn-primary btn-lg btn-block btn-pay" type="submit">{{trans('message.pay_btn')}}</button>
					  </div>
				   </div>
				</form>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
   @push('scripts')
   <script type="text/javascript">
      $(function() {
			var $form = $(".require-validation");
			$('form.require-validation').bind('submit', function(e) {
				var url = window.location.href;
				var price = {{$price}};
				var name = {{$name}};
				console.log(price, name);
				var $form = $(".require-validation"),
				inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
				$inputs = $form.find('.required').find(inputSelector),
				$errorMessage = $form.find('div.error'),
				valid = true;
				$errorMessage.addClass('hide');
				$('.has-error').removeClass('has-error');
				$inputs.each(function(i, el) {
				var $input = $(el);
				if ($input.val() === '') {
					$input.parent().addClass('has-error');
					$errorMessage.removeClass('hide');
					e.preventDefault();
				}
				});
				if (!$form.data('cc-on-file')) {
				e.preventDefault();
				Stripe.setPublishableKey($form.data('stripe-publishable-key'));
				Stripe.createToken({
					number: $('.card-number').val(),
					cvc: $('.card-cvc').val(),
					exp_month: $('.card-expiry-month').val(),
					exp_year: $('.card-expiry-year').val()
				}, stripeResponseHandler);
				}
			});

			function stripeResponseHandler(status, response) {
				if (response.error) {
					$('.error')
					.removeClass('hide')
					.find('.alert')
					.text(response.error.message);
				} else {
				/* token contains id, last4, and card type */
				var token = response['id'];
				var url = window.location.href;
					var price = url.split("/")[4];
					var name = url.split("/")[5];
				$form.find('input[type=text]').empty();
				$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
				$form.append("<input type='hidden' name='price' value='" + price + "'/>");
				$form.append("<input type='hidden' name='name' value='" + name + "'/>");
				$form.get(0).submit();
				}
			}
		});
    </script>

   @endpush
   @endsection