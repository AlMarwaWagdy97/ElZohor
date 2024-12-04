    @forelse($doctors as $doctor)
    <div class="col-12 my-5 row text-center justify-content-center align-items-center wow slideInLeft">
        <div class="col-12 row justify-content-lg-center  ">
            <div class="col-lg-6 col-12  px-0  ms-3 ms-lg-4 ms-xl-0">
                <img src="{{ asset($doctor->image) }}" class="img-fluid" alt="{{ @$doctor->trans->where('locale',$current_lang)->first()->title  }}">
            </div>


            <div class="text col-lg-6 col-12 row text-lg-start text-center py-4 ms-3 ms-xl-0">
                <h1>
                    {{ @$doctor->trans->where('locale',$current_lang)->first()->title  }}
                </h1>
                <p class=" my-5">
                    {!! @$doctor->trans->where('locale',$current_lang)->first()->description !!}
                </p>
                <a href="{{ route('site.doctors.show', @$doctor->trans->where('locale',$current_lang)->first()->slug ) }}" class="btn w-50 text-white mx-auto q">@lang('MAKE AN APPOINTMENT')</a>
            </div>
        </div>
    </div>
@empty
@endforelse
</div>

@if($doctors->count())
    <div class="col-12 justify-content-center text-center" id="loadMore">
        <a hx-get="{{ route('site.doctors.loadMore', ['specialty_id' =>  $specialty_id, 'start' => ($start + $count), 'count' => $count]) }}" 
            hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn text-white bg-success me-3 px-5 my-5">
            @lang('SEE MORE')
        </a>
    </div>
@endif