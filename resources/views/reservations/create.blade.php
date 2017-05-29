@extends('layouts.app')

@section('content')
<div class="container page-reservation">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1>Reserve a table</h1>

            <p class="confirm">* Please contact us on 020 365 99 467 to confirm your reservation</p>

            @include('partials.errors')

            {!! Form::open(['route' => 'reservations_store']) !!}

                {!! Honeypot::generate('my_name', 'my_time') !!}

                <div class="row">

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group name">
                            {{ Form::label('name', 'Name', ['class' => 'accessible-hidden']) }}
                            {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required' => true]) }}
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group email">
                            {{ Form::label('email', 'E-Mail Address', ['class' => 'accessible-hidden']) }}
                            {{ Form::email('email', null, ['placeholder' => 'E-Mail Address', 'class' => 'form-control', 'required' => true]) }}
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group phone">
                            {{ Form::label('phone', 'Phone Number', ['class' => 'accessible-hidden']) }}
                            {{ Form::tel('phone', null, ['placeholder' => 'Phone Number', 'class' => 'form-control', 'required' => true]) }}
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group date">
                            <input type='text' name="date" class="form-control" id='datetimepicker' placeholder="Choose date" required="required" />
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-12">
                        <div class="form-group notes">
                            {{ Form::label('note', 'Note', ['class' => 'accessible-hidden']) }}
                            {{ Form::textarea('note', null, ['placeholder' => 'Note', 'class' => 'form-control']) }}
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group submit">
                            {{ Form::submit('Reserve', ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
