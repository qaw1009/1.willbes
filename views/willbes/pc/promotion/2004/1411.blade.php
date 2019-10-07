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
            bottom:50px;
            right:10px;
            z-index:1;
        }

.wb_top{background:url("https://static.willbes.net/public/images/promotion/2019/09/1411_top_bg.jpg") no-repeat center top}
.wb_cts01{background:url("https://static.willbes.net/public/images/promotion/2019/09/1411_01_bg.jpg") no-repeat center top}
.wb_cts02{background:#eee;}
.wb_cts03{background:#eee;padding-bottom:150px}

.tabContaier{width:980px;margin:0 auto;}
.tabContaier li{display:inline-block;width:50%;height:84px;line-height:84px;background:#e4e4e4;color:#666;float:left;font-size:22px;font-weight:bold;}
.tabContaier:after {content:""; display:block; clear:both}
.tabContaier li a{display:block;}
.tabContaier li a:hover,
.tabContaier li a.active {background:#2b2b2b;color:#fff;}

.evt06 {width:980px !important; margin:100px auto; text-align:left}
.evt06Box {border:1px solid #000; padding:30px}

 /* 유의사항 */
.tab02 {margin-bottom:20px}
.tab02 li {display:inline; float:left; width:33.33333%}
.tab02 li a {display:block; text-align:center; font-size:14px; font-weight:bold; background:#e4e4e4; color:#666; padding:15px 0; border:1px solid #e4e4e4; margin-right:1px}
.tab02 li a:hover,
.tab02 li a.active {background:#242424; color:#fff;}
.tab02 li:last-child a {margin:0} 
.tab02:after {content:""; display:block; clear:both}

.tab02Cts strong {font-weight:bold; color:#000; display:block; margin-bottom:5px}
.tab02Cts span {padding-left:10px;}
.tab02Cts p {font-size:14px !important; font-weight:bold; margin:20px 0 10px; color:#000}
.tab02Cts ol li {margin-bottom:10px; line-height:1.3; list-style:disc; margin-left:20px}
.tab02Cts table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto; margin-top:10px}
.tab02Cts th,
.tab02Cts td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4; font-size:100% !important}
.tab02Cts th {font-weight:bold; color:#333; background:#f4f4f4}
 </style>

 <div class="p_re evtContent NGR" id="evtContainer">  
    <div class="skybanner" >
        <a href="https://pass.willbes.net/pass/promotion/index/cate/3024/code/1419" target="blank"><img src="https://static.willbes.net/public/images/promotion/2019/10/1419_sky1.png"></a>        
    </div>

    <div class="evtCtnsBox wb_top">
        <img src="https://static.willbes.net/public/images/promotion/2019/09/1411_top.gif" usemap="#Map1411a"  title="등불 문제풀이반" border="0" />
        <map name="Map1411a" id="Map1411a">
            <area shape="rect" coords="255,989,873,1083" href="#to_go" />
        </map>
    </div>  
    <div class="evtCtnsBox wb_cts01">
        <img src="https://static.willbes.net/public/images/promotion/2019/09/1411_01.jpg"  title="추가채용 확정" />
    </div>

    <div class="evtCtnsBox wb_cts02">
        <img src="https://static.willbes.net/public/images/promotion/2019/09/1411_02.jpg"  title="윌비스와 함께" />
    </div>

    <div class="evtCtnsBox wb_cts03" id="to_go">
        <div class="tabContaier">    
            <ul>    
                <li><a href="#tab1" class="active">등.불문제풀이반 단과</a></li>                    
                <li><a href="#tab2">등.불문제풀이반 종합반</a></li>                
            </ul>
        </div> 
        <div id="tab1" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1411_02_tab1.jpg" usemap="#Map1411b" title="단과 탭" border="0" />
            <map name="Map1411b" id="Map1411b">
                <area shape="rect" coords="811,119,950,178" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048" target="_blank" />
                <area shape="rect" coords="812,269,954,328" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048" target="_blank" />
                <area shape="rect" coords="810,428,954,488" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048" target="_blank" />
                <area shape="rect" coords="811,579,952,636" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048" target="_blank" />
            </map>      
        </div>
        <div id="tab2" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1411_02_tab2.jpg" usemap="#Map"  title="종합반 탭" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="812,74,951,135" href="https://pass.willbes.net/pass/offPackage/show/prod-code/157077"  target="_blank" />
                <area shape="rect" coords="809,178,957,238" href="https://pass.willbes.net/pass/offPackage/show/prod-code/157091"  target="_blank" />
                <area shape="rect" coords="808,393,952,453" href="https://pass.willbes.net/pass/offPackage/show/prod-code/157076"  target="_blank" />
                <area shape="rect" coords="813,500,952,556" href="https://pass.willbes.net/pass/offPackage/show/prod-code/157090"  target="_blank" />
            </map>    
        </div>
    </div>
    <div class="evt06">
            <div class="evt06Box">
                <ul class="tab02">
                    <li><a href="#txt1" class="active">유의사항</a></li>
                    <li><a href="#txt2">수강혜택</a></li>
                    <li><a href="#txt3">기타</a></li>  
                </ul>
                <div id="txt1" class="tab02Cts">
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
                            </table>
                            <br />
                            <br />
                            1) 총 교습 시간은 개강달로부터 종강달까지 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br />
                            2) 개강 이후 환불 접수는 기간 내 직접 방문해주셔야 합니다. (유선 접수 불가/ 수강증 미반납시 환불 불가) <br />
                            3) 환불 요청 시, 결제 하셨던 카드, 수강증, 영수증을 지참하셔야 결제취소가 가능하며, 현금으로 결제하신 경우, 수강생 본인 명의의 통장으로 입금됩니다.<br />
                            4) 환불 기준일은 실제 수강여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다<br />
                            5) 수강 기간 동안 제공받은 사물함, 동영상 강좌, 자습실 등 혜택으로 제공된 서비스는 환불 즉시 이용이 정지 및 회수되며, 기사용된 부분은 환불신청하신<br />
                            해당월의 말일까지 사용한 것으로 간주하고 사용료를 환불금액에서 공제합니다. <br />
                            <span>- 사물함 사용료: 1개월-5,000원</span> <br />
                            <span>- 동영상 강좌: 1개월-35,000원<span> <br />                   
                            6) 무료로 제공받은 교재 등 혜택으로 제공된 물품류(전자제품 제외)의 경우 미반환되거나, 기사용흔적/훼손이 있는 경우 환불금액에서 해당 물품류의 정가를 환불금에서 공제합니다.<br />
                            7) 태블릿 PC 등 혜택으로 제공된 전자제품류 개봉/기사용 흔적 있는 경우 환불금액에서 해당 전자제품류의 정가를 환불금에서 공제합니다<br />
                            8) 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록하셔야합니다.<br />
                            9) 친구추천할인 이벤트 적용 대상자의 경우 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결재 해야 환불이 진행됩니다.<br />
                        </li>
                    </ol>
                </div>
                <div id="txt2" class="tab02Cts">
                    <ol>
                        <li>
                        <strong>윌비스 전국 모의고사</strong>
                        - 윌비스 고시학원에서 진행되는 유료 모의고사가 제공됩니다. 개인 사유에 의해 신청/응시하지 못한 경우에 대해서는 학원에서 보상하지 않습니다.<br />
                        </li>
                        <li>
                        <strong>개인 사물함</strong>
                        - 지정 사물함으로 제공되며, 지정된 사물함이외의 사물함은 사용이 불가능합니다.<br />
                        - 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. 잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                        - 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                        - 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                        - 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                        - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>                       
                        <li>
                        <strong>복습 동영상</strong>
                        - 직급별 온라인PASS와 단강좌가 지급됩니다.<br />
                        - 수강기간 동안만 수강이 가능한 혜택이며, 중도환불 시 즉시 회수됩니다.<br />
                        - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>                      
                        <li>
                        <strong>추가 할인</strong>
                        - 추가 할인은 수강료 정가에서 적용됩니다.<br />
                        - 학원 방문 등록 시에만 추가 할인이 적용됩니다.
                        </li>
                    </ol>
                </div>
                <div id="txt3" class="tab02Cts">
                    <ol>
                        <li><strong>학원 운영시간</strong>
                            - 학원 운영 시간: 월~일 06:30~23:30<br />
                            - 자습실 운영시간은 학원 운영 시간과 동일합니다. 다만, 1월 1일, 설 당일, 추석 당일은 건물 휴무로 운영되지 않습니다.<br />
                        </li>
                        <li><strong>기타</strong>
                            - 반드시 등록한 강좌 및 등록한 수업만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원 상품 등록이 불가할 수 있습니다<br />
                            - 등록하신 강좌는 본인만 수강이 가능하며, 타인에게 판매/양도 할 수 없습니다.<br />
                            - 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다.<br />
                            - 강의는 학원 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다.(폐강 시, 환불규정에 의거 환불 진행)<br />
                            - 개인사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
                            - 수강확인은 수강증을 통한 검사로 진행되오니 꼭 지참하시고 수강하시기 바랍니다. (수강증 분실 및 미발급으로 발생되는 손해의 책임은 수강생 본인에게 있습니다.)<br />
                            - 수강료에 교재 비용은 포함되어 있지 않으며, 커리큘럼에 따라 추가 교재를 구매 하실 수 있습니다.<br />
                            - 수업자료는 수업 종료 후 3일 이내로 수령하셔야하며, 이후에는 개인적으로 출력하셔야합니다.<br />
                            - 연간 종합반 수업은 2019년 5월부터 2020년 3월 둘째주 까지 진행되며, 자습실 사용은 시험주까지 사용 가능합니다.<br />
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
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop