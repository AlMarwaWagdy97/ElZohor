<div>
    @include('admin.layouts.message')
    <form wire:submit.prevent="send()">
        <div class="form-group">
            <input type="email" wire:model="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <button type="submit" class="btn bg-success  me-3  px-5 my-3">   {{translateTitle('subscribe')}}  </button>
    </form>
</div>