<nav class="hidden lg:items-center space-x-6 lg:flex gap-8 transition-all duration-300">
    @foreach (menu_items() as $item)
        <x-navigation.link :$item />
    @endforeach
</nav>