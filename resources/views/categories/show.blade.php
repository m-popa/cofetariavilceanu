@extends('layouts.app')

@section('content')

<section class="produse torturi faina py-5" id="torturi">
	<div class="container">
			<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vilceanu</h5>

			<h1 class="text-white text-shadow text-cappitalize">{{ $category->name }}</h1>

			<div class="row mt-4">
			@foreach($category->products as $product)
					<div class="col-md-12 col-lg-6 mb-4">
						<div class="d-flex rounded shadow">
							<div class="w-50 rounded-left" data-toggle="modal" data-target="#{{ $product->slug }}" style="background-image: url({{ $product->getFirstMediaUrl('images') }});">
								<i class="fas fa-eye m-3 p-1 text-white" title="Aflați mai multe detalii"></i>
							</div>
							<div class="w-50 bg-white rounded-right p-4">
								<h5>{{ $product->name }}</h5>
								<p class="mb-3">{{  strip_tags($product->description) }}</p>
								<p>{{ $product->price }} / {{ $product->price_type_display }}</p>
							</div>
						</div>
					</div>
					<div class="modal fade" id="{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xl">
							<div class="modal-content border-0 shadow-lg">
								<div class="row">
									<div class="col-lg-5 col-xl-4 p-5 d-flex-column align-self-center">
										<h1>Tort cu cremă de ciocolată și frișcă</h1>
										<p class="mb-5">{{  strip_tags($product->description) }}</p>
										<h4>{{ $product->price }} / {{ $product->price_type_display }}</h4>
									</div>
									<div class="col-lg-7 col-xl-8 rounded-right" style="background-image: url({{ $product->getFirstMediaUrl('images') }});">
										<i class="fas fa-2x fa-times-circle float-right mt-3 mr-3 p-1 text-white" data-dismiss="modal"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
	</div>

@endsection