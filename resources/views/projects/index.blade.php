@extends('layouts.app')

@section('content')
<div style="background-image: url('{{asset('images/centerblob2.svg')}}'); background-repeat: no-repeat; background-position: center;
background-size: contain;">
    <div class="min-h-screen max-h-screen max-w-screen pt-10 m-20">
        <livewire:projects/>
    </div>
</div>
@endsection
