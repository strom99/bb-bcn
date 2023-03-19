@extends('welcome')


@section('content')
    <form action="/categories" method="POST">
        @csrf
        <input type="text" name="name">
        <button type="submit">
            Crear categoría
        </button>
    </form>
@endsection