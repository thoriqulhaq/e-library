<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $attributes = [
        "publisher",
        "edition",
        "isbn"
    ];

    public function info() {
        return [$this->publisher, $this->edition, $this->isbn];
    }
}

?>
