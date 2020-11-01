@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">
            <div class="jumbotron">
                <h1 class="display-4">{{ $setor->sigla }}</h1>
                <p class="lead">Descricao: {{ $setor->descricao }}</p>

                <hr class="my-4">

              </div>
              <div class="text-right">
                <a href="{{ route('empresas.index') }}" class="btn btn-warning" role="button">Voltar</a>

            </div>

        </div>


    </div>


@endsection
