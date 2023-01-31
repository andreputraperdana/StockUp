@if(auth()->user()->role_id == 1)
@foreach($SemuaPesan as $pesan)
        <a href="/chat/{{$pesan->destination_id}}">
            <button class="content__chat d-flex" style="border: 0px; background-color: transparent;">
                <div class="pe-2">
                    <img src="{{URL::asset('akun.png')}}" alt="" style="height: 50px;"> 
                </div>
                <div class="pt-1">
                    <p style="font-size: 16px; font-weight: bold; margin-bottom: -1px;" class="d-flex justify-content-start">{{$pesan->name}}</p>
                    <p style="font-size: 12px;">{{$pesan->message}}</p>
                </div>
            </button>
        </a>
 @endforeach
 @elseif(auth()->user()->role_id == 2)
    @foreach($SemuaPesan as $pesan)
        <a href="/chat/{{$pesan->user_id}}">
            <button class="content__chat d-flex" style="border: 0px; background-color: transparent;">
                <div class="pe-2">
                    <img src="{{URL::asset('akun.png')}}" alt="" style="height: 50px;"> 
                </div>
                <div class="pt-1 pe-3">
                    <p style="font-size: 16px; font-weight: bold; margin-bottom: -1px; margin-left: -16px;">{{$pesan->name}}</p>
                    <p style="font-size: 12px;">{{$pesan->message}}</p>
                </div>
            </button>
        </a>
    @endforeach
 @endif