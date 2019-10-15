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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/10/1434_top_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 {background:#FFF;}
        .wb_cts02 {background:#FFF;padding-bottom:150px}
        .wb_cts03 {background:#4e13e1;}
        .wb_cts04 {background:#fff;}  

        /* tip */
        .wb_cts09 {background:#fff; text-align:left; padding:100px 0}
        .wb_tipBox {border:1px solid #333; padding:30px; width:980px; margin:0 auto; }
        .wb_tipBox > strong {font-size:16px !important; font-weight:bold; color:#333; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-3px; margin:30px 0 10px; color:#111}	
        .wb_tipBox ol li {margin-bottom:10px; line-height:1.3; list-style:decimal; margin-left:15px}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec;}	
        .wb_tip_orange {font-size:12px; color:#c03011;}  
        
        .tabContaier {width:980px; margin:0 auto;}
        .tabContaier ul {margin-bottom:10px}
        .tabContaier li {display:inline-block; float:left; width:50%}
        .tabContaier ul:after {content:""; display:block; clear:both}
        .tabContaier a {display:block; text-align:center; height:80px; line-height:80px; background:#aaa;
            margin-right:10px; font-size:24px; color:#fff;
        }
        .tabContaier li:last-child a {margin:0}
        .tabContaier a:hover,
        .tabContaier a.active {background:#b42e39}
        .tabContents {width:980px; margin:0 auto}
        .tabContents a {display:block; height:80px; line-height:80px; font-size:24px; font-weight:bold; text-align:center; color:#fff; background:#5903a6;}

        /*TAB_tip*/
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:33.33333%;}
        .tab02 li a { display:block; text-align:center; font-size:14px; font-weight:bold; background:#323232; color:#fff; padding:14px 0; border:1px solid #323232; margin-right:2px}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #666; border-bottom:1px solid #fff}
        .tab02 li:last-child a {margin:0}
        .tab02:after {content:""; display:block; clear:both}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1434_top.jpg" alt="윌비스 기술직 라스트 캠프" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1434_01.jpg" alt="과목별 고득점 커리큘럼"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1428_02.jpg" alt="학습부터 생활까지 꽉찬 관리 시스템">
            <div class="tabContaier">  
                <ul class="NGEB">
                    <li><a href="#tab01" class="active">과목별 교수님의 학습 CARE</a></li>
                    <li><a href="#tab02">전담 매니저의 생활 CARE</a></li>
                </ul>
            </div>
            <div id="tab01" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1434_02_1.jpg" alt="9급"/>
            </div>
            <div id="tab02" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1428_02_2.jpg" alt="7급"/>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" id="careful" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1434_05.jpg" alt="이런 분들이 수강하시면 좋아요."/>
        </div>

        <div class="evtCtnsBox wb_cts04">            
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1434_06.jpg" alt="윌비스 기술직 라스트 캠프 수강신청" usemap="#Map1434A" border="0"/>
            <map name="Map1434A" id="Map1434A">
                <area shape="rect" coords="248,707,931,800" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3048&campus_ccd=605001&course_idx=" target="_blank" />
            </map>           
        </div>

         <!--유의사항-->
        <div class="evtCtnsBox wb_cts09">
            <div class="wb_tipBox">
            <ul class="tab02">
                <li><a href="#txt1">수강료 환불규정</a></li>
                <li><a href="#txt2">수강생 혜택상세</a></li>
                <li><a href="#txt3">기타</a></li>
            </ul>
            <div id="txt1">
                <p>수강료 환불규정</p>
                <ol>
                <li><strong>수강료 환불규정<span class="wb_tip_gray"> (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</span></strong><br />
                    <br />
                    <table>
                    <col />
                    <col />
                    <col />
                    <tr>
                        <th>수강료징수기간</th>
                        <th>반환 사유발생일</th>
                        <th>반환금액</th>
                    </tr>
                    <tr>
                        <td rowspan="4">1개월 이내인 경우</td>
                        <td>교습개시 이전</td>
                        <td>이미 납부한 수강료 전액</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/3 경과 전</td>
                        <td>이미 납부한수강료의 2/3 해당</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/2 경과 후</td>
                        <td>이미 납부한수강료의 1/2 해당</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/2 경과 수</td>
                        <td>반환하지아니함</td>
                    </tr>
                    <tr>
                        <td rowspan="2">1개월 초과인 경우</td>
                        <td>교습 개시 이전</td>
                        <td>이미 납부한 수강료 전액</td>
                    </tr>
                    <tr>
                        <td>교습 개시 이후</td>
                        <td>반환 사유가발생한 당해 월의 반환대상 수강료와</br />
                        나머지 월의 수강료 전액을 합산한 금액</td>
                    </tr>
                    </table>
                    <br />
                    ▷ 총 교습 시간은 개강월로부터 종강월까지의 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br />
                    ▷ 환불 접수는 학원 방문 접수만 가능하며, 수강증을 필히 제출하여야 합니다.<br />
                    ▷ 카드로 결제하신 경우 결제 하셨던 카드를 지참하셔야 하며, 현금/계좌이체로 결제하신 경우 수강생 본인 명의의 통장으로만 환불금 입금 처리됩니다.<br />
                    ▷ 환불 기준일은 실제 수강 여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다.<br />
                    ▷ 자습실, 사물함, 동영상 강좌, 단과 강좌 등 수강 혜택으로 제공된 모든 서비스는 환불 즉시 이용 정지 및 회수되며, 사용 여부와 상관없이 환불신청일까지 사용료를 산정하여 환불금액에서 공제합니다. <br />
                    <span class="wb_tip_orange">
                    - 사물함 사용료: 1개월-5,000원<br />
                    - 동영상 강좌: 1개월-35,000원<br />
                    - 단과 강좌: 해당 강좌 수강료<br />
                    - 그 외: 해당 물품 및 서비스의 판매가<br />
                    </span>
                    ▷ 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록 하셔야 합니다.<br />
                    ▷ 친구추천할인 이벤트 적용 대상자의 경우, 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결제 해야 환불이 진행됩니다.<br />
                </li>
                </ol>
            </div>
            <div id="txt2">
                <p>수강생 혜택상세</p>
                <ol>        
                <li><strong>온라인 PASS</strong><br />
                ▷ 기본적으로 판매 중인 온라인PASS가 지급되며, PASS에 포함되지않은 수강 중인 강사의 강의는 별도 지급됩니다.<br />
                ▷ 중도 수강 취소 시 이용 중인 온라인강좌는 회수되며, 월 35,000원이 차감됩니다.<br />
                ▷ 수강기간 동안만 이용이 가능합니다.<br />
                </li>
                <li><strong>전국 모의고사</strong><br />
                ▷ 윌비스 고시학원에서 진행되는 윌비스 Real 모의고사가 제공됩니다.<br />
                ▷ 선택과목/응시직렬에 따라 몇몇 과목의 모의고사가 제공되지 않을 수 있습니다.<br />
                </li>
                <li><strong>사물함</strong><br />
                ▷ 지정 사물함으로 제공되며, 지정된 사물함이외의 사물함은 사용이 불가능합니다.<br />
                ▷ 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. 잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                ▷ 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                ▷ 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                ▷ 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                </li>		 
                <li><strong>공통 사항</strong><br />
                ▷ 개인 사유에 의해 이용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                ▷ 제공된 혜택은 수강생 본인만 사용할 수 있습니다. 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다<br />
                </li>
                </ol>
            </div>
            <div id="txt3">
                <p>기타</p>
                <ol>
                <li><strong>커리큘럼</strong><br />
                ▷ 커리큘럼은 시험일정이나 학원/강사의 사정에 따라 일부 수정될 수 있습니다.<br />
                </li>
                <li><strong>강사진</strong><br />
                ▷ 강사진은 강사 개인사정이나 학원사정에 따라 변경될 수 있습니다.<br />
                </li>
                <li><strong>자습실 및 학원 운영시간</strong><br />
                ▷ 학원 운영 시간: <span class="wb_tip_orange">월~일 06:30~23:30</span> (자습실 운영시간은 학원 운영 시간과 동일합니다.)<br />
                ▷ 데스크 운영 시간: <span class="wb_tip_orange"> 평일 07:30~20:00, 공휴일: 11:00~16:00 </span><br />
                ▷ 1월 1일, 설 당일, 추석 당일은 건물 휴무로 운영되지 않습니다.<br />
                </li>
                <li><strong>TEST 프로그램(전국 모의고사 포함)</strong><br />
                ▷ TEST 프로그램은 일일, 월간 TEST가 제공됩니다.<br />
                ▷ Daily/Monthly TEST의 경우, 19년 12월까지만 제공되며, 강사의 강의 계획에 따라 제공되지 않을 수 있습니다.<br />
                ▷ 전국 모의고사는 2개월에 한번 진행될 예정이나, 학원사정이나 시험 일정에 따라 기간이 변경될 수 있습니다.<br />
                </li>
                <li><strong>강의 수강</strong><br />
                ▷ 수강 신청한 강의만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원 상품 등록이 불가할 수 있습니다.<br />
                ▷ 등록하신 강좌는 본인만 수강이 가능하며, 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다. <br />
                ▷ 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다. <br />
                ▷ 강의는 학원/강사 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다. <br />(폐강 시, 환불 규정에 의거 환불 처리됩니다.)<br />
                ▷ 개인 사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
                ▷ 수강 확인은 수강증 검사가 수시로 진행되니 꼭 지참하시고 수강하시기 바랍니다.  (수강증 분실 및 미지참 등으로 강의 수강에 불편함이 발생할 수 있습니다.)<br />
                </li>
                <li><strong>교재</strong><br />
                ▷ 교재는 별도 구매입니다. <br />
                ▷ 강사의 강의계획에 따라 추가적인 교재가 사용될 수도 있습니다.<br />
                </li>
                </ol>
            </div>
            
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });

        $(document).ready(function(){
            $('.tab02').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        ); 
    </script>

@stop