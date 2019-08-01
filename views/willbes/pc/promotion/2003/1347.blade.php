@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/08/1347_top_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 {background:#e9eaee;}
        .wb_cts01 ul {width:1124px; margin:0 auto}
        .wb_cts01 li {display:inline; float:left; margin-right:5px; width:277px;}
        .wb_cts01 li:last-child {margin:0; background:#c0c0c0; height:177px; line-height:177px; text-align:center}
        .wb_cts01 ul:after {content:""; display:block; clear:both}
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2019/08/1347_02x_bg.jpg) no-repeat center top;position:relative;}
        .wb_cts02 span.img01 {position:absolute; top:285px; left:16%; margin-left:125px; z-index:10; animation:rubberBand2 2s infinite 1s;}
        .wb_cts02 span.img02 {position:absolute; top:285px; left:27%; margin-left:125px; z-index:10; animation:rubberBand2 4s infinite 1s;}
        .wb_cts02 span.img03 {position:absolute; top:285px; left:38%; margin-left:125px; z-index:10; animation:rubberBand2 3s infinite 1s;}
        .wb_cts02 span.img04 {position:absolute; top:285px; left:49%; margin-left:125px; z-index:10; animation:rubberBand2 2s infinite 1s;}
        .wb_cts02 span.img05 {position:absolute; top:285px; left:60%; margin-left:125px; z-index:10; animation:rubberBand2 3s infinite 1s;}
        @@keyframes rubberBand2{
        0%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
        50%{-webkit-transform:scale3d(.85,.85,1);transform:scale3d(.85,.85,1)} 
        100%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
        }
        .wb_cts03 {background:#FFF; padding-bottom:150px}         



    </style>


    <div class="p_re evtContent NSK" id="evtContainer">


        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1347_top.jpg" alt="윌비스 제로백 수강후기 한줄평 이벤트" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01.jpg" alt="윌비스 제로백"/>
            <ul>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_t01.gif" alt="임재진 국어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_t02.gif" alt="임재진 국어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_t03.gif" alt="임재진 국어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_t04.gif" alt="임재진 국어"/></li>
            </ul>
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_1.jpg" alt="윌비스 제로백"/>
            <ul>               
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_t05.gif" alt="임재진 국어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_t06.gif" alt="임재진 국어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_t07.gif" alt="임재진 국어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_t.png" alt="coming soon"/></li>
            </ul>
            <!--a href="https://pass.willbes.net/promotion/index/cate/3092/code/1312" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/08/1347_01_2.jpg" alt="무료수강하기"/>
            </a-->
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1347_02x.jpg" alt="등불">   
            <div class="comments">
                <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_02_01.png" alt="후기1"></span>   
                <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_02_02.png" alt="후기2"></span>          
                <span class="img03"><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_02_03.png" alt="후기3"></span>  
                <span class="img04"><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_02_04.png" alt="후기4"></span>  
                <span class="img05"><img src="https://static.willbes.net/public/images/promotion/2019/08/1347_02_05.png" alt="후기5"></span>  
            </div>    
        </div>

        <div class="evtCtnsBox wb_cts03" id="careful" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1347_03.gif" alt="이벤트 상품"/ usemap="#1347_03" />
<map name="1347_03">
  <area shape="rect" coords="101,1952,525,2139" href="https://www.willbes.net/classroom/pass/index" target="_blank">
  <area shape="rect" coords="590,1947,1008,2138" href="https://pass.willbes.net/periodPackage/show/cate/3092/pack/648001/prod-code/155361" target="_blank">
</map>
            {{--댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1347_04.jpg" alt="이벤트 유의사항"/>
        </div>
    </div>
    <!-- End Container -->

    <script language="javascript">            
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop