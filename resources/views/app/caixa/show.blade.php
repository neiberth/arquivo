@extends('app.layouts.templateApp')

@section('content')

<section>
    <div class="row ">
        <h4 class="col-md-6 fw-bold mb-1">Registro da Caixa</h4>
    </div>
    {{--  informações do processo de Numero:.... --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="card shadow p-0 mb-5 bg-body rounded">
                <h5 class="card-header text-warning bg-dark">Nº da caixa: {{ $caixa->num_caixa }}</h5>
                
                <div class="row justify-content-center mt-3">
                    <div class="col-md-10">

                        {{-- STATOS --}}
                        <div class="row mb-1">
                            <p class="col-sm-auto fw-bold fs-5">Statos da Caixa:</p>
                            <div class="col-sm-4">
                                @if ($caixa->status == 'aberta')
                                <p class="card-title text-success fw-bold fs-5">Status da Caixa: {{ $caixa->status}}</p>
                                @else
                                <h4 class="card-title text-danger fw-bold fs-4">{{ $caixa->status}}</h4>
                                @endif
                            </div>
                        </div>

                         {{-- Posição no Caixa --}}
                         <div class="row mb-1">
                            <p class="col-sm-auto fw-bold fs-5">Observação:</p>
                            <div class="col-sm-3">
                                <p class="fs-5">{{ $caixa->obs}}</p>
                            </div>
                        </div>

                         {{-- QUANTIDADE DE PROCESSO --}}
                         <div class="row mb-1">
                            <p class="col-sm-auto fw-bold fs-5">Quantidade de processos:</p>
                            <div class="col-sm-3">
                                <p class="fs-5">{{$num_arq}}</p>
                            </div>
                        </div>

                        {{-- Botões de voltar e vizualisar  --}}
                        <div class="row mb-2">
                            <div class="col-auto">
                                <a href="{{ route('caixa.index') }}" class="btn btn-primary mt-3 fs-6">Voltar</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- Lista das Caixas --}}
<h4 class="fw-bold mt-1">Lista dos Processos</h4>

<div class="shadow-sm p-3 mb-5 bg-body rounded">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Protocolo</th>
                    <th scope="col">Posição</th>
                    <th> Visualizar </th>
                    <th> Abrir </th>
                    <th> Atualizar </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($processos as $processo)
                <tr>
                    <td>{{$processo->numero_siarco}}</td>
                    <td>{{ $processo->posicao }}</td>
                    <th> <a href="{{ route('pdf', $processo->id) }}" target="_blank"><i class="bi bi-file-pdf text-danger"></i></a></th>
                    <th> <a href="{{ route('processo.show', $processo->id) }}"><i class="bi bi-folder2-open text-success"></i></a></th>
                    <th> <a href="{{ route('processo.edit', $processo->id) }}"><i class="bi bi-folder-symlink text-warning "></i></a></th>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Não existe Processos nesta Caixa</td>
                </tr>
                @endforelse

            </tbody>
        </table>
        <div class="row justify-content-center">
            <div class="col-auto">
                {{ $processos->links() }}
            </div>
        </div>

</div>

</section>
@endsection