@extends('template.main')

@section('content')
<section class="container">


    <h2 class="my-5">Modifiez l'article</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form class="d-flex flex-column w-75" action="{{route('articles.update', $article->id)}}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Nom : </label>
    <input value="{{$article->name}}" type="text" name="name" id="name">
    <label for="description">Description : </label>
    <textarea  value="{{$article->description}}" name="description" id="description" cols="30" rows="10"></textarea>
    <label for="date">Date : </label>
    <input  value="{{$article->date}}" type="date" name="date" id="date">
    <label for="author">Auteur : </label>
    <input  value="{{$article->author}}" type="text" name="author" id="author">
    <label for="url">Url : </label>
    <input  value="{{$article->url}}" type="text" name="url" id="url">
    <button class="btn btn-warning w-25 mt-3" type="submit">Ajouter</button>
</form>
</section>
@endsection