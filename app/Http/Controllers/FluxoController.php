<?php

namespace App\Http\Controllers;

use App\Http\Requests\FluxoRequest;
use App\Models\Documento;
use App\Models\Fluxo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FluxoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FluxoRequest $request)
    {
        $dados = $request->all();
        $fluxo = Fluxo::create($dados);
        return redirect()->route('fluxos.show', [$request->documentoId])
        ->with('success', 'Novo Fluxo cadastrado para documento ' . $request->documento);
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
        $fluxos = DB::table('fluxos')->where('documentoId', $id)->orderBy('created_at', 'desc')->simplePaginate(5);

        return view('fluxos.show', ['fluxos' => $fluxos, 'documento' => $documento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fluxo = Fluxo::where('id', $id)->first();
        $fluxo->delete();

        return redirect()->back()->with('success', 'Fluxo excluido com sucesso');
    }

    public function addFluxo($id)
    {

        $documento = DB::table('documentos')->where('id', $id)->first();
        $setores = DB::table('setores')->orderBy('sigla', 'asc')->get();
        $funcionarios = DB::table('funcionarios')->orderBy('nome', 'asc')->get();

        return view('fluxos.create', ['documento' => $documento, 'setores' => $setores, 'funcionarios' => $funcionarios]);
    }
}
