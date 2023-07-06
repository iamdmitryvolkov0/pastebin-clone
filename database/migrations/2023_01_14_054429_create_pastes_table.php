<?php

use App\Enums\PasteStatusEnum;
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
        Schema::create('pastes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->text('body')->nullable();
            $table->integer('status')->default(PasteStatusEnum::STATUS_PUBLIC->value);
            $table->string('language', 32)->nullable();
            $table->timestamps();
            $table->timestamp('hide_in')->nullable();
            $table->string('hash_link')->unique();

            $table->foreignId('user_id')->nullable()->references('id')->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pastes');
    }
};
