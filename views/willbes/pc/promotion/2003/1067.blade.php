@extends('willbes.pc.layouts.master')

@section('content')
@include('willbes.pc.layouts.partial.site_menu')
<!-- Container -->
<style type="text/css">
    .evtContent {
        width:100%;
        min-width:1120px !important;
        max-width:2000px !important;
        margin:20px auto 0;
        padding:0 !important;
        background:#fff;     
        font-size:14px;       
        line-height:1.3;
    }
    .evtContent span {vertical-align:top}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
    .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000} */

    /************************************************************/
    .wb_top {background:#1e1e1e url(https://static.willbes.net/public/images/promotion/2019/05/1067_top_bg.jpg) no-repeat center top; position:relative; }
    .wb_cts01 {background:#fff;}
    .wb_cts01 .youtube {width:800px; margin:50px auto 0}
    .wb_cts02 {background:#f0efef;}
    .wb_cts03 {background:#ccbba2 url(https://static.willbes.net/public/images/promotion/2019/05/1067_04_bg.jpg) repeat;}
    .sky {
        position:fixed;
        top:200px;
        right:0;
        width:259px;
        animation:upDown 1s infinite;
        -webkit-animation:upDown 1s infinite;
        z-index:10;
    }
    @@keyframes upDown{
         from{margin-top:0}
         60%{margin-top:-30px}
         to{margin-top:0}
     }
    @@-webkit-keyframes upDown{
         from{margin-top:0}
         60%{margin-top:-30px}
         to{margin-top:0}
     }
</style>
@php
    $goSubmit = (date('YmdHis') >= '20200106000000') ? 'doEvent(); return false;' : 'javascript:alert("1.6(월)~2.7(금) 18기 상시 접수 시작");';
@endphp

<div class="p_re evtContent NGR" id="evtContainer">
    <div class="sky">
        <div><a href="#event"><img src="https://static.willbes.net/public/images/promotion/2022/11/1067_skybanner.png" title="첨삭지도반" ></a></div>   
</div>  

    <div class="evtCtnsBox wb_top" >
        <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_top.png" title="윌비스 매직아이 김신주 영어"  />
    </div><!--WB_top//-->

    <div class="evtCtnsBox wb_cts01" >        
        <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_01_01.jpg" title="윌비스 빠른 합격을 위한 매직아이 영어"  />
        <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_01_02.jpg" title=""  />
    </div><!--wb_cts01//-->

    <div class="evtCtnsBox wb_cts02" >
        <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_03_01.jpg" title="윌비스 실전에 강한 매직아이 영어"  />
        <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_03_02.jpg" title=""  />
    </div><!--wb_cts02//-->

    <div class="evtCtnsBox wb_cts03" id="event">
        @if (empty($arr_base['register_member_list']) === false)
            @if ($arr_base['register_list'][0]['PersonLimit'] <= $arr_base['register_member_list'][$arr_base['register_list'][0]['ErIdx']]['mem_cnt'])
                {{--선착순 20명 마감되었을때 보여지는 이미지와 문구--}}
                <img src="https://static.willbes.net/public/images/promotion/2022/12/1067_04_end.jpg" title="선찬순 20명 마감되었습니다." usemap="#Map1067" />
                <map name="Map1067" id="Map1067">
                    <area shape="rect" coords="619,672,893,775" href="#none" onclick="javascript:alert('선착순 20명 마감되었습니다.');" />
                </map>
            @else
                <img src="https://static.willbes.net/public/images/promotion/2022/12/1067_04.jpg" title="예약 접수" usemap="#Map1067" />
                <map name="Map1067" id="Map1067">
                    <area shape="rect" coords="619,672,893,775" href="#none" onclick="{{ $goSubmit }}" />
                </map>
            @endif
        @endif
    </div><!--wb_cts03//-->

</div>
<!-- End Container -->

<script type="text/javascript">
    function doEvent() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}

        var url = "{{ site_url('/promotion/popup/' . $arr_base['promotion_code']) }}" ;
        window.open(url,'event', 'scrollbars=no,toolbar=no,resizable=yes,width=400,height=300,top=100,left=100');
    }
</script>
@stop