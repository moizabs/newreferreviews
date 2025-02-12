<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Refer Reviews - Company Register</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
</head>

<body>

   
    @include('layouts.navbar')

    <div class="container my-5">
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
        <form action="{{ route('company.register.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center search-text">Company Registration</h2>
            <div class="row jumbotron">
                <div class="col-sm-6 form-group">
                    <label for="c-name">Company Name</label>
                    <input type="text" class="form-control" name="comp_name" id="c-name"
                        placeholder="Enter company name">

                </div>
                <div class="col-sm-6 form-group">
                    <label for="mc-num">Mc Number</label>
                    <input type="number" class="form-control" name="comp_mc_num" id="mc-num"
                        placeholder="Enter mc number">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="comp_email" id="email"
                        placeholder="Enter your email.">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="address-2">City</label>
                    <input type="address" class="form-control" name="comp_city" id="city" placeholder="City Name.">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="State">State</label>
                    <input type="address" class="form-control" name="comp_state" id="state"
                        placeholder="Enter your state name.">
                </div>

                <div class="col-sm-6 form-group">
                    <label for="text">Desired User Name</label>
                    <input type="text" name="comp_desire_name" class="form-control" id="dname"
                        placeholder="Enter desire username">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="password">Password</label>
                    <input type="Password" name="password" class="form-control" id="password"
                        placeholder="Enter your password.">
                </div>

                <div class="col-sm-12 form-group">
                    <label>Message</label>
                    <textarea name="comp_message" class="form-control" id="message" rows="3"></textarea>
                </div>
                
                <div class="col-sm-12 form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="" ></input>
                </div>
                <div class="col-sm-12 form-group mb-0">
                    <div class="fl-header-phone-contain float-right">
                        <button type="submit"  class="fl-header-phone " >Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
</body>

</html>
