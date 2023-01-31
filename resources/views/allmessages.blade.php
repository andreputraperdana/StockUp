@foreach($allmessages as $AllMess)
@if(auth()->user()->role_id == 1)
    @if(($AllMess->user_id == $UMKMID) && ($AllMess->flag == 1))
    <div class="d-flex justify-content-start ps-3 pt-3">
        <div style="background-color: white; border-radius: 10px;" class="p-2 ps-3 pe-3">
            {{$AllMess->message}}
        </div>
    </div>
    @elseif(($AllMess->user_id == $UMKMID) && ($AllMess->flag == 0))
    <div class="d-flex justify-content-end pe-3">
        <div style="background-color: #c7e0bc; border-radius: 10px;" class="p-2 ps-3 pe-3">
            {{$AllMess->message}}
        </div>
    </div>
    @endif
@elseif(auth()->user()->role_id == 2)
    @if(($AllMess->user_id == $UMKMID) && ($AllMess->flag == 1))
    <div class="d-flex justify-content-end ps-3 pt-3">
        <div style="background-color: #c7e0bc; border-radius: 10px;" class="p-2 ps-3 pe-3">
            {{$AllMess->message}}
        </div>
    </div>
    @elseif(($AllMess->user_id == $UMKMID) && ($AllMess->flag == 0))
    <div class="d-flex justify-content-start pe-3">
    <div style="background-color: white; border-radius: 10px;" class="p-2 ps-3 pe-3">
        {{$AllMess->message}}
    </div>
    </div>
    @endif
@endif
@endforeach