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



<form class="d-flex flex-column w-75" enctype="multipart/form-data" action="{{route('users.store')}}" method="post">
    @csrf
    
    <label for="name">Nom : </label>
    <input value="{{old('name')}}" type="text" name="name" id="name">
    
    <label for="firstname">Prénom : </label>
    <input value="{{old('firstname')}}" name="firstname" id="firstname">
    
    <label for="age">Age : </label>
    <input value="{{old('age')}}" type="number" min="0" max="100" name="age" id="age">
    
    <label for="email">Email : </label>
    <input value="{{old('email')}}" type="text" name="email" id="email">
    
    {{-- <label for="email_verified_at">Confirmation email : </label>
    <input value="{{old('email_verified_at')}}" type="text" name="email_verified_at" id="email_verified_at">
     --}}
    <label for="password">Mot de passe : </label>
    <input type="password" name="password" id="password">

    <label for="birth_date">Date de naissance :</label>
<input value="{{old('birth_date')}}" type="date" name="birth_date" id="birth_date">

    <label for="pp_url">Photo de profil : </label>
    <input value="{{old('pp_url')}}" type="file" name="pp_url" id="pp_url">
    <button class="btn btn-warning w-25 mt-3" type="submit">Ajouter</button>
</form>
</section>
@endsection