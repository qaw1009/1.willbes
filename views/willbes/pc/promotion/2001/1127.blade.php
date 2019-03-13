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
            position:relative;            
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .skybanner {
            position:fixed; 
            bottom:20px; 
            right:0;
            z-index:1;            
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .wb_top {background:#000422 url(http://file3.willbes.net/new_cop/2019/03/EV190306Y_01_bg.jpg) repeat-y center top; margin-top:20px}	
        .wb_01 {background:#eaeaea; padding-bottom:100px}
        .wb_02 {background:#384186; padding-bottom:100px}
        .wb_03 {background:#2360bb}
        .wb_04 {background:#fff}	
        .wb_04 {background:#fff}
        .wb_05 {background:#eaeaea}
        .wb_06 {background:#ef67bc; padding-bottom:50px; margin-bottom:100px}

        .wb_07 {background:#fff; padding-bottom:120px; width:1210px; margin:0 auto; text-align:center;}
        .wb_07_c {border:10px solid #dedede; font-size:14px; margin:50px; padding-bottom:50px}
        .wb_07 p {border-top:1px solid #c2c2c2; margin-bottom:20px}
        .wb_07 table {width:980PX; margin:40px auto;}
        .wb_07 td {padding:12px 5px; text-align:center; border-bottom:1px solid #eee;}
        .wb_07 .bookimg {padding:0px;}
        .wb_07 td a {display:block; color:#272727; border:1px solid #272727; padding:8px}
        .wb_07 td a.active,
        .wb_07 td a:hover {background:#272727; color:#fff; text-align:center;}
        .wb_07 th {background-color: #eae9e9; height:38px; line-height:38px; font-size:16px; text-align:center; font-weight:bold; letter-spacing:-3px;}
        .wb_07 .st01 {font-weight:bold; text-align:center;} 	
        .wb_07 .st02 {color:#272727; padding-left:0px;}	
        .wb_07 .st03 {font-weight:bold; color:#F30;}	
        .wb_07 .st04 {text-align:center;}  
        
        /* 슬라이드배너 */
        .slide_con {position:relative; width:900px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-40px; top:46%; width:80px; height:80px;}
        .slide_con p.rightBtn {right:-40px;top:46%; width:80px; height:80px;}
    </style>


<div class="evtContent" id="evtContainer">     

    <div class="skybanner">
        <div><a href="#event_go" ><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_sky.png" alt="#"></a></div>
    </div>   

    <div class="evtCtnsBox wb_top" id="main">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_01.png"  alt="#" usemap="#Map_lec_go" border="0"/>
        <map name="Map_lec_go">
            <area shape="rect" coords="190,756,1040,863" href="#lec_go" alt="수강신청하러가기">
        </map>		  
    </div>

    <div class="evtCtnsBox wb_01">
        <ul>
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_02.jpg"  alt="#"/></li>
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_02_youtube_s.jpg"  alt="신광은"/></li>
        </ul>
    </div>

    <div class="evtCtnsBox wb_02">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_03.jpg"  alt="#" />
        <div class="slide_con">
            <ul id="slidesImg6">
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_03_1.jpg" alt="#" /></li>
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_03_2.jpg" alt="#" /></li>
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_03_3.jpg" alt="#" /></li>
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_03_4.jpg" alt="#" /></li>
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_03_5.jpg" alt="#" /></li>
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_03_6.jpg" alt="#" /></li>
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_03_7.jpg" alt="#" /></li>
            </ul>
            <p class="leftBtn"><a id="imgBannerLeft6"><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_arr_prev.png" alt="이전" /></a></p>
            <p class="rightBtn"><a id="imgBannerRight6"><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_arr_next.png" alt="다음" /></a></p>
        </div>			
    </div>

    <div class="evtCtnsBox wb_04">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_04.jpg"  alt="#"/>
    </div>

    <div class="evtCtnsBox wb_05">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_05.jpg"  alt="#"/>
    </div>

    <div class="evtCtnsBox wb_06" id="event_go">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_06_01.jpg"  alt="#" />
    </div>

    @include('html.event_replyUrl')

    <div class="evtCtnsBox wb_07 NSK">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_07.jpg"  alt="#"  id="lec_go" />
        <div class="wb_07_c">
            <table>
            <col width="20%" />
            <col width="" />
            <col width="20%" />
            <col width="20%" />
            <thead>
                <tr>
                <th colspan="2" >강의명</th>
                <th style="text-align:center; ">개강일</th>
                <th>학원 실강</th>
                </tr>
            </thead>
            <tr>
                <td class="st01">신광은 형소법</td>
                <td class="st03">동형모의고사    <span class="st02">3/25(월) ~ 4/15(월) , 총 5회</span></td>
                <td class="st01">3/25(월) 8:40</td>
                <td class="st04"><a href="/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1004&searchLeccode=D201900086&leftMenuLType=&lecKType=&USER_ID=&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
            </tr>
            <tr>
                <td class="st01">오태진 한국사</td>
                <td class="st03">동형모의고사    <span class="st02">3/26(화) ~ 4/16(화) , 총 5회</span></td>
                <td class="st01">3/26(화) 8:40</td>
                <td class="st04"><a href="/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1002&searchLeccode=D201900089&leftMenuLType=&lecKType=&USER_ID=&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
            </tr>
            <tr>
                <td class="st01">원유철 한국사</td>
                <td class="st03">동형모의고사    <span class="st02">3/26(화) ~ 4/16(화) , 총 5회</span></td>
                <td class="st01">3/26(화) 8:40</td>
                <td class="st04"><a href="/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1002&searchLeccode=D201900090&leftMenuLType=&lecKType=&USER_ID=&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
            </tr>
            <tr>
                <td class="st01">장정훈 경찰학</td>
                <td class="st03">동형모의고사   <span class="st02">3/27(수) ~ 4/17(수) , 총 5회</span></td>
                <td class="st01">3/27(수) 8:4</td>
                <td class="st04"><a href="/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1005&searchLeccode=D201900087&leftMenuLType=&lecKType=&USER_ID=&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
            </tr>
            <tr>
                <td class="st01">김원욱 형법 </td>
                <td class="st03">동형모의고사    <span class="st02">3/28(목) ~ 4/20(목) 총 5회</span></td>
                <td class="st01">3/28(목) 8:40</td>
                <td class="st04"><a href="/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1003&searchLeccode=D201900085&leftMenuLType=&lecKType=&USER_ID=&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
            </tr>
            <tr>
                <td class="st01">하승민 영어</td>
                <td class="st03">동형모의고사   <span class="st02">3/29(금) ~ 4/19(금) 총 5회</span></td>
                <td class="st01">3/29(금) 8:40</td>
                <td class="st04"><a href="/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1001&searchLeccode=D201900088&leftMenuLType=&lecKType=&USER_ID=&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
            </tr>                
            <tr>
                <td colspan="4" class="bookimg"><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_07_map.jpg" /></td>
            </tr>
            </table>
        </div>
    </div>           
</div>
<!-- End Container -->


<script type="text/javascript">
    $(document).ready(function() {
        var slidesImg6 = $("#slidesImg6").bxSlider({
        //mode:'fade', option : 'horizontal', 'vertical', 'fade'
        auto:true,
        speed:350,
        pause:4000,
        controls:false,
        slideWidth:900,
        autoHover: true,
        pager:false,
        });

        $("#imgBannerLeft6").click(function (){
        slidesImg6.goToPrevSlide();
        });
        $("#imgBannerRight6").click(function (){
        slidesImg6.goToNextSlide();
        });
    });

    $(function(e){
        var targetOffset= $("#evtContainer").offset().top;
        $('html, body').animate({scrollTop: targetOffset}, 700);  
    });
</script>

@stop