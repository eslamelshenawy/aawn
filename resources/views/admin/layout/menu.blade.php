<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">
                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="category-content">
                        <div class="media">
                            <a href="#" class="media-left"><img src="assets/images/placeholder.jpg"
                                                                class="img-circle img-sm" alt=""></a>
                            <div class="media-body">
                                <span class="media-heading text-semibold">@if(Auth::guard('admin')->user()) {{admin()->user()->name}}@else {{ Auth::user()->name }} @endif</span>
                                <div class="text-size-mini text-muted">

                                </div>
                            </div>
                            <div class="media-right media-middle">
                                <ul class="icons-list">
                                    <li {{{ (Request::is('admin') ? ' class=active' : '') }}}>
                                        <a href="#"><i class="icon-cog3"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->

                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        @if(Auth::user() && Auth::user()->level == 'vendor')

                            <ul class="navigation navigation-main navigation-accordion">
                                <li>
                                    <a href="#"><i class="icon-cart2"></i> <span>{{trans('admin.products')}}</span></a>
                                    <ul>
                                        <li {{{ (Request::is('vendor/product/department') ? ' class=active' : '') }}}><a
                                                    href="{{url('vendor/products')}}">{{trans('admin.allproducts')}}</a></li>
                                        <li {{{ (Request::is('vendor/product/department') ? ' class=active' : '') }}}><a
                                                    href="{{url('vendor/products/create')}}">{{trans('admin.addproducts')}}</a>
                                        </li>
                                    </ul>

                                </li>
                                <li {{{ (Request::is('admin/orders') ? ' class=active' : '') }}}>
                                    <a href="{{url('vendor/orders')}}"><i class="  icon-price-tags"></i> <span>{{trans('admin.orders')}}</span></a>
                                </li>

                            </ul>

                        @else
                            <ul class="navigation navigation-main navigation-accordion">

                                <!-- Main -->
                                <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i>
                                </li>

                    

                                <li {{{ (Request::is('admin/') ? ' class=active' : '') }}}>
                                    <a href="{{url('/admin')}}"><i class="icon-home4"></i> <span>{{trans('admin.home')}}</span></a>
                                </li>


                                <li>
                                    <a href="#"><i class="icon-sync icon-pen"></i>
                                        <span>{{trans('admin.admins')}}</span></a>
                                    <ul>
                                        <li {{{ (Request::is('admin/admins') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('admins')}}">{{trans('admin.alladmins')}}</a></li>
                                        <li {{{ (Request::is('admin/admins/create') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('admins/create')}}">{{trans('admin.addadmins')}}</a>
                                        </li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="#"><i class="icon-person"></i> <span>{{trans('admin.users')}}</span></a>
                                    <ul>
                                        <li {{{ (Request::is('admin/users') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('users')}}">{{trans('admin.allusers')}}</a></li>
                                        <li {{{ (Request::is('admin/users/create') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('users/create')}}">{{trans('admin.addusers')}}</a></li>
                                    </ul>

                                </li>

                                <li>
                                    <a href="#"><i class=" icon-station"></i> <span>{{trans('admin.countries')}}</span></a>
                                    <ul>
                                        <li {{{ (Request::is('admin/countries') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('countries')}}">{{trans('admin.allcountries')}}</a>
                                        </li>
                                        <li {{{ (Request::is('admin/countries/create') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('countries/create')}}">{{trans('admin.addcountriesc')}}</a>
                                        </li>
                                    </ul>

                                </li>

                                <li>
                                    <a href="#"><i class="icon-cart2"></i> <span>{{trans('admin.categories')}}</span></a>
                                    <ul>
                                        <li {{{ (Request::is('admin/product/department') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('department_product')}}">{{trans('admin.allcategories')}}</a>
                                        </li>

                                    </ul>

                                </li>

                                <li>
                                    <a href="#"><i class="icon-cart2"></i> <span>{{trans('admin.products')}}</span></a>
                                    <ul>
                                        <li {{{ (Request::is('admin/product/department') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('products')}}">{{trans('admin.allproducts')}}</a></li>

                                    </ul>

                                </li>
                                <li>
                                    <a href="#"><i class="icon-person"></i> <span>{{trans('admin.agents')}}</span></a>
                                    <ul>
                                        <li {{{ (Request::is('admin/agents') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('agents')}}">{{trans('admin.allagent')}}</a></li>
                                        <li {{{ (Request::is('admin/agents/create') ? ' class=active' : '') }}}><a
                                                    href="{{aurl('agents/create')}}">{{trans('admin.add')}}</a></li>
                                    </ul>

                                </li>

                                <li {{{ (Request::is('admin/news') ? ' class=active' : '') }}}>
                                    <a href="{{aurl('news')}}"><i class="icon-newspaper"></i> <span>{{trans('admin.news')}}</span></a>
                                </li>



                                </li>
                                <li {{{ (Request::is('admin/orders') ? ' class=active' : '') }}}>
                                    <a href="{{aurl('orders')}}"><i class="  icon-price-tags"></i> <span>{{trans('admin.orders')}}</span></a>
                                </li>
                                {{-- <li {{{ (Request::is('admin/updateabout') ? ' class=active' : '') }}}>
                                    <a href="{{aurl('updateabout')}}"><i class=" icon-info3"></i> <span>{{trans('admin.aboutus')}}</span></a>
                                </li> --}}

                                </li>
                                <li {{{ (Request::is('admin/allcontact') ? ' class=active' : '') }}}>
                                    <a href="{{aurl('allcontact')}}"><i class="  icon-envelope"></i> <span>{{trans('admin.inbox')}}</span></a>
                                </li>
                                <li {{{ (Request::is('admin/tickets') ? ' class=active' : '') }}}>
                                    <a href="{{aurl('tickets')}}"><i class="icon-newspaper"></i> <span>{{trans('admin.tickets')}}</span></a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
