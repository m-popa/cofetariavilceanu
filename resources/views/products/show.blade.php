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
						@foreach( $gallery as $image )
						   <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
						@endforeach
					</ol>
					<div class="carousel-inner">
						@foreach($gallery as $image)
						<div class="carousel-item img-fluid {{ $loop->first ? 'active' : '' }}"" >
							<img src="{{ $image->getUrl() }}" class="d-block w-100 rounded-top shadow-xl img-fluid" alt="{{ $image->title }}" style="max-height:600px;object-fit:cover;">
						</div>
						@endforeach
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-12">
				<div class="bg-white p-5 rounded-bottom shadow-xl mb-5">
					<h3 class="mb-4">Informații </h3>
					<p>{!!html_entity_decode($product->description)!!}</p>
					<div class="h3 d-block mt-5">{{ $product->price }} Lei / {{ $product->priceType->name }}</div>
				</div>
			</div>
		</div>
	</div>
@endsection