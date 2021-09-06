@extends('template.main')

@section('content')
<section class="container">


    <h2 class="my-5">Ajoutez un utilisateur</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

<form class="d-flex flex-column w-75" enctype="multipart/form-data" action="{{route('users.update', $user->id)}}" method="post">
    @csrf
    
    <label for="name">Nom : </label>
    <input value="{{$user->name}}" type="text" name="name" id="name">
    
    <label for="firstname">Prénom : </label>
    <input value="{{$user->firstname}}" name="firstname" id="firstname" >
    
    <label for="age">Age : </label>
    <input value="{{$user->age}}" type="number" min="0" max="100" name="age" id="age">
    
    <label for="email">Email : </label>
    <input value="{{$user->email}}" type="email" name="email" id="email">
    
    <label for="email_verified_at">Confirmation email : </label>
    <input type="email" name="email_verified_at" id="email_verified_at">
    
    <label for="password">Mot de passe : </label>
    <input type="password" name="password" id="password">

    <label for="birth_date">Date de naissance :</label>
    <input value="{{$user->birth_date}}" type="date" name="birth_date" id="birth_date">

    <label for="pp_url">Photo de profil : </label>
    <input value="{{$user->pp_url}}" type="file" name="pp_url" id="pp_url">
    <button class="btn btn-warning w-25 mt-3" type="submit">Modifier</button>
</form>
</section>
@endsection