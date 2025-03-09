<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('auto_delete_messages')->default(false);
            $table->integer('delete_messages_after_days')->default(7);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('auto_delete_messages');
            $table->dropColumn('delete_messages_after_days');
        });
    }
}; 