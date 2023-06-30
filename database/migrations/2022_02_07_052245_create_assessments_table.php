<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('as_ws_pages');
            $table->string('as_ws_styles');
            $table->text('as_ws_styles_text')->nullable();
            $table->string('as_ws_functions');
            $table->text('as_ws_functions_text')->nullable();
            $table->string('as_ws_budget');
            $table->text('as_ws_budget_text')->nullable();
            $table->string('as_ws_timeframe');
            $table->text('as_ws_timeframe_text')->nullable();
            $table->string('as_ws_hosting');
            $table->string('as_ws_domain');
            $table->string('as_ws_content');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
