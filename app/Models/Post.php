<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    //sert à ordonner a remplir les valeurs choisi
    protected $fillable = ['title', 'content'];


    //2.(3.Comment.php) mettre les commantaires dans la classe post on mets en pluriers car peut avoir plusieurs commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
