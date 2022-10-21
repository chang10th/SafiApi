<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitreport extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'creationDate',
        'comment',
        'starScore',
        'visitreportstate_id',
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function visitReportState()
    {
        return $this->belongsTo(Visitreportstate::class);
    }

    public function medecine()
    {
        return $this->belongsToMany(Medecine::class);
    }
}
