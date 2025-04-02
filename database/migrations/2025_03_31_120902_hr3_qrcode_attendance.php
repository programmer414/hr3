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
        Schema::create('hr3_qrcode_attendance', function (Blueprint $table) {
            $table->string('employee_id')->nullable();
            $table->primary(['employee_id']);
            $table->string('recruitment_id')->nullable();
            $table->string('generate_code')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
               });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
