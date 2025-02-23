<?php

use App\Models\Customer;
use App\Models\debts;
use App\Models\Gym;
use App\Models\registration;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Gym::class);
            $table->foreignIdFor(registration::class)->nullable();
            $table->foreignIdFor(debts::class)->nullable();
            $table->foreignIdFor(Customer::class);
            $table->float('amount');
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
