<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentoRequest;
use App\Models\Documento;
use App\Models\Fluxo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = DB::table('documentos')->orderBy('codigo', 'desc')->simplePaginate(5);
        return view('documentos.index', ['documentos' => $documentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('documentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoRequest $request)
    {

        if ($request->hasFile('arquivo')) {
            $arquivo = $request->arquivo;
            $url = $arquivo->store('documentos');
            $request->request->add(['nomeOriginal' => $arquivo->getClientOriginalName(), 'url' => $url]);
            $documento = Documento::create($request->all());
            return redirect('documentos')->with('success', 'Documento cadastrado com sucesso!');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = DB::table('documentos')->where('id', $id)->first();
        return view('documentos.show', ['documento' => $documento]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //acho que nao e preciso
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentoRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento = Documento::where('id', $id)->first();

        if ($documento) {


            Storage::delete($documento->url);
            $documento->delete();
        }

        return redirect('documentos')->with('success', 'Documento excluido com sucesso!');
    }
}
