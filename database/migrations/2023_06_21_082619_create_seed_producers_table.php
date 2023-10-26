<?php
use Encore\Admin\Auth\Database\Administrator;
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
        Schema::create('seed_producers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('producer_registration_number')->nullable();
            $table->string('producer_category');
            $table->string('name_of_applicant');
            $table->string('applicant_phone_number');
            $table->string('applicant_email');
            $table->string('premises_location');
            $table->string('proposed_farm_location');
            $table->string('years_of_experience');
            $table->text('gardening_history_description');
            $table->text('storage_facilities_description');
            $table->tinyInteger('have_adequate_isolation');
            $table->text('labor_details');
            $table->string('receipt');
            $table->string('status')->default('pending');
            $table->text('status_comment')->nullable();
            $table->unsignedInteger('inspector_id')->nullable();
            $table->string('grower_number')->nullable();
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_until')->nullable();
   
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->foreign('inspector_id')->references('id')->on('admin_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seed_producers');
    }
};
