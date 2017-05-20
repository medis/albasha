@extends('layouts.app')

@section('content')
<div class="container menu-page">
    <div class="row">
        <div class="col-md-10 col-md-push-1">
            <h1 class="text-center">Taste Something Now</h1>

            @if (empty($menu))
                <p>Menu is empty</p>
            @else
                <div class="category-outer-wrapper">

                    @foreach ($menu as $title => $foods)

                        <div class="category-wrapper">
                            <h2>{{ $title }}</h2>
                            <div class="menu-image-wrapper">
                                <div class="border col-md-6 col-sm-push-3"></div>
                                <div class="image-wrapper">
                                    {{ Html::image('../images/chefhat.png') }}
                                </div>
                            </div>

                            <div class="food-wrapper">

                                @foreach ($foods as $food)

                                    <div class="col-md-6 food">

                                        <div class="image">
                                            @if (!empty($food->thumbnail))
                                                <a href="#" @click.stop.prevent="openModal('{{ $food->image }}')">{{ Html::image($food->thumbnail) }}</a>
                                            @else
                                                <div class="empty-image"></div>
                                            @endif
                                        </div>
                                        <div class="title">{{ $food->title }}</div>
                                        <div class="price">{{ $food->getPrice() }}</div>
                                        <div class="description">{{ $food->description }}</div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif
        </div>
    </div>
</div>
@endsection
