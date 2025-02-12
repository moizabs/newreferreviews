<!DOCTYPE html>

<html lang="en">

    <head>
        <title>Refer Reviews - Profile</title>
        @include('layouts.head')
    </head>
    
    <style>
     .card-body{
        width: 100%;
    }
    .badge{
        min-width: 59px;
        font-size: 14px;
        font-family: sans-serif;
        padding: 9px;
        font-family: 'Poppins', sans-serif;
    }
    .badge-secondary{
        color: #000;
        background-color: #ffffff;
        box-shadow: 0px 0px 6px 0px #9f9f9f;
    }
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    
    div{
        font-family: poppins;
    }
        .swiper-slide img {
            width: 100%;
            height: 180px;
            object-fit: cover;
    }
        .pac-container{
                z-index: 10000 !important;
        }
        img.fl-places-logo{
            width: 130px;
    }
        .company-profile-banner{
                    
                    background-repeat: no-repeat;
                    background-size: contain;
            }
        .progress{
            height: 20px;
            border-radius:20px;
            padding:0%;
    }
        .progress .skill .val{
          float: right;
          font-style: normal;
          margin: 0 20px 0 0;
    }
        .progress-bar{
          text-align: left;
        
          border-radius:20px;
          transition-duration: 3s;
    }
    .div-color {
        background-color: #faf5f5;
    }
    </style>
    
    <body>
        <?php
            function convert($value){
                $number = $value / 1000;
                return $number . 'k';
            }
            function count_stars($stars,$comp_id){
                
                $count_star = \App\Models\Review::
                where('comp_id',$comp_id)
                ->where('rating',$stars)
                ->count();
                return $count_star;
            }
            function get_perc($total,$obtain){
                if ($total != 0) {
                    $get_percent =  round($obtain / $total * 100);
                    return $get_percent;
                }else{
                    $get_percent =  0;
                    return $get_percent;
                }
            }
            function get_status($day,$startTime,$endTime){
                $todayDay = \Carbon\Carbon::parse()->format('D');
                $todayTime = \Carbon\Carbon::parse()->format('h:i a');
                if($todayDay == $day){
                    if(strtotime($startTime) >= $todayTime && strtotime($endTime) >= $todayTime ){
                        return '0';
                    }
                }
                return '1';
            }
        ?>
    
    
        {{-- Nav Bar------------------------------------------------ --}}
        @include('layouts.navbar')
        
        {{-- End Nav Bar --}}
    
        <div class="company-profile-banner" >
            <div class="container">
                <div class="row">
                    <div class="col-12 flex_">
                        <div class="col-lg-8 col-sm-12 banner-left">
                            <div class="fl-places-logo-contain">
                                <span class="fl-places-logo-helper"></span>
                                @if ($company->image != null)
                                    <img class="fl-places-logo" src="{{ asset('storage/companyLogo/'.$company->image) }}" alt="image">
                                @else
                                    {{-- <img src="{{ asset('images/avatar.png') }}" alt="image"> --}}
                                    <img class="fl-places-logo" alt="hotel_logo-1"
                                        src = "{{ asset('images/profile-image.jpg') }}"
                                        <!--src="//gazek.templines.org/wp-content/uploads/2020/06/hotel_logo-1.jpg"-->
                                        
                                @endif
                            </div>
                            <div class="fl-places-title-contain">
                                <span class="fl-places-subtitle">{{ $company->name }}</span>
    
                                <span class="fl-places-title">{{ $company->comp_name }}</span>
    
                                {{-- <span  class="fl-places-show"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ company->address }}+'.'"{{ company->city }}+','+{{ company->state }}</span> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 banner-right">
                            <div class="d-flex justify-content-between align-center">
                                <div class="star-rate d-flex flex-column">
                                    <div class="totalrating">
    
                                        {{-- Haseeb --}}
                                        @for ($i = 1; $i <= $total; $i++)
                                            <i class="rating__ fas fa-star"></i>
                                        @endfor
    
                                        @for ($j = $total + 1; $j <= 5; $j++)
                                            <i class="rating__ far fa-star"></i>
                                        @endfor
                                        {{-- <i class="rating__ fas fa-star"></i>
    
                                       <i class="rating__ fas fa-star"></i>
                                        <i class="rating__ fas fa-star"></i>
                                        <i class="rating__ fas fa-star"></i>
                                        <i class="rating__ fas fa-star"></i> --}}
                                    </div>
    
    
                                    <span class="totalaverage">Rating {{ $total }}/5.0</span>
    
    
                                </div>
    
                            </div>
    
                            <span class="fl-average">{{ $total }}</span>
    
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <div class="container">
            <div class="d-flex gap-30">
                @if(Session::has('user'))
                    @if (Session::get('user')['type'] === 'USER')
                        <div style="cursor:pointer;" class="Review-write mt-4 mb-4" data-toggle="modal" @if($hasReview) data-target="#exampleModalLong1" @else data-target="#exampleModalLong" @endif> 
                            <a class="fl-header-phone"><i class="fa-solid fa-star"></i>Write A Review</a> 
                        </div> 
                    @endif
                @endif
            </div>
            <div class="row">
                <div class="col-12 flex_ d-flex">
    
                    <div class="col-lg-8 col-sm-12">
    
                        {{-- Carousel --}}
                        <div id="carousel" class="carousel slide my-5" data-ride="carousel">
                            <div class="">
                                     <div class="swiper mySwiper">
                                     <div class="swiper-wrapper">
                                        @foreach($comp_image as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/companyImages/' .$image->images) }}" alt="comany image">
                                            </div> 
                                        @endforeach
                                    </div>
                                     </div>
                                  
                              
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <div class="card div-color">
                                  <div class="card-body">
                                    <h5 class="card-title">About Business</h5>
                                    <p class="card-text">{{ $company->message }}</p>
                                   
                                  </div>
                            </div>
                        </div>
                        <div class="search-contain div-color">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 flex_">
                                        <div class="col-4 breadcrumbs">
                                            <h5>Filter reviews</h5>
                                        </div>
                                        <div class="col-8 search-form">
                                            <form id="searchform" action="" method="get">
                                                {{-- <div class="form-group">
                                                    <input class="inlineSearch" type="text" value="" name=""
                                                        placeholder="Search Reviews">
                                                    <button class="inlineSubmit" type="submit"><i class="fa fa-search"
                                                            aria-hidden="true"></i></button>
    
                                                </div> --}}
                                                <div class="form-group">
                                                    <input type="hidden" class="id"
                                                        value="{{ $company->id }}">
                                                    <select id="star_filter" name="star_filter" class="inlineSearch">
                                                        <option value="" selected="selected">All</option>
                                                        <option value="5" >Excellent</option>
                                                        <option value="4">Good</option>
                                                        <option value="3">Average</option>
                                                        <option value="2">Bad</option>
                                                        <option value="1">Poor</option>
                                                    </select>
                                                </div>
    
                                            </form>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        <div class="search-contain div-color">
                            <div class="container">
                            <div class="row">
                <div class="col-md-12 col-md-offset-3">
            <!-- Skill Bars -->
            <div class="row">
                    <span class="col-lg-2">5 Stars</span>
                <div class="progress skill-bar col-lg-8">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(5,$company->id)) }}" aria-valuemin="0" aria-valuemax="100">
                        
                    </div>
                </div>
                <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(5,$company->id)) }}%</span>
                </div>
                    <div class="row">
               <span class="col-lg-2">4 Stars</span>     
                <div class="progress skill-bar col-lg-8">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(4,$company->id)) }}" aria-valuemin="0" aria-valuemax="100" >
                        
                    </div>
                </div>
                 <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(4,$company->id)) }}%</span>
                </div>
                <div class="row">
                    <span class="col-lg-2">3 Stars</span>
                <div class="progress skill-bar col-lg-8">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(3,$company->id)) }}" aria-valuemin="0" aria-valuemax="100">    
                    </div>
                </div>  
                 <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(3,$company->id)) }}%</span>
                </div>
                <div class="row">
                    <span class="col-lg-2">2 Stars</span>
                <div class="progress skill-bar col-lg-8">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(2,$company->id)) }}" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>  
                 <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(2,$company->id)) }}%</span>
                </div>
                <div class="row">
                    <span class="col-lg-2">1 Stars</span>
                <div class="progress skill-bar col-lg-8">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(1,$company->id)) }}" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>  
                 <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(1,$company->id)) }}%</span>
                </div>
                
                   
      </div>
    </div> 
    </div>
    </div>  
                        <div class="timeline" id="timeline">
                            @foreach ($reviews as $review)
                                <t>
                                    <div class="my-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="heading">
                                                    <img src="{{ asset('images/threedot.png') }}" />
    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bio-info">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="bio-image">
                                                                @if ($review['get_customer']['image'] != null)
                                                                    <img src="{{ asset('storage/userProfile/' . $review['get_customer']['image']) }}"
                                                                        alt="image">
                                                                @else
                                                                    <img src="{{ asset('images/profile-image.jpg') }}"
                                                                        alt="image" />
                                                                @endif
    
                                                                <span>{{ $review['get_customer']['first_name'] }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bio-content">
                                                        <div class="d-flex justify-content-between align-center">
                                                            <div class="star-rate d-flex flex-column">
                                                                <div class="rate">
                                                                    @php
                                                                        $stars = number_format($review['rating']);
                                                                       
                                                                    @endphp
    
                                                                    @for ($i = 1; $i <= $stars; $i++)
                                                                        <i class="rating__ fas fa-star"></i>
                                                                    @endfor
    
                                                                    @for ($j = $stars + 1; $j <= 5; $j++)
                                                                        <i class="rating__ far fa-star"></i>
                                                                    @endfor
                                                                    {{-- <i class="rating__ fas fa-star"></i>
    
                                                                <i class="rating__ far fa-star"></i>
                                                                <i class="rating__ far fa-star"></i>
                                                                <i class="rating__ far fa-star"></i>
                                                                <i class="rating__ far fa-star"></i> --}}
    
    
                                                                </div>
                                                                <span class="">Rating
                                                                    {{ $stars }}/5.0</span>
    
                                                            </div>
                                                            <span class="comment--time fl-text-regular-style">
                                                                <span class="fl-link-comment">
                                                                    <span class="fl-comment-date-text">Review Published:
                                                                    </span>
                                                                    <span
                                                                        class="fl-comment-date">{{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="my-4">{{ $review['title'] }}</h5>
                                                            <h6>{{ $review['review'] }}</h6>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                           
                                                        <!--     <div class="d-flex gap-20 justify-content-end">-->
    
                                                        <!--        @if ($review['like'] == 0)-->
                                                        <!--        <div class="like-wrap">-->
                                                        <!--            <a href="{{ route('user.likeReview',$review['id']) }}"><i class="fa-solid fa-thumbs-up"></i></a>-->
                                                                    
                                                        <!--        </div>-->
    
                                                        <!--        @else-->
                                                        <!--        <div class="like-wrap">-->
                                                        <!--            <a href="{{ route('user.likeReview',$review['id']) }}"><i class="fa-solid fa-thumbs-down"></i></a>-->
                                                        <!--        </div>-->
                                                        <!--        @endif-->
    
                                                        <!--</div>-->
                                                           
                                                        </div>
                                                       
                                                       @if (!$review['reply'] == null && !$review['reply'] == '')
                                                            <div class="replies">
                                                                <div>
                                                                    <div class="comment-heading">
                                                                        <i class="fa-solid fa-reply" style=" transform: rotate(180deg);"></i>
                                                                        <div class="comment-info">
                                                                            <a href="#"
                                                                                class="comment-author">{{ Session::get('user')['comp_name'] }}</a>
                                                                                <span>{{ \Carbon\Carbon::parse($review['updated_at'])->format('m/d/Y') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-body">
                                                                    <p>
                                                                        {{ $review['reply'] }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </t>
                            @endforeach
    
                        </div>
                        <div class="d-flex gap-20 my-2 align-center justify-content-center">
                            @if (count($reviews) > 3)
                                <div id="loadMoreprodDiv" class="fl-header-phone-contain">
                                    <a class='loadMore fl-header-phone'>View More Details</a>
                                </div>
                            @endif
                            <div id="showlessprodDiv" class="fl-header-phone-contain ">
                                <a class='showLess fl-header-phone'>View Less Details</a>
                            </div>
                        </div>
    
    
    
                    </div>
               
                <div class="col-lg-4 col-sm-12">
                    <div class="card" style="margin-top: 96px; width: 100%; text-align:left; background-color:#faf5f5 ">
                        @if(!empty($company->company_hours))
                                  <div class="card-body" >
                                    <h5 class="card-title">Business Hours</h5>
                                    @foreach($company->company_hours as $item)
                                        @php
                                            $opstatus = get_status($item->weekday,$item->start_time,$item->end_time);
                                        @endphp
                                            @if($item->status == 'Open')
                                                <h5>
                                                    
                                                    @if($opstatus == '0')
                                                        <span class="badge badge-success">{{ $item->weekday}} :</span>
                                                        <span>
                                                            
                                                        <span class="badge badge-success">{{ $item->start_time}} To {{ $item->end_time}}
                                                        </span>
                                                            <span class="badge badge-success">({{$item->status}})</span>
                                                        </span>
                                                        
                                                    @else
                                                        <span class="badge badge-secondary">{{ $item->weekday}} :</span>
                                                        <span class="badge badge-secondary">{{ $item->start_time}} To {{ $item->end_time}}</span>
                                                    @endif
                                                        
                                                   
                                                </h5>
                                            @else
                                                <h5>
                                                    <span class="badge badge-danger">{{ $item->weekday}} :</span> 
                                                    <span class="badge badge-danger">(Closed)</span>
                                                    
                                                </h5>
                                            @endif
                                    @endforeach
    
                                  </div>
                        @endif
                        <div class="card my-5 div-color" id="sticker">
        
                            <div class="card-body">
                                <div class="testimonials1">
                                   <div class="mapouter"><div class="gmap_canvas">
                                            <iframe class="gmap_iframe" style="width: 400px !important;height: 300px !important;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                                                src="https://maps.google.com/maps?width=300&amp;height=300&amp;hl=en&amp;q={{ $company->address.','.$company->state.','.$company->city }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                                
                                            </iframe>
                                            </div>
                                            <style>.mapouter{position:relative;text-align:right;}.gmap_canvas {overflow:hidden;background:none!important;}.gmap_iframe {width:600px!important;height:400px!important;}</style></div>
                                    <div>
        
        
                                        <div class="testimonials">
                                            @if(Session::has('user'))
                                                @if (Session::get('user')['type'] == 'USER')
                                                    <div class="company-address d-flex flex-column my-4">
                                                        <span class="head">Address:</span>
                                                        <span class="cont">{{ $company->address.','.$company->state.','.$company->city }}</span>
                                                    </div>
                                                    <div class="company-address d-flex flex-column my-4">
                                                        <span class="head company-website">Website:</span>
                                                        <span class="cont">{{ $company->website }}</span>
                                                    </div>
                                                @else
                                                    <div class="company-address d-flex flex-column my-4">
                                                        <span class="head company-email">Email:</span>
                                                        <span class="cont">{{ $company->email }}</span>
                                                    </div>
                                                    <div class="company-address d-flex flex-column my-4">
                                                        <span class="head company-phone">Phone:</span>
                                                        <span class="cont"> {{ $company->phone }}</span>
                                                    </div>
            
                                                @endif
                                            @endif
                                            @if(Session::has('user'))
                                                @if(Session::get('user')['type'] == 'USER')
                                                <div class="fl-header-phone-contain" data-toggle="modal"
                                                    data-target="#Request-Price" style="cursor:pointer;">
                                                    <a class="fl-header-phone">Request Price</a>
                                                </div>
                                                @endif
                                            @endif
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
        </div>
        
        @include('layouts.footer')
        
        <!-- model add review -->
    
        <!-- Modal -->
        
        @if(!isset($hasReview))
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLong" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--<form action="{{ route('review.add') }}" method="POST">-->
                            <!--@csrf-->
                        <form action="#" >
                             <!--@csrf-->
                            <div class="form-group">
                                <div class="rating">
    
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                    <i class="rating__star far fa-star"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="rating mb-4">
                                    <span class="rating__result"></span>
                                    <input class="rateStar" id='rating' name="rating" type="hidden" value="0">
                                </div>
                            </div>
    
                            <div class="form-group">
    
                               
                                <input type="hidden" id="comp_id" name="comp_id" value="{{ $company->id }}">
                                <input type="hidden" id="reviewId" name="reviewId" value="0">
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Enter title">
    
                            </div>
                            <div class="form-group">
    
                                <input type="text" class="form-control"
                                    value="{{ Session::get('user')['first_name'] }}" id="name" class="form-control"
                                    id="name" placeholder="Enter your Name">
                            </div>
                            <div class="form-group">
    
                                <input type="email" name="email" value="{{ Session::get('user')['email'] }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Enter email">
    
                            </div>
    
                            <div class="form-group">
    
                                <textarea class="form-control" name="review" id="review" rows="3" placeholder="Enter your review"></textarea>
                            </div>
    
                            <div class="fl-header-phone-contain my-2">
                                <button  type="button" class="fl-header-phone reviewBtn">Submit</button>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
    </div>
        @endif
        @if(isset($hasReview))
            <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLong1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--<form action="{{ route('review.add') }}" method="POST">-->
                            <!--@csrf-->
                        <form action="#" >
                             <!--@csrf-->
                            <div class="form-group">
                                <div class="rating">
                                    
                                    @php
                                        $stars = number_format($hasReview->rating);
                                       
                                    @endphp
    
                                    @for ($i = 1; $i <= $stars; $i++)
                                        <i class="rating__star fas fa-star"></i>
                                    @endfor
    
                                    @for ($j = $stars + 1; $j <= 5; $j++)
                                        <i class="rating__star far fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="rating mb-4">
                                    <span class="rating__result">Rating
                                        {{ $stars }}/5.0</span>
                                    <input class="rateStar" id='rating' name="rating" type="hidden" value="{{$stars}}">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <input type="hidden" id="comp_id" name="comp_id" value="{{ $hasReview->comp_id }}">
                                <input type="hidden" id="reviewId" name="reviewId" value="{{ $hasReview->id }}">
                                <input type="text" class="form-control" name="title" id="title" value="{{$hasReview->title}}"
                                    placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    value="{{ Session::get('user')['first_name'] }}" id="name" class="form-control"
                                    id="name" placeholder="Enter your Name">
                            </div>
                            <div class="form-group">
    
                                <input type="email" name="email" value="{{ Session::get('user')['email'] }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Enter email">
    
                            </div>
    
                            <div class="form-group">
    
                                <textarea class="form-control" name="review" id="review" rows="3" placeholder="Enter your review">{{$hasReview->review}}</textarea>
                            </div>
    
                            <div class="fl-header-phone-contain my-2">
                                <button  type="button" class="fl-header-phone reviewBtn">Submit</button>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
    </div>
        @endif
        
        <!-- Request Price Model -->
    
        <div class="modal fade" id="Request-Price" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 567px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Request Price</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                    <div class="alert alert-danger" style="display:none"></div>
                        <form id ='requestPriceSubmit' action="#">
                            @csrf
                            <input type="hidden" id="user_id" name="user_id" value="{{ Session::get('user')['id'] }}">
                            <input type="hidden" id="comp_id" name="comp_id" value="{{ $company->id }}">
                            
                            <!--<div class="form-group">-->
                            <!--    <label>Pickup Location <span class="text-danger">*</span></label>-->
                            <!--    <input type="text" name= 'pickup_loca' id="pickup_loca" class="form-control"-->
                            <!--        placeholder="Enter Pickup Location">-->
                            <!--</div>-->
                            <!--<div class="form-group">-->
                            <!--    <label>Delivery Location <span class="text-danger">*</span></label>-->
                            <!--    <input type="text" class="form-control" id="dilvery_loca" name= 'dilvery_loca'-->
                            <!--        placeholder="Enter Delivery Location">-->
                            <!--</div>-->
                            <!--<div class="row">-->
                            <!--    <div class="col-12">-->
                            <!--        <label>Vehicle Information <span class="text-danger">*</span></label>-->
                            <!--    </div>-->
                            <!--     <div class="col-4">-->
                            <!--        <div class="form-group">-->
                            <!--            <select name= 'veh_year' id="veh_year" class="inlineSearch chzn-select year" >-->
                            <!--                <option value="" selected = 'selected'>year</option>-->
                            <!--                <option value="2014">2014</option>-->
                            <!--                <option value="2013">2013</option>-->
                            <!--                <option value="2012">2012</option>-->
                            <!--                <option value="2011">2011</option>-->
                            <!--                <option value="2010">2010</option>-->
                            <!--                <option value="2009">2009</option>-->
                            <!--                <option value="2008">2008</option>-->
                            <!--                <option value="2007">2007</option>-->
                            <!--                <option value="2006">2006</option>-->
                            <!--                <option value="2005">2005</option>-->
                            <!--                <option value="2004">2004</option>-->
                            <!--                <option value="2003">2003</option>-->
                            <!--                <option value="2002">2002</option>-->
                            <!--                <option value="2001">2001</option>-->
                            <!--                <option value="2000">2000</option>-->
                            <!--                <option value="1999">1999</option>-->
                            <!--                <option value="1998">1998</option>-->
                            <!--                <option value="1997">1997</option>-->
                            <!--                <option value="1996">1996</option>-->
                            <!--                <option value="1995">1995</option>-->
                            <!--                <option value="1994">1994</option>-->
                            <!--                <option value="1993">1993</option>-->
                            <!--                <option value="1992">1992</option>-->
                            <!--                <option value="1991">1991</option>-->
                            <!--                <option value="1990">1990</option>-->
                            <!--            </select>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="col-4">-->
                            <!--        <div class="form-group">-->
                            <!--            <select name= 'veh_make' id="veh_make" class="inlineSearch">-->
                        
                            <!--            <option value="" selected = 'selected'>Make</option>-->
                            <!--            <option value="ACURA">ACURA</option>-->
                            <!--            <option value="ASTON MARTIN">ASTON MARTIN</option>-->
                            <!--            <option value="AUDI">AUDI</option>-->
                            <!--            <option value="BENTLEY">BENTLEY</option>-->
                            <!--            <option value="BMW">BMW</option>-->
                            <!--            <option value="BUICK">BUICK</option>-->
                            <!--            <option value="CADILLAC">CADILLAC</option>-->
                            <!--            <option value="CHEVROLET">CHEVROLET</option>-->
                            <!--            <option value="CHRYSLER">CHRYSLER</option>-->
                            <!--            <option value="DODGE">DODGE</option>-->
                            <!--            <option value="FERRARI">FERRARI</option>-->
                            <!--            <option value="FORD">FORD</option>-->
                            <!--            <option value="GMC">GMC</option>-->
                            <!--            <option value="HONDA">HONDA</option>-->
                            <!--            <option value="HUMMER">HUMMER</option>-->
                            <!--            <option value="HYUNDAI">HYUNDAI</option>-->
                            <!--            <option value="INFINITI">INFINITI</option>-->
                            <!--            <option value="ISUZU">ISUZU</option>-->
                            <!--            <option value="JAGUAR">JAGUAR</option>-->
                            <!--            <option value="JEEP">JEEP</option>-->
                            <!--            <option value="KIA">KIA</option>-->
                            <!--            <option value="LAMBORGHINI">LAMBORGHINI</option>-->
                            <!--            <option value="LAND ROVER">LAND ROVER</option>-->
                            <!--            <option value="LEXUS">LEXUS</option>-->
                            <!--            <option value="LINCOLN">LINCOLN</option>-->
                            <!--            <option value="LOTUS">LOTUS</option>-->
                            <!--            <option value="MASERATI">MASERATI</option>-->
                            <!--            <option value="MAYBACH">MAYBACH</option>-->
                            <!--            <option value="MAZDA">MAZDA</option>-->
                            <!--            <option value="MERCEDES-BENZ">MERCEDES-BENZ</option>-->
                            <!--            <option value="MERCURY">MERCURY</option>-->
                            <!--            <option value="MINI">MINI</option>-->
                            <!--            <option value="MITSUBISHI">MITSUBISHI</option>-->
                            <!--            <option value="NISSAN">NISSAN</option>-->
                            <!--            <option value="PONTIAC">PONTIAC</option>-->
                            <!--            <option value="PORSCHE">PORSCHE</option>-->
                            <!--            <option value="ROLLS-ROYCE">ROLLS-ROYCE</option>-->
                            <!--            <option value="SAAB">SAAB</option>-->
                            <!--            <option value="SATURN">SATURN</option>-->
                            <!--            <option value="SUBARU">SUBARU</option>-->
                            <!--            <option value="SUZUKI">SUZUKI</option>-->
                            <!--            <option value="TOYOTA">TOYOTA</option>-->
                            <!--            <option value="VOLKSWAGEN">VOLKSWAGEN</option>-->
                            <!--            <option value="VOLVO">VOLVO</option>-->
                            <!--            </select>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="col-4">-->
                            <!--        <div class="form-group">-->
                            <!--            <select name ='veh_model' id="veh_model" class="inlineSearch chzn-select year" >-->
                            <!--                <option value="" selected = 'selected'>Modal</option>-->
                            <!--                <option value="COMMANDER">COMMANDER</option>-->
                            <!--                <option value="COMPASS">COMPASS</option>-->
                            <!--                <option value="GRAND CHEROKEE">GRAND CHEROKEE</option>-->
                            <!--                <option value="LIBERTY">LIBERTY</option>-->
                            <!--                <option value="PATRIOT">PATRIOT</option>-->
                            <!--                <option value="WRANGLER">WRANGLER</option>-->
                            <!--                </select>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
    
                            <!--<div class="row">-->
                            <!--     <div class="col-6">-->
                            <!--        <div class="form-group">-->
                            <!--            <label>Trailor Type <span class="text-danger">*</span></label>-->
                            <!--            <select name = 'trailor_type' id="trailor_type" class="inlineSearch chzn-select">-->
                            <!--                 <option value="" selected>Select Trailor Type</option>-->
                            <!--                 <option value="1">Open</option>-->
                            <!--                 <option value="0">Enclosed</option>-->
                            <!--            </select>-->
                            <!--        </div>-->
                            <!--        </div>-->
                            <!--     <div class="col-6">-->
                            <!--        <div class="form-group">-->
                            <!--            <label>Vehicle Conditions <span class="text-danger">*</span></label>-->
                            <!--            <select name = 'veh_condition' id="veh_condition" class="inlineSearch chzn-select">-->
                            <!--                 <option value="" selected>Select Vehicle Condition</option>-->
                            <!--                 <option value="0">Running</option>-->
                            <!--                 <option value="1">Non-Running</option>-->
                            <!--            </select>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <div class="form-group">
                                <label>Message <span class="text-secondary">(optional)</span></label>
                                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter your message"></textarea>
                            </div>
    
    
    
                            <div class="fl-header-phone-contain my-3">
                                <button class="fl-header-phone" id='requestSubmit' type ='submit'>Submit</button>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
    </div>
        
    
       
        <!-- Popper JS -->
       
     
    
        @include('layouts.foot')
        
        @if(isset($hasReview))
        <script>
        
            const ratingStars1 = [...document.getElementsByClassName("rating__star")];
            const ratingResult1 = document.querySelector(".rating__result");
            var num = "{{ number_format($hasReview->rating) }}";
            printRatingResult(ratingResult1,num);
            function executeRating(stars, result) {
               const starClassActive = "rating__star fas fa-star";
               const starClassUnactive = "rating__star far fa-star";
               const starsLength = stars.length;
               let i;
               stars.map((star) => {
                  star.onclick = () => {
                     i = stars.indexOf(star);
            
                     if (star.className.indexOf(starClassUnactive) !== -1) {
                        printRatingResult(result, i + 1);
                        for (i; i >= 0; --i) stars[i].className = starClassActive;
                     } else {
                        printRatingResult(result, i);
                        for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
            			rating.textContent = `Rating: ${0}/5.0`;
                     }
                  };
               });
            }
            function printRatingResult(result, num) {
                // console.log(num);
               result.textContent = `Rating: ${num}/5.0`;
               $('.rateStar').val(num);
            }
            executeRating(ratingStars1, ratingResult1);
            
        </script>
        @endif
        
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#star_filter').change(function() {
                var option = $(this).children('option:selected').val();
                var id = $(this).siblings('.id').val();
                $.ajax({
                    url: "{{ url('/search-with-rating') }}",
                    type: "GET",
                    data: {
                        rating: option,
                        id: id
                    },
                    success: function(res) {
                        $("#timeline").html("");
                        $("#timeline").html(res);
                    }
                });
            })
            var mySwiper = new Swiper ('.mySwiper', {
              slidesPerView: 4,
              spaceBetween: 0,
              breakpoints: {  
                '@640': {
                  slidesPerView: 2,
                  spaceBetween: 0, },
              },
                // Optional parameters   
                 freeMode: true,
                loop: false,
                scrollbar: {
                    el: '.swiper-scrollbar',
                    hide: true,},
                navigation: {
                    nextEl: '.carousel-control-next',
                    prevEl: '.carousel-control-prev', },
                    })
                    
            $(document).ready(function(){
                $('#requestSubmit').click(function(e){
                   e.preventDefault();
                   $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                    var pickup_loca = $('#pickup_loca');
                    var dilvery_loca = $('#dilvery_loca');
                    var veh_year = $('#veh_year');
                    var veh_make = $('#veh_make');
                    var veh_model = $('#veh_model');
                    var trailor_type = $('#trailor_type');
                    var veh_condition = $('#veh_condition');
                    
                    pickup_loca.siblings('.text-danger').remove();
                    dilvery_loca.siblings('.text-danger').remove();
                    veh_year.siblings('.text-danger').remove();
                    veh_make.siblings('.text-danger').remove();
                    veh_model.siblings('.text-danger').remove();
                    trailor_type.siblings('.text-danger').remove();
                    veh_condition.siblings('.text-danger').remove();
                    $.ajax({
                      url: "{{ route('user.addRequestPrice') }}",
                      type:"POST",
                      data: {
                        user_id: $('#user_id').val(),
                        comp_id: $('#comp_id').val(),
                        // pickup_loca: $('#pickup_loca').val(),
                        // dilvery_loca: $('#dilvery_loca').val(),
                        // veh_year: $('#veh_year').val(),
                        // veh_make: $('#veh_make').val(),
                        // veh_model: $('#veh_model').val(),
                        // trailor_type: $('#trailor_type').val(),
                        // veh_condition: $('#veh_condition').val(),
                        message: $('#message').val()
                      },
                    
                     
                      success: function(data){
                      		// $.each(data.errors, function(key, value){
                      		// 	$('.alert-danger').show();
                      		// 	$('.alert-danger').append('<p>'+value+'</p>');
                      		// });
                      		// console.log(data);
                      		location.reload();
                     
                    	}
                        
                    });
                    if(pickup_loca.val() && dilvery_loca.val() && veh_year.val() &&  veh_make.val() &&  veh_model.val() &&  trailor_type.val() &&  veh_condition.val()){
                        $.ajax({
                          url: "{{ route('user.addRequestPrice') }}",
                          type:"POST",
                          data: {
                            user_id: $('#user_id').val(),
                            comp_id: $('#comp_id').val(),
                            pickup_loca: $('#pickup_loca').val(),
                            dilvery_loca: $('#dilvery_loca').val(),
                            veh_year: $('#veh_year').val(),
                            veh_make: $('#veh_make').val(),
                            veh_model: $('#veh_model').val(),
                            trailor_type: $('#trailor_type').val(),
                            veh_condition: $('#veh_condition').val(),
                            message: $('#message').val()
                          },
                        
                         
                          success: function(data){
                          		// $.each(data.errors, function(key, value){
                          		// 	$('.alert-danger').show();
                          		// 	$('.alert-danger').append('<p>'+value+'</p>');
                          		// });
                          		// console.log(data);
                          		location.reload();
                         
                        	}
                            
                        });
                    }
                    else{
                        if(pickup_loca.val() == '')
                        {
                            pickup_loca.parent().append('<span class="text-danger ml-3">Pickup Location is required</span>');
                        }
                        if(dilvery_loca.val() == '')
                        {
                            dilvery_loca.parent().append('<span class="text-danger ml-3">Delivery Location is required</span>');
                        }
                        if(veh_year.val() == '')
                        {
                            veh_year.parent().append('<span class="text-danger ml-3">Year is required</span>');
                        }
                        if(veh_make.val() == '')
                        {
                            veh_make.parent().append('<span class="text-danger ml-3">Make is required</span>');
                        }
                        if(veh_model.val() == '')
                        {
                            veh_model.parent().append('<span class="text-danger ml-3">Model is required</span>');
                        }
                        if(trailor_type.val() == '')
                        {
                            trailor_type.parent().append('<span class="text-danger ml-3">Trailor Type is required</span>');
                        }
                        if(veh_condition.val() == '')
                        {
                            veh_condition.parent().append('<span class="text-danger ml-3">Vehicle Condition is required</span>');
                        }
                        // console.log('All fields are required!');
                    }
               });
                   
                $('.reviewBtn').click(function(e){
                   e.preventDefault();
                //   alert('working')
                       $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });
                      
                      var title = $('#title');
                      var comp_id = $('#comp_id');
                      var review = $('#review');
                      var rating = $('#rating');
                      var reviewId = $('#reviewId');
                    
                    title.siblings('.text-danger').remove();
                    review.siblings('.text-danger').remove();
                    rating.parent().siblings('.text-danger').remove();
                    
                    if(title.val() && review.val() && (rating.val() && rating.val() > 0))
                    {
                       $.ajax({
                          url: "{{ route('review.add') }}",
                          type:"POST",
                          data: {
                            
                            comp_id: comp_id.val(),
                            title: title.val(),
                            review: review.val(),
                            rating: rating.val(),
                            reviewId: reviewId.val()
                          
                          },
                          
                        
                         
                          success: function(data){
                                // jQuery.noConflict();
                              $("#exampleModalLong").modal('hide');
                              $("#exampleModalLong1").modal('hide');
                          		// $.each(data.errors, function(key, value){
                          		// 	$('.alert-danger').show();
                          		// 	$('.alert-danger').append('<p>'+value+'</p>');
                          		// });
                          		// console.log(data);
                          		location.reload(); 
                         
                        	}
                            
                          });
                    }
                    else{
                        if(title.val() == '') {
                            title.parent().append('<span class="text-danger ml-3">Title is required</span>');
                        }
                        if(rating.val() == 0) {
                            rating.parent().parent().append('<span class="text-danger ml-3">Rating is required</span>');
                        }
                        if(review.val() == '') {
                            review.parent().append('<span class="text-danger ml-3">Review is required</span>');
                        }
                        // console.log('All fields are required!');
                    }
                });
            });
                
        </script>  
        
        <script>
            $(document).ready(function() {
                $('.reply-form').hide();
                $('.reply-button').click(function(){
                    $(this).siblings(".reply-form").toggle();
            
                })
            });
            $(document).ready(function() {
            $('.progress .progress-bar').css("width",
                    function() {
                        return $(this).attr("aria-valuenow") + "%";
                    }
            )
        });
        </script>
    
    
</body>

</html>
