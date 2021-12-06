<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>
			@include('layouts.head',['nom_page'=>'Inscription'])
			<link rel = "stylesheet" href = "{{asset('authentification/css/style.css')}}">
			<link rel = "stylesheet" href = "{{asset('authentification/css/nice-select.css')}}">
			<link rel = "stylesheet" href = "{{asset('site/css/box_alert.css')}}">
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
								Inscription			
							</h1>	
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/signup')}}">Inscription</a></p>
						</div>	
					</div>
				</div>
			</section>
			<section class = "login_box_area">
				<div class = "container">
					<div class = "row">
						<div class = "col-lg-6">
							<div class = "login_box_img">
								<img class = "img-fluid" src = "{{asset('site/img/wallpaper/wallpaper2.jpg')}}" alt = "Image arriére plan de login">
								<div class = "hover">
									<h4>Avez vous déjà un compte ?</h4>
									<p>Authentifiez-vous avec votre adresse e-mail et votre mot de passe pour profiter plus d'avantages de nos services.</p>
									<a class = "main_btn" href = "{{url('signin')}}">Connectez-vous </a>
								</div>
							</div>
						</div>
						<div class = "col-lg-6">
							<div class = "login_form_inner">
								<h3>Créer un nouveau compte</h3>
								@if(Session::has('personne-exist'))
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-danger">
														<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
														<div class = "tip-box-danger">
															<p>
																Un autre compte a été créé avec cette adresse e-mail.
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
								<form class = "row login_form" action = "{{url('/registration')}}" method = "post" id = "form_signup" name = "form_signup">
									@csrf
									<div class = "col-md-12 form-group">
										<input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Entrez votre nom.." required>
										<br>
										<span class = "error_form" id = "nom_erreur"></span>
									</div>
									<div class = "col-md-12 form-group">
										<input type = "text" class = "form-control" id = "prenom" name = "prenom" placeholder = "Entrez votre prénom.." required>
										<br>
										<span class = "error_form" id = "prenom_erreur"></span>
									</div>
									<div class = "col-md-12 form-group">
										<input type = "email" class = "form-control" id = "email" name = "email" placeholder = "Entrez votre adresse e-mail.." required>
										<br>
										<span class = "error_form" id = "email_erreur"></span>
									</div>
									<div class = "col-md-12 form-group">
										<input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Entrez votre mot de passe.." required>
                                    	<span toggle = "#password" class = "fa fa-fw fa-eye field-icon toggle-password" id = "eye" name = "eye"></span>
										<br>
										<span class = "error_form" id = "password_erreur"></span>
									</div>
									<div class = "col-md-6 form-group">
										<select id = "genre" name = "genre" required>
											<option selected disabled value = "Genre">Genre</option>
											<option value = "Homme">Homme</option>
											<option value = "Femme">Femme</option>
                                        	<option value = "Non précisé">Non précisié</option>
										</select>
									</div>
									<div class = "col-md-6 form-group">
										<select id = "profession" name = "profession" required>
											<option selected disabled value = "Profession">Profession..</option>
											<option value = "Etudiant">Etudiant</option>
											<option value = "Encadrant">Encadrant</option>
											<option value = "Responsable">Responsable</option>
										</select>
									</div>
									<div class = "col-md-12 form-group position-numero">
										<input type = "number" class = "form-control" id = "numero" name = "numero" pattern = "[0-9]{2}-[0-9]{3}-[0-9]{3}" placeholder = "Entrez votre numéro mobile.." required onKeyPress = "if(this.value.length==8) return false;">
										<br>
										<span class = "error_form" id = "numero_erreur"></span>
									</div>
									 <div class="col-md-12 form-group">
										<input type = "date" class = "form-control" id = "naissance" name = "naissance" required>
										<br>
										<span class = "error_form" id = "naissance_erreur"></span>
									</div>
									<div class = "col-md-12 form-group">
										<div class = "creat_account">
											<label class = "container" for = "f-option2">
												<input type = "checkbox" id = "f-option2" onclick = "OuvrirButton()">
												<span class = "checkmark"></span>
												J'accepte les <strong class = "strong">conditions d'utilisation</strong>
											</label>
										</div>
									</div>
									<div class = "col-md-12 form-group">
										<button type = "submit" class = "btn submit_btn" disabled id = "signup">Créer le compte</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<footer class = "footer-area section-gap">
				@include('layouts.footer')
			</footer>	
			@include('layouts.scripts')
			<script src = "{{asset('authentification/js/main.js')}}"></script>
			<script src = "{{asset('authentification/js/jquery.nice-select.min.js')}}"></script>
			<script>
				$(function(){
					$('select').niceSelect();
					$('#nom_erreur').hide();
					$('#prenom_erreur').hide();
					$('#email_erreur').hide();
					$('#password_erreur').hide();
					$('#numero_erreur').hide();
					$('#naisance_erreur').hide();
						
					var nom = prenom = email = password = numero = naissance = false;
					$('#nom').on('input', function(){
						ValidationNomAuth($('#nom'),$('#nom_erreur'));
					});
					$('#prenom').on('input', function(){
						ValidationPrenom($('#prenom'),$('#prenom_erreur'));
					});

					$('#email').on('input', function(){
						ValidationEmailAuth($('#email'),$('#email_erreur'));
					});

					$('#password').on('input', function(){
						ValidationPassword($('#password'),$('#password_erreur'));
					});

					$('#numero').on('input', function(){
						ValidationNumero($('#numero'),$('#numero_erreur'));
					});

					$('#naissance').on('input', function(){
						ValidationNaissance($('#naissance'),$('#naissance_erreur'));
					});

					$("#form_signup").submit(function() {
						Registration();
         			});
				});
			</script>
		</body>
	</html>