@extends('layouts.app')

@section('content')
<section class="produse faina py-5" id="torturi">
	<div class="container">
		<h5 class="sub-titlu mb-0 text-shadow">Torturi</h5>
		<h1 class="text-white text-shadow">{{ $product->name }}</h1>
		<div class="row mt-4">
			<div class="col-12">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@foreach($gallery as $image)
							<li data-target="#{{ $image->slug }}" data-slide-to="0" class="active"></li>
						@endforeach
					</ol>
					<div class="carousel-inner">
						@foreach($gallery as $image)
						<div class="carousel-item active">
							<img src="{{ $image->getUrl() }}" class="d-block w-100 rounded-top shadow-xl" alt="{{ $image->title }}">
						</div>
						@endforeach
					</div>
					<a class="carousel-control-prev" href="#{{ $product->slug }}" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#{{ $product->slug }}" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-12">
				<div class="bg-white p-5 rounded-bottom shadow-xl mb-5">
					<h3 class="mb-4">Informații </h3>
					<p>{!!html_entity_decode($product->description)!!}</p>
					<div class="h3 d-block mt-5">{{ $product->price }} lei / {{ $product->price_type_display }}</div>
				</div>
			</div>
		</div>
	</div>
@endsection