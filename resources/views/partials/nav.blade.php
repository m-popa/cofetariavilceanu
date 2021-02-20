<nav class="sticky-top shadow-xl">
	<div class="container">
		<div class="row py-4">
			<div class="col text-center">
				<a href="tel:0769098648" role="button" class="btn btn-outline-light px-4 mr-3 rounded-pill float-left float-md-none d-inline-block d-md-none"><i class="fas fa-phone"></i></a>
				<a href="{{ route('home') }}" role="button" class="{{ (request()->route()->getName() == 'home') ? 'active' : '' }} btn btn-outline-light px-4 mr-3 rounded-pill float-left float-md-none d-none d-md-inline-block"><i class="fas fa-home d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Acasă</span></a>
				@php
					$categories = App\Models\Category::whereNull('parent_id')->where('id', '!=', 28)->get();
				@endphp

				@foreach($categories as $category)
					<div class="dropdown d-inline-block">
						<a href="{{ $category->url }}" role="button" class="{{ (request()->segment(2) == $category->slug) ? 'active' : '' }} text-capitalize btn btn-outline-light px-4 mr-3 rounded-pill d-none d-md-inline-block">
							{{ $category->name }}
						</a>
					</div>
				@endforeach
				<a href="#jump" role="button" class="btn btn-outline-light px-4 mr-3 rounded-pill  d-inline-block d-md-none"><i class="fas fa-arrow-circle-down"></i></a>

				<div class="dropdown d-inline-block float-right float-md-none">
					<a href="#" role="button" class="btn btn-outline-light px-4 rounded-pill d-inline-block d-md-none float-right" id="responsiveMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></a>
					<div class="dropdown-menu dropdown-menu-right border-0 shadow-xl mt-3" aria-labelledby="responsiveMenu">
						<a class="dropdown-item py-2 disabled" href="#">Cofetăria Vilceanu</a>
						<a class="dropdown-item py-2" href="{{ route('home') }}">Acasă</a>
						@foreach($categories as $category)
							<a class="dropdown-item py-2" href="{{ $category->url }}">{{ $category->name }}</a>
						@endforeach
						<a class="dropdown-item py-2" href="{{ route('contact') }}">Contactează-ne</a>
					</div>
				</div>
				<a href="{{ route('contact') }}" role="button" class="{{ (request()->route()->getName() == 'contact') ? 'active' : '' }} btn btn-outline-light px-4 rounded-pill float-left float-md-none d-none d-lg-inline-block"><i class="fas fa-home d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Contact</span></a>
			</div>
		</div>
	</div>
</nav>