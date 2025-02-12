<div class="msg-container flex flex-1 flex-col justify-start gap-3 bg-slate-50 p-3">
    @if(isset($get_chat))
    <input id="user_id" type="hidden" name="user_id" value="{{ encrypt($user_id) }}" />
        @foreach($get_chat as $msg)
            @if($msg->message_by == 'BUSINESS')
                <div class="max-w-fit rounded-tr-lg rounded-bl-lg bg-blue-500 text-white px-2 py-1 shadow-sm">{{ $msg->message }}</div>
            @else
                <div class="max-w-fit self-end rounded-tl-lg rounded-br-lg bg-white px-2 py-1">{{ $msg->message }}</div>
            @endif
        @endforeach
    
    @endif
</div>

<script>


</script>