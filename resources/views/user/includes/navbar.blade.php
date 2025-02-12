<input type="hidden" id="type" value="@if(isset(Session::get('user')['type'])){{Session::get('user')['type']}}@endif" />
<div class="navigation-wrap bg-light start-header start-style">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-light">

                    <a class="navbar-brand" href="{{ route('home') }}"><img src="https://assets.codepen.io/1462889/fcy.png"
                            alt=""></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav flex-right ml-auto py-4 py-md-0">

                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="reviewsresult.html">All Companies</a>
                            </li>


                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="#">Write A Review</a>
                            </li>

                            @if (!Session::has('user'))
                                <li>
                                    <div class="fl-header-phone-contain">
                                        <a class="fl-header-phone" href="{{ route('company.register') }}">Signup</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="fl-header-phone-contain">
                                        <a class="fl-header-phone" href="{{ route('company.login') }}">Login</a>
                                    </div>
                                </li>
                            @else
                                <li class="">
                                    <ul class="navbar-nav ms-auto d-flex flex-row">
                                        <div class="collapse navbar-collapse" id="navbar-list-4">
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#"
                                                        id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp"
                                                            class="rounded-circle" height="50" width="50" alt="Avatar"
                                                            loading="lazy">
                                                    </a>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="navbarDropdownMenuLink">
                                                        <a class="dropdown-item"
                                                            href="{{ route('company.profile') }}">My Profile ({{ Session::get('user')['first_name'] }})</a>
                                                            <a class="dropdown-item"
                                                            href="{{ route('company.editProfile', Session::get('user')['id']) }}">Edit
                                                            Profile</a>

                                                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>

                                                        <form id="logout-form" action="{{ route('user.logout') }}"
                                                            method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </div>
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
