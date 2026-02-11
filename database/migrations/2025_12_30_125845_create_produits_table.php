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
    Schema::create('produits', function (Blueprint $table) {
        $table->id();
        $table->foreignId('fournisseur_id')->constrained()->cascadeOnDelete();
        $table->string('nom');
        $table->string('code'); // unique par entreprise
        $table->decimal('prix_achat', 12, 2)->default(0);
        $table->decimal('prix_vente', 12, 2)->default(0);
        $table->integer('stock')->default(0);
        $table->integer('stock_min')->default(0);
        $table->boolean('statut')->default(true);
        $table->timestamps();

    });
}
};
