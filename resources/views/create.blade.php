@extends('welcome')

@section('css')
    <link rel="stylesheet" href="../css/create.css">
@endsection

@section('content')
    <div class="content">
        <h2>Formulario libro</h2>
        <form action="store" method="POST">
            @method('POST')
            @csrf
            <input type="text" placeholder="Title" name="title" value="{{ old('title') }}">
            @error('title')
                <p style="color: red">{{ $message }}</p>
            @enderror  
            <input type="text" placeholder="ISBN" name="isbn" value="{{ old('isbn') }}">
            @error('isbn')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <input type="text" placeholder="Author" name="author" value="{{ old('author') }}">
            @error('author')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <input type="number" placeholder="Price" name="price" value="{{ old('price') }}">
            @error('price')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <textarea placeholder="Write a description" name="description" name="description" id="" cols="30" rows="10">
                {{ old('description') }}
            </textarea>
            @error('description')
                <p style="color: red">{{ $message }}</p>
            @enderror 
            <input class="btn" type="submit" value="Send">

        </form>
           
    </div>
    @if(session('message'))
        <span>{{ session('message')}}</span>
    @endif
@endsection

