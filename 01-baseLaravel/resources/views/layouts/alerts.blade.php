@if ($errors->any())
    <div class="container">
        <div class="mt-5">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="container">
        <div class="alert alert-success mt-5">
            {{ session('success') }}
        </div>
    </div>
@endif

@if(session('danger'))
    <div class="container">
        <div class="alert alert-danger mt-5">
            {{ session('danger') }}
        </div>
    </div>
@endif

