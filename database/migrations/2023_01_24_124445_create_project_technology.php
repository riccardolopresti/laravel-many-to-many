<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_technology', function (Blueprint $table) {
            //relazione con projects
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                ->on('projects')
                ->cascadeOnDelete();

            //relazione con tech
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')
                ->on('technologies')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_technology');
    }
};
