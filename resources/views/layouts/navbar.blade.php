<style>
    @media (max-width: 767px){
        .dropdown-toggle::after {
            content:unset !important;
        }
        .Img-dropDown{
            display: flex;
            color: #fff;
            flex-direction: column;
        }
        .user-display {
            display: none;
        }
        .navListItem{
            text-align: center;
        }
        .dropdown-menu.show a{
            color: white !important;
        }
    }
    .dropdown{
        text-align:center;
    }
    .notify::-webkit-scrollbar{
        display: none;
    }
    #navbar-list-4{
        display: block !important;
    }
    
</style>
<style>
     .dropdown-menu.show a{
    color: black;
}
.dropdown-item:hover, .dropdown-item:focus{
    color: #fff !important;
}
 </style>


<input type="hidden" id="type" value="@if(isset(Session::get('user')['type'])){{Session::get('user')['type']}}@endif" />

<div class="navigation-wrap bg-light start-header start-style">
    <div class="container" >
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-light">

                    <a class="navbar-brand" href="{{ route('home') }}"><img
                            src="{{ asset('images/logo.png') }}" alt=""></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav flex-right ml-auto py-4 py-md-0">
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            @if(!Session::get('user'))
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="{{ route('company.register') }}">Buisness Account</a>
                                </li>
                            @endif
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="{{ route('view.all.categories') }}">All Categories</a>
                            </li>
                            
                            
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="{{ route('all.companies') }}">All Companies</a>
                            </li>
                            

                            <!--<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">-->
                            <!--    <a class="nav-link" href="{{ route('view.write.Review') }}">Write A Review</a>-->
                            <!--</li>-->
                            
                            @if (!Session::has('user'))
                                <li>
                                    <div class="fl-header-phone-contain">
                                        <a class="fl-header-phone" href="{{ route('user.register') }}">Signup</a>
                                    </div>
                                </li>
                                <li class="nav-item  fl-header-phone-contain">
                                    <!--<div class="fl-header-phone-contain">-->
                                        <a class="fl-header-phone nav-login-button" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"
                                            style="display: flex; align-items:center; gap:5px">Login<i
                                                class="fa-solid fa-arrow-down"></i></a>
                                    <!--</div>-->

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('user.login') }}">As
                                            User</a>
                                        <a class="dropdown-item"
                                            href="{{ route('company.login') }}">As Business</a>
                                    </div>
                                              
                                </li>
                            @else
                                @if(Session::get('user')['type'] === 'BUSINESS')
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link" href="{{ route('business.view.chat') }}"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                    </li>
                                
                                    <li class="nav-item dropdown text-light m-auto bellicon" style="font-size:25px;">
                                      <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                      </span>
                                      <div class="dropdown-menu notify" aria-labelledby="dropdownMenuButton" style="top: 55px;width:350px !important;max-height: 420px;overflow: scroll;left: -280px;">
                                        
                                      </div>
                                    </li>
                                @else
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="{{ route('user.view.chat') }}"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                </li>
                                @endif 
                                <li >
                                    <ul class="navbar-nav ms-auto d-flex flex-row">
                                        <div class="collapse navbar-collapse" id="navbar-list-4">
                                            <ul class="navbar-nav">
                                                <li class="Img-dropDown nav-item dropdown" style=" display: flex; align-items: center; color: #fff;">
                                                    @if(Session::get('user')['type'] === 'BUSINESS')
                                                    <span class="user-display">{{ Session::get('user')['comp_name']  }}</span>
                                                    @else
                                                    <span class="user-display">{{ Session::get('user')['first_name'].' '.Str::substr(Session::get('user')['last_name'], 0, 1)  }}</span>
                                                    @endif
                                                    <a class="nav-link dropdown-toggle" href="#"
                                                        id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">

                                                        @if (Session::get('user')['image'] != null)
                                                            @if (Session::get('user')['type'] === 'BUSINESS')
                                                                <img src="{{ asset('storage/companyLogo/' . Session::get('user')['image']) }}"
                                                                class="rounded-circle" height="50" width="50" alt="Avatar"
                                                                loading="lazy" alt="image">
                                                            @else
                                                                <img src="{{ asset('storage/userProfile/' . Session::get('user')['image']) }}"
                                                                class="rounded-circle" height="50" width="50" alt="Avatar"
                                                                loading="lazy" alt="image">
                                                            @endif

                                                        @else
                                                            
                                                            <img src="{{ asset('images/profile-image.webp') }}"
                                                                class="rounded-circle" height="50" width="50" alt="Avatar"
                                                                loading="lazy">
                                                        @endif

                                                    </a>
                                                    @if (Session::get('user')['type'] == 'BUSINESS')
                                                        <div class="navListItem dropdown-menu"
                                                            aria-labelledby="navbarDropdownMenuLink">
                                                            <a class="dropdown-item"
                                                                href="{{ route('company.profile') }}">My Profile</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('company.editProfile', Session::get('user')['id']) }}">Edit
                                                                Profile</a>
                                                                <a class="dropdown-item" href="{{ url('company/change_password/view') }}">Change Password</a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('company.logout') }}"
                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                Logout
                                                            </a>

                                                            <form id="logout-form"
                                                                action="{{ route('company.logout') }}" method="POST"
                                                                style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    @elseif (Session::get('user')['type'] == 'USER')
                                                        <div class="navListItem dropdown-menu"
                                                            aria-labelledby="navbarDropdownMenuLink">
                                                            <a class="dropdown-item">As User</a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('user.profile') }}">Edit
                                                                Profile</a>
                                                                 <a class="dropdown-item" href="{{ url('user/change_password/view') }}">Change Password</a>
                                                            
                                                             <a class="dropdown-item"
                                                                href="{{ route('user.review_histroy') }}">Reviews Histroy</a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('user_logout') }}"
                                                                onclick="event.preventDefault(); document.getElementById('user_logout-form').submit();">
                                                                Logout
                                                            </a>

                                                            <form id="user_logout-form"
                                                                action="{{ route('user_logout') }}" method="POST"
                                                                style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </ul>
                                </li>
                            @endif

                        </ul>
                    </div>

                </nav>
            </div>
        </div>
    </div>
</div>
