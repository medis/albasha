@extends('layouts.app')

@section('content')
<div class="about-wrapper">
    <div class="home-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center" id="homepage_main_text" contenteditable="true">
                    {!! $body !!}
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