@extends('admin.app')

@section('title', trans('admin.title_translations'))
@section('title_page', trans('admin.title_translations'))

@section('style')
    {{-- @vite(['resources/assets/admin/css/data-tables.js']) --}}
@endsection
@section('content')

    <div class="container-fluid">

{{--        {{translateTitle('44')}}--}}
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body  search-group">
                        <div class="row">
                        </div>
                        {{-- Start Form search --}}
                        <form action="{{route('admin.title-translation.index')}}" method="get">
                            <div class="row mb-3">
                                <div class="col-md-3 mb-2">
                                    <input type="test" value="{{ old('key', request()->input('key')) }}"
                                           name="key" placeholder="{{ trans('admin.key') }}" class="form-control">
                                </div>

{{--                                <div class="col-md-3 mb-2">--}}
{{--                                    <select class="form-select form-select-sm select2" name="key">--}}
{{--                                        <option value="" selected> {{ trans('project.portfolio') }}</option>--}}
{{--                                                                        @foreach ($portfolios as $portfolio)--}}
{{--                                                                            <option value="{{ $portfolio->id }}" {{ request()->input('portfolio_id') == $portfolio->id ? 'selected' : '' }}>  {{ @$portfolio->trans->where('locale',$current_lang)->first()->title }} </option>--}}
{{--                                                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="col-md-3 mb-2">
                                    <select class="form-select" name="status" aria-label=".form-select-sm example">
                                        <option selected value=""> @lang('admin.status')  </option>
                                        <option
                                            value="1"{{ old('status', request()->input('status')) == 1? "selected":"" }}>@lang('admin.active') </option>
                                        <option
                                            value="0" {{ old('status', request()->input('status')) != 1 && old('status', request()->input('status')) != null? "selected":"" }}> @lang('admin.dis_active') </option>
                                    </select>
                                </div>

                                <div class="search-input col-md-2">
                                    <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"> </i>
                                    </button>
                                    <a class="btn btn-success btn-sm" href="{{route('admin.title-translation.index')}}"><i
                                            class="refresh ion ion-md-refresh"></i></a>
                                </div>
                            </div>
                        </form>
                        {{-- End Form search --}}
                    </div>


                    <div class="card-body mt-0 pt-0">
                        {{--                    <form id="update-pages" action="{{route('admin.title-translation.actions')}}" method="post">--}}
                        {{--                        @csrf--}}
                        {{--                    </form>--}}
                        <div class="table-responsive">
                            <table id="main-datatable"
                                   class="table table-bordered  dt-responsive nowrap table-striped table-table-success table-hover"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                <tr class="bluck-actions" style="display: none" scope="row">
                                    <td colspan="8">
                                        <div class="col-md-12 mt-0 mb-0 text-center">
                                            <button form="update-pages" class="btn btn-success btn-sm" type="submit"
                                                    name="publish" value="1"><i class="fa fa-check"></i></button>
                                            <button form="update-pages" class="btn btn-warning btn-sm" type="submit"
                                                    name="unpublish" value="1"><i class="fa fa-ban"></i></button>
                                            <button form="update-pages" class="btn btn-danger btn-sm" type="submit"
                                                    name="delete_all" value="1"><i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <th style="width: 1px">
                                        <input form="update-pages" class="checkbox-check flat" type="checkbox"
                                               name="check-all" id="check-all">
                                    </th>
                                    <th>#</th>
                                     @foreach(config('translatable.locales')  as $local1)
                                        <th>@lang('admin.title' ) @lang('admin.lang_' . $local1)</th>
                                        <th>@lang('admin.description' ) @lang('admin.lang_' . $local1)</th>

                                    @endforeach
                                    <th>@lang('admin.key')</th>
{{--                                    <th>@lang('admin.created_by')</th>--}}
{{--                                    <th>@lang('admin.updated_by')</th>--}}

{{--                                    <th>@lang('admin.created_at')</th>--}}
                                    <th>@lang('admin.updated_at')</th>
                                    <th>@lang('admin.actions')</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse ($items as $key => $item)
                                    <tr>
                                        <td>
                                            <input form="update-pages" class="checkbox-check" type="checkbox"
                                                   name="record[{{$item->id}}]" value={{ $item->id }}>
                                        </td>
                                        <td>{{   $key  + 1 }}</td>

                                        @foreach(config('translatable.locales')  as $local)
                                            <td>   @if (  isset($items[$key]->value))
                                                    @php
                                                        $arr =  json_decode($items[$key]->value);
                                                    @endphp
                                                    {{isset($arr->$local)  ? $arr->$local   :   __('admin.not_found') }}
                                                       @else
                                                   {{ __('admin.not_found')}}
                                                @endif
                                            </td>
                                            <td>   @if (  isset($items[$key]->description))
                                                    @php
                                                        $arr =  json_decode($items[$key]->description);
                                                    @endphp
                                                    {{isset($arr->$local)  ? $arr->$local   : __('admin.not_found') }}
                                                       @else
                                                    {{ __('admin.not_found')}}

                                                @endif
                                            </td>

                                        @endforeach
                                        <td><span class="badge bg-success">{{ $item->key }} </span></td>
{{--                                        <td>{{ $item->creator  ?  $item->creator->name : __('admin.not_found') }}</td>--}}
                                        <td>{{ $item->updater ?  $item->updater->name  : __('admin.not_found') }}</td>

{{--                                        <td>{{ $item->created_at }}</td>--}}
{{--                                        <td>{{ $item->updated_at }}</td>--}}
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                {{--                                            @if($item->status == 1)--}}
                                                {{--                                                <a href="{{ route('admin.title-translation.update-status', $item->id )}}" title="@lang('admin.active')" class="btn btn-xs btn-success btn-sm m-1"><i class="fa fa-check"></i></a>--}}
                                                {{--                                            @else--}}
                                                {{--                                                <a href="{{ route('admin.title-translation.update-status', $item->id )}}" title="@lang('admin.dis_active')"  class="btn btn-xs btn-outline-secondary btn-sm m-1"><i class="fa fa-ban"></i></a>--}}
                                                {{--                                            @endif--}}
                                                @if($item->status == 1)
                                                    <a href="#" title="@lang('admin.active')"
                                                       class="btn btn-xs btn-success btn-sm m-1"><i
                                                            class="fa fa-check"></i></a>
                                                @else
                                                    <a href="#" title="@lang('admin.dis_active')"
                                                       class="btn btn-xs btn-outline-secondary btn-sm m-1"><i
                                                            class="fa fa-ban"></i></a>
                                                @endif

                                                <a href="{{ route('admin.title-translation.show', $item->id) }}"
                                                   title="@lang('admin.show')"
                                                   class="btn btn-xs btn-outline-info btn-sm m-1"><i
                                                        class="fas fa-eye"></i></a>


                                                <a href="{{ route('admin.title-translation.edit',$item->id) }}"
                                                   title="@lang('admin.edit')"
                                                   class="btn btn-outline-primary btn-sm m-1"><i
                                                        class="fas fa-pencil-alt"></i></a>

                                                <a class="btn btn-outline-danger btn-sm m-1"
                                                   title="@lang('admin.delete')" data-bs-toggle="modal"
                                                   data-bs-target="#exampleModal{{ $item->id }}">
                                                    <i class="fas fa-trash-alt"> </i>
                                                </a>

                                            </div>
                                        </td>


                                    </tr>
                                    @include('admin.dashboard.title_translations.delete')
                                @empty
                                @endforelse

                                </tbody>


                            </table>
                        </div>


                        <div class="col-md-12 text-center">
                                                    {{ $items->links('pagination::bootstrap-5') }}
                        </div>

                        </form>
                    </div>

                </div>

            </div>

        </div> <!-- container-fluid -->
 @endsection


@section('script')
    {{-- @vite(['resources/assets/admin/js/data-tables.js']) --}}
@endsection