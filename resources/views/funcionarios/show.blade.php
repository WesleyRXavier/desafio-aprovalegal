@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">
            <div class="jumbotron">
                <h1 class="display-4">{{ $funcionario->nome }}</h1>
                <p class="lead">Email: {{ $funcionario->email }}</p>
                <p>CPF: {{ $funcionario->cpf }}</p>
                <hr class="my-4">

              </div>
              <div class="text-right">
                <a href="{{ route('funcionarios.index') }}" class="btn btn-warning" role="button">Voltar</a>

            </div>

        </div>


    </div>


@endsection
