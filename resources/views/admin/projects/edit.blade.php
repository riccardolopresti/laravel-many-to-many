@extends('layouts.app')

@section('title')
    | Modifica
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center px-5 py-3">

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-uppercase text-black-50">Modifica il progetto {{$project->name}}</h1>

        <div class="col">
            <div class="table-container px-5 py-3 ">
                <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome progetto*</label>
                        <input type="text" class="form-control" id="name" value="{{$project->name}}" name="name" placeholder="Nome del progetto">
                    </div>

                    <div class="mb-3">
                        <label for="client_name" class="form-label">Nome del cliente*</label>
                        <input type="text" class="form-control" id="client_name" value="{{$project->client_name}}" name="client_name" placeholder="Nome del cliente">
                    </div>

                    <div class="mb-3">
                        <p for="technologies" class="form-label">Tecnologie utilizzate</p>

                        @foreach ($technologies as $technology)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="technologies[]" type="checkbox" id="{{$technology->id}}" value="{{$technology->id}}"
                                @if (!$errors->all() && $project->technologies->contains($technology))
                                    checked
                                @elseif ($errors->all() && in_array($technology->id, old('technologies', [])))
                                    checked
                                @endif>
                                <label class="form-check-label" for="{{$technology->id}}">{{$technology->name}}</label>
                            </div>
                        @endforeach

                    </div>

                    <div class="mb-3">
                        <label for="client_name" class="form-label">Tipo di progetto</label>
                        <select class="form-select" name="type_id">
                            <option value="">Seleziona un tipo...</option>
                            @foreach ($types as $type )
                                <option
                                @if ($type->id == old('type_id', $project->type?->id)) selected @endif
                                value="{{$type->id}}">
                                    {{$type->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Immagine*</label>
                        <input onchange="showImg(event)" type="file" class="form-control" id="cover_image" value="{{$project->cover_image}}" name="cover_image" placeholder="Immagine">

                        @if ($project->cover_image)
                            <img id="output-image" src="{{asset('storage/' . $project->cover_image)}}" alt="{{asset('storage/' . $project->image_origianal_name)}}">
                        @endif

                    </div>

                    <div class="mb-3">
                        <label for="summary" class="form-label">Descrizione*</label>
                        <textarea class="form-control" id="summary" name="summary" rows="3"
                        placeholder="Descrizione">
                            {{$project->summary}}
                        </textarea>
                    </div>

                    <a href="{{route('admin.projects.index')}}" class="btn btn-danger" role="button" onclick="return confirm('Vuoi davvero tornare a tutti i progetti? Perderai tutte le modifiche effettuate')">Annulla e torna a tutti i progetti</a>
                    <button type="submit" class="btn btn-success">Modifica</button>
                  </form>
            </div>
        </div>


    </div>
</div>

<script>
    ClassicEditor
            .create( document.querySelector( '#summary' ),{
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            })
            .catch( error => {
                console.error( error );
            } );
    function showImg(event){
        const tagImage = document.getElementById('output-image');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
