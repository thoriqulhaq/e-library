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

    public function addBookmark($object)
    {

        if ($this->isBookmarked($object)) {
            return $this->bookmarks()->where([
                ['academic_resources_public_users.academic_resources_id', get_class($object)],
                ['academic_resources_public_users.users_id', $object->id]
            ])->delete();
        }

        return $this->bookmarks()->create(['academic_resources_id' => get_class($object), 'users_id' => $object->id]);
    }

    public function isBookmarked($object)
    {
        return $this->bookmarks()->where([
            ['academic_resources_public_users.academic_resources_id', get_class($object)],
            ['academic_resources_public_users.users_id', $object->id]
        ])->exists();
    }
}
