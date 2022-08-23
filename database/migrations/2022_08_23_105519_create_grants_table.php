<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('grants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('category_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignUuid('company_id')->constrained();
            $table->foreignUuid('created_by_id')->constrained()->references('id')->on('users');
            $table->string('description');
            $table->decimal('amount')->unsigned();
            $table->date('start');
            $table->date('end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grants');
    }
};
