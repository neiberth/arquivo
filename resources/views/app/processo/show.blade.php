@extends('app.layouts.templateApp')

@section('content')

<section>

    <div class="row ">
        <h4 class="col-md-6 fw-bold mb-1">Registro do Processo</h4>
    </div>
    {{--  informações do processo de Numero:.... --}}
    <div class="container">
        <div class="row justify-content-center">
        <div class="shadow p-3 mb-5 bg-body rounded col-12">
            <div class="row justify-content-center">
                <div class="col-md-10">
    
                     {{-- responsavel --}}
                    <div class="row mb-2">
                        <p class="col-sm-auto fw-bold fs-5">Responsavel:</p>
                        <div class="col-sm-4">
                            <p class="fs-5">{{$processo->responsavel_processo}}</p>
                        </div>
                    </div>
                    {{-- Protocolo Siarco --}}
                    <div class="row mb-2">
                        <p class="col-sm-auto fw-bold fs-5">Protocolo SIARCO:</p>
                        <div class="col-sm-3">
                            <p class="fs-5">{{$processo->numero_siarco}}</p>
                        </div>
                    </div>
    
                    {{-- Posição no Caixa --}}
                    <div class="row mb-2">
                        <p class="col-sm-auto fw-bold fs-5">Posição na Caixa:</p>
                        <div class="col-sm-3">
                            <p class="fs-5">{{$processo->posicao}}</p>
                        </div>
                    </div>
    
                    {{-- Número da Caixa --}}
                    <div class="row mb-2">
                        <p class="col-sm-auto fw-bold fs-5">Número da Caixa:</p>
                        <div class="col-sm-3">
                            <p class="fs-5">{{$processo->caixa->num_caixa}}</p>
                        </div>
                    </div>
    
                    {{-- path --}}
                    {{-- <div class="row mb-2">
                        <p class="col-sm-auto fw-bold fs-5">Path:</p>
                        <div class="col-sm-3">
                            <p class="fs-5">{{$processo->path}}</p>
                        </div>
                    </div> --}}
    
                    {{-- Botões de voltar e vizualisar  --}}
                    <div class="row mb-1">
                        <div class="col-auto">
                            <a class="btn btn-secondary"  href="{{ route('processo.index')}}"><i class="bi bi-arrow-left"></i> Voltar </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('pdf', $processo->id) }}" target="_blank" class="btn btn-info"><i class="bi bi-search"></i> Vizualizar o Processo</a>
                        </div>
                        <div class="col-auto justify-content-between">
                            <a href="{{ route('processo.edit', $processo->id) }}" class="btn btn-warning"><i class="bi bi-file-earmark-pdf"></i> Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

{{-- Lista das Caixas --}}
{{-- <h4 class="fw-bold mt-5">Lista dos Processos</h4>

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

</div> --}}

</section>
@endsection