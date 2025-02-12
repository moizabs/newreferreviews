<div class="msg-container flex flex-1 flex-col justify-start gap-3 bg-slate-50 p-3">
    <input type="hidden" name="buss_id" value="'{{ encrypt($buss_id)}}'" />
    @if(isset($get_chat))
        @foreach($get_chat as $msg)
            @if($msg->message_by == 'USER')
                <div class="max-w-fit rounded-tr-lg rounded-bl-lg bg-blue-500 text-white px-2 py-1 shadow-sm">hi have you visited Maka ?</div>
            @else
                <div class="max-w-fit self-end rounded-tl-lg rounded-br-lg bg-white px-2 py-1">Yes I enjoy my time there</div>
            @endif
        @endforeach
    
    @endif
</div>