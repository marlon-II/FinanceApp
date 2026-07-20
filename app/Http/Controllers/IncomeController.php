<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Account;  

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', auth()->id())
        ->with('account')
        ->orderBy('date', 'desc')
        ->paginate(10);

        return view('incomes.index', compact('incomes'));
    }

    public function create()
    {
        $account = Account::where('user_id', auth()->id())-get();
        return view('incomes.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'account_id'  => 'required|exists:accounts,id',
            'description' => 'required|string|max:255',
            'amount'      => 'required|numeric|min:0',
            'date'        => 'required|date',
            'type'        => 'required|in:salary,freelance,investment,other',
            'notes'       => 'nullable|string',
            'is_recurring'=> 'boolean',
        ]);

        $data['user_id'] = auth()->id();
        Income::create($data);

        return redirect()->route('incomes.index')
            ->with('success', 'Receita criada com sucesso!');
    }

    public function show(Income $income)
    {
        return view('incomes.show', compact('income'));
    }

    public function edit(string $id)
    {
        $accounts = Account::where('user_id', auth()->id())->get();
        return view('incomes.edit', compact('income', 'accounts'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'description' => 'required|string|max:255',
            'amount'      => 'required|numeric|min:0',
            'date'        => 'required|date',
            'notes'       => 'nullable|string',
        ]);

        $income->update($data);

        return redirect()->route('incomes.index')
            ->with('success', 'Receita atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $income->delete();

        return redirect()->route('incomes.index')
            ->with('success', 'Receita removida com sucesso!');
    }
}
