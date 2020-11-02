@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">


            <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="post" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" autocomplete="off"
                    value="{{old('nome')?? $funcionario->nome}}" >
                    @if ($errors->has('nome'))
                        <small id="nomeErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('nome') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                        autocomplete="off" value="{{old('email')?? $funcionario->email}}">
                    @if ($errors->has('email'))
                        <small id="emailErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="cpf" class="form-control" name="cpf" id="cpf" placeholder="cpf"
                        autocomplete="off" maxlength="14" value="{{old('cpf')?? $funcionario->cpf}}">
                    @if ($errors->has('cpf'))
                        <small id="cpfErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('cpf') }}</small>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">
                      <h5>Setores</h5>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        @foreach ($setores as $setor)
                        <label class="label">
                            <input type="checkbox" name="setores[]" value="{{ $setor->id }}"
                            {{(in_array($setor->id, old("setores") ?: []) ? "checked" :(
                            $funcionario->setores->contains($setor->id) ? 'checked' : '' ))}}>{{ $setor->sigla }}</span>
                        </label>
                        &nbsp
                        @endforeach

                    </div>
                    </div>
                  </div>

                <br>
                <div class="text-right">
                    <a href="{{ route('funcionarios.index') }}" class="btn btn-warning" role="button">Voltar</a>
                    <button class="btn btn-success " type="submit">Salvar</button>
                </div>
            </form>
        </div>

    </div>


@endsection
