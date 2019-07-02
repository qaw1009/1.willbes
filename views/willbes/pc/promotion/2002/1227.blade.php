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

        .skyBanner {position:fixed; top:220px; right:0; z-index:10}

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

        .evt01 {background:#009ef5}
        .rouletteBox {position:absolute; width:510px; height:510px; top:414px; left:50%; margin-left:-255px; z-index:1}
        .rouletteBox .start{position:absolute;left:0;right:0;top:0;bottom:0;margin:auto;width:100px;height:100px;line-height:100px;cursor:pointer;background-color:#000;color:#fff;text-align:center;border-radius:50%;}
        .rouletteBox .target{position:absolute;left:0;right:0;top:-30px;margin:0 auto;border-left:20px solid transparent;border-right:20px solid transparent;border-top:50px solid #000;width:0;height:0;}
        
        .evt02 {background:#ffe040}
        /* 슬라이드 */
        .slide_con {position:relative; width:960px; margin:80px auto 0}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-34px; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-34px;top:46%; width:67px; height:67px;}
		
		.evt03 {background:#fff url("") center top  no-repeat;}
        
		.evt04 {background:#ececec url("https://static.willbes.net/public/images/promotion/2019/05/1227_05L_bg.jpg") center top  no-repeat}
        
        .evt05 {background:#ececec; padding:100px 0}
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

        #myElement{position:absolute;left:0;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skyBanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_skybanner_02.png" usemap="#Map1227A" title="다! 드림! 이벤트" border="0">
            <map id="Map1227A">
			  <area shape="rect" coords="20,52,170,180" href="/pass/promotion/index/cate/3010/code/1227#evt03" />
              <area shape="rect" coords="20,182,170,248" href="/pass/promotion/index/cate/3010/code/1227#evt02" />
			  <area shape="rect" coords="20,254,170,318" href="/pass/promotion/index/cate/3010/code/1227#evt09" />
              <area shape="rect" coords="20,325,170,438" href="/pass/promotion/index/cate/3010/code/1227#evt07" />
			  <area shape="rect" coords="20,441,170,554" href="/pass/promotion/index/cate/3010/code/1227#evt06" />			  
			  <area shape="rect" coords="20,555,170,609" href="/pass/promotion/index/cate/3010/code/1227#evt08" />			  
			  <area shape="rect" coords="20,610,170,660" href="/pass/promotion/index/cate/3010/code/1227#evt10" />
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
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_01L.jpg" title="최종합격기원 감사제"><br/>
            <div class="btn NGEB"><a href="@if(empty($cert_apply)){!!"javascript:certOpen();"!!}@else{!!"javascript:alert('이미 이벤트에 참가하셨습니다.')"!!}@endif" >필기합격 & 친구추천 한번에 인증하기 ></a></div>
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_02L.jpg" usemap="#Map1227Q" title="필기합격자 누구나 참여가능" border="0">
            <map name="Map1227Q" id="Map1227Q">
                <area shape="rect" coords="827,1197,971,1240" href="https://police.willbes.net/pass/support/qna/index" target="_blank" alt="1:1상담게시판가기" />
            </map>
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_03L.jpg" title="경찰 체력 특전">
        </div>		

		<div class="evtCtnsBox evt04" id="evt04">
			<img src="https://static.willbes.net/public/images/promotion/2019/05/1227_05L.png" title="경찰 체력 특전">
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_04L.jpg" title="경찰 체력 특전">
        </div>

		@if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <div class="evtCtnsBox evt05" id="evt05">            
            <div id="movieFrame">
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1227_live01L.jpg" title="방송전"></a>        
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_06L.jpg" title="라이브 특강 진행 안내">
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
                @php
                    $set_on_day = ['20190702','20190703','20190704','20190705','20190708','20190709','20190710','20190711','20190712','20190715'];
                    $day = date('Ymd');
                    $time = date('His');

                    if ($day < '20190702') {
                        $live_type = 'standby';
                    } else if ($day >= '20190702' && $day <= '20190715'){
                        $live_type = 'on';
                    } else {
                        $live_type = 'off';
                    }

                    $live_video_type = 'off';
                    foreach ($set_on_day as $key => $val) {
                        if ($day == $val){
                            if ($time >= '095000' && $time <= '122000') {
                                $live_video_type = 'on';
                            }
                        }
                    }
                @endphp

                @if ($live_type == 'standby')
                    {{--방송 전--}}
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_09L-live.jpg" title="방송전">

                @elseif ($live_type == 'on' && $live_video_type == 'on')
                    {{--7/2 ~ 7.15 오전 9시 30분 방송 중--}}
                    <script src="/public/vendor/jwplayer/jwplayer.js"></script>
                    <div class="movieplayer">
                        <div class="embedWrap">
                            @if ($ismobile == false)
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
                                        file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop5011"
                                    });
                                    </script>
                                </div>
                            @else
                                <!--모바일용-->
                                <div class="embed-container-mobile" id="myElement">
                                    {{--
                                    <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                                    <script type="text/javascript">
                                        jwplayer("myElement").setup({
                                        width: '100%',
                                        logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                        image: "https://static.willbes.net/public/images/promotion/2019/05/1227_09L-live.jpg",
                                        aspectratio: "16:9",
                                        autostart: "true",
                                        file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop5011"
                                    });
                                    </script>
                                    --}}
                                </div>
                                <ul class="mobileCh">
                                    <li><a href="javascript:fn_live('hd')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnH.png" title="고화질 보기"></a></li>
                                    <li><a href="javascript:fn_live('low')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnN.png" title="일반화질 보기"></a></li>
                                </ul>
                            @endif
                        </div>
                    </div>

                @elseif ($live_type == 'on' && $live_video_type == 'off')
                    {{--방송 전--}}
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_09L-live.jpg" title="방송전">
                @else
                    {{--방송종료 00:00 부터 노출--}}
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_03_live02.jpg" title="방송종료" />
                @endif
            </div>
			<img src="https://static.willbes.net/public/images/promotion/2019/05/1227_09-1L.jpg" title="다드림 소문내기 이벤트 경품" />
        </div>
		<div class="evtCtnsBox evt09" id="evt09">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_10L.jpg" title="다드림 소문내기 이벤트 경품" />
        </div>
		
		<div class="evtCtnsBox evt10" id="evt10">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_11L.jpg" title="다드림 소문내기 이벤트 경품" />
        </div>

        {{--url댓글--}}
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

        function fn_live(p_type) {
            if(p_type == "hd"){
                location.href = "http://willbes.flive.skcdn.com/willbeslive/livestreamcop5011/Playlist.m3u8";
            }else{
                location.href = "http://willbes.flive.skcdn.com/willbeslive/livestreamcop5012/Playlist.m3u8";
            }
        }

        /*레이어팝업*/
        function go_popup(param) {
            var ele_id = 'promotion_notice';
            var data = {
                'ele_id' : ele_id,
                'board_idx' : param,
                'predict_idx' : '{{ (empty($arr_promotion_params['predict_idx']) === false) ? $arr_promotion_params['predict_idx'] : '' }}',
                'promotion_code' : '{{ $arr_base['promotion_code'] }}'
            };
            sendAjax('{{ front_url('/support/predictNotice/index') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                $('#popup').bPopup();
            }, showAlertError, false, 'GET', 'html');
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