<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('leave_category_id')->nullable();
            $table->integer('id_employment');
            $table->string('title');
            $table->string('description');
            $table->boolean('is_approved');
            $table->integer('approved_by');
            $table->string('photo');
            $table->date('start_date');
            $table->date('due_date');
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
        Schema::dropIfExists('paid_leaves');
    }
}
