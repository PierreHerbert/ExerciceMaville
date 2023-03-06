@include('composant.header')
<section>
    <div class=" p-4">
    <div class="button-jaune btn-crud" id="button-2" onclick='location.href="{{ route('users.create') }}"'>
                <div id="slide"></div>
                <a href="{{ route('users.create') }}">AJOUTER UN UTILISATEUR</a>
            </div>
        
        <table class="table">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="1%" colspan="3">Actions</th>    
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="actions"><a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm">Voir</a></td>
                        <td class="actions"><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Editer</a></td>
                        <td class="actions">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" accept-charset="UTF-8">
                                @csrf
                            <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit" value="">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $users->links() !!}
        </div>

    </div>
</section>