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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/08/1357_top_bg.jpg) no-repeat center top;}
        .evtTop .evtTopInmg {
            position:absolute;
            top:500px;
            left:50%;
            margin-left:-460px;
            z-index:5;
            animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;
        }

        @@keyframes upDown{
            from{top:500px}
            50%{top:540px}
            to{top:500px}
         }
        @@-webkit-keyframes upDown{
            from{top:500px}
            50%{top:540px}
            to{top:500px}
         }

        .evt01 {
            background:url(https://static.willbes.net/public/images/promotion/2019/08/1357_01.jpg) no-repeat center top;
            height:1469px;
        }
        /* 슬라이드배너 */
        .slide_con {position:relative; width:1013px; margin:0 auto; padding-top:553px;}	
        .slide_con p {position:absolute; top:70%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-40px; width:27px; height:45px;}
        .slide_con p.rightBtn {right:-40px; width:27px; height:45px;}
        
        .evt02 {background:#ebf3f5}        
        .evt03 {background:#fff; padding-bottom:150px}
        .evt03 .check {width:1000px; margin:30px auto 0;}
        .evt03 .check li {line-height:1.5; letter-spacing:3; font-weight:bold; color:#362f2d; font-size:14px; text-align:left}
        .evt03 .check li:first-child {font-size:16px; margin-bottom:10px}
        .evt03 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .evt03 .check label {cursor:pointer}
        .evt03 .check input:checked + label {color:#0d3692; border-bottom:1px dashed #0d3692}
        .evt03 .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fffbfb; background:#252525; margin-left:50px; border-radius:20px}

        .evt04 {background:#36374d}

        .snslink {
            width: 980px;
            margin: 0 auto 50px;
        }
        .snslink li {
            display: inline;
            float: left;
            width: 25%;
            text-align: center;
        }
        .snslink:after {
            content:'';
            display: block;
            clear:both;
        }
    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_top.jpg" title="해양경찰공채 PASS">
            <div class="evtTopInmg">               
                <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_top_img.png" title="해양경찰이 뜨고 있다">
            </div>        
        </div>

        <div class="evtCtnsBox evt01">
            <div class="slide_con">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1357_01_01.jpg" alt="점점 증원하는 채용 인원" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1357_01_02.jpg" alt="일반경찰보다 낮은 경쟁률" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1357_01_03.jpg" alt="일반경찰과 준비를 병행할 수 있다." /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/08//arrow_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/08//arrow_right.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_02.jpg" title="해양경찰공채 교수진">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_03.jpg" usemap="#Map1357A" title="해양경찰공채 PASS" border="0">
            <map name="Map1357A" id="Map1357A">
                <area shape="rect" coords="671,605,821,683" href="https://police.willbes.net/periodPackage/show/cate/3007/pack/648001/prod-code/156366" target="_blank" alt="패스1_6개월" />
                <area shape="rect" coords="857,605,999,682" href="https://police.willbes.net/periodPackage/show/cate/3007/pack/648001/prod-code/156367" target="_blank" alt="패스1_12개월" />
                <area shape="rect" coords="673,723,819,803" href="https://police.willbes.net/periodPackage/show/cate/3007/pack/648001/prod-code/156368" target="_blank" alt="패스2_6개월" />
                <area shape="rect" coords="857,725,1004,803" href="https://police.willbes.net/periodPackage/show/cate/3007/pack/648001/prod-code/156369" target="_blank" alt="패스2_12개월" />
                <area shape="rect" coords="674,866,819,946" href="https://police.willbes.net/periodPackage/show/cate/3007/pack/648001/prod-code/156370" target="_blank" alt="패스3_6개월" />
                <area shape="rect" coords="856,867,1000,944" href="https://police.willbes.net/periodPackage/show/cate/3007/pack/648001/prod-code/156374" target="_blank" alt="패스3_12개월" />
                <area shape="rect" coords="675,992,819,1071" href="https://police.willbes.net/periodPackage/show/cate/3007/pack/648001/prod-code/156375" target="_blank" alt="패스4_6개월" />
                <area shape="rect" coords="855,992,1001,1070" href="https://police.willbes.net/periodPackage/show/cate/3007/pack/648001/prod-code/156376" target="_blank" alt="패스4_12개월" />
            </map>
            <ul class="check">
                <li>                    
                    <input name="is_chk" type="checkbox" id="is_chk" value="Y" /> <label for="is_chk">페이지 하단 해양경찰공채PASS 이용안내를 모두 확인하였고, 이에 동의합니다.   </label>      
                    <a href="#evt04">이용안내확인하기 ↓</a>
                 </li>
                <li>※ 강의공유, 콘텐츠 부정사용 적발 시, 강좌 수강 제한 및 회원자격 박탈, 민형사상 책임이 있습니다.</li>
                <li>※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.</li>
                <li>※ 수강신청시 선택한 한국사, 해양경찰학, 해사법규 과목은 변경이 안됩니다.</li>
            </ul>
        </div>

        <div class="evtCtnsBox evt04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_04.jpg" title="이용안내">
        </div>
	</div>
    <!-- End Container -->



    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
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
                moveSlides:1
                });
            
                $("#imgBannerLeft3").click(function (){
                    slidesImg1.goToPrevSlide();
                });
            
                $("#imgBannerRight3").click(function (){
                    slidesImg1.goToNextSlide();
                });
        });

    </script>

@stop