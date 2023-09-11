<?php

namespace App\Http\Controllers;

use App\Models\Processo;
use App\Models\Caixa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $processos = Processo::orderBy('posicao', 'asc');

        if($request->numero_siarco){
            $processos->where('numero_siarco', 'like', "%$request->numero_siarco%");
        }
        $processos = $processos->paginate(10);
        $num_arq = $processos->count();
        return view('app.processo.index', compact('processos', 'num_arq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caixas = Caixa::all();

        return view('app.processo.create', compact('caixas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->input('_token') != ''){
            $validacaoCampo = [
                'numero_siarco' => 'required|unique:App\Models\Processo,numero_siarco',
                'posicao' => 'integer',
                'caixa_id' => 'required|integer',
                'path' => 'required|unique:App\Models\Processo,path',
            ];
            $msgError =[
                'required' => 'Campo é Obrigatorio',
                'unique' => 'Esse Número já foi cadastrado',
                'integer' => 'Não pode conter Letras',
                'caixa_id.integer' => 'Não pode cadastrar sem esta em uma Caixa',
            ];

            $request->validate($validacaoCampo, $msgError);
        }

        if($request->hasFile('path')){
            if($request->path->isValid()){
                //coloca o nome do caminho do arquico Ex.: d:/caixa/1234012398
                $nomeArquivo = $request->path->getClientOriginalName();
                $namePath = $nomeArquivo;
                $pathPDF = $request->path->storeAs('protocolos', $namePath, 'arquivos');
                //dd($namePath);
                Processo::create([
                     'numero_siarco'         => $request->numero_siarco,
                     'responsavel_processo'  => $request->responsavel_processo,
                     'posicao'               => $request->posicao,
                     'path'                  => $pathPDF,
                     'caixa_id'              => $request->caixa_id,
                ]);
            }
        }
        return redirect()->route('processo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Processo $processo)
    {
        return view('app.processo.show', compact('processo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Processo $processo)
    {
        $caixas = Caixa::all();
        $processo = Processo::find($processo->id);
        $action = route('processo.update', $processo);
        return view('app.processo.edit', compact('processo', 'action', 'caixas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Processo $processo)
    {
        if($request->input('_token') != ''){
            $validacaoCampo = [
                'numero_redesim' => 'unique:App\Models\Processo,numero_redesim|nullable',
                'posicao' => 'integer',
            ];

            $msgError =[
                'required' => 'Campo é Obrigatorio',
                'unique' => 'Esse Número já foi cadastrado',
                'integer' => 'Não pode conter Letras',
            ];

            $request->validate($validacaoCampo, $msgError);
        }

        $processo = Processo::find($processo->id);
        $processo->update($request->all());

        return redirect()->route('processo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Processo $processo)
    {
        //
    }
}
