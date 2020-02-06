<!-- header for large screens  -->
            <header class="header">
              <div class="top-header">
                <div class="container">
                  <div class="row top-header__items">
                    <div class="top-header__contact">
                        <i class="material-icons">
                  phone
                </i>
                      <a href="tel:0987654321">0987654321</a>
                    </div>
                    <div class="top-header__langauge">
                      <div class="top-header__langauge-en">
                        <img
                          class="lazzy"
                          src="{{ asset('front/assets/imgs/icons/uk-flag.svg')}}"
                          alt="English Language"
                        />
                        <a href="{{ url("lang/en") }}"> {{ trans('admin.english') }} </a>
                      </div>
                      |
                      <div class="top-header__langauge-ar">
                        <img
                          class="lazzy"
                          src="{{ asset('front/assets/imgs/icons/saudi-flag.svg')}}"
                          alt="Arabic Language"
                        />
                        <a href="{{ url("lang/ar") }}">{{ trans('admin.arabic') }}</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-header" id="main-header">
                <div class="container">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <!-- side menu for md and small screens  -->
                    <div class="mobile-menu">
                      <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                      >
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div
                        class="collapse navbar-collapse navbar-collapse-sm d-lg-none awn-card"
                        id="navbarNavDropdown"
                      >
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('products/1') }}">{{ trans('admin.Offers Ads') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('products/2') }}">{{ trans('admin.Needs Ads') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('products/3') }}">{{ trans('admin.Ads') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">{{ trans('admin.About Us') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}">{{ trans('admin.contact') }}</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- end side menu for md and small screens  -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                      <img
                        class="lazzy"
                        src="{{ asset('front/assets/imgs/main/logo.png')}}"
                        alt="Awn Logo"
                      />
                    </a>

                    <!-- navbar for large screens  -->
                    <ul class="navbar-nav ml-auto navbar-nav-lg">
                        @if(auth()->check())
                            <li class="nav-item dropdown">
                                <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >
                                <i class="material-icons">
                                    person
                                </i>
                                {{ trans('admin.profile') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div>
                                    <a class="btn btn-primary dropdown-btn" href="{{ url('/profile/dashboard') }}">{{ trans('admin.profile') }}</a>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ url('/logout') }}">{{ trans('admin.logout') }}</a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >
                            <i class="material-icons">
                                person
                            </i>
                            {{ trans('admin.login') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div>
                                <a class="btn btn-primary dropdown-btn" href="{{ url('/login') }}">{{ trans('admin.login') }}</a>
                            </div>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ url('/register') }}">{{ trans('admin.Create Account') }}</a>
                        </div>
                    </li>
                @endif


                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/favourite') }}">
                          <i class="material-icons"> favorite </i></a
                        >
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn btn-primary header-btn" href="{{ url('/product/create/1') }}">
                          <i class="material-icons">
                            add
                          </i>
                          {{ trans('admin.Place an AD') }}
                        </a>
                      </li>
                    </ul>
                    <!-- navbar for mid and small screens  -->
                    <ul class="navbar-nav ml-auto navbar-nav-md">
                      <li class="nav-item dropdown">
                        <a class="nav-link " href="#">
                          <i class="material-icons">
                            {{ trans('admin.person') }}
                          </i>
                        </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('/favourite') }}">
                              <i class="material-icons"> favorite </i>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <!-- place an add  -->
                          <i class="material-icons">
                            {{ trans('admin.add') }}
                          </i>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <!--  search for md sm screens  -->
       <div class="search-header">
         <div class="container">
           <div class="row ">
             <div class="col-12 search-header__items">
                 <form class="d-flex" action="{{ url('/products/3') }}" method="get">
                     <!-- <h3>search for instruments</h3> -->
                     <select class="form-control" name="city">
                         <option value="">{{ trans('admin.City') }}</option>
                         @foreach (getCountry() as $country)
                             <optgroup label="{{ $country->country_name_ar }}">
                                 @if (!empty($country->city))
                                     @foreach ($country->city as $city)
                                         <option value="{{ $city->id }}" {{ request()->city == $city->id ? 'selected' : '' }}>{{ $city->country_name_ar }}</option>
                                     @endforeach
                                 @endif
                             </optgroup>
                         @endforeach
                     </select>
                     <select class="form-control" name="dep_id">
                         <option value="">{{ trans('admin.department') }}</option>
                         @foreach (getDept() as $dept)
                             <optgroup label="{{ $dept->ar_name }}">
                                 @if (!empty($dept->department))
                                     @foreach ($dept->department as $department)
                                         <option value="{{ $department->id }}" {{ request()->dep_id == $department->id ? 'selected' : '' }}>{{ $department->ar_name }}</option>
                                     @endforeach
                                 @endif
                             </optgroup>
                         @endforeach
                     </select>
                     <div class="search-btn">
                         <button class="btn btn-primary" type="submit">{{ trans('admin.search') }}</button>
                     </div>
                 </form>
             </div>
           </div>
         </div>
       </div>
       <!-- end  search for md sm screens   -->
     </div>

   <!-- End header for large screens  -->
   <!-- header for mid and small screens  -->
   <!-- End header for mid and small screens  -->
