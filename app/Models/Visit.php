<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'practitioner_id',
        'employee_id',
        'attendedDate',
        'visitstate_id',
    ];

    protected $casts = [
        'attendedDate'=>'datetime',
    ];

    public function report()
    {
        return  $this->hasMany(Visitreport::class);
    }

    public function scopeDone($query)
    {
        $query->where('visitstate_id',Visitstate::firstWhere('name','done')->id);
    }

    public function practitioner()
    {
        return $this->belongsTo(Practitioner::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function state()
    {
        return $this->belongsTo(Visitstate::class);
    }
}
