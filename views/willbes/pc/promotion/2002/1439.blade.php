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

        .evt_top{background:url("https://static.willbes.net/public/images/promotion/2019/10/1439_top_bg.jpg") center top  no-repeat}

        .evt_01{background:#3d4550;}
        .evt_02{background:url("https://static.willbes.net/public/images/promotion/2019/10/1439_02_bg.jpg")}
        .evt_03{background:#fff; padding-bottom:150px}

        .evt_04{background:#f7f7f7;}
        .evt_04 div {width:1000px; margin:0 auto 20px}
        .evt_04 table {border-top:2px solid #ccc;border-left:2px solid #ccc; background:#fff}
        .evt_04 th,
        .evt_04 td {font-size:14px; padding:10px; border-bottom:2px solid #ccc; border-right:2px solid #ccc; line-height:1.5} 
        .evt_04 tbody th {background:#e4e4e4;}
        .evt_04 table .day{background:#333;color:#fff;font-weight:bold;}  
        .evt_04 table .time{font-weight:bold;}     
        .evt_04 table .deep{font-weight:bold;font-size:15px;}     
        .evt_04 table .gray{background:#D9D9D9;}        

        .evt_05{background:#e0e2e1;}
        .evt_06{background:#fff;}
        .evt_07{background:url("https://static.willbes.net/public/images/promotion/2019/10/1439_07_bg.jpg") center top  no-repeat}

        /* TAB */
        .tab {width:1090px; margin:0 auto;}		
        .tab li {display:inline; float:left;}	
        .tab a img.off {display:block}
        .tab a img.on {display:none}
        .tab a.active img.off {display:none}
        .tab a.active img.on {display:block}
        .tab:after {content:""; display:block; clear:both}

        .slide_con {position:relative; width:900px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-80px}
        .slide_con p.rightBtn {right:-80px} 

    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1439_top.jpg" title="윌비스 광주 스파르타 및 강습반">       
        </div>

        <div class="evtCtnsBox evt_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/10/1439_01.jpg"  title="경찰영어 전문교수진" />
                                
        </div>
        
        <div class="evtCtnsBox evt_02">            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1439_02.jpg"  title="윌비스 스파르타는 특별합니다." />   
        </div>

        <div class="evtCtnsBox evt_03">            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1439_03.jpg"  title="시설둘러보기" />            
            <div class="slide_con">
                <ul id="slidesImg2">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1439_03_s01.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1439_03_s02.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1439_03_s03.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1439_03_s04.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1439_03_s05.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1439_03_s06.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1439_03_s07.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1439_03_s08.jpg" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft2"><img src="https://static.willbes.net/public/images/promotion/2019/10/1439_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight2"><img src="https://static.willbes.net/public/images/promotion/2019/10//1439_arrowR.png"></a></p>
            </div>  
        </div>

        <div class="evtCtnsBox evt_04">      
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1439_04.jpg" title="운영시간표" />
            <div>             
                <table width="1000" border="1">
                    <tr class="day">
                        <td>구분</td>
                        <td>월</td>
                        <td>화</td>
                        <td>수</td>
                        <td>목</td>
                        <td>금</td>
                        <td>토</td>
                        <td>일</td>
                    </tr>
                    <tr>
                        <td class="time"><p>0교시<br />
                        07:30 ~ 08:20</p></td>
                        <td colspan="6"><p>자율공부시간 (50분)     ※ 0교시 참여는 자율입니다</p></td>
                        <td rowspan="12"><span class="deep">자 율 출 결</span><br />
                                         <span class="deep">자 율 학 습</span><br />
                    <br />
                    <br />
                    자율적인 분위기에선<br />
                    본인 시간 확보가 어려워<br />
                    <u><span class="deep">스스로 들어온 곳</span></u>입니다.<br />
                    <br />
                    <br />
                    <span class="deep">학습 분위기</span><br />
                    <span class="deep">조성을 위해</span><br />
                    <br />
                    <span class="deep">정해진 수업시간,</span><br />
                    <span class="deep">기본 규칙은</span><br />
                    <br />
                    <span class="deep">반드시</span><br />
                    <span class="deep">지켜주셔야 합니다.</span><br /></td>
                    </tr>
                    <tr>
                        <td class="time gray"><p>08:20 ~ 08:30</p></td>
                        <td colspan="6" class="gray"><p>아　침　정　비　시　간　(10분)</p></td>
                    </tr>
                    <tr>
                        <td class="time"><p>1교시<br />
                        08:30 ~ 09:50</p></td>
                        <td colspan="5"><p><span class="deep">집중공부시간</span> (80분)    <span class="deep">입·퇴실통제<span></p></td>
                        <td rowspan="2"><p>08:30 ~ 10:20<br />
                        <span class="deep">집중공부시간</span> (110분)</p></td>
                    </tr>
                    <tr>
                        <td class="time "><p>모의고사<br />
                        10:00 ~ 10:20</p></td>
                        <td colspan="5"><p>모의고사 (20분) 1과목 20문항　　　※ OMR 제출  필수<br />
                        ※목요일은 영어 모의고사 (10:00~10:30,  30분간 진행)</p></td>
                    </tr>
                    <tr>
                        <td class="time gray"><p>10:20 ~ 10:50</p></td>
                        <td colspan="6" class="gray"><p>OMR 수거 및 학습 정비 (30분)  /  목 10:30 ~ 10:50 (20분)</p></td>
                    </tr>
                    <tr>
                        <td class="time"><p>2교시<br />
                        10:50 ~ 12:30</p></td>
                        <td colspan="6"><p><span class="deep">집중공부시간</span> (100분)    <span class="deep">입·퇴실통제</span></p></td>
                    </tr>
                    <tr>
                        <td class="time gray"><p>12:30 ~ 14:00</p></td>
                        <td colspan="6" class="gray"><p>점　심　시　간　(90분)</p></td>
                    </tr>
                    <tr>
                        <td class="time"><p>3교시<br />
                        14:00 ~ 15:40</p></td>
                        <td colspan="6"><p><span class="deep">집중공부시간</span> (100분)    <span class="deep">입·퇴실통제</span></p></td>
                    </tr>
                    <tr>
                        <td class="time"><p>4교시<br />
                        16:00 ~17:40</p></td>
                        <td colspan="6"><p><span class="deep">집중공부시간</span> (100분)    <span class="deep">입·퇴실통제</span></p></td>
                    </tr>
                    <tr>
                        <td class="time gray"><p>17:40 ~ 19:00</p></td>
                        <td colspan="5" class="gray"><p>저　녁　시　간　(80분)</p></td>
                        <td rowspan="3"><p><span class="deep">자 율 학 습</span></p></td>
                    </tr>
                    <tr>
                        <td class="time"><p>5교시<br />
                        19:00 ~ 20:10</p></td>
                        <td colspan="5"><p><span class="deep">집중공부시간</span> (70분)    <span class="deep">입·퇴실통제</span></p></td>
                    </tr>
                    <tr>
                        <td class="time"><p>6교시<br />
                        20:30 ~ 22:00</p></td>
                        <td colspan="5"><p><span class="deep">집중공부시간</span> (90분)    <span class="deep">입·퇴실통제</span></p></td>
                    </tr>
                    </table>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1439_04_01.jpg" title="상담관리 카드 작성" />            
        </div>   

        <div class="evtCtnsBox evt_05">      
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1439_05.jpg" title="통합혜택" />          
        </div>

        <div class="evtCtnsBox evt_06">      
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1439_06.gif" usemap="#Map1439" title="수강신청하기" border="0" />
            <map name="Map1439" id="Map1439">
                <area shape="rect" coords="664,14,1048,365" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&subject_idx=1074&course_idx=&campus_ccd=605006" target="_blank" alt="수강신청하기" />
            </map>         
        </div>    

        <div class="evtCtnsBox evt_07">      
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1439_07.jpg" title="광주 윌비스가 함께 하겠습니다." />          
        </div>   
    </div>
    <!-- End evtContainer -->
  
    <script type="text/javascript">  
        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg2").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                autoHover: true,
                pager:false,
            });
                    
            $("#imgBannerLeft2").click(function (){
                slidesImg2.goToPrevSlide();
            });
            $("#imgBannerRight2").click(function (){
                slidesImg2.goToNextSlide();
            });
        });	
    </script>
@stop   