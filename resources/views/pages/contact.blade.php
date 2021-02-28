@extends('layouts.app')

@section('content')

	<div class="shadow-xl">
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
						<h1 class="text-white font-secondary font-weight-bold">{{ $settings->monday_friday }}</h1>
					</div>
					<div class="sambata col-auto">
						<h5 class="sub-titlu mb-0">Sâmbătă</h5>
						<h1 class="text-white font-secondary font-weight-bold">{{ $settings->saturday }}</h1>
					</div>
					<div class="col-auto">
						<h5 class="sub-titlu mb-0">Duminică</h5>
						<h1 class="text-danger">{{ $settings->sunday }}</h1>
					</div>
				</div>
			</div>
		</section> <!-- program -->
	</div> <!-- shadow-xl -->
	
	<div class="" id="jump"></div>

	<div class="faina">
		<section class="contact py-5 mb-5">
			<div class="container">
				<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vîlceanu</h5>
				<h1 class="text-white text-shadow">Cum ne puteți contacta</h1>
				<div class="contact-complet row mt-4">
					<div class="col-4 d-none d-lg-inline-block pr-0">
						<div class="imagine-contact h-100 shadow-xl rounded-left d-flex align-items-end" style="">
							<div class="pl-4 pb-4">
								<h6 class="text-white mb-1 text-shadow">Ne puteți contacta și telefonic</h6>
								<h2 class="text-white text-shadow font-secondary">(0769) 098-648</h2>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-8 bg-white p-5 shadow-xl rounded-right">

						@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif

						@if(session()->has('message'))
						    <div class="alert alert-success">
						        {{ session()->get('message') }}
						    </div>
						@endif

						<form id="contact-form" method="post" action="{{ route('contact.store') }}" role="form">
							@csrf
							<div class="messages"></div>
							<div class="controls">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_name">Nume *</label>
											<input id="form_name" type="text" name="first_name" 
												value="{{ old('first_name') }}"
												class="form-control @error('first_name') is-invalid @enderror" data-error="Numele este obligatoriu.">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_lastname">Prenume</label>
											<input id="form_lastname" type="text" name="last_name" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_email">Email *</label>
											<input id="form_email" type="email" name="email" 
												value="{{ old('email') }}"
												class="form-control @error('email') is-invalid @enderror">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_need">Despre ce vreți să vorbim ? (Opțional)</label>
											<select id="form_need" name="subject" 
												value="{{ old('subject') }}"
												class="form-control @error('subject') is-invalid @enderror">
												<option value="0" selected >Alegeți un subiect</option>
												<option value="Vreau să comand un tort"
													@if(old('subject') === 'Vreau să comand un tort') 
													selected @endif
												>Vreau să comand un tort</option>
												<option value="Vreau să comand produse de Cofetărie"
													@if(old('subject') === 'Vreau să comand produse de Cofetărie') 
													selected @endif
												>Vreau să comand produse de Cofetărie</option>
												<option value="Vreau să comand produse de Patiserie"
													@if(old('subject') === 'Vreau să comand produse de Patiserie') 
													selected @endif
												>Vreau să comand produse de Patiserie</option>
												<option value="Vreau să comand produse de Gelaterie"
													@if(old('subject') === 'Vreau să comand produse de Gelaterie') 
													selected @endif
												>Vreau să comand produse de Gelaterie</option>
												<option value="Detalii despre livrare"
													@if(old('subject') === 'Detalii despre livrare') 
													selected @endif
												>Detalii despre livrare</option>
												<option value="Vreau să aflu mai multe informații despre alergeni"
													@if(old('subject') === 'Vreau să aflu mai multe informații despre alergeni') 
													selected @endif
												>Vreau să aflu mai multe informații despre alergeni</option>
												<option value="Despre altceva" 
													@if(old('subject') === 'Despre altceva') selected @endif>Despre altceva</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="form_message">Mesaj *</label>
											<textarea id="form_message" name="message" 
												class="form-control @error('message') is-invalid @enderror" rows="4">{{ old('message') }}</textarea>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-12 mb-3">
										<p class="text-muted">Câmpurile marcate cu <strong>*</strong> sunt obligatorii.</p>
									</div>
									<div class="col-md-12">
										<input type="submit" class="btn btn-danger px-4 py-2 rounded-pill" value="Trimite Mesajul">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section> <!-- contact -->

		<section class="mb-5">
			<div class="container">
				<div class="adresa float-none float-xl-right">
					<h5 class="sub-titlu mb-0 text-shadow">Adresă</h5>
					<h1 class="text-white text-shadow">Aleea Digului, Târgu Jiu, Gorj</h1>
				</div>
				<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vilceanu</h5>
				<h1 class="text-white text-shadow">Unde ne puteți găsi</h1>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11278.083594174032!2d23.266114!3d45.0346504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa0bf574d74ab3c45!2zQ29mZXTEg3JpYSBWw65sY2VhbnU!5e0!3m2!1sro!2sro!4v1611851770665!5m2!1sro!2sro" width="100%" height="350px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

			</div>
		</section>
		

@endsection