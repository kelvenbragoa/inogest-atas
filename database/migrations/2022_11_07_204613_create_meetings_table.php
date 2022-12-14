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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->text('subject');
            $table->text('body')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->bigInteger('type_meeting_id');
            $table->bigInteger('organization_id');
            $table->bigInteger('department_id');
            $table->bigInteger('created_by_user_id');
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
        Schema::dropIfExists('meetings');
    }
};
