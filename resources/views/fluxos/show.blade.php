@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Documento: {{ $documento->codigo }}  | Adicionar Fluxo :
                                <a href="{{ route('fluxos.addFluxo',$documento->id) }}"
                                    class="btn btn-success fa fa-plus"></a></h3>
                        </div>

                        <div class="box">
                            <div class="jumbotron">
                                <h1 class="display-4">{{ $documento->codigo }}</h1>
                                <p class="lead">Nome: {{ $documento->nomeOriginal }}</p>
                                <a href="{{url('storage/'.$documento->url)}}" target="blank">Baixar</a>
                              </div>


                        </div>

                        <div class="box-body">

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                            <table id="example1" class="table table-bordered table-striped">
                                <h5 class="text-center">Fuxos do documento</h5>
                                <thead>
                                    <tr>

                                        <th>data</th>
                                        <th>Setor de Origem</th>
                                        <th>Func. de Origem</th>
                                        <th>Setor de destino</th>
                                        <th>Func. de destino</th>
                                        <th>Status</th>
                                        <th>Observação</th>



                                        <th style="text-align: center">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($fluxos as $fluxo)
                                        <tr>
                                            <td>{{Carbon\Carbon::parse($fluxo->created_at)->format('d/m/Y H:m')}}</td>
                                            <td>{{ $fluxo->setorOrigem }}</td>
                                            <td>{{ $fluxo->funcOrigem }}</td>
                                            <td>{{ $fluxo->setorDestino }}</td>
                                            <td>{{ $fluxo->funcDestino }}</td>
                                            <td>{{ $fluxo->status }}</td>
                                            <td>{{ $fluxo->observacao }}</td>


                                            <td style="display: flex">
                                                <form action="{{ route('fluxos.destroy', $fluxo->id) }}"
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
                            <p>{{ $fluxos->links() }}</p>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
    </div>


@endsection
