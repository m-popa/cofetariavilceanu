<div class="gradient-line"></div>
<footer class="footer pt-5 pb-4">
	<div class="container">
		<div class="testimonials d-none">
			<h3 class="">Ce spun clienții noștri | <br class="d-none d-md-none"> 
				<span class="h6 text-white">Clienții vorbesc pentru noi</span>
			</h3>
			<div id="carouselExampleControls" class="carousel slide mt-4" data-ride="carousel">
				<div class="carousel-inner">

					@foreach ($testimonials as $testimonialsChunk)
					<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
						<div class="row">
							@foreach ($testimonialsChunk as $testimonial)
							<div class="col-6 mb-6">
								<div class="bg-dark text-white p-4 rounded shadow">
									<div class="stele float-right">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									</div>
									<h5>{{ $testimonial->name }}</h5>
									<p>{{ $testimonial->description }} 
										<a href="https://www.facebook.com/cofetariavilceanu/" class="text-muted">@cofetariavilceanu</a>
									</p>
								</div>
							</div>
							@endforeach

						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12">
				<h3 class="mb-3">
					Servicii | 
					<br class="d-block d-md-none"> 
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
				<a href="{{ route('contact') }}" 
				class="h6 text-white float-none mr-2 float-sm-right">Contactează-ne</a>
				<a href="https://anpc.ro/" 
				class="h6 text-white float-none mr-2 float-sm-right" target="_blank">ANPC</a>
				<a href="alergeni" 
				class="h6 text-white float-none mr-2 float-sm-right">Alergeni</a>
				<br class="d-block d-sm-none">
				<span class="h6 text-white d-block mt-3 m-lg-0">© {{ now()->year }} Cofetaria Vilceanu. Toate drepturile rezervate.</span>
			</div>
		</div>
	</div>
</footer>