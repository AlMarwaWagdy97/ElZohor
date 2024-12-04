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
                            <span class="mini-stat-icon bg-purple me-0 float-end"><i class="fas fas fa-users"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-purple">{{ App\Models\User::all()->count() }}</span>
                                {{ trans('admin.total_users') }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--End col -->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.contact-us.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i class="mdi mdi-email-outline"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-blue-grey">{{ App\Models\Contactus::all()->count() }}</span>
                                {{ trans('admin.total_meassges') }}
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div> <!-- End col -->
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.subscribes.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i class="far fa-handshake"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-blue-grey">{{ App\Models\Subscribe::all()->count() }}</span>
                                {{ trans('admin.total_subscribes') }}
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div> <!-- End col -->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.menus.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-brown me-0 float-end"><i class="fa fa-sitemap"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-brown">{{ App\Models\Menue::main()->count() }}</span>
                                {{ trans('admin.total_menues') }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> <!-- End col -->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.pages.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-teal me-0 float-end"> <i class="fas fa-pager"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-teal">{{ App\Models\Pages::all()->count() }}</span>
                                {{ trans('admin.total_pages') }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--end col -->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.slider.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-purple me-0 float-end"><i class="fa fa-sliders-h"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-purple">{{ count(App\Models\Slider::get())}}</span>
                                {{ trans('admin.total_slider') }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--End col -->


        {{-- ------------------------------------------------------------------------------------------------------------------- --}}
        <h4 class="page-title navbar-custom-color">@lang('admin.works')</h4>

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.specialties.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-brown me-0 float-end"><i class="fa fa-sitemap"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-brown">{{ App\Models\Specialties::all()->count() }}</span>
                                @lang('admin.total_specialties')
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.doctors.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-brown me-0 float-end"> <i class="fas fa-user-md"></i> </span>
                            <div class="mini-stat-info">
                                <span class="counter text-brown">{{ App\Models\Doctor::all()->count() }}</span>
                                @lang('admin.total_doctors')
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- End col -->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.booking.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i class="fas fa-shopping-bag"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-blue-grey">{{ App\Models\Booking::all()->count() }}</span>
                                {{trans('admin.total_booking')}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- End col -->

        <h4 class="page-title navbar-custom-color">
            @lang('admin.blogs')
        </h4>

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.services.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-brown me-0 float-end"><i class="fa fa-smile"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-brown">{{ App\Models\Services::all()->count() }}</span>
                                {{ trans('admin.total_services') }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> <!-- End col -->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.news.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-brown me-0 float-end"> <i class="fas fa-hand-holding-usd"></i> </span>
                            <div class="mini-stat-info">
                                <span class="counter text-brown">{{ App\Models\News::all()->count() }}</span>
                                {{ trans('admin.total_offers') }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> <!-- End col -->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.gallery.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-brown me-0 float-end"><i class="fas fa-images"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-brown">{{ App\Models\Gallery::all()->count() }}</span>
                                @lang('admin.total_galleries')
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- End col -->
        
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.videos.index') }}">
                        <div class="mini-stat">
                            <span class="mini-stat-icon bg-brown me-0 float-end"><i class="fas fa-video"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-brown">{{ App\Models\Video::all()->count() }}</span>
                                @lang('admin.total_videos')
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- end row-->

</div>

@endsection
