@extends('layouts.admin')



@section('title')
 - {{$project->name}}
@endsection



@section('content')

<div class="container text-center">

  <h1 class="text-center mb-5">{{$project->name}}
    <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning"><i class="fa-solid fa-file-pen"></i></a>
    <form onsubmit="return confirm('Sei sicuro di voler eliminare {{$project->name}} ?')" action="{{route('admin.projects.destroy', $project)}}" method="POST" class="d-inline-block">
      @csrf
      @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
    </form>
  </h1>

  <h3 class="mb-3"><strong>Creator: </strong>{{$project->creator}}</h3>
  <h3 class="mb-3"><strong>Objective: </strong>{{$project->objective}}</h3>
  <h3 class="mb-3"><strong>Type: </strong>{{$project->type->name}}</h3>
  <p>{{$project->description}}</p>

</div>

@endsection
