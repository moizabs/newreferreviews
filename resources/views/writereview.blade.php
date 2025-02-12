<!DOCTYPE html>
<html lang="en">

<head>
    <title>Refer Reviews - Companies</title>
    @include('layouts.head')
    <style>
        .buisness-review-section{
    display: flex;
    align-items: center;
    place-content: center;
    padding: 50px 0px;
}
.review-image{
    display: flex;
    place-content: center;
    align-items: center;
}
.review-image img{
    width: 450px;
}
    </style>
</head>

<body>
    @include('layouts.navbar')
 
 
 <div class="buisness-review-section">
				<div class="container">
                    <div class="row">
						<div class="col-12">
                            <h5 class="search-text">Find a business to review</h5>
						    <form method="post" action="{{ route('get.comp.byId') }}">
						        @csrf
                                <div class="input-group">
                                    <input type="search" value='' name="SearchBox" class="form-control search-input" id="SearchBox" placeholder="Find buisness here.." aria-describedby="basic-addon2">
                                    <input type="hidden" value='' name="compId" id="compId">
                                    <div id="SearchResults" class="custom-search-results">
                                        <ul id="comp_list" class='comp_list typeahead dropdown-menu' style=" overflow-y: auto; flex-direction: column;left: 40px;max-height: 320px">
                                        </ul>
                                    </div>
                                    <select id="cate_id" name='cate_id' class="ml-2 p-3 cate_id">
                                        <option class="cate-item" value=''>Select Category</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option class="cate-item" value='{{ $category->id }}'>{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    
                                    <button class="input-group-addon btn-main"><img src="{{ asset('images/search.png') }}" alt="search" class="img-fluid"> </button>
                                </div>
                                <div class="review-image">
                                    <img src="{{ asset('images/writeareview.png') }}" alt="" srcset="">
                                </div>
						    </form>
                           
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
    $('.comp_list').hide();
        $('#SearchBox').keyup(function(){
            $('#comp_list').empty();
            var seachVal = $('#SearchBox').val();
            var cate_id = $('.cate_id').find(":selected").val();
            if(seachVal ==''){
                $('.comp_list').hide();
            }else{
                $.ajax({
                    url:'/search_by_cate',
                    type:"GET",
                    dataType:"json",
                    data:{
                        seachVal:seachVal,
                        cate_id:cate_id,
                    },
                    success:function(res){
                        $.each(res, function(key, value) {
                            $('.comp_list').show();
                            $('#SearchResults').children('ul.comp_list').append(`
                                <li class='cate_item dropdown-item'>${value.comp_name} 
                                    <input class="buss_id" type="hidden" id="buss_id" name="buss_id" value="${value.id}" />
                                </li>`
                            );
                        });
                    }
                });
            }
        });
        $('#cate_id').change(function(){
            $('#comp_list').empty();
            var seachVal = $('#SearchBox').val();
            var cate_id = $('.cate_id').find(":selected").val();
                $.ajax({
                    url:'/search_by_cate',
                    type:"GET",
                    dataType:"json",
                    data:{
                        seachVal:seachVal,
                        cate_id:cate_id,
                    },
                    success:function(res){
                        
                        $.each(res, function(key, value) {
                            $('.comp_list').show();
                            $('#SearchResults').children('ul.comp_list').append(`
                                <li class='cate_item dropdown-item'>${value.comp_name} 
                                    <input class="buss_id" type="hidden" id="buss_id" name="buss_id" value="${value.id}" />
                                </li>`
                            );
                        });
                    }
                });
            
        });
        
        $(document).on('click','.cate_item', function(){
            
            $('.comp_list').hide();
            var buss_id = $(this).children('.buss_id').val();
            var buss_name = $(this).text();
            $('#SearchBox').val(buss_name);
            $('#compId').val(buss_id);
            $('.comp_list').empty();
            
            
//          $.ajax({
// // get-companies-cate-id
//             url:"{{ route('company.show.search') }}",
//             type:"POST",
            
//             data:{
//                 cate_id:cate_id
                
//             },
//             success:function(res){
                
//                 $("html").html("");
//                 $("html").html(res);
//             }
            
//             });
        })
    </script>
</body>

</html>
