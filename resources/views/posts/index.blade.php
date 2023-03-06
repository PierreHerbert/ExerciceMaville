@include('composant.header')

<section id="Posts">
    


    <div class="p-4">
        <div class="container-boutons">
            <a class="btn button" href="{{ route('posts.create') }}">AJOUTER UN ARTICLE</a>
        </div>

        <table class="table">
        <thead>
          <tr>
             <th width="5%">#</th>
             <th width="15%">Name</th>
             <th width="30%">Image</th>
             <th width="40%">Description</th>
             <th width="1%" colspan="3">Action</th>
          </tr>
        </thead>
            @foreach ($posts as $key => $post)
                <th scope="row">{{ $post->id }}</th>
                <td class="titre">{{ $post->title }}</td>
                
                <td class="image">
                    <img src="{{asset('images/posts/'.$post->images)}}" alt="" width="150px">
                </td>
                <td class="descrition">
                    <p>{{$post->description}}</p>
                </td>
                <td class="actions"><a href="{{ route('posts.show', $post->id) }}" target="_blank"class="btn btn-warning btn-sm">Voir</a></td>
                        <td class="actions"><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Editer</a></td>
                        <td class="actions">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" accept-charset="UTF-8">
                                @csrf
                            <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit" value="">Supprimer</button>
                            </form>
                        </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $posts->links() !!}
        </div>

    </div>
</section>
@extends('composant.footer')