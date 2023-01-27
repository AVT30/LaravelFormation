<!-- va recuperer la structure de base pour toutes les pages du site en indiquant le dossier et le fichier -->
@extends('layouts.app')

<!-- remplace le body, mettre le code propre a la page dans cette section -->
@section('content')

    <h1>Bonjour tout le monde j'espère que vous allez bien</h1>

    <!-- Récupération de la variable instancié dans le controller PostController 2 Accualades la variable 2 Accualades -->

    <!-- Le if servira à savoir s'il y a des données qui seront affichées, si non, on mets un message qui indique qu'il n'y a pas de données -->
    @if ($posts->count() > 0)
        <!-- utilisation d'un foreach pour traiter chaque valeur dans le tableau posts dans le postcontroller -->
        @foreach($posts as $post)
                                                <!-- ça me permettra de prendre le objet grace a son id a part des autres donneés -->
            <h2><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</h2>
        @endforeach
    @else
        <span>Aucun post dans la base de données</span>
    @endif

@endsection