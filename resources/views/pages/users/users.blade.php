@extends('template.main')

@section('content')
<section class="container">
  <div class="d-flex justify-content-center">
    <a class="btn btn-success mb-5" href="{{route('users.create')}}">Ajouter un utilisateur</a>
</div>
    <table class="table">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Age</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->age}}</td>
                <td class="d-flex justify-content-evenly">
                    <a class="btn btn-primary" href="{{route('users.edit', $data->id)}}">Modifier</a>
                    <a class="btn btn-warning" href="{{route('users.show', $data->id)}}">Détails</a>
                    <form action="{{route('users.destroy', $data->id)}}" method="POST">
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