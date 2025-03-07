<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->string('surname')->comment('фамилия');
            $table->string('name')->comment('имя');
            $table->string('patronymic')->comment('отчество');
            $table->string('iin', 12)->unique()->comment('уникальный ИИН резидента/нерезидента РК');
            $table->string('phone_number')->nullable()->comment('личный телефонный номер, необязательный');
            $table->string('email')->unique()->comment('уникальная электронная почта');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
