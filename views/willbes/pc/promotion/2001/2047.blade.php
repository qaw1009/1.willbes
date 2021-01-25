@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/   
        
        /*타이머*/
        .time {width:100%; text-align:center; background:#F5F5F5;}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#000; font-size:28px;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2047_top_bg.jpg) no-repeat center top;}

        .wb_01 {background:#f3eede;}        

        .wb_02 {background:#dedede}

        .wb_02 .boxYoutube {width:895px; margin:0 auto}
        .wb_02 .tabMenu {margin-right:-5px; margin-bottom:20px}
        .wb_02 .tabMenu li {display:inline; float:left; margin:0 5px 10px 0; background:#000;}
        .wb_02 .tabMenu a {display:inline-block; opacity: 0.3;}
        .wb_02 .tabMenu a.active {box-shadow:0 10px 10px rgba(0,0,0,.2); opacity: 1;}  
        .wb_02 .tabMenu:after {content:''; display:block; clear:both}
        .wb_02 .youtubeCts iframe {width:890px; height:429px}
        
        .wb_04 {background:#5a3806; padding-bottom:100px}        
        .wb_04 .btnLec {width:600px; margin:50px auto; padding:20px; background:#000; color:#fff; font-size:30px; border-radius:40px}
        .wb_04 .check {font-size:16px; text-align:center; line-height:1.5; color:#fff}
        .wb_04 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .wb_04 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#c40007; margin-left:20px; border-radius:20px}
        .wb_04 .info {width:500px; margin:50px auto 0; padding:20px; color:#fff; line-height:1.4; text-align:left}

        .evtInfo {padding:80px 0; background:#333; color:#f0f0f0; font-size:16px;}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.5}
        .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px;}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}

        .skyBanner {position:fixed; width:130px; top:200px; right:10px; z-index:5;}
        .skyBanner a {display:block; margin-bottom:5px}          
        
    </style>

    <div class="p_re evtContent NSK" id="evtContainer"> 
        <!-- 타이머 -->
        <div class="evtCtnsBox time NSK-Black" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>FINAL PASS<br>판매종료까지</span></td>
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
                    <td>남았습니다.</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //--> 

        <div class="skyBanner">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_sky.jpg" alt="신청하기">
            </a>
        </div>    

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_top.jpg" alt="파이널패스"/>
        </div>

        <div class="evtCtnsBox wb_01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_01.jpg" alt="파이널패스 하나면 끝"/>            
        </div>  

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_01.jpg" alt="파이널패스로 답을 찾으세요." />
            <div class="boxYoutube">
                <ul class="tabMenu">
                    <li>
                        <a href="#tab1" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_y01.jpg" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#tab2">
                            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_y02.jpg" alt="" />
                        </a>
                    </li>                    
                    <li>
                        <a href="#tab3">
                            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_y03.jpg" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#tab4">
                            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_y04.jpg" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#tab5">
                            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_y05.jpg" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#tab6">
                            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_y06.jpg" alt="" />
                        </a>
                    </li>                    
                    <li>
                        <a href="#tab7">
                            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_y07.jpg" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#tab8">
                            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_y08.jpg" alt="" />
                        </a>
                    </li>
                </ul>
            </div>
            <div id="tab1" class="youtubeCts">
                <iframe src="https://www.youtube.com/embed/dTl6YPUpGb8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab2" class="youtubeCts">
                <iframe src="https://www.youtube.com/embed/MHryumpA4aM?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>            
            <div id="tab3" class="youtubeCts">
                <iframe src="https://www.youtube.com/embed/ECWkjhhINmo?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab4" class="youtubeCts">
                <iframe src="https://www.youtube.com/embed/7xiOqmDfOIQ?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab5" class="youtubeCts">
                <iframe src="https://www.youtube.com/embed/lGDmsITP3wk?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab6" class="youtubeCts">
                <iframe src="https://www.youtube.com/embed/h148GQaiyYg?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>            
            <div id="tab7" class="youtubeCts">
                <iframe src="https://www.youtube.com/embed/9RvqamrEklE?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab8" class="youtubeCts">
                <iframe src="https://www.youtube.com/embed/9cEtKOOW2og?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_02_02.jpg" alt="합격수기 확인하기" usemap="#Map2047A" border="0" />
            <map name="Map2047A" id="Map2047A">
                <area shape="rect" coords="285,591,834,686" href="https://police.willbes.net/promotion/index/cate/3001/code/1032" target="_blank" alt="확인하기" />
            </map>        
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_03.jpg" alt="파이널패스"/>
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2047_04.jpg" alt="파이널패스" usemap="#Map2017B" border="0"/>
            <map name="Map2017B" id="apply">
                <area shape="rect" coords="273,521,844,653" href="javascript:go_PassLecture('178370');" alt="파이널 패스 신청하기" />
            </map>
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />신광은경찰 FINAL PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내확인하기 ↓</a>               
            </div>
            <div class="info">
                ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br/>
                ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br/>
                ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.<br/>
                ※ 재수강 & 환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.<br/>
            </div> 
        </div>


        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">윌비스신광은경찰 FINAL PASS 이용안내</h4>
				<div class="infoTit"><strong>FINAL PASS 경찰전문 교수진</strong></div>
				<ul>
					<li>형소법 - 신광은 교수님</li>
                    <li>경찰학 - 장정훈 교수님</li>
                    <li>형법 – 김원욱 교수님 / 신광은 교수님</li>
                    <li>영어 – 하승민 교수님</li>
                    <li>한국사 – 원유철 교수님 / 오태진 교수님</li>                  
				</ul>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
					<li>2021년 1차 시험일까지 파이널패스 : 2021년 1차 시험 대비 기본이론, 심화이론+기출, 문제풀이 1~3단계, 마무리특강</li>    
				</ul>
				<div class="infoTit"><strong>수강기간</strong></div>
				<ul>
					<li>~ 2021.03.06 까지 (21년 1차 시험까지)</li>                                    				
				</ul>
                <div class="infoTit"><strong>이벤트 혜택</strong></div>
				<ul>
					<li>영어 좋은데이 어휘특강은 20년 3월 촬영 강의로 제공됩니다.</li>
                    <li>빅매치 합격예측모의고사 무료쿠폰은 FINAL PASS 구매 시 자동 발급됩니다.<br>
                    (내강의실 > 쿠폰함 확인)<br>
                    (빅매치 접수기간은 2/6(토) 16시까지  - 접수기간에 맞추어 사용해주시기 바랍니다.)</li>
                    <li>인강패스 10% 할인쿠폰 : 21년 1차 필기시험 종료 후 파이널패스 결제회원대상 일괄지급예정 (3/15)<br>
                    인강패스 10% 할인쿠폰 사용기간 : 21년 3월 15일 ~ 21년 3월 31일까지 사용가능<br>
                    (단, 쿠폰 적용 가능 패스상품은 특정상품에 제한될 수 있습니다.)</li>                    				
				</ul>
                <div class="infoTit NSK-Black">
                    ※ 타쿠폰과 중복할인이 불가합니다.<br>
                    ※ 해당 상품은 조기 마감될 수 있습니다.
                </div>
			</div>
		</div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function go_PassLecture(code) {
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ site_url('/periodPackage/show/cate/3006/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        //유튜브
        var tab1_url = "https://www.youtube.com/embed/dTl6YPUpGb8?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/MHryumpA4aM?rel=0&modestbranding=1&showinfo=0";        
        var tab3_url = "https://www.youtube.com/embed/ECWkjhhINmo?rel=0&modestbranding=1&showinfo=0";
        var tab4_url = "https://www.youtube.com/embed/7xiOqmDfOIQ?rel=0&modestbranding=1&showinfo=0";
        var tab5_url = "https://www.youtube.com/embed/lGDmsITP3wk?rel=0&modestbranding=1&showinfo=0";
        var tab6_url = "https://www.youtube.com/embed/h148GQaiyYg?rel=0&modestbranding=1&showinfo=0";        
        var tab7_url = "https://www.youtube.com/embed/9RvqamrEklE?rel=0&modestbranding=1&showinfo=0";
        var tab8_url = "https://www.youtube.com/embed/9cEtKOOW2og?rel=0&modestbranding=1&showinfo=0";

        $(function() {
        $(".youtubeCts").hide(); 
        $(".youtubeCts:first").show();
        $(".tabMenu li a").click(function(){ 
            var activeTab = $(this).attr("href"); 
            var html_str = "";
            if(activeTab == "#tab1"){
                html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab2"){
                html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab3"){
                html_str = "<iframe src='"+tab3_url+"' frameborder='0' allowfullscreen></iframe>";                   
            }else if(activeTab == "#tab4"){
                html_str = "<iframe src='"+tab4_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab5"){
                html_str = "<iframe src='"+tab5_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab6"){
                html_str = "<iframe src='"+tab6_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab7"){
                html_str = "<iframe src='"+tab7_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab8"){
                html_str = "<iframe src='"+tab8_url+"' frameborder='0' allowfullscreen></iframe>";
            }
            $(".tabMenu a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".youtubeCts").hide(); 
            $(".youtubeCts").html(''); 
            $(activeTab).html(html_str);
            $(activeTab).fadeIn(); 
            return false; 
            });
        });	

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop