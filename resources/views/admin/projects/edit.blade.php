@extends('layouts.admin')



@section('title')

- Modifica Fumetto

@endsection



@section('content')

<div class="container py-5 text-center">

  <h1 class="mb-3">Modifica {{$project->name}}
    <form onsubmit="return confirm('Sei sicuro di voler eliminare {{$project->name}} ?')" action="{{route('admin.projects.destroy', $project)}}" method="POST" class="d-inline-block">
      @csrf
      @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
    </form>
  </h1>

  @if($errors->any())
    <div class="alert alert-danger text-start " role="alert">
      <ul class="m-0">
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="row">

    <div class="col-6 offset-3">

      <form action="{{route('admin.projects.update', $project)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="container-fluid">

          <div class="row">

            <div class="col-4">
              <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input
                  name="name"
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="name"
                  placeholder="Aggiungi nome"
                  value="{{old('name', $project->name)}}"
                >
                @error('title')
                  <div class="text-danger my-1" style="font-size: .8rem">{{$message}}</div>
                @enderror
              </div>
            </div>

            <div class="col-4">
              <div class="mb-3">
                <label for="creator" class="form-label">Creatore</label>
                <input
                  name="creator"
                  type="text"
                  class="form-control @error('creator') is-invalid @enderror"
                  id="creator"
                  placeholder="Aggiungi creatore"
                  value="{{old('creator', $project->creator)}}"
                >
                @error('title')
                  <div class="text-danger my-1" style="font-size: .8rem">{{$message}}</div>
                @enderror
              </div>
            </div>

            <div class="col-4">
              <div class="mb-3">
                <label for="objective" class="form-label">Obiettivo</label>
                <input
                  name="objective"
                  type="text"
                  class="form-control @error('objective') is-invalid @enderror"
                  id="objective"
                  placeholder="Aggiungi obiettivo"
                  value="{{old('objective', $project->objective)}}"
                >
                @error('title')
                  <div class="text-danger my-1" style="font-size: .8rem">{{$message}}</div>
                @enderror
              </div>
            </div>

            <div class="col-6">
              <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <select class="form-select" id="type" style="-webkit-appearance: none; -moz-appearance: none;" name="type_id">
                  <option value="">---</option>
                  @foreach ($types as $type)
                  <option value="{{$type->id}}" @if($project->id == $project->type?->id) selected @endif>{{$type->name}}</option>
                  @endforeach
                </select>
                @error('title')
                  <div class="text-danger my-1" style="font-size: .8rem">{{$message}}</div>
                  @enderror
                </div>
              </div>

            <div class="col-6">
              <div class="mb-3">
                <label for="file" class="form-label">Scegli file in formato .pdf</label>
                <input
                  name="file"
                  type="file"
                  class="form-control @error('file') is-invalid @enderror"
                  id="file"
                  placeholder="Carica un file .pdf"
                  value="{{old('file', $project->file)}}"
                >
                @error('title')
                  <div class="text-danger my-1" style="font-size: .8rem">{{$message}}</div>
                @enderror
              </div>
            </div>

            <div class="col-12">
              <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" class="form-control" id="description" rows="8">{{old('description', $project->description)}}</textarea>
              </div>
            </div>

            <div class="col-12">
              <div class="mb-3 float-end">
                <button type="submit" class="btn btn-primary ms-3">Aggiorna</button>
              </div>
            </div>

          </div>

        </div>

      </form>

    </div>

  </div>

</div>

@endsection
