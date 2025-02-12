
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Refer Reviews - Profile</title>
    @include('layouts.head')
</head>
<style>
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
</style>
<body>
    <?php
            function convert($value){
                $number = $value / 1000;
                return $number . 'k';
            }
            function count_stars($stars,$comp_id){
                $count_star = \App\Models\Review::where('comp_id',$comp_id)->where('rating',$stars)->count();
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
           
                    <div style="cursor:pointer;" class="Review-write mt-4 mb-4" data-toggle="modal" data-target="#exampleModalLong" data-target="#exampleModalLong" > 
                        <a class="fl-header-phone"><i class="fa-solid fa-star"></i>Write A Review</a> 
                    </div> 
                
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
                                            <div class="progress-bar progress-bar-primary" style="width:{{ get_perc($totalreviews,count_stars(5,$company->id)) }}%;" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(5,$company->id)) }}" aria-valuemin="0" aria-valuemax="100">
                                                
                                            </div>
                                        </div>
                                        <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(5,$company->id)) }}%</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-lg-2">4 Stars</span>     
                                        <div class="progress skill-bar col-lg-8">
                                            <div class="progress-bar progress-bar-primary" style="width:{{ get_perc($totalreviews,count_stars(4,$company->id)) }}%;" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(4,$company->id)) }}" aria-valuemin="0" aria-valuemax="100" >
                                                
                                            </div>
                                        </div>
                                        <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(4,$company->id)) }}%</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-lg-2">3 Stars</span>
                                        <div class="progress skill-bar col-lg-8">
                                            <div class="progress-bar progress-bar-primary" style="width:{{ get_perc($totalreviews,count_stars(3,$company->id)) }}%;" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(3,$company->id)) }}" aria-valuemin="0" aria-valuemax="100">    
                                            </div>
                                        </div>  
                                        <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(3,$company->id)) }}%</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-lg-2">2 Stars</span>
                                        <div class="progress skill-bar col-lg-8">
                                            <div class="progress-bar progress-bar-primary" style="width:{{ get_perc($totalreviews,count_stars(2,$company->id)) }}%;" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(2,$company->id)) }}" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>  
                                        <span class="col-lg-2">{{ get_perc($totalreviews,count_stars(2,$company->id)) }}%</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-lg-2">1 Stars</span>
                                        <div class="progress skill-bar col-lg-8">
                                            <div class="progress-bar progress-bar-primary" style="width:{{ get_perc($totalreviews,count_stars(1,$company->id)) }}%;" role="progressbar" aria-valuenow="{{ get_perc($totalreviews,count_stars(1,$company->id)) }}" aria-valuemin="0" aria-valuemax="100">
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
                                                    @if(Session::has('user'))
                                                        @if (Session::get('user')['type'] == 'BUSINESS')
                                                            <div class="replies">
                                                               
                                                                
                                                                
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
                </div>
           
            <div class="col-lg-4 col-sm-12">
                @if(!empty($company->company_hours))
                <div class="card" style="margin-top: 96px; width: 100%; text-align:left; background-color:#faf5f5 ">
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
                <div class="card my-5" id="sticker">
                    <div class="card-body">
                        <div class="testimonials1">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe class="gmap_iframe" style="width: 400px !important;height: 300px !important;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=300&amp;height=300&amp;hl=en&amp;q={{ $company->address.','.$company->state.','.$company->city }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                        
                                    </iframe>
                                </div>
                                <style>.mapouter{position:relative;text-align:right;}.gmap_canvas {overflow:hidden;background:none!important;}.gmap_iframe {width:600px!important;height:400px!important;}</style>
                            </div>
                            <div>


                                <div class="testimonials">
                                        <div class="company-address d-flex flex-column my-4">
                                            <span class="head">Address:</span>
                                            <span class="cont">{{ $company->address.','.$company->state.','.$company->city }}</span>
                                        </div>
                                        <div class="company-address d-flex flex-column my-4">
                                            <span class="head company-website">Website:</span>
                                            <span class="cont">{{ $company->website }}</span>
                                        </div>
                                        
                                   
                                    
                                        <div class="fl-header-phone-contain" data-toggle="modal"
                                            data-target="#exampleModalLong" style="cursor:pointer;">
                                            <a class="fl-header-phone">Request price</a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form>
            <div class="form-group">
              <input type="email" class="form-control" id="email1"placeholder="Your email address...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password1" placeholder="Your password...">
            </div>
            <button type="button" class="btn btn-info btn-block btn-round">Login</button>
          </form>
          
          <div class="text-center text-muted delimiter">or use a social network</div>
          <div class="d-flex justify-content-center social-buttons" style="gap:20px">
            <a href="{{ url('auth/google') }}" style="background: #db4437; border: none;" type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Gmail">
              <i class="fab fa-google-plus"></i>
            </a>
            <button style="background: #4267b2;; border: none;" type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="fab fa-facebook"></i>
            </button>
            <!--<button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Email">-->
            <!--  <i class="fab fa-email"></i>-->
            <!--</button>-->
          </di>
        </div>
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="{{ route('user.register' ) }}" class="text-info"> Sign Up</a>.</div>
      </div>
    </div>
  </div>
</div>

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
        $('.progress .progress-bar').css("width",
                    function() {
                        return $(this).attr("aria-valuenow") + "%";
                    }
            )
            });
    </script>


</body>

</html>
