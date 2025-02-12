<input id="buss_id" type="hidden" name="buss_id" value="'{{ encrypt($buss_id) }}'" />
    @if(isset($get_chat))
        @foreach($get_chat as $msg)
            @if($msg->message_by == 'USER')
                <div class="max-w-fit rounded-tr-lg rounded-bl-lg bg-blue-500 text-white px-2 py-1 shadow-sm">{{ $msg->message }}</div>
            @else
                <div class="max-w-fit self-end rounded-tl-lg rounded-br-lg bg-white px-2 py-1">{{ $msg->message }}</div>
            @endif
        @endforeach
    
    @endif