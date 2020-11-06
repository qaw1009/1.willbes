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
        .evtTop {background: url("https://static.willbes.net/public/images/promotion/2020/11/1902_top_bg.jpg") center top no-repeat}
        .evt01 {}
        .evt02 {background:#866038; padding-bottom:150px}
        .evt02 div {width:1120px; margin:0 auto; padding:20px; background:#fff; font-size:14px}
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
        .guide_box{width:960px; margin:0 auto; border:2px solid #202020;padding:50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .guide_box dd strong {color:#555}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:13px;}
        .guide_box dd:after {content:""; display:block; clear:both}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}   
        
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1902_top.jpg" alt="유튜브 구독 이벤트" usemap="#Map1902_01" border="0" />
            <map name="Map1902_01">
                <area shape="rect" coords="260,1513,853,1600" href="#evt02" alt="라이브모드 구매하기" >
            </map>             
        </div>       

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1902_01.jpg" alt="이벤트 안내" />
        </div>  

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1902_02.jpg" alt="이벤트 안내" usemap="#Map1902_02" border="0" />
            <map name="Map1902_02">
                <area shape="rect" coords="112,1118,309,1182" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3043&campus_ccd=605001&search_text=UHJvZE5hbWU665287J2067iM " target="_blank" alt="행정직">
                <area shape="rect" coords="461,1118,659,1181" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU665287J2067iM " target="_blank" alt="소방직">
                <area shape="rect" coords="816,1117,1008,1180" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3048&campus_ccd=605001&search_text=UHJvZE5hbWU665287J2067iM" target="_blank" alt="군무원">
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
                            <td>[라이브][20.11-12] 기미진 기특한 국어 기출문제분석</td>
                            <td>11/18 ~ 12/31</td>
                            <td>수/목</td>
                            <td>112,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/173967" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td>한덕현</td>
                            <td>[라이브][20.11-12] 한덕현 제니스영어 기출리뷰</td>
                            <td>11/16 ~ 12/28</td>
                            <td>월</td>
                            <td>63,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/173968" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td>조민주</td>
                            <td>[라이브][20.11-12] 조민주 한국사 기출문제풀이</td>
                            <td>11/16 ~ 12/29</td>
                            <td>월/화</td>
                            <td>112,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/173969" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>행정법</td>
                            <td>이석준</td>
                            <td>[라이브][20.11-12] 이석준 행정법 기출문제풀이</td>
                            <td>11/17 ~ 12/31</td>
                            <td>화/목</td>
                            <td>112,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/173970" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>행정학</td>
                            <td>김덕관</td>
                            <td>[라이브][20.11-12] 김덕관 강한행정학 기출문제풀이</td>
                            <td>11/21 ~ 01/13</td>
                            <td>수/금</td>
                            <td>112,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/173971" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>국어</td>
                            <td>김세령</td>
                            <td>[라이브][20.11-12] 불꽃소방 세령국어 이론정리+기출분석</td>
                            <td>11/16 ~ 12/28</td>
                            <td>월</td>
                            <td>112,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/173976" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td>이아림</td>
                            <td>[라이브][20.11-12] 불꽃소방 이아림 공채영어 이론정리+기출분석</td>
                            <td>11/20 ~ 01/01</td>
                            <td>금</td>
                            <td>112,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/173977" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td>양익</td>
                            <td>[라이브][20.11-12] 불꽃소방 양익 경채영어 이론정리+기출분석</td>
                            <td>11/17 ~ 12/29</td>
                            <td>화/목</td>
                            <td>63,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/173978" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td>한경준</td>
                            <td>[라이브][20.11-12] 불꽃소방 한경준 미친한국사 이론정리+기출분석</td>
                            <td>11/17 ~ 12/29</td>
                            <td>화</td>
                            <td>112,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/173981" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>소방학개론</td>
                            <td>이종오</td>
                            <td>[라이브][20.11-12] 불꽃소방 이종오 소방학개론 이론정리+기출분석</td>
                            <td>11/18 ~ 12/30</td>
                            <td>수</td>
                            <td>112,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/173979" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>소방관계법규</td>
                            <td>이종오</td>
                            <td>[라이브][20.11-12] 불꽃소방 이종오 소방관계법규 이론정리+기출분석</td>
                            <td>11/19 ~ 12/31</td>
                            <td>목</td>
                            <td>63,000원</td>
                            <td><a href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/173980" target="_blank">수강신청</a></td>
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
                            <li>윌비스공무원 라이브모드는 윌비스공무원학원 노량진 캠퍼스에서 11~12월 내 진행되는 9급/군무원/소방직 현장강의를 
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
                            <li>본 상품은 결제가 완료되는 즉시 수강이 자동 시작됩니다.</li>
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
                            <li>본 PASS 이용 시 PC/모바일 기기 2대 이상 동시접속은 불가합니다.</li>                            
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불정책  (※ 환불 문의 : 1544-0330)</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>전액 환불은 1회로 제한됩니다.</li>
                            <li>본 상품은 할인가 적용된 특별기획 상품이므로 부분 환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>아이디 공유 적발 시 회원 자격이 박탈되며, 환불은 불가함을 원칙으로 합니다. 추가적인 불법공유행위 적발 시 형사고발 조치가 가능합니다.</li>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                        </ol>
                    </dd>

                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->
@stop