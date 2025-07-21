<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name')->comment('Name of the account');
        $table->string('email')->unique()->comment('account email that they need to use to login');
        $table->timestamp('email_verified_at')->nullable()->comment('The time the account was created');
        $table->string('password')->comment('password');
        $table->rememberToken();
        $table->timestamps();
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
