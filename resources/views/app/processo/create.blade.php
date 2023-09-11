@extends('app.layouts.templateApp')

@section('content')

<div class="container">

    <h3 class="col-md-9 fw-bold mb-4 ms-4">Novo Processo</h3>

    <div class="formProcesso">
        <form action="{{ route('processo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- responsavel --}}
            <div class="row mb-3">
                <label for="inputNumCaixa" class="col-sm-3 col-form-label fs-5">Responsavel</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputNumCaixa" name="responsavel_processo" value="{{ Auth::user()->name }}" readonly>
                </div>
            </div>
            {{-- Protocolo SIARCO --}}
            <div class="row mb-3">
                <label for="inputSiarco" class="col-sm-3 col-form-label fs-5">Protocolo SIARCO</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputSiarco" name="numero_siarco">
                    {{-- Validação do Campo protocolo SIARCO --}}
                    @if ($errors->has('numero_siarco'))
                        <div class="text-bg-danger ps-2 bg-opacity-75">
                            {{ $errors->first('numero_siarco') }}
                        </div>
                    @endif
                </div>
            </div>
           
            {{-- posicao --}}
            <div class="row mb-3">
                <label for="inputPosicao" class="col-sm-3 col-form-label fs-5">Posição na Caixa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPosicao" name="posicao" value="{{ old('posicao')}}">
                </div>
            </div>

            {{-- numero da caixa --}}
            <div class="row mb-3">
                <label for="selectCaixa" class="col-sm-3 col-form-label fs-5">Nº da Caixa</label>
                <div class="col-sm-8">
                    <select class="form-select" id="selectCaixa" name="caixa_id" aria-label="Default select example">
                        <option selected>Número da Caixa</option>
                        @foreach ($caixas as $caixa)
                            @if ($caixa->status == 'aberta')
                                <option value="{{$caixa->id}}">{{$caixa->num_caixa}}</option>
                            @endif
                        @endforeach
                    </select>
                    
                    {{--caminho do path --}}
                    @if ($errors->has('caixa_id'))
                        <div class="text-bg-danger ps-2 bg-opacity-75">
                          {{ $errors->first('caixa_id') }}
                        </div>
                    @endif
                </div>
            </div>
            {{-- path --}}
            <div class="row mb-3">
                <div class="col-sm-11">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="path">
                        <label class="input-group-text" for="inputGroupFile02">Anexar</label>
                    </div>
                    {{--caminho do path --}}
                    @if ($errors->has('path'))
                        <div class="text-bg-danger ps-2 bg-opacity-75">
                            {{ $errors->first('path') }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- salvar - voltar --}}
    <a class="btn btn-secondary fs-5"  href="{{ route('caixa.index')}}"><i class="bi bi-arrow-left"></i> Voltar </a>
    <button type="submit" class="btn btn-success fs-5"><i class="bi bi-box-arrow-down"></i> Salvar</button>
        </form>
    </div>

@endsection