<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('title')->get();




        //update les valeurs(pour les edits de vrais valeur on a juste a recupere le $request des formulaires... meme chose pour le delete)
        // $post = Post::find(1);

        // $post->update
        // ([
        //     'title' => 'Mon nouveau titre édité'
        // ]);

        //voici pour le delete
        // $postD = Post::find(12);

        // $postD->delete();




        //Récupération des données qui sont stocké dans la base de données
        
                



        // //tableau qu'on envoie à la vu avec les valeurs 
        // $posts = 
        // [
        //     'Mon super titre',
        //     'Super titre 2'
        // ];

        //$titre = 'Mon super titre';
        //$titre2 = 'Super titre 2';
        
        //Compact => va envoyer la variable titre à la vue directement 
        //return view('articles', compact('titre', 'titre2'));
        return view('articles', compact('posts'));

        //Autre manière de faire est : 
        //return view('articles')->with('titre', $titre);
    }

    public function show($id)
    {
        //permet de trouver un enregistrement dans la bdd (orfail permet de mettre une erreur 404 au lieu de faire planter le site)
        $post = post::findorFail($id);

        //autre manière de faire plus précise, si on cherche un text precis etc. exemple, mettre plusieurs chaussures, à la place du title = id chaussure et à la place de texte = id chassure sur lequel on a clique
        //$post = post::where('title', 'Aut molestias enim qui esse perspiciatis aut.')->first();


        //tableau avec mes id(mes objets)
        // $posts = [
        //     1 => 'Mon titre n°1',
        //     2 => 'Super titre n°2',
        // ];

        //variable qui va retourner l'un des id qui seront dans le tableau / ?? permet de faire un sinon suivi de ce qui produira s'il n'y a pas de id
        // $post = $posts[$id] ?? 'Il n\'y a pas de titres';

        //envoie de l'id avec sa valeur
        return view('article', [
            'post' => $post
        ]);
    }

    public function contact(){

        return view('contact');
    }

    
    public function create()
    {
        return view('form');
    }

    //pour récuperer par exemple un formulaire, on mets dans les paramètres request etc
    public function store(Request $request)
    {   



        //permet de insérer les données qu'on à mis dan le formulaire dans la bdd
            // $post = new Post();
    
            // $post->title = $request->title;
            // $post->content = $request->content;
            // $post->save();


        //on mets de required sur les champs qui ne peuvent pas être nul
            $request->validate([
                                                    //unique verifie si la valeur n'existe pas dans la db
                'title' => ['required', 'min:5', 'max:255', 'unique:posts'],
                'content' => ['required']
            ]);

            
            //pour le fourmulaire si on veut ajouter une image pour un post

            $filename = time().'.'.$request->avatar->extension();

            $path = $request->file('avatar')->storeAs(
                'avatars',
                $filename,
                'public'
            );

        //autre manière de faire il faut aller dans le model 
            $post = Post::create
            ([
                'title'=> $request->title,
                'content'=> $request->content
            ]);

            //afficher les images
            $image = new Image();
            $image->path = $path;

            $post->image()->save($image);
             

    }

}
