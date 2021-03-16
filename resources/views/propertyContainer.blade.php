@extends('layouts.app')

@section('content')
    <ul>
        <li><strong>Pattern name:</strong> {{ $name }}</li>
        <li><strong>Pattern description:</strong> {{ $description }}</li>
        <li><strong>add_last_update dump:</strong> @php dump($add_last_update) @endphp</li>
        <li><strong>change_last_update dump:</strong> @php dump($change_last_update) @endphp</li>
        <li><strong>add_read_only dump:</strong> @php dump($add_read_only) @endphp</li>
        <li><strong>delete add_read_only dump:</strong> @php dump($item) @endphp</li>
    </ul>
@endsection
