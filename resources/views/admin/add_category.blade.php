<!doctype html>

<html lang="en">

  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> Refer Reviews - Admin</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="{{ asset("css/main.css") }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
            integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <meta name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">

        <!-- <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet"> -->

    </head>
    <style>
        .category_table table{
            margin: 0% !important;
        }
    </style>

<body>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.partials.navbar')
        <div class="app-main">
            @include('admin.partials.sidebar')
            <div class="app-main__outer my-2">
                <div class="container">
                    <div>
                    </div>
                    <div class="add_categor d-flex justify-content-around">
                        <div>
                            <ul>
                                <li style=" font-size: 24px; font-weight: 700; ">Transportation Category Should Be On Top</li>
                            </ul>
                        </div>
                        <div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add Category</button>
                        </div>
                    </div>
                   
                    @if(session()->has('success'))
                        <div class="alert bg-success text-light alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                    @endif
                    @if(session()->has('delete'))
                        <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                            {{ session()->get('delete') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                    @endif
                    @if($errors->any())
                        <br>
                        @foreach ($errors->all() as $error)
                            <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                              {{$error}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        @endforeach
                    @endif
                    
                    <div class="category_table">
                        <table>
                           <thead>
                                <tr>
                                <th>S.No</th>
                                <th>Images</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                           </thead>
                           <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td><b>{{ $category->id}}</b></td>
                                        <td><img src="{{ asset('storage/categoryImage/'.$category->image) }}" /></td>
                                        <td>
                                            <span>
                                                    Category : {{ $category->name}} <br>
                                            </span>
                                            
                                            <br>
                                                SubCategory :
                                                <br>
                                            @foreach($category->sub_category as $sub_category )
                                                <span>
                                                    {{ $sub_category->name}}
                                                    <a href='#'>
                                                        <i class="fa fa-close delSubCate"></i>
                                                        <input name='subcate_id' value='{{ $sub_category->id }}' id='subcate_id' type="hidden"  class="form-control subcate_id" />
                                                    </a>    
                                                    <br>
                                                </span>
                                            @endforeach
                                                <a href='#' class="get_id">
                                                    <i data-toggle="modal" data-target="#addsubcategory" class="fa fa-plus  addSubCate"></i>
                                                </a>  
                                                <input name='cate_id' value='{{ $category->id}}' id='' type="hidden"  class="form-control cate_id" />
                                             
                                        </td>
                                        <td>
                                           <a href='#' class='btn btn-primary editbtn' data-toggle="modal" data-target="#editModal">Edit</a>
                                           <input name='cate_id' value='{{ $category->id}}' id='' type="hidden"  class="form-control cate_id" />
                                           <a href='#' class='btn btn-danger delbtn'>Remove</a>
                                       </td>
                                    </tr>
                               
                                @endforeach
                           </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
<!--Add Category-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                  <form action="{{ route('admin.submitCategory') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                  <div class="modal-body">
                    <div class="form-group">
                        <label><b>Name</b></label>
                        <input name='category' id='cate_name' type="text" class="form-control" placeholder="Enter Category Name" />
                    </div>
                    <div class="form-group">
                         <label><b>Images</b></label>
                        <input id='image' name='image' accept="image/png,image/jpg,image/jpeg,image/svg" id='image' type="file" class="form-control" />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Save</button>
                  </div>
                  </form>
        </div>
    </div>
  
</div>

<!--// Edit Model-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('admin/edit_category') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-group">
                <label><b>Name</b></label>
                <input name='cate_id' value='' id='edt_cate_id' type="hidden"  class="form-control" />
                <input name='category' value='' id='edt_cate_name' type="text"  class="form-control" />
  		        <input type="hidden" value="" name="image_name" id='edit_image_name' />
            </div>
            <div class="form-group imgEdit">
                 <label><b>Images</b></label>
                <input value=''  name='image' accept="image/png,image/jpg,image/jpeg,image/svg" id='cate_image' type="file" class="form-control" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary ">Update</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!--Add SubCategory-->
<div class="modal fade" id="addsubcategory" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Add SubCategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('admin/add_subcategory') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-group">
                <label><b>Category</b></label>
                <input name='cate_id' value='' id='AddSubCateIdInput' type="hidden"  class="form-control" />
                <input name='cate_name' value='' id='AddSubCateNameInput' type="test"  class="form-control" />
                <!--<input name='category' value='' id='category' type="text"  class="form-control" />-->
            </div>
            <div class="form-group">
                <label><b>Sub Category Name</b></label>
                <input name='sub_category' value='' id='sub_category' type="text"  class="form-control" />
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary ">Add SubCategory</button>
          </div>
      </form>
    </div>
  </div>
</div>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script type="text/javascript"
        src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
    </script>
    
    <script>
        $(document).ready(function(){ 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.editbtn').click(function(){
                  var url = "{{asset('')}}"
                 var cate_id = $(this).siblings('.cate_id').val();
                $.ajax({
                url: "{{ route('admin.getCategory') }}",
                type:"GET",
                data: {
                    cate_id: cate_id,
                },
                success: function(res){
          		    
          		    $('#edt_cate_name').val(res.category.name);
          		    $('#edt_cate_id').val(res.category.id);
          		    
          		    
          		    if(res.category.image)
          		    {
              		    $('.imgEdit').append(`
              		        <img src="${url}/storage/categoryImage/${res.category.image}" name="image" style="width:100px;height:100px;" class="rounded-circle" />
              		    `);
              		    $('#edit_image_name').val(res.category.image);
          		    }
          		    // $('#cate_image').val(res.category.id);
        	        }
                });
            });
            $('.get_id').click(function(){
                var url = "{{asset('')}}"
                var cate_id = $(this).siblings('.cate_id').val();
                $.ajax({
                url: "{{ route('admin.getCategory') }}",
                type:"GET",
                data: {
                    cate_id: cate_id,
                },
                success: function(res){
          		    $('#AddSubCateNameInput').val(res.category.name);
          		    $('#AddSubCateIdInput').val(res.category.id);
          		    
          		    
          		    if(res.category.image)
          		    {
              		    $('.imgEdit').append(`
              		        <img src="${url}/storage/categoryImage/${res.category.image}" name="image" style="width:100px;height:100px;" class="rounded-circle" />
              		    `);
              		    $('#edit_image_name').val(res.category.image);
          		    }
          		    // $('#cate_image').val(res.category.id);
        	        }
                });
            });
            $('.delbtn').click(function(e){
                e.preventDefault();
                var cate_id = $(this).siblings('.cate_id').val();
                $.ajax({
                url: "{{ route('admin.delCategory') }}",
                type:"GET",
                data: {
                    cate_id: cate_id,
                },
                success: function(res){
                    // location.reload();
                    $('body').html('');
                    $('body').html(res);
                }
          		   
                });
            });
            
            $('.delSubCate').click(function(e){
                e.preventDefault();
                var subcate_id = $(this).siblings('.subcate_id').val();
                $.ajax({
                url: "{{ route('admin.delSubCategory') }}",
                type:"GET",
                data: {
                    subcate_id: subcate_id,
                },
                success: function(res){
                    // location.reload();
                    $('body').html('');
                    $('body').html(res);
                }
          		   
                });
            });
        });
    </script>
</body>

</html>
