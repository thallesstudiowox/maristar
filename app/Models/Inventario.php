<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Kyslik\ColumnSortable\Sortable;

class Inventario extends Model
{
    use HasFactory;
    //, Sortable;


    protected $fillable = [
'image',
'descritivo',
'categorias',
'estilos',
'cintura',
'fecho',
'tamanho',
'cor',
'marcas',
'tecidos',
'modelo_manga',
'gola',
'modelo_calca',
'caimento',
'comprimento_perna_cos_barra',
'medida_cos',
'medida_gancho',
'altura_gola_barra',
'largura_ombro_a_ombro',
'medida_manga_ombro_punho',
'altura_media_gola_cintura',
'altura_total_gola_barra',
'comprimento_perna',
'altura_cos_barra'

    ];

    public $sortable = [
        'image',
        'descritivo',
        'categoria',
        'estilo',
        'cintura',
        'fecho',
        'tamanho',
        'cor',
        'marca',
        'tecido',
        'modelo_manga',
        'gola',
        'modelo_calca',
        'caimento',
        'comprimento_perna_cos_barra',
        'medida_cos',
        'medida_gancho',
        'altura_gola_barra',
        'largura_ombro_a_ombro',
        'medida_manga_ombro_punho',
        'altura_media_gola_cintura',
        'altura_total_gola_barra',
        'comprimento_perna',
        'altura_cos_barra','created_at'];

}
