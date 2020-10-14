@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            @if($__cfg['SiteCode'] == '2017') {{-- 임용 --}}
                @php
                    if(strpos($data['Title'],'>') !== false){
                       $arr_title = explode('>',$data['Title']);
                    }else{
                        $arr_title = array($data['Title']);
                    }
                @endphp
                <h4 class="NG" style="margin-bottom: 10px;font-size: 16px; color: #000;line-height: 30px;">{{end($arr_title)}}</h4>
            @endif
            {!! $data['Content'] !!}
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            @if($data['date_valid'] === 'N' && empty($data["GuidanceNote"]) === false)
                alert("{{$data["GuidanceNote"]}}");
            @endif
        });
    </script>
@stop