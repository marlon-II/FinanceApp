<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Income extends Model
{
    protected $fillable = [
        'user_id', 'account_id', 'description', 'amount',
        'date', 'type', 'notes', 'is_recurring',

    ];

    protected $casts =[
        'amount' => 'decimal:2',
        'date' => 'date',
        'is_recurring' => 'boolean',
    ];

    public function account(): BelongsTo{
        return $this->belongsTo(Account::class);
    }

    public function scopeOfMonth($query, $year, $month){
        return $query->whereYear('date', $year)
                     ->whereMonth('date', $month);
    }
}
