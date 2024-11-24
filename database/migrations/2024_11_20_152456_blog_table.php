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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->after('id');
            $table->string('category');
            $table->string('blogtitle', length: 100);
            $table->string('blogcontent', length: 1500);
            $table->string('photo', length: 100)->after('blogcontent');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');

        // Schema::table('blogs',function(Blueprint $table){
        //     $table->dropForeign('author_id');
        //     $table->dropColumn('title');
        //     $table->dropColumn('content');
        //     $table->dropColumn('photo');
        // });

    }
};
