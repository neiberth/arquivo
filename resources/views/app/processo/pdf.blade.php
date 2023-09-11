@extends('app.layouts.templateApp')

@section('content')


    {{ header('Content-type: application/pdf'); }}
    {{ readfile($filePDF); }}
    {{ exit(0); }}

@endsection
