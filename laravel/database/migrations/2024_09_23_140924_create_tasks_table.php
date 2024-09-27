<?php

use App\Enum\PriorityEnum;
use App\Enum\StatusEnum;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->date('due_date');
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::PENDING->value);
            $table->enum('priority', array_column(PriorityEnum::cases(), 'value'))->default(PriorityEnum::High->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
