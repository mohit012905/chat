<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('messages')) {

            Schema::table('messages', function (Blueprint $table) {

                if (!Schema::hasColumn('messages', 'is_seen')) {
                    $table->boolean('is_seen')->default(false);
                }

            });

        }
    }

    public function down(): void
    {
        if (Schema::hasTable('messages') &&
            Schema::hasColumn('messages', 'is_seen')) {

            Schema::table('messages', function (Blueprint $table) {
                $table->dropColumn('is_seen');
            });

        }
    }
};