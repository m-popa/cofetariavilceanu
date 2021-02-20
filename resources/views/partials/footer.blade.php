<div class="gradient-line"></div>
<footer class="footer pt-5 pb-4">
	<div class="container">
		{{-- <h3 class="">Ce spun clienții nostri | <br class="d-none d-md-none"> <span class="h6 text-white">Clienții vorbesc pentru noi</span></h3> --}}
		<div id="carouselExampleControls" class="carousel d-none slide mt-4" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="row">
						<div class="col-sm-12 col-md-6 mb-4">
							<div class="bg-dark text-white p-4 rounded shadow">
								<div class="stele float-right">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<h5>Elena Loredana U.</h5>
								<p>Cele mai bune prăjituri și torturi. Sunt foarte mulțumită și recomand cu încredere pentru toți oameni. <br> Întotdeauna iau numai de la Cofetăria Vilceanu au cele mai bune produse. <a href="https://www.facebook.com/cofetariavilceanu/" class="text-muted">@cofetariavilceanu</a></p>
							</div>
						</div>
						<div class="col-sm-12 col-md-6">
							<div class="bg-dark text-white p-4 rounded shadow">
								<div class="stele float-right">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<h5>Andreea Mădălina R.</h5>
								<p>Același gust de când eram mică! Prăjiturile sunt mereu proaspete și bine însiropate iar înghețata e cea mai bună! Cât despre ingredientele folosite e clar că acestea sunt naturale. Și un mare plus pentru personal. Mereu ospitalier și cu zâmbetul pe buze. <a href="https://www.facebook.com/cofetariavilceanu/" class="text-muted">@cofetariavilceanu</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="row">
						<div class="col-sm-12 col-md-6 mb-4">
							<div class="bg-dark text-white p-4 rounded shadow">
								<div class="stele float-right">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<h5>Elena E.</h5>
								<p>Prajituri în care regăsesc gustul celor din copilarie, înghetata excelentă și o servire ireproșabilă! <br> Singura cofetarie din oras în care mai intru. <br> Felicitări !. <a href="https://www.facebook.com/cofetariavilceanu/" class="text-muted">@cofetariavilceanu</a></p>
							</div>
						</div>
						<div class="col-sm-12 col-md-6">
							<div class="bg-dark text-white p-4 rounded shadow">
								<div class="stele float-right">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<h5>Elena Ruxandra T.</h5>
								<p>Cofetaria copilăriei mele. Produsele acestei cofetării sunt la fel ca acum mai bine de 20 de ani, PERFECTE. Felicitări pentru calitate și ospitalitate! Sunt niște oameni deosebiți, pentru care respectul față de client este prioritar. <a href="https://www.facebook.com/cofetariavilceanu/" class="text-muted">@cofetariavilceanu</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12">
				<h3 class="mb-3">
					Servicii | 
					<br class="d-block d-md-none"> 
					@php
						$categories = App\Models\Category::whereNull('parent_id')->get();
					@endphp
					@foreach ($categories as $category)
						<a class="h6 text-white mr-3 text-capitalize" href="{{ $category->url }}">{{ $category->name }}</a> 
					@endforeach
				</h3>
				<h3>
		
					Social Media | 
					<br class="d-block d-md-none"> 
					<a class="h6 text-white mr-3" href="https://www.facebook.com/cofetariavilceanu" target="_blank">Facebook</a>
					<a href="https://api.whatsapp.com/send?phone=+40769098648" class="h6 text-white mr-3">Whatsapp</a>
				</h3>
			</div>
			<div class="drepturi col-12 mt-4 pt-4">		
				<a class="h6 text-white float-none float-sm-right" href="{{ route('contact') }}">Contactează-ne</a>
				<br class="d-block d-sm-none">
				<span class="h6 text-white">© {{ now()->year }} Cofetaria Vilceanu. Toate drepturile rezervate.</span>
			</div>
		</div>
	</div>
</footer>