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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            width:100px;
            z-index:10;
        }
        .skybanner div {margin-bottom:10px}

        .wb_top {background:#a12932 url(https://static.willbes.net/public/images/promotion/2019/04/1095_01_bg.png) no-repeat center top}
        .wb_cts01 {background:#a12932 url(https://static.willbes.net/public/images/promotion/2019/04/1095_02_bg.png) no-repeat center top; position:relative}
        .wb_cts02 {background:#eaeaea no-repeat center top}
        .wb_cts02 .mv_bg {width:1210px; height:553px; margin:0 auto}
        .wb_cts02 .mv_bg ul {width:953px; padding-top:19px;}
        .wb_cts02 .mv_bg li {float:left}
        .wb_cts02 .mv_bg ul:after {content:''; display:block; clear:both;}
        .wb_cts03 {background:#fff}
        .wb_cts04 {background:#fff}
        .wb_cts05 { background:#fff}

        /* 유의사항 */
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:33.33333%}
        .tab02 li a { display:block; text-align:center; font-size:16px; font-weight:bold; background:#e4e4e4; color:#666; padding:15px 0; border:1px solid #e4e4e4}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #000; border-bottom:1px solid #fff}
        .tab02:after {content:""; display:block; clear:both}

        .wb_cts08 {padding:100px 0; line-height:1.5;}
        .wb_cts08Box {width:980px; margin:0 auto; border:1px solid #000; padding:30px; text-align:left}
        .wb_cts08Box > strong {font-size:18px !important; font-weight:bold; color:#000; display:block; margin-bottom:20px}
        .wb_cts08Box p {font-size:14px !important; font-weight:bold; margin:20px 0 10px; color:#000}
        .wb_cts08Box ol li {margin-bottom:10px; list-style:decimal; margin-left:15px}
        .wb_cts08Box ul {margin-top:0px}
        .wb_cts08Box ul li {margin-bottom:5px}
        .wb_cts08Box table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_cts08Box th,
        .wb_cts08Box td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4; font-size:100% !important}
        .wb_cts08Box th {font-weight:bold; color:#333}

        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#6c1827}

        



    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner">
            <div><a href="{{ site_url('/pass/offLecture/index') }}" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/04/1095_skybanner01.png" alt="5월 개강"></a></div>
            <div><a href="{{ site_url('/pass/consultManagement/index') }}" target="_blank"><img  src="https://static.willbes.net/public/images/promotion/2019/04/1095_skybanner02.png" alt="1:1"></a></div>
            <div><a href="https://pf.kakao.com/_kcZIu/chat" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/04/1095_skybanner03.jpg" alt="카카오"></a></div>
        </div>

        <div class="evtCtnsBox time" id="ddaytime">
            <div>
                <table>
                    <tr>
                    <td class="time_txt NGEB"><span>4/23(화) 마감!</span></td>
                    <td class="time_txt">마감까지<br><span>남은 시간은</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1095_01.png" alt="윌비스 파이널 모의고사"  />
        </div><!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1095_02.jpg" alt="윌비스 파이널 모의고사" />
        </div><!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1095_03.png" alt="윌비스 파이널 모의고사" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1095_04.png" alt="윌비스 파이널 모의고사" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1095_05.png" alt="윌비스 파이널 모의고사" />
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" >
            <a href="{{ site_url('/pass/offPackage/index?cate_code=3043&campus_ccd=605001') }}" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/04/1095_06.png" border="0" /></a>
        </div><!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts08">
            <div class="wb_cts08Box">
                <ul class="tab02">
                    <li><a href="#txt1">환불규정</a></li>
                    <li><a href="#txt2">수강생 혜택</a></li>
                    <li><a href="#txt3">기타</a></li>
                </ul>
                <div id="txt1">
                    <ol>
                        <li><strong>수강료 환불규정 (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</strong>
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
                                    <td>반환 사유가발생한 당해 월의 반환대상 수강료와 나머지 월의 수강료 전액을 합산한 금액</td>
                                </tr>
                            </table><br /><br />
                            1) 총 교습 시간은 개강달로부터 종강달까지 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br />
                            2) 개강 이후 환불 접수는 기간 내 직접 방문해주셔야 합니다. (유선 접수 불가/ 수강증 미반납시 환불 불가) <br />
                            3) 환불 요청 시, 결제 하셨던 카드, 수강증, 영수증을 지참하셔야 결제취소가 가능하며, 현금으로 결제하신 경우, 수강생 본인 명의의 통장으로 입금됩니다.<br />
                            4) 환불 기준일은 실제 수강여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다<br />
                            5) 수강 기간 동안 제공받은 사물함, 동영상 강좌, 자습실 등 혜택으로 제공된 서비스는 환불 즉시 이용이 정지 및 회수되며, 기사용된 부분은 환불신청하신<br />
                            해당월의 말일까지 사용한 것으로 간주하고 사용료를 환불금액에서 공제합니다. <br />
                            <span >- 사물함 사용료: 1개월-5,000원 <br /></span>
                            <span >-  동영상 강좌: 1개월-35,000원 <br /></span>
                            <span >-  자습실: 월 150,000원 <br /><br /></span>
                            6) 무료로 제공받은 교재 등 혜택으로 제공된 물품류(전자제품 제외)의 경우 미반환되거나,<br />
                            기사용흔적/훼손이 있는 경우 환불금액에서 해당 물품류의 정가를 환불금에서 공제합니다.<br />
                            7) 태블릿 PC 등 혜택으로 제공된 전자제품류 개봉/기사용 흔적 있는 경우 환불금액에서 해당 전자제품류의 정가를 환불금에서 공제합니다<br />
                            8) 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록하셔야합니다.<br />
                            9) 친구추천할인 이벤트 적용 대상자의 경우 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결재 해야 환불이 진행됩니다.<br />
                        </li>
                        <li><strong>학원 운영시간</strong><br />
                            1) 학원 운영 시간: 월~일 06:30~23:30<br />
                            2) 자습실 운영시간은 학원 운영 시간과 동일합니다. 다만, 1월 1일, 설 당일, 추석 당일은 건물 휴무로 운영되지 않습니다.<br />
                        </li>
                        <li><strong>기타</strong><br />
                            1) 반드시 등록한 강좌 및 등록한 수업만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, <br />
                            추가적인 학원 상품 등록이 불가할 수 있습니다.<br />
                            2) 등록하신 강좌는 본인만 수강이 가능하며, 타인에게 판매/양도 할 수 없습니다.<br />
                            3) 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다.<br />
                            4) 강의는 학원 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다.(폐강 시, 환불규정에 의거 환불 진행)<br />
                            5) 개인사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
                            6) 수강확인은 수강증을 통한 검사로 진행되오니 꼭 지참하시고 수강하시기 바랍니다. (수강증 분실 및 미발급으로 발생되는 손해의 책임은 수강생 본인에게 있습니다.)<br />
                            8) 수강료에 교재 비용은 포함되어 있지 않으며, 커리큘럼에 따라 추가 교재를 구매 하실 수 있습니다.<br />
                            9) 수업자료는 수업 종료 후 3일 이내로 수령하셔야하며, 이후에는 개인적으로 출력하셔야합니다.<br />
                        </li>
                    </ol>
                </div>

                <div id="txt2">
                    <ol>
                        <li><strong>윌비스 전국 모의고사</strong><br />
                            - 윌비스 고시학원에서 진행되는 유료 모의고사가 제공됩니다. 개인 사유에 의해 신청/응시하지 못한 경우에 대해서는 학원에서 보상하지 않습니다.<br />
                        </li>

                        <li><strong>개인 사물함</strong><br />
                            - 지정 사물함으로 제공되며, 지정된 사물함이외의 사물함은 사용이 불가능합니다.- 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. 잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                            - 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                            - 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.- 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.- 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>

                        <li><strong>전용자습실</strong><br />
                            - 지정좌석제로 제공되며, 지정된 좌석 이외의 좌석은 원칙적으로 사용이 불가능합니다. <br />
                            - 중도 수강 취소 시 지정된 좌석은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                            - 개인 물품의 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                            - 제공된 책상, 의자는 학원의 재산입니다. 임의 이동 및 분실/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                            - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>

                        <li><strong>복습 동영상</strong><br />
                            - 직급별 온라인PASS와 단강좌가 지급됩니다.<br />
                            - 수강기간 동안만 수강이 가능한 혜택이며, 중도환불 시 즉시 회수됩니다.<br />
                            - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li> 
                        
                        <li><strong>면접반 할인권</strong><br />
                            - 제공되는 혜택은 윌비스 공무원 학원 면접반에서만 사용가능합니다.<br />
                            - 지원되는 시험은 9급 지방직/서울시 시험입니다. (그 외 다른 시험 해당X)<br />
                            - 중도 수강취소 시 제공되지 않습니다.<br />
                            - 개인 사유에 의해 수강하지 못한 경우에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>

                        <li><strong>추가 할인</strong><br />
                            - 추가 할인은 수강료 정가에서 적용됩니다.<br />
                            - 학원 방문 등록 시에만 추가 할인이 적용됩니다.<br />
                        </li>
                    </ol>
                </div>
                <div id="txt3">
                    <ol>
                    <li><strong>학원 운영시간</strong><br />
                            - 학원 운영 시간: 월~일 06:30~23:30<br />
                            - 자습실 운영시간은 학원 운영 시간과 동일합니다. 다만, 1월 1일, 설 당일, 추석 당일은 건물 휴무로 운영되지 않습니다.<br />
                        </li>    
                    <li><strong>기타</strong><br />
                            - 반드시 등록한 강좌 및 등록한 수업만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원 상품 등록이 불가할 수 있습니다.<br />
                            - 등록하신 강좌는 본인만 수강이 가능하며, 타인에게 판매/양도 할 수 없습니다.<br />
                            - 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다.<br />
                            - 강의는 학원 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다.(폐강 시, 환불규정에 의거 환불 진행)<br />
                            - 개인사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
                            - 수강확인은 수강증을 통한 검사로 진행되오니 꼭 지참하시고 수강하시기 바랍니다. (수강증 분실 및 미발급으로 발생되는 손해의 책임은 수강생 본인에게 있습니다.)<br />
                            - 수강료에 교재 비용은 포함되어 있지 않으며, 커리큘럼에 따라 추가 교재를 구매 하실 수 있습니다.<br />
                            - 수업자료는 수업 종료 후 3일 이내로만 수령 가능하며, 이후에는 개인적으로 출력하셔야 합니다.<br />
                        </li>
                    </ol>
                </div>
            </div>
        </div><!--wb_cts08//-->

    </div>
    <!-- End Container -->

    <script>       
        /*타이머*/
        var DdayDiff = { //타이머를 설정합니다.
            inDays: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
            },

            inWeeks: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return parseInt((tt2-tt1)/(24*3600*1000*7));
            },

            inMonths: function(dd1, dd2) {
                var dd1Y = dd1.getFullYear();
                var dd2Y = dd2.getFullYear();
                var dd1M = dd1.getMonth();
                var dd2M = dd2.getMonth();

                return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
            },

            inYears: function(dd1, dd2) {
                return dd2.getFullYear()-dd1.getFullYear();
            }
        };

        function daycountDown() {
            // 한달 전 날짜로 셋팅
            var event_day = new Date(2019,2,4,23,59,59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));

            var Monthleft = event_day.getMonth() - now.getMonth();
            var Dateleft = DdayDiff.inDays(now, event_day);
            var Hourleft = timeGap.getHours();
            var Minuteleft = timeGap.getMinutes();
            var Secondleft = timeGap.getSeconds();

            if((event_day.getTime() - now.getTime()) > 0) {
                $("#dd1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft/10) + ".png");
                $("#dd2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft%10) + ".png");

                $("#hh1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft/10) + ".png");
                $("#hh2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft%10) + ".png");

                $("#mm1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft/10) + ".png");
                $("#mm2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft%10) + ".png");

                $("#ss1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft/10) + ".png");
                $("#ss2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft%10) + ".png");
                setTimeout(daycountDown, 1000);
            }
            else{
                $("#ddaytime").hide();
            }

        }
        daycountDown();

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