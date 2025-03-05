<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('speaker_has_calendars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('speaker_id');
            $table->unsignedBigInteger('calendar_id');
            $table->timestamps();

            $table->foreign('speaker_id')->references('id')->on('speakers');
            $table->foreign('calendar_id')->references('id')->on('calendars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speaker_has_calendars');
    }
};
