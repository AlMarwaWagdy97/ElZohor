{{--@foreach ($menus->where('parent_id', $parent_id ?? 0) as $item)--}}

{{--        @php--}}
{{--            $totalChildren = $menus->where('parent_id', $item->id)->count();--}}
{{--            $first = false;--}}
{{--        @endphp--}}
{{--        @if($item->parent_id != null && $totalChildren)--}}
{{--            <li class="nav-item mx-2 dropdown {{Route::is('site.'. ltrim($item->dynamic_url , '/')) ? 'active' : '' }} {{ (str_replace('en', '', Request::path()) == "" ? '/': '') == $item->url  ? 'active' : '' }}">--}}
{{--                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"--}}
{{--                   aria-expanded="false">--}}
{{--                    {{ @$item->trans?->where('locale', $current_lang)->first()->title }}--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu submenu @if(@$item_parent_id == $item->id  || in_array(@$item->id ?? [], @$menu_parent_ids ?? []) || in_array(@$item->id ?? [], @$menu_parent_ids ?? []) ) active @endif @if(@$item->id == @$menu->id || @$item_parent_id == $item->id) active  current @endif"--}}
{{--                    aria-labelledby="navbarDropdown">--}}
{{--                    @include('components.site.layouts.menuItem', ['parent_id' => $item->id])--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @elseif ($totalChildren)--}}
{{--            <li class="nav-item mx-2 dropdown {{Route::is('site.'. ltrim($item->dynamic_url , '/')) ? 'active' : '' }} {{ (str_replace('en', '', Request::path()) == "" ? '/': '') == $item->url  ? 'active' : '' }}">--}}
{{--                <a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" data-bs-toggle="dropdown"--}}
{{--                   aria-expanded="false">--}}
{{--                    {{ @$item->trans?->where('locale', $current_lang)->first()->title }}--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                    @include('components.site.layouts.menuItem', ['parent_id' => $item->id])--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li class="nav-item item ms-3 {{Route::is('site.'. ltrim($item->dynamic_url , '/')) ? 'active' : '' }} {{ (str_replace('en', '', Request::path()) == "" ? '/': str_replace('en', '', Request::path())) == $item->url  ? 'active' : '' }}--}}
{{--            {{$item->type == "dynamic" && Str::contains($item->dynamic_url, 'pages') && Route::is('site.pages') ? 'active' : ''}} ">--}}
{{--                <a class="nav-link" aria-current="page"--}}
{{--                   href="{{  @$item->type == "dynamic"?  @$item->dynamic_url : @$item->url }}">--}}
{{--                    {{ @$item->trans?->where('locale', $current_lang)->first()->title }}--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--@endforeach--}}



<style>
    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown>.dropdown-toggle:active {
        /*Without this, clicking will make it sticky*/
        pointer-events: none;
    }
</style>

@foreach ($menus->where('parent_id', $parent_id ?? 0) as $item)
    @php
        $totalChildren = $menus->where('parent_id', $item->id)->count();
        $first = false;
    @endphp
    @if($item->parent_id != null && $totalChildren)
        <li class="nav-item mx-2 dropdown {{Route::is('site.'. ltrim($item->dynamic_url , '/')) ? 'active' : '' }} {{ (str_replace('en', '', Request::path()) == "" ? '/': '') == $item->url  ? 'active' : '' }}"   onclick="gotoLink(this ,'{{  @$item->type == "dynamic"?  @$item->dynamic_url : @$item->url }}')">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                {{ @$item->trans?->where('locale', $current_lang)->first()->title }}
            </a>
            <ul class="dropdown-menu submenu @if(@$item_parent_id == $item->id  || in_array(@$item->id ?? [], @$menu_parent_ids ?? []) || in_array(@$item->id ?? [], @$menu_parent_ids ?? []) ) active @endif @if(@$item->id == @$menu->id || @$item_parent_id == $item->id) active  current @endif" aria-labelledby="navbarDropdown">
                @include('components.site.layouts.menuItem', ['parent_id' => $item->id])
            </ul>
        </li>
    @elseif ($totalChildren)
{{--        <li class="nav-item mx-2 dropdown {{Route::is('site.'. ltrim($item->dynamic_url , '/')) ? 'active' : '' }} {{ (str_replace('en', '', Request::path()) == "" ? '/': '') == $item->url  ? 'active' : '' }}">--}}
<li class="nav-item mx-2 dropdown {{Route::is('site.'. ltrim($item->dynamic_url , '/')) ? 'active' : '' }} {{ (str_replace('en', '', Request::path()) == "" ? '/': '') == $item->url  ? 'active' : '' }}"  onclick="gotoLink(this , '{{  @$item->type == "dynamic"?  @$item->dynamic_url : @$item->url }}')">

<a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                {{ @$item->trans?->where('locale', $current_lang)->first()->title }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @include('components.site.layouts.menuItem', ['parent_id' => $item->id])
            </ul>
        </li>
    @else

        <li class="nav-item mx-2 {{Route::is('site.'. ltrim($item->dynamic_url , '/')) ? 'active' : '' }} {{ (str_replace('en', '', Request::path()) == "" ? '/': str_replace('en', '', Request::path())) == $item->url  ? 'active' : '' }}">
            <a class="nav-link" aria-current="page" href="{{  @$item->type == "dynamic"? url(app()->getLocale() .  @$item->dynamic_url) :  url(app()->getLocale() . @$item->url) }}">
                {{ @$item->trans?->where('locale', $current_lang)->first()->title }}
            </a>
        </li>

    @endif
@endforeach


<script>
    function  gotoLink(obj , url) {
        console.log(this);
         window.location.href = url;
    }
</script>
