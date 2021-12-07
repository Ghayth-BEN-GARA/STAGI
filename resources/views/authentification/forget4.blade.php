<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>
			@include('layouts.head',['nom_page'=>'Récupération'])
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
								Récupération			
							</h1>	
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/forget1')}}">Récupération</a></p>
						</div>	
					</div>
				</div>
			</section>
            <section class = "post-content-area">
				<div class = "container">
					<div class = "row">
						<div class = "col-lg-8 sidebar-widgets">
							<div class = "widget-wrap">
								<div class = "single-sidebar-widget newsletter-widget">
                                <h4 class = "newsletter-title">Modifier le mot de passe</h4>
                                <p>Modifiez votre mot de passe pour terminer la procédure de récupération de compte.</p>
                                <div class = "form-group d-flex flex-row">
                                    <div class = "col-autos">
                                        @if(Session::has('compte-recuperer'))
                                            <div class = "position_erreur">
                                                <div class = "container-fluid text-center col-lg-12 position-alert">
                                                    <div class = "row">
                                                        <div class = "col-xs-12 col-sm-12 col-sm-offset-3">
                                                            <div class = "new-message-box">
                                                                <div class = "new-message-box-success">
                                                                    <div class = "info-tab tip-icon-success" title = "success"><i></i></div>
                                                                    <div class = "tip-box-success">
                                                                        <p style = 'color: #33691E;font-weight:600'>
                                                                            Nous sommes heureux de vous revoir parmi nous. Vous avez réussi à récuperer votre compte. Veuillez saisir un nouveau mot de passe, évitez de saisir l'ancien mot de passe.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class = "position_erreur"  id = "erreur" style = "display:none">
                                            <div class = "container-fluid text-center col-lg-12 position-alert">
                                                <div class = "row">
                                                    <div class = "col-xs-12 col-sm-12 col-sm-offset-3">
                                                        <div class = "new-message-box">
                                                            <div class = "new-message-box-danger">
                                                                <div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
                                                                <div class = "tip-box-danger">
                                                                    <p style = 'color: #b71c1c;font-weight:600'>
                                                                        Les deux mots de passe ne sont pas les mêmes.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(Session::has('same-old-password'))
                                            <div class = "position_erreur">
                                                <div class = "container-fluid text-center col-lg-12 position-alert">
                                                    <div class = "row">
                                                        <div class = "col-xs-12 col-sm-12 col-sm-offset-3">
                                                            <div class = "new-message-box">
                                                                <div class = "new-message-box-danger">
                                                                    <div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
                                                                    <div class = "tip-box-danger">
                                                                        <p style = 'color: #b71c1c;font-weight:600'>
                                                                            Vous avez entré votre ancien mot de passe.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <form name = "form_forget4" id = "form_forget4" method = "post" action = "{{url('gestion-modifier-password-forget4')}}">   
                                            @csrf
                                                <div class = "input-group">
                                                    <div class = "input-group-prepend">
                                                        <div class = "input-group-text">
                                                            <i class = "fa fa-lock" aria-hidden = "true"></i>
                                                        </div>
                                                    </div>
									                <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Entrez votre mot de passe.." required onfocus = "this.placeholder = ''" onblur = "this.placeholder = 'Entrez votre mot de passe..'">
												</div>
												<span class = "error_form" id = "erreur_password"></span>
												<br>
                                                <div class = "input-group">
                                                    <div class = "input-group-prepend">
                                                        <div class = "input-group-text">
                                                            <i class = "fa fa-lock" aria-hidden = "true"></i>
                                                        </div>
                                                    </div>
									                <input type = "password" class = "form-control" id = "confirm_password" name = "confirm_password" placeholder = "Confirmez votre mot de passe.." required onfocus = "this.placeholder = ''" onblur = "this.placeholder = 'Confirmez votre mot de passe..'">
												</div>
												<span class = "error_form" id = "erreur_password_confirm"></span>
												<input type = "hidden" name = "email" id = "email" value = "{{request()->email}}">
												<div class = "input-group-btn" id = "position-btn">   
                                                    <button class = "btn submit_btn reset" type = "reset">
                                                        Annuler
                                                    </button>

                                                    <button class = "btn submit_btn" type = "submit">
                                                        Modifier
                                                    </button> 
									            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    $('#erreur_password').hide();
                    $('#erreur_password_confirm').hide();
                    $('#erreur').hide();

                    var password = confirmerPassword = true;
        
                    $('#password').on('input', function(){
                        ValidationPasswordUpdate($('#password'),$('#erreur_password'),password);
                    });

                    $('#confirm_password').on('input', function(){
                        ValidationPasswordUpdate($('#confirm_password'),$('#erreur_password_confirm'),confirmerPassword);
                    });
            
                    $("#form_forget4").submit(function() {
                        ValiderModifierPassword();
                    });
                });
            </script>
		</body>
	</html>