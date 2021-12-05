<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>

			<link rel = "stylesheet" href = "{{asset('css/box_alert.css')}}">
		    @include('layouts.head',['nom_page'=>'Contact'])
		</head>
		<body>
			<header id = "header" id = "home">
	  		    @include('layouts.header-top')
		        <div class = "container main-menu">
		    	    @include('layouts.menu-site')
		        </div>
		    </header>
			<section class = "banner-area relative about-banner" id = "home">	
				<div class = "overlay overlay-bg"></div>
				<div class = "container">				
					<div class = "row d-flex align-items-center justify-content-center">
						<div class = "about-content col-lg-12">
							<h1 class = "text-white">
								Contacter nous				
							</h1>	
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/contact')}}"> Contacter nous</a></p>
						</div>	
					</div>
				</div>
			</section>
			<section class = "contact-page-area section-gap">
				<div class = "container">
					<div class = "row">
						@if(Session::has('email-sent'))
							<div class = "container-fluid text-center col-lg-12 position-alert">
								<div class = "row">
									<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
										<div class = "new-message-box">
											<div class = "new-message-box-success">
												<div class = "info-tab tip-icon-success" title = "success"><i></i></div>
												<div class = "tip-box-success">
													<p>
														Nous espérons, à travers cette notification, vous confirmer que votre message a bien été envoyé.
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endif
						<div class = "map-wrap" style = "width:100%; height: 445px;">
							<iframe src = "https://maps.google.com/maps?q=ghar%20el%20melh&t=&z=13&ie=UTF8&iwloc=&output=embed" width = "100%" height = "100%" key = "AIzaSyBGOw6bWByzhVW0Z53mfV7W7_VieveWbeQ"></iframe>
						</div>
						<div class = "col-lg-4 d-flex flex-column address-wrap">
							<div class = "single-contact-address d-flex flex-row">
								<div class = "icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class = "contact-details">
									<h5>Bizerte, Ghar El Melh</h5>
									<p>
										7033 Rue Malek Ibn Anas
									</p>
								</div>
							</div>
							<div class = "single-contact-address d-flex flex-row">
								<div class = "icon">
									<span class = "lnr lnr-phone-handset"></span>
								</div>
								<div class = "contact-details">
									<h5>(+216) 52 792 385</h5>
									<p>Lundi à Samedi 9am vers 6 pm</p>
								</div>
							</div>
							<div class = "single-contact-address d-flex flex-row">
								<div class = "icon">
									<span class = "lnr lnr-envelope"></span>
								</div>
								<div class = "contact-details">
									<h5>stagi.tn@gmail.com</h5>
									<p>Envoyez-nous votre message à tout moment!</p>
								</div>
							</div>														
						</div>
						<div class = "col-lg-8">
							<form class = "form-area contact-form text-right" id = "form_contact" name = "form_contact" action = "{{url('/envoyer-email-contact')}}" method = "get">
								<div class = "row">	
									<div class = "col-lg-6 form-group">
										<input type = "text" name = "nom_complet" id = "nom_complet" placeholder = "Entrez votre nom complet.." onfocus = "this.placeholder = ''" onblur = "this.placeholder = 'Entrez votre nom complet'" class = "common-input mb-20 form-control" required>
										<span class = "error_form_contact" id = "nom_complet_erreur"></span>
										<input type = "email" name = "email_complet" id = "email_complet" placeholder = "Entrez votre adresse e-mail complète.." onfocus = "this.placeholder = ''" onblur = "this.placeholder = 'Entrez votre adresse e-mail complète..'" class = "common-input mb-20 form-control" required>
										<span class = "error_form_contact" id = "email_complet_erreur"></span>
										<input type = "text" name = "sujet" id = "sujet" placeholder = "Entrez votre sujet.." onfocus = "this.placeholder = ''" onblur = "this.placeholder = 'Entrez votre sujet..'" class = "common-input mb-20 form-control" required>
										<span class = "error_form_contact" id = "sujet_erreur"></span>
									</div>
									<div class = "col-lg-6 form-group">
										<textarea class = "common-textarea form-control" name = "message" id = "message" placeholder = "Ecrivez votre message.." onfocus = "this.placeholder = ''" onblur = "this.placeholder = 'Ecrivez votre message..'" required></textarea>				
										<br>
										<span class = "error_form_contact" id = "message_erreur"></span>
									</div>
									<div class = "col-lg-12">
										<button class = "genric-btn primary" style = "float: right;">Envoyer le message</button>											
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<footer class = "footer-area section-gap">
				@include('layouts.footer')
			</footer>	
			@include('layouts.scripts')
			<script>
			$(function(){
				$('#nom_complet_erreur').hide();
				$('#email_complet_erreur').hide();
				$('#sujet_erreur').hide();
				$('#message_erreur').hide();
				var nomComplet = emailComplet = sujet = message = false;

				$('#nom_complet').on('input', function(){
					ValidationNom($('#nom_complet'),$('#nom_complet_erreur'));
				});

				$('#email_complet').on('input', function(){
					ValidationEmail($('#email_complet'),$('#email_complet_erreur'));
				});

				$('#sujet').on('input', function(){
					ValidationSujet($('#sujet'),$('#sujet_erreur'));
				});

				$('#message').on('input', function(){
					ValidationMessage($('#message'),$('#message_erreur'));
				});
				
				$('#form_contact').submit(function() {
					EnvoiEmailContact();
         		});
			});
		</script>
		</body>
	</html>