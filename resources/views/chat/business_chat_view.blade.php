<!DOCTYPE html>
<html lang="en">
<head>
    <title>Refer Reviews - Chat Page</title>
    @include('layouts.head')
</head>

<body>
  @include('layouts.navbar')
    <div class="flex min-h-screen bg-gray-200">
        <div class="w-72 divide-y overflow-y-auto bg-slate-300">
            <h1>Chat Area</h1>
            @foreach($all_customer as $chat)
                <a href="#" onClick="chatId( '{{encrypt($chat->last_msg->user_id)}}' );">
                    <div role="button" class="sel-chat m-3 relative flex gap-3 bg-white p-2 transition-colors duration-300 hover:bg-slate-100">
                    <div class="relative h-12 w-12 shrink-0">
                        <div class="absolute bottom-1 right-0 h-2 w-2 rounded-xl bg-green-600"></div>
                        @if ($chat->image != null)
                            <img class="fl-places-logo" src="{{ asset('storage/userProfile/'.$chat->image) }}" alt="image">
                        @else
                            <img class="fl-places-logo" alt="hotel_logo-1" src = "{{ asset('images/profile-image.jpg') }}">
                        @endif
                    </div>
                    <div class="fle overflow-hidden">
                        <h2 class="font-semibold">{{ $chat->first_name }} {{ $chat->last_name }}</h2>
                        <div class="flex">
                          <p class="message text-sm font-semibold text-slate-500">{{ $chat->last_msg->message }}</p>
                          <!--<span class="flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-green-500 text-xs text-white">3</span>-->
                        </div>
                    </div>
                    
                </div>
                </a>
            @endforeach
        
    </div>
        <div class=" flex flex-1 flex-col justify-start gap-3 bg-slate-50 p-3">
            <div class="msg-container">
            
            
            
        </div>
        <div  class="icon send text" style="display:none;">
            <input id="inputMsg" class="input-message" type="text" placeholder="Type something..." />
            <div class="d-none" id="sendbtn">
            <svg   stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <line x1="22" y1="2" x2="11" y2="13"></line>
            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
            </svg>
            </div>
        </div>   
        </div> 
    </div>
    @include('layouts.foot')
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        function chatId(user_id) {
            $.ajax({
                url: "{{ route('business.get.chat') }}",
                type: "POST",
                data: {
                    user_id: user_id,
                },
                success: function(res) {
                    $('.msg-container').html('')
                    $('.msg-container').html(res)
                }
            });
            $(".send").show();
            
        }
        function sendMsg(user_id,msg){
            
            $.ajax({
            url: "{{ route('business.send.msg') }}",
            type: "POST",
            data: {
                user_id: user_id,
                msg: msg,
            },
            success: function(res) {
                $('#inputMsg').val('');
                chatId(user_id);
            }
        });
        }
        setInterval(function(){
            var user_id = $('#user_id').val();
            if(user_id){
                
                chatId(user_id);
            }
        },5000);
        $('#sendbtn').click(function(){
            var user_id = $('#user_id').val();
            var msg = $('#inputMsg').val();
            sendMsg(user_id,msg);
        });
        $('#inputMsg').keyup(function(){
             
            if($(this).val() == ''){
                $("#sendbtn").addClass('d-none');
            }else{
                
                $("#sendbtn").removeClass('d-none');
            }
            
        });
        $( document ).ready(function() { 
            
            if($("#inputMsg").val() == ''){
                $("#sendbtn").addClass('d-none');
            }else{
                
                $("#sendbtn").removeClass('d-none');
            }
        });
        
        
            
        
       
        
        
        
        
    </script>


</body>
</html>