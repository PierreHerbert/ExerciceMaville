@include('composant.header')
<main id="contact">
    <section class="container">
        <div class="container-form">
            <div class="row ">
                <div class="col-10 offset-1 mt-5">

                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('contact.store') }}" id="contactUSForm">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Nom:</strong>
                                            <input type="text" name="name" class="form-control" placeholder="Nom" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Email:</strong>
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Telephone:</strong>
                                            <input type="text" name="phone" class="form-control" placeholder="Telephone" value="{{ old('phone') }}">
                                            @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Sujet:</strong>
                                            <input type="text" name="subject" class="form-control" placeholder="Sujet" value="{{ old('subject') }}">
                                            @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Message:</strong>
                                            <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif

                                <div class="form-group text-center">
                                    <button class="btn button">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </section>
</main>

@extends('composant.footer')