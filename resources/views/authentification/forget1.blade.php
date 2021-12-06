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
                                    <h4 class = "newsletter-title">Retrouvez votre compte</h4>
                                    <p>Veuillez saisir votre adresse e-mail pour rechercher votre compte.</p>
                                    <div class = "form-group d-flex flex-row">
                                        <div class = "col-autos">
                                            @if(Session::has('compte-not-exist'))
                                                <div class = "position_erreur">
                                                    <div class = "container-fluid text-center col-lg-12 position-alert">
                                                        <div class = "row">
                                                            <div class = "col-xs-12 col-sm-12 col-sm-offset-3">
                                                                <div class = "new-message-box">
                                                                    <div class = "new-message-box-danger">
                                                                        <div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
                                                                        <div class = "tip-box-danger">
                                                                            <p style = 'color: #b71c1c;'>
                                                                                Aucun compte trouvé avec cette adresse e-mail.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <form name = "form_forget1" id = "form_forget1" method = "post" action = "{{url('/rechercher-compte-forget1')}}">
                                                @csrf
                                                <div class = "input-group">
                                                    <div class = "input-group-prepend">
                                                        <div class = "input-group-text" id = "envelope">
                                                            <i class = "fa fa-envelope" aria-hidden = "true"></i>
                                                        </div>
                                                    </div>
									                <input type = "email" class = "form-control" id = "email" name = "email" placeholder = "Entrez votre adresse e-mail.." required onfocus = "this.placeholder = ''" onblur = "this.placeholder = 'Entrez votre adresse e-mail..'" required>
												</div>
                                                <br>
												<span class = "error_form" id = "email_erreur"></span>
                                                <div class = "col-md-12 form-group">
										            <button type = "submit" class = "btn main_btn" id = "forget1">Rechercher un compte</button>
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
					$('#email_erreur').hide();
					var  email = false;

					$('#email').on('input', function(){
						ValidationEmailForget($('#email'),$('#email_erreur'),$('#envelope'));
					});
					
					$('#form_forget1').submit(function() {
						RechercherCompte();
					});
				});
			</script>
		</body>
	</html>