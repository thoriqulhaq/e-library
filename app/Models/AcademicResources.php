<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicResources extends Model
{
    use HasFactory;

    protected $atrributes = [
        "title",
        "description",
        "genre",
        "publication_place",
        "publication_date",
        "type"
    ];

    public function details() {
        if ($this->type == 0) {
            return $this->hasOne(Journals::class);
        }
        else if ($this->type == 1) {
            return $this->hasOne(Books::class);
        }
    }
}

?>