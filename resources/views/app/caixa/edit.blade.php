@extends('app.layouts.templateApp')

@section('content')

<div class="container">
    <h3 class="col-md-9 fw-bold mb-4 ms-4"> Atualizar Caixa</h3>

    <form action="{{ route('caixa.update', ['caixa' => $caixa->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
    {{-- Responsavel pela CAixa --}}
        <div class="row mb-3">
            <label for="responsavel" class="col-sm-3 col-form-label" > Responsavel</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id='responsavel' name='responsavel' value="{{ Auth::user()->name }}" readonly>
            </div>
        </div>
    {{-- Numero da Caixa --}}
    <div class="row mb-3">
        <label for="inputNumCaixa" class="col-sm-3 col-form-label">Número da Caixa</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="inputNumCaixa" name="num_caixa" value="{{ $caixa->num_caixa }}">

            {{-- Validação do Campo Numero da Caixa --}}
            @if ($errors->has('num_caixa'))
                <div class="text-bg-danger ps-2 bg-opacity-75">
                    {{ $errors->first('num_caixa') }}
                </div>
            @endif
        </div>
    </div>
     {{-- obs --}}
     <div class="row mb-3">
        <label for="TextareaOBS" class="col-sm-3 col-form-label">Observações</label>
        <div class="col-sm-8">
            <input type="text"class="form-control" id="TextareaOBS" maxlength="255" size="255" name="obs" value="{{ $caixa->obs }}">
        </div>
    </div>
     {{-- status --}}
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-4 pt-0">Status</legend>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="radioCaixaAberta" value="aberta" {{($caixa->status == 'aberta')? 'checked': '' }}>
                <label class="form-check-label" for="radioCaixaAberta">
                    Aberta
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="radioCaixaFinalizada" value="finalizada" {{($caixa->status == 'finalizada')? 'checked': '' }}>
                <label class="form-check-label" for="radioCaixaFinalizada">
                    Finalizada
                </label>
            </div>
        </div>
    </fieldset>

    {{-- salvar - voltar --}}
    <a class="btn btn-secondary"  href="{{ route('caixa.index')}}"><i class="bi bi-arrow-left"></i> Voltar </a>
    <button type="submit" class="btn btn-success"><i class="bi bi-box-arrow-down"></i> Salvar</button>
    </form>
</div>

@endsection
