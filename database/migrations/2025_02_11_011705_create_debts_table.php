<?php

use App\Models\Customer;
use App\Models\Gym;
use App\Models\registration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Gym::class)->nullable();
            $table->foreignIdFor(registration::class)->nullable();
            $table->foreignIdFor(Customer::class)->nullable();
            $table->float('debt_amount');
            $table->float('paid_amount');
            $table->date('debt_date')->nullable();
            $table->text('details')->nullable();
            $table->date('last_payment_date')->nullable();
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debts');
    }
};
