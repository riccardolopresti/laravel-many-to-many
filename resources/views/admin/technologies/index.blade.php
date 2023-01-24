@extends('layouts.app')

@section('title')
    | Tech
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="px-5 py-3">
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {!!session('msg')!!}
                </div>
            @endif
            <h1 class="text-uppercase text-black-50">Lista dei Tipi</h1>
            <div class="table-container pt-2 ">

                <div class="w-75 ms-2 mt-2">
                    <form  action="{{route('admin.technologies.store')}}" method="POST">
                        @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Nuovo tipo">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        Aggiungi
                                    </button>
                                </div>
                    </form>
                </div>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Numero Progetti</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                <td class="d-flex">
                                    <div class="update-form  me-2">
                                        <form  action="{{route('admin.technologies.update', $technology)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input class="border-0 my-1" type="text" name="name" value="{{$technology->name}}">
                                        <button type="submit" class="btn btn-warning">Modifica</button>
                                        </form>
                                    </div>

                                    <div class="delete-form">
                                        @include('admin.technologies.partials.delete-form')
                                    </div>

                                </td>
                                <td><span class="badge text-bg-dark">{{count($technology->projects)}}</span></td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>

        </div>

    </div>
</div>
@endsection
