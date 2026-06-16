<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::where('user_id', auth()->id())
            ->orderBy('deadline')
            ->get();

        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'target_amount'  => 'required|numeric|min:0',
            'current_amount' => 'nullable|numeric|min:0',
            'deadline'       => 'required|date',
            'notes'          => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();
        $data['status']  = 'in_progress';
        Goal::create($data);

        return redirect()->route('goals.index')
            ->with('success', 'Meta criada com sucesso!');
    }

    public function show(Goal $goal)
    {
        return view('goals.show', compact('goal'));
    }

    public function edit(Goal $goal)
    {
        return view('goals.edit', compact('goal'));
    }

    public function update(Request $request, Goal $goal)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'target_amount'  => 'required|numeric|min:0',
            'current_amount' => 'nullable|numeric|min:0',
            'deadline'       => 'required|date',
            'status'         => 'required|in:in_progress,completed,cancelled',
            'notes'          => 'nullable|string',
        ]);

        $goal->update($data);

        return redirect()->route('goals.index')
            ->with('success', 'Meta atualizada com sucesso!');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();

        return redirect()->route('goals.index')
            ->with('success', 'Meta removida com sucesso!');
    }
}