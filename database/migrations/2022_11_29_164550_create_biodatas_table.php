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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('nim')->nullable();
            $table->string('nik')->nullable();
            $table->string('pob')->nullable();
            $table->date('dob')->nullable();
            $table->string('faculty')->nullable();
            $table->string('study_program')->nullable();
            $table->integer('ipk')->nullable();

            $table->string('munaqasyah')->nullable();
            $table->string('school_certificate')->nullable();
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('spukt')->nullable();

            $table->foreignId('student_id')->constrained('students')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
    }
};
