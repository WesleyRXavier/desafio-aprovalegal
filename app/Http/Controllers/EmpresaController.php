<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = DB::table('empresas')->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('empresas.index', ['empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {

        $dados = $request->all();
        $empresa = Empresa::create($dados);
        return redirect('empresas')->with('success', 'Empresa cadastrada com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = DB::table('empresas')->where('id',$id)->first();
        return view('empresas.show', ['empresa' => $empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = DB::table('empresas')->where('id',$id)->first();
        return view('empresas.edit', ['empresa' => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {
        $empresa = Empresa::where('id', $id)->first();
        $empresa->fill($request->all());
        $empresa->save();
        return redirect('empresas')->with('success', 'Empresa atualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::where('id', $id)->first();
        $empresa->setores()->detach($empresa->setores);
        $empresa->delete();

        return redirect('empresas')->with('success', 'Empresa excluida com sucesso!');
    }
}
