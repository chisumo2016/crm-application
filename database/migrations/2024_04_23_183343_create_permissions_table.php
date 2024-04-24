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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        /**PIVOT TABLE ***/
       Schema::create('permission_role', function (Blueprint $table) {
           $table->id();
            $table->foreignId('permission_id');
            $table->foreignId('role_id');
            $table->timestamps();
        });

        /**PIVOT TABLE ***/
       Schema::create('permission_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permission_id');
            $table->foreignId('plan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permission_plan');
    }
};
