<div class = "row align-items-center justify-content-between d-flex">
    <div id = "logo">
        <a href = "{{url('/')}}">
            <img src = "{{asset('site/img/logos/favicon.png')}}" alt = "" title = ""/>
        </a>
        <h1>Stagi.tn</h1>
    </div>
    <nav id = "nav-menu-container">
        <ul class = "nav-menu">
            <li><a href = "{{url('/')}}">Accueil</a></li>	
            @if(session()->has('email'))
                <li class = "menu-has-children"><a href = "javascript: void(0)">{{ App\Http\Controllers\PersonneController::GetNomPrenom(Session()->get('email')); }}</a>
                    <ul>
                        <li><a href = "{{url('/profile')}}">Profil</a></li>
                        <li><a href = "{{url('/parametres-compte')}}">Paramètres du compte</a></li>
                        <li onclick = "QuestionDeconnexion()"><a href = "javascript: void(0)">Déconnexion</a></li>
                    </ul>
                </li>
                <li><a href = "{{url('/contact')}}">Contact</a></li>
                <li>
                    <a href = "javascript: void(0)">
                        <div class = "search-box">
                            <form name = "form-search" id = "form-search" method = "post" action = "javascript: void(0)">
                                <button class = "btn-search"><i class = "fa fa-search"></i></button>
                                <input type = "text" class = "input-search" id = "search_input" name = "search_input" placeholder = "Chercher quelqu'un...">
                            </form>
                        </div>
                    </a>
                </li>	
            @else
                <li><a href = "{{url('/signin')}}">Authentification</a></li>
                <li><a href = "{{url('/contact')}}">Contact</a></li>
	        @endif	          		          
        </ul>
    </nav>		    		
</div>