@extends('layouts.app')

@section('content')
<div class="container-fluid">

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
	<section class="produse torturi pt-5" id="torturi">
		<div class="container">
			<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vilceanu</h5>

			<h1 class="text-white text-shadow">Torturi | <a class="h5 text-white" href="#">Vezi toate produsele</a></h1>

			<div class="row mt-4">

				@foreach($products as $product)
					<div class="col-md-12 col-lg-6 mb-4">
						<div class="d-flex rounded shadow">
							<div class="w-50 rounded-left" data-toggle="modal" data-target="#{{ $product->slug }}" style="background-image: url({{ $product->getFirstMediaUrl('images') }});">
								<i class="fas fa-eye m-3 p-1 text-white" title="Aflați mai multe detalii"></i>
							</div>
							<div class="w-50 bg-white rounded-right p-4">
								<h5>{{ $product->name }}</h5>
								<p class="mb-3">{!! $product->description !!}</p>
								<p>33 lei/kg</p>
							</div>
						</div>
					</div>
					<div class="modal fade" id="{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xl">
							<div class="modal-content border-0 shadow-lg">
								<div class="row">
									<div class="col-lg-5 col-xl-4 p-5 d-flex-column align-self-center">
										<h1>{{ $product->name }}</h1>
										<p class="mb-5">{!! $product->description !!}</p>
										<h4>{{ $product->price }} lei/kg</h4>
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
	</section> <!-- #torturi -->

</div>
@endsection
