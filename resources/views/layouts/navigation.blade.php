<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Articles</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Compte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @auth
             <a class="dropdown-item">{{Auth::user()->name}}</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="{{route('user.logout')}}">Déconnexion</a>
             
        @else
              <a class="dropdown-item" href="{{route('user.add')}}">Inscription</a>
              <a class="dropdown-item" href="{{route('user.login')}}">Connexion</a>
        @endauth
        </div>
      </li>
      @auth
          @if(Auth::user()->is_admin)
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Gestion Articles
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('posts.create')}}">Ajouter</a>
             </div>
            </li>
         @endif
      @endauth
     </ul>
    <form class="form-inline my-2 my-lg-0" action="{{route('posts.search')}}" method="post">
      <input class="form-control mr-sm-2" type="search" name="search"  placeholder="Recherche" aria-label="Search">
      <input type="hidden" name="_token" value="{{Session::token()}}">
      <button class="btn btn-dark my-2 my-sm-0" type="submit">Recherche</button>
    </form>
  </div>
</nav>