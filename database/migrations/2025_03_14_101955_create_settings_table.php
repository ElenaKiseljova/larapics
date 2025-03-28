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
    Schema::create('settings', function (Blueprint $table) {
      $table->id();
      $table->boolean('disable_comments')->default(false);
      $table->boolean('moderate_comments')->default(false);
      $table->json('email_notification')->nullable()->default(null);
      $table->foreignId('user_id')->constrained()->cascadeOnDelete();
      $table->unique('user_id');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('settings');
  }
};
