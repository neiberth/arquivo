    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-5 fs-5 m- text-white" href="{{ url('/') }}" data-bs-theme="dark">
        {{ config('app.name', 'Jucep Arquivos') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
        <ul class="navbar-nav me-auto">
    
        </ul>
    
        <ul class="navbar-nav ms-auto">
    
             <!-- Authentication Links -->
             @guest
             @if (Route::has('login'))
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">Login</a>
                 </li>
             @endif
    
             @if (Route::has('register'))
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('register') }}">Novo Usuário</a>
                 </li>
             @endif
         @else
             <li class="nav-item dropdown">
                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }}
                 </a>
    
                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
    
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </div>
             </li>
         @endguest
        </ul>
      
        <div id="navbarSearch" class="navbar-search w-100 collapse">
          <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
    </div>
