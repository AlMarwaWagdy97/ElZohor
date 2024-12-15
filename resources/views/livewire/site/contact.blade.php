<div>
    <form class="mt-5" wire:submit.prevent="submitForm">

        <div class="my-3">
            @include('site.layouts.message')
        </div>

        <div class="form-group mb-3 mt-2">
            <label> @lang("Name") </label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" />
        </div>


        <div class="form-group my-5">
            <label> @lang('Email') </label>
            <input type="email" wire:model="email" class="form-control  @error('email') is-invalid @enderror"/>
        </div>

        <div class="form-group my-5">
            <label> @lang('mobile') </label>
            <input type="phone" wire:model="phone" class="form-control @error('phone') is-invalid @enderror"/>
        </div>

        <div class="form-group  mb-3 message d-flex flex-column">
            <label> @lang('message.Message') </label>
            <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror"  rows="7"
                      cols="7"></textarea>
        </div>

        <div class="row">
            <button type="submit"  class="w-100 btn-send btn p-3">
                @lang('Send')
            </button>
        </div>
    </form>
</div>
