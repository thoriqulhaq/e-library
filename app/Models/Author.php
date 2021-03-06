<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey = "name";
    protected $keyType = "string";

    public function books() {
        return $this->belongsToMany(AcademicResources::class);
    }
}
