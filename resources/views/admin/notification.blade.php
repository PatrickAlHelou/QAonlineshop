@extends('layouts.adminMainLayout')

@section('content')

    @foreach(auth()->user()->notification as $notification)
        <div class="notification-item">
            <h6>{{ $notification->data['title'] }}</h6>
            <p>{{ $notification->data['message'] }}</p>
        </div>
    @endforeach


@endsection
