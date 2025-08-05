<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('beritabencana', function (Blueprint $table) {
            $table->unsignedBigInteger('dibuat_oleh_admin_id')->nullable();

            $table->foreign('dibuat_oleh_admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('set null'); // atau 'cascade' jika ingin dihapus saat admin dihapus
        });
    }

    public function down(): void
    {
        Schema::table('beritabencana', function (Blueprint $table) {
            $table->dropForeign(['dibuat_oleh_admin_id']);
            $table->dropColumn('dibuat_oleh_admin_id');
        });
    }
};
