@extends('layouts.app')
@section('title', 'Projektek')
@section('content')
<div style="background-image: url('{{asset('images/centerblob2.svg')}}'); background-repeat: no-repeat; background-position: center;
background-size: contain;">
    <div class="min-h-screen max-w-screen pt-10 m-20">
        @if(isset($tag))
            <livewire:projects :tag="$tag"/>
        @else
            <livewire:projects/>
        @endif
    </div>
</div>
@endsection
