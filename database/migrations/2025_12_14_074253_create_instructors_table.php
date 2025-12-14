<?php
// Migration code
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('specialization')->nullable();
            $table->text('bio')->nullable();
            $table->string('image_url')->nullable();
            $table->json('social_links')->nullable();
            $table->timestamps();
        });

        // Add instructor_id to courses table
        Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('instructor_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['instructor_id']);
            $table->dropColumn('instructor_id');
        });

        Schema::dropIfExists('instructors');
    }
};
