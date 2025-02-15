<!DOCTYPE html>
<html lang="en">

<head>

    <title>Refer Reviews</title>
    @include('layouts.head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .left__btn,
        .right__btn {
            position: absolute;
            top: 60%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            z-index: 2;
            width: 2.4rem;
            height: 2.4rem;
            display: -ms-grid;
            display: grid;
            border-radius: 50%;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            cursor: pointer;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            font-size: 1.6rem;
            color: #000;
        }

        /* .left__btn i, .right__btn i {
          font-size: 1.6rem;
          color: #000;
    } */
        .left__btn {
            left: 2rem;
            background: #00539c;
            color: #fff;
        }

        /* .left__btn {
          background: #00539c;
    }
        .left__btn i {
          color: #fff;
    } */
        .right__btn {
            right: 2rem;
            background: #00539c;
            color: #fff;
        }

        /* .right__btn {
          background: #00539c;
    }
        .right__btn i {
          color: #fff;
    } */
        .card__box {
            position: relative;
            padding: 0;
            border: 1px solid #ddd;
            width: 90%;
            margin: 0 auto;
        }

        .card__box h2 {
            font-size: 18px;
            text-align: center;
            color: #00539c;
            font-weight: 600;
            margin-top: 10px;
        }

        /* .card__box {
            position: relative;
            border: 1px solid #ddd;
    } */
        .card__box_1 {
            display: flex;
            gap: .2rem;
            margin: 1rem 0;
        }

        .card__box_ img {
            width: 45px;
        }

        @media (max-width:991.98px) {
            .padding {
                padding: 1.5rem
            }
        }

        @media (max-width:767.98px) {
            .padding {
                padding: 1rem
            }
        }

        .reviewscard {}

        .padding {
            padding: 5rem
        }

        .profile {
            margin-top: 16px;
            margin-left: 0px;
        }

        .profile-pic {
            width: 58px;
        }

        .cust-name {
            font-size: 15px;
        }

        .cust-profession {
            font-size: 10px;
        }

        .items {
            width: 90%;
            margin: 0px auto;
            margin-top: 100px
        }

        .slick-slide {
            margin: 10px
        }

        .template-demo p {
            font-size: 14px;
            line-height: normal;
            text-align: left;
        }

        .card__box {
            border-radius: 10px;
            background: #fff;
            position: relative;
            border: 3px solid #00539CFF;
            box-shadow: rgb(176 179 183) 2px 3px 10px 0px;
        }

        .top-companies td {
            vertical-align: center !important;
        }

        .caroselimage {
            height: 300px;
        }

        .table td,
        .table th {
            vertical-align: center !important;
        }

        @media screen and (max-width : 600px) {
            .veiwallbutn {
                float: inherit !important;
                margin: auto;
                display: block;
                font-size: 12px !important;
            }

            .fl-header-phone-contain a {
                padding: 2px 10px;
                font-size: 12px;
            }

            .category-text {
                padding-bottom: 10px;
            }

            .input-group-addon.btn-main {
                padding: 10px;
            }

            .input-group input {
                padding: 10px;
            }

            .card__box h2 {
                min-height: 50px;
            }

        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="main"
        style="background-image: url('{{ asset('images/herosection-image.webp') }}'); 
               background-size: auto; 
               background-repeat: no-repeat;
               ">
        {{-- <div class="search-bar" style="position: absolute">moiz</div> --}}
        <div class="absolute-center " style=" background-color: rgba(0, 0, 0, 0.5); ">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 flex_ banner">
                            <div class=" col-sm-12  col-md-12 ospadop banner-text">
                                <h5 class="text-center text-white">Every review has a significant experience that goes
                                    with it.
                                </h5>
                                <p style="color: #fff; margin-bottom: 10px; font-weight: 600; text-align:center;">
                                    Get the finest services based on reviews.</p>
                                <form action="{{ route('all.companies') }}" method="GET">
                                    @csrf
                                    <div class="form-parent">
                                        <div class="childs">
                                            <input type="text" name="company_search" class="childs-inp"
                                                id="search" placeholder="Find by Company name here.."
                                                aria-describedby="basic-addon2">
                                        </div>
                                        <div class="childs">
                                            <input type="text" name="location_search" class="childs-inp"
                                                placeholder="Find by Location here.." aria-describedby="basic-addon2">
                                        </div>
                                        {{-- <input type="text" name="search"
                                            class=" typeahead form-control search-input" id="search"
                                            placeholder="Find Category here.." aria-describedby="basic-addon2"> --}}

                                        <div class="dropdown2">
                                            <div class="dropdown-toggle2" onclick="toggleDropdown2()">Select Category ▼
                                            </div>
                                            <ul class="dropdown-menu2" id="dropdownMenu2">
                                                @foreach ($categories as $category)
                                                    <li onclick="selectItem(this)" data-value="{{ $category->id }}">
                                                        {{ $category->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <input type="hidden" id="categoryId_dropdown" name="category_search_dropdown">

                                        <div id="SearchResults" class="custom-search-results">
                                        </div>
                                        <button type="submit"
                                            class="input-group-addon btn-main window-screen-search-btn">
                                            <img src="{{ asset('images/search.webp') }} " alt="search" class="img">
                                        </button>

                                        <div class="submit-btn-parent">
                                            <button type="submit" class="submit-btn">
                                                <span>Search </span>
                                                {{-- <img src="{{ asset('images/search.webp') }} " alt="search"
                                                    class="img"> --}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                {{-- <div class="input-group">
                                             <input type="search" name="search" class="form-control search-input" id="search" placeholder="Find Companies here.." aria-describedby="basic-addon2">
                                             <div id="SearchResults" class="custom-search-results">
                                   
                                             </div>
                                             <button class="input-group-addon btn-main">
                                                  <img src="{{ asset('images/search.png') }} " alt="search" class="img-fluid"> </button>
                                           </div> --}}
                                {{-- <div class="card__box_1">
                                    <div class="card__box_">
                                        <img src="{{ asset('images/logo/1.svg') }}" alt="">
                                    </div>
                                    <div class="card__box_">
                                        <img src="{{ asset('images/logo/2.svg') }}" alt="">
                                    </div>
                                    <div class="card__box_">
                                        <img src="{{ asset('images/logo/3.svg') }}" alt="">
                                    </div>
                                    <div class="card__box_">
                                        <img src="{{ asset('images/logo/4.svg') }}" alt="">
                                    </div> --}}
                            </div>


                        </div>
                        {{-- <div class="col-lg-6 col-sm-12 col-md-12 banner-img">
                               <img src="{{ asset('images/image001.webp') }}" alt="">
                               </div> --}}
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
    <div class=""
        style="padding:40px 0; position:relative; background-image: url('{{ asset('images/bg-elements.webp') }}');">

        <div class="container">
            {{-- <div class="d-flex justify-content-between category-text">
          <h5 class="text-sm-h5 search-text ">CHECK UP ON CATEGORIES</h5>
          <div class="fl-header-phone-contain" style="height:fit-content">
            <a class="fl-header-phone" href="{{ route('view.all.categories') }}">View all</a>
          </div>
          </div> --}}
            <div class="row category-text">
                <div class="col-md-6 col-sm-6 col-7">
                    <h5 class="text-sm-h5 veiwallbutn search-text ">CHECK UP ON CATEGORIES</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-5">
                    <div class="fl-header-phone-contain veiwallbutn float-right " style="height:fit-content">
                        <a class="fl-header-phone" href="{{ route('view.all.categories') }}">View all</a>
                    </div>
                </div>
            </div>
            <div class="left__btn section4__btnleft">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="right__btn section4__btnright">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="all4 owl-carousel owl-theme">
                @if (isset($category1[0]))
                    @foreach ($category1 as $category)
                        <div class="item2">
                            <div class="card__box cate_info mb-3">
                                <a href="{{ url('company_search_by_cate_id/' . $category->id) }}" class="hvr-pop">
                                    <div>
                                        <img src="{{ asset('storage/categoryImage/' . $category->image) }}"
                                            alt="" class="caroselimage"
                                            style="max-width: 100%; /* height: auto; */ object-fit: cover;">
                                    </div>
                                    <div class="card__box--txt">
                                        <input class='cate_id' type="hidden" name="category_id"
                                            value="{{ $category->id }}">
                                        <h2>{{ $category->name }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if (isset($category2[0]))
                    @foreach ($category2 as $category)
                        <div class="item">
                            <div class="card__box cate_info mb-3">
                                <a href='#' class="hvr-pop">
                                    <div>
                                        <img src="{{ asset('storage/categoryImage/' . $category->image) }}"
                                            alt=""
                                            style="height: 300px; max-width: 100%; /* height: auto; */ object-fit: cover;">
                                    </div>
                                    <div class="card__box--txt">
                                        <input class='cate_id' type="hidden" name="category_id"
                                            value="{{ $category->id }}">
                                        <h2>{{ $category->name }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>

    <div style="width: 100% ; background-color: #d3ebf8 ; padding-top: 30px">
        <h1 class="recent-reviews-heading">Read All the Recent User Reviews</h1>
        <div class="main-div">

            <div>
                <div>
                    <div class="image-parent"><img src="{{ asset('images/user.jpg') }} " alt=""></div>

                    <h3><span style="font-size: medium">From </span>Jamshaid</h3>

                    <div class="text-warning" style="  font-size:25px">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <h3><span style="font-size: medium">To </span>Moiz</h3>

                    <div class="content-box">
                        <div style="padding: 4px 0px ; font-weight: 700;  color:#000;">
                            <div>Ship A1</div>
                            {{-- <div>14-feb-2025</div> --}}
                        </div>
                        <p class="scrollingText"  style="">
                            
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis
                                optio,
                                voluptates fugiat suscipit velit sunt non qui consequatur odio ratione similique earum
                                id sed ullam
                                voluptates fugiat suscipit velit sunt non qui consequatur odio ratione similique earum
                                id sed ullam
                                voluptates fugiat suscipit velit sunt non qui consequatur odio ratione similique earum
                                id sed ullam
                                sit, repellat magni.
                        </p>
                    </div>
                    <div class="card-date-box">
                        <div>14-feb-2025</div>
                        <a href=""><i class="fa-solid fa-share"></i></a>
                    </div>

                </div>
            </div>


            <div>
                <div>
                    <div class="image-parent"><img src="{{ asset('images/user.jpg') }} " alt=""></div>

                    <h3><span style="font-size: medium">From </span>Jamshaid</h3>

                    <div class="text-warning"  style="  font-size:25px">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <h3><span style="font-size: medium">To </span>Moiz</h3>

                    <div class="content-box">
                        <div style="padding: 4px 0px ; font-weight: 700; color:#000;">
                            <div>Day Dispatch</div>
                        </div>
                        <p  class="scrollingText" style="">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis optio,
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis optio,
                            voluptates fugiat suscipit velit sunt non qui consequatur odio ratione similique earum id
                            sed ullam
                            sit, repellat magni.
                        </p>
                    </div>

                    <div class="card-date-box">
                        <div>14-feb-2025</div>
                        <a href=""><i class="fa-solid fa-share"></i></a>
                    </div>

                </div>
            </div>


            <div>
                <div>
                    <div class="image-parent"><img src="{{ asset('images/user.jpg') }} " alt=""></div>

                    <h3><span style="font-size: medium">From </span>Jamshaid</h3>

                    <div class="text-warning" style="  font-size:25px">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <h3><span style="font-size: medium">To </span>Moiz</h3>

                    <div class="content-box">
                        <div style="padding: 4px 0px ; font-weight: 700; color:#000; ">
                            <div> All State To State Auto Transport</div>
                            {{-- <div>14-feb-2025</div> --}}
                        </div>
                        <p  class="scrollingText" style="">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis optio,
                            voluptates fugiat suscipit velit sunt non qui consequatur odio ratione similique earum id
                            sed ullam
                            sit, repellat magni.
                        </p>
                    </div>
                    <div class="card-date-box">
                        <div>14-feb-2025</div>
                        <a href=""><i class="fa-solid fa-share"></i></a>
                    </div>

                </div>
            </div>


            <div>
                <div>
                    <div class="image-parent"><img src="{{ asset('images/user.jpg') }} " alt=""></div>

                    <h3><span style="font-size: medium">From </span>Jamshaid</h3>

                    <div class="text-warning" id="scrollingText" style="  font-size:25px">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <h3><span style="font-size: medium">To </span>Moiz</h3>

                    <div class="content-box">
                        <div style="padding: 4px 0px ; font-weight: 700; color:#000; ">
                            <div> All State To State Auto Transport</div>
                            {{-- <div>14-feb-2025</div> --}}
                        </div>
                        <p  class="scrollingText" style="">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi ratione dignissimos quos sunt
                             excepturi
                        </p>
                    </div>
                    <div class="card-date-box">
                        <div>14-feb-2025</div>
                        <a href=""><i class="fa-solid fa-share"></i></a>
                    </div>
                </div>
            </div>


            <div>
                <div>
                    <div class="image-parent"><img src="{{ asset('images/user.jpg') }} " alt=""></div>

                    <h3><span style="font-size: medium">From </span>Jamshaid</h3>

                    <div class="text-warning" id="scrollingText" style="  font-size:25px">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <h3><span style="font-size: medium">To </span>Moiz</h3>

                    <div class="content-box">
                        <div style="padding: 4px 0px ; font-weight: 700; color:#000; ">
                            <div> All State To State Auto Transport</div>
                            {{-- <div>14-feb-2025</div> --}}
                        </div>
                        <p  class="scrollingText" style="">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis optio,
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis optio,
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis optio,
                            voluptates fugiat suscipit velit sunt non qui consequatur odio ratione similique earum id
                            sed ullam
                            sit, repellat magni.
                        </p>
                    </div>
                    <div class="card-date-box">
                        <div>14-feb-2025</div>
                        <a href=""><i class="fa-solid fa-share"></i></a>
                    </div>

                </div>
            </div>


            <div>
                <div>
                    <div class="image-parent"><img src="{{ asset('images/user.jpg') }} " alt=""></div>

                    <h3><span style="font-size: medium">From </span>Jamshaid</h3>

                    <div class="text-warning" style="  font-size:25px">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <h3><span style="font-size: medium">To </span>Moiz</h3>

                    <div class="content-box">
                        <div style="padding: 4px 0px ; font-weight: 700; color:#000; ">
                            <div> All State To State Auto Transport</div>
                            {{-- <div>14-feb-2025</div> --}}
                        </div>
                        <p  class="scrollingText">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis optio,
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis optio,
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur possimus corporis optio,
                            voluptates fugiat suscipit velit sunt non qui consequatur odio ratione similique earum id
                            sed ullam
                            sit, repellat magni.
                        </p>
                    </div>
                    <div class="card-date-box">
                        <div>14-feb-2025</div>
                        <a href=""><i class="fa-solid fa-share"></i></a>
                    </div>

                </div>
            </div>


        </div>
    </div>

    {{-- <div class="vertical__padding">
        <div class="container">
            <h5 class="text-sm-h5 search-text pt-5">Read All the Recent User Reviews</h5>
            <div class="row">
                <div class="grid grid_3 my-5" id="cardloop">

                    @foreach ($latestReview as $review)
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex testimonials">

                                    <div class="companies-logo user-img">
                                        @if ($review['get_customer']['image'] != '')
                                            <img src="{{ asset('storage/userProfile/' . $review['get_customer']['image']) }}"
                                                alt="image">
                                        @else
                                            <img src="{{ asset('images/profile-image.webp') }}" alt="">
                                        @endif
                                    </div>
                                    <div>
                                        <div class="star-rate d-flex flex-column">
                                            <div class="rate">


                                                @for ($i = 1; $i <= $review['rating']; $i++)
                                                    <i class="rating__ fas fa-star"></i>
                                                @endfor

                                                @for ($j = $review['rating'] + 1; $j <= 5; $j++)
                                                    <i class="rating__ far fa-star"></i>
                                                @endfor
                                            </div>
                                            <span class="text-center"> {{ $review['rating'] }}/5.0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="site-main">
                                    <h5 class="review-title">{{ $review['title'] }}</h5>
                                    <div class="review-author">
                                        <span class="author-from">from</span>
                                        <span>{{ isset($review['get_customer']['first_name']) ? $review['get_customer']['first_name'] : '' }}</span>

                                    </div>
                                    <div class="review-author">
                                        <span class="author-from">to</span>
                                        <a href="{{ route('company.show', $review['get_business']['id']) }}">
                                            {{ isset($review['get_business']['comp_name']) ? $review['get_business']['comp_name'] : '' }}
                                        </a>

                                    </div>
                                    <div class="review-author">
                                        <span class="author-from">Date</span>
                                        <span>{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>

                                    </div>
                                    <span
                                        class="review-text">{{ \Illuminate\Support\Str::words($review['review'], 25) }}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
    <div class="review-section" style=" background-image: url('{{ asset('images/bg-elements.webp') }}');">
        <div class="about_us container">
            <div class="row">
                <div class="col-12">
                    <h5 class="search-text">Find the Companies By Names</h5>
                    <form action="{{ route('all.companies') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class=" typeahead form-control search-input"
                                id="search" placeholder="Find Companies here.." aria-describedby="basic-addon2">
                            <div id="SearchResults" class="custom-search-results">
                            </div>
                            <button type="submit" class="input-group-addon btn-main">
                                <img src="{{ asset('images/search.webp') }} " alt="search" class="img-fluid">
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="grid grid_3 my-5 indexReview my-4">
                @foreach ($companies as $company)
                    <a href="{{ route('company.show', $company->id) }}">
                        <input type="hidden" name="comp_id" value="{{ $company->id }}">
                        <div class="card">
                            <div class="card-body flex_ gap-30">
                                <div class="companies-logo">
                                    @if ($company->image != null)
                                        <img src="{{ asset('storage/companyLogo/' . $company->image) }}"
                                            alt="image">
                                    @else
                                        <img src="{{ asset('images/profile-image.webp') }}" alt="">
                                    @endif
                                </div>
                                <div>
                                    <p class="card-text">{{ $company->comp_name }}</p>
                                    <div class="rate float-left">
                                        @php
                                            $stars = isset($company->avg_avg_rating) ? $company->avg_avg_rating : 0;
                                        @endphp
                                        @for ($i = 1; $i <= $stars; $i++)
                                            <i class="rating__ fas fa-star"></i>
                                        @endfor

                                        @for ($j = $stars + 1; $j <= 5; $j++)
                                            <i class="rating__ far fa-star"></i>
                                        @endfor

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <!--{{-- All Review Section --}}-->
    <div class="container">
        <div class="my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h5 class="search-text top-company">Top Reviewed Companies</h5>
                    </div>
                </div>
            </div>
            <div class="bio-info">
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table style="white-space:nowrap" class=" top-companies table-striped w-100">
                            <thead>
                                <tr>
                                    <th>Business</th>
                                    <th>Rating</th>

                                    <th>Website</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($top_rated_companies)
                                    @foreach ($top_rated_companies as $items)
                                        <tr>
                                            <td>
                                                <div>
                                                    @if ($items['get_business']['image'] != null)
                                                        <img src="{{ asset('storage/companyLogo/' . $items['get_business']['image']) }}"
                                                            alt="image" width="45" height="45"
                                                            class="attachment-gazek_size_170x170_crop size-gazek_size_170x170_crop"
                                                            loading="lazy">
                                                </div>
                                            @else
                                                <div>
                                                    <img width="45" height="45"
                                                        src="//gazek.templines.org/wp-content/uploads/2021/03/brokers1.png"
                                                        class="attachment-gazek_size_170x170_crop size-gazek_size_170x170_crop"
                                                        alt="" loading="lazy">
                                                </div>
                                    @endif
                                    </td>
                                    <td>
                                        <div class="rate">
                                            @php
                                                $stars = isset($items['totalRating']) ? $items['totalRating'] : 0;
                                            @endphp
                                            @for ($i = 1; $i <= $stars; $i++)
                                                <i class="rating__ fas fa-star"></i>
                                            @endfor

                                            @for ($j = $stars + 1; $j <= 5; $j++)
                                                <i class="rating__ far fa-star"></i>
                                            @endfor
                                        </div>
                                    </td>

                                    <td><a href="{{ isset($items['get_business']['website']) ? $items['get_business']['website'] : '' }}"
                                            target="_blank">{{ isset($items['get_business']['website']) ? $items['get_business']['website'] : '' }}</a>
                                    </td>
                                    <td>
                                        <div>
                                            <a class="btn-broker1"
                                                href="{{ route('company.show', $items['comp_id']) }}">Review</a>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')




    <!-- Link to page -->
    @include('layouts.foot')
    <script defer>
        var path_company_name = "{{ route('searchAllCompanies') }}";
        $(document).ready(function() {
            $('#search').typeahead({
                source: function(query, process) {
                    return $.get(path_company_name, {
                        query: query
                    }, function(data) {
                        return process(data);
                    });
                }
            });
            $('#search-location').typeahead({
                source: function(query2, process2) {
                    return $.get(path_location, {
                        query2: query2
                    }, function(data2) {
                        return process2(data2);
                    });
                }
            });
            $('.all4').owlCarousel({
                loop: true,
                navigation: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                items: 12,
                mousewheel: false,
                dots: true,
                slideBy: 1,
                responsiveClass: true,
                repeatation: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    200: {
                        items: 1,
                        nav: false

                    },
                    300: {
                        items: 1,
                        nav: false

                    },
                    400: {
                        items: 2,
                        nav: false

                    },
                    700: {
                        items: 4,
                        nav: false
                    },
                    900: {
                        items: 3,
                        nav: false

                    },
                    1000: {
                        items: 4,
                        nav: false,
                        loop: true
                    }
                }

            });
            $(".section4__btnright").click(function() {
                var owl = $(".all4");
                owl.trigger('next.owl.carousel');
            });
            $(".section4__btnleft").click(function() {
                var owl = $(".all4");
                owl.trigger('prev.owl.carousel');
            });
            $(".cate_info").click(function() {
                var cate_id = $(this).children('a').children('div').children('.cate_id').val();
                $.ajax({
                    url: "{{ route('all.companies') }}",
                    type: "GET",
                    data: {
                        category_id: cate_id
                    },
                    success: function(data) {
                        $('html').html('');
                        $('html').html(data);

                    }

                });
            });
        });
    </script>
    {{-- // custom dropdown javascript //  --}}
    <script>
        function toggleDropdown2() {
            document.getElementById("dropdownMenu2").classList.toggle("show2");
        }

        function selectItem(element) {
            let dropdownMenu2 = document.getElementById("dropdownMenu2");
            dropdownMenu2.prepend(element);
            document.querySelector(".dropdown-toggle2").innerText = element.innerText + " ▼";
            dropdownMenu2.classList.remove("show2");
            const selectedCategoryId = element.getAttribute('data-value');
            document.getElementById('categoryId_dropdown').value = selectedCategoryId;
        }

        // Close dropdown if clicked outside
        document.addEventListener("click", function(event) {
            let dropdown2 = document.querySelector(".dropdown2");
            if (!dropdown2.contains(event.target)) {
                document.getElementById("dropdownMenu2").classList.remove("show2");
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
    let paragraphs = document.querySelectorAll(".scrollingText"); // Select all elements with class

    paragraphs.forEach((p) => {
        let scrollInterval; // Store interval per element

        function checkOverflow() {
            if (p.scrollHeight > p.clientHeight) {
                p.classList.add("scrolling"); // Enable scrolling
                startAutoScroll();
            } else {
                p.classList.remove("scrolling"); // Disable scrolling if no overflow
                p.scrollTop = 0; // Reset scroll position
                clearInterval(scrollInterval); // Stop scrolling
            }
        }

        function startAutoScroll() {
            clearInterval(scrollInterval); // Prevent multiple intervals

            let scrollSpeed = 1; // Adjust speed
            scrollInterval = setInterval(function () {
                if (p.scrollTop < p.scrollHeight - p.clientHeight) {
                    p.scrollTop += scrollSpeed; // Scroll down gradually
                } else {
                    p.scrollTop = 0; // Reset scroll to the top
                }
            }, 50); // Adjust interval for smooth scrolling
        }

        p.addEventListener("mouseover", function () {
            clearInterval(scrollInterval);
        });

        p.addEventListener("mouseleave", function () {
            startAutoScroll();
        });

        checkOverflow(); 

        window.addEventListener("resize", checkOverflow);
    });
});


    </script>
</body>

</html>
