<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journals extends Model
{
    use HasFactory;
    protected $primaryKey = "academic_resources_id";

    public function setAttributes($volume, $issue) {
        $this->volume = $volume;
        $this->issue = $issue;
    }

}
