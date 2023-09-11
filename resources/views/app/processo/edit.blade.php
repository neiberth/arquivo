@extends('app.layouts.templateApp')

@section('content')
<section>
    {{-- Cadastrar novo Processo --}}
<div class=" row justify-content-center">
    <h3 class="col-md-9 fw-bold mb-4">Atualizar Processo</h3>
        <div class="formProcesso">
            <form action="{{ route('processo.update', ['processo' => $processo->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- responsavel --}}
                <div class="row mb-3">
                    <label for="inputNumCaixa" class="col-sm-3 col-form-label">Responsavel</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputNumCaixa" name="responsavel_processo" value="{{ Auth::user()->name }}" readonly>
                    </div>
                </div>
                {{-- Protocolo SIARCO --}}
                <div class="row mb-3">
                    <label for="inputSiarco" class="col-sm-3 col-form-label">Protocolo SIARCO</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputSiarco" name="numero_siarco" value="{{$processo->numero_siarco}}" readonly>
                        {{-- Validação do Campo Numero da Caixa --}}
                        @if ($errors->has('num_caixa'))
                        <div class="text-bg-danger ps-2 bg-opacity-75">
                            {{ $errors->first('num_caixa') }}
                        </div>
                    @endif
                    </div>
                </div>
               
                {{-- posicao --}}
                <div class="row mb-3">
                    <label for="inputPosicao" class="col-sm-3 col-form-label">Posição na Caixa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPosicao" name="posicao" value="{{$processo->posicao}}">
                        {{-- Validação do Campo Numero da Caixa --}}
                        @if ($errors->has('num_caixa'))
                        <div class="text-bg-danger ps-2 bg-opacity-75">
                            {{ $errors->first('num_caixa') }}
                        </div>
                    @endif
                    </div>
                </div>

                {{-- numero da caixa --}}
                <div class="row mb-3">
                    <label for="selectCaixa" class="col-sm-3 col-form-label">Nº da Caixa</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="caixa_id" aria-label="Default select example">
                            <option value="{{$processo->caixa->id}}" selected>{{$processo->caixa->num_caixa}}</option>
                             @foreach ($caixas as $caixa)
                                @if ($caixa->status == 'aberta')
                                    <option value="{{$caixa->id}}">{{$caixa->num_caixa}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- Corrigir PDF --}}
                <div class="row mb-3">
                    <legend class="col-form-label col-sm-4 pt-0">Observação</legend>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="corrigir_pdf" id="corrigirPdf" value="sim" {{($processo->corrigir_pdf == 'sim')? 'checked': '' }}>
                            <label class="form-check-label" for="corrigirPdf">
                                Corrigir imagem PDF
                            </label>
                        </div>
                    </div>
                </div>
                {{-- path --}}
                {{-- <div class="row mb-3">
                    <div class="col-sm-11">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" name="path">
                            <label class="input-group-text" for="inputGroupFile02">Anexar</label>
                          </div>
                    </div>
                </div> --}}

                {{-- salvar - voltar --}}
                <a class="btn btn-secondary"  href="{{ route('processo.index')}}"> <i class="bi bi-backspace"></i> Voltar </a>
                <button type="submit" class="btn btn-success"><i class="bi bi-folder-plus"></i> Salvar</button>
            </form>
        </div>


</div>
</section>
@endsection
