<div class="hidden lg:hidden bg-white p-4 flex flex-col items-center space-y-4" id="mobile-menu">
    @foreach (menu_items() as $item)
        <x-navigation.link :$item />
    @endforeach
</div>
