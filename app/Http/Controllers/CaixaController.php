<?php

namespace App\Http\Controllers;

use App\Models\Caixa;
use App\Models\Processo;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    public readonly Caixa $caixa;

    public function __construct()
    {
        $this->caixa = new Caixa();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $caixas = Caixa::orderBy('id', 'desc');
        if($request->num_caixa){
            $caixas->where('num_caixa', 'like', "%$request->num_caixa%");
        }
        $caixas = $caixas->paginate(10);

        return view('app.caixa.index', compact('caixas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.caixa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->input('_token') != ''){
            $validacaoCampo = [
                'num_caixa' => 'required|unique:App\Models\Caixa,num_caixa',
            ];
            $msgValidaco =[
                'requered' => 'Campo Obrigatorio.',
                'unique' => 'Caixa já foi CADASTRADA.',
            ];

            $request->validate($validacaoCampo, $msgValidaco);
        }

        Caixa::create($request->all());
        return redirect()->route('caixa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Caixa $caixa)
    {
        $processos = Processo::where('caixa_id', $caixa->id)
            ->orderBy('posicao', 'asc')
            ->paginate(10);

            $num_arq = Processo::where('caixa_id', $caixa->id)->count();
            
        return view('app.caixa.show', compact('caixa', 'processos', 'num_arq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caixa $caixa)
    {
        return view('app.caixa.edit', compact('caixa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caixa $caixa)
    {
        $validacaoCampo = [
            'num_caixa' => 'required',
        ];
        $msgError = [
            'required' => 'Esse Campo é Obrigatorio',
            'unique' => 'Caixa já foi cadastrada',
            'integer' => 'Campo só aceita Números',
        ];

        $request->validate($validacaoCampo, $msgError);

        $caixa = Caixa::find($caixa->id);
        $caixa->update($request->all());

        return redirect()->route('caixa.index');
        //var_dump($request->except('_token', '_method'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caixa $caixa)
    {
        //
    }
}
