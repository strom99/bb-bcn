@extends('welcome')

@section('css')
<link rel="stylesheet" href="../../css/create.css">
@endsection

@section('content')
    <h3>Formulario edicion {{ $libro->id }}</h3>
    <div class="content">
        <form action="update" method="POST">
            @method('PUT')
            @csrf
            <input type="text" placeholder="Title" name="title" value="{{ old('title', $libro->title) }}">
            @error('title')
                <p style="color: red">{{ $message }}</p>
            @enderror  
            <input type="text" placeholder="ISBN" name="isbn" value="{{ old('isbn', $libro->ISBN) }}">
            @error('isbn')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <input type="text" placeholder="Author" name="author" value="{{ old('author', $libro->author) }}">
            @error('author')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <input type="number" placeholder="Price" name="price" value="{{ old('price', $libro->price) }}">
            @error('price')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <textarea placeholder="Write a description" name="description" name="description" id="" cols="30" rows="10">
                {{ old('description', $libro->description) }}
            </textarea>
            @error('description')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <input class="btn" type="submit" value="Change values">

        </form>
           
    </div>
    @if(session('message'))
        <span>{{ session('message')}}</span>
    @endif
@endsection