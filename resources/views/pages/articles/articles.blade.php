@extends('template.main')

@section('content')
<section class="container">
    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-5" href="{{route('articles.create')}}">Ajouter un article</a>
    </div>
    <table class="table">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Auteur</th>
            <th scope="col">Url</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($article as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->description}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->author}}</td>
                <td>
                    <img src="{{asset('img/'.$data->url)}}" style="width: 40px; height: 30px" alt="">
                </td>
                <td class="d-flex justify-content-evenly">
                    <a class="btn btn-primary" href="{{route('articles.edit', $data->id)}}">Modifier</a>
                    <a class="btn btn-warning" href="{{route('articles.show', $data->id)}}">Détails</a>
                    <form action="{{route('articles.destroy', $data->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</section>
@endsection