    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script type="text/javascript">
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
    </script>
    
   
    
    
    