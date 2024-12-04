<div>
    <form class="mt-5" wire:submit.prevent="sendForm()">

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
            <input type="mobile" wire:model="mobile" class="form-control @error('mobile') is-invalid @enderror"/>
        </div>
    
        <div class="form-group">
            <label> @lang('message.Message') </label>
            <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror"  rows="6"></textarea>
        </div>
    
        <div class="row">
            <button type="submit" class="btn btn-more px-5 py-3 mx-auto mt-5">
                @lang('Send')
            </button>
        </div>
    </form>
</div>