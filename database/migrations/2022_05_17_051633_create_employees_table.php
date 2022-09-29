<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();   
            $table->string('username');         
            $table->string('password',200);
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender',50)->nullable();
            $table->string('marital_status',20)->nullable();
            $table->string('nationality',100)->nullable();
            $table->string('identity_number',100)->nullable();
            $table->string('photo',150)->nullable();
            $table->text('address')->nullable();
            $table->string('city',100)->nullable();
            $table->string('mobile',100)->nullable();
            $table->string('email',100)->nullable();
            $table->integer('positions_id')->nullable();
            $table->date('joining_date')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('bank_account',50)->nullable();
            $table->string('bank_name',50)->nullable();
            $table->string('type_employe',20)->nullable();
            $table->string('type_payrol',20)->nullable();
            $table->text('notes')->nullable();
            $table->string('nik',25)->nullable();
            $table->string('npwp',25)->nullable();
            $table->string('bpjs',25)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
