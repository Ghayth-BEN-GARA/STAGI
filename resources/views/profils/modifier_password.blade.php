<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>
			@include('layouts.head',['nom_page'=> $dataP['nomComplet']])
			<link rel = "stylesheet" href = "{{asset('site/css/box_alert.css')}}">
			<link rel = "stylesheet" href = "{{asset('site/css/profile.css')}}">
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
								{{$dataP['nomComplet']}}				
							</h1>	
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/update-password-compte')}}"> Mot de passe</a></p>
						</div>	
					</div>
				</div>
			</section>
			<section class = "post-content-area"> 
				<div class = "container">
					<div class = "row">
						<div class = "container emp-profile">
							@if(Session::has('same-old-password'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-danger">
														<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
														<div class = "tip-box-danger">
															<p>
																Vous avez entré votre ancien mot de passe.
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@elseif(Session::has('password-updated'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-success">
														<div class = "info-tab tip-icon-success" title = "success"><i></i></div>
														<div class = "tip-box-success">
															<p>
																Votre mot de passe a été mis à jour avec succés.</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endif
							<div class = "position_erreur"  id = "erreur_p" style = "display:none">
								<div class = "container-fluid text-center col-lg-12 position-alert">
									<div class = "row">
										<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
											<div class = "new-message-box">
												<div class = "new-message-box-danger">
													<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
													<div class = "tip-box-danger">
														<p>
															Les deux nouveaux mots de passe ne sont pas les mêmes.
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<form method = "post" name = "form_password" id = "form_password" action = "{{url('/gestion-update-password-profile')}}">
								@csrf
								<div class = "row">
									<div class = "col-md-4">
                        				<div class = "profile-img">
											@if($dataP['photo'] == 'inconu.png')
                                                <img src = "{{asset('site/img/icon/image.png')}}" alt = "Photo de {{$dataP['nomComplet']}}">
                                            @else
                                            	<img src = "{{asset('uploads/images/'.$dataP['nomComplet'].'/'.$dataP['photo'])}}" alt = "Photo de {{$dataP['nomComplet']}}">
											@endif
                            				<div class = "file btn btn-lg btn-primary">
                                				<a href = "{{url('/photo-profile')}}" style = "color:#fff">Changer l'image</a>
                            				</div>  
                                            <h5>{{$dataP['nomComplet']}}</h5>    
											<p id = "titre-style">(Titre)</p>                     
                        				</div>   
                    				</div>
									<div class = "col-md-6">
										<div class = "profile-head">
											<div class = "row" style = "display:block">
												<div class = "col-sm-6">
													<h6 class = "mb-0">Ancien mot de passe</h6>
												</div>
												<div class = "mt-10 col-sm-12">
													<input type = "password" class = "single-input" name = "old_password" id = "old_password" placeholder = "Entrez votre ancien mot de passe.." onfocus = " this.placeholder = ''" onblur = "this.placeholder = 'Entrez votre ancien mot de passe..'" required>
                                                    <i class = "fa fa-eye-slash" id = "togglePassword" data-toggle = "old_password"></i>
                                                    <br>
													<span class = "error_form" id = "old_password_erreur"></span>
												</div>
											</div>
                                            <hr>
                                            <div class = "row" style = "display:block">
												<div class = "col-sm-6">
													<h6 class = "mb-0">Nouveau mot de passe</h6>
												</div>
												<div class = "mt-10 col-sm-12">
													<input type = "password" class = "single-input" name = "new_password" id = "new_password" placeholder = "Entrez votre nouveau mot de passe.." onfocus = " this.placeholder = ''" onblur = "this.placeholder = 'Entrez votre nouveau mot de passe..'" required>
                                                    <i class = "fa fa-eye-slash" id = "togglePassword2"></i>
                                                    <br>
													<span class = "error_form" id = "new_password_erreur"></span>
												</div>
											</div>
											<hr>
                                            <div class = "row" style = "display:block">
												<div class = "col-sm-9">
													<h6 class = "mb-0">Confirmer le nouveau mot de passe</h6>
												</div>
												<div class = "mt-10 col-sm-12">
													<input type = "password" class = "single-input" name = "confirmer_password" id = "confirmer_password" placeholder = "Confirmer votre nouveau mot de passe.." onfocus = " this.placeholder = ''" onblur = "this.placeholder = 'Confirmer votre nouveau mot de passe..'" required>
													<i class = "fa fa-eye-slash" id = "togglePassword3"></i>
                                                    <br>
													<span class = "error_form" id = "confirmer_password_erreur"></span>
												</div>
											</div>
											<hr>
											<div class = "row">
												<div class = "col-md-12 form-group">
													<button type = "submit" class = "btn submit_btn">Modifier</button>
												</div>
											</div>
                                        </div>
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
					$('#old_password_erreur').hide();
					$('#new_password_erreur').hide();
					$('#confirmer_password_erreur').hide();
					$('#erreur_p').hide();
					
					$("#togglePassword").on('click', function(event) {
						ShowPassword($('#togglePassword'),$('#old_password'));
					});

					$("#togglePassword2").on('click', function(event) {
						ShowPassword($('#togglePassword2'),$('#new_password'));
					});

					$("#togglePassword3").on('click', function(event) {
						ShowPassword($('#togglePassword3'),$('#confirmer_password'));
					});

					var password =  newPassword = confirmerPassword = true;
					var test = false;

					$('#old_password').on('input', function(){
                        ValidationPasswordUpdate($('#old_password'),$('#old_password_erreur'),password);
                    });

					$('#new_password').on('input', function(){
                        ValidationPasswordUpdate($('#new_password'),$('#new_password_erreur'),newPassword);
                    });

					$('#confirmer_password').on('input', function(){
                        ValidationPasswordUpdate($('#confirmer_password'),$('#confirmer_password_erreur'),confirmerPassword);
                    });

					$("#form_password").submit(function() {
                        ValiderModifierPasswordProfil();
                    });
				});
			</script>
		</body>
	</html>