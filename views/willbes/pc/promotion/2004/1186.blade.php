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
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:#B7130F url(https://static.willbes.net/public/images/promotion/2020/06/1186_top_bg.jpg) no-repeat center top;}

         /* 슬라이드배너 */
        .slide_con {position:relative; width:1120px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:0}
        .slide_con p.rightBtn {right:0}

        .evt01s {background:#e4e4e4;padding-bottom:50px}
        .evt01s .slide_con {position:relative; width:950px; margin:0 auto}
        .evt01s .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt01s .slide_con p.leftBtn {left:-80px}
        .evt01s .slide_con p.rightBtn {right:-80px}         
        
        .evt01 {background:#eee; padding:50px 0 100px}        
        .evt01 div {position:relative; width:1120px; margin:0 auto}
        .evt01 div span {position:absolute;  display:block; width:433px; height:67px; line-height:67px; z-index:10}
        .evt01 div span:nth-child(1) {top:250px;left:460px;}

        .evt01 div span:nth-child(2) {top:700px}
        .evt01 div span:nth-child(3) {top:780px}
        .evt01 div span:nth-child(4) {top:860px}

        .evt01 div span:nth-child(5) {top:1200px;left:460px;}

        .evt01 div span:nth-child(6) {top:1740px}

        .evt01 div span:nth-child(7) {top:2300px;left:460px;}

        .evt01 div span a {display:block; text-align:center; color:#333; background:#fff; font-size:18px; font-weight:600; border:1px solid #ff5d7a !important;}
        .evt01 div span a:hover {color:#fff; background:#ff5d7a}
        
		.evt02 {background:#fff;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

      <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/06/1186_top.gif" title="소방전담 교수님의 완벽분석 해설강의">
      </div>

      <div class="evtCtnsBox evt01s">
        <img src="https://static.willbes.net/public/images/promotion/2020/06/thank.jpg"  alt="소방직 합격"/>
        <div class="slide_con">
            <ul id="slidesImg4">
                <li><img src="https://static.willbes.net/public/images/promotion/2020/06/thanks01.jpg" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/06/thanks02.jpg" /></li>     
            </ul>
            <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_arrowL.png"></a></p>
            <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_arrowR.png"></a></p>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2020/06/thanks_emo.jpg"  alt="이모티콘"/>
    </div>

      <div class="evtCtnsBox evt01">
          
        <div>          
          {{--국어 김세령--}}
          <span><a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" >2020 소방직 국어 해설강의 및 총평&해설자료 ></a></span>

          {{--소방학개론/소방관계법규 김종상--}}
          <span><a href="{{ site_url('/lecture/show/cate/3023/pattern/free/prod-code/167423') }}" target="_blank" >2020 소방직 소방학개론 기출해설강의 ></a></span>
          <span><a href="{{ site_url('/lecture/show/cate/3023/pattern/free/prod-code/167422') }}" target="_blank" >2020 소방직 공채 소방관계법규 기출해설강의 ></a></span>
          <span><a href="{{ site_url('/lecture/show/cate/3023/pattern/free/prod-code/167420') }}" target="_blank" >2020 소방직 경채 소방관계법규 기출해설강의 ></a></span>

          {{--영어 이아림--}}
          <span><a href="javascript:alert('준비중입니다.')">2020 소방직 공채 영어 및 총평&해설자료 ></a></span>

          {{--영어 양익--}}
          <span><a href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" >2020 소방직 공채 영어 및 총평&해설자료 ></a></span>

          {{--한국사 한경준--}}
          <span><a href="@if(empty($file_yn) === false && $file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif" >2020 소방직 한국사 및 총평&해설자료 ></a></span>

          <img src="https://static.willbes.net/public/images/promotion/2020/06/1186_01.png" title="소방직 해설강의" border="0">
        </div>
      
      </div>
	  
	  <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/06/1186_02.jpg" usemap="#Map1186a" title="불꽃소방팀의 합격전담반" border="0" />
        <map name="Map1186a" id="Map1186a">
            <area shape="rect" coords="380,1071,741,1142" href="{{ site_url('/lecture/show/cate/3050/pattern/free/prod-code/167379') }}" target="_blank" >
        </map>     
	  </div>

	</div>
    <!-- End Container -->

    <script type="text/javascript">
             $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop