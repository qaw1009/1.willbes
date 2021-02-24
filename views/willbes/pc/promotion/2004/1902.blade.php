@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .evtTop01 {background:#241B20 url("https://static.willbes.net/public/images/promotion/2020/11/1902_top01_bg.jpg") center top no-repeat}
        .evtTop02 {background:#15161A url("https://static.willbes.net/public/images/promotion/2020/11/1902_top02_bg.jpg") center top no-repeat}

        .evt02 {background:#866038; padding-bottom:150px}
        .evt02 div {width:1000px; margin:0 auto; padding:20px; background:#fff; font-size:14px}
        .evt02 th,
        .evt02 td {padding:20px 10px;}
        .evt02 td:nth-child(3) {text-align:left; color:#000}
        .evt02 td:nth-child(6) {color:red}
        .evt02 th {background:#f4f4f4}        
        .evt02 td {color:#666}
        .evt02 td a {display:block; color:#fff; background:#333; padding:8px 5px; border-radius:4px}
        .evt02 td a:hover {background:#ffff00; color:#866038}
        .evt02 tr {border-bottom:1px solid #eee}
        .evt02 tr:last-child {border:0}

        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1120px; margin:0 auto; border:2px solid #202020; padding:50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .guide_box dd strong {color:#555}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:13px;}
        .guide_box dd:after {content:""; display:block; clear:both}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}   
        .wb_info table {margin:20px 0; border-top:1px solid #e4e4e4; border-left:1px solid #e4e4e4;}
        .wb_info th,
        .wb_info td {text-align:center; padding:10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_info th {font-weight:bold; color:#333; background:#f6f0ec;}	
        
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    

        <div class="evtCtnsBox evtTop01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1902_top01.gif" alt="" />        
        </div>   

        <div class="evtCtnsBox evtTop02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1902_top02.jpg" alt="" usemap="#Map1902_buy" border="0" />
            <map name="Map1902_buy" id="Map1902_buy">
                <area shape="rect" coords="259,931,846,1023" href="#evt02" />
            </map>                 
        </div>   

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1902_01.jpg" alt="이벤트 안내" />
        </div>  

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1902_02.jpg" alt="이벤트 안내" usemap="#Map1902_02" border="0" />
            <map name="Map1902_02">
                <area shape="rect" coords="112,1118,309,1182" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3043&campus_ccd=605001&search_text=UHJvZE5hbWU6bGl2ZQ%3D%3D " target="_blank" alt="행정직">
                <area shape="rect" coords="461,1118,659,1181" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU6bGl2ZQ%3D%3D " target="_blank" alt="소방직">
                <area shape="rect" coords="816,1117,1008,1180" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3048&campus_ccd=605001&search_text=UHJvZE5hbWU6bGl2ZQ%3D%3D" target="_blank" alt="군무원">
            </map>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>과목명</th>
                            <th>교수명</th>
                            <th>강좌명</th>
                            <th>개강일정</th>
                            <th>요일</th>
                            <th>가격</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>국어</td>
                            <td>기미진</td>
                            <td>[라이브][국가직 대비] 기특한 국어 실전 동형모의고사</td>
                            <td>03-18 ~ 04-08</td>
                            <td>수,목</td>
                            <td>48,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178570" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td>한덕현</td>
                            <td>[라이브][국가직 대비] 제니스영어 실전 동형모의고사</td>
                            <td>03-15 ~ 04-05</td>
                            <td>목</td>
                            <td>36,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178473" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td>조민주</td>
                            <td>[라이브][국가직 대비] 한국사 실전 동형모의고사</td>
                            <td>03-15 ~ 04-06</td>
                            <td>월,화</td>
                            <td>64,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178455" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>행정학</td>
                            <td>김덕관</td>
                            <td>[라이브][국가직 대비] 강한행정학 실전 동형모의고사</td>
                            <td>03-17 ~ 04-07</td>
                            <td>수</td>
                            <td>36,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178436" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>행정법</td>
                            <td>이석준</td>
                            <td>[라이브][국가직 대비] 행정법 실전 동형모의고사</td>
                            <td>03-16 ~ 04-08</td>
                            <td>화,목</td>
                            <td>64,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178431" target="_blank">수강신청</a></td>
                        </tr>                        
                        <tr>
                            <td>소방국어</td>
                            <td>김세령</td>
                            <td>[라이브]김세령 소방국어 실전 동형모의고사</td>
                            <td>03-08 ~ 03-22</td>
                            <td>월</td>
                            <td>27,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178417" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>공채영어</td>
                            <td>이아림</td>
                            <td>[라이브]이아림 공채영어 실전 동형모의고사</td>
                            <td>03-12 ~ 03-26</td>
                            <td>금</td>
                            <td>48,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178418" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>공채영어</td>
                            <td>양익</td>
                            <td>[라이브]양익 경채영어 실전 동형모의고사</td>
                            <td>03-09 ~ 03-23</td>
                            <td>화</td>
                            <td>27,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178419" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>소방한국사</td>
                            <td>한경준</td>
                            <td>[라이브]한경준 소방한국사 실전 동형모의고사</td>
                            <td>03-09 ~ 03-24</td>
                            <td>화</td>
                            <td>48,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178420" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>소방학개론</td>
                            <td>이종오</td>
                            <td>[라이브]이종오 소방학개론 실전 동형모의고사</td>
                            <td>03-10 ~ 03-24</td>
                            <td>수</td>
                            <td>27,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178422" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>소방관계법규</td>
                            <td>이종오</td>
                            <td>[라이브]이종오 소방관계법규 실전 동형모의고사</td>
                            <td>03-11 ~ 03-25</td>
                            <td>목</td>
                            <td>27,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178423" target="_blank">수강신청</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내 및 유의사항</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>윌비스공무원 라이브모드는 윌비스공무원학원 노량진 캠퍼스에서 진행되는 9급/군무원/소방직 현장강의를 
                                실시간으로 수강 가능한 상품입니다.</li>
                            <li>직렬 및 과목별 수강 가능 교수진<br>
                            - 9급 종합반 : 국어 기미진, 영어 한덕현, 한국사 조민주, 행정법 이석준, 행정학 김덕관<br>
                            - 소방 종합반 : 국어 김세령, 영어 [공채] 이아림, 영어 [특채] 양익, 소방학개론/소방관계법규 이종오<br>
                            - 군무원 종합반 : 국어 기미진, 행정법 이석준, 행정학 김덕관</li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>상품은 윌비스공무원학원 노량진 캠퍼스 현장강의 종료일까지 유효합니다.</li>
                            <li>본 상품은 현장강의와 동일한 시간에 수강 가능합니다.</li>
                            <li>본 상품 이용 시 일시정지/연장/재수강은 제공되지 않습니다.</li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>9급 종합반의 경우 공통과목(국∙영∙史) 혹은 5과목(국∙영∙史∙행정법∙행정학)을 수강할 수 있으며, 일부 특강은 라이브로 
                                제공되지 않을 수 있습니다.</li>
                            <li>강의 시간에 출석하지 못한 경우 별도의 보충동영상은 제공되지 않습니다.</li>
                            <li>본 상품은 PC/모바일웹/윌비스 모바일앱을 통해 수강하실 수 있습니다.</li>
                            <li>본 상품은 현장강의와 동일한 시간에 수강할 수 있으므로, 휴강 기능을 이용할 수 없습니다.</li>                           
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불정책 (※ 환불 문의 : 1544-0330)</dt>
                    <dd>
                        <ol>
                            <li>
                                <strong>수강료 환불규정 (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</strong>
                                <table>
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
                            </li>
                            <li>총 교습 시간은 개강월로부터 종강월까지의 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.</li>
                            <li>환불 접수는 학원 방문 접수만 가능하며, 수강증을 필히 제출하여야 합니다.</li>
                            <li>카드로 결제하신 경우 결제 하셨던 카드를 지참하셔야 하며, 현금/계좌이체로 결제하신 경우 수강생 본인 명의의 통장으로만 환불금 입금 처리됩니다.</li>
                            <li>환불 기준일은 실제 수강 여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다.</li>        		
                            <li>개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록 하셔야 합니다.</li>
                            <li>친구추천할인 이벤트 적용 대상자의 경우, 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결제 해야 환불이 진행됩니다.</li>
                            <li>개강일이 지난 후에 강의 결제시, 지난 강의는 동영상으로 제공이 되며, 이후 강의 환불은 결제일과 상관없이 개강일을 기준으로 환불금이 산정됩니다.</li>
                            <li>이미 개강한 강의를 구매하더라도 수강료는 동일합니다.</li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>아이디 공유 적발 시 회원 자격이 박탈되며, 환불은 불가능합니다.</li>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                        </ol>
                    </dd>

                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->
@stop