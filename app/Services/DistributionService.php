<?php

namespace App\Services;

use App\Models\Expense;
use App\Models\Income;

class DistributionService
{
    const NEED_PERCENTAGE = 50;
    const WANTS_PERCENTAGE =30;
    const INVESTIMENTS_PERCENTAGE = 20;

    public function calculate(int $userid, string $month): array
    {
        $totalIncome = Icome::where('user-id', $userId)
        ->whereMonth('date', date('m', strtotime($month)))
        ->whereYear('date', date('Y', strtotime($month)))
        ->sum('amount');

        $totalExpenses = Expense::where('user_id', $userId)
            ->whereMonth('due_date', date('m', strtotime($month)))
            ->whereYear('due_date', date('Y', strtotime($month)))
            ->sum('amount');

        return [
            'total_income'   => $totalIncome,
            'total_expenses' => $totalExpenses,
            'needs' => [
                'recommended' => $totalIncome * (self::NEEDS_PERCENTAGE / 100),
                'percentage'  => self::NEEDS_PERCENTAGE,
            ],
            'wants' => [
                'recommended' => $totalIncome * (self::WANTS_PERCENTAGE / 100),
                'percentage'  => self::WANTS_PERCENTAGE,
            ],
            'investments' => [
                'recommended' => $totalIncome * (self::INVESTMENTS_PERCENTAGE / 100),
                'percentage'  => self::INVESTMENTS_PERCENTAGE,
            ],
        ];
    }
}