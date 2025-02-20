<?php

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
        Schema::create('freezes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(registration::class);
            $table->foreignIdFor(Gym::class);
            $table->date('freeze_start_date')->nullable();
            $table->date('freeze_end_date')->nullable();
            $table->date('registration_end_date')->nullable();
            $table->integer('freeze_duration')->nullable();
            $table->integer('end_date_remening_days')->nullable();
            $table->enum('status', ['active', 'expired']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freezes');
    }
};
