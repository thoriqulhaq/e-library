<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journals extends Model
{
    use HasFactory;

    protected $atrributes = [
        "volume",
        "issue"
    ];

    public function info() {
        return [$this->volume, $this->issue];
    }
}
