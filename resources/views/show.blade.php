@extends('welcome')

@section('css')
    <link rel="stylesheet" href="css/show.css">
@endsection

@section('content')
    <div>
        <h2>{{ $libro->title}}</h2>
        <span>{{ $libro->author}}</span>
        <img src="{{$libro->img}}" alt="">
        <span>{{ $libro->ISBN}}</span>
        <span>{{ $libro->description}}</span>
        <span>{{ $libro->price}}</span>
        <span>{{ $libro->published_date}}</span>

    </div>
@endsection

