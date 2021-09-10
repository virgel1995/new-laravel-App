@extends('layouts.app')

@section('title')
{{ __("Online Users") }}
@endsection
@section('content')
<div class="container">
    <h1> Online Users</h1>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Last Seen</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                    </td>
                    <td>
                        @if(Cache::has('user-is-online-' . $user->id))
                            <span class="text-success">Online</span>
                        @else
                            <span class="text-secondary">Offline</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>




</div>
@endsection
