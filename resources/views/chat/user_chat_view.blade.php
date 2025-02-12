<!DOCTYPE html>
<html lang="en">
<head>
    <title>Refer Reviews - Chat Page</title>
    @include('layouts.head')
    <!--File-->
   
</head>

<body>
    <style>
        


/* *******************************
message-area
******************************** */
.totalrating .rating__ {
    font-size: 0.8rem;
    cursor: pointer;
    color: #9c27b0;
    transition: filter linear .3s;
}

.totalaverage {
    font-size: 1rem;
    margin-top: 10px;
    color: #673ab7 !important; 
    font-weight: 700;
}

.message-area {
    height: 100vh;
    overflow: hidden;
    padding: 30px 0;
    background: #f5f5f5;
    display: contents;
}

.container{
    
    max-width: inherit !important;
}

.chat-area {
    position: relative;
    width: 100%;
    background-color: #fff;
    border-radius: 0.3rem;
    height: 90vh;
    overflow: hidden;
    min-height: calc(100% - 1rem);
}

.chatlist {
    outline: 0;
    height: auto;
    overflow: hidden;
    width: 300px;
    float: left;
    
}

.chat-area .modal-content {
    border: none;
    border-radius: 0;
    outline: 0;
    height: 100%;
}

.chat-area .modal-dialog-scrollable {
    height: 100% !important;
}

.chatbox {
    width: auto;
    overflow: hidden;
    height: auto;
    border-left: 1px solid #ccc;
}

.chatbox .modal-dialog,
.chatlist .modal-dialog {
    max-width: 100%;
    margin: 0;
}

.msg-search {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.chat-area .form-control {
    display: block;
    width: 80%;
    padding: 0.375rem 0.75rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #222;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.chat-area .form-control:focus {
    outline: 0;
    box-shadow: inherit;
}

a.add img {
    height: 36px;
}

.chat-area  {
    border-bottom: 1px solid #dee2e6;
    align-items: center;
    justify-content: space-between;
    flex-wrap: inherit;
}

.chat-area {
    width: 100%;
}

.chat-area {
    width: 100%;
    color: #180660;
    font-size: 14px;
    font-weight: 500;
    line-height: 1.5;
    text-transform: capitalize;
    margin-top: 5px;
    margin-bottom: -1px;
    background: 0 0;
    border: 1px solid transparent;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
}

.chat-area .nav-tabss .nav-items.show .nav-links,
.chat-area .nav-tabss .nav-links.active {
    color: #222;
    background-color: #fff;
    border-color: transparent transparent #000;
}

.chat-area .nav-tabss .nav-links:focus,
.chat-area .nav-tabss .nav-links:hover {
    border-color: transparent transparent #000;
    isolation: isolate;
}

.chat-list h3 {
    color: #222;
    font-size: 16px;
    font-weight: 500;
    line-height: 1.5;
    text-transform: capitalize;
    margin-bottom: 0;
}

.chat-list p {
    color: #343434;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    text-transform: capitalize;
    margin-bottom: 0;
}

.chat-list a.d-flex {
    margin-bottom: 15px;
    position: relative;
    text-decoration: none;
}

.chat-list .active {
    display: block;
    content: '';
    clear: both;
    position: absolute;
    bottom: 3px;
    left: 34px;
    height: 12px;
    width: 12px;
    background: #00DB75;
    border-radius: 50%;
    border: 2px solid #fff;
}

.msg-head h3 {
    color: #222;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.5;
    margin-bottom: 0;
}

.msg-head p {
    text-align: start;
    color: #343434;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    text-transform: capitalize;
    margin-bottom: 0;
}

.msg-head {
    padding: 15px;
    border-bottom: 1px solid #ccc;
}

.moreoption {
    display: flex;
    align-items: center;
    justify-content: end;
}

.moreoption .navbar {
    padding: 0;
}

.moreoption li .nav-links {
    color: #222;
    font-size: 16px;
}

.moreoption .dropdown-toggle::after {
    display: none;
}

.moreoption .dropdown-menu[data-bs-popper] {
    top: 100%;
    left: auto;
    right: 0;
    margin-top: 0.125rem;
}

.msg-body ul {
    overflow: hidden;
}

.msg-body ul li {
    list-style: none;
    margin: 15px 0;
}

.msg-body ul li.sender {
    display: block;
    width: 100%;
    position: relative;
}

.msg-body ul li.sender:before {
    display: block;
    clear: both;
    content: '';
    position: absolute;
    top: -6px;
    left: -7px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 12px 15px 12px;
    border-color: transparent transparent #f5f5f5 transparent;
    -webkit-transform: rotate(-37deg);
    -ms-transform: rotate(-37deg);
    transform: rotate(-37deg);
}

.msg-body ul li.sender p {
    color: #000;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 400;
    padding: 15px;
    background: #f5f5f5;
    display: inline-block;
    border-bottom-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    margin-bottom: 0;
}

.msg-body ul li.sender p b {
    display: block;
    color: #180660;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 500;
}

.msg-body ul li.repaly {
    display: block;
    width: 100%;
    text-align: right;
    position: relative;
}

.msg-body ul li.repaly:before {
    display: block;
    clear: both;
    content: '';
    position: absolute;
    bottom: 15px;
    right: -7px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 12px 15px 12px;
    border-color: transparent transparent #4b7bec transparent;
    -webkit-transform: rotate(37deg);
    -ms-transform: rotate(37deg);
    transform: rotate(37deg);
}

.msg-body ul li.repaly p {
    color: #fff;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 400;
    padding: 15px;
    background: #4b7bec;
    display: inline-block;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    margin-bottom: 0;
}

.msg-body ul li.repaly p b {
    display: block;
    color: #061061;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 500;
}

.msg-body ul li.repaly:after {
    display: block;
    content: '';
    clear: both;
}

.time {
    display: block;
    color: #000;
    font-size: 12px;
    line-height: 1.5;
    font-weight: 400;
}

li.repaly .time {
    margin-right: 20px;
}

.divider {
    position: relative;
    z-index: 1;
    text-align: center;
}

.msg-body h6 {
    text-align: center;
    font-weight: normal;
    font-size: 14px;
    line-height: 1.5;
    color: #222;
    background: #fff;
    display: inline-block;
    padding: 0 5px;
    margin-bottom: 0;
}

.divider:after {
    display: block;
    content: '';
    clear: both;
    position: absolute;
    top: 12px;
    left: 0;
    border-top: 1px solid #EBEBEB;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.send-box {
    padding: 15px;
    border-top: 1px solid #ccc;
}

.send-box form {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}

.send-box .form-control {
    display: block;
    width: 85%;
    padding: 0.375rem 0.75rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #222;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.send-box button {
    border: none;
    background: #3867d6;
    padding: 0.375rem 5px;
    color: #fff;
    border-radius: 0.25rem;
    font-size: 14px;
    font-weight: 400;
    width: 24%;
    margin-left: 1%;
}

.send-box button i {
    margin-right: 5px;
}

.send-btns .button-wrapper {
    position: relative;
    width: 125px;
    height: auto;
    text-align: left;
    margin: 0 auto;
    display: block;
    background: #F6F7FA;
    border-radius: 3px;
    padding: 5px 15px;
    float: left;
    margin-right: 5px;
    margin-bottom: 5px;
    overflow: hidden;
}

.send-btns .button-wrapper span.label {
    position: relative;
    z-index: 1;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    cursor: pointer;
    color: #343945;
    font-weight: 400;
    text-transform: capitalize;
    font-size: 13px;
}

#upload {
    display: inline-block;
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}

.send-btns .attach .form-control {
    display: inline-block;
    width: 120px;
    height: auto;
    padding: 5px 8px;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.5;
    color: #343945;
    background-color: #F6F7FA;
    background-clip: padding-box;
    border: 1px solid #F6F7FA;
    border-radius: 3px;
    margin-bottom: 5px;
}

.send-btns .button-wrapper span.label img {
    margin-right: 5px;
}

.button-wrapper {
    position: relative;
    width: 100px;
    height: 100px;
    text-align: center;
    margin: 0 auto;
}

button:focus {
    outline: 0;
}

.add-apoint {
    display: inline-block;
    margin-left: 5px;
}

.add-apoint a {
    text-decoration: none;
    background: #F6F7FA;
    border-radius: 8px;
    padding: 8px 8px;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.2;
    color: #343945;
}

.add-apoint a svg {
    margin-right: 5px;
}

.chat-icon {
    display: none;
}

.closess i {
    display: none;
}



@media (max-width: 767px) {
    .chat-icon {
        display: block;
        margin-right: 5px;
    }
    .container{
        max-width: inherit!important;
    }
    .chatlist {
        width: 100%;
    }
    .chatbox {
        width: 100%;
        position: absolute;
        left: 1000px;
        right: 0;
        background: #fff;
        transition: all 0.5s ease;
        border-left: none;
    }
    .showbox {
        left: 0 !important;
        transition: all 0.5s ease;
    }
    .msg-head h3 {
        font-size: 14px;
    }
    .msg-head p {
        text-align: start;
        font-size: 12px;
    }
    .msg-head .flex-shrink-0 img {
        height: 30px;
    }
    .send-box button {
        width: 28%;
    }
    .send-box .form-control {
        width: 70%;
    }
    .chat-list h3 {
        font-size: 14px;
    }
    .chat-list p {
        text-align: left;
        font-size: 12px;
    }
    .msg-body ul li.sender p {
        font-size: 13px;
        padding: 8px;
        border-bottom-left-radius: 6px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    .msg-body ul li.repaly p {
        font-size: 13px;
        padding: 8px;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
        border-bottom-left-radius: 6px;
    }
}
    </style>
    
  @include('layouts.navbar')
    <div class="flex ">
    <!--    <div class="m-50 w-72 divide-y overflow-y-auto bg-slate-300">-->
            
    <!--        @foreach($all_bussiness as $chat)-->
    <!--            <a href="#" onClick="chatId('{{encrypt($chat->last_msg->business_id)}}');">-->
    <!--                <div role="button" class="sel-chat m-3 relative flex gap-3 bg-white p-2 transition-colors duration-300 hover:bg-slate-100">-->
    <!--                <div class="relative h-12 w-12 shrink-0">-->
                        
    <!--                    <div class="absolute bottom-1 right-0 h-2 w-2 rounded-xl bg-green-600"></div>-->
    <!--                    @if ($chat->image != null)-->
    <!--                        <img class="fl-places-logo" src="{{ asset('storage/companyLogo/'.$chat->image) }}" alt="image">-->
    <!--                    @else-->
    <!--                        <img class="fl-places-logo" alt="hotel_logo-1" src = "{{ asset('images/profile-image.jpg') }}">-->
    <!--                    @endif-->
    <!--                </div>-->
    <!--                <div class="fle overflow-hidden">-->
    <!--                    <h2 class="font-semibold">{{ $chat->comp_name }}</h2>-->
    <!--                    <div class="flex">-->
    <!--                      <p class="message text-sm font-semibold text-slate-500">{{ $chat->last_msg->message }}</p>-->
                          <!--<span class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-green-500 text-xs text-white">3</span>-->
    <!--                    </div>-->
    <!--                </div>-->
                    
    <!--            </div>-->
    <!--            </a>-->
    <!--        @endforeach-->
        
    <!--</div>-->
    
    <!--    <div class=" flex flex-1 flex-col justify-start gap-3 bg-slate-50 p-3">-->
    <!--        <div class="msg-container">-->
            
            
            
    <!--    </div>-->
    <!--    <div  class="icon send text" style="display:none;">-->
    <!--        <input id="inputMsg" class="input-message" type="text" placeholder="Type something..." />-->
    <!--        <div class="d-none" id="sendbtn">-->
    <!--        <svg   stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">-->
    <!--        <line x1="22" y1="2" x2="11" y2="13"></line>-->
    <!--        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>-->
    <!--        </svg>-->
            
    <!--    </div>   -->
    <!--    </div>     -->
    <!--</div>-->
    <!-- char-area -->
    <section class="message-area">
        <div class="container p-5">
            <div class="row">
                <div class="col-12">
                    <div class="chat-area">
                        <!-- chatlist -->
                        <div class="chatlist">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="chat-header">
                                        <div class="msg-search">
                                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" aria-label="search">
                                            <a class="add" href="#"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/add.svg" alt="add"></a>
                                        </div>

                                        <ul class="nav nav-tabs nav-tabss" id="myTab" role="tablist">
                                            <li class="nav-item nav-items" role="presentation">
                                                <button class="nav-link nav-links active" id="Open-tab" data-bs-toggle="tab" data-bs-target="#Open" type="button" role="tab" aria-controls="Open" aria-selected="true">Open</button>
                                            </li>
                                            <li class="nav-item nav-items" role="presentation">
                                                <button class="nav-link nav-links" id="Closed-tab" data-bs-toggle="tab" data-bs-target="#Closed" type="button" role="tab" aria-controls="Closed" aria-selected="false">Closed</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="modal-body">
                                        <!-- chat-list -->
                                        <div class="chat-lists">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                                                    <!-- chat-list -->
                                                    <div class="chat-list">
                                                        <a href="#" class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                                <span class="active"></span>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>Mehedi Hasan</h3>
                                                                <p>front end developer</p>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>Hasan Ali</h3>
                                                                <p>front end developer</p>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>Mehedi Hasan</h3>
                                                                <p>front end developer</p>
                                                            </div>
                                                        </a>


                                                    </div>
                                                    <!-- chat-list -->
                                                </div>
                                                <div class="tab-pane fade" id="Closed" role="tabpanel" aria-labelledby="Closed-tab">

                                                    <!-- chat-list -->
                                                    <div class="chat-list">
                                                        <a href="#" class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                                <span class="active"></span>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>Mehedi Hasan</h3>
                                                                <p>front end developer</p>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>Ryhan</h3>
                                                                <p>front end developer</p>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>Malek Hasan</h3>
                                                                <p>front end developer</p>
                                                            </div>
                                                        </a>

                                                    </div>
                                                    <!-- chat-list -->
                                                </div>
                                            </div>

                                        </div>
                                        <!-- chat-list -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chatlist -->



                        <!-- chatbox -->
                        <div class="chatbox">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="msg-head">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="d-flex align-items-center">
                                                    <span class="chat-icon"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>
                                                    <div class="flex-shrink-0">
                                                        <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h3>Mehedi Hasan</h3>
                                                        <p>front end developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-between align-center">
                                                    <div class="star-rate d-flex flex-column">
                                                        <div class="totalrating">
                                                            {{-- Haseeb --}}
                                                            <i class="rating__ fas fa-star"></i>
                                                            <i class="rating__ fas fa-star"></i>
                                                            <i class="rating__ fas fa-star"></i>
                                                            <i class="rating__ far fa-star"></i>
                                                            <i class="rating__ far fa-star"></i>
                                                        </div>
                                                        <span class="totalaverage">Rating 4/5</span>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal-body">
                                        <div class="msg-body">
                                            <ul>
                                                <li class="sender">
                                                    <p> Hey, Are you there? </p>
                                                    <span class="time">10:06 am</span>
                                                </li>
                                                <li class="sender">
                                                    <p> Hey, Are you there? </p>
                                                    <span class="time">10:16 am</span>
                                                </li>
                                                <li class="repaly">
                                                    <p> Last Minute Festive Packages From Superbreak</p>
                                                    <span class="time">10:20 am</span>
                                                </li>
                                                

                                            </ul>
                                        </div>
                                    </div>


                                    <div class="send-box">
                                        <form action="">
                                            <input type="text" class="form-control" aria-label="message…" placeholder="Write message…">

                                            <button type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chatbox -->


                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- char-area -->
    
    </div>
    @include('layouts.foot')
   
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        function chatId(buss_id) {
            var buss_id = buss_id;
            $.ajax({
                url: "{{ route('user.get.chat') }}",
                type: "POST",
                data: {
                    buss_id: buss_id,
                    
                },
                success: function(res) {
                    $('.msg-container').html('')
                    $('.msg-container').html(res)
                }
            });
            $(".send").show();
        }
        
        function sendMsg(buss_id,msg){
            $.ajax({
                url: "{{ route('user.send.msg') }}",
                type: "POST",
                data: {
                    buss_id: buss_id,
                    msg: msg,
                                },
                success: function(res) {
                    $('#inputMsg').val('');
                    chatId(buss_id);
                }
            });
        }
        
        setInterval(function(){
            var buss_id = $('#buss_id').val();
            if(buss_id){
                chatId(buss_id);
                
            }
            
        },5000);
        
    
        $('#sendbtn').click(function(){
            var buss_id = $('#buss_id').val();
            var msg = $('#inputMsg').val();
            sendMsg(buss_id,msg);
            
               
        });
        $('#inputMsg').keyup(function(){
                     
                    if($(this).val() == ''){
                        $("#sendbtn").addClass('d-none');
                    }else{
                        
                        $("#sendbtn").removeClass('d-none');
                    }
                    
                });

        jQuery(document).ready(function() {

    $(".chat-list a").click(function() {
        $(".chatbox").addClass('showbox');
        return false;
    });

    $(".chat-icon").click(function() {
        $(".chatbox").removeClass('showbox');
    });


});
    </script>


</body>
</html>