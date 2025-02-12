<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Refer Reviews - User Profile</title>
    @include('layouts.head');
    <style>
    .avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 10px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}

.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > img {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}


</style>
</head>

<body>

   

@include('layouts.navbar')

    <div>
        <div class="container">
            <div class="my-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h5 class="search-text top-company">User Profile</h5>

                        </div>
                    </div>
                </div>
                
                <div class="bio-info">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                     @if(session()->get('message'))
                                        <div class="alert alert-success" role="alert">
                                        <strong>Success: </strong>{{session()->get('message')}}
                                        </div>
                                        @endif
                                    <div class="bio-image">
                                    
                                    <form action ="{{ route('user.addImages')}}" method='POST' enctype="multipart/form-data">
                                        @csrf
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' name='image'  id="imageUpload" accept=".png, .jpg, .jpeg" onchange="previewFile()"/>
                                                <label for="imageUpload">
                                                    <i class="fa-solid fa-pen"></i>
                                                </label>
                                                <input type="file" name="" id="profileImg" style="opacity: 0;appearance: none;position: absolute;">
                                            </div>
                                            <div class="avatar-preview">
                                                <!--<img id="imagePreview" class="image-upload" src="https://www.loginradius.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png">-->
                                            @if (Session::get('user')['image'])
                                               
                                                 <img id="imagePreview" class="image-upload"  src="{{ asset('storage/userProfile/'.Session::get('user')['image'] )  }}" alt="image">
                                                {{ Session::get('user')['image'] }}
                                            @else
                                                <img id="imagePreview" class="image-upload"  src="{{ asset('images/avatar.png')  }}" alt="image">

                                            @endif
                                                
                                           
                                            </div>
                                            
                                           <button type='submit' class="btn my-4" style="background: var(--button-color); color:#fff" >Submit</button>
                                        </div>
                                       
                                    </form>




                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        
                        <div class="col-md-8">
                            <div class="bio-content">
                                <div class="row">
                                    <div class="col-lg-12">

                                       <form>

                                        {{-- @method('PUT') --}}

                                         <div class="row ">
                                            <div class="col-sm-6 form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="hidden" class="form-control" value="{{ $user->id }}" readonly name="user_id" id="user_id" placeholder="Enter First name" required="">
                                                <input type="text" class="form-control" value="{{ $user->first_name }}" readonly name="first_name" id="first-name" placeholder="Enter First name" required="">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control"  value="{{ $user->last_name }}" readonly name="last_name" id="last-name" placeholder="Enter First name" required="">
                                            </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-sm-6 form-group">
                                                 <label>Email</label>
                                               <input type="email" value="{{ $user->email }}" name="email" readonly class="form-control" placeholder="Email">
                                             </div>
                                             <div class="col-sm-6 form-group">
                                               <label>Phone Number</label>
                                               <input type="tel" name='phone' value="{{ $user->phone }}" readonly class="form-control dphone" placeholder="Phone Number">
                                             </div>
                                           </div>
                                         <!--<div class="row ">-->
                                         <!--   <div class="col-sm-4 form-group">-->
                                         <!--        <label>Password</label>-->
                                         <!--      <input type="password" value="{{ $user->password }}" class="form-control" placeholder="password">-->
                                         <!--    </div>-->
                                             
                                         <!--  </div>-->
                                           
                                             <div class="fl-header-phone-contain" style="margin:auto" data-toggle="modal" data-target="#update-profile">
                                                 <a href="#"  class="fl-header-phone" >Edit Profile</a>
                                         </div>
                                           
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

<!-- model add review -->

  <!-- Modal -->
  <div class="modal fade" id="update-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('user.edit.profileSubmit') }}" method='POST' enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">
                <div class="form-group col-12">
                      <label>First Name</label>
                    <input type="text" class="form-control" id="fname" name="first_name" value="{{ $user->first_name }}" placeholder="Enter your First Name">

                </div>
                <div class="form-group col-12">
                      <label>Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="Enter your Last Name">

                </div>
                </div>
                <!-- <div class="row">-->
                <!--<div class="form-group col-12">-->
                <!--    <label>Email</label>-->
                <!--    <input type="email" class="form-control" name="email" value="{{ $user->email }}"-->
                <!--        aria-describedby="emailHelp" placeholder="Enter email">-->

                <!--</div>-->
                <!--</div>-->
                <div class="row">
                <div class="form-group col-12">
                    <label>Phone Number</label>
                    <input type="text" class="form-control dphone" name="phone" value="{{ $user->phone }}" maxlength="12"
                        placeholder="Enter Phone Number">

                </div>
                </div>
                <!--<div class="col-sm-12 form-group">-->
                <!--    <label for="image">User Image</label>-->
                <!--    <input type="file" value="{{ $user->image }}" name="image" class="form-control" id="image" placeholder="" >-->
                <!--</div>-->
                <!--<div class="row">-->
                <!--<div class="form-group col-12">-->
                <!--    <label>Current Password</label>-->
                <!--    <input type="password" class="form-control" name="current_password" value=""-->
                <!--        placeholder="Enter your Current Password">-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="row">-->
                <!--<div class="form-group col-6">-->
                <!--    <label>New Password</label>-->
                <!--    <input type="password" class="form-control" name="new_password" value=""-->
                <!--        placeholder="Enter your New Password">-->
                <!--</div>-->
                <!--<div class="form-group col-6">-->
                <!--    <label>Confirm Password</label>-->
                <!--    <input type="password" class="form-control" name="new_password_confirm" value=""-->
                <!--        placeholder="Enter your Confirm Password">-->
                <!--</div>-->
                <!--</div>-->




                <div class="fl-header-phone-contain my-2">
                    <button type="submit" class="fl-header-phone">Update</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>


  <!-- Request Price Model -->

    @include('layouts.foot');
       <script>
        function previewFile() {
      var preview = document.querySelector('.image-upload');
      var file = document.querySelector('input[type=file]').files[0];
      var reader = new FileReader();
    
      reader.addEventListener("load", function () {
        preview.src = reader.result;
      }, false);
    
      if (file) {
        reader.readAsDataURL(file);
      }
     }
             $('.dphone').keypress(function (e) {    
  var charCode = (e.which) ? e.which : event.keyCode;
  if (String.fromCharCode(charCode).match(/[^0-9]/g))
    return false;
});   
$(".dphone").on('input', function(ev){
		
		//Prevent default
		ev.preventDefault();
		
		//Remove hyphens
		let input = ev.target.value.split("-").join("");
		
		//Make a new string with the hyphens
		// Note that we make it into an array, and then join it at the end
		// This is so that we can use .map() 
		input = input.split('').map(function(cur, index){
			
			//If the size of input is 6 or 8, insert dash before it
			//else, just insert input
			if(index == 3 || index == 6)
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
