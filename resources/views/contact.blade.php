@extends('layouts.app')

@section('content')
<div class="mt-10 min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" style="background-image: url('{{ asset('images/jobbfent2.svg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 p-8">
        <div class="lg:col-span-2 flex flex-col justify-center items-center">
            <h1 class="text-6xl font-frankruhl font-light text-gray-900" data-aos="zoom-in-down" data-aos-duration="800">
                Kapcsolat
            </h1>
            <p class="mt-10 font-medium text-gray-600 text-sm sm:text-base" data-aos="zoom-in" data-aos-duration="800">
                Ha bármilyen kérdésed van, vagy szeretnél együttműködni, ne habozz felvenni velem a kapcsolatot!
            </p>
        </div>
        <div class="space-y-8 bg-white p-8 rounded-3xl shadow-lg" data-aos="flip-right" data-aos-duration="800">
            <div class="space-y-6">
                <div>
                    <a href="mailto:contact@paron.hu">
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-lg font-opensans text-gray-700">contact@paron.hu</p>
                        </div>
                    </a>
                </div>
               <div>
                <a href="tel:+36205043445">
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <p class="text-lg font-opensans text-gray-700">+36 20 504 3445</p>
                    </div>
                </a>
               </div>
               <div>
                <a href="tel:+36205043445">
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <p class="text-lg font-opensans text-gray-700">+36 20 504 3445</p>
                    </div>
                </a>
               </div>
            </div>
        </div>
        <div class="relative py-3 sm:max-w-xl sm:mx-auto" data-aos="flip-left" data-aos-duration="800">
            <div
                class="absolute inset-0 bg-gradient-to-r from-white to-bg-color shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="mx-auto">
                    <div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <input class="px-4 py-2 border-bg-color border-2 rounded-lg w-full mb-4" type="text" name="name" id="name" placeholder="Név" required>
                            <input class="px-4 py-2 border-bg-color border-2 rounded-lg w-full mb-4" type="email" name="email" id="email" placeholder="Email" required>
                            <input class="px-4 py-2 border-bg-color border-2 rounded-lg w-full mb-4" type="text" name="phone" id="phone" placeholder="Telefonszám">
                            <input class="px-4 py-2 border-bg-color border-2 rounded-lg w-full mb-4" type="text" name="subject" id="subject" placeholder="Tárgy" required>
                            <textarea class="resize-none px-4 py-2 border-bg-color border-2 rounded-lg w-full mb-4" name="message" id="message" rows="6" placeholder="Üzenet" required></textarea>
                            <div class="flex justify-end">
                                <button type="submit" class="font-frankruhl font-semibold shadow-primary shadow-lg hover:shadow tracking-wider rounded-3xl text-primary hover:text-bg-color hover:bg-primary border-primary border-2 uppercase text-center py-3 px-8">Elküldés</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
