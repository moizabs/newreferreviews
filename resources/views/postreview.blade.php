<!DOCTYPE html>
<html lang="en">

<head>
    <title>Refer Reviews - Companies</title>
    @include('layouts.head')
    <style>

    </style>
</head>

<body>
    @include('layouts.navbar')
 
 
	<div class="" style="padding:40px 0; position:relative; background-image: url('{{asset('images/bg-elements.jpg')}}');">
        <div class="col-lg-6 m-auto col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center text-sm-h5 search-text">Post A Review</h5>
                </div>
                <div class="card-body">
                <form action="#" >
                         <!--@csrf-->
                    <div class="form-group">
                        <div class="rating">

                            <i class="rating__star far fa-star"></i>
                            <i class="rating__star far fa-star"></i>
                            <i class="rating__star far fa-star"></i>
                            <i class="rating__star far fa-star"></i>
                            <i class="rating__star far fa-star"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="rating mb-4">
                            <span class="rating__result"></span>
                            <input class="rateStar" id='rating' name="rating" type="hidden" value="0">
                        </div>
                    </div>

                    <div class="form-group">

                       
                        <input type="hidden" id="comp_id" name="comp_id" value="{{ $company->id }}">
                        <input type="hidden" id="reviewId" name="reviewId" value="0">
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="Enter title">

                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control"
                            value="{{ isset(Session::get('user')['first_name']) ? Session::get('user')['first_name'] : '' }}" id="name" class="form-control"
                            id="name" placeholder="Enter your Name">
                    </div>
                    <div class="form-group">

                        <input type="email" name="email" value="{{ isset(Session::get('user')['email']) ? Session::get('user')['email'] : '' }}"
                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email">

                    </div>

                    <div class="form-group">

                        <textarea class="form-control" name="review" id="review" rows="3" placeholder="Enter your review"></textarea>
                    </div>
                    @if(Session::get('user'))
                        <div class="fl-header-phone-contain m-auto" style="height:fit-content">
                            <button  type="button" class="fl-header-phone reviewBtn">Submit</button>
                        </div>
                    @else
                        <div class="fl-header-phone-contain m-auto" style="height:fit-content">
                            <button type="button" class="btn btn-secondary btn-round" data-toggle="modal" data-target="#exampleModalLong"  data-placement="top" title="Email">
                                Submit
                            </button>
                        </div>
                    @endif
            
          
       </form>
                </div>
    <!--            <div class="card-footer">-->
    <!--    <div class="text-center my-3 delimiter">Submit Your Review with</div>-->
    <!--    <div class="d-flex justify-content-center social-buttons" style="gap:20px">-->
            <!--<a href="https://review.daydispatch.com/auth/google" style="background: #db4437; border: none;" type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Gmail">-->
            <!--  <i class="fab fa-google-plus" aria-hidden="true"></i>-->
            <!--</a>-->
            <!--<button style="background: #4267b2;; border: none;" type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">-->
            <!--  <i class="fab fa-facebook" aria-hidden="true"></i>-->
            <!--</button>-->
            <!--<button type="button" class="btn btn-secondary btn-round" data-toggle="modal" data-target="#exampleModalLong"  data-placement="top" title="Email">-->
            <!--    <i class="fa-solid fa-envelope"></i>-->
            <!--</button>-->
          
    <!--    </div>-->
   
    <!--</div>-->
            </div>
    
    </div>
    </div>
    
    
    <!--modal-->
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
          <form action="{{ route('user.login.submit') }}" method="POST">
              @csrf
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="email1" placeholder="Your email address...">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="password1" placeholder="Your password...">
            </div>
            <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
          </form>
          
          <!--<div class="text-center text-muted delimiter">or use a social network</div>-->
          <div class="d-flex justify-content-center social-buttons" style="gap:20px">
            <!--<a href="{{ url('auth/google') }}" style="background: #db4437; border: none;" type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Gmail">-->
            <!--  <i class="fab fa-google-plus"></i>-->
            <!--</a>-->
            <!--<button style="background: #4267b2;; border: none;" type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">-->
            <!--  <i class="fab fa-facebook"></i>-->
            <!--</button>-->
            <!--<button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Email">-->
            <!--  <i class="fab fa-email"></i>-->
            <!--</button>-->
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="{{ route('user.register' ) }}" class="text-info"> Sign Up</a>.</div>
      </div>
    </div>
    </div>
  </div>
</div>
    {{-- Pagination --}}
   
    @include('layouts.footer')

    <!-- Link to page
================================================== -->
    @include('layouts.foot')
    <script>
        $(document).ready(function() {
            $('.reviewBtn').click(function(e){
                e.preventDefault();
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
                        // $("#exampleModalLong").modal('hide');
                        // $("#exampleModalLong1").modal('hide');
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

</body>

</html>
