<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'description',
        'user_id',
        'payment_method',
        'date',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
