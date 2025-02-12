
<!DOCTYPE html>
<html>

<head>
    
    <title>Refer Reviews - Company Profile Edit</title>
    @include('layouts.head')
        <style>
.hours-display {
    margin-bottom: 6px;
}
.hours-display span {
    display: table-cell;
    padding-right: 9px;
}
.hours-display .weekday {
    font-weight: bold;
}
.category{
    display:flex;
    gap:10px
}
  .badge{
        min-width: 59px;
        font-size: 14px;
        font-family: sans-serif;
        padding: 9px;
        font-family: 'Poppins', sans-serif;
    }
    .badge-secondary{
        color: #000;
        background-color: #ffffff;
        box-shadow: 0px 0px 6px 0px #9f9f9f;
    }
    </style>
</head>

<body>
    {{-- Nav Bar --}}
    @include('layouts.navbar')
    {{-- End Nav Bar --}}

 
       
            <div class="container my-5 col-lg-8">
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
                       <div class="row  card">
                    <div class="card-header">
                        <h5>Edit Profile</h5>
                    </div>
                   <div class="card-body">
                    <div class="col-sm-12 form-group">
                        <label for="c-name">Company Name</label>
                        <input type="text" class="form-control"
                        value="{{ $company->comp_name }}"
                        name="comp_name" id="comp_name" placeholder="Enter company name" >
                    </div>
                   
                    <div class="col-sm-12 form-group">
                        <label for="category">Sub Categories</label>
                        <div class="main-subcategory">
                            <div class="add-category">
                                @if($company->company_category)
                                    @foreach($company->company_category as $item)
                                        <div class="category"><strong>{{ $item->get_category->name}} > {{ isset($item->get_sub_category->name) ? $item->get_sub_category->name : ''  }}</strong>
                                        <a href="{{ route('editProfile.remove.subcate',$item->id) }}" id='remove-btn' class='remove-subcat'>Remove</a>
                
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class='ml-3 mt-2 mb-2 add-sub-category row'>
                            </div>
                            <div class='ml-3 mt-2 mb-2 sub_cate_list row'>
                                
                            </div>
                            <a href="javascript:;" class="link-more js-add-category">Add another category</a>
                        </div>
                        <input type="text" class="form-control comp_subcategory" 
                            name="comp_subcategory" id="comp_subcategory" 
                            placeholder="Add category" >
                        <ul class="navs typeahead dropdown-menu" style=" overflow-y: auto; flex-direction: column;left: 40px;max-height: 320px"></ul>
                    </div>
                   <div class="row" style="margin: 0;">
                    <div class="col-sm-6 form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="comp_email" value="{{ $company->email }}" id="comp_email" placeholder="Enter your email." >
                    </div>
                 
                    <div class="col-sm-6 form-group">
                        <label for="city">City</label>
                        <input type="text" value="{{ $company->city }}" class="form-control" name="comp_city" id="comp_city" placeholder="City Name.">
                        <ul class="nav1 typeahead dropdown-menu" style=" overflow-y: auto; flex-direction: column;left: 40px;max-height: 320px"></ul>
                    </div>
                    </div>
                    <div class="row" style="margin: 0;">
                        
                    <div class="col-sm-6 form-group">
                        <label for="state">State</label>
                        <input type="text" value="{{ $company->state }}" class="form-control" name="comp_state" id="comp_state"
                                placeholder="Enter your state name.">
                        <ul class="nav2 typeahead dropdown-menu" style=" overflow-y: auto; flex-direction: column;left: 40px;max-height: 320px"></ul>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="p-code">Postal Code</label>
                        <input type="text" class="form-control" value="{{ $company->postalcode }}" name="comp_postcode" id="comp_postalcode" placeholder="Enter postal code"  >
                        <ul class="nav3 typeahead dropdown-menu" style=" overflow-y: auto; flex-direction: column;left: 40px;max-height: 320px"></ul>
                    </div>
                    </div>
                    <div class="row" style="margin: 0;">
                    <div class="col-sm-6 form-group">
                        <label for="State">Address</label>
                        <input type="address" class="form-control" name="comp_address" id="address" value="{{ $company->address }}"
                        placeholder="Enter your Address.">
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="p-num">Phone Number</label>
                        <input type="text" class="form-control " name="phone" id="phone" placeholder="Enter phone number" value="{{ $company->phone }}"  >
                    </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="Website">Website</label>
                        <input type="text" class="form-control" value="{{ $company->website }}"
                        name="comp_website" id="website" 
                        placeholder="Enter Your Website" >
                    </div>
                    <div class="col-sm-12 form-group">
                        <label >Hours</label>
                        <div class="row" id="day-hours-BusinessHours">
                            
                            <div class=" col-lg-2">
                            <select class="weekday form-control">
                                    <option value="0">Mon</option>
                                    <option value="1">Tue</option>
                                    <option value="2">Wed</option>
                                    <option value="3">Thu</option>
                                    <option value="4">Fri</option>
                                    <option value="5">Sat</option>
                                    <option value="6">Sun</option>
                            </select>
                            </div>
                            <div class=" col-lg-2">
                                
                            <select class="hours-start  form-control">
                                    <option value="0 0.0">12:00 am </option>
                                    <option value="0 0.5">12:30 am </option>
                                    <option value="0 1.0">1:00 am </option>
                                    <option value="0 1.5">1:30 am </option>
                                    <option value="0 2.0">2:00 am </option>
                                    <option value="0 2.5">2:30 am </option>
                                    <option value="0 3.0">3:00 am </option>
                                    <option value="0 3.5">3:30 am </option>
                                    <option value="0 4.0">4:00 am </option>
                                    <option value="0 4.5">4:30 am </option>
                                    <option value="0 5.0">5:00 am </option>
                                    <option value="0 5.5">5:30 am </option>
                                    <option value="0 6.0">6:00 am </option>
                                    <option value="0 6.5">6:30 am </option>
                                    <option value="0 7.0">7:00 am </option>
                                    <option value="0 7.5">7:30 am </option>
                                    <option value="0 8.0">8:00 am </option>
                                    <option value="0 8.5">8:30 am </option>
                                    <option value="0 9.0" selected="">9:00 am </option>
                                    <option value="0 9.5">9:30 am </option>
                                    <option value="0 10.0">10:00 am </option>
                                    <option value="0 10.5">10:30 am </option>
                                    <option value="0 11.0">11:00 am </option>
                                    <option value="0 11.5">11:30 am </option>
                                    <option value="0 12.0">12:00 pm </option>
                                    <option value="0 12.5">12:30 pm </option>
                                    <option value="0 13.0">1:00 pm </option>
                                    <option value="0 13.5">1:30 pm </option>
                                    <option value="0 14.0">2:00 pm </option>
                                    <option value="0 14.5">2:30 pm </option>
                                    <option value="0 15.0">3:00 pm </option>
                                    <option value="0 15.5">3:30 pm </option>
                                    <option value="0 16.0">4:00 pm </option>
                                    <option value="0 16.5">4:30 pm </option>
                                    <option value="0 17.0">5:00 pm </option>
                                    <option value="0 17.5">5:30 pm </option>
                                    <option value="0 18.0">6:00 pm </option>
                                    <option value="0 18.5">6:30 pm </option>
                                    <option value="0 19.0">7:00 pm </option>
                                    <option value="0 19.5">7:30 pm </option>
                                    <option value="0 20.0">8:00 pm </option>
                                    <option value="0 20.5">8:30 pm </option>
                                    <option value="0 21.0">9:00 pm </option>
                                    <option value="0 21.5">9:30 pm </option>
                                    <option value="0 22.0">10:00 pm </option>
                                    <option value="0 22.5">10:30 pm </option>
                                    <option value="0 23.0">11:00 pm </option>
                                    <option value="0 23.5">11:30 pm </option>
                            </select>
                            </div>
                            <div class="col-lg-2">
                            <select class="hours-end  form-control ">
                                    <option value="0 0.5">12:30 am </option>
                                    <option value="0 1.0">1:00 am </option>
                                    <option value="0 1.5">1:30 am </option>
                                    <option value="0 2.0">2:00 am </option>
                                    <option value="0 2.5">2:30 am </option>
                                    <option value="0 3.0">3:00 am </option>
                                    <option value="0 3.5">3:30 am </option>
                                    <option value="0 4.0">4:00 am </option>
                                    <option value="0 4.5">4:30 am </option>
                                    <option value="0 5.0">5:00 am </option>
                                    <option value="0 5.5">5:30 am </option>
                                    <option value="0 6.0">6:00 am </option>
                                    <option value="0 6.5">6:30 am </option>
                                    <option value="0 7.0">7:00 am </option>
                                    <option value="0 7.5">7:30 am </option>
                                    <option value="0 8.0">8:00 am </option>
                                    <option value="0 8.5">8:30 am </option>
                                    <option value="0 9.0">9:00 am </option>
                                    <option value="0 9.5">9:30 am </option>
                                    <option value="0 10.0">10:00 am </option>
                                    <option value="0 10.5">10:30 am </option>
                                    <option value="0 11.0">11:00 am </option>
                                    <option value="0 11.5">11:30 am </option>
                                    <option value="0 12.0">12:00 pm </option>
                                    <option value="0 12.5">12:30 pm </option>
                                    <option value="0 13.0">1:00 pm </option>
                                    <option value="0 13.5">1:30 pm </option>
                                    <option value="0 14.0">2:00 pm </option>
                                    <option value="0 14.5">2:30 pm </option>
                                    <option value="0 15.0">3:00 pm </option>
                                    <option value="0 15.5">3:30 pm </option>
                                    <option value="0 16.0">4:00 pm </option>
                                    <option value="0 16.5">4:30 pm </option>
                                    <option value="0 17.0" selected="">5:00 pm </option>
                                    <option value="0 17.5">5:30 pm </option>
                                    <option value="0 18.0">6:00 pm </option>
                                    <option value="0 18.5">6:30 pm </option>
                                    <option value="0 19.0">7:00 pm </option>
                                    <option value="0 19.5">7:30 pm </option>
                                    <option value="0 20.0">8:00 pm </option>
                                    <option value="0 20.5">8:30 pm </option>
                                    <option value="0 21.0">9:00 pm </option>
                                    <option value="0 21.5">9:30 pm </option>
                                    <option value="0 22.0">10:00 pm </option>
                                    <option value="0 22.5">10:30 pm </option>
                                    <option value="0 23.0">11:00 pm </option>
                                    <option value="0 23.5">11:30 pm </option>
                                                          
                            </select>
                            </div>
                            <div class="col-lg-2">
                                
                            <select class="timing-day  form-control ">
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                            </div>
                            <button type="button" value="submit" class="ybtn add-hours col-lg-2"><span>Add Hours</span></button>
                        </div>
                        <div class="row">
                            <div class="hours-display ">
                                @if($company->company_hours)
                                    @foreach($company->company_hours as $hour)
                                        <div class='hours'>
                                            <span class='weekday'>{{ $hour->hours }}</span>
                                            <a href="{{ route('editProfile.remove.hours',$hour->id) }}" id='removeby_id' class='removeby_id-hours'>Remove</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-sm-12 form-group">
                        <label>Business Information</label>
                        <textarea name="comp_message" class="form-control" id="comp_message" rows="3">{{ $company->message }}</textarea>
                    </div>
                   
                    <div class="col-sm-12 form-group">
                        <label class="fieldlabels">Upload Image :</label> 
                        <div class="show">
                            <div class="icon">
                                <i class=" fa-solid fa-cloud-arrow-up"></i>
                            </div>
                        <input type="file" id="image" name="image" value="{{ $company->image }}" accept="image/*"> 
                        </div>
                    </div>
        
                    <div class="col-sm-12 form-group mb-0">
                       <button class="btn fl-header-phone-contain float-right" style="color:#fff">SAVE</button>
                    </div>
                </div>
                    
                </div>
                </form>
            </div>
       
 
    
    @include('layouts.foot')
    <!--Search-->
    <script>
    $('.nav').hide();
        $('#comp_subcategory').keyup(function(){
            $('.navs').empty()
            $('.sub_cate_list').empty();
            var category = $(this);
            
            if(category.val() ==''){
                $('.navs').hide();
                $('.sub_cate_list').empty();
            }else{
                
                $.ajax({
                    url:'/getcategory',
                    type:"GET",
                    dataType:"json",
                    data:{
                        category:category.val()
                    },
                    success:function(res) {
                        
                        $.each(res, function(key, value) {
                             //For example
                            $('.navs').show();
                            $('.sub_cate_list').empty();
                            $('.cate_list').show();
                            $('.navs').append(`<li class="category_list dropdown-item"> 
                                    <span>${value.name}</span>
                                    <input type="hidden" class ="cate_id" value='${value.id}'> 
                                </li>`
                                    // ${value.sub_category[0].name}
                                    // <input type="hidden" class ="subcate_id " value='${value.sub_category[0].id}'>
                                    // <span> > </span>
                                );
                            // $.each(value.sub_category, function(key, sub_cat) {
                            //     $('.sub_cate_list').show();
                            //     console.log(sub_cat.name);
                            //     $('.sub_cate_list').append(`<span class="badge badge-primary">${sub_cat.name}</span>
                            //         <input type="hidden" class ="subcate_id " value='${sub_cat.id}'>`
                            //     )
                    
                            // });
                        });
                    } 
                 });
            }
        })
    </script>
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
    <script>
        $('.ybtn').click(function(){
            var vals=$('.weekday').find(':selected').val();
            var select=$('.weekday').find(':selected').text(); //days 
            var select2=$('.hours-start').find(':selected').text();  //starting hours
            var select3=$('.hours-end').find(':selected').text(); //ending hours
            var select4=$('.timing-day').find(':selected').text(); //status
            var hours = select+' '+select2+' '+select3+' '+select4;
            
            
            $(".hours-display").append("<div class='hours'><span class='weekday'>"+select+"</span><span class='start'>"+select2+"</span><span>-</span><span class='end'>"+select3+"</span><span class='timin'>"+select4+"</span><a id='remove' class='remove-hours'>Remove</a><input type='hidden' name='BusinessDays[]' value='"+select+"'><input type='hidden' name='BusinessDaysStart[]' value='"+select2+"'><input type='hidden' name='BusinessDaysEnd[]' value='"+select3+"'><input type='hidden' name='BusinessDaysStatus[]' value='"+select4+"'><input type='hidden' name='BusinessHours[]' value='"+hours+"'><input type='hidden' name='BusinessHoursDay[]' value='"+vals+"'>");
        })
    </script>
    
    <script>
        $(document).on('click','.remove-hours', function(){
            $(this).parents('.hours').remove();
        })
        $(document).on('click','.remove-sub-cat', function(){
            var subCat = $(this).siblings('.select-sub-cat').text();
            var subCatId = $(this).siblings('.subcate_id').val();
            $('.sub_cate_list').append(`
                <span class="mr-3  sub-cat-item badge badge-primary ">${subCat}
                    <input type="hidden" class ="subcate_id" value='${subCatId}'> 
                </span>`

            )
            $(this).parents('.sub-category').remove();
            // alert(subCatId);sub-category
            
            // $(this).parents('.select-sub-cat').remove();
            // $('.sub_cate_list').append(`
            //     <span class="mr-3  sub-cat-item badge badge-primary ">${sub_cat.name}
            //         <input type="hidden" class ="subcate_id" value='${sub_cat.id}'> 
            //     </span>`
            // )
        })
        $(document).on('click','.remove-subcat', function(){
            $(this).parents('.remove-cat').remove();
        })
        
      
    </script>
    <script>
        $(document).on('click','.category_list', function(){
            var cat = $(this).text();
            var cat_id = $(this).children('.cate_id').val();
            // var sub_cat_id = $(this).children('.subcate_id').val();
            // console.log(cat);
            
            $('.add-category').append(`
                <div class='remove-cat category'>
                    <strong>${cat}</strong>
                    <input type='hidden' value='${cat_id}'>
                    <a id='remove-btn' class='remove-subcat'>Remove</a>
                </div>
            `)
            $('.comp_subcategory').hide();
            $('.navs').hide();
            $('.sub_cate_list').empty();
          
            $('.main-subcategory').show()
            $('#comp_subcategory').val('')
            $.ajax({
                url:'/getsubcategory',
                type:"GET",
                dataType:"json",
                data:{
                    cat_id:cat_id
                },
                success:function(res) {
                    $.each(res, function(key, sub_cat) {
                        $('.sub_cate_list').show();
                        $('.sub_cate_list').append(`
                                <span class="mr-3  sub-cat-item badge badge-primary ">${sub_cat.name}
                                    <input type="hidden" class ="subcate_id" value='${sub_cat.id}'> 
                                    <input type="hidden" class ="cate_id" value='${cat_id}'> 
                                </span>`
                        )
                        
                    });
                    
                    // $.each(res, function(key, value) {
                    //     $('.sub_cate_list').append(`<div class="remove-sub-cat">
                    //     <span>1</span>
                    //     </div>`
                    // }
                } 
            });
            
        });
        $(document).on('click','.sub-cat-item', function(){
            var subCat = $(this).text();
            var subCatId = $(this).children('.subcate_id').val();
            var CatId = $(this).children('.cate_id').val();
            
            
            $('.add-sub-category').append(`
                <div class=' mr-3 badge badge-primary sub-category'>
                    <span class="select-sub-cat ">${subCat}</span>
                    <input type="hidden" name="subcategory_id[]" class ="subcate_id" value='${subCatId}'> 
                    <input type="hidden" name="category_id[]" class ="cate_id" value='${CatId}'> 
                    <a id='remove-btn' class='remove-sub-cat'>x</a>
                </div> 
                `)
            $(this).remove();
            
           
           
            // var sub-cate = $(this).text();
            // var sub_cat_id = $(this).children('.subcate_id').val();
            // // console.log(cat);
            // // console.log(cat_id);
            
            // $('.add-subcategory').append(`
            //     <div class='remove-cat sub-category'>
            //         <strong>${sub-cate}</strong>
            //         <input type='hidden' name='subcategory_id[]' value='${sub_cat_id}'>
            //         <a id='remove-btn' class='remove-subcat'>Remove</a>
            //     </div>
            // `)
        })
        
        $('.js-add-category').click(function(){
            $('.comp_subcategory').toggle();
             $('.sub_cate_list').empty();
        })
        
    </script>
    
    <script>
    $('.nav1').hide();
        $('#comp_city').keyup(function(){
              $('.nav1').show();
            $('#comp_city').siblings('.nav1').children('li').remove();
            var comp_city = $('#comp_city').val();
            
            if(comp_city ==''){
                $('.nav1').hide();
            }
            else{
          
                $.ajax({
                    url:'/getValue',
                    type:"POST",
                    dataType:"json",
                    data:{
                        comp_city:comp_city,
                        
                    },
                    success:function(data) {
                        $.each(data,function(key,value) {
                            $('#comp_city').siblings('.nav1').append(`<li class='selCity dropdown-item'>
                                <span class='zipVal' style='display:none;' >${data[key].zipcode}</span>
                                <span class='cityVal'>${data[key].city}</span>
                                <span class='stateVal' style='display:none;'>${data[key].statefull}</span>
                                </li>`
                            );
                            
                        });
                       
                    }
                });
            }
      
        });
        $('.nav2').hide();
        $('#comp_state').keyup(function(){
              $('.nav2').show();
            $('#comp_state').siblings('.nav2').children('li').remove();
            var comp_state = $('#comp_state').val();
            if(comp_state ==''){
                $('.nav2').hide();
            }
            else{
                $.ajax({
                url:'/getValue',
                type:"POST",
                dataType:"json",
                data:{
                    comp_state:comp_state,
                    
                },
                success:function(data) {
                    $.each(data,function(key,value) {
                        $('#comp_state').siblings('.nav2').append(`<li class='selState dropdown-item'>
                            <span class='zipVal' style='display:none;' >${data[key].zipcode}</span>
                            <span class='cityVal' style='display:none;'>${data[key].city}</span>
                            <span class='stateVal'>${data[key].statefull}</span>
                            </li>`
                        );
                        
                    });
                   
                }
            });
                
            }
            
            
        });
        
        $('.nav3').hide();
        $('#comp_postalcode').keyup(function(){
              $('.nav3').show();
            $('#comp_postalcode').siblings('.nav3').children('li').remove();
            var comp_postalcode = $('#comp_postalcode').val();
            if(comp_postalcode ==''){
                $('.nav3').hide();
            }
            else{
                $.ajax({
                url:'/getValue',
                type:"POST",
                dataType:"json",
                data:{
                    comp_postalcode:comp_postalcode,
                },
                success:function(data)
                {
                    $.each(data,function(key,value) {
                        
                        $('#comp_postalcode').siblings('.nav3').append(`<li class='selZip dropdown-item'>
                            <span class='zipVal' >${data[key].zipcode}</span>
                            <span class='cityVal' style='display:none;'>${data[key].city}</span>
                            <span class='stateVal' style='display:none;'>${data[key].statefull}</span>
                        </li>`);
                        
                    });
                    $(document).on('click','.selZip',function(){
                        $('.nav3').hide()
                        var zipcode = $(this).children('.zipVal').text();
                        var state = $(this).children('.stateVal').text();
                        var city = $(this).children('.cityVal').text();
                        
                        $('#comp_postalcode').val(zipcode);
                        $('#comp_state').val(state);
                        $('#comp_city').val(city);
                        $('#comp_postalcode').siblings('.nav3').children('li').remove();
                        
                        
                    });
                    $(document).on('click','.selState',function(){
                        $('.nav2').hide()
                        var zipcode = $(this).children('.zipVal').text();
                        var state = $(this).children('.stateVal').text();
                        var city = $(this).children('.cityVal').text();
                        
                        $('#comp_postalcode').val(zipcode);
                        $('#comp_state').val(state);
                        $('#comp_city').val(city);
                        $('#comp_state').siblings('.nav2').children('li').remove();
                        
                    });
                    $(document).on('click','.selCity',function(){
                         $('.nav1').hide()
                        var zipcode = $(this).children('.zipVal').text();
                        var state = $(this).children('.stateVal').text();
                        var city = $(this).children('.cityVal').text();
                        
                        $('#comp_postalcode').val(zipcode);
                        $('#comp_state').val(state);
                        $('#comp_city').val(city);
                        $('#comp_city').siblings('.nav1').children('li').remove();
                       
                        
                    });
                   
                }
            });
            }
        });
        
        $(document).on('click','.selZip',function(){
            $('.nav3').hide()
            var zipcode = $(this).children('.zipVal').text();
            var state = $(this).children('.stateVal').text();
            var city = $(this).children('.cityVal').text();
            
            $('#comp_postalcode').val(zipcode);
            $('#comp_state').val(state);
            $('#comp_city').val(city);
            $('#comp_postalcode').siblings('.nav3').children('li').remove();
            

        });
        $(document).on('click','.selState',function(){
            $('.nav2').hide()
            var zipcode = $(this).children('.zipVal').text();
            var state = $(this).children('.stateVal').text();
            var city = $(this).children('.cityVal').text();
            
            $('#comp_postalcode').val(zipcode);
            $('#comp_state').val(state);
            $('#comp_city').val(city);
            $('#comp_state').siblings('.nav2').children('li').remove();
            
        });
        $(document).on('click','.selCity',function(){
            $('.nav1').hide()
            var zipcode = $(this).children('.zipVal').text();
            var state = $(this).children('.stateVal').text();
            var city = $(this).children('.cityVal').text();
            
            $('#comp_postalcode').val(zipcode);
            $('#comp_state').val(state);
            $('#comp_city').val(city);
            $('#comp_city').siblings('.nav1').children('li').remove();
            
        });
        
       
    </script>
    
</body>

</html>
