@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">


            <form action="{{ route('fluxos.store') }}" method="post">
                @csrf

                <div class="form-group col-md-8">
                    <label for="documento">Documento:</label>
                    <input type="text" class="form-control" name="documento" id="documento" placeholder="documento"
                        autocomplete="off" value="{{ old('documento') ?? $documento->codigo }}" maxlength="10" readonly>
                    <input type="text" hidden name="documentoId" value="{{ $documento->id }}">
                    @if ($errors->has('documento'))
                        <small id="documentoErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('documento') }}</small>
                    @endif
                </div>
                <div class="row col-md-10">
                    <div class="form-group col-md-5">
                        <label for="setorOrigem">Setor Origem</label>
                        <select class="form-control" id="setorOrigem" name="setorOrigem">
                            <option value="" selected>Selecione um setor<option
                            @foreach ($setores as $setor)
                                <option value="{{ $setor->sigla }}"
                                    {{ old('setorOrigem') == $setor->sigla ? 'selected' : '' }}>
                                    {{ $setor->sigla }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('setorOrigem'))
                            <small id="setorOrigem"
                                class="form-text text-muted alert-danger">{{ $errors->first('setorOrigem') }}</small>
                        @endif
                    </div>

                    <div class="form-group col-md-5">
                        <label for="funcOrigem">funcionario Origem</label>
                        <select class="form-control" id="funcOrigem" name="funcOrigem">
                            <option value="" selected>Selecione um funcionario<option
                            @foreach ($funcionarios as $funcionario)
                                <option value="{{ $funcionario->nome }}"
                                    {{ old('funcOrigem') == $funcionario->nome ? 'selected' : '' }}>{{ $funcionario->nome }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('funcOrigem'))
                            <small id="funcOrigem"
                                class="form-text text-muted alert-danger">{{ $errors->first('funcOrigem') }}</small>
                        @endif
                    </div>

                </div>
                <div class="row col-md-10">
                    <div class="form-group col-md-5">
                        <label for="setorDestino">Setor Destino</label>
                        <select class="form-control" id="setorDestino" name="setorDestino">
                            <option value="" selected>Selecione um setor<option
                            @foreach ($setores as $setor)
                                <option value="{{ $setor->sigla }}"
                                    {{ old('setorDestino') == $setor->sigla ? 'selected' : '' }}>{{ $setor->sigla }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('setorDestino'))
                            <small id="setorDestino"
                                class="form-text text-muted alert-danger">{{ $errors->first('setorDestino') }}</small>
                        @endif
                    </div>

                    <div class="form-group col-md-5">
                        <label for="funcDestino">funcionario Destino</label>
                        <select class="form-control" id="funcDestino" name="funcDestino">
                            <option value="" selected>Selecione um funcionario<option
                            @foreach ($funcionarios as $funcionario)
                                <option value="{{ $funcionario->nome }}"
                                    {{ old('funcDestino') == $funcionario->nome ? 'selected' : '' }}>{{ $funcionario->nome }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('funcDestino'))
                            <small id="funcDestino"
                                class="form-text text-muted alert-danger">{{ $errors->first('funcDestino') }}</small>
                        @endif
                    </div>

                </div>

                <div class="form-group col-md-8">
                    <label for="status">Status do Documento</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Andamento" {{ old('status') == 'Andamento' ? 'selected' : '' }}>Andamento</option>
                        <option value="Finalizado"{{ old('status') == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                    </select>
                    @if ($errors->has('status'))
                        <small id="status" class="form-text text-muted alert-danger">{{ $errors->first('status') }}</small>
                    @endif
                </div>

                <div class="form-group col-md-8">
                    <label for="observacao">OberVações</label>
                    <textarea class="form-control" id="observacao" name="observacao" rows="3"
                        placeholder="Digite suas observacoes ">{{ old('observacao') }}</textarea>
                </div>





                <br>
                <div class="text-right col-md-8">
                    <a href="{{ route('documentos.index') }}" class="btn btn-warning" role="button">Voltar</a>
                    <button class="btn btn-success " type="submit">Salvar</button>
                </div>
            </form>
        </div>

    </div>


@endsection
