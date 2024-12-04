@extends('admin.app')

@section('title', trans('insurance.show_insurance'))
@section('title_page', trans('insurance.show_insurance'))

@section('style')
    {{-- @vite(['resources/assets/admin/css/data-tables.js']) --}}
@endsection
@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col-12">
            <div class="card">

            <div class="card-body  search-group">

                <div class="row">
                    <div class="col-md-12 text-end mb-2 d-none">
                        <a href="{{ route('admin.insurance.create') }}" class="btn btn-outline-success btn-sm">@lang('admin.create')</a>
                    </div>
                </div>
                {{-- Start Form search --}}
{{--                <form action="{{route('admin.insurance.index')}}" method="get">--}}
{{--                    <div class="row mb-3">--}}
{{--                        <div class="col-md-3 mb-2">--}}
{{--                            <input type="test"  value="{{ old('title', request()->input('title')) }}" name="title" placeholder="{{ trans('admin.title') }}" class="form-control">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3 mb-2">--}}
{{--                            <input type="test"  value="{{ old('description', request()->input('description')) }}" name="description" placeholder="{{ trans('admin.description') }}" class="form-control">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3 mb-2">--}}
{{--                            <select class="form-select" name="status"  aria-label=".form-select-sm example">--}}
{{--                                <option selected value=""> @lang('admin.status')  </option>--}}
{{--                                <option value="1"{{ old('status', request()->input('status')) == 1? "selected":"" }}>@lang('admin.active') </option>--}}
{{--                                <option value="0" {{ old('status', request()->input('status')) != 1 && old('status', request()->input('status')) != null? "selected":"" }}> @lang('admin.dis_active') </option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="search-input col-md-2">--}}
{{--                            <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"> </i></button>--}}
{{--                            <a class="btn btn-success btn-sm" href="{{route('admin.insurance.index')}}"><i class="refresh ion ion-md-refresh"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
                {{-- End Form search --}}
            </div>




                <div class="card-body mt-0 pt-0">
{{--                    <form id="update-pages" action="{{route('admin.insurance.actions')}}" method="post">--}}
                    <form id="update-pages" action="" method="post">

                    @csrf
                    </form>
                    <div class="table-responsive">
                        <table id="main-datatable" class="table table-bordered  dt-responsive nowrap table-striped table-table-success table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr class="bluck-actions" style="display: none" scope="row">
                                    <td colspan="8">
                                        <div class="col-md-12 mt-0 mb-0 text-center" >
                                            <button form="update-pages" class="btn btn-success btn-sm" type="submit" name ="publish" value="1"> <i class="fa fa-check"></i></button>
                                            <button form="update-pages" class="btn btn-warning btn-sm" type="submit" name ="unpublish" value="1">  <i class="fa fa-ban"></i></button>
                                            <button form="update-pages" class="btn btn-danger btn-sm" type="submit" name ="delete_all" value="1">  <i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>

                                </tr>
                            <tr>
                                <th tyle="width: 1px">
                                    <input form="update-pages"  class="checkbox-check flat" type="checkbox" name="check-all"  id="check-all">
                                </th>
                                <th>#</th>
                                <th>@lang('admin.title')</th>
                                <th>@lang('admin.description')</th>
                                <th>@lang('articles.sort')</th>
                                <th>@lang('admin.created_at')</th>
                                <th>@lang('admin.updated_at')</th>
                                <th>@lang('articles.actions')</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($insurance && isset( $insurance->trans[0]))
                                 <tr>
                                    <td>
{{--                                        <input form="update-pages" class="checkbox-check" type="checkbox" name="record[{{$insurance->id}}]" value={{ $insurance->id }}>--}}
                                    </td>
                                    <td>1</td>
                                    <td>
                                        {{ $insurance->trans[0]->title}}

                                    </td>
                                    <td>
                                        {{  substr(removeHTML($insurance->trans[0]->description),0,30) }}

                                    </td>
                                    <td>{{ $insurance->sort }}</td>
                                    <td>{{ $insurance->created_at }}</td>
                                    <td>{{ $insurance->updated_at }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            @if($insurance->status == 1)
                                                <a href="{{ route('admin.insurance.update-status', $insurance->id )}}" title="@lang('admin.active')" class="btn btn-xs btn-success btn-sm m-1"><i class="fa fa-check"></i></a>
{{--                                                <a href="" title="@lang('admin.active')" class="btn btn-xs btn-success btn-sm m-1"><i class="fa fa-check"></i></a>--}}

                                            @else
                                                <a href="{{ route('admin.insurance.update-status', $insurance->id )}}" title="@lang('admin.dis_active')"  class="btn btn-xs btn-outline-secondary btn-sm m-1"><i class="fa fa-ban"></i></a>
{{--                                                <a href="" title="@lang('admin.dis_active')"  class="btn btn-xs btn-outline-secondary btn-sm m-1"><i class="fa fa-ban"></i></a>--}}

                                            @endif

                                            @if($insurance->feature == 1)
                                                <a href="{{ route('admin.insurance.update-featured', $insurance->id )}}" title="@lang('admin.feature')"  class="btn btn-xs btn-warning btn-sm m-1"><i class="fa fa-star"></i></a>
{{--                                                    <a href="" title="@lang('admin.feature')"  class="btn btn-xs btn-warning btn-sm m-1"><i class="fa fa-star"></i></a>--}}

                                                @else
{{--                                                    <a href="" title="@lang('admin.feature')"  class="btn btn-xs btn-outline-secondary btn-sm m-1"><i class="fa fa-star"></i></a>--}}

                                                                                                    <a href="{{ route('admin.insurance.update-featured', $insurance->id )}}" title="@lang('admin.feature')"  class="btn btn-xs btn-outline-secondary btn-sm m-1"><i class="fa fa-star"></i></a>
                                            @endif



                                            <a href="{{ route('admin.insurance.show', $insurance->id) }}" title="@lang('admin.show')" class="btn btn-xs btn-outline-info btn-sm m-1"><i class="fas fa-eye"></i></a>


                                            <a href="{{ route('admin.insurance.edit',$insurance->id) }}" title="@lang('admin.edit')" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-pencil-alt"></i></a>

{{--                                            <a class="btn btn-outline-danger btn-sm m-1" title="@lang('admin.delete')" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $insurance->id }}">--}}
{{--                                                <i class="fas fa-trash-alt"> </i>--}}
{{--                                            </a>--}}

                                        </div>
                                    </td>


                                </tr>
{{--                                @include('admin.dashboard.insurance.delete')--}}

                                @endif

                            </tbody>


                        </table>
                    </div>


                    <div class="col-md-12 text-center">
{{--                        {{ $insurances->links('pagination::bootstrap-5') }}--}}
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