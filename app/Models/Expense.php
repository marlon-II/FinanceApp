<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expense extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'account_id',
        'amount', 'description', 'date',
        'type', 'status', 'is_recurring', 'total_installments',
    ];

    protected $casts = [
        'date'               => 'date',
        'amount'             => 'decimal:2',
        'is_recurring'       => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function installments(): HasMany
    {
        return $this->hasMany(Installment::class);  
    }


    public function scopeOfMonth($query, $year, $month)
    {
        return $query->whereYear('date', $year)
                     ->whereMonth('date', $month);
    }
}
