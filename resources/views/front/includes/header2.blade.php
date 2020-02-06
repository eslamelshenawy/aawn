<header class="header inner-header">
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
        <!-- side button for inner pages  -->
        <div class="inner-header-nav">
          <button id="inner-header-btn" class="inner-header-btn">
            <i class="material-icons"> menu </i>
          </button>
          <div class="inner-header-menu d-none">
            <div class="side-header">
              <div class="awn-card side-header__menu side-header__card ">
                <nav>
                  <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('products/1') }}">
                        <i class="material-icons">
                          wb_sunny
                        </i>
                        {{ trans('admin.Offers Ads') }}
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('products/2') }}">
                        <i class="material-icons">
                          loyalty
                        </i>
                        {{ trans('admin.Needs Ads') }}</a
                      >
                    </li>
                    <li class="nav-item nav-item-dropdown">
                      <a class="nav-link " href="#">
                        <i class="material-icons">
                          featured_video
                        </i>
                        {{ trans('admin.Ads') }}
                        <i class="material-icons drop-icon">
                          keyboard_arrow_down
                        </i>
                      </a>
                      <div class="awn-dorpdown-items awn-card display-none">
                        <ul class="main-menu p-4">
                            @foreach (mainDepartment() as $department)
                                 <li>
                                   <a href="#"> {{ $department->ar_name }} </a>
                                   @if (!empty(subDepartment($department->id)))
                                       <ul class="sub-menu awn-card display-none">
                                           @foreach (subDepartment($department->id) as $sub)
                                               <li><a href="{{ url('products/3/'.$sub->id) }}"> {{ $sub->ar_name }} </a></li>
                                           @endforeach
                                       </ul>
                                   @endif
                                 </li>
                             @endforeach
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- end side button for inner pages  -->
        <a class="navbar-brand" href="{{ url('/') }}">
          <img
            class="lazzy"
            src="{{ asset('front/assets/imgs/main/logo.png')}}"
            alt="Awn Logo"
          />
        </a>

        <div class="search-inner-header mx-auto">
          <div class="search-header__items">
              <form class="d-flex" action="{{ url('/products/3') }}" method="get">
            <!-- <h3>search for instruments</h3> -->
            <select class="form-control" name="city" style="width:150px;">
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
              <i class="material-icons"> favorite </i></a
            >
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

</div>
