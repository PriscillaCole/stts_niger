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
        Schema::create('seed_labs', function (Blueprint $table) {
            $table->id();
            $table->string('sample_request_number')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedBigInteger('load_stock_id')->nullable();
            $table->unsignedBigInteger('crop_variety_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->date('sample_request_date')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->text('applicant_remarks')->nullable();
            $table->text('priority')->nullable();
            $table->text('additional_instructions')->nullable();
            $table->unsignedInteger('lab_receptionist_id')->nullable();
            $table->unsignedInteger('inspector_id')->nullable();
            $table->unsignedInteger('lab_officer_id')->nullable();
            $table->dateTime('reporting_date')->nullable();
    


            $table->string('seed_lab_test_report_number')->nullable();
            $table->string('seed_sample_request_number')->nullable();
            $table->unsignedFloat('seed_sample_size')->nullable();
            $table->string('testing_methods')->nullable();
            $table->unsignedFloat('germination_test_results')->nullable();
            $table->unsignedFloat('purity_test_results')->nullable();
            $table->unsignedFloat('moisture_content_test_results')->nullable();
            $table->text('additional_tests_results')->nullable();
            $table->string('test_decision')->nullable();
            $table->text('reporting_and_signature')->nullable();
            $table->text('mother_lot')->nullable();
            $table->text('lot_number')->nullable();
            $table->string('status')->nullable();
            $table->text('status_comment')->nullable();
            $table->timestamps();

            $table->foreign('load_stock_id')->references('id')->on('load_stocks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->foreign('lab_receptionist_id')->references('id')->on('admin_users');
            $table->foreign('inspector_id')->references('id')->on('admin_users');
            $table->foreign('lab_officer_id')->references('id')->on('admin_users');
            $table->foreign('crop_variety_id')->references('id')->on('crop_varieties')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seed_lab_test_reports');
    }
};
