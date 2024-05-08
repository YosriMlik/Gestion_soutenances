@extends('template')

@section('title', 'Salles')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            <h1 class="col">Liste des Salles</h1>
            <div class="col text-end">
                <a class="btn btn-primary" href="{{ route('salle.create') }}">
                    + Ajouter
                </a>
            </div>
        </div>
        <table class="table table-hover w-75">
            <thead>
                <tr>
                    <th class="w-25">ID</th>
                    <th scope="col">Nom</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($salles as $salle)
                <tr onclick="_update({{ $salle->id }})">
                    <th>{{ $salle->id }}</th>
                    <td class="text-start">{{ $salle->nom }}</td>
                    <!--td>
                        <a class="btn btn-primary" href="{{ route('salle.edit', $salle->id) }}"><i class="bi bi-pen"></i></a>
                        <form id="myForm{{$salle->id}}" style="display: inline;" action="{{ route('salle.destroy', $salle['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div onclick="_delete({{$salle->id}});" type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></div>
                        </form>
                    </td-->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        function _update(id){
            window.location.href = "/salle/"+id+"/edit";
        }
    </script>
@endsection
