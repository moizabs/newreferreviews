<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> Refer Reviews - Admin Review List</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
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

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('admin.partials.navbar')
    <div class="app-main">
        @include('admin.partials.sidebar')
        <div class="app-main__outer">
            <div class="container">
                <div class="col-12">
                    <div class="main-card mb-3 card my-4">
                        <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{Session::get('message')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                            @endif
                            <h5 class="card-title">
                                @if(\Request::segment(3) == 'businesses')
                                    Businesses
                                @elseif(\Request::segment(3) == 'customers')
                                    Customers
                                @endif
                            </h5>
                            <!--<div class="row">-->
                            <!--    <div class="col-sm-12 col-md-12 col-lg-12 float-left">-->
                            <!--            <div class="input-group my-3">-->
                            <!--            <input id='searchText' name="search" type="text" class="form-control" placeholder="Search">-->
                            <!--            <div class="input-group-append">-->
                            <!--            <button id='searchBtn' class="input-group-text" type="submit">Search</button>-->
                            <!--              </div>-->
                            <!--            </div>-->
                            <!--    </div> -->
                            <!--</div>-->
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 allData">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table top-companies table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ $data[0]->type == "USER" ? 'Customer Name' : 'Company Name' }}</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>View Messages</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            <tr>
                                                                <td>
                                                                    <span>{{ $item->type == "USER" ? $item->first_name : $item->comp_name }}</span>
                                                                        
                                                                </td>
                                                                <td>
                                                                   
                                                                    <span>{{ $item->type == "USER" ? $item->email : $item->email }}</span>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <span>{{ $item->type == "USER" ? $item->phone : $item->phone }}</span>
                                                                        <span>
                                                                        </span>
                                                                    </div>
                                                                </td>
    
    
                                                                
                                                                <td>
                                                                    <form action="{{ route('admin.view.chat') }}" method="POST">
                                                                        @csrf
                                                                        <input name='url' type="hidden"  value="{{\Request::segment(3)}}" />
                                                                        @if($item->type == 'USER')
                                                                            <input name='user_id' type="hidden"  value="{{ $item->id }}" />
                                                                        @else
                                                                            <input name='buss_id' type="hidden"  value="{{ $item->id }}" />
                                                                        @endif
                                                                        
                                                                        <Button class="btn " type="submit">Action</Button>
                                                                    </form>
    
                                                                </td>
                                                            </tr>
                                                        @endforeach
    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-7">
                                                <div class="d-flex">
                                                    
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
            </div>
        </div>

    </div>
</div>

   

    
    <input type="hidden" class="url" value="{{\Request::segment(2)}}" />
    <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
    </script>
    <script>
        
    
            
    function index(page)
    {
        var url = $('.url').val();
        var search = $('#searchText').val();
        $.ajax({
          url: "{{ url('admin') }}/"+url+"_search?page="+page,
          type:"GET",
          data: {
            search: search,
            },
        
         
          success: function(res){
          		$(".allData").html("");
                $(".allData").html(res);
          	
         
        	}
      });
    }
    
    $('#searchText').keypress(function(e){
        if(e.which == 13)
        {
            index(1);
        }
    })
    
     $(document).ready(function(){
         
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('#searchBtn').click(function(){
          index(1);
        });  
        
        $(document).on("click", ".pagination a", function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1]; 
            index(page);
        });
    });
    
   
    </script>
</body>

</html>
