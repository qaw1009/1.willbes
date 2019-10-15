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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}

        /************************************************************/     

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/10/1427_top_bg.jpg) no-repeat center top;}       
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/10/1427_01_bg.jpg) no-repeat center top;}            
        .evt02 {background:#f4f1f3;}
        .evt03 {background:#fff; padding-bottom:150px}   
            .tabs {width:980px; z-index:10; margin:0 auto}
                .tabs ul{width:214px; float:left}
                .tabs li a {display:table-cell; vertical-align:middle; width:214px; border:1px solid #000; border-bottom:0; height:110px; background:#b7b7b7; text-align:center; color:#fff; font-size:16px; line-height:1.5}
                .tabs li a:hover,
                .tabs li a.active {background:#ce893c;}
                .tabs li:last-child a {border-bottom:1px solid #000}
                .tabs div {width:752px; float:right}
                .tabs div a {display:block; width:400px; margin:160px auto 0; background:#0a0f25; color:#fff; font-size:22px; padding:15px 0; border-radius:40px}
                .tabs div a:hover {background:#c6b269;}
            .tabs:after {content:""; display:block; clear:both}
        .evt04 {background:#36374d;}

        .skybanner{position: fixed; bottom:20px; right:10px; z-index: 1;}	
        .skybanner li {margin-bottom:5px; text-align:center}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <ul class="skybanner">
            <li><a href="#go_lec"><img src="https://static.willbes.net/public/images/promotion/2019/10/1427_sky_01.png" alt="교재쏜다" /></a></li>
            <li><a href="https://pass.willbes.net/pass/consultManagement/index" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/10/1427_sky_02.png" alt="1:1학원상담" /></a></li>
            <li><a href="https://pf.kakao.com/_kcZIu" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/10/1427_sky_03.png" alt="카카오톡상담" /></a></li>
            <li><a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1101" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/10/1427_sky_04.png" alt="통합생활관리반" /></a></li>
		</ul>  

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1427_top.jpg"  title="외무영사직 이상구 교수님의 패권반" />
        </div>
      
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1427_01.jpg" title="윌비스 패권반 11월 9일 개강"  /> 
            	       
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1427_02.jpg" title="완벽한 문제풀이 커리큘럼"  />            
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1427_03.jpg" title="학습/생활관리 프로그램"  />
            <div class="tabs">
                <ul>
                    <li><a href="#tab01">오직 실강 전용<br>패권반</a></li>
                    <li><a href="#tab02">이상구 교수님의<br>1:1 밀착관리</a></li>
                    <li><a href="#tab03">국제법/국제정치학<br>완전 정복</a></li>
                    <li><a href="#tab04">패권반<br>타임테이블</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1427_03_1.jpg" alt="패권반" />
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1427_03_2.jpg" alt="1:1 밀착관리" />
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1427_03_3.jpg" alt="완전 정복" />
                </div>
                <div id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1427_03_4.jpg" alt="타임테이블" />
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt04" id="go_lec">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1427_04.jpg" usemap="#Map1427" title="수강신청" border="0"  />
            <map name="Map1427" id="Map1427">
                <area shape="rect" coords="129,924,988,973" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&amp;subject_idx=1273&amp;course_idx=1062&amp;prof_idx=50394" target="_blank" alt="외무영사직 수강신청" />
            </map>
        </div>       

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $regi_form = $('#regi_form');
         /*tab*/
         $(document).ready(function(){
            $('.tabs ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });
    </script>    
@stop