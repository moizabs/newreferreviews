<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> Refer Reviews - Admin All Reviews</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <!--                                    </a>-->

        <!--                                    <form id="logout-form" action="{{ route('admin.logout') }}"-->
        <!--                                        method="POST" style="display: none;">-->
        <!--                                    {{ csrf_field() }}-->
        <!--                                    </form>-->

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
                                <h5 class="card-title">Buisness Reviews</h5>
                                <div class="row">
            
                                    <div class="col-sm-12 col-md-12 col-lg-12 float-left">
                                            <div class="input-group my-3">
                                            <input id='searchText' name="search" type="text" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                            <button id='searchBtn' class="input-group-text" type="button">Search</button>
                                              </div>
                                            </div>
                                    </div> 
                                </div>
                                
                                <div class="mb-3 text-center">
                                    <div role="group" class="btn-group-sm nav btn-group">
                                        <a data-toggle="tab" href="#tab-1"
                                            class="btn-shadow btn btn-primary active">All</a>
                                        <a data-toggle="tab" href="#tab-2"
                                            class="btn-shadow btn btn-primary">Pending</a>
                                        <a data-toggle="tab" href="#tab-3"
                                            class="btn-shadow btn btn-primary ">Publish</a>
                                    </div>
                                </div>
                                <div class="tab-content" id="allData">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    @foreach($pending_reviews as $review)
    <div class="modal fade" id="edit_buisness_pending{{ $review->id }}" tabindex="-1" role="dialog"
        aria-labelledby="edit_buisness_pending{{ $review->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.edit_customer_review', $review->id) }}" method="POST">
                            @csrf



                        <div class="form-group">

                            <input name='title' type="text" value='{{ $review->title }}' class="form-control" id="title" placeholder="Enter title">

                        </div>


                        <div class="form-group">

                            <textarea name= 'review' class="form-control" id="exampleTextarea" rows="3" placeholder="Enter your review">{{ $review->review }}</textarea>
                        </div>


                        <div class="fl-header-phone-contain my-2">
                             <button type= 'submit' class="fl-header-phone" href="">Update</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach
    
    

    <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
    </script>
    <script>
        
    
            
    function index(page)
    {
        var search = $('#searchText').val();
        $.ajax({
          url: "{{ route('admin.Searchreviews') }}?page="+page,
          type:"GET",
          data: {
            search: search,
            },
        
         
          success: function(res){
          		$("#allData").html("");
                $("#allData").html(res);
          	
         
        	}
       });
    }
    
    $('#searchText').keypress(function(e){
        if(e.which == 13)
        {
            index(1);
        }
    })
    
     $(document).ready(function(){
         
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('#searchBtn').click(function(){
           index(1);
        });  
        
        $(document).on("click", ".pagination a", function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1]; 
            index(page);
        });
        
        index(1);
        
        $("a[data-toggle='tab']").click(function(){
            index(1);
        })
    });
    
   
    </script>
</body>

</html>
