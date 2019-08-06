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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#f4f5f6;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }

        .wb_cts01 {background:url("https://static.willbes.net/public/images/promotion/2019/08/1358_top_bg.jpg") no-repeat center top}
        .wb_cts01s{margin-bottom:140px;}
        .wb_04 {background:#ececec; padding-bottom:100px;}		
            .wb_04_con2 {position:relative; width:1120px; margin:0 auto;left:100px;}	
            .wb_04_con2 p {position:absolute; top:45%; width:67px; height:67px; margin-top:-33px; z-index:100}
            .wb_04_con2 p a {cursor:pointer}
            .wb_04_con2 p.leftBtn {left:-70px;}
            .wb_04_con2 p.rightBtn {right:70px}
        .wb_cts02 {background:url("https://static.willbes.net/public/images/promotion/2019/08/1358_02_bg.jpg") no-repeat center top}
        .wb_cts03 {background:#212931;}
        .wb_cts04 {background:#f4f5f6;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/08/1358_skybanner.png" alt="김신주 영어 선착순"/></a>
        </div>    
        <div class="evtCtnsBox wb_cts01" >
           <img src="https://static.willbes.net/public/images/promotion/2019/08/1358_top.jpg" alt="빠른 합격을 위한 효율적인 영어 학습" />
        </div>
        <div class="evtCtnsBox wb_cts01s">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1358_01.jpg" alt="교재 무료 증정">       
            <div class="wb_04_con2">
				<ul id="slidesImg2">
					<li><img src="https://static.willbes.net/public/images/promotion/2019/08/1358_c1.gif" alt="1" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/08/1358_c2.gif" alt="2" /></li>				
				</ul>
				<p class="leftBtn"><a id="imgBannerLeft2"><img src="https://static.willbes.net/public/images/promotion/2019/08/arrow_left.png" alt="이전" /></a></p>
				<p class="rightBtn"><a id="imgBannerRight2"><img src="https://static.willbes.net/public/images/promotion/2019/08/arrow_right.png" alt="다음" /></a></p>
			</div>           
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1358_02.jpg" alt="빠른 합격을 위한 효율적인 영어 학습" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1069_03.gif" alt="김신주 매직아이 영어 커리큘럼" />
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1358_04.jpg" alt="수강신청" usemap="#Map1358a" border="0" />
            <map name="Map1358a" id="Map1358a">
                <area shape="rect" coords="893,407,1023,457" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146778" target="_blank"alt="수강기간 70일" />
                <area shape="rect" coords="892,606,1023,656" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152647" target="_blank"alt="수강기간 60일"/>
                <area shape="rect" coords="886,725,1020,777" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150378" target="_blank"alt="수강기간 100일"/>      
                <area shape="rect" coords="886,841,1023,900" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150658" target="_blank"alt="수강기간 100일"/>
            </map>
        </div>
        <!--wb_cts04//-->

    </div>
    <!-- End Container -->
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