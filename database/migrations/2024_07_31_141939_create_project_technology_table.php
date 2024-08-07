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
        Schema::create('project_technology', function (Blueprint $table) {
            $table->primary(['project_id', 'technology_id']);
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('technology_id');
            $table->timestamps();


            $table->foreign('project_id')->references('id')->on('projects')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('technology_id')->references('id')->on('technologies')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};


// $table->dropForeign(['type_id']);
// $table->dropColumn('type_id');
