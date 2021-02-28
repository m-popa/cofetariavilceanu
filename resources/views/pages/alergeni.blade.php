@extends('layouts.app')

@section('content')

<div class="container py-5" id="content">
	<a href="{{ URL::previous() }}" class="text-white h5">
		<i class="fas fa-2x fa-times-circle float-right mr-3 p-1 text-white"></i></a>
	<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vilceanu</h5>
	<h1 class="text-white text-shadow">{{ $page->title }}</h1>

	<div class="row no-gutters my-4 text-white">
		{!! $page->content !!}
	</div>

</div>
@endsection
