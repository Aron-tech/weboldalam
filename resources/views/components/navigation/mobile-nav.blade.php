<div class="lg:hidden hidden bg-white p-4 flex flex-col items-center space-y-4" id="mobile-menu">
    <a href="{{route('home')}}" class="{{ Request::is('/') ? 'active-mobile-nav-link' : 'mobile-nav-link'}}">Kezdőlap</a>
    <a href="{{route('about')}}" class="{{ Request::is('rolam') ? 'active-mobile-nav-link' : 'mobile-nav-link'}}">Rólam</a>
    <a href="{{route('projects.index')}}" class="{{ Request::is('projektek*') ? 'active-mobile-nav-link' : 'mobile-nav-link'}}">Projektek</a>
    <a href="{{route('contact')}}" class="{{ Request::is('kapcsolat') ? 'active-mobile-nav-link' : 'mobile-nav-link'}}">Kapcsolat</a>
</div>
