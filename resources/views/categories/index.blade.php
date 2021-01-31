@extends('layouts.app')

@section('content')

<section class="produse torturi faina py-5" id="torturi">
	<div class="container">
		<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vilceanu</h5>
		@foreach($category->children as $subcategory)
			@if($subcategory->products->count() >= 1)	
				<h1 class="text-white text-shadow text-capitalize">
					{{ $subcategory->name }}
				</h1>
			@endif

			<div class="row my-4">
				@foreach($subcategory->products as $product)
					<div class="col-md-12 col-lg-6 mb-4">
						<div class="d-flex rounded shadow">
							<div class="w-50 rounded-left" data-toggle="modal" data-target="#{{ $product->slug }}" style="background-image: url({{ $product->getFirstMediaUrl('images', 'home_images') }});">
								<i class="fas fa-eye m-3 p-1 text-white opacity-02" title="Aflați mai multe detalii"></i>
							</div>
							<div class="w-50 bg-white rounded-right p-4">
								<h5>{{ $product->name }}</h5>
								<p class="mb-3 d-none d-md-block">{!!html_entity_decode($product->intro)!!}</p>
								<p>{{ $product->price }} / {{ $product->price_type_display }}</p>
							</div>
						</div>
					</div>
					<div class="modal fade" id="{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xl">
							<div class="modal-content border-0 shadow-lg">
								<div class="row">
									<div class="col-lg-5 col-xl-4 p-5 d-flex-column align-self-center order-2 order-lg-1">
										<h1>Tort cu cremă de ciocolată și frișcă</h1>
										<p class="mb-5">{!!html_entity_decode($product->description)!!}</p>
										<h4>{{ $product->price }} / {{ $product->price_type_display }}</h4>
									</div>
									<div class="col-lg-7 col-xl-8 rounded-right order-1 order-lg-2" style="background-image: url({{ $product->getFirstMediaUrl('images', 'modal_images') }});">
										<i class="fas fa-2x fa-times-circle float-right mt-3 mr-3 p-1 text-white" data-dismiss="modal"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
			</div>
			@endforeach
	</div>
@endsection