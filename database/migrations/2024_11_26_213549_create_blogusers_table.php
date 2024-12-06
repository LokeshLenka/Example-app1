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
        Schema::create('blogusers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('blogusers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->bigInteger('blogpostcount')->after('user_id');
            $table->bigInteger('followers')->default(0)->after('blogpostcount');
            $table->bigInteger('following')->default(0)->after('followers');
            $table->string('bio', length: 300)->nullable(true)->after('following');
            $table->string('dp', length: 100)->nullable(true)->after('bio');
            $table->boolean('is_private')->default(false);
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogusers');
    }
};
