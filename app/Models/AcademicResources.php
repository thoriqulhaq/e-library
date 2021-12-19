<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicResources extends Model
{
    use HasFactory;

    public function details()
    {
        if ($this->type == 0) {
            return $this->hasOne(Journals::class);
        } else if ($this->type == 1) {
            return $this->hasOne(Books::class);
        }
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, null, null, "author_name");
    }

    public function addAuthor($name) {
        $author = Author::where("name", $name)->first();
        if ($author == null) {
            $author = new Author();
            $author->name = $name;
            $author->save();
        }
        $this->authors()->attach($name);
    }

    public function UserBookmarks()
    {
        return $this->belongsTo(PublicUser::class);
    }
}
