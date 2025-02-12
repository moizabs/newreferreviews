
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Refer Reviews - Admin Business Reviews</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">

    <!-- <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet"> -->

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.partials.navbar')
        <!--<div class="app-header header-shadow">-->
        <!--    <div class="app-header__logo">-->
                <!-- <div class="logo-src"></div> -->
        <!--        <div class="header__pane ml-auto">-->
        <!--            <div>-->
        <!--                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"-->
        <!--                    data-class="closed-sidebar">-->
        <!--                    <span class="hamburger-box">-->
        <!--                        <span class="hamburger-inner"></span>-->
        <!--                    </span>-->
        <!--                </button>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="app-header__mobile-menu">-->
        <!--        <div>-->
        <!--            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">-->
        <!--                <span class="hamburger-box">-->
        <!--                    <span class="hamburger-inner"></span>-->
        <!--                </span>-->
        <!--            </button>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="app-header__menu">-->
        <!--        <span>-->
        <!--            <button type="button"-->
        <!--                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">-->
        <!--                <span class="btn-icon-wrapper">-->
        <!--                    <i class="fa fa-ellipsis-v fa-w-6"></i>-->
        <!--                </span>-->
        <!--            </button>-->
        <!--        </span>-->
        <!--    </div>-->
        <!--    <div class="app-header__content">-->
        <!--        <div class="app-header-left">-->
                    <!--<div class="search-wrapper">-->
                    <!--    <div class="input-holder">-->
                    <!--        <input type="text" class="search-input" placeholder="Type to search">-->
                    <!--        <button class="search-icon"><span></span></button>-->
                    <!--    </div>-->
                    <!--    <button class="close"></button>-->
                    <!--</div>-->
        <!--        </div>-->
        <!--        <div class="app-header-right">-->
        <!--            <div class="header-btn-lg pr-0">-->
        <!--                <div class="widget-content p-0">-->
        <!--                    <div class="widget-content-wrapper">-->
        <!--                        <div class="widget-content-left">-->
        <!--                            <div class="btn-group">-->
        <!--                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"-->
        <!--                                    class="p-0 btn">-->
        <!--                                    <img width="42" class="rounded-circle" src="./webimages/avatar.png" alt="">-->
        <!--                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>-->
        <!--                                </a>-->
        <!--                                 <div tabindex="-1" role="menu" aria-hidden="true"-->
        <!--                                    class="dropdown-menu dropdown-menu-right">-->
        <!--                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"-->
        <!--                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">-->
        <!--                                                    Logout-->
        <!--                                                </a>-->

        <!--                                                <form id="logout-form" action="{{ route('admin.logout') }}"-->
        <!--                                                    method="POST" style="display: none;">-->
        <!--                                                    {{ csrf_field() }}-->
        <!--                                                </form>-->

        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->


        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="app-main">
            <!--<div class="app-sidebar sidebar-shadow">-->
            <!--    <div class="app-header__logo">-->
            <!--        <div class="logo-src"></div>-->
            <!--        <div class="header__pane ml-auto">-->
            <!--            <div>-->
            <!--                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"-->
            <!--                    data-class="closed-sidebar">-->
            <!--                    <span class="hamburger-box">-->
            <!--                        <span class="hamburger-inner"></span>-->
            <!--                    </span>-->
            <!--                </button>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="app-header__mobile-menu">-->
            <!--        <div>-->
            <!--            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">-->
            <!--                <span class="hamburger-box">-->
            <!--                    <span class="hamburger-inner"></span>-->
            <!--                </span>-->
            <!--            </button>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="app-header__menu">-->
            <!--        <span>-->
            <!--            <button type="button"-->
            <!--                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">-->
            <!--                <span class="btn-icon-wrapper">-->
            <!--                    <i class="fa fa-ellipsis-v fa-w-6"></i>-->
            <!--                </span>-->
            <!--            </button>-->
            <!--        </span>-->
            <!--    </div>-->
            <!--    <div class="scrollbar-sidebar my-4">-->
            <!--        <div class="app-sidebar__inner">-->
            <!--            <ul class="vertical-nav-menu">-->
            <!--                <li>-->
            <!--                    <a href="{{ route('admin.dashbord') }}" class="mm-active">-->
            <!--                        <i class="metismenu-icon fa-solid fa-rocket"></i>-->
            <!--                        Dashboard-->
            <!--                    </a>-->
            <!--                </li>-->


            <!--                <li>-->
            <!--                    <a href="">-->
            <!--                        <i class="metismenu-icon fa-solid fa-user"></i>-->
            <!--                        Customers-->
            <!--                        <i class="metismenu-state-icon fa-solid fa-caret-down "></i>-->

            <!--                    </a>-->
            <!--                    <ul class="mm-collapse" style="height: 7.04px;">-->

            <!--                        <li>-->
            <!--                            <a href="{{ route('admin.customers_profile') }}" class="mm-active">-->
            <!--                                <i class="metismenu-icon"></i> Customers History-->
            <!--                            </a>-->
            <!--                        </li>-->

            <!--                    </ul>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="">-->
            <!--                        <i class="metismenu-icon fa-solid fa-users"></i>-->

            <!--                        Businessess-->
            <!--                        <i class="metismenu-state-icon fa-solid fa-caret-down "></i>-->
            <!--                    </a>-->
            <!--                    <ul class="mm-collapse" style="height: 7.04px;">-->

            <!--                        <li>-->
            <!--                            <a href="{{ route('admin.businesses_profile') }}" class="mm-active">-->
            <!--                                <i class="metismenu-icon"></i> Business History-->
            <!--                            </a>-->
            <!--                        </li>-->
                                    <!-- <li>
            <!--                            <a href="requestprice.html" class="">-->
            <!--                                <i class="metismenu-icon"></i> Request Price-->
            <!--                            </a>-->
            <!--                        </li> -->-->
            <!--                    </ul>-->
            <!--                </li>-->
                         
            <!--                <li>-->
            <!--                    <a href="#" >-->
            <!--                        <i class="metismenu-icon fa-solid fa-star"></i>-->
            <!--                        Reviews-->
            <!--                         <i class="metismenu-state-icon fa-solid fa-caret-down "></i>-->
            <!--                    </a>-->
            <!--                    <ul class="mm-collapse" style="height: 7.04px;">-->

            <!--                        <li>-->
            <!--                            <a href="{{ route('admin.reviews.active') }}" class="mm-active">-->
            <!--                                <i class="metismenu-icon"></i> Active Reviews-->
            <!--                            </a>-->
            <!--                        </li>-->
            <!--                        <li>-->
            <!--                            <a href="{{ route('admin.reviews.pending') }}" class="mm-active">-->
            <!--                                <i class="metismenu-icon"></i> Pending Reviews-->
            <!--                            </a>-->
            <!--                        </li>-->
            <!--                        <li>-->
            <!--                            <a href="{{ route('admin.reviews.publish') }}" class="mm-active">-->
            <!--                                <i class="metismenu-icon"></i> Published Reviews-->
            <!--                            </a>-->
            <!--                        </li>-->

            <!--                    </ul>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="{{ route('admin.viewRequestPrice') }}" >-->
            <!--                        <i class="metismenu-icon fa-solid fa-dollar-sign"></i>-->
                                   
            <!--                        Request Price-->
            <!--                    </a>-->
            <!--                </li>-->
                            
            <!--                 <li>-->
            <!--                    <a href="{{ route('admin.addCategory') }}" >-->
            <!--                        <i class="metismenu-icon fa-solid fa-dollar-sign"></i>-->
            <!--                        Add Categories-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--            </ul>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            @include('admin.partials.sidebar')
            <div class="app-main__outer">
                <div class="container my-4">
                    <h5 style="font-size: 2.1rem; font-weight: 700;">Business Reviews</h5>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                {{-- <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example_filter" class="dataTables_filter float-right"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example"></label></div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                                        <!--<div class="col-sm-12 col-md-6">-->
                                                            
                                                        <!--</div>-->
                                                         <div class="col-sm-12 col-md-12 col-lg-12 float-left">
                                                            <form id="searchform" action="{{ route('admin.businesses_profile') }}" method="GET">
                                                                @csrf
                                                                <div class="input-group my-3">
                                                                    <input name="search" type="text" class="form-control" placeholder="Search">
                                                                    <div class="input-group-append">
                                                                        <!--<button class="input-group-text">Search</span>-->
                                                                        <button class="input-group-text" type="submit">Search</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div> 
                                                    </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="mb-0 table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Company Name</th>
                                                    <th>Overall Rating</th>
                                                    <th>Total Reviews</th>
                                                    <th>Registration Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($companies as $company)
                                                    <tr>
                                                        <th scope="row">{{ $company['id'] }}</th>
                                                        <td>
                                                            <div class="d-flex " style="align-items: center; ">
                                                                 <img width="45" height="45"
                                                                    src="{{ isset($company['image']) ? asset('storage/companyLogo/'.$company['image']): asset('images/profile-image.jpg') }}"
                                                                    class="mr-2" alt="" loading="lazy">
                                                                <span>{{ $company['comp_name'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="star-rate d-flex flex-column">
                                                                <div class="rate">
                                                                    @php

                                                                        $stars = number_format(isset($company['avg'][0]['totalRating']) ? $company['avg'][0]['totalRating'] : 0);
                                                                        // $reviewcount = count($company['count_review'][0]['review']);

                                                                        // $stars = 4;
                                                                    @endphp
                                                                    {{-- Haseeb --}}
                                                                    @for ($i = 1; $i <= $stars; $i++)
                                                                        <i class="rating__ fas fa-star"></i>
                                                                    @endfor

                                                                    @for ($j = $stars + 1; $j <= 5; $j++)
                                                                        <i class="rating__ far fa-star"></i>
                                                                    @endfor

                                                                    {{-- <i class="rating__ fas fa-star"></i>
                                                                    <i class="rating__ fas fa-star"></i>
                                                                    <i class="rating__ fas fa-star"></i>
                                                                    <i class="rating__ fas fa-star"></i>
                                                                    <i class="rating__ far fa-star"></i> --}}
                                                                </div>
                                                                <span class="text-center">Rating
                                                                    {{ isset($stars) ? $stars : 0 }}/5.0</span>
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <span>{{ isset($company->countReview[0]->totalReview) ? $company->countReview[0]->totalReview : 0 }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ \Carbon\Carbon::parse($company['created_at'])->diffForHumans() }}</span>
                                                            <br>
                                                            <span>{{ \Carbon\Carbon::parse($company['created_at'])->format('M, d Y') }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="flex-column d-flex">
                                                                @if ($company['status'] == 0)
                                                                    <a href="{{ route('admin.deactiveBusiness', $company['id']) }}"
                                                                        class="btn btn-danger my-1">Deactive</a>
                                                                @else
                                                                    <a href="{{ route('admin.deactiveBusiness', $company['id']) }}"
                                                                        class="btn btn-success my-1">Active</a>
                                                                @endif
                                                                {{-- <button type="button"
                                                                    class="btn btn-success my-1">Active</button>
                                                                <button type="button"
                                                                    class="btn btn-danger my-1">Deactive</button> --}}
                                                                <a href="{{ route('admin.editBusinessProfile', $company['id']) }}"
                                                                    class="btn btn-info my-1">Customers Reviews</a>
                                                                <a href="{{ route('admin.viewBusinessProfile', $company['id']) }}" class="btn btn-secondary">View Profile</a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example_info" role="status"
                                            aria-live="polite">
                                            Showing 1 to 10 of 57 entries</div>
                                    </div> --}}
                                    <div class="col-sm-12 col-md-7 my-4">
                                        <div class="d-flex ">
                                            {!! $companies->links() !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    
    <!--Modal-->
    <!-- <div class="modal fade bd-example-modal-lg" id="Viewprofile" tabindex="-1" role="dialog" aria-labelledby="Viewprofile"-->
    <!--    aria-hidden="true">-->
    <!--    <div class="modal-dialog" role="document">-->
    <!--        <div class="modal-content">-->
    <!--            <div class="modal-header">-->
    <!--                <h5 class="modal-title" id="exampleModalLongTitle">Company Information</h5>-->
    <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                    <span aria-hidden="true">&times;</span>-->
    <!--                </button>-->
    <!--            </div>-->
    <!--            <div class="modal-body">-->
    <!--                <form>-->
                    
    <!--            <div class="row">-->
    <!--                <div class="col-sm-6 form-group">-->
    <!--                    <label for="c-name">Company Name</label>-->
    <!--                    <input type="text" class="form-control" val="" name="c-name" id="c-name" placeholder="Enter company name" required>-->
    <!--                </div>-->
    <!--                <div class="col-sm-6 form-group">-->
    <!--                    <label for="mc-num">Mc Number</label>-->
    <!--                    <input type="text" class="form-control" val="" name="mc-num" id="mc-num" placeholder="Enter mc number" required>-->
    <!--                </div>-->
    <!--                <div class="col-sm-6 form-group">-->
    <!--                    <label for="email">Email</label>-->
    <!--                    <input type="email" class="form-control" val="" name="email" id="email" placeholder="Enter your email." required>-->
    <!--                </div>-->
    <!--                <div class="col-sm-6 form-group">-->
    <!--                    <label for="name">Name</label>-->
    <!--                    <input type="text" class="form-control" val="" name="name" id="name" placeholder="Enter Your Name" required>-->
    <!--                </div>-->
    <!--                <div class="col-sm-6 form-group">-->
    <!--                    <label for="address-2">City</label>-->
    <!--                    <input type="address" class="form-control" val="" name="city" id="city" placeholder="City Name." required>-->
    <!--                </div>-->
    <!--                <div class="col-sm-6 form-group">-->
    <!--                    <label for="State">State</label>-->
    <!--                    <input type="address" class="form-control" val="" name="State" id="State" placeholder="Enter your state name." required>-->
    <!--                </div>-->
    
    <!--                <div class="col-sm-6 form-group">-->
    <!--                    <label for="tel">Desired User Name</label>-->
    <!--                    <input type="tel" name="dname" class="form-control" val="" id="dname" placeholder="Enter desire username" required>-->
    <!--                </div>-->
    <!--                <div class="col-sm-6 form-group">-->
    <!--                    <label for="pass">Password</label>-->
    <!--                    <input type="Password" name="password" class="form-control" val="" id="pass" placeholder="Enter your password." required>-->
    <!--                </div>-->
                  
    <!--                <div class="col-sm-12 form-group">-->
    <!--                    <label>About Us(Breif Discription)</label>-->
    <!--                    <textarea class="form-control" id="message" rows="3"></textarea>-->
    <!--                </div>-->
                    
        
    <!--                <div class="col-sm-12 form-group mb-0">-->
                       
                  
                <!--    <div class="fl-header-phone-contain float-right">-->
                <!--        <a class="fl-header-phone " href="">Submit</a>-->
                <!--</div>-->
    <!--        </div>-->
                    
    <!--            </div>-->
    <!--            </form>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
    </script>
</body>

</html>
