<!DOCTYPE html>
<html>

<head>
    <title>Refer Reviews - Costomer Registration</title>
    @include('layouts.head')
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <style>
        .or {
            margin: 0 10px;
            display: flex;
            align-items: center;
        }


        /*.background {*/
        /*    position: relative;*/
        /*    z-index: 1;*/
        /*}  */

        /* .double span { */
        /* to hide the lines from behind the text, you have to set the background color the same as the container */
        /*        background: #fff; */
        /*        padding: 0 15px; */
        /*    }*/


        /*.double:before { */
        /* this is just to undo the :before styling from above */
        /*    border-top: none; */
        /*}*/
        /*.double:after {*/
        /*    border-bottom: 1px solid blue;*/
        /*    -webkit-box-shadow: 0 1px 0 0 red;*/
        /*    -moz-box-shadow: 0 1px 0 0 red;*/
        /*    box-shadow: 0 1px 0 0 red;*/
        /*    content: "";*/
        margin: 0 auto;

        /* this centers the line to the full width specified */
        /*    position: absolute;*/
        /*    top: 45%; left: 0; right: 0;*/
        /*    width: 95%;*/
        /*    z-index: 1;*/
        /*}*/
        .quote-imgs-thumbs {
            background: #eee;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            margin: 1.5rem 0;
            padding: 0.75rem;
        }

        .quote-imgs-thumbs--hidden {
            display: none;
        }

        .img-preview-thumb {
            background: #fff;
            border: 1px solid #777;
            border-radius: 0.25rem;
            box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);
            margin-right: 1rem;
            max-width: 140px;
            padding: 0.25rem;
        }

        /*a#pills-login-tab {*/
        /*    background: #00539c;*/
        /*    border: none;*/
        /*    color: #fff !important;*/
        /*}*/
        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            background: #00539c;
            border: none;
            color: #fff !important;
        }
    </style>
</head>

<body>
    <img class="wave" src="{{ asset('images/wave.png') }}">
        @include('layouts.navbar')
        <div class="parent">

            <div class="first-child">
                <img style="margin: 50px auto" src="{{ asset('images/phone.png') }}">
            </div>

            <div class="second-child">
                <div class="second-child-maindiv" >
                    {{-- <div class="card-header border-bottom-0 bg-transparent">
                        <ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link text-primary active" id="pills-register-tab" data-toggle="pill"
                                    href="#pills-register" role="tab" aria-controls="pills-register"
                                    aria-selected="false">Customer Registration</a>
                            </li>
                        </ul>
                    </div> --}}
    
    
    
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
    
                            {{-- Register Form User --}}
                            <div class="tab-pane fade show active" id="pills-register" role="tabpanel"
                                aria-labelledby="pills-register-tab">
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('user.register.submit') }}" method="POST"
                                    enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <h2 class="text-center search-text">Customer Registration</h2>
                                    {{-- <div class="row jumbotron"> --}}
                                        <div class=" form-group">
                                            <label for="c-name">First Name</label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                name="first_name" id="cname" placeholder="Enter Your First name">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" form-group">
                                            <label for="mc-num">Last Name</label>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name" id="lnum" placeholder="Enter Your Last Name">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" placeholder="Enter your email.">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" form-group">
                                            <label for="name">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="password" placeholder="Enter Your Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
    
                                        </div>
    
                                        {{-- <div class="col-sm-12 form-group mb-0"> --}}
    
    
                                            <div class=" " style="text-align: center">
                                                <button type="submit" class="fl-header-phone "
                                                    href="">Submit</button>
                                            </div>
                                        {{-- </div> --}}
    
                                    {{-- </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    {{-- /div> --}}




    {{-- <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copy-right-box">
                        <p class="copy-right-text"><a href="#" class="web-site-link ">absinternational.com</a> is a
                            Community Site Proudly Operated By Moving Sites, LLC.</p>
                        <span class="copy-right-link">© 2003-2022 <a href="/"
                                class="web-site-link">absinternational.com</a> All rights reserved.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}


    {{-- <div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">

						<a class="navbar-brand" href="index.html" ><img src="https://assets.codepen.io/1462889/fcy.png" alt=""></a>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                <li>
                                <div class="fl-header-phone-contain">
                                    <a class="fl-header-phone" href="companylogin.html">Signup</a>
                            </div>
                        </li>
                        <li>
                            <div class="fl-header-phone-contain">
                                <a class="fl-header-phone" href="login.html">Login</a>
                        </div>
                    </li>
                    <li class="">
                        <ul class="navbar-nav ms-auto d-flex flex-row">
                            <div class="collapse navbar-collapse" id="navbar-list-4">
                              <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle" height="50" width="50" alt="Avatar" loading="lazy">
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="editprofile.html">Edit Profile</a>
                                    <a class="dropdown-item" href="logo.html">Log Out</a>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </ul>
                    </li>
							</ul>
						</div>

					</nav>
				</div>
			</div>
		</div>
	</div> --}}

    {{-- <div class="container my-5">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
            </div>
        @elseif(session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('failed') }}
            </div>
        @endif
        <form action="{{ route('user.register.submit') }}" method="POST">
            @csrf
            <h2 class="text-center search-text">User Registration</h2>
            <div class="row jumbotron">
                <div class="col-sm-6 form-group">
                    <label for="c-name">Name</label>
                    <input type="text" class="form-control" name="comp_name" id="c-name"
                        placeholder="Enter company name">
                </div>

                <div class="col-sm-6 form-group">
                    <label for="password">Password</label>
                    <input type="Password" name="password" class="form-control" id="password"
                        placeholder="Enter your password.">
                </div>

                <div class="col-sm-12 form-group mb-0">


                    <div class="fl-header-phone-contain float-right">
                        <button type="submit"  class="fl-header-phone " >Submit</button>
                    </div>
                </div>

            </div>
        </form>
    </div> --}}

    @include('layouts.footer')
    @include('layouts.foot')

    <script>
        $(document).ready(function() {
            $("#category_id").change(function() {
                var selectedCountry = $("#category_id option:selected").text();
                if (selectedCountry == "Transportation") {
                    $(".Automotives").css("display", "block");
                } else {
                    $(".Automotives").css("display", "none");
                }
            });
        });

        var imgUpload = document.getElementById('upload_imgs'),
            imgPreview = document.getElementById('img_preview'),
            imgUploadForm = document.getElementById('img-upload-form'),
            totalFiles, previewTitle, previewTitleText, img;

        imgUpload.addEventListener('change', previewImgs, false);
        imgUploadForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Images Uploaded! (not really, but it would if this was on your website)');
        }, false);

        function previewImgs(event) {
            totalFiles = imgUpload.files.length;

            if (!!totalFiles) {
                imgPreview.classList.remove('quote-imgs-thumbs--hidden');
                previewTitle = document.createElement('p');
                previewTitle.style.fontWeight = 'bold';
                previewTitleText = document.createTextNode(totalFiles + ' Total Images Selected');
                previewTitle.appendChild(previewTitleText);
                imgPreview.appendChild(previewTitle);
            }

            for (var i = 0; i < totalFiles; i++) {
                img = document.createElement('img');
                img.src = URL.createObjectURL(event.target.files[i]);
                img.classList.add('img-preview-thumb');
                imgPreview.appendChild(img);
            }
        }
    </script>
    <script>
        $('.dphone').keypress(function(e) {
            var charCode = (e.which) ? e.which : event.keyCode;
            if (String.fromCharCode(charCode).match(/[^0-9]/g))
                return false;
        });
        $(".dphone").on('input', function(ev) {

            //Prevent default
            ev.preventDefault();

            //Remove hyphens
            let input = ev.target.value.split("-").join("");

            //Make a new string with the hyphens
            // Note that we make it into an array, and then join it at the end
            // This is so that we can use .map() 
            input = input.split('').map(function(cur, index) {

                //If the size of input is 6 or 8, insert dash before it
                //else, just insert input
                if (index == 3 || index == 6)
                    return "-" + cur;
                else
                    return cur;
            }).join('');

            //Return the new string
            $(this).val(input);
        });
    </script>


</body>

</html>
