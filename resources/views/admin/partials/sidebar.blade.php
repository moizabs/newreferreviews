@php
    $customerCount = \App\Models\Customer::count();
    $businessCount = \App\Models\Business::count();
    
    $requestPriceCount = \App\Models\RequestPrice::count();
    
    $activeReviews = \App\Models\Review::count();
    $pendingReview = \App\Models\Review::where('status',0)->count();
    $publishReview = \App\Models\Review::where('status',1)->count();
   
           
@endphp
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button"
                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar my-4">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li>
                    <a href="{{ route('admin.dashbord') }}" class="mm-active">
                        <i class="metismenu-icon fa-solid fa-rocket"></i>
                        Dashboard
                    </a>
                </li>


                <li>
                    <a href="">
                        <i class="metismenu-icon fa-solid fa-user"></i>
                        Customers
                        <i class="metismenu-state-icon fa-solid fa-caret-down "></i>
                        <span class="badge badge-pill badge-secondary">{{ $customerCount }}</span>

                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">

                        <li>
                            <a href="{{ route('admin.customers_profile') }}" class="mm-active">
                                <i class="metismenu-icon"></i> Customers History
                            </a>
                            
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="metismenu-icon fa-solid fa-users"></i>

                        Businesses
                        <i class="metismenu-state-icon fa-solid fa-caret-down "></i>
                        <span class="badge badge-pill badge-secondary">{{ $businessCount }}</span>
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">

                        <li>
                            <a href="{{ route('admin.businesses_profile') }}" class="mm-active">
                                <i class="metismenu-icon"></i> Business History
                            </a>
                            
                        </li>
                        <!-- <li>
                            <a href="requestprice.html" class="">
                                <i class="metismenu-icon"></i> Request Price
                            </a>
                        </li> -->
                    </ul>
                </li>
             
                <li>
                    <a href="#" >
                        <i class="metismenu-icon fa-solid fa-star"></i>
                        Reviews
                         <span class="badge badge-pill badge-secondary">{{ $activeReviews }}</span>
                         <i class="metismenu-state-icon fa-solid fa-caret-down "></i>
                            
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">

                        <li>
                            <a href="{{ route('admin.reviews.active') }}" class="mm-active">
                                <i class="metismenu-icon"></i> Active Reviews
                            <span class="badge badge-pill badge-secondary">{{ $activeReviews }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reviews.pending') }}" class="mm-active">
                                <i class="metismenu-icon"></i> Pending Reviews
                            <span class="badge badge-pill badge-secondary">{{ $pendingReview }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reviews.publish') }}" class="mm-active">
                                <i class="metismenu-icon"></i> Published Reviews
                            <span class="badge badge-pill badge-secondary">{{ $publishReview }}</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.viewRequestPrice') }}" >
                        <i class="metismenu-icon fa-solid fa-dollar-sign"></i>
                        Request Price
                        <span class="badge badge-pill badge-secondary">{{ $requestPriceCount }}</span>
                    </a>
                </li>
                
                 <li>
                    <a href="{{ route('admin.addCategory') }}" >
                        <i class="metismenu-icon fa-solid fa-dollar-sign"></i>
                        Add Categories
                    </a>
                </li>
                <li>
                    <a href="#" >
                        <i class="metismenu-icon fa-solid fa fa-envelope"></i>
                        
                        Chat
                         <span class="badge badge-pill badge-secondary"></span>
                         <i class="metismenu-state-icon fa-solid fa-caret-down "></i>
                            
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">

                        <li>
                            <a href="{{ url('admin/chat/businesses') }}" class="mm-active">
                                <i class="metismenu-icon"></i> Busniesses
                            <span class="badge badge-pill badge-secondary"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/chat/customers') }}" class="mm-active">
                                <i class="metismenu-icon"></i> Customers
                            <span class="badge badge-pill badge-secondary"></span>
                            </a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="{{ route('admin.reviews.publish') }}" class="mm-active">-->
                        <!--        <i class="metismenu-icon"></i> Published Reviews-->
                        <!--    <span class="badge badge-pill badge-secondary">{{ $publishReview }}</span>-->
                        <!--    </a>-->
                        <!--</li>-->

                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.getEmails') }}" >
                        <i class="metismenu-icon fa-solid fa-dollar-sign"></i>
                        Support Mailbox 
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>