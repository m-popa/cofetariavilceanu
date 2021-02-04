<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('product') }}'>Produse</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('price-type') }}'>Tipuri Preț</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('categories') }}'>Categorii</a></li>
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('order') }}'>Comenzi</a></li>
 --}}<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-user-plus"></i> Utilizatori/roluri</a>
	<ul class="nav-dropdown-items">
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon fa fa-user"></i> <span>Utilizatori</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon fa fa-group"></i> <span>Roluri</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon fa fa-key"></i> <span>Permisii</span></a></li>
	</ul>
</li>
