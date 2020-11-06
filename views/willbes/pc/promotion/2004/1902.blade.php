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
        
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1902_top.jpg" alt="유튜브 구독 이벤트" usemap="#Map1902_01" border="0" />
            <map name="Map1902_01">
                <area shape="rect" coords="260,1513,853,1600" href="#none" target="_blank" alt="라이브모드 구매하기" >
            </map>             
        </div>       

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1902_01.jpg" alt="이벤트 안내" />
        </div>  

        <div class="evtCtnsBox evt02">
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
    </div>
    <!-- End Container -->
@stop