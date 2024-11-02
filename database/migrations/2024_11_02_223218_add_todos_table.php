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

        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('todos', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id')->after('id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title', length: 255)->after('user_id');
            $table->string('description', length: 1000)->nullable();
            $table->boolean('completed')->default(false);
            $table->dateTime('remainder_at')->nullable();
            $table->enum('priority', ['high', 'low', 'med'])->default('low');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');

        // Schema::table('todos', function (Blueprint $table) {

        //     $table->dropColumn('user_id');
        //     $table->dropColumn('title');
        //     $table->dropColumn('description');
        //     $table->dropColumn('completed');
        //     $table->dropColumn('remainder_at');
        //     $table->dropColumn('priority');
        //     $table->dropForeign(['user_id']);
        // });
    }
};
