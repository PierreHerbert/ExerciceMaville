@include('composant.header')

<section id="Posts-show">

    <section>
        <div class="container">
                <div class="container-img">
                    <img src="{{asset('images/posts/'.$post->images)}}" alt="">
                </div>
                
                <div>
                    <h1 class="title">{{ $post->title }}</h1>
                    <p>{!! $post->body !!}</p>
                </div>
                
            </div>
        </div>
    </section>

</section>

@include('composant.footer')