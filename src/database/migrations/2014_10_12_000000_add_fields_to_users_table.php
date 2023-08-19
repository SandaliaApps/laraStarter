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
                
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->default(3);
            $table->tinyInteger('terms');
            $table->string('username')->unique();
            $table->string('image')->default('default.png');
            $table->text('about')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
            $table->tinyInteger('terms');
            $table->dropColumn('username');
            $table->dropColumn('image');
            $table->dropColumn('about');
        });
    }
};
