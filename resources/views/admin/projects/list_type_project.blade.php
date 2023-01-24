@extends('layouts.app')

@section('title')
    | List type
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="px-5 py-3">

            @if (session('delete'))
                <div class="alert alert-success" role="alert">
                    {!!session('delete')!!}
                </div>
            @endif

            <h1 class="text-uppercase text-black-50">Lista dei Progetti per tipo</h1>
            <div class="table-container pt-2 w-75">
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Progetti</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <th>{{$type->name}}</th>
                                <td>
                                    <ul>
                                        @foreach ($type->projects as $project )
                                            <li>
                                                <a href="{{route('admin.projects.show', $project->slug)}}">{{$project->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>
@endsection
