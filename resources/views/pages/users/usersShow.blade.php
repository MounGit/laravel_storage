@extends('template.main')

@section('content')

<section class="container d-flex justify-content-center my-5">

<div class="card" style="width: 18rem;">
<img src="{{asset('img/'.$user->pp_url)}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h4>{{$user->name}} {{$user->firstname}}</h4>
    <p class="card-text">{{$user->age}} ans</p>
    <p class="card-text">{{$user->email}}</p>
    </div>
  </div>
</section>
@endsection