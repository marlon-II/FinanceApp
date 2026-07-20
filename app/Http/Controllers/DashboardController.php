<?php

namespace App\Http\Controllers;

use App\Services\DistributionService;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Goal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private DistributionService $distributionService
    ) {}

    public function index()
    {
        $userId = auth()->id();
        $month  = now()->format('Y-m');

        $distribution = $this->distributionService->calculate($userId, $month);

        $recentExpenses = Expense::where('user_id', $userId)
            ->with('category')
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        $recentIncomes = Income::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        $goals = Goal::where('user_id', $userId)
            ->where('status', 'in_progress')
            ->get();

        return view('dashboard', compact(
            'distribution',
            'recentExpenses',
            'recentIncomes',
            'goals'
        ));
    }
}
