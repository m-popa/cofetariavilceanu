@extends('layouts.app')

@section('content')

<section class="produse torturi faina py-5" id="torturi">
	<div class="container">
		<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vîlceanu</h5>

		@foreach($category->childrens as $subcategory)
			@if(!is_null($subcategory->title))
				<h1 class="text-white text-shadow">{{ $subcategory->title }}</h1>
			@endif

			<div class="row produse my-4" id="{{ $subcategory->slug }}">
				@foreach($subcategory->products as $key => $product)
                    @include('categories/' . $subcategory->orientation_blade)
				@endforeach
				@if(!is_null($subcategory->gallery))
					<a href="{{ route('gallery.show', $subcategory->gallery) }}" 
						class="mt-3 btn btn-light rounded-pill btn-lg text-dark mx-auto">Vezi Galeria</a>
				@endif
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
