<?php

use App\Models\Apartment;
use App\Models\Feature;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_feature', function (Blueprint $table) {
            $table->foreignIdFor(Apartment::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Feature::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['apartment_id', 'feature_id']);

            $table->index('apartment_id');
            $table->index('feature_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_feature');
    }
};
