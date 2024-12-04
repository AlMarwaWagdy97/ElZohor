<div class="row">
    <div class="col-12">
        <h1 class="text-uppercase my-lg-4 my-3 text-lg-center text-secound">
            @lang('BEST DOCTORS') <span class="text-title"> @lang('FOR YOU') </span>
        </h1>
    </div>

    <div class="col-12  text-lg-start text-center  mb-5">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" wire:click="updateSpecialty(0)">
                    @lang('All')
                </a>
            </li>
            @forelse ($specialties as $specialty)
            <li class="nav-item">
                <a class="nav-link" wire:click="updateSpecialty({{ $specialty->id }})">
                    {{ @$specialty->trans->where('locale', $current_lang)->first()->title }}
                </a>
            </li>
            @empty

            @endforelse
        </ul>
    </div>

    <div class="doctorCards col-12 gx-lg-3 gy-3 justify-content-center row ms-0">
        @forelse ($doctorsCarousels as $key => $carousel)
            @forelse($carousel as $key => $doctor)
                <div class="col-lg-4 col-12">
                    <a href="{{ route('site.doctors.show',  @$doctor['trans'][0]['slug'] ) }}">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset(@$doctor['image']) }}" alt="{{ @$doctor['trans'][0]['title'] }}">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">
                                    {{ @$doctor['trans'][0]['title'] }}
                                </h5>
                                <span>
                                    {{ $doctor['specialty']['trans'][0]['title'] }}
                                </span>
                                <hr>
                                <p class="card-text">
                                    {!! substr(@$doctor['trans'][0]['description'], 0, 250) !!}
                                </p>
                                <div class="icons">
                                    <a href="{{ @$doctor['facebook'] }}"> <i class="fa-brands fa-facebook-f fs-5 mx-2"></i> </a>
                                    <a href="{{ @$doctor['twitter'] }}"> <i class="fa-brands fa-x-twitter fs-5 mx-2"></i> </a>
                                    <a onclick="Copy();"> <i class="fa-solid fa-share-nodes fs-5 mx-2"></i> </a>
                                    <input type="text" style="display:none;" value="Hello World" id="url">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
            @endforelse
        @empty
        <div class="row">
            <div class="text-center">
                <h2> @lang('No Data') </h2>
            </div>
        </div>

        @endforelse
    </div>

    @if ($doctorsCount - (count($doctorsCarousels) * 3) > 0)
        <div class="seemore text-center mt-5">
            <a wire:click="loadDoctors" class="btn bg-main text-white">
                @lang('SEE MORE')
            </a>
        </div>
    @endif


</div>
