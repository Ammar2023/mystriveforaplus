<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuitionPostingsTable extends Migration
{
    public function up()
    {
        Schema::create('tuition_postings', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->decimal('tuition_fee', 8, 2);
            $table->unsignedInteger('max_students');
            $table->unsignedBigInteger('tutor_id');
            $table->foreign('tutor_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tuition_postings');
    }
};

