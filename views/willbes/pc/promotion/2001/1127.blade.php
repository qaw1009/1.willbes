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
            top:200px; 
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
        .wb_07 h3 {text-align:left; font-size:140%; padding-left:50px; margin-top:40px}
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

        .wb_08 {background:#eaeaea; padding-bottom:100px}
        
        /* 슬라이드배너 */
        .slide_con {position:relative; width:900px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-40px; top:46%; width:80px; height:80px;}
        .slide_con p.rightBtn {right:-40px;top:46%; width:80px; height:80px;}
    </style>


<div class="evtContent" id="evtContainer">     

    <!--div class="skybanner">
        <div><a href="#event_go" ><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_sky.png" alt="#"></a></div>
    </div-->   

    <div class="evtCtnsBox wb_top" id="main">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_01.png"  alt="#" usemap="#Map_lec_go" border="0"/>
        <map name="Map_lec_go">
            <area shape="rect" coords="190,756,1040,863" href="#lec_go" alt="수강신청하러가기">
        </map>		  
    </div>

    <div class="evtCtnsBox wb_01">
        <ul>
            <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_02.jpg"  alt="#"/></li>
            <li class="pb50"><iframe width="854" height="480" src="https://www.youtube.com/embed/GLQ9KlRsusk?rel=0" frameborder="0" allowfullscreen></iframe></li>
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

    <div class="evtCtnsBox wb_08">
		  <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001.jpg"  alt="#" />
          <div class="slide_con">
            <ul id="slidesImg7">
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_1.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_2.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_3.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_4.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_5.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_6.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_7.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_8.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_9.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_10.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_11.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_12.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_13.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_14.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_15.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_16.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_17.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_18.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_19.jpg" alt="#" /></li>
              <li><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_001_20.jpg" alt="#" /></li>
            </ul>
            
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_002.jpg"  alt="#" usemap="#Map_down" border="0" />
            
            <map name="Map_down" id="Map_down">
              <area shape="rect" coords="82,27,405,86" href="javascript:goFileDownload('board/201903/20190308_law.hwp','형소법 적중자료_2019년.hwp');" >
              <area shape="rect" coords="577,27,891,87" href="javascript:goFileDownload('board/201903/20190308_cop.hwp','경찰학 적중자료_2019년.hwp');">
            </map>
            
            <p class="leftBtn"><a id="imgBannerLeft7"><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_arr_prev.png" alt="이전" /></a></p>
            <p class="rightBtn"><a id="imgBannerRight7"><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_arr_next.png" alt="다음" /></a></p>
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

    {{--@include('html.event_replyUrl')--}}

    <div class="evtCtnsBox wb_07 NSK">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_07.jpg"  alt="#"  id="lec_go" />
        <div class="wb_07_c">
            <h3>[단과]</h3>
            <table>
                <col width="20%" />
                <col width="" />
                <col width="20%" />
                <col width="20%" />
                <thead>
                    <tr>
                        <th colspan="2" >강의명</th>
                        <th style="text-align:center; ">개강일</th>
                        <th>학원</th>
                        <th>동영상강의</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="st01">신광은 형소법</td>
                        <td class="st03">동형모의고사 <span class="st02">3/25(월) ~ 4/15(월) , 총 5회</span></td>
                        <td class="st01">3/25(월) 8:40</td>
                        <td class="st04"><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;subject_idx=1057') }}">수강신청</a></td>
                        <td class="st04"><a href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/152099') }}">수강신청</a></td>
                    </tr>
                    <tr>
                        <td class="st01">오태진 한국사</td>
                        <td class="st03">동형모의고사 <span class="st02">3/26(화) ~ 4/16(화) , 총 5회</span></td>
                        <td class="st01">3/26(화) 8:40</td>
                        <td class="st04"><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;subject_idx=1055&amp;prof_idx=50132') }}">수강신청</a></td>
                        <td class="st04"><a href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/152085') }}">수강신청</a></td>
                    </tr>
                    <tr>
                        <td class="st01">원유철 한국사</td>
                        <td class="st03">동형모의고사 <span class="st02">3/26(화) ~ 4/16(화) , 총 5회</span></td>
                        <td class="st01">3/26(화) 8:40</td>
                        <td class="st04"><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;subject_idx=1055&amp;prof_idx=50642') }}">수강신청</a></td>
                        <td class="st04"><a href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/152087') }}">수강신청</a></td>
                    </tr>
                    <tr>
                        <td class="st01">장정훈 경찰학</td>
                        <td class="st03">동형모의고사 <span class="st02">3/27(수) ~ 4/17(수) , 총 5회</span></td>
                        <td class="st01">3/27(수) 8:4</td>
                        <td class="st04"><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;subject_idx=1058&amp;prof_idx=50032') }}">수강신청</a></td>
                        <td class="st04"><a href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/152091') }}">수강신청</a></td>
                    </tr>
                    <tr>
                        <td class="st01">김원욱 형법 </td>
                        <td class="st03">동형모의고사 <span class="st02">3/28(목) ~ 4/20(목) 총 5회</span></td>
                        <td class="st01">3/28(목) 8:40</td>
                        <td class="st04"><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;subject_idx=1056&amp;prof_idx=50298') }}">수강신청</a></td>
                        <td class="st04"><a href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/152094') }}">수강신청</a></td>
                    </tr>            
                    <tr>
                        <td class="st01">하승민 영어</td>
                        <td class="st03">동형모의고사 <span class="st02">3/29(금) ~ 4/19(금) 총 5회</span></td>
                        <td class="st01">3/29(금) 8:40</td>
                        <td class="st04"><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;subject_idx=1054&amp;prof_idx=50136') }}">수강신청</a></td>
                        <td class="st04"><a href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/152089') }}">수강신청</a></td>
                    </tr>
                </tbody> 
            </table>

            <h3>[종합반]</h3>

            <table>
                <col />
                <col width="20%" />
            <thead>
                <tr>
                    <th>강의명</th>
                    <th>수강신청</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tx-left ">[학원] 2019년 1차대비 2+3단계 모의고사 문제풀이 종합반</td>
                    <td><a href="{{ site_url('/pass/OffPackage/show/prod-code/150967') }}" target="_blank">수강신청</a></td>
                </tr> 
                <tr>
                    <td class="tx-left ">[동영상] 2019년 1차대비 2단계 동형 모의고사 문제풀이 종합반 (史 원유철)</td>
                    <td><a href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/152117') }}" target="_blank">수강신청</a></td>
                </tr>
                <tr>
                    <td class="tx-left ">[동영상] 2019년 1차대비 2단계 동형 모의고사 문제풀이 종합반 (史 오태진)</td>
                    <td><a href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/152116') }}" target="_blank">수강신청</a></td>
                </tr>
                <tr>
                    <td colspan="2"><img src="http://file3.willbes.net/new_cop/2019/03/EV190306Y_07_map.jpg" /></td>
                </tr>
            </tbody>
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

    $(document).ready(function() {
		var slidesImg7 = $("#slidesImg7").bxSlider({
		//mode:'fade', option : 'horizontal', 'vertical', 'fade'
		auto:true,
		speed:350,
		pause:4000,
		controls:false,
		slideWidth:980,
		autoHover: true,
		pager:false,
		});

		$("#imgBannerLeft7").click(function (){
		slidesImg7.goToPrevSlide();
		});
		$("#imgBannerRight7").click(function (){
		slidesImg7.goToNextSlide();
		});
		
	});

    $(function(e){
        var targetOffset= $("#evtContainer").offset().top;
        $('html, body').animate({scrollTop: targetOffset}, 700);  
    });
</script>

@stop