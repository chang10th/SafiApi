<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitreportstate extends Model
{
    use HasFactory;

    public function visitReports()
    {
        return $this->hasOne(Visitreport::class);
    }
}
