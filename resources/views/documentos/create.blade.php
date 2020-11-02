@extends('layouts.appLayout')

@section('content')

    <div class="container" style="padding-top: 20px">

        <div class="box col-md-10">


            <form action="{{ route('documentos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="codigo">Codigo:</label>
                    <input type="text" class="form-control" name="codigo" id="codigo" placeholder="codigo" autocomplete="off"
                        value="{{old('codigo')}}" maxlength="10">
                    @if ($errors->has('codigo'))
                        <small id="codigoErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('codigo') }}</small>
                    @endif
                </div>

                <div class="form-group">

                    <input type="file" class="form-control-file"  name="arquivo" id="arquivo">
                    @if ($errors->has('arquivo'))
                        <small id="arquivoErro"
                            class="form-text text-muted alert-danger">{{ $errors->first('arquivo') }}</small>
                    @endif
                  </div>



                <br>
                <div class="text-right">
                    <a href="{{ route('documentos.index') }}" class="btn btn-warning" role="button">Voltar</a>
                    <button class="btn btn-success " type="submit">Salvar</button>
                </div>
            </form>
        </div>

    </div>


@endsection
