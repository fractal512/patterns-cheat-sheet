@extends('layouts.app')

@section('content')
    <ul>
        <li><strong>Pattern name:</strong> {{ $name }}</li>
        <li><strong>Dump:</strong> @php dump($item) @endphp</li>
        <li>
            <strong>Details:</strong> study logs, please &rarr; {{ base_path('storage/logs/laravel.log') }}
        </li>
    </ul>
@endsection
