<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $attributes = [
        "title",
        "description",
        "genre",
        "publication_place",
        "publication_date",
        "type"
    ];
}

?>
