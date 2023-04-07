@if (Session::has('success'))
    <div class="pt-3">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif

@if (Session::has('loginError'))
    <div class="pt-3">
        <div class="alert alert-success">
            {{ Session::get('loginError') }}
        </div>
    </div>
@endif

@if ($errors->any())
<div class="pt-2">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif