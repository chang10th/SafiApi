<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedecineVisitreport extends Model
{
    use HasFactory;

    public function medecine()
    {
        return $this->hasMany(Medecine::class);
    }

    public function visitreport()
    {
        return $this->hasMany(Visitreport::class);
    }
}
