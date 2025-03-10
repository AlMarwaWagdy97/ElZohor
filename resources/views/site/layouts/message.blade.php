@if(session()->has('success'))
<div class="alert alert-success text-center" role="alert">
    {{ session('success') }}
</div>
@endif


@if(session()->has('error'))

<div class="alert alert-danger text-center" role="alert">
    {{ session('error') }}
</div>
@endif


@if(count($errors->all()) > 0)

<div class="alert alert-danger text-center my-0" role="alert">
      @foreach($errors->all() as $error)
        {{ $error }} <br>
        @endforeach
    </div>

@endif
