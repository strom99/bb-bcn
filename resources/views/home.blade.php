@extends('welcome')

@section('css')
    <link rel="stylesheet" href="css/home.css">
@endsection

@section('content')
    <div>
        <form action="/" method="GET">
            <select name="categoria">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <button>Filtrar</button>
        </form>
        <form action="/" method="GET">
            <input type="search" name="search" value={{ request()->get('search') }}>
            <button>Buscar</button>
        </form>
    </div>

    <div class="libros">
        @if(session('message'))
        <span>{{ session('message')}}</span>
    @endif
        @forelse ($libros as $libro)
        <div class="ctn">
            <a href="books/show/{{ $libro->id }}" class="libro">
                <span class="precio">{{ $libro->price}}</span>
                <div class="content-libro">
                    <div class="descrip">
                        <h2>{{ $libro->title}}</h2>
                        <span>{{ $libro->author}}</span>
                        <div class="img-div">
                            <img src="{{ $libro->img}}" alt="">
                        </div>
                        <p>{{ $libro->description}}</p>
                    </div>
                    <div class="foot-libro">
                        <span>{{ $libro->id}}</span>
                        <h3>{{ $libro->ISBN}}</h3>
                    </div>
                </div>
            </a>
            <div>
                <a href="books/{{ $libro->id }}/edit">Edit</a>
                <form action="books/{{ $libro->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button>Delete</button>
                </form>
            </div>
        </div>
        @empty
            <h2>No hay resultados</h2>
        @endforelse
    </div>
    <div style="display:flex;gap:10px;">
    @foreach(range(1, $libros->lastPage()) as $page)
            <a href="{{ request()->fullUrlWithQuery(['page' => $page]) }}" style="color: {{ $libros->currentPage() === $page ? 'red' : 'blue' }}">{{ $page }}</button>
        @endforeach
    </div>
@endsection