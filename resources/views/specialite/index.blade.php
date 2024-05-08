@extends('template')

@section('title', 'Specialités')

@section('content')
    <div class='mx-auto mt-5 _container'>
        <div class="row g-0">
            <h1 class="col">Liste des Specialités</h1>
            <div class="col text-end">
                <a class="btn btn-primary" href="{{ route('specialite.create') }}">
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
                @foreach ($specialites as $specialite)
                <tr onclick="_update({{ $specialite->id }})">
                    <th>{{ $specialite->id }}</th>
                    <td class="text-start">{{ $specialite->nom }}</td>
                    <!--td>
                        <a class="btn btn-primary" href="{{ route('specialite.edit', $specialite->id) }}"><i class="bi bi-pen"></i></a>
                        <form id="myForm{{$specialite->id}}" style="display: inline;" action="{{ route('specialite.destroy', $specialite['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div onclick="_delete({{$specialite->id}});" type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></div>
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
            window.location.href = "/specialite/"+id+"/edit";
        }
    </script>
@endsection
