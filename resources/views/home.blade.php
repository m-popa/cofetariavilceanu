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
						@include('categories.orientation-landscape')
					@endif	
				@endforeach
			</div>
		</div>
	</section> 
	@endif
	@endforeach

</div>
@endsection
