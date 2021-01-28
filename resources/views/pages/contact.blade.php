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
		</section> <!-- program -->
	</div> <!-- shadow-xl -->
	
	<div class="" id="jump"></div>

	<div class="faina">
		<section class="contact py-5 mb-5">
			<div class="container">
				<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vilceanu</h5>
				<h1 class="text-white text-shadow">Cum ne puteți contacta</h1>
				<div class="contact-complet row mt-4">
					<div class="col-4 d-none d-lg-inline-block pr-0">
						<div class="imagine-contact h-100 shadow-xl rounded-left d-flex align-items-end" style="">
							<div class="pl-4 pb-4">
								<h6 class="text-white mb-1 text-shadow">Ne puteți contacta și telefonic</h6>
								<h2 class="text-white text-shadow">(0769) 098-648</h2>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-8 bg-white p-5 shadow-xl rounded-right">
						<form id="contact-form" method="post" action="" role="form">
							<div class="messages"></div>
							<div class="controls">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_name">Nume *</label>
											<input id="form_name" type="text" name="name" class="form-control" required="required" data-error="Numele este obligatoriu.">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_lastname">Prenume</label>
											<input id="form_lastname" type="text" name="surname" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_email">Email *</label>
											<input id="form_email" type="email" name="email" class="form-control" required="required" data-error="Adresa de Email este obligatorie.">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_need">Despre ce vreți să vorbim ? (Opțional)</label>
											<select id="form_need" name="need" class="form-control" data-error="Please specify your need.">
												<option value=""></option>
												<option value="Vreau să comand un tort">Vreau să comand un tort</option>
												<option value="Vreau să comand produse de Cofetărie">Vreau să comand produse de Cofetărie</option>
												<option value="Vreau să comand produse de Patiserie">Vreau să comand produse de Patiserie</option>
												<option value="Vreau să comand produse de Gelaterie">Vreau să comand produse de Gelaterie</option>
												<option value="Am o intrebare despre ingrediente">Am o intrebare despre ingrediente</option>
												<option value="Vreau să aflu mai multe informații despre alergeni">Vreau să aflu mai multe informații despre alergeni</option>
												<option value="Despre altceva">Despre altceva</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="form_message">Mesaj *</label>
											<textarea id="form_message" name="message" class="form-control" rows="4" required="required" data-error="Vă rugăm să completați acest câmp."></textarea>
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
					<h1 class="text-white text-shadow">Aleea Digului, Targu Jiu, Gorj</h1>
				</div>
				<h5 class="sub-titlu mb-0 text-shadow">Cofetăria Vilceanu</h5>
				<h1 class="text-white text-shadow">Unde ne puteți găsi</h1>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11278.083594174032!2d23.266114!3d45.0346504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa0bf574d74ab3c45!2zQ29mZXTEg3JpYSBWw65sY2VhbnU!5e0!3m2!1sro!2sro!4v1611851770665!5m2!1sro!2sro" width="100%" height="350px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

			</div>
		</section>
		

@endsection