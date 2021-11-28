<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicUser extends Model
{
    use HasFactory;

    protected $atrributes = [
        "id_number"
    ];

    public function bookmarks()
    {
        return $this->hasMany(AcademicResources::class);
    }
}
