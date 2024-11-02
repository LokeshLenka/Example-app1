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

        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('tokens', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id')->after('id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('token_id')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('tokens');

        // Schema::table('tokens', function (Blueprint $table) {

        //     $table->dropColumn('user_id');
        //     $table->dropColumn('token_id');
        //     $table->dropForeign(['user_id']);
        // });
    }
};
