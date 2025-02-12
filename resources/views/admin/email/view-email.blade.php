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
        <style>
            .box {
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            
            box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
        }
        .box.box-primary {
            border-top-color: #3c8dbc;
        }
        .box-header.with-border {
            border-bottom: 1px solid #f4f4f4;
        }
        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
        }
        .no-padding {
            padding: 0 !important;
        }
        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px;
        }
        .box-footer {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-top: 1px solid #f4f4f4;
            padding: 10px;
            background-color: #fff;
        }
        .pull-right {
            float: right;
        }
        .btn-default {
            background-color: #f4f4f4;
            color: #444;
            border-color: #ddd;
        }
        .btn {
            border-radius: 3px;
            -webkit-box-shadow: none;
            box-shadow: none;
            border: 1px solid transparent;
        }
        .mailbox-read-info {
            border-bottom: 1px solid #f4f4f4;
            padding: 10px;
        }
        .mailbox-read-info h3 {
            font-size: 20px;
            margin: 0;
        }
        .mailbox-read-info h5 {
            margin: 0;
            padding: 5px 0 0 0;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .mailbox-read-message {
            padding: 10px;
        }
        p {
            margin: 0 0 10px;
        }
        </style>

    </head>
    
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            @include('admin.partials.navbar')
            <div class="app-main">
                @include('admin.partials.sidebar')
                <div class="app-main__outer my-2">
                    <div class="content-wrapper " style="min-height: 688px;">
                        <!--Add-->
                        <div class="content-wrapper" style="min-height: 631px;">
                            <section class="content-header">
                                <h1 style="padding-right: 45.5rem;"> Read Support Mail </h1>
                                <ol class="breadcrumb"> 
                                    <li><a href="{{ route('admin.dashbord')}}"><i class="fa fa-dashboard"></i> Home</a></li><span>-</span>
                                    <li class="active">Mailbox</li>
                                </ol>
                            </section>
                            <section class="content">
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="box box-primary m-5">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Read Mail</h3>
                                                <div class="box-tools pull-right">
                                                    <a href="{{ route('admin.getEmails') }}" style="margin-top: 10px; " class="btn btn-box-tool" ><i class="fa fa-chevron-left"></i> Return to Mailbox</a>
                                                </div>
                                            </div> 
                                            <div class="box-body no-padding">
                                                <div class="mailbox-read-info">
                                                    <h3>{{ $email->title}}</h3>
                                                    <h5>From: {{ $email->email}} <span class="mailbox-read-time pull-right">{{ \Carbon\Carbon::parse($email->created_at)->format('M/d/Y h:i a') }} </span> </h5>
                                                </div>
                            
                                                <div class="mailbox-read-message">
                                                    <p class="text-left pl-3">
                                                        {{ $email->message}}
                                                    </p>
                                                </div>
                                            </div>
                            
                                            <div class="box-footer">
                                                <div class="text-center">
                                                    <!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-reply"></i> Reply to this Mail</button>-->
                                                    <a href="{{ route('admin.reply.email')}}" type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply to this Mail</a>
                                                    <button type="button" class="pull-right btn btn-default" data-toggle="modal" data-target="#myModal2"><i class="fa fa-eye"></i> View Mail History</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>


</html>



<!--<!doctype html>-->

<!--<html lang="en">-->

<!--  <head>-->
<!--        <meta charset="utf-8">-->
<!--        <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--        <meta http-equiv="Content-Language" content="en">-->
<!--        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--        <title> Refer Reviews - Admin</title>-->
<!--        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
<!--        <link rel="stylesheet" href="{{ asset('css/style.css') }}">-->
<!--        <link href="{{ asset("css/main.css") }}" rel="stylesheet">-->
<!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"-->
<!--            integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="-->
<!--            crossorigin="anonymous" referrerpolicy="no-referrer" />-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">-->
        <!--<meta name="viewport"-->
        <!--    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />-->
<!--        <meta name="description" content="This is an example dashboard created using build-in elements and components.">-->
<!--        <meta name="msapplication-tap-highlight" content="no">-->
<!--        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">-->
<!--        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">-->
        
<!--</head>-->
<!--<style>-->
<!--    .Top_div{-->
<!--        display:flex;-->
<!--    }-->
<!--    .content_top_div{-->
<!--        width: 100%;-->
<!--        text-align: -webkit-center;-->
        
<!--        margin-top:20px;-->
<!--    }-->
<!--    .card_headings{-->
<!--        display: flex;-->
<!--        flex-wrap: wrap;-->
<!--        justify-content: space-between;-->
<!--        align-items: center;-->
<!--    }-->
<!--    .button_div{-->
<!--        display: flex;-->
<!--        justify-content: space-around;-->
<!--        flex-wrap:wrap;-->
<!--    }-->
<!--    .button_btn{-->
<!--        margin:0 12px 10px 0;-->
<!--        color: white;-->
<!--        border-radius: 30px;-->
<!--        box-shadow: 0 2.8px 2.2px rgb(0 0 0 / 3%), 0 6.7px 5.3px rgb(0 0 0 / 5%), 0 12.5px 10px rgb(0 0 0 / 6%), 0 22.3px 17.9px rgb(0 0 0 / 7%), 0 41.8px 33.4px rgb(0 0 0 / 9%), 0 100px 80px rgb(0 0 0 / 12%);-->
<!--    }-->
<!--    .button_btn_red{-->
<!--        margin:0 12px 10px 0;-->
<!--        color: white;-->
<!--        border-radius: 30px;-->
<!--        box-shadow: 0 2.8px 2.2px rgb(0 0 0 / 3%), 0 6.7px 5.3px rgb(0 0 0 / 5%), 0 12.5px 10px rgb(0 0 0 / 6%), 0 22.3px 17.9px rgb(0 0 0 / 7%), 0 41.8px 33.4px rgb(0 0 0 / 9%), 0 100px 80px rgb(0 0 0 / 12%);-->

<!--    }-->
<!--    .button_btn:hover{-->
<!--        background-color:#0ca9e1 !important;-->
<!--        color: white !important;-->
<!--    }-->
<!--    .home_heading{-->
<!--        color:#0ca9e1 !important;-->
<!--    }-->
<!--    .home_heading:hover{-->
<!--        color:#0dcaf0 !important;-->
        
<!--    }-->
<!--    .input_div{-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--    }-->
<!--    .input_form{-->
<!--        border: none;-->
<!--        border-bottom: 2px solid #2e353d !important;-->
<!--    }-->
<!--    .input_form:hover{-->
<!--        border:none !important;-->
<!--        box-shadow:none !important;-->
<!--        border-bottom: 2px solid #0dcaf0 !important;-->
<!--    }-->
<!--    .heading_h1{-->
<!--            color: #0dcaf0;-->
<!--    }-->
<!--    .footer_div{-->
<!--        display:flex !important; justify-content: space-evenly !important;-->
<!--    }-->
<!--</style>-->
<!--<body>-->
<!-- <div class="Top_div">-->
<!--     <div class="side_div" style="background-color: #2e353d;">-->
<!--            @include('admin.partials.sidebar')-->
<!--     </div>-->
     
<!--     <div class="content_top_div">-->
         
<!--         <div>-->
<!--             <h1 style="text-align: left; margin:15px; color:#0ca9e1;">Read Support Mail</h1>-->
<!--         </div>-->
         
         <!--<div style="margin-left:25px;>-->
         <!--    <nav aria-label="breadcrumb">-->
         <!--     <ol class="breadcrumb">-->
         <!--       <li class="breadcrumb-item home_heading"><a href="#" class="home_heading">Home</a></li>-->
         <!--       <li class="breadcrumb-item active" style="color:#2e353d;"  aria-current="page">Mail Box</li>-->
         <!--     </ol>-->
         <!--   </nav>-->
         <!--</div>-->
         
         
         <!--    <div class="card" style="width:80%">-->
         <!--     <div class="card-body">-->
         <!--       <h2 style="text-align: start;">Read Mail</h2>-->
         <!--       <hr />-->
         <!--       <h6 style="text-align: left; ">To: Reciver@Emailaddress</h6>-->
         <!--       <div class="card_headings">-->
         <!--       <h6>From: Sender@Emailaddress</h6>-->
         <!--       <h6>15-oct-2022 2:30pm</h6>-->
         <!--       </div>-->
         <!--       <hr />-->
         <!--       <p class="card-text">mple text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content</p>-->
         <!--       <div class="button_div">-->
         <!--       <button type="button" class="btn btn-info button_btn"><i class="fa fa-chevron-left"></i> Return to Mailbox</button>-->
                
                <!-- Button trigger modal -->
         <!--       <button type="button" class="btn btn-info button_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-reply"></i> Reply to this Mail</button>-->
                
                <!-- Modal -->
         <!--       <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">-->
         <!--         <div class="modal-dialog">-->
         <!--           <div class="modal-content">-->
         <!--             <div class="modal-header">-->
         <!--               <h1 class="modal-title fs-5 heading_h1" id="staticBackdropLabel" >Reply</h1>-->
         <!--               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
         <!--             </div>-->
                      
         <!--            <div class="modal-body mx-3">-->
         <!--               <div class="md-form mb-5 input_div">-->
         <!--                 <i class="fas fa-user prefix grey-text" style="margin-right:20px;font-size: 25px;color: #0dcaf0;"></i>-->
         <!--                 <input type="text" id="form34" placeholder="To" class="form-control validate input_form" style="border: none;border-bottom: 2px solid #0dcaf0;">-->
         <!--               </div>-->
         <!--               <div class="md-form mb-5  input_div">-->
         <!--                 <i class="fas fa-envelope prefix grey-text" style="margin-right:20px;font-size: 25px;color: #0dcaf0;"></i>-->
         <!--                 <input type="email" id="form29" placeholder="From"  class="form-control validate input_form"  style="border: none;border-bottom: 2px solid #0dcaf0;">-->
         <!--               </div>-->
         <!--               <div class="md-form mb-5  input_div">-->
         <!--                 <i class="fas fa-tag prefix grey-text" style="margin-right:20px;font-size: 25px;color: #0dcaf0;"></i>-->
         <!--                 <input type="text"  id="form32" class="form-control validate input_form"  placeholder="Subject" style="border: none;border-bottom: 2px solid #0dcaf0;">-->
         <!--                 </div>-->
         <!--               <div class="md-form mb-5  input_div">-->
         <!--                 <i class="fas fa-pencil prefix grey-text" style="margin-right:20px;font-size: 25px;color: #0dcaf0;"></i>-->
         <!--                 <textarea type="text" id="form8" class="md-textarea form-control input_form" rows="4" placeholder="Message" style="border: none;border-bottom: 2px solid #0dcaf0;"></textarea>-->
         <!--               </div>-->
         <!--         </div>-->
                          

         <!--             <div class="modal-footer footer_div" style:"display:flex !important; justify-content: space-evenly !important;">-->
         <!--               <button type="button" class="btn btn-danger button_btn_red" data-bs-dismiss="modal">Close</button>-->
         <!--               <button type="button" class="btn btn-info button_btn">Send</button>-->
         <!--             </div>-->
         <!--           </div>-->
         <!--         </div>-->
         <!--       </div>-->
                
                
         <!--       <button type="button" class="btn btn-info button_btn"><i class="fa fa-eye"></i> View Mail History</button>-->
               
         <!--       </div>-->
         <!--     </div>-->
         <!--   </div>-->
       
         
<!--     </div>-->
     
<!-- </div>-->
 
 
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>-->
<!--</body>-->
<!--</html>-->