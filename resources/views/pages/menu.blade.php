@extends('layouts.app')

@section('content')
<div class="container menu-page">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Taste Something Now</h1>

            @if (empty($menu))
                <p>Menu is empty</p>
            @else

                @foreach ($menu as $title => $foods)

                    <div class="category-wrapper">
                        <h2>{{ $title }}</h2>
                        <div class="menu-image-wrapper">
                            <div class="border col-md-6 col-md-push-3"></div>
                            <div class="image-wrapper">
                                {{ Html::image('../images/chefhat.png') }}
                            </div>
                        </div>

                        <div class="food-wrapper">

                            @foreach ($foods as $food)

                                <div class="col-sm-6 food">

                                    <div class="image">{{ Html::image($food->thumbnail) }}</div>
                                    <div class="title">{{ $food->title }}</div>
                                    <div class="description">{{ $food->description }}</div>
                                    <div class="price">{{ $food->price }}</div>

                                </div>

                            @endforeach

                        </div>

                    </div>
                    
                @endforeach

            @endif
        </div>
    </div>
</div>
@endsection
