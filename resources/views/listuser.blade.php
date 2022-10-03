@foreach($ListUser as $list)
                    <button class="content__chat d-flex" style="border: 0px; background-color: transparent;">
                        <div class="pe-2">
                            <img src="{{URL::asset('akun.png')}}" alt="" style="height: 50px;"> 
                        </div>
    
                        <div class="pt-1 pe-3">
                            <p style="font-size: 16px; font-weight: bold; margin-bottom: -1px; margin-left: -16px;">{{$list->name}}</p>
                            <p style="font-size: 12px;">Stock nya ada kak</p>
                        </div>
    
                        <div class="pt-1">
                            <p style="font-size: 12px;">{{$list->status}}</p>
                        </div>
                    </button>
 @endforeach