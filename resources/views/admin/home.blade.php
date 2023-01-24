@extends('layouts.app')

@section('title')
    | DashBoard
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="px-5 py-3">
            <h1 class="mb-5">DASHBOARD</h1>

            <ul class="ms-5">
                <li>
                    <strong>Progetti Trovati:</strong><span> {{count($projects)}}</span>
                </li>
                <li>
                    <strong>Tipi Trovati:</strong><span> {{count($types)}}</span>
                </li>
                <li>
                    <strong>Tecnologie Trovate:</strong><span> {{count($technologies)}}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
