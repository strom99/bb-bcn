@extends('welcome')


@section('content')
    <form action="/categories/{{ $category->id }}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="name" value={{ old('name', $category->name) }}>
        <button type="submit">
            Editar categoría
        </button>
    </form>
@endsection