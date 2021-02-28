<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('product') }}'>
	<i class="las la-birthday-cake mr-3"></i>Produse</a>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('price-type') }}'>
	<i class="las la-money-bill-wave mr-3"></i>Tipuri Preț</a>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('categories') }}'>
	<i class="las la-globe mr-3"></i> Categorii</a>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('gallery') }}'>
	<i class="las la-image mr-3"></i> Galerie Foto</a>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'>
	<i class="las la-book-reader mr-3"></i> <span>Pagini</span></a>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('testimonial') }}'>
	<i class="lab la-readme mr-3"></i> Ce spun clienții</a>
</li>
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('order') }}'>Comenzi</a></li>
--}}

<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-user-plus"></i> Utilizatori/roluri</a>
	<ul class="nav-dropdown-items">
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon fa fa-user"></i> <span>Utilizatori</span></a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon fa fa-group"></i> <span>Roluri</span></a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon fa fa-key"></i> <span>Permisii</span></a></li>
	</ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> Setări Site</a></li>


