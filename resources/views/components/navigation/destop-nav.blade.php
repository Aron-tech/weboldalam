<nav class="hidden lg:items-center space-x-6 lg:flex gap-8 transition-all duration-300">
    <a href="{{route('home')}}" class="{{ Request::is('/') ? 'active-nav-link' : 'nav-link'}}">Kezdőlap</a>
    <a href="{{route('about')}}" class="{{ Request::is('rolam') ? 'active-nav-link' : 'nav-link'}}">Rólam</a>
    <a href="{{route('projects.index')}}" class="{{ Request::is('projektek*') ? 'active-nav-link' : 'nav-link'}}">Projektek</a>
    <a href="{{route('contact')}}" class="{{ Request::is('kapcsolat') ? 'active-nav-link' : 'nav-link'}}">Kapcsolat</a>
</nav>
