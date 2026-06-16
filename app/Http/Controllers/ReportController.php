<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(){
        $expenses = Expense::where('user_id', auth()->id())
        ->with('category')
        ->get();

        $incomes = Income::where('user_id', auth()->id())
        ->get();

        return view('reports.index', compact('expenses', 'incomes'));
    }

    public function exportPdf(){
        $expenses = Expense::where('user_id', auth()->id())
        ->with('category')
        ->get();

        $incomes = Income::where('user_id', auth()->id())
        ->get();

        $pdf = Pdf::loadView('reports.pdf', compact('expenses', 'incomes'));
        return $pdf->download('DespesasGanhos.pdf');
    }

    public function exportExcel()
    {
    return Excel::download(new ClassExport(), 'PlanilhaDespesasGanhos.xlsx');
    }
}
