@extends('layouts.admin')



@section('title')
 - {{$project->name}}
@endsection



@section('content')

<div class="container text-center">

  <h1 class="text-center mb-5">{{$project->name}}</h1>

  <h3 class="mb-3"><strong>Creator: </strong>{{$project->creator}}</h3>
  <h3 class="mb-3"><strong>Objective: </strong>{{$project->objective}}</h3>
  <h3 class="mb-3"><strong>Type: </strong>{{$project->type->name}}</h3>
  <p>{{$project->description}}</p>

</div>

@endsection
