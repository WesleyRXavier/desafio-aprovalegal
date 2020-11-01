@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">


            <form action="{{ route('empresas.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="razaoSocial">Razão Social:</label>
                    <input type="text" class="form-control" name="razaoSocial" id="razaoSocial" placeholder="Razão Social"
                        autocomplete="off" value="{{ old('razaoSocial') }}">
                    @if ($errors->has('razaoSocial'))
                        <small id="razaoSocialErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('razaoSocial') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nomeFantasia">Nome Fantasia:</label>
                    <input type="text" class="form-control" name="nomeFantasia" id="nomeFantasia"
                        placeholder="Nome Fantasia" autocomplete="off" value="{{ old('nomeFantasia') }}">
                    @if ($errors->has('nomeFantasia'))
                        <small id="nomeFantasiaErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('nomeFantasia') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ" autocomplete="off"
                        value="{{ old('cnpj') }}">
                </div>
                <div>
                    @if ($errors->has('cnpj'))
                        <small id="cnpjErro" class="form-text text-muted alert-danger">{{ $errors->first('cnpj') }}</small>
                    @endif

                </div>
                <br>
                <div class="text-right">
                    <a href="{{ route('empresas.index') }}" class="btn btn-warning" role="button">Voltar</a>
                    <button class="btn btn-success " type="submit">Criar Empresa</button>
                </div>
            </form>
        </div>

    </div>


@endsection
