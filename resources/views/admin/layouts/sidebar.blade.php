<div class="vertical-menu side-navbar-custom-color" style="background-color:{{ @$adminDashboardTheme->side_navbar_background }};">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- View  Dashboard --}}
                <li>
                    <a href="{{ route('admin.home') }}" class="waves-effect">
                        <i class="fa fa-home"></i>
                        <span> {{ trans('admin.dashboard') }} </span>
                    </a>
                </li>


                {{-- System ----------------------------------------------------------- --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-th-large"></i>
                        <span> @lang('admin.system')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        {{-- User --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fas fa-users"></i>
                                <span> @lang('admin.users')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.users.index') }}"> @lang('users.show_user')</a></li>
                                <li><a href="{{ route('admin.users.create') }}"> @lang('users.create_user')</a></li>
                            </ul>
                        </li>
                        {{-- End User ----------------------------------------------------------- --}}

                        {{-- Rules  ----------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa fa-wrench"></i>
                                <span> @lang('admin.roles')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.roles.index') }}"> @lang('admin.roles_show')</a></li>
                                <li><a href="{{ route('admin.roles.create') }}"> @lang('admin.roles_create')</a></li>
                            </ul>
                        </li>
                        {{-- End Rules ----------------------------------------------------------- --}}

                        {{-- Menus -------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa fa-sitemap"></i>
                                <span> @lang('admin.menus')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.menus.index') }}"> @lang('menus.show_menus')</a></li>
                                <li><a href="{{ route('admin.menus.create') }}"> @lang('menus.create_menus')</a></li>
                            </ul>
                        </li>
                        {{-- End Menus ----------------------------------------------------------- --}}

                        {{-- Pages --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-pager"></i>
                                <span> @lang('admin.pages')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.pages.index') }}"> @lang('admin.pages_show')</a></li>
                                <li><a href="{{ route('admin.pages.create') }}"> @lang('admin.page_create')</a></li>
                            </ul>
                        </li>
                        {{-- End Pages ------------------------------------------------------------ --}}


                        {{-- Slider --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa fa-sliders-h"></i>
                                <span> @lang('admin.slider')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.slider.index') }}"> @lang('slider.slider_show')</a></li>
                                <li><a href="{{ route('admin.slider.create') }}"> @lang('slider.slider_create')</a></li>
                            </ul>
                        </li>
                        {{-- End Slider ----------------------------------------------------------- --}}

                        {{-- Contact Us ----------------------------------------------------------- --}}
                        <li>
                            <a href="{{ route('admin.contact-us.index') }}" class="waves-effect">
                                <i class="mdi mdi-email-outline"></i>
                                <span>{{ trans('admin.contact_us') }}</span>
                            </a>
                        </li>
                        {{-- End Contact Us ------------------------------------------------------- --}}

                        {{-- subscribes Us ----------------------------------------------------------- --}}
                        <li>
                            <a href="{{ route('admin.subscribes.index') }}" class="waves-effect">
                                <i class="far fa-handshake"></i>
                                <span>{{ trans('admin.subscribes') }}<span>
                            </a>
                        </li>
                        {{-- End subscribes Us ------------------------------------------------------- --}}


                        {{-- title translations   ----------------------------------------------------------- --}}
                        <li>
                            <a href="{{ route('admin.title-translation.index') }}" class="waves-effect">
                                <i class="fas fa-pencil-alt"></i>
                                <span>{{ trans('admin.title_translations') }}</span>
                            </a>
                        </li>
                        {{-- End title translations ------------------------------------------------------- --}}

                    </ul>
                </li>
                {{-- End System ----------------------------------------------------------- --}}


                {{-- Works ----------------------------------------------------------- --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-briefcase"></i>
                        <span> @lang('admin.works')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        {{-- Specialties --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa fa-sitemap"></i>
                                <span> @lang('specialties.specialties')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.specialties.index') }}"> @lang('specialties.show_specialties')</a></li>
                                <li><a href="{{ route('admin.specialties.create') }}"> @lang('specialties.create_specialties')</a></li>
                            </ul>
                        </li>
                        {{-- End Specialties ----------------------------------------------------------- --}}

                        {{-- Doctors --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-user-md"></i>
                                <span> @lang('doctors.doctors')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.doctors.index') }}"> @lang('doctors.show_doctors')</a></li>
                                <li><a href="{{ route('admin.doctors.create') }}"> @lang('doctors.create_doctor')</a></li>
                            </ul>
                        </li>
                        {{-- End Doctors ----------------------------------------------------------- --}}

                        {{-- booking --------------------------------------------------------------- --}}
                        <li>
                            <a href="{{ route('admin.booking.index') }}" class="waves-effect">
                                <i class="fas fa-shopping-bag"></i>
                                <span>{{ trans('admin.booking') }}</span>
                            </a>
                        </li>
                        {{-- End booking ----------------------------------------------------------- --}}

                        {{-- reviews --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-comments"></i>
                                <span> @lang('reviews.reviews')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.reviews.index') }}"> @lang('reviews.show_reviews')</a></li>
                                <li><a href="{{ route('admin.reviews.create') }}"> @lang('reviews.create_reviews')</a></li>
                            </ul>
                        </li>
                        {{-- End reviews ----------------------------------------------------------- --}}

                        {{-- insurance --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa fa-file"></i>
{{--                                <i class="fas fa-comments"></i>--}}
                                <span> @lang('insurance.insurance')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.insurance.index') }}"> @lang('insurance.show_insurance')</a></li>
{{--                                <li><a href="{{ route('admin.insurance.create') }}"> @lang('insurance.create_insurance')</a></li>--}}
                            </ul>
                        </li>
                        {{-- End reviews ----------------------------------------------------------- --}}

                    </ul>
                </li>
                {{-- End Works -------------------------------------------------------- --}}


                {{-- Blogs ----------------------------------------------------------- --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span> @lang('admin.blogs')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- services --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa fa-smile"></i>
                                <span> @lang('services.services')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.services.index') }}"> @lang('services.show_services')</a></li>
                                <li><a href="{{ route('admin.services.create') }}"> @lang('services.create_services')</a></li>
                            </ul>
                        </li>
                        {{-- End services ----------------------------------------------------------- --}}

                         {{-- offers --------------------------------------------------------------- --}}
                         <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-hand-holding-usd"></i>
                                <span> @lang('offers.offers')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.news.index') }}"> @lang('offers.show_offers')</a></li>
                                <li><a href="{{ route('admin.news.create') }}"> @lang('news.create_news')</a></li>
                            </ul>
                        </li>
                        {{-- End services ----------------------------------------------------------- --}}


                        {{-- gallery --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-images"></i>
                                <span> @lang('gallery.galleries')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.gallery.index') }}"> @lang('gallery.show_gallery')</a></li>
                                <li><a href="{{ route('admin.gallery.create') }}"> @lang('gallery.create_gallery')</a></li>
                            </ul>
                        </li>
                        {{-- End gallery ----------------------------------------------------------- --}}

                        {{-- videos --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-video"></i>
                                <span> @lang('videos.videos')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.videos.index') }}"> @lang('videos.show_videos')</a></li>
                                <li><a href="{{ route('admin.videos.create') }}"> @lang('videos.create_video')</a></li>
                            </ul>
                        </li>
                        {{-- End videos ----------------------------------------------------------- --}}




                    </ul>
                </li>
                {{-- End Blogs -------------------------------------------------------- --}}


                {{-- Settings ----------------------------------------------------------- --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-spin mdi-cog "></i>
                        <span> @lang('admin.settings')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-application-cog"></i>
                                <span> @lang('settings.system_settings')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.settings.index') }}"> @lang('settings.app_setting')</a></li>
                                <li><a href="{{ route('admin.home-settings.index') }}"> @lang('settings.setting_home')</a></li>
                                <li><a href="{{ route('admin.user_scripts.index') }}"> @lang('settings.script')</a></li>

                            </ul>
                        </li>
                        {{-- Themes --------------------------------------------------------------- --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa fa-palette"></i>
                                <span> @lang('themes.themes')</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.themes.dashboard') }}"> @lang('themes.dashboard_theme')</a></li>
                                <li><a href="{{ route('admin.themes.site') }}"> @lang('themes.site_theme')</a></li>

                            </ul>
                        </li>
                        {{-- End Themes ----------------------------------------------------------- --}}
                    </ul>
                </li>
                {{-- End Settings ----------------------------------------------------------- --}}
            </ul>


            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
