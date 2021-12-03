<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>
		    @include('layouts.head',['nom_page'=>'Accueil'])
		</head>
		<body>	
		    <header id = "header" id = "home">
	  		    @include('layouts.header-top')
		        <div class = "container main-menu">
		    	    @include('layouts.menu-site')
		        </div>
		    </header>
			<section class = "banner-area relative" id = "home">
				<div class = "overlay overlay-bg"></div>	
				<div class = "container">
					<div class = "row fullscreen d-flex align-items-center justify-content-between">
						<div class = "banner-content col-lg-9 col-md-12">
							<h1 class = "text-uppercase">Nous assurons les meilleures services pour vous</h1>
							<p class = "pt-10 pb-10">
								Dans le monde d'aujourd'hui, où la politesse sera bientôt plus rare encore que la vertu, nous en viendrons au point où quelques uns finiront par juger que mauvaise éducation égale mauvaise action.
							</p>
							<a href = "#" class = "primary-btn text-uppercase">Commencer</a>
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
	