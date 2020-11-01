@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">


            <form action="{{ route('setores.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="sigla">Sigla:</label>
                    <input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" autocomplete="off"
                        value="{{ old('sigla') }}" maxlength="5">
                    @if ($errors->has('sigla'))
                        <small id="siglaErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('sigla') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Nome Fantasia"
                        autocomplete="off" value="{{ old('descricao') }}">
                    @if ($errors->has('descricao'))
                        <small id="descricaoErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('descricao') }}</small>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">
                      <h5>Empresas</h5>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        @foreach ($empresas as $empresa)
                        <label class="label">
                            <input type="checkbox" name="empresas[]" value="{{ $empresa->id }}
                           " {{ in_array($empresa->id, old('empresas', [])) ? 'checked' : '' }}><span>{{ $empresa->razaoSocial  }}</span>
                        </label>
                        &nbsp
                        @endforeach

                    </div>
                    </div>
                  </div>

                <br>
                <div class="text-right">
                    <a href="{{ route('setores.index') }}" class="btn btn-warning" role="button">Voltar</a>
                    <button class="btn btn-success " type="submit">Criar Setor</button>
                </div>
            </form>
        </div>

    </div>


@endsection
