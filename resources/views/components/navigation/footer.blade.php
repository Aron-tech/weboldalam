<footer class="w-full bg-gradient-to-t from-blue-900 via-blue-700 to-primary">
      <x-container class="p-10 lg:p-20 ">
          <div class="flex flex-col lg:flex-row justify-around items-center lg:items-start text-white gap-6 lg:gap-4">
                <a href="{{route('home')}}" class="w-full lg:w-auto flex justify-center my-auto space-x-1">
                    <x-h3 class="my-auto !font-bold">Papp Áron weboldala</x-h3>
                    <svg class="size-12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17.75 15C17.75 15.4142 17.4142 15.75 17 15.75H12C11.5858 15.75 11.25 15.4142 11.25 15C11.25 14.5858 11.5858 14.25 12 14.25H17C17.4142 14.25 17.75 14.5858 17.75 15Z" fill="#fff"></path> <path d="M7.48014 9.42383C7.16193 9.15866 6.68901 9.20165 6.42383 9.51986C6.15866 9.83807 6.20165 10.311 6.51986 10.5762L6.75427 10.7715C7.41283 11.3203 7.84346 11.6815 8.11966 11.9874C8.38194 12.2778 8.40693 12.414 8.40693 12.5C8.40693 12.586 8.38194 12.7222 8.11966 13.0126C7.84346 13.3185 7.41283 13.6797 6.75427 14.2285L6.51986 14.4238C6.20165 14.689 6.15866 15.1619 6.42383 15.4801C6.68901 15.7983 7.16193 15.8413 7.48014 15.5762L7.75656 15.3458C8.36151 14.8417 8.87651 14.4126 9.23293 14.0179C9.61149 13.5987 9.90693 13.1166 9.90693 12.5C9.90693 11.8834 9.61149 11.4013 9.23293 10.9821C8.87651 10.5874 8.36151 10.1583 7.75656 9.65418L7.48014 9.42383Z" fill="#fff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9426 1.25H12.0574C14.3658 1.24999 16.1748 1.24998 17.5863 1.43975C19.031 1.63399 20.1711 2.03933 21.0659 2.93414C21.9607 3.82895 22.366 4.96897 22.5603 6.41371C22.75 7.82519 22.75 9.63423 22.75 11.9426V12.0574C22.75 14.3658 22.75 16.1748 22.5603 17.5863C22.366 19.031 21.9607 20.1711 21.0659 21.0659C20.1711 21.9607 19.031 22.366 17.5863 22.5603C16.1748 22.75 14.3658 22.75 12.0574 22.75H11.9426C9.63423 22.75 7.82519 22.75 6.41371 22.5603C4.96897 22.366 3.82895 21.9607 2.93414 21.0659C2.03933 20.1711 1.63399 19.031 1.43975 17.5863C1.24998 16.1748 1.24999 14.3658 1.25 12.0574V11.9426C1.24999 9.63423 1.24998 7.82519 1.43975 6.41371C1.63399 4.96897 2.03933 3.82895 2.93414 2.93414C3.82895 2.03933 4.96897 1.63399 6.41371 1.43975C7.82519 1.24998 9.63423 1.24999 11.9426 1.25ZM6.61358 2.92637C5.33517 3.09825 4.56445 3.42514 3.9948 3.9948C3.42514 4.56445 3.09825 5.33517 2.92637 6.61358C2.75159 7.91356 2.75 9.62178 2.75 12C2.75 14.3782 2.75159 16.0864 2.92637 17.3864C3.09825 18.6648 3.42514 19.4355 3.9948 20.0052C4.56445 20.5749 5.33517 20.9018 6.61358 21.0736C7.91356 21.2484 9.62178 21.25 12 21.25C14.3782 21.25 16.0864 21.2484 17.3864 21.0736C18.6648 20.9018 19.4355 20.5749 20.0052 20.0052C20.5749 19.4355 20.9018 18.6648 21.0736 17.3864C21.2484 16.0864 21.25 14.3782 21.25 12C21.25 9.62178 21.2484 7.91356 21.0736 6.61358C20.9018 5.33517 20.5749 4.56445 20.0052 3.9948C19.4355 3.42514 18.6648 3.09825 17.3864 2.92637C16.0864 2.75159 14.3782 2.75 12 2.75C9.62178 2.75 7.91356 2.75159 6.61358 2.92637Z" fill="#fff"></path> </g></svg>
                </a>
                <div class="w-full lg:w-auto flex flex-col space-y-4 group is-footer text-center lg:text-left">
                      <x-h3 class="!font-bold uppercase">Menü</x-h3>
                      <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-3 gap-x-8 w-full">
                          @foreach (menu_items() as $item)
                              @if($item->is_footer)
                                  <div class="flex justify-center sm:justify-start">
                                      <x-navigation.footer-link :$item/>
                                  </div>
                              @endif
                          @endforeach
                      </div>
                </div>
                <div class="w-full lg:w-auto flex flex-col space-y-4 text-center lg:text-left">
                      <x-h3 class="!font-bold uppercase">Kapcsolat</x-h3>
                      <a href="mailto:{{ $settings['email'] }}" class="flex items-center justify-center lg:justify-start space-x-4 group">
                          <i class="fa-solid fa-envelope opacity-80 group-hover:opacity-100"></i>
                          <x-p class="!text-white opacity-80 group-hover:opacity-100">{{ $settings['email'] }}</x-p>
                      </a>
                      <a href="tel:{{ $settings['phone'] }}" class="flex items-center justify-center lg:justify-start space-x-4 group">
                          <i class="fa-solid fa-phone opacity-80 group-hover:opacity-100"></i>
                          <x-p class="!text-white opacity-80 group-hover:opacity-100">{{ $settings['phone'] }}</x-p>
                      </a>
                </div>
          </div>
      </x-container>

</footer>
