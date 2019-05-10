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

        .skyBanner {position:fixed; bottom:20px; right:0; width:136px; z-index:10}

        .evtTxt {background:#1e2a36}

        .evtTop {background:#2b3541 url("https://static.willbes.net/public/images/promotion/2019/05/1231_top_bg.jpg") center top  no-repeat;}
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
        .evtTop .btn a:hover {background:#00acec; color:#fff}

        .evt01 {background:#595959 url("https://static.willbes.net/public/images/promotion/2019/05/1231_01_bg.jpg") center top  no-repeat;} 
        .evt01 iframe {width:960px; height:540px; margin-bottom:200px}   
        .evt01 .btn {position:absolute; left:50%; bottom:950px; margin-left:-300px; width:600px; z-index:2;}
        .evt01 .btn a {display:block; width:600px; margin:0 auto; padding:20px 0; background:#00acec; color:#fff; 
            font-size:26px; border-radius:20px; border-bottom:10px solid #000;
            -webkit-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
            -moz-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
            box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
        }  
        .evt01 .btn a:hover {background:#fff; color:#000}  
        
        /* 슬라이드 */
        .slide_con {position:relative; width:960px; margin:80px auto 0}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-34px; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-34px;top:46%; width:67px; height:67px;}

        .evt02 {background:#009ef5;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">              

        <div class="evtCtnsBox evtTxt">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_txt01.jpg" title="브랜드 충성도 1위! 최종 합격기원 감사제!">   
        </div>
        
        <div class="evtCtnsBox evtTop" id="evtTop">
            <div class="evtBcli">
                <a href="https://police.dev.willbes.net/support/notice/show/cate/3001?board_idx=223660" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1227_top_bcli.png" title="2019 브랜드 고객충성도 1위">
                </a>  
            </div>    
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1231_top.jpg" title="최종합격기원 감사제"><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1231_top_01.jpg" title="필기합격자 누구나 참여가능">
            <div class="btn NGEB"><a href="@if(empty($cert_apply)){!!"javascript:certOpen();"!!}@else{!!"javascript:alert('이미 이벤트에 참가하셨습니다.')"!!}@endif">필기합격 & 친구추천 한번에 인증하기 ></a></div>
        </div>
        
        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1231_01_01.jpg" title="경찰 체력 특전">
            <div class="slide_con">
                <ul id="slidesImg">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1227_02_img01.jpg" alt="아이언 폴리스 1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1227_02_img02.jpg" alt="아이언 폴리스 2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1227_02_img03.jpg" alt="아이언 폴리스 3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1227_02_img04.jpg" alt="아이언 폴리스 4" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1227_02_img05.jpg" alt="아이언 폴리스 5" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_arrow_next.png"></a></p>
            </div>            
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1231_01_02.jpg" title="경찰 체력 특전">
            <div class="btn NGEB"><a href="https://cafe.naver.com/polstudy/2237809" target="_blank" >체력 Q&A 바로가기 ></a></div>
            <iframe src="https://www.youtube.com/embed/rpQ9lKoQcMQ?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

		<div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1231_02.jpg" title="강의 제공 특전" />
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
@stop