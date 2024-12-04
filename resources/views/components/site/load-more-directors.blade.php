@forelse($teams as $key => $team)
<div class="col-12 col-lg-4 leader d-flex justify-content-end align-content-center align-items-center mb-5">
    <div class="flex-grow-1">
        <a href="{{ route('site.teams.show', $team->trans->first()->slug) }}?key={{ $start + $count }}">
            <img src="{{ asset($team->image) }}" alt="" width="137px" />
        </a>
        <div class="info mt-3">
            <a href="{{ route('site.teams.show', $team->trans->first()->slug) }}?key={{ $start + $count }}">
                <p class="my-2 text-black">{{ $team->trans->first()->name }}</p>
            </a>
            <span>
                {{ $team->trans->first()->job_title }}
            </span>
        </div>
        <div class="underling mx-auto"></div>
    </div>
    @if(fmod($key, 3) != 2)
    <div class="x flex-shrink-1 d-lg-block d-none"></div>
    @else
    <div class="y flex-shrink-1 d-lg-block d-none"></div>
    @endif
</div>
@empty

@endforelse



@if($teams->count())
<div  id="loadMoreDirector">
    <a hx-get="{{ route('site.directors-more.loadMore', ['start' => ($start + $count), 'count' => $count]) }}" hx-indicator="#loading" hx-target="#loadMoreDirector" hx-swap="outerHTML" class="btn btn-more px-5 py-3 mx-auto mt-5">@lang('SEE MORE')</a>
</div>
@endif