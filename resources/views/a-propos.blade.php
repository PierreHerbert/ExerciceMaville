@include('composant.header')
<main id="a-propos">
    <section class="container-text-img">
        <div class="container-text">
            <img src="{{asset('images/president.jfif')}}" alt="">
        </div>
        <div class="container">
            <p>Bouzolle est une petite vile de 20 habiant situé dans le Limarais.</p>
            <p>Un ville d'ont seul les habitants en connaissent l'existence enfin jusqu'a ce que notre maire 'Jeff Tuche' devienne président de la république.</p>
            <p>Dans notre ville vous trouverez des baraques a fritse à tout les coins de rue (1 seul) et la plus grande usine a bille de tout le limarais (il n'y en a qu'une).</p>
            <p>Vous pouvez vous informer un peut plus sur notre ville en regardant nos activités de plus près !</p>
            <p>N'oubliez pas notre devise : Si t'est Chaumeur , ta du temps , si ta du temps ta de l'argent et si ta de l'argent bah t'est riche !</p>
        </div>
    </section>
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