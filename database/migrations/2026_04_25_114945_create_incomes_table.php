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
    Schema::create('incomes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('account_id')->constrained()->onDelete('cascade');
        $table->string('description');
        $table->decimal('amount', 10, 2);
        $table->date('date');
        $table->enum('type', ['salary', 'freelance', 'investment', 'other']);
        $table->text('notes')->nullable();
        $table->boolean('is_recurring')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
