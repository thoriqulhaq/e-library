<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PublicUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = "user_id";

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(AcademicResources::class);
    }
}
