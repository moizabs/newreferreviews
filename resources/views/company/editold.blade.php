
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refer Reviews - Company Profile Edit</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
</head>

<body>
    {{-- Nav Bar --}}
    @include('layouts.navbar')
    {{-- End Nav Bar --}}

    <div class="card" >
        <div class="card-body">
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
                <form action="{{ route('company.updateSubmit',$company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h2 class="text-center search-text">Company Edit Profile</h2>
                    <div class="row jumbotron">
                        <div class="col-sm-6 form-group">
                            <label for="c-name">Company Name</label>
                            <input type="text" value="{{ $company->comp_name }}" class="form-control" name="comp_name" id="c-name"
                                placeholder="Enter company name">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="mc-num">Mc Number</label>
                            <input type="text" value="{{ $company->mc_num }}" class="form-control" name="comp_mc_num" id="mc-num"
                                placeholder="Enter mc number">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{ $company->email }}" class="form-control" name="comp_email" id="email"
                                placeholder="Enter your email.">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ $company->name }}" name="name" id="name" placeholder="Enter Your Name">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="address-2">City</label>
                            <input type="address" value="{{ $company->city }}" class="form-control" name="comp_city" id="city" placeholder="City Name.">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="State">State</label>
                            <input type="address" value="{{ $company->state }}" class="form-control" name="comp_state" id="state"
                                placeholder="Enter your state name.">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="State">Address</label>
                            <input type="address" value="" class="form-control" name="comp_address" id="address"
                                placeholder="Enter your Address.">
                        </div>
                           <div class="col-sm-6 form-group">
                            <label for="text">Desired User Name</label>
                            <input type="text" value="{{ $company->desire_name }}" name="comp_desire_name" class="form-control" id="dname"
                                placeholder="Enter desire username">
                        </div>
                         <div class="col-sm-6 form-group">
                        <label for="name">Phone Number</label>
                        <input type="tel" class="form-control phone-num" value="{{ $company->phone }}"  name="phone" id="tel" placeholder="Enter Your Phone Number" maxlength="12" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="name">website</label>
                        <input type="text" class="form-control" value="{{ $company->website }}" name="website" id="Website" placeholder="Enter Your Website" required>
                    </div>
                     
                        <div class="col-sm-12 form-group">
                            <label>Message</label>
                            <textarea   name="comp_message" class="form-control" id="message" rows="3">{{ $company->message }}</textarea>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="image">Image</label>
                            <input type="file" value="{{ $company->image }}" name="image" class="form-control" id="image" placeholder="" ></input>
                        </div>
                        <div class="col-sm-12 form-group mb-0">
                            <div class="fl-header-phone-contain float-right">
                                <button type="submit"  class="fl-header-phone " >Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.phone-num').keypress(function (e) {    
            var charCode = (e.which) ? e.which : event.keyCode;
            if (String.fromCharCode(charCode).match(/[^0-9]/g))
            return false;
        });   
        $(".phone-num").on('input', function(ev){
    		ev.preventDefault();
    		let input = ev.target.value.split("-").join("");
    		input = input.split('').map(function(cur, index){
    			if(index == 3 || index == 6 )
    				return "-" + cur;
    			else
    				return cur;
    		}).join('');
    		$(this).val(input);
	    });

    </script>
</body>

</html>
