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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skyBanner {position:fixed; bottom:20px; right:20px; width:138px; border:1px solid #000; z-index:10;
        -webkit-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
        box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);}
        .skyBanner li a {display:block; padding:15px 0; text-align:center; background:#fff; color:#000; font-size:14px; font-weight:600; border-bottom:1px solid #000; line-height:1.4}
        .skyBanner li:last-child a {height:27px; line-height:27px; padding:0; background:#000; color:#fff}
        .skyBanner li a:hover {background:#000; color:#fff;}

        .evt01 {background:#5f4b99; height:500px}
        .evt02 {background:#0077ff; height:500px}
        .evt02 .btn a { display:block; width:600px; margin:0 auto; padding:20px 0; background:#fff; color:#000; 
            font-size:20px; border-radius:40px;
            -webkit-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
            -moz-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
            box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
        }
        .evt02 .btn a:hover {background:#333; color:#fff}
        .evt03 {background:#eef2f5; height:500px}
        .evt04 {background:#666; height:500px}
        .evt05 {background:#ccc; height:500px}
        .evt06 {background:#999; height:500px}	
        .evt07 {background:#fff; height:500px}	
        .evtinfo {background:#e4e4e4; height:500px}		

    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <ul class="skyBanner">
            <li><a href="#evt01">다! 드림!</a></li>
            <li><a href="#evt03">경품 특전</a></li>
            <li><a href="#evt04">체력 특전</a></li>
            <li><a href="#evt05">면접 특전</a></li>
            <li><a href="#evt06">강의제공 특전</a></li>
            <li><a href="#evt07">소문내기</a></li>
            <li><a href="#evtContainer">top</a></li>
        </ul>

        <div class="evtCtnsBox evt01" id="evt01">
            최종합격기원 감사제
		</div>
        <!--evt01//-->

        <div class="evtCtnsBox evt02" id="evt02">
            경찰 합격의 요람 1등 경찰학원<br>
            신광은 경찰팀이 체력부터 면접까지!<br>
            ㅣ<br>
            답은 정해져 있습니다.<br>
            STEP-BY-STEP<br>
            <br>
            불가능을 가능케 하고자 합니다.<br>
            최종합격! 윌비스 신광은 경찰학원이 함께 합니다.<br>
            <div class="btn NGEB"><a href="javascript:pullOpen();" >필기합격 & 친구추천 한번에 인증하기 ></a></div>
        </div>
        <!--evt02//-->

        <div class="evtCtnsBox evt03" id="evt03">
            Big.1 경품 특전 
            {{--5월 12일까지 노출 화면, 날짜 설정해주세요.--}}
            <div>룰렛 이벤트 5/13일 Coming soon!</div>

            {{--5월 13일부터 노출 화면, 날짜 설정해주세요.--}}
            <div>룰렛 이벤트 open!</div>
        </div>
        <!--evt03//-->

        <div class="evtCtnsBox evt04" id="evt04">
            Big.2 체력 특전
        </div>
        <!--evt04//-->

		<div class="evtCtnsBox evt05" id="evt05">
            Big.3 면접 특전
            <div>3법면접 무료특강</div>
            <div>
                면접 19년 1차 기출분석 라이브
                {{--방송전 화면--}}
                <div>방송전</div>

                {{--방송중 화면--}}
                <div>방송중</div>

                {{--방송 최종 종료 화면--}}
                <div>방송최종종료</div>
            </div>
            <div>live 특강 진행 안내</div>
        </div>

        <div class="evtCtnsBox evt06" id="evt06">
            Big.4 강의 제공 특전
        </div>

        <div class="evtCtnsBox evt07" id="evt07">
            Big.5 경품 특전 - 소문내기
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_emoticon_url_partial')
        @endif

        <div class="evtCtnsBox evtinfo" id="evtLast">
            상품혜택 및 유의사항 안내
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function pullOpen(){
            var url = "1227_popup";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=660,height=700');
        }
    </script>
@stop