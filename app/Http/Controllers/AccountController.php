<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::where('user_id', auth()->id())
            ->orderBy('name')
            ->get();

        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => 'required|string|max:255',
            'type'            => 'required|in:checking,savings,investment,cash',
            'balance'         => 'required|numeric|min:0',
            'bank_name'       => 'nullable|string|max:255',
            'account_number'  => 'nullable|string|max:50',
        ]);

        $data['user_id'] = auth()->id();
        Account::create($data);

        return redirect()->route('accounts.index')
            ->with('success', 'Conta criada com sucesso!');
    }

    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }

    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, Account $account)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'type'           => 'required|in:checking,savings,investment,cash',
            'balance'        => 'required|numeric|min:0',
            'bank_name'      => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
        ]);

        $account->update($data);

        return redirect()->route('accounts.index')
            ->with('success', 'Conta atualizada com sucesso!');
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index')
            ->with('success', 'Conta removida com sucesso!');
    }
}