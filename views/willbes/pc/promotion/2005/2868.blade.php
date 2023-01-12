@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/01/2868_top_bg.gif) no-repeat center top;}

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2023/01/2868_01_bg.jpg) no-repeat center top; }
        .evt_01 .count {position: absolute; top:190px; left:30px; color:#fff; font-size:20px; z-index: 10;}
        .evt_01 .count strong {font-size:24px; color:#ffe24f}
        .evt_01 .countTable {position: absolute; top:260px; left:54px; color:#fff; font-size:24px; width:480px; text-align:left; z-index: 10;}
        .evt_01 .countTable li {border-bottom:1px solid #411098; padding:6px 0}
        .evt_01 .countTable li:first-child {border-top:1px solid #411098;}
        .evt_01 .countTable li strong {display:inline-block; background:#5918cc; width:100px; text-align:center; margin-right:20px; padding:10px 0}
        .evt_01 .countTable li.now {background:#5918cc; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;vertical-align:top;}
        @@keyframes upDown{
            from{background:#1f0553}
            50%{background:#5918cc}
            to{background:#1f0553}
        }
        @@-webkit-keyframes upDown{
            from{background:#1f0553}
            50%{background:#5918cc}
            to{background:#1f0553}
        }
        .evt_01 .countTable li.now strong {background:none}
        .evt_01 .countGraph {position: absolute; top:532px; left:694px; color:#fff; font-size:24px; width:370px; background:rgba(0,0,0,.5);}
        .evt_01 .countGraph .p_re span {display:none; position: absolute; bottom:0; z-index: 10;}
        .evt_01 .countGraph .p_re span:nth-child(1) {left:0;}
        .evt_01 .countGraph .p_re span:nth-child(2) {left:81px}
        .evt_01 .countGraph .p_re span:nth-child(3) {left:161px}
        .evt_01 .countGraph .p_re span:nth-child(4) {left:241px}
        .evt_01 .countGraph .p_re span:nth-child(5) {left:321px}
        .evt_01 .countGraph .p_re span.on {display:block}

        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2023/01/2868_02_bg.jpg) no-repeat center top;}
        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2023/01/2868_03_bg.jpg) repeat-y center top;}
        .wbox {width:1100px; margin:0 auto; background:#fff; border-radius:10px} 

        .evtInfo {padding:80px 0; color:#fff;}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.5;}
		.evtInfoBox h4 {font-size:30px; margin-bottom:40px;}
		.evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 0; font-weight:normal !important; color:yellow}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style-type: decimal; margin-left:20px}
        .evtInfoBox li span {vertical-align:bottom; color:#f1d188}  


        @@import url('https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap');
        .evt_02 h4 {font-family: 'Black Han Sans', sans-serif;}
        
        /************************************************************/

    </style>

	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2868_top.gif" alt="PSAT 사전 소문내기 이벤트"/>
		</div>

        <div class="evtCtnsBox evt_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2868_01.jpg" alt="소문이 많아지면 상품도 업"/> 
                <div class="count">* 현재 참여 수 : <strong>210</strong>개</div>
                <div class="countTable">
                    <ul>
                        <li><strong>5구간</strong> 401개 이상</li>
                        <li><strong>4구간</strong> 200 ~ 400개</li>
                        <li class="now"><strong>3구간</strong> 101 ~ 200개</li>
                        <li><strong>2구간</strong> 51 ~ 100개</li>
                        <li><strong>1구간</strong> 0 ~ 50개</li>
                    </ul>
                </div>
                <div class="countGraph">
                    <div class="p_re">
                        <span class="on"><img src="https://static.willbes.net/public/images/promotion/2023/01/2868_bar01.png" alt=""/></span>
                        <span class="on"><img src="https://static.willbes.net/public/images/promotion/2023/01/2868_bar02.png" alt=""/></span>
                        <span class="on"><img src="https://static.willbes.net/public/images/promotion/2023/01/2868_bar03.png" alt=""/></span>
                        <span><img src="https://static.willbes.net/public/images/promotion/2023/01/2868_bar04.png" alt=""/></span>
                        <span><img src="https://static.willbes.net/public/images/promotion/2023/01/2868_bar05.png" alt=""/></span>
                    </div>
                </div>
            </div>        
		</div>

        <div class="evtCtnsBox evt_02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2868_02.jpg" alt=""/> 
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 이미지 다운로드" style="position: absolute; left: 8.13%; top: 95.28%; width: 19.02%; height: 2.16%; z-index: 2;"></a>
            </div>           
		</div>

        <div class="evtCtnsBox evt_03">
            <div class="wbox" id="url">
                {{--홍보url--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N', 'login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'is_public' => true)){{--기존SNS예외처리시, 로그인페이지 이동--}}
                @endif
            </div>  
            <div class="evtInfo" id="notice" data-aos="fade-up">
                <div class="evtInfoBox">
                    <h4 class="NSK-Black">유의사항</h4>
                    <ul>
                        <li>본 이벤트는 로그인 후 참여 가능합니다.</li>
                        <li>소문내기 이벤트 기간 외 참여한 게시글은 참여 수에 집계되지 않습니다.</li>
                        <li>소문내기 당첨자는 3/8(수) 5급 PSAT 홈페이지 공지사항 공지와 함께 개별 문자 안내됩니다.</li>
                        <li>이벤트 상품 지급을 위해 SMS 수신에 동의해주셔야 합니다.</li>
                        <li>이벤트 상품은 참여한 ID의 등록된 연락처로 지급됩니다. 참여 전 개인정보 확인 및 수정 바랍니다.</li>
                        <li>게시글은 전체 공개글만 인정되며, 삭제 및 무관한 글은 인정되지 않습니다. 인정되지 않는 게시글은 관리자에 의해 삭제될 수 있습니다.</li>
                        <li>동일한 ID, 날짜, 사이트에 한하여는 하나의 게시글로 인정됩니다.</li>
                        <li>이벤트 상품은 한 ID 당 1회만 지급됩니다.(중복 지급 불가)</li>
                        <li>유의사항을 읽지 않고 발생한 모든 상황에 대해 한림법학원은 책임지지 않습니다.</li>
                        <li>기타 부정한 방법으로 참여할 경우 당첨이 취소될 수 있습니다.</li>
                    </ul>
                    <div class="infoTit"><strong>※ 블로그 / 인스타그램 작성시 필수 해시태그 : #한림법학원 #5급psat #합격예측 #소문내기</strong></div>
                </div>
            </div>         
		</div>

        

	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        AOS.init();
      });  
    </script>


    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop