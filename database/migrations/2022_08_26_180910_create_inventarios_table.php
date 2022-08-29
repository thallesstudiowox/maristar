<?php

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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('descritivo')->default("Sem descritivo.");
            $table->json('image');
            $table->string('categorias');
            $table->string('estilos')->default("N/A.");
            $table->string('cintura')->default("N/A.");
            $table->string('fecho')->default("N/A.");
            $table->string('tamanho')->default("N/A.");
            $table->string('cor')->default("N/A.");
            $table->string('marcas')->default("N/A.");
            $table->string('tecidos')->default("N/A.");
            $table->string('modelo_manga')->default("N/A.");
            $table->string('gola')->default("N/A.");
            $table->string('modelo_calca')->default("N/A.");
            $table->string('caimento')->default("N/A.");
            $table->string('comprimento_perna_cos_barra')->default("N/A.");
            $table->string('medida_cos')->default("N/A.");
            $table->string('medida_gancho')->default("N/A.");
            $table->string('altura_gola_barra')->default("N/A.");
            $table->string('largura_ombro_a_ombro')->default("N/A.");
            $table->string('medida_manga_ombro_punho')->default("N/A.");
            $table->string('altura_media_gola_cintura')->default("N/A.");
            $table->string('altura_total_gola_barra')->default("N/A.");
            $table->string('comprimento_perna')->default("N/A.");
            $table->string('altura_cos_barra')->default("N/A.");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
};
