@extends('layouts.app')

@section('content')
<div class="about-wrapper">
    <div class="home-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center" id="homepage-main-text" contenteditable="true">
                    <h1>Welcome to our Retaurant</h1>
                    <h2>WE ARE A BEST QUALITY & TRADITIONAL<br/>IRAQI FOOD, SPECIALIZED IN FISH</h2>
                    <div class="homepage-fish">
                        <div class="border border-left col-xs-10 col-xs-push-1 col-sm-8 col-sm-push-2"></div>
                        <div class="image-wrapper">
                            {{ Html::image('images/homepage_fish.png') }}
                        </div>
                    </div>

                    <p>
                        The work is always in a full swing in out kitchen! Everyone here is on fire<br/>
                        when it comes to cooking. Now the world don't move to the beat of just<br/>
                        one drum. What might be right for you may not be right for some.
                    </p>

                    <p>
                        No Phone no lights no motor car not a single luxury. Like Robinson Crusoe<br/>
                        it's primitive as can be. Goodbye gray sky hello blue.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.gallery')

@endsection

@section('scripts')
    <script src="/js/vendor/ckeditor/ckeditor.js"></script>
@endsection