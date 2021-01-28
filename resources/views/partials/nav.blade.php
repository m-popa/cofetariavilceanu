<nav class="sticky-top shadow-xl">
	<div class="container">
		<div class="row py-4">
			<div class="col text-center">
				<a href="tel:0769098648" role="button" class="btn btn-outline-light px-4 mr-3 rounded-pill float-left float-md-none d-inline-block d-md-none"><i class="fas fa-phone"></i></a>
				<a href="{{ route('home') }}" role="button" class="btn btn-outline-light px-4 mr-3 rounded-pill float-left float-md-none d-none d-md-inline-block active"><i class="fas fa-home d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Acasă</span></a>
				<div class="dropdown d-inline-block">
					<a href="#" role="button" class="btn btn-outline-light px-4 mr-3 rounded-pill d-none d-md-inline-block" id="dropdownTorturi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Torturi</a>
					<div class="dropdown-menu mt-2" aria-labelledby="dropdownTorturi">
						<a class="dropdown-item" href="#">Sub Categorie</a>
						<a class="dropdown-item" href="#">Sub Categorie</a>
						<a class="dropdown-item" href="#">Sub Categorie</a>
					</div>
				</div>
				<div class="dropdown d-inline-block">
					<a href="#" role="button" class="btn btn-outline-light px-4 mr-3 rounded-pill d-none d-md-inline-block" id="dropdownCofetarie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="d-none d-lg-inline-block">Produse de</span> Cofetărie</a>
					<div class="dropdown-menu mt-2" aria-labelledby="dropdownCofetarie">
						<a class="dropdown-item" href="#">Sub Categorie</a>
						<a class="dropdown-item" href="#">Sub Categorie</a>
						<a class="dropdown-item" href="#">Sub Categorie</a>
					</div>
				</div>
				<div class="dropdown d-inline-block">
					<a href="#" role="button" class="btn btn-outline-light px-4 mr-3 rounded-pill d-none d-md-inline-block" id="dropdownPatiserie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="d-none d-lg-inline-block">Produse de</span> Patiserie</a>
					<div class="dropdown-menu mt-2" aria-labelledby="dropdownPatiserie">
						<a class="dropdown-item" href="#">Sub Categorie</a>
						<a class="dropdown-item" href="#">Sub Categorie</a>
						<a class="dropdown-item" href="#">Sub Categorie</a>
					</div>
				</div>
				<div class="dropdown d-inline-block">
					<a href="#" role="button" class="btn btn-outline-light px-4 rounded-pill d-none d-md-inline-block" id="dropdownGelaterie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gelaterie</a>
					<div class="dropdown-menu mt-2" aria-labelledby="dropdownGelaterie">
						<a class="dropdown-item" href="#">Sub Categorie</a>
						<a class="dropdown-item" href="#">Sub Categorie</a>
						<a class="dropdown-item" href="#">Sub Categorie</a>
					</div>
				</div>
				<a href="#jump" role="button" class="btn btn-outline-light px-4 mr-3 rounded-pill  d-inline-block d-md-none"><i class="fas fa-arrow-circle-down"></i></a>
				<div class="dropdown d-inline-block float-right float-md-none">
					<a href="#" role="button" class="btn btn-outline-light px-4 rounded-pill d-inline-block d-md-none float-right" id="responsiveMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></a>
					<div class="dropdown-menu dropdown-menu-right border-0 shadow-xl mt-3" aria-labelledby="responsiveMenu">
						<a class="dropdown-item py-2 disabled" href="#">Cofetăria Vilceanu</a>
						<a class="dropdown-item py-2 active" href="{{ route('home') }}">Acasă</a>
						<a class="dropdown-item py-2" href="#">Sub Categorie</a>
						<a class="dropdown-item py-2" href="#">Sub Categorie</a>
						<a class="dropdown-item py-2" href="#">Sub Categorie</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item py-2" href="{{ route('contact') }}">Contactează-ne</a>
					</div>
				</div>
				<a href="{{ route('contact') }}" role="button" class="btn btn-outline-light px-4 ml-3 rounded-pill float-left float-md-none d-none d-lg-inline-block"><i class="fas fa-home d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Contact</span></a>
			</div>
		</div>
	</div>
</nav>