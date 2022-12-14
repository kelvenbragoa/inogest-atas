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
        Schema::create('meeting_participants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('meeting_id');
            $table->bigInteger('organization_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('employee_id')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('obs')->nullable();
            $table->bigInteger('email_status');
            $table->bigInteger('source');
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
        Schema::dropIfExists('meeting_participants');
    }
};
