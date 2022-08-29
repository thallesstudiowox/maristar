<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventarioRequest;
use App\Http\Requests\UpdateInventarioRequest;
use App\Models\Inventario;
use Illuminate\Support\Str;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mari.inventario');
        //->with(['files' => $files,'totalSize' => $totalSize,'totalSizeSpace'=>$totalSizeSpace]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventarioRequest $req)
    {
        //     $data = json_encode($request->all());


        // dd($req->request->all());
        $data = $req->request->all();

        $fileName = $req->file('file')->getClientOriginalName();
        $fileName = pathinfo($fileName, PATHINFO_FILENAME);
        $slug = Str::of(time().'_'.$fileName)->slug('-')->value.".".$req->file('file')->extension();
        $filePath = $req->file('file')->storeAs('uploads', $slug, 'public');
        $fileUpload = [];
        $fileUpload['name']= $fileName;
        $fileUpload['slug']= $slug;
        $fileUpload['file_path'] = $filePath;

        $dataSave = [];
        $dataSave = $data;
        $dataSave['image'] = json_encode($fileUpload);

        // $dataSave['descritivo'] = $data->descritivo;
        // $dataSave['categoria'] = $data->categoria;
        // $dataSave['cintura'] = $data->cintura;
        // $dataSave['estilo'] = $data->estilo;
        // $dataSave['fecho'] = $data->fecho;
        // $dataSave['tamanho'] = $data->tamanho;
        // $dataSave['cor'] = $data->cor;
        // $dataSave['marca'] = $data->marca;
        // $dataSave['tecido'] = $data->tecido;
        // $dataSave['modelo_manga'] = $data->modelo_manga;
        // $dataSave['gola'] = $data->gola;
        // $dataSave['modelo_calca'] = $data->modelo_calca;
        // $dataSave['caimento'] = $data->caimento;
        // $dataSave['comprimento_perna_cos_barra'] = $data->comprimento_perna_cos_barra;
        // $dataSave['medida_cos'] = $data->medida_cos;
        // $dataSave['medida_gancho'] = $data->medida_gancho;
        // $dataSave['altura_gola_barra'] = $data->altura_gola_barra;
        // $dataSave['largura_ombro_a_ombro'] = $data->largura_ombro_a_ombro;
        // $dataSave['medida_manga_ombro_punho'] = $data->medida_manga_ombro_punho;
        // $dataSave['altura_media_gola_cintura'] = $data->altura_media_gola_cintura;
        // $dataSave['altura_total_gola_barra'] = $data->altura_total_gola_barra;
        // $dataSave['comprimento_perna'] = $data->comprimento_perna;
        // $dataSave['altura_cos_barra'] = $data->altura_cos_barra;



        // dd($dataSave);

        Inventario::create($dataSave);
        // dd($req->file('file'));
/*
            $req->validate([
                'file' => 'required',
                'file.*' => 'required|mimes:jpg,jpeg,zip,png,webp,csv,txt,xlx,xls,pdf,csv,psd,gif,mp4',
            ]);



            if ($req->file('file')){
                foreach($req->file('file') as $key => $file) {
                    $fileName = $file->getClientOriginalName();
                    $fileName = pathinfo($fileName, PATHINFO_FILENAME);
                    $slug = Str::of(time().'_'.$fileName)->slug('-')->value.".".$file->extension();
                    $filePath = $file->storeAs('uploads', $slug, 'public');
                    $fileUpload = [];
                    $fileUpload['name']= $fileName;
                    $fileUpload['slug']= $slug;
                    $fileUpload['file_path'] = $filePath;

                }
            }
*/
            // Inventario::create($fileUpload);
           return redirect()->route('inventario.index')->with('success','Arquivos salvos com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventarioRequest  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventarioRequest $request, Inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
