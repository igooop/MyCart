@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
							</div>
							<div class="col-xs-6">
								<a href="{{ url('/home')}}" type="button" class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span>
									Continue shopping
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					@foreach($carts as $cart)
					<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="{{ $cart -> image }}">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong>{{ $cart -> Productname }}</strong></h4><h4><small>Product description</small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong>$ {{ $cart -> price }} <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<form action="/update" method="post">
									{{ csrf_field() }}
									<input type="number" min="1" max="5" name="quantity" class="form-control input-sm" value="{{ $cart -> quantity }}">
									<input type="hidden" name="productID" value="{{ $cart -> productID }}">
									<input type="hidden" name="CusID" value="{{ $cart -> CusID }}">

									<button type="submit" class="btn btn-link btn-xs">
										<span class="glyphicon glyphicon-check"></span>
										Update!
									</button>
								</form>
							</div>
							<div class="col-xs-2">
								<form action="/delete" method="post">
									{{ csrf_field() }}
									<input type="hidden" name="productID" value="{{ $cart -> productID }}">
									<input type="hidden" name="CusID" value="{{ $cart -> CusID }}">

									<button type="submit" class="btn btn-link btn-xs">
										<span class="glyphicon glyphicon-trash"> </span>
									</button>
								</form>
							</div>
						</div>
					</div>
					<hr>
					@endforeach
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total <strong>$
							<?php $total = 0; ?>
							@foreach ($carts as $cart)
							<?php
								$price = $cart -> price;
								$quantity = $cart -> quantity;
								$each = $price * $quantity;

								$total += $each; 
							?>
							@endforeach
							{{ $total }}
							</strong></h4>
						</div>
						<div class="col-xs-3">
							<button type="button" class="btn btn-success btn-block">
								Checkout
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection