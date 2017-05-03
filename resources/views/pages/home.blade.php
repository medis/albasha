@extends('layouts.app')

@section('content')
<div class="container home-page">
    <div class="row">
        <div class="col-md-8 text-center">
            <h1>Welcome to our Retaurant</h1>
            <h2>WE ARE A BEST QUALITY & TRADITIONAL IRAQI FOOD, SPECIALIZED IN FISH</h2>
            <div class="homepage-fish">
                {{ Html::image('images/homepage_fish.png') }}
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
@endsection
