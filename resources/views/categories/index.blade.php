@extends('layouts.app')

@section('content')

<section class="produse torturi faina py-5" id="torturi">
	<div class="container">
		<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vilceanu</h5>
		@foreach($category->children as $subcategory)

			@if($subcategory->products->count() >= 1)	
			<h1 class="text-white text-shadow text-capitalize">
				{{ $subcategory->name }}  
				@if($subcategory->products->count() >= 4)	
				@endif
			</h1>
			@endif

			<div class="row produse my-4">
				@foreach($subcategory->products as $key => $product)
					@if($subcategory->orientation != 2)
						@include('categories.orientation-portrait')
					@else
						@include('categories.orientation-landscape')
					@endif		
				@endforeach
			</div>

		@endforeach


	</div>
	@endsection

	@push('footer-scripts')
	<script type="text/javascript">
	jQuery(".showprod").click(function() {
	    var products = jQuery('.products');
	    for (var i = 1; i < products.length; i++) {
	        $('#product' + i).toggleClass('d-none');
	    }
	});
	</script>
@endpush