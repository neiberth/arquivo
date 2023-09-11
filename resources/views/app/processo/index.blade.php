@extends('app.layouts.templateApp')

@section('content')
<div class="row justify-content-md-center">
    <form class="col-sm-6" action=" {{ route('processo.index') }}" method="GET">
        <div class="card">
            <div class="card-header text-center text-bg-dark">
                <p class="fs-4 mb-auto fw-bolder">Busca por Protocolo</p>
            </div>
          <div class="card-body text-center">
            <p class="card-text mb-2 fs-5">Digite o número do Protocolo para fazer a Busca.</p>
            <div class="row justify-content-md-center">
                <div class="col-5 mb-auto">
                    <input type="text" class="form-control" id="inputBusca" name="numero_siarco">
                </div>
                <button class="btn btn-danger col-4" type="submit"><i class="bi bi-search"></i> Localizar Protocolo</button>
            </div>

          </div>
        </div>
    </form>

    <div class="col-sm-6 mb-3 mb-sm-0"> 
      <div class="card">
        <div class="card-header text-center text-bg-dark">
            <p class="fs-4 mb-auto fw-bolder">Novo Processo</p>
        </div>
      <div class="card-body text-center">
        <p class="card-text mb-2 fs-5">Cadastre um novo Processo.</p>
          <a href="{{ route('processo.create') }}" class="btn btn-success col-4"><i class="bi bi-file-plus"></i> Novo Processo</a>
      </div>
    </div>
  </div>
</div>

<p class="fs-5 fw-bolder mt-2 mb-1">Lista das Caixas</p>

<div class="conteiner">
  <table class="table table-striped">
    <thead class="table">
      <tr>
       <th scope="col">Protocolo</th>
        <th scope="col">Numero da Caixa</th>
        <th scope="col-">Posição</th>
        <th scope="col">Visualizar</th>
        <th scope="col">Abrir</th>
        <th scope="col">Corrigir</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @forelse ($processos as $processo)
        <tr>
            <td>{{ $processo->numero_siarco }}</td>
            <td>{{ $processo->caixa->num_caixa }}</td>
            <td>{{ $processo->posicao }}</td>
            <td> <a href="{{ route('pdf', $processo->id) }} " target="_blank"> <i class="bi bi-filetype-pdf fs-5 text-success"></i></a></td>
            <td> <a href="{{ route('processo.show', $processo->id) }}"> <i class="bi bi-folder-symlink fs-5 text-danger"></i></a></td>
            <td> <a href="{{ route('processo.edit', $processo->id) }}"> <i class="bi bi-file-earmark-arrow-up fs-5 text-danger"></i></a></td>
          </tr>
        @empty
        <tr>
            <td colspan="6"><p class="fs-5 fw-medium text-danger mb-0">Nenhum Protocolo foi Localizado</p></td>
        </tr>
        @endforelse
    </tbody>
  </table>
</div>
       
<div class="row justify-content-center">
  <div class="col-auto">
    {{ $processos->links() }}
  </div>
</div>
@endsection
