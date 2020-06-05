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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/06/1664_top_bg.jpg) no-repeat center top}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1664_01_bg.jpg) no-repeat center top}
        .evt01 .review {position:absolute; top:833px; left:50%; margin-left:-298px; width:766px; height:60px; z-index:10; overflow:hidden;}
        .evt01 .review li {position:relative; height:60px; line-height: 60px; font-size:16px;}
        .evt01 .review li p {padding:0 90px 0 100px; width:760px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}
        .evt01 .review span,
        .evt01 .review strong {position:absolute; top:0; height:60px; line-height: 60px; z-index:11; color:#000}
        .evt01 .review strong {width:100px; left:0;}
        .evt01 .review span {width:80px; right:0;}


        .evt02 {background:#1b58ef}
        .evt02 .inputBox {position:absolute; top:942px; left:50%; margin-left:-393px; width:786px; z-index:10}
        .evt02 .inputBox li {display:inline; float:left; width:25%; text-align:center; font-size:18px; color:#fff}
        .evt02 input[type=checkbox],
        .evt02 input[type=radio] {width:20px; height:20px}
        .evt02 label {margin-left:10px}
        .evt02 input[type=text],
        .evt02 input[type=number] {height:56px; line-height:56px; font-size:16px ; width:100%; border:0; border-radius:30px; color:#666; padding-left:20px}
        .evt02 .receive {position:absolute; top:1110px; left:50%; margin-left:-365px; width:730px; z-index:10; font-size:14px; color:#fff; line-height:1.5; text-align:left}
        .evt02 .receive li {margin-bottom:24px}
        .evt02 .receive li:nth-child(2) {display:inline; float:left; width:35%; margin-right:5%}
        .evt02 .receive li:nth-child(3) {display:inline; float:left; width:60%;}
        .evt02 .receive ul:after {content:""; display:block; clear:both}
        .evt02 .receive div {padding-left:50px}
        .evt02 .receive div.info {padding-left:80px}
        .evt02 .receive input:focus {border:5px solid #000 !important}

        .evt03 {background:#fff;}

        .evt04 {background:#c2c2c2;}
        .evt04 .evt04Box {width:900px; margin:0 auto; color:#3a3a3a; text-align:left; padding:50px 0; font-size:14px; line-height:1.5}
        .evt04 h3 {font-size:28px; margin-bottom:30px}
        .evt04 div {font-size:16px; margin-bottom:10px}
        .evt04 .evt04Box li {list-style: disc; margin-left:15px}
        .evt04 .evt04Box ul {margin-bottom:30px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1664_top.jpg" alt="" > 
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1664_01.jpg" alt="" usemap="#Map1644" border="0" >
            <map name="Map1644">
                <area shape="rect" coords="190,701,349,743" href="/promotion/index/cate/3114/code/1665" target="_blank" alt="이시한">
                <area shape="rect" coords="435,701,596,744" href="/promotion/index/cate/3114/code/1666" target="_blank" alt="이승기">
                <area shape="rect" coords="689,700,852,746" href="/promotion/index/cate/3114/code/1667" target="_blank" alt="안혜빈">
                <area shape="rect" coords="928,700,1086,742" href="/promotion/index/cate/3114/code/1669" target="_blank" alt="이기용">
            </map> 

            <div class="review">
                <ul>
                    <li><strong>이시한 교수</strong><p>유튜브에서 보고 완전 팬이에요. 멋진 강의 완전 기대됩니다. 유튜브에서 보고 완전 팬이에요. 멋진 강의 완전 기대됩니다.</p><span>(홍**)</span></li>
                    <li><strong>이승기 PD</strong><p>당첨발표시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</p><span>(김**)</span></li>
                    <li><strong>안혜빈 대표</strong><p>멋진 강의 완전 기대됩니다. 유튜브에서 보고 완전 팬이에요. 유튜브에서 보고 완전 팬이에요,  멋진 강의 완전 기대됩니다.</p><span>(최**)</span></li>
                    <li><strong>이기용 대표</strong><p>제공받은 개인 정보는 경품 배송 목적으로만 활용되며, 이벤트 종료 후 3개월 이후 모두 폐기됩니다.</p><span>(박**)</span></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1664_02.jpg" alt="" > 
            <ul class="inputBox NSK-Black">
                <li><input type="radio" id="pr01"><label for="pr01"> 이시한 교수</label></li>
                <li><input type="radio" id="pr02"><label for="pr02"> 이승기 PD</label></li>
                <li><input type="radio" id="pr03"><label for="pr03"> 안혜빈 대표</label></li>
                <li><input type="radio" id="pr04"><label for="pr04"> 이기용 대표</label></li>
            </ul>
            <div class="receive">
                <ul>
                    <li><input type="text" id="" placeholder="한줄기대평을 적어주세요."> </li>
                    <li><input type="text" id="" placeholder="이름"> </li>
                    <li><input type="number" id="" placeholder="휴대폰번호(숫자만입력)"></li>
                </ul>
                <div class="tx16 mb10"><input type="checkbox" id="yes"><label for="yes">1억뷰 N잡에서 진행하는 사전예약 및 이벤트 관련된 정보수신에 동의합니다.</label></div>
                <div class="info">
                    <strong>사전예약자 확인과 할인쿠폰 등 발송을 위해 아래의 개인 정보를 수집/이용하고 있습니다. </strong><br>
                    1. 수집 항목: 이름, 연락처(휴대폰 번호) <br>
                    2. 수집 및 이용 목적: 사전예약 이벤트 응모자 관리, 당첨자 쿠폰 배송, 이벤트 관련 문의 응대 및 공지사항 안내<br>
                    3. 보유 및 이용 기간: 이벤트 종료 후 3개월까지<br>
                    ※ 제공받은 개인 정보는 경품 배송 목적으로만 활용되며, 이벤트 종료 후 3개월 이후 모두 폐기됩니다.
                </div>
                <div class="mt50 tx-center"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/06/1664_btn.png" alt="신청하기"></a></div>

            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1664_03.jpg" alt="" > 
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evt04">
            <div class="evt04Box">
                <h3 class="NSK-Black">이용안내</h3>
                <div class="NSK-Black">사전예약 1</div>
                <ul>
                    <li>사전예약 쿠폰은 7월 1일(월) 발급 예정입니다.(신청자에 한함)</li>
                    <li>할인쿠폰 사용가능일은 발급일로부터 14일입니다.</li>
                    <li>해당 쿠폰은 인플루언서 강좌(이승기교수,이시한PD,안혜빈대표,이기용대표) 수강신청 접수 시 결제 적용됩니다.</li>
                    <li>사전예약 신청자에 한해 할인쿠폰이 발급되며, 결제 완료시 수강기간이 연장됩니다.(총 수강가능기간 365일)</li>
                </ul>

                <div class="NSK-Black">사전예약 2</div>
                <ul>
                    <li>당첨발표시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</li>
                    <li>당첨자 발표는 7월 6일(월) 공지사항 참고하시면 됩니다.</li>
                </ul>    
                <div class="NSK-Black">문의안내 1544-5006</div>
            </div>
        </div>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            var collaboslides = $(".review ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1, 
                moveSlides:1,
            });
        });
    </script>
@stop