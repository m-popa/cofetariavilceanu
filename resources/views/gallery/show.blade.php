@extends('layouts.app')

@section('content')
@push('header-styles')
	<link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
@endpush
<div class="container py-5" id="content">
	<a href="{{ URL::previous() }}" class="text-white h5">
		<i class="fas fa-2x fa-times-circle float-right mr-3 p-1 text-white"></i></a>
	<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vilceanu</h5>
	<h1 class="text-white text-shadow">{{ $gallery->name }}</h1>

	<div class="row no-gutters my-4">
	  <div class="card-columns">
	    @foreach($gallery->media()->simplePaginate(40) as $media)
		    <div class="card border-0">

		    <a data-fancybox="gallery" href="{{ $media->getUrl('gallery_images') }}">

		    	<span class="badge badge-light position-absolute z-index" style="right: 10px; top: 5px;">
		    		<div class="h5 align-middle">{{ $loop->iteration }}</div>
		    	</span>

		    	<img class="card-img-top rounded-0 shadow" 
		    	src="{{ $media->getUrl('gallery_images') }}" alt="{{ $gallery->name }}">
		    </a>
		    </div>
	    @endforeach

	  </div>
	  {{ $gallery->media()->simplePaginate()->links() }}
	</div>

</div>
@endsection

@push('footer-scripts')
	<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
@endpush