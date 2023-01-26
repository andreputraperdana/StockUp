@foreach($allmessages as $AllMess)
@if($AllMess->user_id == $UMKMID)
<div class="d-flex justify-content-start ps-3 pt-3">
    <div style="background-color: white; border-radius: 10px;" class="p-2 ps-3 pe-3">
        {{$AllMess->message}}
    </div>
</div>
@elseif($AllMess->user_id == $PemasokID)
<div class="d-flex justify-content-end pe-3">
<div style="background-color: green; border-radius: 10px;" class="p-2 ps-3 pe-3">
    {{$AllMess->message}}
</div>
</div>
@endif
@endforeach