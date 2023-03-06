@include('composant.header')

<section id="Posts">
    <div class="bg-light p-4 rounded">

        <div class="container mt-4">

            <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input value="{{ $post->title }}" 
                        type="text" 
                        class="form-control" 
                        name="title" 
                        placeholder="Title" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="images" class="form-label">Images</label>
                    <input value="{{$post->images}}" 
                        type="file" 
                        class="form-control" 
                        name="images" >

                    @if ($errors->has('images'))
                        <span class="text-danger text-left">{{ $errors->first('images') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input value="{{ $post->description }}" 
                        type="text" 
                        class="form-control" 
                        name="description" 
                        placeholder="Description"
                        maxlength = "120" required>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea id="myeditorinstance" name="body">{{$post->body}}</textarea>

                    @if ($errors->has('body'))
                        <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                    @endif
                </div>
                

                <div class="btn-create">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-default">Retour</a>
                </div>
            </form>
        </div>

    </div>
</section>
@include('composant.textarea')
@extends('composant.footer')
