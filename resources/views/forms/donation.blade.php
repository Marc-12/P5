@extends('templates.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@if (Auth::user())
				@include('templates/iconsMenu')
			@endif	
			<div id="maClasseContent">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="text-center">Faire un don</h2><p class="text-justify">Soutenez le projet </br>
						</div>
						<div class="panel-body">
							<form action="userDonationCheckout" method="POST">
							{{ csrf_field() }}
							  <script
								src="https://checkout.stripe.com/checkout.js" class="stripe-button" id="button"
								data-key="pk_test_nrcFDU0NTdcWjFYl4qMJOuOR"
								data-amount="50"
								data-name="Projet 5"
								data-description="Soutenir le projet"
								data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
								data-locale="auto"
								data-zip-code="true"
								data-allow-remember-me	= "false"
								data-currency="eur">
			
								// Preventing Checkout from being blocked
								document.getElementById("button").addEventListener("click", function() 
								{
								  handler.open({
									image: '/square-image.png',
									name: 'Demo Site',
									description: '2 widgets',
									amount: 2000
								  });
								});
							  </script>
							</form>
						</div>
					</div>
				</div>
			</div>					
		</div>
    </div>
@endsection