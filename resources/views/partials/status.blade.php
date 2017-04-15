@if (session('status'))
    <div class="container">
        <div class="row">
            <div class="col-cm-12">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    </div>
@endif