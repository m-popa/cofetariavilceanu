<div class="col-sm-6 col-lg-3 mb-4">
	
	<div class="d-flex-column rounded shadow">
		<div class="portrait landscape" data-toggle="modal" data-target="#{{ $product->slug }}" style="background-image:url('{{ $product->getFirstMediaUrl('images', 'home_images')}}');">
{{-- 			<i class="fas fa-eye m-3 p-1 text-white" title="Aflați mai multe detalii"></i>
			<i class="fas fa-star-half-alt text-white" title="Produsul poate să conțină mai multe sortimente"></i> --}}
		</div>

		@if($subcategory->disable_description == 0)
			<div class="bg-white portrait-content rounded-bottom p-4">
				<h5>{{ $product->title }}</h5>
				@if(!is_null($product->intro))
					<p class="mb-3">{!!html_entity_decode($product->intro)!!}</p>
				@endif
				<p class="">{{ $product->price }} Lei / {{ $product->priceType->name }}</p>
			</div>
		@endif


	</div>
</div>

<div class="modal fade" id="{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content border-0 shadow-lg">
			<div class="row">
				<i class="fas fa-2x fa-times-circle float-right mt-3 mr-3 p-1 text-dark close-modal" data-dismiss="modal"></i>
				<div class="col-lg-6 col-xl-7 p-5 d-flex-column align-self-center order-2">
					<h1>{{ $product->title }}</h1>
					<p class="my-3">{{ $product->price }} Lei / {{ $product->priceType->name }}</p>
					@if(!is_null($product->sku))
						<div class="my-3">
							Cod produs: <span class="font-weight-bold text-dark">{{ $product->sku }}</span>
						</div>
					@endif
					<p class="mb-5">{!!html_entity_decode($product->intro)!!}</p>
					<a href="{{ route('product.show', $product) }}" class="mt-3 btn btn-outline-dark">{{ $product->button_text }}</a>
				</div>
				<div class="col-lg-6 col-xl-5 rounded-right order-1" style="background-image:url('{{ $product->getFirstMediaUrl('images', 'modal_images')}}');">
				</div>
			</div>
		</div>
	</div>
</div>