<!-- va recuperer la structure de base pour toutes les pages du site en indiquant le dossier et le fichier -->
@extends('layouts.app')

<!-- remplace le body, mettre le code propre a la page dans cette section -->
@section('content')

<!-- Récupération de la variable instancié dans le controller PostController 2 Accualades la variable 2 Accualades -->
    <!-- pour retourner un article en particulier avec son id -->
    <h1>{{ $post->content }}</h1>

    <span>{{ $post->image ? $post->image->path : "pas d'image" }}</span>
    <hr>
    <!-- foreach qui va les commentaires qui sont lie au poste grace a la foreign key/ Si c'est vide on utilise un forelse -->
    @forelse($post->comments as $comment)
        <h2>{{ $comment->content }} | crée le {{$comment->created_at->format('d/m/y h:m') }}</h2>

    @empty
        <span>Aucun commentaire pour ce poste</span>
    @endforelse

@endsection