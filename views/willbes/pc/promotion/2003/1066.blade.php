@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            background:#fff;
            position:relative;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1066_top_bg.jpg) center top no-repeat}
        .wb_cts01_01 {background:#e58062; padding-top:100px}
        .wb_cts01_01 div {width:1120px; margin:0 auto; position:relative}

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1066_01_bg.jpg) center top no-repeat}

        .wb_cts02s {background:#f4996d;}
        .wb_cts02s .tImg img {margin:0 5px 10px;width:302px;height:166px;border:2px solid #28364a;}

        .wb_cts03 {padding-bottom:150px}

        .wb_cts04 {background:#DBC8B7;}

        .wb_cts05 {background:#f8f8f8;padding-bottom:100px;padding-top:188px;}      

        .skybanner {position:fixed;top:100px;right:10px;width:259px; text-align:center; z-index:11;}   
        .skybanner a {display:block;margin-bottom:10px;}   

        /*타이머*/
        .time {text-align:center; padding:20px 0; background:#fff; border-radius:20px; width:1000px !important}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; line-height:61px; font-size:28px; margin-right:10px}
        .time li:first-child {}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }   
    </style>


    <div class="evtContent NSK" id="evtContainer">      
        <div class="skybanner">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1067" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" >
            </a>  
            <a href="#live">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1066_sky2.png" title="라이브로 소통하기" >
            </a>                 
        </div>
      
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_top.jpg" title="제니스 영어 한덕현" />       
        </div>        

        <div class="evtCtnsBox wb_cts01_01" id="wb_cts01_01">
            <div class="time NGEB" id="newTopDday">
                <ul>
                    <li class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</li>
                    <li class="time_txt"><span>남은 시간은</span></li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>             
                </ul>
            </div>
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1066_01_01.jpg" title="고득점 실전 패키지" />  
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/179261" title="수강신청" style="position: absolute; left: 52.5%; top: 72.35%; width: 27.77%; height: 10.97%; z-index: 2;"></a> 
            </div>    
        </div>  

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_01.jpg" usemap="#Map1066a" title="반반한 모의고사 무료방송" border="0" />
            <map name="Map1066a" id="Map1066a">
                <area shape="rect" coords="238,1051,883,1158" href="https://pass.willbes.net/promotion/index/cate/3019/code/1676" target="_blnak" alt="방송보러가기" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts02s" id="live">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s.jpg" alt="한덕현 라이브" />
            <div class="tImg">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_01.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_02.gif" alt="" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_03.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_04.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_05.gif" alt="" />
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_02ss.jpg" alt="수강신청"/>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_03.jpg" alt="실시간 소통 댓글" /> 
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
            @endif  
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1066_02.jpg" alt="영어는 어려운 과목이 아닙니다." />   
        </div>

        <div class="evtCtnsBox wb_cts05" id="cts05">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_04.gif" usemap="#Map1066b" border="0" alt="커리큘럼"/>
            <map name="Map1066b" id="Map1066b">
                <area shape="rect" coords="230,694,277,711" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145823" target="_blank" />
                <area shape="rect" coords="230,752,278,769" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/173562" target="_blank" />
                <area shape="rect" coords="229,828,278,845" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146100" target="_blank" />
                <area shape="rect" coords="426,456,472,474" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145623" target="_blank" />
                <area shape="rect" coords="426,572,472,590" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154900" target="_blank" />
                <area shape="rect" coords="424,648,473,666" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/173563" target="_blank" />
                <area shape="rect" coords="424,735,473,754" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157579" target="_blank" />
                <area shape="rect" coords="625,520,672,536" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157581" target="_blank" />
                <area shape="rect" coords="625,692,674,710" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145826" target="_blank" />
                <area shape="rect" coords="626,826,671,844" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" />
                <area shape="rect" coords="829,468,878,484" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158678" target="_blank" />
                <area shape="rect" coords="830,825,879,842" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158682" target="_blank" />
                <area shape="rect" coords="830,846,878,863" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158683" target="_blank" />
                <area shape="rect" coords="230,493,278,511" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169567" target="_blank" />
                <area shape="rect" coords="230,534,279,551" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169816" target="_blank" />
                <area shape="rect" coords="424,512,472,531" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169820" target="_blank" />
                <area shape="rect" coords="829,559,879,577" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/179637" target="_blank" alt="새벽모의고사" />
                <area shape="rect" coords="230,635,278,653" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169815" target="_blank" />
                <area shape="rect" coords="831,677,877,695" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/180888" target="_blank" alt="아작내기" />
                <area shape="rect" coords="832,711,877,729" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/179087" target="_blank" alt="실전동형모의고사" />
                <area shape="rect" coords="832,868,878,886" href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/169814" target="_blank" />
            </map >        
        </div>
    </div>
    <!-- End Container -->

    <script>  
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
 