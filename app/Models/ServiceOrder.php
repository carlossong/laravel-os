<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'responsible_id',
        'start',
        'end',
        'status',
        'amount',
        'billed',
        'reported_defect',
        'found_defect',
        'comments',
    ];

     public function responsibles(): \Illuminate\Database\Eloquent\Relations\BelongsTo
     {
        return $this->belongsTo(User::class);
    }
}
