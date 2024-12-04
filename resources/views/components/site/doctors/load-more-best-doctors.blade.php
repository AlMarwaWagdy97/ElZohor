
@forelse($doctors as $key => $doctor)
<div class="col-lg-4 col-12">
    <a href="{{ route('site.doctors.show',  @$doctor->trans->where('locale',$current_lang)->first()->slug ) }}">
        <div class="card">
            <img class="card-img-top" src="{{ asset(@$doctor->image) }}" alt="{{ @$doctor->trans->where('locale',$current_lang)->first()->title }}">
            <div class="card-body">
                <h5 class="card-title text-capitalize">
                    {{ @$doctor->trans->where('locale',$current_lang)->first()->title }}
                </h5>
                <span>
                    {{ @$doctor->specialty?->trans->where('locale',$current_lang)->first()->title }}
                </span>
                <hr>
                <p class="card-text doc-desc">
                    {!! substr(@ removeHTML( $doctor->trans->where('locale', $current_lang)->first()->description), 0, 250) !!}
                </p>
                <div class="icons mt-3">
                    <a href="{{ $doctor->facebook }}"> <i class="fa-brands fa-facebook-f fs-5 mx-2"></i> </a>
                    <a href="{{ $doctor->twitter }}"> <i class="fa-brands fa-x-twitter fs-5 mx-2"></i> </a>
                    <a onclick="Copy();"> <i class="fa-solid fa-share-nodes fs-5 mx-2"></i> </a>
                    <input type="text" style="display:none;" value="Hello World" id="url">
                </div>
            </div>
        </div>
    </a>
</div>
@empty

@endforelse

@if($doctors->count())
    <div class="seemore text-center mt-5" id="loadMore">
        <a hx-get="{{ route('site.best-doctors.loadMore', ['specialty_id' =>  $specialty_id, 'start' => ($start + $count), 'count' => $count]) }}" 
            hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn bg-main text-white">
            @lang('SEE MORE')
        </a>
    </div>
@endif