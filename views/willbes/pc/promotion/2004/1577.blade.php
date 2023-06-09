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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}

        /************************************************************/     

        .skybanner {position:fixed; top:250px; right:10px; z-index:1;}
        .skybanner ul li {padding-bottom:10px;}

        .evtTop {background:#eee7e0 url("https://static.willbes.net/public/images/promotion/2020/05/1577_top_bg.jpg") no-repeat center top}          
        
        .evt01,.evt02,.evt03 {background:#fff;}      
       
        .evt03 {padding-bottom:150px}
        .evt03 ul { width:1000px; margin:0 auto}
        .evt03 li {display:inline; float:left; width:33.33333%; text-align:center}
        .evt03 li .off {display:block}
        .evt03 li .on {display:none}
        .evt03 li:hover .off {display:none}
        .evt03 li:hover .on {display:block}
        .evt03 ul:after {content:""; display:block; clear:both}

        .evt04 {background:#2d363f;}	

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

        /*TAB_tip*/
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:33.33333%;}
        .tab02 li a { display:block; text-align:center; font-size:14px; font-weight:bold; background:#323232; color:#fff; padding:14px 0; border:1px solid #323232; margin-right:2px}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #666; border-bottom:1px solid #fff;}
        .tab02 li:last-child a {margin:0}
        .tab02:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">    

        <div class="skybanner">
            <ul>          
                <li><a href="https://pass.willbes.net/pass/support/notice/show?board_idx=278985&" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/2020/06/1577_sky.png"  title="기미진 기특한 국어" /></a></li>
            </ul>
        </div>       

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1577_top.gif" title="불꽃소방"/>
        </div>
      
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1577_01.jpg" usemap="#Map1539a" border="0" />
            <map name="Map1539a" id="Map1539a">
                <area shape="rect" coords="363,406,516,491" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050" target="_blank" onfocus='this.blur()'  />
                <area shape="rect" coords="836,405,985,488" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050" target="_blank" onfocus='this.blur()'  />
            </map>         
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1577_02.jpg" title="5월 시간표" />       
        </div>      

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1577_03.jpg" usemap="#Map1539b" title="교수진" border="0">
            <!--map name="Map1539b" id="Map1539b">
                <area shape="rect" coords="186,684,268,703" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161628" target="_blank" />
                <area shape="rect" coords="359,676,441,695" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161624" target="_blank" />
                <area shape="rect" coords="532,676,614,695" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161627" target="_blank" />
                <area shape="rect" coords="706,675,789,695" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161625" target="_blank" />
                <area shape="rect" coords="880,677,962,697" href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/161626" target="_blank" />
            </map-->       
            <ul>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a1.jpg" title="복습 동영상 제공" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a1_over.jpg" title="복습 동영상 제공" class="on"/>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/11/1410_a2.jpg" title="사물함 무료 제공" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/11/1410_a2_over.jpg" title="사물함 무료 제공" class="on"/>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a3.jpg" title="체력학원 연계 할인" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1410_a3_over.jpg" title="체력학원 연계 할인" class="on"/>
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1577_04.gif" title="특강"  />
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
                        <td>총 교습 시간의 1/2 경과 전</td>
                        <td>이미 납부한수강료의 1/2 해당</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/2 경과 후</td>
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
                    ▷ 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록 하셔야 합니다.<br />
                    ▷ 친구추천할인 이벤트 적용 대상자의 경우, 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결제 해야 환불이 진행됩니다.<br />
                    ▷ 개강일이 지난 후에 강의 결제시, 지난 강의는 동영상으로 제공이 되며, 이후 강의 환불은 결제일과 상관없이 개강일을 기준으로 환불금이 산정됩니다.<br />
                    ▷ 이미 개강한 강의를 구매하더라도 수강료는 동일합니다.<br />	
                </li>
                </ol>
            </div>
            <div id="txt2">
                <p>수강생 혜택상세</p>
                <ol>        
                <li><strong>복습 동영상</strong><br />
                ▷ 종합반 수강 기간 내에 신청 가능합니다.<br />
                ▷ 현재 진행중인 실강에 대한 복습동영상이 제공되며, 다른 과정은 제공되지 않습니다.<br />
                ▷ 복습동영상은 최대 30일까지 신청할 수 있습니다.<br />
                ▷ 복습 동영상은 학원에 직접 방문하여 신청하는 것이 원칙이며, 전화로는 신청이 불가합니다.<br />
                </li>
                <li><strong>전국 모의고사</strong><br />
                ▷ 윌비스 고시학원에서 진행되는 윌비스 Real 모의고사가 제공됩니다.<br />
                ▷ 선택과목/응시직렬에 따라 몇몇 과목의 모의고사가 제공되지 않을 수 있습니다.<br />
                </li>
                <li><strong>사물함</strong><br />           
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
                ▷ 학원 운영 시간: <span class="wb_tip_orange">월 ~ 금 06:30 ~ 22:50, 토 07:30 ~ 22:00, 일 08:00 ~ 21:00  </span> (자습실 운영시간은 학원 운영 시간과 동일합니다.)<br />
                ▷ 데스크 운영 시간: <span class="wb_tip_orange"> 평일 08:30 ~ 20:00, 토요일 08:30 ~ 18:00 </span><br />
                ▷ 사물함 등록/연장/반납, 교재구매, 수강환불 관련 업무시간 : <span class="wb_tip_orange"> 평일 09:00 ~ 18:00 </span><br />
                ▷ 연휴 당일은 건물 휴무로 운영되지 않습니다.<br />
                ▷ 기술직 강의는 남강빌딩에서 진행 됩니다.<br />
                </li>
                <li><strong>TEST 프로그램(전국 모의고사 포함)</strong><br />
                ▷ TEST 프로그램은 일일, 월간 TEST가 제공됩니다.<br />
                ▷ DAILY, MONTHLY TEST 의 경우, 강사의 강의 계획에 따라 제공되지 않을 수 있습니다.<br />
                ▷ 전국모의고사는 2019. 11월 이후 2~3개월에 한번 진행 될 예정이나, 학원사정이나 시험 일정에 따라 기간이 변경될 수 있습니다.<br />
                ▷ 전국모의고사는 학원에서 진행되는 올백모의고사반과 다른 프로그램입니다.<br />
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
        <!--wb_tip//-->
    </div>
    <!-- End Container -->

    <script type="text/javascript">
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