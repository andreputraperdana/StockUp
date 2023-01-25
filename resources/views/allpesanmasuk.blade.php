@foreach($SemuaPesan as $pesan)
         <button class="content__chat d-flex" style="border: 0px; background-color: transparent;">
             <div class="pe-2">
                 <img src="{{URL::asset('akun.png')}}" alt="" style="height: 50px;"> 
             </div>
         <div class="pt-1 pe-3">
             <p style="font-size: 16px; font-weight: bold; margin-bottom: -1px; margin-left: -16px;">{{$pesan->name}}</p>
             <p style="font-size: 12px;">{{$pesan->message}}</p>
         </div>
        </button>
 @endforeach