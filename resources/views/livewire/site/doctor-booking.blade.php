<div>

    <form method="POST" wire:submit.prevent="sendForm()">

        <input type="hidden" wire:model="specialty_id" value="{{  $specialty_id }}">
        <input type="hidden" wire:model="" value="{{ $doctor_id }}">

        @include('site.layouts.booking-message')

        <div class="form-group d-flex flex-wrap   ">
            <input type="text" wire:model="name" class="form-control my-3 @error('text') is-invalid @enderror" id="Name" placeholder="@lang('Name') *" required>
            <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="Email" aria-describedby="emailHelp" placeholder="@lang('Email') "  >
        </div>

        <div class="form-group d-flex flex-wrap align-items-center">
            <input type="tel" wire:model="mobile" class="form-control my-3 @error('mobile') is-invalid @enderror" id="Email" aria-describedby="emailHelp" placeholder="@lang('Mobile') *" required>
            <input type="date" wire:model="date" id="dateInput" class="w-100 py-1 form-control @error('date') is-invalid @enderror">
        </div>
        <div class="col-12 my-3">
            <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror"  id="exampleTextarea" rows="6" placeholder="@lang('Message ...')"></textarea>
        </div>

        <div class=" mx-auto text-center">
            <button type="submit" class="btn bg-main px-5 w-100">@lang('Book Appointment')</button>
        </div>
    </form>
</div>
