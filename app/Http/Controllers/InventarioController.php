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

        Inventario::create($dataSave);
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
    public function destroy($id)
    {
        $file = Inventario::findOrFail($id);
        $path = public_path('storage').'/'. json_decode($file->image)->file_path;

        if(\File::exists($path)){
            \File::delete($path);

            $file->delete();

            $pecas = Inventario::sortable()->paginate(10);
            return view('mari.lista-pecas')->with(["pecas"=> $pecas]);

        }else{
            return back()->with('success', 'Arquivo não encontrado.');
        }
    }
}
