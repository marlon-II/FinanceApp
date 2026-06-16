<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;
use App\Models\Account;
use App\Service\ExpenseService;

class ExpenseController extends Controller
{
    public function __construct(
        private ExpenseService $expenseService
    ){}

    public function index()
    {
        $expences = Expense::where('user_id', auth()->id())
        ->with(['category', 'account'])
        ->orderBy('due_date', 'desc')
        ->paginate(10);

        return view('expense.index',compact('expense'));
    }

    public function create()
    {
        $categories = Category::where('user_id', auth()->id()->get());;
        $accounts = Account::where('user_id',auth()->id()->get());

        returny view('exspense.create', compact('categories', 'accounts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'account_id'     => 'required|exists:accounts,id',
            'description'    => 'required|string|max:255',
            'amount'         => 'required|numeric|min:0',
            'due_date'       => 'required|date',
            'type'           => 'required|in:fixed,variable,installment',
            'status'         => 'required|in:pending,paid,overdue',
            'notes'          => 'nullable|string',
            'is_recurring'   => 'boolean',
            'recurrence_type'=> 'nullable|in:monthly,weekly,yearly',
            'installments'   => 'nullable|integer|min:2',
        ]);

        $this->expenseService->create($data);

        return redirect()->route('expense.index')
        ->with('sucecess', 'Despesa criada com sucesso!');
    }

    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        $categories = Category::where('user_id', auth()->id())->get();
        $accounts   = Account::where('user_id', auth()->id())->get();

        return view('expenses.edit', compact('expense', 'categories', 'accounts'));
    }

    public function update(Request $request, Expense $expense)
    {
        $data = $request->validate([
            'description' => 'required|string|max:255',
            'amount'      => 'required|numeric|min:0',
            'due_date'    => 'required|date',
            'status'      => 'required|in:pending,paid,overdue',
            'notes'       => 'nullable|string',
        ]);

        $this->expenseService->update($expense, $data);

        return redirect()->route('expenses.index')
            ->with('success', 'Despesa atualizada com sucesso!');
    }

    public function destroy(Expense $expense)
    {
        $this->expenseService->delete($expense);

        return redirect()->route('expenses.index')
            ->with('success', 'Despesa removida com sucesso!');
    }
}
