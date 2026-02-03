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
        Schema::create('interview_batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name'); // e.g., "Batch A - Morning"
            $table->date('interview_date');
            $table->time('interview_time');
            $table->string('location'); // Offline location
            $table->timestamps();
        });

        // 2. Add foreign key to applications table
        Schema::table('applications', function (Blueprint $table) {
            $table->foreignId('interview_batch_id')->nullable()->constrained('interview_batches')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['interview_batch_id']);
            $table->dropColumn('interview_batch_id');
        });
        Schema::dropIfExists('interview_batches');
    }
};
