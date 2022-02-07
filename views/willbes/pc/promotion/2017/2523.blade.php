@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
  
        .evtTop  {background:url("https://static.willbes.net/public/images/promotion/2022/02/2523_top_bg.jpg") no-repeat center top; height:950px;
        background-size:2000px;}
        .evtTop span {position: absolute; top:182px; left:50%; margin-left:-342px; width:661px; z-index: 2;}

        .evt01 {background:#216a4f; padding-bottom:100px}
        .evt01 > a {background:#ffff66; color:#363636; padding:20px 0; display:block; width:600px; margin:0 auto; font-size:30px; border-radius:20px}
        .evt01 > a:hover {background:#000; color:#ffff66;}

        .evt02 {padding:100px 0;}
        .postWrap {width:1000px; margin:0 auto; line-height:1.5; text-align:left; font-size:12px}
        .postList > h4 {font-size:14px; padding:10px 50px 0 0; position: relative; color:#216a4f}
        .postList > h4 strong {background:#216a4f; color:#fff; padding:3px 6px; border-radius:0 4px 4px 0; margin-right:10px}
        .postList > h4 a {position: absolute; top:10px; right:10px; font-size:12px; background:#333; color:#fff; padding:3px 6px; border-radius:4px}
        .postList .postSub {padding:10px 0; border-bottom:1px solid #e0e0e0; color:#666; display:flex; justify-content: space-between;}
        .postList .postSub span {padding:0 10px; border-right:1px solid #ccc}
        .postList .postSub span:last-child {border:0}
        .postWrap .postContent {border-bottom:1px solid #999; background:#fafafa; padding:10px}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        .willbes-Layer-Board {
            display: none;
            background: #fff;
            position:fixed;
            top:100px;
            left: 50%;
            margin-left: -560px;
            z-index: 110;
            width: 1120px;
            height: auto;
            border: 1px solid #2f2f2f;
            padding: 20px 25px 30px;
            text-align:left;
        }
        .willbes-Layer-Board .Layer-Tit {padding: 20px 0 10px;}
        .willbes-Layer-Board .Layer-Cont {padding:0; margin:0}
        .willbes-Layer-Board input[type=radio],
        .willbes-Layer-Board input[type=checkbox] {width:20px; height:20px; vertical-align:middle}
        
        .willbes-Layer-Board .info {margin-bottom:20px}
        .willbes-Layer-Board .info ul {width:100%; border:1px solid #e4e4e4; padding:10px; height:100px; overflow-y:auto; margin-bottom:10px; font-size:13px; color:#666}
        .willbes-Layer-Board .info li {margin-bottom:10px; list-style-type:decimal; margin-left:20px}
        .willbes-Layer-Board .psotSort {margin-bottom:10px; font-size:18px}
        .willbes-Layer-Board .psotSort label {margin:0 30px 0 5px}
        .willbes-Layer-Board .psotSort input:checked + label {border-bottom:1px dashed #0075ff; color:#0075ff;}
        .listTable th span {color:red}
        .listTable td {text-align:left !important; padding:5px !important}
        .listTable td textarea,
        .listTable td input[type=text] {width:98% !important; border:1px solid #d4d4d4}

        .willbes-Layer-Board .Layer-Cont .btn a {display:block; width:150px; margin:auto; background:#000; color:#fff; font-size:20px; text-align:center; padding:15px 0; border-radius:6px}


    </style>

    <div class="evtContent NSK">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2523_top.jpg" alt="합격수기&수강후기 이벤트"/>
        	<span data-aos="fade-down"><img src="https://static.willbes.net/public/images/promotion/2022/02/2523_top_img.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2523_01.jpg"/>
            <a href="javascript:void(0);" onclick="createPromotionBoard(); return false;" class="NSK-Black">합격수기&수강후기 등록하기</a>

            {{-- 등록 팝업 --}}
            <div id="create_board_box"></div>
        </div>

        {{-- list --}}
        <div id="review_list"></div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">합격수기&수강후기 이벤트 유의사항</h4>
                <ul>
                    <li>윌비스임용의 합격수기/수강후기 작성 이벤트 참여는 3/13(일)까지 진행됩니다.  
                    <li>본 이벤트는 홈페이지 로그인 후 참여 가능합니다. 
                    <li>작성해 주신 합격수기 및 수강후기는 윌비스 임용에 귀속되며, 마케팅에 활용될 수 있습니다. 
                    <li>본 이벤트1, 이벤트2는 중복 참여 가능합니다.
                    <li>당첨 인원 미달 시 상품의 일부만 제공될 수 있습니다.
                    <li>당첨자는 소득신고를 위해 신분증 사본의 제출을 요구할 수 있습니다. (5만원이상 상품) 
                    <li>무성의한 글은 당첨에서 제외됩니다.</li>
                </ul>
            </div>
        </div>  
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            AOS.init();
            fnReviewList(1);
        });

        function fnReviewList(page) {
            var _url = '{{ front_url('/promotion/listBoardAjax/code/'.$arr_base['promotion_code']) }}';
            var data = {
                'page' : page
            };
            sendAjax(_url, data, function(ret) {
                if (ret) {
                    $("#review_list").html(ret);
                }
            }, showAlertError, false, 'GET', 'html');
        }

        function createPromotionBoard() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', 'Y') !!}
            var ele_id =  'create_board_box';
            var data = '';
            var _url = '{{ front_url('/promotion/createPromotionBoard/code/'.$arr_base['promotion_code']) }}';
            sendAjax(_url, data, function(ret) {
                /*$('#' + ele_id).html(ret).show();*/
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        }
    </script>
@stop