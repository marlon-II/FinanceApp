<?php

namespace App\Services;

use App\Models\Expence;
use App\Models\Instanllment;
use Illuminate\Support\Facades\DB;

Class ExpenceService
{
    public function create (array $data): Expense
    {
        return DB::transaction(function () use($data){
            $expense = Expense::create([
                'user_id' => auth()->id(),
                'category_id' => $data['category_id'],
                'accont_id' => $data['account_id'],
                'description' => $data['description'],
                'amount' => $data['amout'],
                'due_date' => $data['due_date'],
                'type' => $data['type'],
                'status' => $data['status'] ?? 'pending',
                'notes' => $data['notes'] ?? null,
                'is_recurring' => $data['is-recurring'] ?? false,
                'recerrence_type' => $data['recerrence_type'] ?? null,
            ]);

            if ($data['type'] === 'installment' && isset($data['installments'])){
                $this->createInstallments($expense, $data);
            }

            return $expense;
        });
    }

    private function createInstallments (Expense $expense, array $data): void 
    {
        $totalInstallments = $data['installments'];
        $installmentsAmout = $data['amount'] / $totalInstallments;
        $dueDate = \Carbon\Carbon::parse($data['due_date']);

        for ($i = 1; $i <= $totalInstallments; $i++) {
            Installment::create([
                'expense_id' => $expense->id,
                'installment_number' => $i,
                'amount' => $installmentsAmout,
                'due_date' => $duedate->copy()->addMonths($i - 1),
                'status' => 'pending',
            ]);
        }
    }

    public function update(Expense $expense, array $data): Expense
    {
        $expense->update($data);
        return $expense;
    }

    public function delete(Expense $espense): void 
    {
        $expense->installments()->delete();
        $expense->delete();
    }
}

