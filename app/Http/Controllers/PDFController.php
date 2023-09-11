<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processo;

class PDFController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {

        $processo = Processo::find($id);
        $filePDF = 'D:\\Neiberth\\arquivos\\'.$processo->path;
        return view('app.processo.pdf', compact('filePDF'));

    }
}
