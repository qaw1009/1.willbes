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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/    \

       /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#eee; width:100%; padding:10px 0 35px}
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
        .newTopDday * {font-size: 24px;}

        .wb_top {background:#f9fafb url(https://static.willbes.net/public/images/promotion/2020/06/1659_top_bg.jpg) no-repeat center top;padding-bottom:120px;}
        .check {color:#000; font-size:15px;font-weight:bold;position:absolute;left:50%;top:69%;margin-left:-417px;margin-top:325px;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#AA2400;}             

        .wb_cts01 {background:#05091a}
        .wb_cts02 {background:#f8f8f8;padding-bottom:100px;}
        .wb_cts02 .box-book .bx-wrapper{max-width:100% !important;}
        .wb_cts02 .box-book li {display:inline; float:left; padding:20px 0}
        .wb_cts02 .box-book li img {
            width: 200px;
            -webkit-box-shadow: 10px 10px 30px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 30px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 30px 1px rgba(0,0,0,0.31);
        }
        .wb_cts02 .box-book li span {display:block; margin-top:20px; text-align:center; font-size:14px}
        .wb_cts02 p {margin-top:80px}
        .wb_cts02 p a {display:block; width:660px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#faea09; background:#0f0f0f; text-align:center; border-radius:90px}
        .wb_cts02 p a:hover {color:#fff;}        

        
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>윌비스 7급 문제풀이 PASS{{$arr_promotion_params['turn']}}기</span><br />
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
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1659_top.gif" alt="7급 실전마스터 패스" usemap="#Map1659a" border="0"  />
            <map name="Map1659a" id="apply">
                <area shape="rect" coords="600,1022,936,1135" href="javascript:go_PassLecture('165511');"  alt="구매하기" />
            </map>     
            <div class="check">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                        페이지 하단 하단 7급 실전마스터PAS 이용안내를 모두 확인하였고, 이에 동의합니다. 
                </label>
                <a href="#info" class="infotxt">이용안내확인하기 ↓</a>
            </div>                
        </div>   
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1659_01.jpg" alt="피셋 전격도입"  />           
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1659_02.gif" alt="꾸준한 고득점이 가능"  />           
        </div>

        <div class="evtCtnsBox wb_cts02">
            <div class="box-book">
                <ul class="slidesBook NSK">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1520_03_01.gif" alt=""/>
                        <span>국어 기미진</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1520_03_02.gif" alt=""/>
                        <span>한국사 조민주</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1520_03_03.gif" alt=""/>
                        <span>국제법/국제정치학 이상구</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1520_03_04.gif" alt=""/>
                        <span>헌법 유시완</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1520_03_05.gif" alt=""/>
                        <span>헌법/행정법 황남기</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1520_03_06.gif" alt=""/>
                        <span>중국어 조소현</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1520_03_07.gif" alt=""/>
                        <span>프랑스어 박훈</span>
                    </li>
                </ul>
            </div> 
            <p class="NGEB"><a href="#apply">7급 실전마스터PASS 신청하기 ></a></p> 
        </div>

        <div class="evtCtnsBox wb_cts03" id="info" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1659_03.jpg" alt="이용안내"  />           
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
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });  

        /*수강신청*/
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
        
       /*디데이카운트다운*/
        $(document).ready(function() {
            @if(empty($arr_promotion_params['edate']) === false)
                dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
            @endif
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop