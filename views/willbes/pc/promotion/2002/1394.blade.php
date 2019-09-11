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

        .skybanner {
            position:fixed;
            top:280px;
            right:0;
            z-index:1;
        }
        .skybanner2{
            position:fixed;
            top:270px;
            left:190px;
            z-index:1;
        }

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:28px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#2784d2}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#2784d2}
        to{color:#000}
        }

        .wb_00 {background:#404040}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/08/1270_top_bg.jpg) no-repeat center top; position:relative}
        .wb_top span {position:absolute; left:50%; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .wb_top span.img1 {top:330px; margin-left:-430px; width:366px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        .wb_top span.img2 {top:330px; margin-left:50px; width:366px; animation:iptimg2 0.5s ease-in;-webkit-animation:iptimg2 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-560px; opacity: 0;}
        to{margin-left:-430px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-560px; opacity: 0;}
        to{margin-left:-430px; opacity: 1;}
        }
        
        @@keyframes iptimg2{
        from{margin-left:130px; opacity: 0;}
        to{margin-left:50px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
        from{margin-left:130px; opacity: 0;}
        to{margin-left:50px; opacity: 1;}
        }
        .wb_top span.img3 {top:330px; margin-left:230px; width:366px;}

        .wb_01 {background:#343434 url(https://static.willbes.net/public/images/promotion/2019/09/1394_top_bg.jpg) no-repeat center top;}
        .wb_02 {background:#3f4f5f}
        .wb_03 {background:#ededed}
        .wb_04 {background:#fff;}
        .wb_05 {background:#f3f3f3;}
        .wb_06 {background:#343434 url(https://static.willbes.net/public/images/promotion/2019/09/1394_05_bg.jpg) no-repeat center top;}
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">        
        <div class="skybanner" >
            <a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1040&campus_ccd=605001" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1394_sky.png" alt="스카이배너" ></a>
        </div> 
        {{--    
        <div class="skybanner2" >
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1053" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/08/1359_sky2.gif" alt="통합생활관리반" ></a>
        </div>
        --}}            

        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>마감까지<br>남은시간</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1270_00.jpg" alt="문제풀이과정 커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1394_top.jpg" alt="더블할인 이벤트" />          
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1394_01.jpg" alt="2개월 기본이론 집중완성" usemap="#Map1359b" border="0" />
            <map name="Map1359b" id="Map1359b">
                <area shape="rect" coords="385,1332,762,1427" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1040&campus_ccd=605001" target="_blank;" alt="수강신청하기" />
            </map>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1394_02.jpg" alt="2달 완성"/>
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1394_03.jpg" alt="기본이론은 신광은경찰"/>
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1394_04.jpg" alt="혜택은 특별"/>
        </div> 
               
        <div class="evtCtnsBox wb_06" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1394_05.jpg" alt="더블할인 이벤트 신청하기" usemap="#Map1394a" border="0"/>
            <map name="Map1394a" id="Map1394a">
                <area shape="rect" coords="435,1084,690,1293" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1040&campus_ccd=605001" target="_blank;" alt="수강신청하기" />
            </map>
        </div>
      
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop