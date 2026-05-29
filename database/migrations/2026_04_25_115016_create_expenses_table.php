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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('account_id')->constrained();
            $table->decimal('amount', 10, 2);
            $table->string('description');
            $table->date('date');
            $table->enum('type', ['fixa', 'variavel', 'parcelado']);
            $table->enum('status', ['pendente', 'pago', 'vencido'])->default('pendente');
            $table->boolean('is_recurring')->default(false);
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
