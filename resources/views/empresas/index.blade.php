@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box ">
                            <div class="box-header">
                                <h3 class="box-title">Lista de Empresas | Adicionar : <a
                                        href="{{ route('empresas.create') }}" class="btn btn-success fa fa-plus"></a></h3>
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
                                            <th>Razão Social</th>
                                            <th>Nome Fantasia</th>
                                            <th>Cnpj</th>
                                            <th style="text-align: center">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($empresas as $empresa)
                                            <tr>
                                                <td><a
                                                        href="{{ route('empresas.show', $empresa->id) }}">{{ $empresa->razaoSocial }}</a>
                                                </td>
                                                <td>{{ $empresa->nomeFantasia }}</td>
                                                <td>{{ $empresa->cnpj }}</td>
                                                <td style="display: flex">
                                                    <form action="{{ route('empresas.destroy', $empresa->id) }}"
                                                        method="post" style="margin-left: 5px">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="{{ route('empresas.edit', $empresa->id) }}"
                                                            class="btn btn-warning fa fa-edit "></a>
                                                        <button class="btn btn-danger fa fa-trash deleteRecord"
                                                            type="submit"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p>{{ $empresas->links() }}</p>

                            </div>
                        </div>

                    </div>

                </div>
            </section>
        </div>
    </div>


@endsection
