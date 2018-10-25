@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <div class="willbes-Eventzone EVTZONE c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                {{($arr_base['onoff_type'] == 'ongoing') ? '· 진행중인 이벤트' : '· 마감된 이벤트'}}
            </div>


        </div>

    </div>
</div>
@stop