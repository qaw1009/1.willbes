@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2023/01/2874_top_bg.jpg) no-repeat center top;}

        .event01 {background:#9701f8 url(https://static.willbes.net/public/images/promotion/2023/01/2874_01_bg.jpg) no-repeat center top;}
        .problem {width:1120px; margin:0 auto; background:url(https://static.willbes.net/public/images/promotion/2023/01/2874_01_02.jpg)}


        
        .evtCtnsBox .title {font-size:40px; font-weight:bold; margin-bottom:50px; color:#4c4c4c}
        .evt_table{width:1120px; margin:0 auto; background:url(https://static.willbes.net/public/images/promotion/2023/01/2874_01_02.jpg); padding:50px; position: relative; font-size:20px}

        .evt_table .before { position: absolute;top:0; left:50%; margin-left:-500px; height:100%; background:rgba(0,0,0,.7); width:1000px; border-radius:30px; z-index: 10; display: flex; flex-direction: column; justify-content: center; align-items: center; color:#fff}
        .evt_table .before .popupbtn {margin-top:30px;}
        .evt_table .before .popupbtn a {display:block; width:200px; border-radius:10px; color:#fff; padding:10px; background:#000; border:1px solid #fff}
        .evt_table .before .popupbtn a:hover {background:#9701f8;}
        .evt_table table{width:95%; border:1px solid #eee; margin:0 auto}
        .evt_table tr {border:1px solid #eee;}
        .evt_table th,
        .evt_table td {padding:10px 5px; font-size:16px}
        .evt_table th {background:#f0dbfe; color:#000; font-weight:300;}
        .evt_table td {text-align:left}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:top; font-size:16px}
        .evt_table select {padding:5px; min-width:40%}
        .evt_table textarea {padding:5px; border:1px solid #b8b8b8; width:100% }
        .evt_table .btns {margin-top:50px}
        .evt_table .btns a {display:block; text-align:center; width:400px; margin:0 auto; padding:10px 20px; font-size:30px; color:#fff; background:#2d2623; border-radius:10px}
        .evt_table .btns a:hover {background:#9701f8;}

        .event02 {position:relative; width:1120px; margin:0 auto; padding:100px 0}

        .event02 .Paging a.on {text-decoration:none}

        .event03 {background:#fff0bd;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        .skyBanner {position:fixed; width:180px; top:250px; right:10px; z-index:10;}
        .skyBanner a {display:block; margin-bottom:10px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2023/01/2874_top.jpg" alt="합격축하 이벤트"/>
        </div>

        <div class="evtCtnsBox event01">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2874_01_01.jpg"/>
            @if(empty($arr_promotion_params['exam_recall_type']) === false && $arr_promotion_params['exam_recall_type'] == 'Y')
                <div id="_recallViewTable" data-title="2차 문제복기 이벤트 참여하기"></div>
            @endif
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2874_01_03.jpg"/>
        </div>

        <div class="evtCtnsBox event03">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2874_02.jpg"/>
        </div>

        <div class="evtCtnsBox event02" id="reviewListWrap">
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">유의사항</h4>
                <ul>
                    <li>윌비스임용의 문제복기/합격수기 작성 이벤트 참여는 2023. 02. 19(일)까지 진행됩니다.  </li>
                    <li>본 이벤트는 홈페이지 로그인 후 참여 가능합니다. </li>
                    <li>작성해 주신 문제복기 및 합격수기 정보는 윌비스 임용에 귀속되며, 마케팅에 활용될 수 있습니다. </li>
                    <li>본 이벤트1, 이벤트2는 중복 참여 가능합니다.</li>
                    <li>당첨 인원 미달시 상품의 일부만 제공될 수 있습니다.</li>
                    <li>당첨자는 소득신고를 위해 신분증 사본의 제출을 요구할 수 있습니다. (5만원이상 상품) </li>
                    <li>무성의한 글은 당첨에서 제외됩니다. </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            fnViewRecallAjax();
            fnReviewList();
        });

        //문제복기 UI Ajax
        function fnViewRecallAjax(){
            var _url = '{{ site_url('/promotion/viewRecallAjax/'.$data['PromotionCode']) }}';
            var data = {
                'login_url' : '{{$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']}}'
            };
            sendAjax(_url, data, function(ret) {
                if (ret) {
                    $("#_recallViewTable").html(ret);
                }
            }, showAlertError, false, 'GET', 'html');
        }

        function fnReviewList(page,cate_code,subject_idx,keyword){
            var _url = '{{ site_url('/support/review/listReviewAjax') }}';
            var data = {
                's_site_code' : '{{ $__cfg['SiteCode'] }}',
                'list_cate_code' : cate_code,
                'list_subject_idx' : subject_idx,
                'list_keyword' : keyword,
                'page' : page,
            };
            sendAjax(_url, data, function(ret) {
                if (ret) {
                    $("#reviewListWrap").html(ret);
                }
            }, showAlertError, false, 'GET', 'html');
        }
    </script>

@stop