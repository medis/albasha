@include('partials.errors')

{!! Form::open(['route' => 'share.store']) !!}

    {!! Honeypot::generate('my_name', 'my_time') !!}

    <div class="row">

        <div class="col-sm-12">
            <div class="form-group name">
                {{ Form::label('name', 'Name', ['class' => 'accessible-hidden']) }}
                {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required' => true]) }}
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-12">
            <div class="form-group notes">
                {{ Form::label('content', 'Text', ['class' => 'accessible-hidden']) }}
                {{ Form::textarea('content', null, ['placeholder' => 'Please leave a message...', 'class' => 'form-control', 'required' => true]) }}
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group submit">
                {{ Form::submit('Share', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
    </div>

{!! Form::close() !!}