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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('meeting_id')->nullable();
            $table->bigInteger('meeting_participant_id')->nullable();
            $table->bigInteger('organization_id')->nullable();
            $table->bigInteger('employee_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->text('comment')->nullable();
            $table->text('reply')->nullable();
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
        Schema::dropIfExists('comments');
    }
};
