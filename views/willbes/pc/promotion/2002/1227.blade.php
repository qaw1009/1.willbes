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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .skyBanner {position:fixed; top:220px; right:0; width:184px; z-index:10}

        .evtTxt {background:#1e2a36}

        .evtTop {background:#ececec url("") center top  no-repeat;}
        .evtBcli {position:absolute; left:50%; top:-50px; margin-left:-540px; width:215px; z-index:1; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{top:-50px}
        50%{top:-10px}
        to{top:-50px}
        }
        @@-webkit-keyframes upDown{
        from{top:-50px}
        50%{top:-10px}
        to{top:-50px}
        } 
        .evtTop .btn {position:absolute; left:50%; bottom:120px; margin-left:-300px; width:600px; z-index:2;}
        .evtTop .btn a {display:block; width:600px; margin:0 auto; padding:20px 0; background:#fff; color:#000; 
            font-size:26px; border-radius:20px; border-bottom:10px solid #000;
            -webkit-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
            -moz-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
            box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
        }
        .evtTop .btn a:hover {background:#ffd835; color:#000}

        .evt01 {background:#009ef5 url("") center top  no-repeat;}
        .rouletteBox {position:absolute; width:510px; height:510px; top:414px; left:50%; margin-left:-255px; z-index:1}
        .rouletteBox .start{position:absolute;left:0;right:0;top:0;bottom:0;margin:auto;width:100px;height:100px;line-height:100px;cursor:pointer;background-color:#000;color:#fff;text-align:center;border-radius:50%;}
        .rouletteBox .target{position:absolute;left:0;right:0;top:-30px;margin:0 auto;border-left:20px solid transparent;border-right:20px solid transparent;border-top:50px solid #000;width:0;height:0;}
        
        .evt02 {background:#ffe040 center top  no-repeat; }
        /* 슬라이드 */
        .slide_con {position:relative; width:960px; margin:80px auto 0}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-34px; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-34px;top:46%; width:67px; height:67px;}
		
		.evt03 {background:#fff url("") center top  no-repeat;}
        
		.evt04 {background:#ececec  url("https://static.willbes.net/public/images/promotion/2019/05/1227_05L_bg.jpg"); height:1192px;}
        
        .evt05 {background:#ececec  url("");}
        #movieFrame {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/2019/05/1227_03_liveBg_L.jpg) no-repeat center center;}
        .embedWrap {position:relative; width:980px; height:551px; margin:0 auto}
        .embed-container {padding-bottom:46.25%; overflow:hidden; width:100%; min-height:551px; margin:0 auto}      
        
                
         /*크롬*/
         @@media screen and (-webkit-min-device-pixel-ratio:0) {
        #movieFrame {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/2019/05/1227_03_liveBg_L.jpg) no-repeat center center;}
        .embedWrap {position:relative; width:980px; height:551px; margin-left:70px; background:url(https://static.willbes.net/public/images/promotion/2019/05/1227_03_live01.jpg) no-repeat center center;}
        .embed-container {padding-bottom:46.25%; overflow:hidden; width:980px; height:auto; margin:0 auto;}
        .mobileCh {position:absolute; left:0; bottom:0; width:980px;}
        .mobileCh li {display:inline; float:left; width:490px;}
        .mobileCh li a {display:block;}
        .mobileCh li a.ch2 {color:#6CF}
        .mobileCh li a:hover {color:#FC0}
        .mobileCh:after {content:""; display:block; clear:both}
        } 

        /*모바일*/
        .mobileCh {position:absolute; bottom:0; width:980px;}
        .mobileCh li {display:inline; float:left; width:50%;}
        .mobileCh li a {display:block;}
        .mobileCh li:last-child a {margin:0}
        .mobileCh li a.ch2 {color:#6CF}
        .mobileCh li a:hover {color:#FC0}
        .mobileCh:after {content:""; display:block; clear:both}

        .evt06 {background:#19294d;}
        .evt07 {background:#2ecbc2;}
        .evt08 {background:#414852;}	
		.evt09 {background:#525685;}	
		#movieFrame2 {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/2019/05/1227_09L-live-bg.jpg) no-repeat center center;}
        .embedWrap {position:relative; width:980px; height:551px; margin:0 auto}
        .embed-container {padding-bottom:46.25%; overflow:hidden; width:100%; min-height:551px; margin:0 auto}
		
		.evt10 {background:#fff;}	
        .evtinfo {background:#363636;}	
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skyBanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_skybanner_L.png" usemap="#Map1227A" title="다! 드림! 이벤트" border="0">
            <map name="Map1227A" id="Map1227A">
            <area shape="rect" coords="13,52,174,119" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1227#evt02" />
			  <area shape="rect" coords="16,125,174,192" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1227#evt03" />
			  <area shape="rect" coords="17,198,171,260" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1227#evt03" />
			  <area shape="rect" coords="15,266,173,328" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1227#evt06" />
			  <area shape="rect" coords="18,338,168,397" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1227#evt07" />
			  <area shape="rect" coords="21,406,169,466" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1227#evt08" />
			  <area shape="rect" coords="22,474,165,539" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1227#evt10" />
			 </map>
        </div>        

        <div class="evtCtnsBox evtTxt">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_txt01.jpg" title="브랜드 충성도 1위! 최종 합격기원 감사제!">   
        </div>

        <div class="evtCtnsBox evtTop" id="evtTop">
            <div class="evtBcli">
                <a href="https://police.dev.willbes.net/support/notice/show/cate/3001?board_idx=223660" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_top_bcli.png" title="2019 브랜드 고객충성도 1위">
                </a>    
            </div>    
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_01L.jpg" title="최종합격기원 감사제"><br>
            <div class="btn NGEB"><a href="@if(empty($cert_apply)){!!"javascript:certOpen();"!!}@else{!!"javascript:alert('이미 이벤트에 참가하셨습니다.')"!!}@endif" >필기합격 & 친구추천 한번에 인증하기 ></a></div>
        </div>

        {{--TODO : Roulette 기능 (미적용)--}}
        {{--<canvas id="roulette" class="tutCanvas" width="400" height="400"></canvas>
        @include('willbes.pc.site.event.show_roulette_patial')--}}

        <div class="evtCtnsBox evt01" id="evt01">
            {{--5.13일 노출
            <div class="rouletteBox">
                <div class="roulett"><img src="https://static.willbes.net/public/images/promotion/2019/05/1227_roulette_s.png" alt="룰렛판"></div>
                <div class="start">start</div>
                <div class="target"></div>
            </div>
            --}}

            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_02L.jpg" title="필기합격자 누구나 참여가능">
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_03L.jpg" title="경찰 체력 특전">
        </div>
		<div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_04L.jpg" title="경찰 체력 특전">
        </div>
		<div class="evtCtnsBox evt04" id="evt04">
			<img src="https://static.willbes.net/public/images/promotion/2019/05/1227_05L.png" title="경찰 체력 특전">
        </div>

        <div class="evtCtnsBox evt05" id="evt05">
            <div id="movieFrame">
                {{--방송 전--}}
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_live01L.jpg" title="방송전">
                

                {{--7/2 ~ 7.15 오전 9시 30분 방송 중
                <script src="/public/vendor/jwplayer/jwplayer.js"></script>
                <div class="movieplayer">
                    <div class="embedWrap">
                        <!--PC-->    
                        <div class="embed-container" id="myElement">
                            <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                            <script type="text/javascript">
                                jwplayer("myElement").setup({
                                width: '100%',
                                logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                image: "https://static.willbes.net/public/images/promotion/2019/05/1227_live01L.jpg",
                                aspectratio: "16:9",
                                autostart: "true",
                                file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop3011"
                            });
                            </script>
                        </div>

                        <!--모바일용-->
                        <div class="embed-container-mobile" id="myElement">
                            <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                            <script type="text/javascript">
                                jwplayer("myElement").setup({
                                width: '100%',
                                logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                image: "https://static.willbes.net/public/images/promotion/2019/05/1227_live01L.jpg",
                                aspectratio: "16:9",
                                autostart: "true",
                                file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop3011"
                            });
                            </script>
                        </div>
                        <ul class="mobileCh">
                            <li><a href="javascript:fn_live('hd')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnH.png" title="고화질 보기"></a></li>
                            <li><a href="javascript:fn_live('low')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnN.png" title="일반화질 보기"></a></li>
                        </ul>                            
                    </div>
                </div>
                --}}
                
                {{--방송종료 00:00 부터 노출
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_03_live02.jpg" title="방송종료" />
                --}}
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_06L.jpg" title="라이브 특강 진행 안내">
			
			@if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif
        </div>
		
		<div class="evtCtnsBox evt06" id="evt06">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_07L.jpg" title="강의 제공 특전" />
        </div>

        <div class="evtCtnsBox evt07" id="evt07">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_08L.jpg" title="소문내기 경품 특전" />
        </div>

        <div class="evtCtnsBox evt08" id="evt08">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_09L.jpg" title="다드림 소문내기 이벤트 경품" />
			<div id="movieFrame2">
                {{--방송 전--}}
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_09L-live.jpg" title="방송전">
                

                {{--7/2 ~ 7.15 오전 9시 30분 방송 중
                <script src="/public/vendor/jwplayer/jwplayer.js"></script>
                <div class="movieplayer">
                    <div class="embedWrap">
                        <!--PC-->    
                        <div class="embed-container" id="myElement">
                            <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                            <script type="text/javascript">
                                jwplayer("myElement").setup({
                                width: '100%',
                                logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                image: "https://static.willbes.net/public/images/promotion/2019/05/1227_09L-live.jpg",
                                aspectratio: "16:9",
                                autostart: "true",
                                file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop3011"
                            });
                            </script>
                        </div>

                        <!--모바일용-->
                        <div class="embed-container-mobile" id="myElement">
                            <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                            <script type="text/javascript">
                                jwplayer("myElement").setup({
                                width: '100%',
                                logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                image: "https://static.willbes.net/public/images/promotion/2019/05/1227_09L-live.jpg",
                                aspectratio: "16:9",
                                autostart: "true",
                                file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop3011"
                            });
                            </script>
                        </div>
                        <ul class="mobileCh">
                            <li><a href="javascript:fn_live('hd')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnH.png" title="고화질 보기"></a></li>
                            <li><a href="javascript:fn_live('low')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnN.png" title="일반화질 보기"></a></li>
                        </ul>                            
                    </div>
                </div>
                --}}
                
                {{--방송종료 00:00 부터 노출
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_03_live02.jpg" title="방송종료" />
                --}}
            </div>
			<img src="https://static.willbes.net/public/images/promotion/2019/05/1227_09-1L.jpg" title="다드림 소문내기 이벤트 경품" />
        </div>
		<div class="evtCtnsBox evt09" id="evt09">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_10L.jpg" title="다드림 소문내기 이벤트 경품" />
        </div>
		
		<div class="evtCtnsBox evt10" id="evt10">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_11L.jpg" title="다드림 소문내기 이벤트 경품" />
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evtinfo" id="evtLast">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_07.jpg" title="유의사항" />
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg = $("#slidesImg").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '{{front_url('')}}/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
            @endif
        }
    </script>
    {{--<script src="/public/js/willbes/jquery.transit.min.js"></script>
    <script>
        $(".rouletteBox .start").one("click", function(){
            var time = ((Math.random()*6)+5)*1000;
            var deg = ((Math.random()*2)+2)*1000;

            $(".rouletteBox .roulett").transition({
                rotate : deg
            }, time, "cubic-bezier(.03,.87,.63,.98)");
        });
    </script>--}}
@stop