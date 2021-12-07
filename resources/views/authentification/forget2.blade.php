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
                                    <h4 class = "newsletter-title">Réinitialiser votre mot de passe</h4>
                                    <p>Comment souhaitez-vous recevoir votre code de réinitialisation de mot de passe ?</p>
                                    <div class = "form-group d-flex flex-row">
                                        <div class = "col-autos">
                                            <form name = "form_forget2" id = "form_forget2" method = "post" action = "{{url('/send-code-to-personne')}}">
                                                @csrf
                                                @if($data['photo'] == 'inconu.png')
                                                    <img src = "{{asset('site/img/icon/image.png')}}" alt = "Photo de {{$data['nomComplet']}}" class = "photo-profil">
                                                @else
                                                    <img src = "{{asset('uploads/images/'.$data['nomComplet'].'/'.$data['photo'])}}" alt = "Photo de {{$data['nomComplet']}}" class = "photo-profil">
                                                @endif
                                                <a href = "#" ><h4 class = "name-forget">{{$data['nomComplet']}}</h4></a>
                                                <div class = "container" id = "position-email-number">
													<label class = "container-radio" id = "position-email">
														<input type = "radio" checked name = "cheked" id = "email-cheked">
														<b class = "text-black">Envoyer le code par adresse e-mail</b>
                                                        <span class = "checkmark2"></span>
														<br>
														<a href = "#" ><h4 class = "champ-forget">{{$data['email']}}</h4></a>
													</label>
                                                    <label class = "container-radio" id = "position-numero">
														<input type = "radio" name = "cheked" id = "tel-checked">
                                                        <b class = "text-black">Envoyer le code par numéro mobile</b>
														<span class = "checkmark2"></span>
														<br>
														<a href = "#" ><h4 class = "champ-forget">(+216) {{$data['numero']}}</h4></a>
													</label>
												</div>
                                                <input type = "hidden" name = "email" id = "email" value = {{$data['email']}}>
												<input type = "hidden" name = "numero" id = "numero" value = {{$data['numero']}}>
												<input type = "hidden" name = "nomComplet" id = "nomComplet" value = {{$data['nomComplet']}}>
                                                <div class = "input-group-btn" id = "position-btn">   
													<button class = "btn submit_btn reset" type = "button" onclick = OuvrirForget1()>
														Ce n'est pas vous ?
													</button>

													<button class = "btn submit_btn" type = "submit">
														Continuer
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
		</body>
	</html>