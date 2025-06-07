@extends('layouts.app')
@section('title', 'Kapcsolat')
@section('content')
<div class="mt-10 min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" style="background-image: url('{{ asset('images/jobbfent2.svg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 p-8">
        <div class="lg:col-span-2 flex flex-col justify-center items-center">
            <x-h1 data-aos="zoom-in-down" data-aos-duration="800">
                Kapcsolat
            </x-h1>
            <p class="mt-10 font-medium text-gray-600 text-sm sm:text-base" data-aos="zoom-in" data-aos-duration="800">
                Ha bármilyen kérdésed van, vagy szeretnél együttműködni, ne habozz felvenni velem a kapcsolatot!
            </p>
        </div>
        <div class="space-y-8 bg-white p-8 rounded-3xl shadow-lg" data-aos="flip-right" data-aos-duration="800">
            <div class="space-y-6">
                <div>
                    <a href="mailto:{{ $settings['email'] }}">
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <svg class="w-8 h-8 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-lg font-opensans text-gray-700">{{ $settings['email'] }}</p>
                        </div>
                    </a>
                </div>
               <div>
                <a href="tel:{{ $settings['phone'] }}">
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <svg class="w-8 h-8 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <p class="text-lg font-opensans text-gray-700">{{ $settings['phone'] }}</p>
                    </div>
                </a>
               </div>
               <div>
                <a href="{{ $settings['github_link'] }}">
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <svg  class="size-8 " xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
                            <path d="M17.791,46.836C18.502,46.53,19,45.823,19,45v-5.4c0-0.197,0.016-0.402,0.041-0.61C19.027,38.994,19.014,38.997,19,39 c0,0-3,0-3.6,0c-1.5,0-2.8-0.6-3.4-1.8c-0.7-1.3-1-3.5-2.8-4.7C8.9,32.3,9.1,32,9.7,32c0.6,0.1,1.9,0.9,2.7,2c0.9,1.1,1.8,2,3.4,2 c2.487,0,3.82-0.125,4.622-0.555C21.356,34.056,22.649,33,24,33v-0.025c-5.668-0.182-9.289-2.066-10.975-4.975 c-3.665,0.042-6.856,0.405-8.677,0.707c-0.058-0.327-0.108-0.656-0.151-0.987c1.797-0.296,4.843-0.647,8.345-0.714 c-0.112-0.276-0.209-0.559-0.291-0.849c-3.511-0.178-6.541-0.039-8.187,0.097c-0.02-0.332-0.047-0.663-0.051-0.999 c1.649-0.135,4.597-0.27,8.018-0.111c-0.079-0.5-0.13-1.011-0.13-1.543c0-1.7,0.6-3.5,1.7-5c-0.5-1.7-1.2-5.3,0.2-6.6 c2.7,0,4.6,1.3,5.5,2.1C21,13.4,22.9,13,25,13s4,0.4,5.6,1.1c0.9-0.8,2.8-2.1,5.5-2.1c1.5,1.4,0.7,5,0.2,6.6c1.1,1.5,1.7,3.2,1.6,5 c0,0.484-0.045,0.951-0.11,1.409c3.499-0.172,6.527-0.034,8.204,0.102c-0.002,0.337-0.033,0.666-0.051,0.999 c-1.671-0.138-4.775-0.28-8.359-0.089c-0.089,0.336-0.197,0.663-0.325,0.98c3.546,0.046,6.665,0.389,8.548,0.689 c-0.043,0.332-0.093,0.661-0.151,0.987c-1.912-0.306-5.171-0.664-8.879-0.682C35.112,30.873,31.557,32.75,26,32.969V33 c2.6,0,5,3.9,5,6.6V45c0,0.823,0.498,1.53,1.209,1.836C41.37,43.804,48,35.164,48,25C48,12.318,37.683,2,25,2S2,12.318,2,25 C2,35.164,8.63,43.804,17.791,46.836z"></path>
                        </svg>
                        <p class="text-lg font-opensans text-gray-700">{{ $settings['github'] }}</p>
                    </div>
                </a>
               </div>
            </div>
        </div>
        <div class="relative py-3 sm:max-w-xl sm:mx-auto" data-aos="flip-left" data-aos-duration="800">
            <div
                class="absolute inset-0 bg-gradient-to-r from-white to-light-gray shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="mx-auto">
                    <div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <input class="px-4 py-2 border-light-gray border-2 rounded-lg w-full mb-4" type="text" name="name" id="name" placeholder="Név" required>
                            @error('name')
                                {{ $message }}
                            @enderror
                            <input class="px-4 py-2 border-light-gray border-2 rounded-lg w-full mb-4" type="email" name="email" id="email" placeholder="Email" required>
                            @error('email')
                                {{ $message }}
                            @enderror
                            <input class="px-4 py-2 border-light-gray border-2 rounded-lg w-full mb-4" type="text" name="phone" id="phone" placeholder="Telefonszám">
                            @error('phone')
                                {{ $message }}
                            @enderror
                            <input class="px-4 py-2 border-light-gray border-2 rounded-lg w-full mb-4" type="text" name="subject" id="subject" placeholder="Tárgy" required>
                            @error('subject')
                                {{ $message }}
                            @enderror
                            <textarea class="resize-none px-4 py-2 border-light-gray border-2 rounded-lg w-full mb-4" name="message" id="message" rows="6" placeholder="Üzenet" required></textarea>
                            @error('message')
                                {{ $message }}
                            @enderror
                            <div class="flex justify-end">
                                <button type="submit" class="font-frankruhl font-semibold shadow-primary shadow-lg hover:shadow tracking-wider rounded-3xl text-primary hover:text-light-gray hover:bg-primary border-primary border-2 uppercase text-center py-3 px-8">Elküldés</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>

</script>
