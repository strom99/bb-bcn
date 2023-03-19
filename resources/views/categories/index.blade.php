@extends('welcome')


@section('content')
    <h1>Categorías</h1>
    <div>
        <a href="/categories/create">Crear categoría</button>
    </div>
    <ul>
        @foreach ($categories as $category)
         <li>
            {{ $category->name }}
            <a href="/categories/{{ $category->id }}/edit" style="margin-left: 10px">Editar</button>
            <form action="/categories/{{ $category->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button style="margin-left: 10px">Eliminar</button>
            </form>
        </li>
        @endforeach
    </ul>
@endsection