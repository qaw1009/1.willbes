@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;
            font-size:14px;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}


        .wb_mp4 {width:100%; text-align:center; margin:0 auto; background:#000; min-width:1120px;}
        .wb_mp4 ul {width:100%; margin:0 auto; min-width:1120px;}
        .layer {width:100%; height:800px; -ms-overflow:hidden;}
        .video {width:100%; height:800px; overflow:hidden; position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg	 { position: absolute; top:140px; width:100%}

        .wb_cts01 {background:#ec614e; color:#fff; padding-top:40px; font-size:20px}
        .wb_cts01 .tabs {display:flex; justify-content: center;}
        .wb_cts01 .tabs a {display:inline-block; padding:20px 50px; background:#ec614e; color:#fff; border-radius:20px 20px 0 0}
        .wb_cts01 .tabs a strong {font-size:26px}
        .wb_cts01 .tabs a.active {background:#fff; color:#ec614e;}

        .wb_cts02 .btns a {width:400px; margin:0 auto; font-size:30px; background:#1e1e1e; color:#fff; display:block; padding:20px; border-radius:50px}
        .wb_cts02 .btns a:hover {background:#ec614e;}


        .evt_06 ul {width:1120px; margin:0 auto; padding:100px; text-align:left; font-size:20px; line-height:1.7; display:flex; flex-wrap: wrap;  }
        .evt_06 li {list-style-type: disc; margin-left:20px; margin-bottom:20px; width:calc(50% - 20px)}
        .evt_06 li div {font-size:18px; color:#666}   
        .evt_06 li div span {padding:2px 5px; font-size:14px; color:#fff; border-radius:4px; vertical-align:middle; display:inline-block}
        .evt_06 li div span:nth-of-type(1) {background:#3957ac;}
        .evt_06 li div span:nth-of-type(2) {background:#40a028;}
        .evt_06 li div span:nth-of-type(3) {background:#c90f25;}
        .evt_06 li div span:nth-of-type(4) {background:#40a028;}

        .loadmap {position: relative; /*padding-bottom:56.25%;*/ overflow: hidden; max-width:100%; height:500px; }
        .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;} 


        .evtInfo {text-align:left; padding:100px 0; background:#f4f4f4}
        .wb_tipBox {width:1000px; margin:0 auto; font-size:16px; line-height:1.4}
        .wb_tipBox > strong { font-weight:bold; color:#333; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-3px; margin-bottom:10px; color:#111}	
        .wb_tipBox ol li {margin:25px 0 10px; list-style:decimal; margin-left:15px;}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; background:#fff; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:15px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec;}	
        .wb_tip_orange {color:#c03011;}
        .wb_tipBox b{vertical-align:top;} 


    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/pass/support/qna/create" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/1101_sky.jpg" alt="합격보장반"></a>
        </div>

        <div class="evtCtnsBox wb_mp4" data-aos="fade-up">
            <div class="layer">
                <div class="video">
                    <video style="width:100%;" autoplay loop muted="">
                        <source src="https://static.willbes.net/public/images/promotion/2019/07/1101_bg.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/1101_top.png" alt="윌비스 통합생활 관리반" />
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <div class="tabs">
                <a href="#tab01">통합생활관리반 <strong>개강정보</strong></a>
                <a href="#tab02">통합생활관리반 <strong>A to Z</strong></a>
                <a href="#tab03">통합생활관리반 <strong>24시</strong></a>
            </div>
        </div>


        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/1101_01.jpg" />
                <div class="btns">
                    <a href="https://pass.willbes.net/pass/support/qna/create" target="_blank">1:1 상담 신청하기 ></a>
                </div>
            </div>
            <div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/1101_02.jpg" />
            </div>
            <div id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/1101_03.jpg" />
            </div>
        </div>

        <div class="evtCtnsBox evt_06">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/1101_04.jpg" alt="합격보장반" />
            <div class="loadmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1881.7990872517546!2d126.94238635957505!3d37.51272428677447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1669167778104!5m2!1sko!2skr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> 
			<ul>
                <li>
                    주소
                    <div>서울시 동작구 만양로 105 한성빌딩 2층</div>
                </li>
                <li>
                    관리반 문의
                    <div>1522-6112</div>
                </li>
                <li>
                    지하철 이용 시
                    <div>노량진역 1번 출구 도보로 3분 / 3번 출구 도보로 4분</div>
                </li>
                <li>
                    버스 이용 시
                    <div>
                        <span>간선</span> 150, 360, 500, 504, 507, 605, 640, 654, 742<br>
                        <span>지선</span> 5516, 5517, 5531, 5535, 5536, 6211, 6411<br>
                        <span>광역</span> 9408<br>
                        <span>마을</span> 동작03, 동작08
                    </div>
                </li>
            </ul>	  
		</div>
        
        
        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="wb_tipBox">                     
                <div id="txt1">
                    <p>유의사항</p>
                    <ol>
                        <li><strong>[생활]</strong><br />
                        - <b>1개월 미만 등록은 불가하고 입실일과 무관하게 이용기간은 말일까지입니다.</b><br />
                        &nbsp;(ex: 10월 10일 입실 -> 11월 10일까지 1개월 이용 X, 10월 10일 입실 -> 11월 30일까지 이용 O)<br />
                        - 점호 및 출결 관리는 일요일과 공휴일은 진행되지 않으며 조교 근무 일정에 따라 진행이 안 되는 날이 있을 수 있습니다.<br />
                        - 내부 벌점 규정에 의한 생활 통제가 존재하며 점호 불참,소음,입실생간 불화,범죄 행위 등 벌점이 누적된 경우 강제 퇴실 조치가 있습니다.<br />
                        - <span class="wb_tip_orange">일요일도 식사가 제공되지만 명절 등 식당 공휴일에는 식사가 제공되지 않습니다.</span><br />
                        </li>
                        <li><strong>[실강 PASS]</strong><br />
                        - <span class="wb_tip_orange">국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 
                            이로 인한 해당기간 환불은 불가합니다.</span><br />
                        - 인강패스와 정규과정 외 특강 및 모의고사는 슈퍼패스 등록생에게 제공되는 무료혜택입니다.<br />
                        - 특강의 경우 별도의 신청이 필요합니다.<br />
                        - 일부 특강의 경우 별도의 결제가 필요할 수 있습니다.<br />
                        </li>
                        <li><strong>[인강 PASS]</strong><br />
                        - 불가피한 사정에 의해 진행되지 않은 강좌의 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.<br />
                        - 아이디 공유, 타인 양도 등 부정사용 적발 시 환불없이 회원 자격이 박탈되며, 불법 행위 시안에 따라 민형사상 조치가 있을 수 있습니다.<br />
                        - 온/오프라인 동시 진행되는 이벤트성 특강의 경우 인강에 미지급되거나 이벤트가 종료된 후 제공될 수 있습니다.<br />
                        </li>                   
                        <li><strong>[환불 규정]</strong><br />
                        - 혜택 이용 여부에 따른 환불<br />
                        &nbsp;통합생활관리반은 숙박,식사,실강,인강 등이 통합된 패키지 상품으로 등록 시점에 담당자와 협의를 거친 경우를 제외하고<br />
                        &nbsp;혜택 이용 여부에 따른 <b>부분적인 금액 공제는 불가</b>합니다.<br />
                        &nbsp;<span class="wb_tip_orange">(ex: 총 6개월 과정을 등록하였는데 2개월은 식당을 이용하지 않았으니 해당 부분 환불해주세요. X)</span><br />
                        &nbsp;<span class="wb_tip_orange">(ex: 인강PASS를 이용하지 않으니 인강 비용만큼 금액 공제해 주세요. X)</span><br />
                        </li>
                        <li>중도 환불 시 무료 혜택 금액을 차감하고 환불됩니다.</li>
                        <span class="wb_tip_orange">- 이용 기간에 따른 환불(교육청 환불 기준 준수)</span><br>                                              
                    </ol>
                </div> 
                <table style="margin-top:25px;">  
                    <col />
                    <col />
                    <col />
                    <tr>
                        <th>수강료징수기간</th>
                        <th>반환 사유발생일</th>
                        <th>반환금액</th>
                    </tr>
                    <tr>
                        <td rowspan="4">교습 기간이 1개월 이내인 경우</td>
                        <td>교습 시작 전</td>
                        <td>이미 납부한 교습비등의 전액</td>
                    </tr>
                    <tr>
                        <td>총 교습시간의 1/3경과 전</td>
                        <td>이미 납부한 교습비등의 2/3에 해당하는 금액</td>
                    </tr>
                    <tr>
                        <td>총 교습시간의 1/2경과 전</td>
                        <td>이미 납부한 교습비등의 1/2에 해당하는 금액</td>
                    </tr>
                    <tr>
                        <td>총 교습시간의 1/2경과 후</td>
                        <td>반환하지 않음</td>
                    </tr>
                    <tr>
                        <td rowspan="2">교습 기간이 1개월 초과인 경우</td>
                        <td>교습 시작 전</td>
                        <td>이미 납부한 수강료 전액</td>
                    </tr>
                    <tr>
                        <td>교습 시작 후</td>
                        <td>반환사유가 발생한 해당 월의 반환 대상 교습비등<br />
                            (교습기간이 1개월 이내인 경우의 기준에 따라 산출한 금액을 말한다)과 나머지<br/>
                            월의 교습비등의 전액을 합산한 금액
                        </td>
                    </tr>
                </table>                      
                
                </div>
            </div>  
        </div>



    </div>
    <!-- End Container -->


    <script type="text/javascript">
        $(document).ready(function(){
            $('.tabs').each(function(){
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

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

@stop