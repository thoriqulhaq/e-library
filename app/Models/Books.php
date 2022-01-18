<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $primaryKey = "academic_resources_id";

    public function setAttributes($publisher, $isbn, ?int $edition) {
        $this->publisher = $publisher;
        $this->isbn = $isbn;
        $this->edition = $edition;
    }
}
