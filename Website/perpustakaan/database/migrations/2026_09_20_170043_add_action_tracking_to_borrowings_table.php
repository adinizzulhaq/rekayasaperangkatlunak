<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('borrowings', function (Blueprint $table) {

            $table->dateTime('approved_at')
                ->nullable()
                ->after('approved_by');

            $table->foreignId('rejected_by')
                ->nullable()
                ->after('approved_at')
                ->constrained('users')
                ->nullOnDelete();

            $table->dateTime('rejected_at')
                ->nullable()
                ->after('rejected_by');

            $table->foreignId('returned_by')
                ->nullable()
                ->after('rejected_at')
                ->constrained('users')
                ->nullOnDelete();

            /*
             * returned_at SUDAH ADA pada migration lama,
             * jadi tidak dibuat ulang di sini.
             */
        });
    }

    public function down(): void
    {
        Schema::table('borrowings', function (Blueprint $table) {

            $table->dropForeign(['rejected_by']);
            $table->dropForeign(['returned_by']);

            $table->dropColumn([
                'approved_at',
                'rejected_by',
                'rejected_at',
                'returned_by',
            ]);
        });
    }
};
