<ol class="breadcrumb bg-dark">
    @if(isset($data)&&!is_null($data))
            @foreach($data as $d)
            <li class="breadcrumb-item"><a class="text-white-50" href="{{$d['route']}}"><span>{{__($d['name'])}}</span></a></li>
            @endforeach
    @endif
</ol>