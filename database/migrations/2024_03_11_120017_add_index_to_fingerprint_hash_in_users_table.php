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
        Schema::table('users', function (Blueprint $table) {
            // Change the column type to text to accommodate indexes
            $table->text('fingerprint_hash')->change();
            // Add index to the fingerprint_hash column
            $table->index('fingerprint_hash');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Reverse the changes in the down method if needed
            $table->string('fingerprint_hash')->change();
            $table->dropIndex(['fingerprint_hash']);
        });
    }
};
