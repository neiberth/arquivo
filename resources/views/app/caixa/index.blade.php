@extends('app.layouts.templateApp')

@section('content')
<div class="row justify-content-md-center">
    <form class="col-sm-6" action=" {{ route('caixa.index') }}" method="GET">
        <div class="card">
            <div class="card-header text-center text-bg-dark">
                <p class="fs-4 mb-auto fw-bolder">Busca por Caixa</p>
            </div>
          <div class="card-body text-center">
            <p class="card-text mb-2 fs-5">Digite o número da Caixa para fazer a Busca.</p>
            <div class="row justify-content-md-center">
                <div class="col-6 mb-auto">
                    <input type="text" class="form-control" id="inputBusca" name="num_caixa">
                </div>
                <button class="btn btn-danger col-4" type="submit"><i class="bi bi-search"></i> Buscar Caixa</button>
            </div>
          </div>
        </div>
    </form>

    <div class="col-sm-6 mb-3 mb-sm-0"> 
      <div class="card">
        <div class="card-header text-center text-bg-dark">
            <p class="fs-4 mb-auto fw-bolder">Nova Caixa</p>
        </div>
      <div class="card-body text-center">
        <p class="card-text mb-2 fs-5">Cadastre uma nova Caixa de Arquivamento.</p>
          <a href="{{ route('caixa.create') }}" class="btn btn-success col-4"><i class="bi bi-check2-square"></i> Nova Caixa</a>
      </div>
    </div>
  </div>


</div>

<p class="fs-5 fw-bolder mt-4 mb-1">Lista das Caixas</p>
        <table class="table table-striped">
            <thead>
              <tr>
               <th scope="col">Número Caixa</th>
                <th scope="col">Observações</th>
                <th scope="col">Status</th>
                <th scope="col">Abrir</th>
                <th scope="col">Atualizar</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($caixas as $caixa)
                <tr>
                    <td>{{ $caixa->num_caixa }}</td>
                    <td>{{ $caixa->obs }}</td>
                    <td>{{ $caixa->status }}</td>
                    <td> <a href="{{ route('caixa.show', $caixa->id) }}"> <i class="bi bi-folder2-open fs-5 text-success"></i></a></td>
                    <td> <a href="{{ route('caixa.edit', $caixa->id) }}"> <i class="bi bi-check2-square fs-5 text-danger"></i></a></td>
                  </tr>
                @empty
                <tr>
                  <td colspan="5"><p class="fs-5 fw-medium text-danger mb-0">Nenhuma Caixa foi Localizada</p></td>
                </tr>
                @endforelse
            </tbody>
          </table>
          <div class="row justify-content-center">
            <div class="col-auto">
                {{ $caixas->links() }}
            </div>
        </div>
@endsection
