@extends('layouts.app')

@section('content')
    <ul>
        <li><strong>Pattern name:</strong> {{ $name }}</li>
        <li><strong>delete add_read_only dump:</strong> @php dump($item) @endphp</li>
    </ul>
@endsection
