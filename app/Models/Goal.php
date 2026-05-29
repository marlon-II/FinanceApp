<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'user_id', 'name', 'target_amount', 'current_amount', 'deadline', 'status',
    ];

    protected $casts = [
        'deadline'       => 'date',
        'target_amount'  => 'decimal:2',
        'current_amount' => 'decimal:2',
    ];

    // Percentual de progresso da meta
    public function progressPercent(): float
    {
        if ($this->target_amount == 0) return 0;
        return min(100, ($this->current_amount / $this->target_amount) * 100);
    }
}
