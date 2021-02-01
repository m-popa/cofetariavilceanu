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
						<h6>E greu sa descrii in cateva randuri 20 de ani de existenta sau 35 de ani de experienta.</h6>
						<h6>35 ani de experienta sunt cei care in 20 de ani ne-au dus unde suntem si azi, un nume sinonim cu traditie, calitate, prospetime.</h6>
						<h6>Intr-o piata care se schimba atat de repede, in care doar ce este nou pare ca e bun, noi am ramas fideli ingredientelor simple, retetelor traditionale, daruintei si pasiunii pentru un desert mereu proaspat si bun.</h6>
						<h6>Pentru unii o simpla afacere, pentru noi un mod de a trai. Un mod in care ne-am dat seama ce inseamna responsabilitatea fata de clientii nostrii.</h6>
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
						<h1 class="text-white">08:00 - 19:00</h1>
					</div>
					<div class="sambata col-auto">
						<h5 class="sub-titlu mb-0">Sâmbătă</h5>
						<h1 class="text-white">08:00 - 16:00</h1>
					</div>
					<div class="col-auto">
						<h5 class="sub-titlu mb-0">Duminică</h5>
						<h1 class="text-danger">Închis</h1>
					</div>
				</div>
			</div>
		</section> 
	</div> 

	<div class="" id="jump"></div>
	@foreach($categories as $category)
	<section class="produse {{ strtolower($category->name) }} pt-5" id="torturi">
		<div class="container">
			<h1 class="text-white text-shadow "><span class="text-capitalize">{{ $category->name }}</span> | 
				<a class="h5 text-white" href="{{ route('categories.index', $category) }}">Vezi toate produsele</a>
			</h1>
			<div class="row mt-4">

				@foreach($category->products as $product)
					<div class="col-md-12 col-lg-6 mb-4">
						<div class="row no-gutters rounded shadow">
							<div class="col-lg-6 col-6 rounded-left" data-toggle="modal" data-target="#{{ $product->slug }}" style="background-image: url({{ $product->getFirstMediaUrl('images','home_images') }});">
								<i class="fas fa-eye m-3 p-1 text-white opacity-02" title="Aflați mai multe detalii"></i>
							</div>
							<div class="col-lg-6 col-6 bg-white rounded-right p-4">
								<h5 class="text-capitalize">{{ $product->name }}</h5>
								<p class="mb-3 d-none d-mb-block">{!! html_entity_decode($product->intro) !!}</p>
								<p>{{ $product->price }} / {{ $product->price_type_display }}</p>
							</div>
						</div>

						<div class="modal fade" id="{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="{{ $product->slug }}" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-xl">
								<div class="modal-content border-0 shadow-lg">
									<div class="row">
										<div class="col-lg-5 col-xl-4 p-5 d-flex-column align-self-center order-2 order-lg-1">
											<h1>{{ $product->name }}</h1>
											<p class="mb-5">{!! html_entity_decode($product->description) !!}</p>
											<h4>{{ $product->price }} lei/kg</h4>
											<a href="{{ route('product.show', $product) }}" class="mt-3 btn btn-outline-dark">Vezi produsul</a>
										</div>

										<div class="col-lg-7 col-xl-8 rounded-right order-1 order-lg-2" style="background-image: url({{ $product->getFirstMediaUrl('images','modal_images') }});">
											<i class="fas fa-2x fa-times-circle float-right mt-3 mr-3 p-1 text-white" data-dismiss="modal"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section> <!-- #torturi -->
	@endforeach

	<section class="produse {{ strtolower($gelaterie->name) }} pt-5" id="gelaterie">
		<div class="container">
			<h1 class="text-white text-shadow">{{ $gelaterie->name }} | <a class="h5 text-white" href="{{ route('categories.index', $gelaterie) }}">Vezi toate produsele</a></h1>

			<div class="row mt-4">
				@foreach($gelaterie->products as $product)
					<div class="col-sm-6 col-lg-3 mb-4">
						<div class="d-flex-column rounded shadow">
							<div class="rounded-left" data-toggle="modal" data-target="#{{ $product->slug }}" style="background-image: url({{ $product->getFirstMediaUrl('images','home_images') }});">
								<i class="fas fa-eye m-3 p-1 text-white opacity-02" title="Aflați mai multe detalii"></i>
								<i class="fas fa-star-half-alt text-white opacity-02" title="Produsul poate să conțină mai multe sortimente"></i>
							</div>
							<div class="bg-white rounded-bottom p-4">
								<h5 class="text-capitalize">{{ $product->name }}</h5>
								<p>{!!html_entity_decode($product->intro)!!}</p>
								<p class="mt-2">{{ $product->price }} lei/cupă</p>
							</div>
						</div>
					</div>
					<div class="modal fade" id="{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xl">
							<div class="modal-content border-0 shadow-lg">
								<div class="row">
									<div class="col-lg-6 col-xl-7 p-5 d-flex-column align-self-center order-2 order-lg-1">
										<h1>{{ $product->name }}</h1>
										<p class="mb-5">{!!html_entity_decode($product->description)!!}</p>
									</div>
									<div class="col-lg-6 col-xl-5 gelaterie rounded-right order-1 order-lg-2" style="background-image: url({{ $product->getFirstMediaUrl('images','modal_images') }});">
										<i class="fas fa-2x fa-times-circle float-right mt-3 mr-3 p-1 text-white" data-dismiss="modal"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section> 

</div>
@endsection
