<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Refer Reviews - Admin Edit Business Profile</title>
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
        <!--    {{-- <div class="app-header__menu">-->
        <!--        <span>-->
        <!--            <button type="button"-->
        <!--                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">-->
        <!--                <span class="btn-icon-wrapper">-->
        <!--                    <i class="fa fa-ellipsis-v fa-w-6"></i>-->
        <!--                </span>-->
        <!--            </button>-->
        <!--        </span>-->
        <!--    </div> --}}-->
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
        @include('admin.partials.navbar')
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
                <div class="container">
                    <div class="col-12">
                        <div class="main-card mb-3 card my-4">
                            <div class="card-body">
                                <h5 class="card-title">Total Customers Reviews History</h5>


                                <table class="table top-companies table-striped">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            {{-- <th>Phone Number</th> --}}
                                            <th>Review</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>
                                                    <div class="d-flex" style="align-items: center;gap:5px; margin:auto">
                                                        <img width="45" height="45"
                                                            src="{{ asset('images/Montway-Auto-Transport.png') }}"
                                                            class="attachment-gazek_size_170x170_crop size-gazek_size_170x170_crop"
                                                            alt="" loading="lazy">
                                                        <div><span>{{ $review->get_customer->first_name }}</span>
                                                        </div>
                                                    </div>
                                                </td>


                                                <td>
                                                    <div>
                                                        <div class="rate">

                                                            @php

                                                                $stars = number_format(isset($review->rating) ? $review->rating : 0);

                                                            @endphp
                                                            {{-- Haseeb --}}
                                                            @for ($i = 1; $i <= $stars; $i++)
                                                                <i class="rating__ fas fa-star"></i>
                                                            @endfor

                                                            @for ($j = $stars + 1; $j <= 5; $j++)
                                                                <i class="rating__ far fa-star"></i>
                                                            @endfor

                                                        </div>
                                                        <div>
                                                            <h5>{{ $review->title }}</h5>
                                                            </h5>
                                                        </div>
                                                        <div>
                                                            <p>{{ $review->review }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                                                </td>
                                                <td>
                                                    @if($review->status == 1)

                                                        <a href="{{ route('admin.deactiveUserReview',$review->id) }}"
                                                            class="btn btn-danger my-1 ">Deactive</a>

                                                    @else
                                                        <a href="{{ route('admin.deactiveUserReview',$review->id) }}"
                                                            class="btn btn-success my-1 ">Active</a>

                                                    @endif
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#exampleModalLong{{ $review->id }}"
                                                        class="btn btn-info my-1 ">Edit Review</button>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>

                            </div>
                            
                        </div>
                        <div class="row">
                                                        
                                                        <div class="col-sm-12 col-md-7">
                                                            <div class="d-flex justify-content-center">
                                                                {!! $reviews->links() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- Model For Edit Review --}}
    @foreach ($reviews as $review)
        <div class="modal fade" id="exampleModalLong{{ $review->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle{{ $review->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.edit_customer_review', $review->id) }}" method="POST">
                            @csrf

                            <div class="form-group">

                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $review->title }}" placeholder="Enter title">

                            </div>


                            <div class="form-group">

                                <textarea class="form-control" name="review"  id="exampleTextarea" rows="3"
                                    placeholder="Enter your review">{{ $review->review }}</textarea>
                            </div>


                            <div class="fl-header-phone-contain my-2">
                                <button class="fl-header-phone">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach


    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
    </script>
</body>

</html>
