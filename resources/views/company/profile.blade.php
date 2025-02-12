<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Refer Reviews - Company Profile</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
            integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
        <style>
            .quote-imgs-thumbs {
                
              border-radius: 10px;
              overflow: hidden;
              margin: 1.5rem 0;
              padding: 0.75rem;
              box-shadow: 0px 0px 10px 0px gray;
            }
            .quote-imgs-thumbs--hidden {
              display: none;
            }
            .button--hidden{
                display:none;
            }
            .img-preview-thumb {
              background: #fff;
              /*border: 1px solid #777;*/
              border-radius: 0.25rem;
              /*box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);*/
              margin-right: 1rem;
              max-width: 140px;
              padding: 0.25rem;
            }
           
            .carousel-inner {
                position: relative;
                width: 30%;
                margin-left: 20px;
                overflow: hidden; 
            }


         
            
            img.fl-places-logo {
                width: 130px;
            }
            .progress {
      height: 20px;
        border-radius:20px;
    padding:0%;
    }
    
    .progress .skill .val {
      float: right;
      font-style: normal;
      margin: 0 20px 0 0;
    }
    .progress-bar {
      text-align: left;
    
      border-radius:20px;
      transition-duration: 3s;
    }
    .div-color {
        background-color: #faf5f5;
    }
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
    .showme{
    width: 97px;
    position: relative;
    height: 45px;
    border-radius: 10px;
    overflow: hidden;
    color: white;
}
.showme input{
    position: absolute;
    opacity: 0;
    z-index: 10;
}
.showme .icon{
    background: #00539c;
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.showme .icon input{
    opacity: 0;
}
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    
    div{
        font-family: poppins;
    }
        </style>
</head>

    

    <body>
        <?php
            function convert($value){
                $number = $value / 1000;
                return $number . 'k';
            }
            
            function count_stars($stars){
                $user_id = Session::get('user')['id'];  
                $count_star = \App\Models\Review::where('comp_id',$user_id)
                ->where('rating',$stars)->count();
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
        {{-- Nav Bar --}}
        @include('layouts.navbar')
        {{-- End Nav Bar --}}
        <div class="company-profile-banner" >
            <div class="container">
                <div class="row">
                    <div class="col-12 flex_">
                        <div class="col-lg-8 col-sm-12 banner-left">
                            <div class="fl-places-logo-contain">
                                <span class="fl-places-logo-helper"></span>
                                @if (Session::get('user')['image'] != null)
                                    <img style="width:130px;" class="fl-places-logo" src="{{ asset('storage/companyLogo/'.Session::get('user')['image']) }}" alt="image">
                                @else
                                   
                                    <img class="fl-places-logo" alt="hotel_logo-1" src = "{{ asset('images/profile-image.jpg') }}">
                                @endif
                            </div>
                            <div class="fl-places-title-contain">
                                <span class="fl-places-subtitle">{{ Session::get('user')['name'] }}</span>
    
                                <span class="fl-places-title">{{ Session::get('user')['comp_name'] }}</span>
                                @if(isset(Session::get('user')['address']))
                                <span class="fl-places-show"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ Session::get('user')['address']}},{{ Session::get('user')['city']}},{{ Session::get('user')['state']}}</span>
                                @endif
                                
                                
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
                                    </div>
                                    <span class="totalaverage">Rating {{ $total }}/5.0</span>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!--Total Reviews-->
                    <!--<div class="col-12 flex_">-->
                    <!--    <div class="col-lg-8 col-sm-12 banner-left">-->
                            
                    <!--    </div>-->
                    <!--    <div class="col-lg-4 col-sm-12 banner-right">-->
                    <!--        <div class="d-flex justify-content-between align-center">-->
                    <!--            <div class="star-rate d-flex flex-column">-->
                    <!--                <span class="totalaverage">Total Review {{ convert($totalreviews) }}</span>-->
                    <!--                <span class="totalaverage">Total Review {{ $totalreviews }}</span>-->
                    <!--            </div>-->
                                
                    <!--        </div>-->
                                
                    <!--    </div>-->
                        
                            
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="d-flex gap-30">
                @if (!Session::get('user')['type'] === 'USER')
                    <div class="Review-write mt-4 mb-4" data-toggle="modal" data-target="#exampleModalLong">
                        <a class="fl-header-phone"><i class="fa-solid fa-star"></i>Write A Review</a>
                    </div>
                @else
                    <div class="Review-write mt-4 mb-4"  data-toggle="modal" data-target="#Imagemodal">
                        <a class="fl-header-phone" ><i class="fa-solid fa-camera"></i>Add photo</a>
                    </div>
                    <!--modal-->
                    <div class="modal fade" id="Imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Photos</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="grid-x grid-padding-x">
                                            <div class="small-10 small-offset-1 medium-8 medium-offset-2 cell">
                                                <h1 style="    font-size: 22px;">Multiple Image File Upload </h1>
                                                <form action="{{ route('addImages')}}" id="img-upload-form" method="post" enctype="multipart/form-data">
                                                @csrf
                                                    <div class="form-group">
                                                      <label for="upload_imgs" class="button hollow">Select Your Images +</label>
                                                      
                                                      
                                                      <div class="showme">
                                                        <div class="icon">
                                                            <i class=" fa-solid fa-cloud-arrow-up"></i>
                                                        </div> 
                                                      <input type="file" id="upload_imgs" name="images[]" multiple/>
                                                    </div>
                                                    </div>
                                                    <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>
                                                    <div id="upload-image" class="fl-header-phone-contain button--hidden" style="border-radius: 4px"> 
                                                        <input style="color:#fff" id="upload-image" class="button btn"  type="submit" name="submit" value="Upload Images"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                     <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img style="width:100%" src="{{ asset('storage/companyImages/' .$image->images) }}" alt="comany image">
                                            <!--<img  src="data:image/jpeg;base64,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" alt="comany image">-->
                                        </div> 
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
                                                <div class="form-group">
                                                    <input type="hidden" class="id" value="{{ $company->id }}">
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
                                <!--Stars-->
                                <!--<div class="row">-->
                                <!--    <div class="col-12 flex_">-->
                                <!--        <div class="col-2 mt-2 breadcrumbs">-->
                                <!--            <h5>Star 1 <br> {{ count_stars(1) }}</h5>-->
                                            
                                <!--        </div>-->
                                <!--        <div class="col-2 mt-2 breadcrumbs">-->
                                <!--            <h5>Star 2  <br> {{ count_stars(2) }}</h5>-->
                                            
                                <!--        </div>-->
                                <!--        <div class="col-2 mt-2 breadcrumbs">-->
                                <!--            <h5>Star 3 <br> {{ count_stars(3) }}</h5>-->
                                            
                                <!--        </div>-->
                                <!--        <div class="col-2 mt-2 breadcrumbs">-->
                                <!--            <h5>Star 4 <br> {{ count_stars(4) }}</h5>-->
                                            
                                <!--        </div>-->
                                <!--        <div class="col-2 mt-2 breadcrumbs">-->
                                <!--            <h5>Star 5 <br> {{ count_stars(5) }}</h5>-->
                                            
                                <!--        </div>-->
                                        
                                        
                                <!--    </div>-->
                                <!--</div>-->
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
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(5)) }}" aria-valuemin="0" aria-valuemax="100">
                                                
                                            </div>
                                        </div>
                                        <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(5)) }}%</span>
                                        </div>
                                        <div class="row">
                                       <span class="col-lg-2">4 Stars</span>     
                                        <div class="progress skill-bar col-lg-8">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(4)) }}" aria-valuemin="0" aria-valuemax="100" >
                                                
                                            </div>
                                        </div>
                                         <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(4)) }}%</span>
                                        </div>
                                        <div class="row">
                                            <span class="col-lg-2">3 Stars</span>
                                        <div class="progress skill-bar col-lg-8">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(3)) }}" aria-valuemin="0" aria-valuemax="100">    
                                            </div>
                                        </div>  
                                         <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(3)) }}%</span>
                                        </div>
                                        <div class="row">
                                            <span class="col-lg-2">2 Stars</span>
                                        <div class="progress skill-bar col-lg-8">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(2)) }}" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>  
                                         <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(2)) }}%</span>
                                        </div>
                                        <div class="row">
                                            <span class="col-lg-2">1 Stars</span>
                                        <div class="progress skill-bar col-lg-8">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(1)) }}" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>  
                                         <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(1)) }}%</span>
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
                                                                    {{-- Haseeb --}}
                                                                    @for ($i = 1; $i <= $stars; $i++)
                                                                        <i class="rating__ fas fa-star"></i>
                                                                    @endfor
                                                                    @for ($j = $stars + 1; $j <= 5; $j++)
                                                                        <i class="rating__ far fa-star"></i>
                                                                    @endfor
                                                                </div>
                                                                <span class="fullstar-Rating"></span>
                                                                <span class="">Rating {{ $stars }}/5.0</span>
                                                            </div>
                                                            <span class="comment--time fl-text-regular-style">
                                                                <span class="fl-link-comment">
                                                                    <span class="fl-comment-date-text">Review Published:</span>
                                                                    <span class="fl-comment-date">{{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="my-4">{{ $review['title'] }}</h5>
                                                            <h6>{{ $review['review'] }}</h6>
                                                        </div>
                                                        @if (Session::get('user'))
                                                            <div class="">
                                                                <div>
                                                                    @if ($review['reply'] == null && $review['reply'] == '')
                                                                        <div class="reply reply-button fl-header-phone-contain comments-section">
                                                                            <a class="fl-header-phone" type="button"
                                                                                data-toggle="reply-form"
                                                                                data-target="comment-1-reply-form">Reply</a>
                                                                        </div>
                                                                        <form
                                                                            action="{{ route('review.reply', $review['id']) }}"
                                                                            method="POST" class="reply-form"
                                                                            id="comment-1-reply-form">
                                                                            @csrf
                                                                            <textarea name="reply" placeholder="Reply to comment" rows="4"></textarea>
                                                                            <button class="fl-header-phone-small" type="submit">Submit</button>
                                                                        </form>
                                                                    @endif
                                                                </div>
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
                        <div></div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        @if(!empty($company->company_hours))
                        <div class="card" style=" text-align:left; background-color:#faf5f5 ">
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
                                            <div class="company-address d-flex flex-column my-4">
                                                <span class="head">Address:</span>
                                                <span class="cont">{{ $company->address.','.$company->state.','.$company->city }}</span>
                                            </div>
                                            <div class="company-address d-flex flex-column my-4">
                                                <span class="head company-email">Email:</span>
                                                <span class="cont">{{ $company->email }}</span>
                                            </div>
                                            <div class="company-address d-flex flex-column my-4">
                                                <span class="head company-phone">Phone:</span>
                                                <span class="cont">{{ $company->phone }}</span>
                                            </div>
                                            <div class="company-address d-flex flex-column my-4">
                                                <span class="head company-website">Website:</span>
                                                 <span class="cont"><a href="https://{{ $company->website }}" target="_blank">{{ $company->website }}</a></span>
                                            </div>
                                            <div class="fl-header-phone-contain" style="cursor:pointer;">
                                                <a id="btnReqPri" class="fl-header-phone">{{isset($company->button_text) ? $company->button_text : 'Add Botton Name' }}</a>
                                                <form id="reqPriInput"  action="{{route('change.button.name')}}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="text" name="reqPriInput" value="{{isset($company->button_text) ? $company->button_text : '' }}" id="reqPriInput" placeholder="Button Name"/>
                                                    <Button type="submit" id="btnSave" class="fl-header-phone">Save</Button>
                                                    <br>
                                                    <a id="btnShow" class="fl-header-phone">Show Button</a>
                                                </form>
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
        
        @include('layouts.foot')
        <script>
            $("#btnReqPri").click(function(){
                $(this).hide();
                $('#reqPriInput').show();

            });
            $("#btnShow").click(function(){
                
                $('#reqPriInput').hide();
                $('#btnReqPri').show();

            });
        </script>
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
        </script>
        <script>
            var imgUpload = document.getElementById('upload_imgs')
              , imgPreview = document.getElementById('img_preview')
              , imgUploadForm = document.getElementById('img-upload-form')
              , uploadbutton = document.getElementById('upload-image')
              , totalFiles
              , previewTitle
              , previewTitleText
              , img;
            imgUpload.addEventListener('change', previewImgs, false);
            function previewImgs(event) {
                totalFiles = imgUpload.files.length;
      
                if(!!totalFiles) {
                    imgPreview.classList.remove('quote-imgs-thumbs--hidden');
                    previewTitle = document.createElement('p');
                    previewTitle.style.fontWeight = 'bold';
                    previewTitleText = document.createTextNode(totalFiles + ' Total Images Selected');
                    previewTitle.appendChild(previewTitleText);
                    imgPreview.appendChild(previewTitle);
                }
                
                for(var i = 0; i < totalFiles; i++) {
                    img = document.createElement('img');
                    img.src = URL.createObjectURL(event.target.files[i]);
                    img.classList.add('img-preview-thumb');
                    imgPreview.appendChild(img);
                    uploadbutton.classList.remove('button--hidden');
                }
            }
    
    
             var mySwiper = new Swiper ('.mySwiper', {
                slidesPerView: 4,
                spaceBetween: 0,
                breakpoints: {  
                    '@640': {
                    slidesPerView: 2,
                    spaceBetween: 0, },
                },
                freeMode: true,
                loop: false,
                scrollbar: {
                    el: '.swiper-scrollbar',
                    hide: true,},
                navigation: {
                    nextEl: '.carousel-control-next',
                    prevEl: '.carousel-control-prev', },
            
            })
            $(document).ready(function() {
            $('.progress .progress-bar').css("width",
                    function() {
                        return $(this).attr("aria-valuenow") + "%";
                    }
            )
        });
        </script>
        <script>
        $('.reply-form').hide();
            $('.reply-button').click(function(){
               $(this).siblings('.reply-form').toggle();
            })
        </script>
        
</body>
</html>
