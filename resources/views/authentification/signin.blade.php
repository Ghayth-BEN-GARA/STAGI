<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>
			@include('layouts.head',['nom_page'=>'Connexion'])
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
								Connexion			
							</h1>	
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/signin')}}">Connexion</a></p>
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
									<h4>Nouveau sur la plateforme ?</h4>
									<p>Créer un nouveau compte pour conserver vos chances de décrocher un stage chez nos partenaires.</p>
									<a class = "main_btn" href = "{{url('signup')}}">Creer un nouveau compte</a>
								</div>
							</div>
						</div>
						<div class = "col-lg-6">
							<div class = "login_form_inner">
								<h3>Authentification</h3>
								@if(Session::has('personne-not-exist'))
									<div class = "position_erreur">
										<div class = "container-fluid text-center col-lg-12 position-alert">
											<div class = "row">
												<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
													<div class = "new-message-box">
														<div class = "new-message-box-danger">
															<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
															<div class = "tip-box-danger">
																<p>
																	Aucun compte trouvé avec cette adresse e-mail.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@elseif (Session::has('parametres-incorrecte'))
									<div class = "position_erreur">
										<div class = "container-fluid text-center col-lg-12 position-alert">
											<div class = "row">
												<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
													<div class = "new-message-box">
														<div class = "new-message-box-danger">
															<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
															<div class = "tip-box-danger">
																<p>
																	Les paramètres que vous avez entrés sont incorrects.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@elseif (Session::has('not-loged'))
									<div class = "position_erreur">
										<div class = "container-fluid text-center col-lg-12 position-alert">
											<div class = "row">
												<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
													<div class = "new-message-box">
														<div class = "new-message-box-danger">
															<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
															<div class = "tip-box-danger">
																<p>
																	Vous ne pouvez pas consulter la page demandée car vous êtes hors ligne.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									@elseif (Session::has('compte-desactiver'))
										<div class = "position_erreur">
											<div class = "container-fluid text-center col-lg-12 position-alert">
												<div class = "row">
													<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
														<div class = "new-message-box">
															<div class = "new-message-box-danger">
																<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
																<div class = "tip-box-danger">
																	<p>
																		Votre compte a été désactivé. Pour plus d'informations, et si vous pensez que votre compte a été désactivé par erreur, veuillez nous contacter. Notez bien que vous pouvez l'activer à tout moment.
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									@endif
								<form class = "row login_form" action = "{{url('/login')}}" method = "post" id = "form_signin" name = "form_signin">
									@csrf
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
                                    <div class = "col-md-12 form-group">
                                        <div class = "creat_account">
                                            <label class = "container" for = "f-option2">
                                                <input type = "checkbox" checked = "checked" id = "f-option2">
                                                <span class = "checkmark"></span>
                                                Sauvegarder
                                            </label>
                                        </div>
                                    </div>
									<div class = "col-md-12 form-group">
										<button type = "submit" class = "btn submit_btn" id = "signin">Se connecter</button>
                                        <a href = "{{url('/forget1')}}">Mot de passe oublié ?</a>
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
			<script>
				$(function(){
					$('#email_erreur').hide();
					$('#password_erreur').hide();;
						
					var email = password = false;

					$('#email').on('input', function(){
						ValidationEmailAuth($('#email'),$('#email_erreur'));
					});

					$('#password').on('input', function(){
						ValidationPassword($('#password'),$('#password_erreur'));
					});

					$("#form_signin").submit(function() {
						Authentification();
         			});
				});
			</script>
		</body>
	</html>