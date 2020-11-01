<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Empresa;
use App\Models\Setor;
use App\Models\Funcionario;
use Illuminate\Support\Facades\DB;


class FuncionarioController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = DB::table('funcionarios')->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('funcionarios.index', ['funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setores = DB::table('setores')->orderBy('sigla', 'asc')->get();
        return view('funcionarios.create', ['setores' => $setores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {

        $dados = $request->all();
        $setores = $request->setores;
        $funcionario = Funcionario::create($dados);
        try {
            $funcionario->setores()->attach($setores);

        } catch (Exception $erro) {
            $funcionario->setores()->detach($setores);
            $funcionario->delete();

        }

        return redirect('funcionarios')->with('success', 'Funcionario cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::where('id', $id)->first();
        return view('funcionarios.show', ['funcionario' => $funcionario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setores = DB::table('setores')->orderBy('sigla', 'asc')->get();
        $funcionario = DB::table('funcionarios')->where('id', $id)->first();
        return view('funcionarios.edit', ['funcionario' => $funcionario, 'setores' => $setores]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioRequest $request, $id)
    {
        $dados = $request->all();

        $funcionario = Funcionario::where('id', $id)->first();
        $funcionario->setores()->detach($funcionario->setores);
        $funcionario->setores()->attach($request->setores);
        $funcionario->fill($request->all());
        $funcionario->save();
        return redirect('funcionarios')->with('success', 'Funcionario alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::where('id', $id)->first();
        $funcionario->setores()->detach($funcionario->setores);
        $funcionario->delete();
        return redirect('funcionarios')->with('success', 'Funcionario excluido com sucesso!');
    }
}
