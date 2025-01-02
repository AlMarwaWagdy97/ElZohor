@extends('admin.app')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <h4 class="page-title navbar-custom-color">@lang('admin.system')</h4>

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.users.index') }}">
                            <div class="mini-stat">
                                <span class="mini-stat-icon bg-purple me-0 float-end"><i
                                        class="fas fas fa-users"></i></span>
                                <div class="mini-stat-info">
                                    <span class="counter text-purple">{{ App\Models\User::count() }}</span>
                                    {{ trans('admin.total_users') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.contact-us.index') }}">
                            <div class="mini-stat">
                                <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i
                                        class="mdi mdi-email-outline"></i></span>
                                <div class="mini-stat-info">
                                    <span class="counter text-blue-grey">{{ App\Models\Contactus::count() }}</span>
                                    {{ trans('admin.total_meassges') }}
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.subscribes.index') }}">
            <div class="mini-stat">
                <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i class="far fa-handshake"></i></span>
                <div class="mini-stat-info">
                    <span class="counter text-blue-grey">{{ App\Models\Subscribe::count() }}</span>
                    {{ trans('admin.total_subscribes') }}
                </div>

            </div>
            </a>
        </div>
    </div>
    </div> --}}

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.menus.index') }}">
                            <div class="mini-stat">
                                <span class="mini-stat-icon bg-brown me-0 float-end"><i
                                        class="fa fa-sitemap"></i></span>
                                <div class="mini-stat-info">
                                    <span class="counter text-brown">{{ App\Models\Menue::main()->count() }}</span>
                                    {{ trans('admin.total_menues') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.pages.index') }}">
                            <div class="mini-stat">
                                <span class="mini-stat-icon bg-teal me-0 float-end"> <i class="fas fa-pager"></i></span>
                                <div class="mini-stat-info">
                                    <span class="counter text-teal">{{ App\Models\Pages::count() }}</span>
                                    {{ trans('admin.total_pages') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.slider.index') }}">
                            <div class="mini-stat">
                                <span class="mini-stat-icon bg-purple me-0 float-end"><i
                                        class="fa fa-sliders-h"></i></span>
                                <div class="mini-stat-info">
                                    <span class="counter text-purple">{{ count(App\Models\Slider::get())}}</span>
                                    {{ trans('admin.total_slider') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- ------------------------------------------------------------------------------------------------------------------- --}}
            <h4 class="page-title navbar-custom-color">@lang('admin.products')</h4>
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.categories.index') }}">
                            <div class="mini-stat">
                                <span class="mini-stat-icon bg-teal me-0 float-end"> <i class="fas fa-pager"></i></span>
                                <div class="mini-stat-info">
                                    <span class="counter text-teal">{{ App\Models\Categories::count() }}</span>
                                    {{ trans('categories.categories') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.products.index') }}">
                            <div class="mini-stat">
                                <span class="mini-stat-icon bg-purple me-0 float-end"><i
                                        class="fa fa-sliders-h"></i></span>
                                <div class="mini-stat-info">
                                    <span class="counter text-purple">{{ App\Models\Product::count() }}</span>
                                    {{ trans('product.products') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>






            {{-- ------------------------------------------------------------------------------------------------------------------- --}}
            <h4 class="page-title navbar-custom-color">المقالات و الاخبار</h4>
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.blogs.index') }}">
                            <div class="mini-stat">
                                <span class="mini-stat-icon bg-teal me-0 float-end"> <i class="fas fa-pager"></i></span>
                                <div class="mini-stat-info">
                                    <span class="counter text-teal">{{ App\Models\Blog::count() }}</span>
                                    @lang('admin.blogs')
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.news.index') }}">
                            <div class="mini-stat">
                                <span class="mini-stat-icon bg-teal me-0 float-end"> <i class="fas fa-pager"></i></span>
                                <div class="mini-stat-info">
                                    <span class="counter text-teal">{{ App\Models\News::count() }}</span>
                                    الاخبار
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>




@endsection
