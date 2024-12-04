@forelse ($clients as $key => $client)
<div class="col-12  col-lg-3 mt-5 ">
    <div class="client">
        <img src="{{ asset($client->image) }}" class="img-fluid" alt="" />
    </div>
</div>
@empty

@endforelse


@if($clients->count())
<div  id="loadMore">
    <a hx-get="{{ route('site.clients-more.loadMore', ['start' => ($start + $count), 'count' => $count]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn btn-more px-5 py-3 mx-auto mt-5">@lang('SEE MORE')</a>
</div>
@endif

