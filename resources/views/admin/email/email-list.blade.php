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
    
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.partials.navbar')
        <div class="app-main">
            @include('admin.partials.sidebar')
            <div class="app-main__outer my-2">
                <div class="content-wrapper " style="min-height: 688px;">
                    <section class="content-header m-3 ">
                        <h1> Support Mailbox <small> {{ $getEmail->count() }} </small> </h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('admin.dashbord')}}"><i class="fa fa-dashboard"></i> Home</a></li><span>-</span>
                            <li class="active">Mailbox</li>
                        </ol>
                    </section>
                    <section class="content">
                        <div class="m-5" >
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Inbox</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="dataTables_length" id="example2_length">
                                                    <label>Show 
                                                        <select name="example2_length" aria-controls="example2" class="form-control input-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> 
                                                    entries
                                                    </label>
                                                </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div id="example2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example2"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="example2_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 56.5938px;">Type</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 631.625px;">From</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 230.031px;">Subject</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 230.031px;">Title</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 71.125px;">Received on</th>
                                                            <!--<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 50.625px;">Status</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($getEmail as $email)
                                                            <tr role="row" class="odd">
                                                            <td> Visitor </td> 
                                                            <td class="mailbox-name"> 
                                                                <a href=""> {{ $email->name }} <br> {{ $email->email }} </a>
                                                            </td>
                                                            <td class="mailbox-title"> 
                                                                <span> <b> {{ Illuminate\Support\Str::limit($email->title, 20)}}</b>  </span>
                                                            </td>
                                                            
                                                            <td class="mailbox-subject"> 
                                                                <a href="{{ route('admin.view.email',$email->id)}}"> <b> {{ Illuminate\Support\Str::limit($email->message, 20)}}
                                                                    <br>
                                                                    </b>-Read Message &gt;
                                                                    
                                                                </a>
                                                            </td>
                                                            <td class="mailbox-date"> {{ \Carbon\Carbon::parse($email->created_at)->format('m/d/Y') }} </td>
                                                            
                                                        </tr> 
                                                        @endforeach()
                                                    </tbody>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                        
                        
                </div>
        
    </body>


</html>

