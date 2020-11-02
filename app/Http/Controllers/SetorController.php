<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetorRequest;
use App\Models\Empresa;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setores = DB::table('setores')->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('setores.index', ['setores' => $setores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = DB::table('empresas')->orderBy('razaoSocial', 'asc')->get();
        return view('setores.create', ['empresas' => $empresas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SetorRequest $request)
    {

        $dados = $request->all();
        $empresas = $request->empresas;
        $setor = Setor::create($dados);

        try {
            $setor->empresas()->attach($empresas);

        } catch (Exception $erro) {
            $setor->empresas()->detach($empresas);
            $setor->delete();

        }

        return redirect('setores')->with('success', 'Setor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setor = DB::table('setores')->where('id', $id)->first();
        return view('setores.show', ['setor' => $setor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresas = DB::table('empresas')->orderBy('razaoSocial', 'asc')->get();
        $setor = Setor::where('id', $id)->first();
        return view('setores.edit', ['setor' => $setor, 'empresas' => $empresas]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SetorRequest $request, $id)
    {
        $dados = $request->all();

        $setor = Setor::where('id', $id)->first();
        $setor->empresas()->detach($setor->empresa);
        $setor->empresas()->attach($request->empresas);
        $setor->fill($request->all());
        $setor->save();
        return redirect('setores')->with('success', 'Setor alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setor = Setor::where('id', $id)->first();
        $setor->empresas()->detach($setor->empresas);
        $setor->funcionarios()->detach($setor->funcionarios);
        $setor->delete();
        return redirect('setores')->with('success', 'Setor excluido com sucesso!');
    }
}
