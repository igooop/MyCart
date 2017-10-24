@extends('layouts.app')

<style type="text/css">
  .product_view .modal-dialog{max-width: 800px; width: 100%;}
  .pre-cost{text-decoration: line-through; color: #a5a5a5;}
  .space-ten{padding: 10px 0;}
</style>

@section('content')

<div class="container">
    <div class="row">
    @foreach ($products as $product)
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="{{ $product -> Itempic }}" alt="">
            <div class="caption">
              <h4 class="pull-right">$ {{ $product -> price }} </h4>
              <h4><a href="#"> {{ $product -> ItemName }}</a></h4>
              <p>Doghy, Catty, Doge for sale .</p>
            </div>
            <div class="ratings">
              <p>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                 (15 reviews)
              </p>
            </div>
            <div class="space-ten"></div>
            <div class="btn-ground text-center">
              <form action="/add-cart" method="post">
              {{ csrf_field() }}
                <input type="hidden" name="price" value="{{ $product -> price }}">
                <input type="hidden" name="Productname" value="{{ $product -> ItemName }}">
                <input type="hidden" name="quantity" value="{{ $product -> quantity }}">
                <input type="hidden" name="image" value="{{ $product -> Itempic }}">
                <input type="hidden" name="productID" value="{{ $product -> productId }}">
                <input type="hidden" name="cusID" value="{{ Auth::user()->id }}">

                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
              </form>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $product->id }}"><i class="fa fa-search"></i> Quick View</button>
            </div>
            <div class="space-ten"></div>
          </div>
        </div>
    @endforeach
    </div>
</div>
@foreach ($products as $product)
<div class="modal fade product_view" id="{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">PetMarlou</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img src=" {{ $product->Itempic }} " class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        <h4>Product Id: <span>51526</span></h4>
                        <div class="rating">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            (10 reviews)
                        </div>
                        <p>Dogeeeeeeeeeeee for sale.</p>
                        <h3 class="cost"><span class="glyphicon glyphicon-usd"></span> {{ $product -> price }} <small class="pre-cost"><span class="glyphicon glyphicon-usd"></span> 60000000.00</small></h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <select class="form-control" name="select">
                                    <option value="" selected="">Color</option>
                                    <option value="black">Black</option>
                                    <option value="white">White</option>
                                    <option value="gold">Gold</option>
                                    <option value="rose gold">Rose Gold</option>
                                </select>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <select class="form-control" name="select">
                                    <option value="">Age</option>
                                    <option value="">1 month</option>
                                    <option value="">2 month</option>
                                    <option value="">5 month</option>
                                    <option value="">1 year</option>
                                </select>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-12">
                                <select class="form-control" name="select">
                                    <option value="" selected="">QTY</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                        <form action="/home" method="POST"></form>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-heart"></span> Add To Wishlist</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
