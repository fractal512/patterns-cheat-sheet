@extends('layouts.app')

@section('content')
    <ul>
        <li><strong>Pattern name:</strong> {{ $name }}</li>
        <li><strong>Dump:</strong> @php dump($item) @endphp</li>
    </ul>
@endsection
