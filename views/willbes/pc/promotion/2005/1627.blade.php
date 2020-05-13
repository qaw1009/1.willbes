@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
<style type="text/css">
    .subContainer {
        min-height: auto !important;
        margin-bottom:0 !important;
    }
    .evtContent {
        width:100% !important;
        min-width:1120px !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
        font-size:14px;
    }

    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; line-height: 1.5}

    /************************************************************/


    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}
    select,
    input[type=email],
    input[type=tel],
    input[type=number],
    input[type=text] {padding:2px; margin-right:10px; height:26px; vertical-align: middle}
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}
    label {margin:0 10px 0 5px}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

    .boardTypeB {width:100%; margin:0 auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid; background:#fff; line-height: 1.5}
    .boardTypeB caption {display:none}
    .boardTypeB thead th,
    .boardTypeB tbody th {color:#464646; font-weight:bold; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; text-align:center; padding:15px 8px}
    .boardTypeB tbody td {letter-spacing:normal; padding:10px 8px}
    .boardTypeB thead th {background:#e9e8e8;}
    .boardTypeB tbody th {background:#f3f3f3;}
    .boardTypeB tbody td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646; text-align:center}
    .boardTypeB tbody tr.bg01 th {background:#e5f2fe}
    .boardTypeB tbody td input {vertical-align:middle}
    .boardTypeB tbody td label {margin-right:10px}
    .boardTypeB tbody td li {display: inline;}
    .boardTypeB tbody td span {vertical-align: top}

    .btns {text-align:center; margin:30px 0}
    .btns span,
    .btns a {display:inline-block; padding:8px 16px; background:#1087ef; color:#fff !important; font-weight:bold; border:1px solid #1087ef}
    .btns a.btn2 {background:#464646; color:#fff !important; border:1px solid #464646}
    .btns a:hover {background:#fff; color:#1087ef !important}
    .btns a.btn2:hover {background:#fff; color:#464646 !important}


    .sectin1_box {background:#2a2a2d url(https://static.willbes.net/public/images/promotion/2020/05/1627_top_bg.jpg) no-repeat center top;}
    .sectin2_box {background:#000; color:#fff; padding:100px 0;}
    .sectin2_box div {font-size:20px; width:980px; margin:0 auto 30px}
    .sectin2_box ul {width:980px; margin:0 auto}
    .sectin2_box li {margin-bottom:5px}
    .sectin2_box li:last-child {margin-top:15px}

    .txtinfo {border:1px solid #464646; padding:20px; height:150px; overflow-y:scroll}
    .txtinfo li {margin-left:20px; list-style-type: decimal;}

    .sub_warp {width:980px; margin:0 auto; padding:60px 0; }
    .sub_warp h2 {clear:both; font-size:24px; font-weight:bold; padding-left:30px; margin-bottom:1em; color:#464646; background:url(https://static.willbes.net/public/images/promotion/2019/04/1211_passcop_icon1.png) no-repeat left center}
    .sub_warp h2 div {position:absolute; top:5px; right:0; font-size:12px; color:#adadad; letter-spacing:normal}
    .sub_warp h2 span {color:#C03}
    .sub_warp h2 select {padding:5px}
</style>


    <!-- Container -->
    <div class="evtContent NSK">
        <div class="evtCtnsBox sectin1_box NSK-Black">
            {{--16일 20시 까지 보여지는 이미지--}}
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1627_top.jpg" alt="#">
            <!--16일 20시 이후 보여지는 이미지
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1627_top_01.jpg" alt="#">
            -->
        </div>
        <!--sectin1_box//-->
        @include('willbes.pc.predict2.1627_promotion_partial')
        <div class="sectin2_box">
            <div class="NSK-Black">이벤트 유의사항</div>
            <ul>
                <li>- 본 이벤트는 5급공채(일반행정·재경), 국립외교원 시험 응시자만 참여 가능합니다.</li>
                <li>- 설문조사 + 정답 또는 점수까지 입력이 완료된 이용자에 한하여 지급 및 추첨합니다.</li>
                <li>- 이벤트 2의 경우 중복당첨되지 않습니다.</li>
                <li>- 개인정보 수집 및 이용에 동의하지 않으신 분은 이벤트 참여가 불가능합니다.</li>
                <li>- 경품은 모바일 쿠폰(기프티콘) 형태로 발송되며, 발송은 1회로 제한합니다.</li>
                <li>- 기프티콘은 이벤트 참여시 기재된 전화번호로 발송됩니다.</li>
                <li>- 휴대폰번호 오류 시 기프티콘은 재발송 되지 않습니다.</li>
                <li>- 휴대전화 단말기의 MMS 수신상태가 양호하지 않은 경우, 기프티콘 수신이 불가할 수 있습니다.</li>
                <li>- 이벤트 참여 전 회원정보(휴대폰 번호)를 정확히 수정해주시기 바랍니다. </li>
                <li>- 기프티콘을 수신한 이후 개인사정에 의해 유효기간이 지나 사용하지 못한 경우 사용하지 않은 혜택에 대해서는 별도로 보상하지 않습니다.</li>
                <li>※ 유의사항을 읽지 않고 발생한 모든 상황에 대해서 한림법학원은 책임지지 않습니다.</li>
            </ul>
        </div>
    </div>
    <!-- End Container -->
@stop