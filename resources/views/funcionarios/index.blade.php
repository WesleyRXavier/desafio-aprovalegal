@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de funcionarios | Adicionar : <a href="{{ route('funcionarios.create') }}"
                                    class="btn btn-success fa fa-plus"></a></h3>
                        </div>

                        <div class="box-body">

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Sigla</th>
                                        <th>Descricao</th>
                                        <th>CPF</th>
                                        <th style="text-align: center">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($funcionarios as $funcionario)
                                        <tr>
                                            <td><a
                                                    href="{{ route('funcionarios.show', $funcionario->id) }}">{{ $funcionario->nome }}</a>
                                            </td>
                                            <td>{{ $funcionario->email }}</td>
                                            <td>{{ $funcionario->cpf }}</td>
                                            <td style="display: flex">
                                                <form action="{{ route('funcionarios.destroy', $funcionario->id) }}"
                                                    method="post" style="margin-left: 5px">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('funcionarios.edit', $funcionario->id) }}"
                                                        class="btn btn-warning fa fa-edit "></a>
                                                    <button class="btn btn-danger fa fa-trash deleteRecord" type="submit"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p>{{ $funcionarios->links() }}</p>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
    </div>


@endsection
