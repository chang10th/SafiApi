<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practitionerstate extends Model
{
    use HasFactory;

    public function practitioner()
    {
        return $this->hasMany(Practitioner::class);
    }
}
