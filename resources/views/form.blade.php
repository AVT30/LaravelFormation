@extends('layouts.app')
    
@section('content')
    <h1>Créer un poste</h1>

    <!-- Pour les messages d'erreurs sur le formulaire -->
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form method="POST" action="{{ route('posts.store')}}" enctype="multipart/form-data">
        <!-- Pour eviter les failles website (mettre nos input en hiden avec des token)-->
        @csrf
        <input type="text" name="title" id="" class="border-gray-600 border-2">
        <textarea name="content" id="" cols="30" rows="10" class="border-gray-600 border-2"></textarea>
        <label for="avatar">Choose a profile picture:</label>

        <input type="file"
            id="avatar" name="avatar"
            accept="image/png, image/jpeg">

        <button type="submit" class="bg-green-500">Créer</button>
    </form>
@endsection