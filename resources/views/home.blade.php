@include('composant.header')
<main id="index">
    <section class="head">
        <img src="{{asset('images/header-img.png')}}" alt="" class="img-header">
        <img src="{{asset('images/panneau.png')}}" alt="" class="panneau">
    </section>
    <h2 class="title">Nos Activités</h2>
    <section class="container-posts">
        <div class="splide" role="group" aria-label="Splide Basic HTML Example" data-splide='{"type":"loop","perPage":5}'>
            <div class="splide__track">
                    <ul class="splide__list">
                            @foreach ($posts as $key => $post)
                            <li class="splide__slide">
                                <article class="card"  onclick="location.href='{{ route('posts.show', $post->id) }}'">
                                    <div class="temporary_text">
                                        <img class="card-img-top" src="{{asset('images/posts/'.$post->images)}}">
                                    </div>
                                    <div class="card_content">
                                        <span class="card_title">{{ $post->title }}</span>
                                            <p class="card_description">{{$post->description}}</p>
                                        
                                    </div>
                                </article>
                            </li>
                            @endforeach
                       
                    </ul>
            </div>
        </div>
    </section>
    <script>
    new Splide( '.splide' ).mount();
    </script>
</main>
@extends('composant.footer')