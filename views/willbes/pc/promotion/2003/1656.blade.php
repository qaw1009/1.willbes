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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

         /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%;}
        .newTopDday ul li:first-child span {font-size:16px; color:#666;margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%;line-height:60px;}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .wb_top {background:#ececec url(https://static.willbes.net/public/images/promotion/2020/05/1656_top_bg.jpg) no-repeat center top;}

        .wb_03 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/05/1656_03_bg.jpg) no-repeat center top;}        
        
        .wb_04 {background:#efefef;position:relative;}
        .check {color:#000; font-size:15px;font-weight:bold;position:absolute;left:50%;top:50%;margin-left:-417px;margin-top:325px;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#E31289;}             
        
    </style>
    
    <div class="p_re evtContent NGR" id="evtContainer">       

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>소방문제풀이PASS {{$arr_promotion_params['turn']}}기</span><br />
                        <span style="line-height:40px;font-size:25px;color:#000;font-wieght:bold;">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 24:00 마감!</span>
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        <span>남았습니다.</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1656_top.jpg" alt="소방 파이널 패스 문풀"/>            
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1656_01.jpg" alt="기출문제풀이"/>           
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1656_02.jpg" alt="단원별 문제풀이"/>           
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1656_03.jpg" alt="동형모의고사"/>           
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1656_04.jpg" alt="수강신청" usemap="#Map1656A" border="0"/>
            <map name="Map1656A" id="Map1656A">
                <area shape="rect" coords="663,605,950,717" href="javascript:go_PassLecture('165420');"  alt="수강신청" />
            </map>     
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 윌비스 소방문제풀이PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#info" class="infotxt">이용안내확인하기 ↓</a>
            </div>                 
        </div>        

        <div class="evtCtnsBox wb_05" id="info">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1656_05.jpg" alt="이용안내" />
        </div>

    </div> 
    <!-- End Container -->
    <script type="text/javascript"> 

        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3023/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            @if(empty($arr_promotion_params['edate']) === false)
                dDayCountDown('{{$arr_promotion_params['edate']}}');
            @endif
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop