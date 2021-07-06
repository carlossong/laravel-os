<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'responsible',
        'start',
        'end',
        'status',
        'amount',
        'billed',
        'reported_defect',
        'found_defect',
        'comments',
    ];

    public function responsibles()
    {
        return $this->belongsTo(User::class, 'responsible', 'id');
    }
}
