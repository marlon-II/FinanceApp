<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('expenses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->foreignId('account_id')->constrained()->onDelete('cascade');
        $table->string('description');
        $table->decimal('amount', 10, 2);
        $table->date('date');
        $table->enum('type', ['fixed', 'variable', 'installment']);
        $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending');
        $table->text('notes')->nullable();
        $table->boolean('is_recurring')->default(false);
        $table->string('recurrence_type')->nullable();
        $table->unsignedTinyInteger('total_installments')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
