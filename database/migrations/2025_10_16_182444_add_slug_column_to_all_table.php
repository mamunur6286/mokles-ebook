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
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'slug')) {
                $table->string('slug')->unique()->after('id')->nullable();
            }
        });
        Schema::table('authors', function (Blueprint $table) {
            if (!Schema::hasColumn('authors', 'slug')) {
                $table->string('slug')->unique()->after('id')->nullable();
            }
        });
        Schema::table('series', function (Blueprint $table) {
            if (!Schema::hasColumn('series', 'slug')) {
                $table->string('slug')->unique()->after('id')->nullable();
            }
        });
        Schema::table('books', function (Blueprint $table) {
            if (!Schema::hasColumn('books', 'slug')) {
                $table->string('slug')->unique()->after('id')->nullable();
            }
        });
        Schema::table('lessons', function (Blueprint $table) {
            if (!Schema::hasColumn('lessons', 'slug')) {
                $table->string('slug')->after('id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'slug')) {
                $table->dropColumn(columns: 'slug');
            }
        });
        Schema::table('authors', function (Blueprint $table) {
            if (Schema::hasColumn('authors', 'slug')) {
                $table->dropColumn(columns: 'slug');
            }
        });
        Schema::table('series', function (Blueprint $table) {

            if (Schema::hasColumn('series', 'slug')) {
                $table->dropColumn(columns: 'slug');
            }
        });
        Schema::table('books', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'slug')) {
                $table->dropColumn(columns: 'slug');
            }
        });
        Schema::table('lessons', function (Blueprint $table) {
            if (Schema::hasColumn('lessons', 'slug')) {
                $table->dropColumn(columns: 'slug');
            }
        });
    }
};
