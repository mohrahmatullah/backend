<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReimbursmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reimbursments', function (Blueprint $table) {
            $table->id();
            $table->string('reimb_amount');
            $table->timestamp('reimb_submitted')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('date_use')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('id_employment');
            $table->integer('reimb_type_id')->nullable();
            $table->string('description');
            $table->boolean('is_approved');
            $table->string('photo');
            $table->integer('approved_by')->nullable();
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
        Schema::dropIfExists('reimbursments');
    }
}
