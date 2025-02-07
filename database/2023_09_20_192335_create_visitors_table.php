<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('visitors');
        Schema::create('visitors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("visitable")->nullable();
            $table->string("visitable_id")->nullable();
            $table->string('auth_id')->nullable()->index();
            $table->string('ip')->nullable()->index();
            $table->string('referer')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('path')->nullable();
            $table->timestamps();

            $table->index('created_at');
            $table->index(['visitable', 'visitable_id']);
            $table->fullText(['auth_id', 'ip', 'referer', 'user_agent', 'path']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
};
