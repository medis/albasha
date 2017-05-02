<nav class="navbar navbar-default navbar-static-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="navbar-header col-md-5">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ Html::image('images/logo.png') }}
                </a>
            </div>

            <div class="collapse navbar-collapse col-md-7" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('reservations') }}">Reservations & Contact</a></li>
                    <li><a href="{{ route('share') }}">Share With Us</a></li>
                </ul>

                @include('partials.auth_menu')
            </div>
        </div>
    </div>
</nav>