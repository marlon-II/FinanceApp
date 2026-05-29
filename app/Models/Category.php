<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'name', 'color', 'icon', 'monthly_limit'];

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    // Retorna categorias globais + as do usuário logado
    public function scopeAvailable($query, $userId)
    {
        return $query->where(function ($q) use ($userId) {
            $q->whereNull('user_id')->orWhere('user_id', $userId);
        });
    }
}
