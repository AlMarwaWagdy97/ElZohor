<div>
    <form wire:submit="store">


        <div class="form-group mb-3 mt-2">
            <label> @lang("Name") </label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror"/>
            <span class="text-red-500">@error('name') {{$message}}  @enderror </span>
        </div>

        <div class="form-group my-5">
            <label> @lang('Email') </label>
            <input type="email" wire:model="email" class="form-control  @error('email') is-invalid @enderror"/>
            <span class="text-red-500">@error('email') {{$message}}  @enderror </span>
        </div>

        <div class="form-group my-5">
            <label> @lang('mobile') </label>
            <input type="mobile" wire:model="mobile" class="form-control @error('mobile') is-invalid @enderror"/>
            <span class="text-red-500">@error('mobile') {{$message}}  @enderror </span>
        </div>


        <div class="form-group">
            <label> CV </label>
            <input type="file" wire:model="file" class="form-control @error('file') is-invalid @enderror">
            <span class="text-red-500">@error('file') {{$message}}  @enderror </span>
        </div>

        <br>
        <br>
        {{--        <div class="form-group my-5">--}}
        {{--            <label> @lang('admin.address') </label>--}}
        {{--            <textarea wire:model="address" class="form-group  mb-3 message d-flex flex-column @error('address') is-invalid @enderror"--}}
        {{--                      rows="6"></textarea>--}}
        {{--            <span class="text-red-500">@error('address') {{$message}}  @enderror </span>--}}
        {{--        </div>--}}
        <div class="form-group  mb-3 message d-flex flex-column">
            <label> @lang('admin.address') </label>
            <textarea wire:model="address" class="form-control @error('address') is-invalid @enderror" rows="7"
                      cols="7"></textarea>
            <span class="text-red-500">@error('address') {{$message}}  @enderror </span>

        </div>


        <div wire:click="store" class="w-100 btn-send btn p-3">ارسل</div>

        @if (session()->has('success'))
            <div class="bg-light test-success text-success-500 my-3" style="color: green">{{ session('success') }}</div>
        @endif

    </form>


</div>
