@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

	<div class="shadow-xl">
		<header class="bun-venit">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 text-shadow">
						<h5>Bine ați venit!</h5>
						<h1 class="text-white mb-5">Cofetăria Vilceanu</h1>
						<h6>{!! nl2br($settings->homepage_text) !!}</h6>
						<a href="{{ route('contact') }}" role="button" class="btn btn-success px-4 py-2 mt-5 rounded-pill">Contactează-ne</a>
					</div>
				</div>
			</div>
		</header> <!-- bun-venit -->
		<div class="gradient-line"></div>
		<section class="program mb-5 py-5">
			<div class="container">
				<div class="row text-shadow">
					<div class="cand col">
						<h5 class="sub-titlu mb-0">Când ne puteți vizita</h5>
						<h1 class="text-white">Program</h1>
					</div>
					<div class="luni col-auto">
						<h5 class="sub-titlu mb-0">Luni - Vineri</h5>
						<h1 class="text-white">{{ $settings->monday_friday }}</h1>
					</div>
					<div class="sambata col-auto">
						<h5 class="sub-titlu mb-0">Sâmbătă</h5>
						<h1 class="text-white">{{ $settings->saturday }}</h1>
					</div>
					<div class="col-auto">
						<h5 class="sub-titlu mb-0">Duminică</h5>
						<h1 class="text-danger">{{ $settings->sunday }}</h1>
					</div>
				</div>
			</div>
		</section> 
	</div> 

	<div class="" id="jump"></div>
	@foreach($categories as $category)
	@if($category->homepage = 1)
	<section class="produse {{ strtolower($category->name) }} pt-5" id="torturi">
		<div class="container">
			<h1 class="text-white text-shadow "><span class="text-capitalize">{{ $category->name }}</span> | 
				<a class="h5 text-white" href="{{ route('categories.index', $category) }}">Vezi toate produsele</a>
			</h1>

			<div class="row mt-4">

				@foreach($category->products->take(4) as $product)
					@if($category->orientation != 2)
						@include('categories.orientation-portrait')
					@else
					<div class="col-sm-6 col-lg-3 mb-4">
						<div class="d-flex-column rounded shadow">
							<div class="portrait" data-toggle="modal" data-target="#{{ $product->slug }}" style="background-image:url('{{ $product->getFirstMediaUrl('images', 'home_images')}}');">
								<div class="m-3 p-1"></div>
{{-- 								<i class="fas fa-eye m-3 p-1 text-white" title="Aflați mai multe detalii"></i>
								<i class="fas fa-star-half-alt text-white" title="Produsul poate să conțină mai multe sortimente"></i> --}}
							</div>
							
							<div class="bg-white portrait-content rounded-bottom p-4">
								<h5>{{ $product->name }}</h5>
								@if(!is_null($product->intro))
									<p class="mb-3">{!!html_entity_decode($product->intro)!!}</p>
								@endif
								<p class="">{{ $product->price }} Lei / {{ $product->priceType->name }}</p>
							</div>
						</div>
					</div>

					<div class="modal fade" id="{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xl">
							<div class="modal-content border-0 shadow-lg">
								<div class="row">
									<i class="fas fa-2x fa-times-circle float-right mt-3 mr-3 p-1 text-dark close-modal" data-dismiss="modal"></i>
									<div class="col-lg-6 col-xl-7 p-5 d-flex-column align-self-center order-2">
										<h1>{{ $product->name }}</h1>
										<p>{{ $product->price }} Lei / {{ $product->priceType->name }}</p>
										<p class="mb-5">{!!html_entity_decode($product->description)!!}</p>
										<a href="{{ route('product.show', $product) }}" class="mt-3 btn btn-outline-dark">{{ $product->button_text }}</a>
									</div>
									<div class="col-lg-6 col-xl-5 rounded-right order-1" style="background-image:url('{{ $product->getFirstMediaUrl('images', 'modal_images')}}');">
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif	
				@endforeach
			</div>
		</div>
	</section> 
	@endif
	@endforeach

</div>
@endsection
