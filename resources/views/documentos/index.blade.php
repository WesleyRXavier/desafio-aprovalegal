@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Documentos | Adicionar : <a href="{{ route('documentos.create') }}"
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

                                        <th>Codigo</th>
                                        <th>Nome Arquivo</th>
                                        <th>Enviar</th>
                                        <th>Baixar</th>

                                        <th style="text-align: center">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($documentos as $documento)
                                        <tr>

                                            <td>{{ $documento->codigo }}</td>
                                            <td>
                                                {{ substr($documento->nomeOriginal,0,20).' ...' }}
                                                </td>
                                                <td>
                                                    <a href="{{route('fluxos.show', $documento->id)}}" >
                                                        <i class="fa fa-share" aria-hidden="true"> Fluxo</i></a>
                                                    </td>
                                                <td>
                                                    <a href="{{url('storage/'.$documento->url)}}" target="blank">Baixar</a>
                                                    </td>
                                            <td style="display: flex">
                                                <form action="{{ route('documentos.destroy', $documento->id) }}"
                                                    method="post" style="margin-left: 5px">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn btn-danger fa fa-trash deleteRecord" type="submit"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p>{{ $documentos->links() }}</p>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
    </div>


@endsection
