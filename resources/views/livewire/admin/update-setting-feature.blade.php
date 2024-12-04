<div>
    {{-- The Master doesn't talk, he acts. --}}
{{--    <h1>{{ $message }}</h1>--}}


    {{-- title ------------------------------------------------------------------------------------- --}}
    <div class="row mb-3">
        <label for="example-text-input"
               class="col-sm-2 col-form-label">{{ trans('admin.featured')  }}</label>
        <div class="col-sm-10">
            <input class="form-control" type="number"
                   wire:change="save"
                   wire:model="featured"
                   name="featured"
                   {{--                   value="{{ $model->trans[0]->title ??  old($locale . '.title') }}"--}}
                   value="{{$featured}}"
            >
        </div>
{{--        @if ($errors->has($locale . '.title'))--}}
{{--            <span--}}
{{--                class="missiong-spam">{{ $errors->first($locale . '.title') }}</span>--}}
{{--        @endif--}}
    </div>



{{--    --}}{{-- slug ------------------------------------------------------------------------------------- --}}
{{--    <div class="row mb-3 hide">--}}
{{--        <label for="example-text-input"--}}
{{--               class="col-sm-2 col-form-label">{{$id}}</label>--}}
{{--        <div class="col-sm-10">--}}
{{--            <input class="form-control"--}}
{{--                   name="id"--}}
{{--                   wire:model="{{$id}}"--}}
{{--                   type="number"--}}
{{--                --}}{{--                   value="{{  $model->trans[0]->slug ??  old($locale . '.slug')}}"--}}
{{--            >--}}
{{--        </div>--}}
{{--        @if ($errors->has($locale . '.slug'))--}}
{{--            <span--}}
{{--                class="missiong-spam">{{ $errors->first($locale . '.slug') }}</span>--}}
{{--        @endif--}}
    </div>

</div>
