@extends('template.main')

@section('content')

<section class="container d-flex justify-content-center my-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$article->name}}</h5>
            <p class="card-text">{{$article->description}}</p>
            <p class="card-text">{{$article->date}}</p>
            <p class="card-text">{{$article->author}}</p>
            <p class="card-text">{{$article->url}}</p>
            <div class="d-flex justify-content-around">
                <a class="btn btn-primary" href="{{route('article.edit', $article->id)}}">Modifier</a>
                <form action="{{route('article.destroy', $article->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
      </div>
</section>

@endsection