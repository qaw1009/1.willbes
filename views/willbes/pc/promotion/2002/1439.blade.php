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
        .evt_04 table {border-left:1px solid #ccc; background:#fff}
        .evt_04 th,
        .evt_04 td {font-size:14px; padding:10px; border-bottom:1px solid #ccc; border-right:1px solid #ccc; line-height:1.5}
        .evt_04 thead th {background:#333; color:#fff; font-weight:bold}
        .evt_04 tbody th {background:#e4e4e4;}
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
                <table cellspacing="0" cellpadding="0">
                    <col span="9" />
                    <thead>
                    <tr>
                        <th>구    분 </th>
                        <th>월 </th>
                        <th colspan="2">화 </th>
                        <th>수 </th>
                        <th>목 </th>
                        <th>금 </th>
                        <th>토 </th>
                        <th>일 </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>07:30~08:20 </th>
                        <td colspan="7">자율학습시간 (50분) ※ 자율참여 </td>
                        <td rowspan="17">자율학습</td>
                    </tr>
                    <tr>
                        <th>08:20~08:30 </th>
                        <td colspan="7">아 침 정 비 시 간 (10분) </td>
                    </tr>
                    <tr>
                        <th rowspan="2">08:30~09:50 </th>
                        <td colspan="6" rowspan="2">집중학습 (80분) </td>
                        <td rowspan="5">08:30~10:20<br />
                        집중학습<br />
                        (110분)<br />
                        모의고사X<br /></td>
                    </tr>
                    <tr> </tr>
                    <tr>
                        <th>09:50~10:00 </th>
                        <td colspan="6">모의고사 문제 및 OMR 배부 </td>
                    </tr>
                    <tr>
                        <th rowspan="2">모의고사<br />
                        10:00~10:20 </th>
                        <td colspan="2" rowspan="2">형사소송법 </td>
                        <td rowspan="2">한국사<br />
                        (행정법) </td>
                        <td rowspan="2">형법 </td>
                        <td rowspan="2">영어<br />
                        (수사) </td>
                        <td rowspan="2">경찰학개론 </td>
                    </tr>
                    <tr> </tr>
                    <tr>
                        <th>10:20~10:50 </th>
                        <td colspan="7">OMR수거 및 학습정비 </td>
                    </tr>
                    <tr>
                        <th>10:50~12:30 </th>
                        <td colspan="7">집중학습 (100분) </td>
                    </tr>
                    <tr>
                        <th>12:30~14:00 </th>
                        <td colspan="7">점 심 시 간 (90분) </td>
                    </tr>
                    <tr>
                        <th>14:00~15:40 </th>
                        <td colspan="7">집중학습 (100분) </td>
                    </tr>
                    <tr>
                        <th>15:40~16:00 </th>
                        <td colspan="7">20분 휴식 </td>
                    </tr>
                    <tr>
                        <th>16:00~17:40 </th>
                        <td colspan="6">집중학습 (100분) </td>
                        <td rowspan="5">16:0016:00~18:00<br />
                        집중학습<br />
                        (120분)<br />
                        이후<br />
                        자율학습<br />
                        ~18:00 </td>
                    </tr>
                    <tr>
                        <th>17:40~19:00 </th>
                        <td colspan="6">저 녁 시 간 (80분) </td>
                    </tr>
                    <tr>
                        <th>19:00~20:40 </th>
                        <td colspan="6">집중학습 (100분) </td>
                    </tr>
                    <tr>
                        <th>20:40~21:00 </th>
                        <td colspan="6">20분 휴식 </td>
                    </tr>
                    <tr>
                        <th>21:00~22:30 </th>
                        <td colspan="6">집중학습 (90분) </td>
                    </tr>
                    </tbody>
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