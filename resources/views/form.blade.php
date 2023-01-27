@extends('layouts.app')
    
@section('content')
    <h1>Créer un poste</h1>

    <form method="POST" action="{{ route('posts.store')}}">
        <!-- Pour eviter les failles website (mettre nos input en hiden avec des token)-->
        @csrf
        <input type="text" name="title" id="" class="border-gray-600 border-2">
        <textarea name="content" id="" cols="30" rows="10" class="border-gray-600 border-2"></textarea>
        <button type="submit" class="bg-green-500">Créer</button>
    </form>
@endsection