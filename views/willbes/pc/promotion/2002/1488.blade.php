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

        .skybanner {position:fixed;top:202px;right:0;z-index:1;}
        .skybanner a {display:block; margin-bottom:10px}

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
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/1488_top_bg.jpg) no-repeat center top;}
        .wb_top_01 {background:#333; position:relative; padding:100px 0; color:#fff} 
        .box-book {width:100%;}
        .box-book .bx-wrapper{max-width:100% !important;}
        .box-book li {display:inline; float:left; height: 250px;}
        .box-book li img {
            width: 200px;
            height: 286px;
            -webkit-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        }
        .headTit {font-size:40px; margin-bottom:50px; line-height:1.2}
        .headTit span {color:#8799e5; text-decoration:underline}
        .bottomTxt {font-size:14px; margin-top:50px}

        .wb_01 {background:#ededed}
        .wb_02 {background:#fff}
        .wb_03 {background:#f3f3f3}
        .wb_04 {background:url(https://static.willbes.net/public/images/promotion/2019/12/1488_04_bg.jpg) no-repeat center top}
        .wb_05 {background:#40c8f4;}

    </style>


    <div class="p_re evtContent NGR" id="evtContainer">        
        <div class="skybanner" >
            <a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1040&campus_ccd=605001" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/12/1488_sky01.jpg" alt="12월 기본이론 종합반" ></a>
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1446" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/12/1488_sky02.jpg" alt="튜터링관리반" ></a>
        </div>           

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
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1270_00.jpg" alt="경찰학원 1위 윌비스 신광은 경찰팀" />
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1488_top.jpg" alt="기본이론 집중완성" usemap="#Map1406A" border="0" />
            <map name="Map1406A" id="Map1406A">
                <area shape="rect" coords="367,1307,755,1402" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1040&campus_ccd=605001" target="_blank" alt="수강신청하기" />
            </map>        
        </div>

        <div class="evtCtnsBox wb_top_01">
            <div class="headTit NSK-Black">
                <span>기본서 선착순 등록 무료 증정</span> [조기 마감 주의!]<br>
                기본이 잡혀야 합격을 잡을 수 있습니다!<br>
                <span>총 210,000원 상당</span>
            </div>
            <div class="box-book">
                <ul class="slidesBook">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b1.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b2.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b3.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b4.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b5.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b6.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b7.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b8.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b9.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b1.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b2.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b3.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b4.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b5.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b6.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b7.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b8.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b9.png" alt=""/></li>
                </ul>
            </div> 
            <div class="bottomTxt">* 교재 비매품 또는 교수님이 구매 증정</div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1488_01.jpg" alt="기본이론 집중완성"/>
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1488_02.jpg" alt="2달 완성"/>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1488_03.jpg" alt="기본이론은 신광은경찰"/>
        </div>
               
        <div class="evtCtnsBox wb_04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1488_04.jpg" alt="튜터들이 온다"  usemap="#Map1406B" border="0"/>
            <map name="Map1406B" id="Map1406B">
                <area shape="rect" coords="238,987,542,1134" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1040&campus_ccd=605001" target="_blank" alt="1월 기본종합반 수강신청하기(일반경찰)"/>
                <area shape="rect" coords="574,988,886,1138" href="https://police.willbes.net/pass/offPackage/index?cate_code=3011&course_idx=1040&campus_ccd=605001" target="_blank" alt="1월 기본종합반 수강신청하기(경행경채)"/>
            </map>       
        </div>

        <div class="evtCtnsBox wb_05" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1488_05.jpg" alt="튜터링 관리반 자세히보기" usemap="#Map1406C" border="0">
            <map name="Map1406C" id="Map1406C">
                <area shape="rect" coords="360,1235,765,1358" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1446" target="_blank" />
            </map>                        
        </div> 
      
    </div>
    <!-- End Container -->


    <script type="text/javascript">        
        $(document).ready(function() {
            var BxBook = $('.slidesBook').bxSlider({
                slideWidth: 200,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:60000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop