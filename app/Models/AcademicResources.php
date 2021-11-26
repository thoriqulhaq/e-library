<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicResources extends Model
{
    use HasFactory;

    public function details() {
        if ($this->type == 0) {
            return $this->hasOne(Journals::class);
        }
        else if ($this->type == 1) {
            return $this->hasOne(Books::class);
        }
    }

    public function authors() {
        return $this->belongsToMany(Author::class);
    }
}

?>