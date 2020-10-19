@extends('willbes.m.layouts.master')

@section('content')
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            @if(empty($data['Title']) === false)
                @php
                    if(strpos($data['Title'],'>') !== false){
                       $arr_title = explode('>',$data['Title']);
                    }else{
                        $arr_title = array($data['Title']);
                    }
                @endphp
                {{ end($arr_title) }}
            @endif
        </div>

        {!! $data['ContentM'] or $data['Content'] !!}

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            @if($data['date_valid'] === 'N' && empty($data["GuidanceNote"]) === false)
            alert("{{$data["GuidanceNote"]}}");
            @endif
        });
    </script>
@stop