@extends('app.layouts.templateApp')

@section('content')
<div class="row justify-content-md-center">

  <div class="col-sm-6">
    <div class="card">
      <h5 class="card-header text-center text-bg-dark fs-4">Busca por Protocolo</h5>

      <div class="card-body">

        <p class="card-text fs-5">Digite o número do Protocolo que deseja ver o proceso em formato de arquivo .PDF.</p>
        <a href="{{ route('processo.index') }}" class="btn btn-primary fs-5">Buscar Protocolo</a>
      </div>
    </div>
  </div>

    <div class="col-sm-6 ">
      <div class="card">
        <h5 class="card-header text-center text-bg-dark fs-4">Busca por Caixa</h5>

        <div class="card-body">

          <p class="card-text fs-5">Digite o número da caixa que deseja ver a relação de processos dentro dela.</p>
          <a href="{{ route('caixa.index')}}" class="btn btn-primary fs-5">Buscar Caixa</a>
        </div>
      </div>
    </div>

  </div>
@endsection
