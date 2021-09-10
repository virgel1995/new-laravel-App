@extends('mainlayots.master2')

@section('title')
{{ __("Profile Page") }}
@endsection

@section('content')

<h1> {{ $user->id }}</h1>
<h1> {{ $user->first_name }}</h1>
<h1> {{ $user->middle_name }}</h1>

@endsection
