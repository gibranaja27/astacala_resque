<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('beritabencana', function (Blueprint $table) {
            $table->dropColumn('dibuat_oleh_admin_username');
        });
    }

    public function down(): void
    {
        Schema::table('beritabencana', function (Blueprint $table) {
            $table->string('dibuat_oleh_admin_username')->nullable();
        });
    }
};
