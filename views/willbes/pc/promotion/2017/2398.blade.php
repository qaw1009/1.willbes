@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1121px; margin:0 auto; position:relative;}

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2398_top_bg.jpg) no-repeat center top;}
        
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/10/2398_01_bg.jpg) repeat-y center top; padding-bottom:100px}
        .evt01 .wrap .choice {position:absolute; top:461px; width:1000px; left:65px; z-index: 2; display:flex; flex-wrap: wrap;}
        .evt01 .wrap .choice label {width:190px; height:88px; text-align:left; cursor: pointer; margin-right:10px; margin-bottom:35px; display:block; align-self: auto;}
        .evt01 .wrap .choice input {width:20px; height:20px; margin:8px 0 0 20px;}
        .evt01 .wrap a {display:block; position:absolute; top:842px; width:40%; left:50%; margin-left:-20%; padding:15px 0; font-size:20px; text-align:center; background:#333; color:#fff}
        .evt01 .wrap a:hover {background:#3c8340;}


        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/10/2398_top.jpg" alt="퀵 서머리 한정판매"/>
        </div>

        <div class="evtCtnsBox evt01">
            <div class="wrap">    
                <div class="choice">
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>                   
                </div>        
                <a href="#none">쿠폰 신청하기</a>
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2398_01_01.jpg" alt="가입혜택1 할인쿠폰 지급"/>

                <div>
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                    @endif     
                </div>         
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2398_01_02.jpg" alt="인강 무료 체험 신청하기"/>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">신규 회원 가입 이벤트 유의사항</h4>
                <ul>
                    <li>본 이벤트를 통하여 부여되는 수강 할인권 및 인강체험의 과목은 회원가입 시, 작성해 주신 과목명과 동일해야 합니다.</li>
                    <li>본 이벤트의 강의 할인쿠폰 및 인강체험 신청은 교육학을 포함한 최대 3과목(교육학1과목+전공2과목)까지 가능합니다.</li>
                    <li>본 이벤트의 인강체험기간은 2주입니다. (2주 분량의 강의를 2주간 체험할 수 있습니다.)</li>
                    <li>본 이벤트의 강의 할인쿠폰 및 인강 체험권은 유아임용과정은 진행되지 않습니다.</li>
                    <li>본 이벤트의 인강체험에 필요한 교재는 별도로 구매하셔야 합니다.</li>
                    <li>본 이벤트를 통하여 부여된 할인쿠폰 및 인강체험권은 양도 및 매매가 불가능하며, 위반시 처벌 받을 수 있습니다.</li>
                    <li>본 이벤트 참여를 위하여 기존 회원이 탈퇴 후 재 가입하는 경우, 대상에서 제외합니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->


@stop