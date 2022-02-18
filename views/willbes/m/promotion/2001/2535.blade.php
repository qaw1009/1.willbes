@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:10px;}

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1rem; line-height:1.3; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/


    .evt03 {padding-bottom:50px} 

    .form_area{padding:10px; border:1px solid #909090; letter-spacing:-1px}
    .form_area h4{font-size:1.2rem; background:#344963; color:#fff; padding:10px}
    .form_area h5{margin-bottom:10px;font-weight:bold; color:#344963;}
    .form_area strong {display:inline-block; width:150px; color:#344963; background-color:#e4e4e4; height:30px; line-height:30px; padding-left:5px; vertical-align:middle; margin-right:5px}
    .form_area .star {color:#344963; margin-right:5px;font-size:7px; vertical-align:middle}
    .privacy {text-align:left; margin-top:30px;}
    .privacy p {margin-bottom:10px}

    .form_area label{font-weight:bold;display:inline-block; margin-left:5px;}
    .form_area label.username{letter-spacing:10px;}
    .form_area input[type=text],
    .form_area input[type=tel] {height:30px; line-height:30px; width:calc(100% - 170px)}
    .form_area input[type=checkbox],
    .form_area input[type=radio]{padding-left:15px; width:18px; height:18px}
    .form_area .check_contact .check{font-weight:normal;}
    .form_area .check_contact strong {font-weight:bold; width:100%}
    .form_area #look {width:100px;height:30px;}
    .form_area #userId {vertical-align:bottom;}
    .area li {display:inline !important; float:left; width:20%; line-height:1.5; margin-bottom:5px}
    .area:after {content:""; display:block; clear:both}
    input:checked + label {color:#1087ef;}

    .privacy .info{padding:20px; border:1px solid #e4e4e4;margin-top:20px}
    .privacy .info li{ list-style:decimal; margin-left:10px; margin-bottom:10px}
    .detail{line-height:20px;}
    .accept{text-align: left; padding:20px 0; font-weight: bold;}

    .form_area .btn a {display:block; border-radius:50px; background:#344963; color:#fff; padding:10px 0; font-size:1.2rem;}
    .form_area .btn a:hover {background:#000;}

    .evt04 {background:#474bff;}
    .evt04 > div {width:98%; margin:0 auto}
    .evt04 div table {table-layout: auto; border-top:1px solid #fff;}
    .evt04 div table th,
    .evt04 div table td {padding:10px 3px; border-bottom:1px solid #fff; border-right:1px solid #fff; text-align: center; font-weight: 600; font-size:20px}
    .evt04 div table th {background: #252525; color:#fff;}
    .evt04 div table td {font-size:18px; color:#fff;}
    .evt04 div table td div {position:relative}
    .evt04 div table td span {position:absolute; width:100%; top:0; left:0; z-index:5}
    .evt04 div table td span.first_come {position:absolute;width:100%;left:48%;margin-left:-59px;margin-top:-59px;}
    .evt04 div table td span.bubble {position:absolute;width:100%;left:125%;margin-left:-59px;margin-top:-69px;}
    .evt04 div table tbody th {background: #f9f9f9; color:#555;}
    .evt04 div table tbody th:last-child,
    .evt04 div table tbody td:last-child {border-right:0;} 
    .evt04 .btn {margin-top:30px; padding-bottom:50px}
    .evt04 .btn img {width:70%; max-width:395px}

    .evtInfo {padding:50px 20px; background:#333; color:#f0f0f0;}
    .evtInfoBox {text-align:left; line-height:1.3}
    .evtInfoBox li {list-style: decimal; margin-left:20px; margin-bottom:10px;}
    .evtInfoBox strong {color:#64efff}
    .evtInfoBox h4 {margin-bottom:30px; font-size:1.4rem;}
    .evtInfoBox .infoTit { margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {
        .evtCtnsBox {font-size:0.8rem;}
        .evt04 div table td {font-size:0.8rem}
        .area li {width:25%;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .evtCtnsBox {font-size:0.8rem;}
        .evt04 div table td {font-size:0.8rem}
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }
</style>


<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox evtTop" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/02/2535m_top.jpg" alt="파이널 패스"/>
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/02/2535m_01.jpg" alt="파이널 패스"/>
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/02/2535m_02.jpg" alt="커리큘럼"/>
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <div id="apply">
            <div class="form_area" id="to_go">
                <h4 class="NSK-Black">2022 봉투 모의고사 이벤트</h4>
                <div class="privacy">
                    <div class="contacts NSK">
                        <p><strong><span class="star">▶</span>이름</strong><input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" readonly /></p>
                        <p><strong><span class="star">▶</span>연락처</strong><input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" maxlength="11" readonly/></p>
                        <p class="check_contact">
                            <strong><span class="star">▶</span>22년 1차 응시지원청</strong><br>
                        <ul class="area">
                            <li><input type="checkbox" name="register_data1[]" id="aa1" value="서울청"><label for="aa1"> 서울청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa2" value="대구청"><label for="aa2"> 대구청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa3" value="인천청"><label for="aa3"> 인천청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa4" value="광주청"><label for="aa4"> 광주청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa5" value="대전청"><label for="aa5"> 대전청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa6" value="울산청"><label for="aa6"> 울산청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa7" value="경기남부"><label for="aa7"> 경기남부</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa8" value="경기북부"><label for="aa8"> 경기북부</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa9" value="강원청"><label for="aa9"> 강원청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa10" value="충북청"><label for="aa10"> 충북청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa11" value="충남청"><label for="aa11"> 충남청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa12" value="전북청"><label for="aa12"> 전북청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa13" value="전남청"><label for="aa13"> 전남청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa14" value="경북청"><label for="aa14"> 경북청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa15" value="경남청"><label for="aa15"> 경남청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa16" value="부산청"><label for="aa16"> 부산청</label></li>
                            <li><input type="checkbox" name="register_data1[]" id="aa17" value="제주청"><label for="aa17"> 제주청</label></li>
                        </ul>
                        </p>

                        <p>
                            <strong><span class="star">▶</span>사전안내 문자서비스</strong>
                            <input type="radio" name="" id="bb1" value="예"><label for="bb1"> 예</label>
                            <input type="radio" name="" id="bb1" value="아니오"><label for="bb1"> 아니오</label>
                        </p>
                    </div>


                    <div class="info">
                        <h5><span class="star">▶</span>개인정보 수집 및 이용에 대한 안내</h5>
                        <ul>
                            <li>개인정보 수집 이용 목적<br/>
                                - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br/>
                                - 이벤트 참여에 따른 강의 수강자 목록에 활용
                            </li>
                            <li>개인정보 수집 항목<br/>
                                - 신청인의 이름, 연락처, 희망청
                            </li>
                            <li>개인정보 이용기간 및 보유기간<br/>
                                - 본 수집, 활용목적 달성 후 바로 파기
                            </li>
                            <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br/>
                                - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                            </li>
                        </ul>
                    </div>
                </div>
                <p class="accept">
                    <input type="checkbox" name="is_chk" id="is_chk" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                </p>
                <div class="btn NSK-Black">
                    <a onclick="javascript:fn_submit();">
                        3월 봉투 모의고사 이벤트 참여 >
                    </a>
                </div>
            </div>
        </div>
    </div> 

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/02/2535m_03.jpg" alt="단계별 포인트"/>
        <div>
            <table cellspacing="0" cellpadding="0">
                <colgroup>
                    <col width="16.666%">
                    <col width="16.666%">
                    <col width="16.666%">
                    <col width="16.666%">
                    <col width="16.666%">
                    <col>
                </colgroup>
            <tbody>                                                                                                                                                                  <tr>
                    <td>3/1(화)</td>
                    <td>3/2(수)</td>
                    <td>3/3(목)</td>
                    <td>3/4(금)</td>
                    <td>3/5(토)</td>
                    <td>3/6(일)</td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <span><img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img02.png" alt="마감"></span>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>3/7(월)</td>
                    <td>3/7(화)</td>
                    <td>3/8(수)</td>
                    <td>3/10(목)</td>
                    <td>3/11(금)</td>
                    <td>3/12(토)</td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_img01.png" alt="">
                        </div>
                    </td>
                </tr>                                                                                                                                
                                                    
                </tbody>
            </table>
        </div>
        <div class="btn">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2022/02/2535_03_btn.png"  alt="이벤트신청"/></a>
        </div>
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/02/2535m_04.jpg"  alt="문제풀이 풀패키지"/>
        <a href="https://police.willbes.net/m/lecture/show/cate/3001/pattern/free/prod-code/191442" target="_blank" title="경찰학 숫자특강" style="position: absolute; left: 4.31%; top: 39.19%; width: 28.89%; height: 4.52%; z-index: 2;"></a>
        <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2525" target="_blank" title="빅매치2" style="position: absolute; left: 30%; top: 87.73%; width: 40.28%; height: 4.52%; z-index: 2;"></a>
    </div>

    <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">유의사항</h4>
            <div class="infoTit"><strong>봉투모의고사 구성안내(자료)</strong></div>
            <ul>
                <li>봉투 모의고사 구성은 형사법,경찰학,헌법 으로 구성되어있습니다.<br>
                    과목별 3회분 봉투모의고사 및 OMR카드 프린트 출력(2회제한)으로 제공됩니다. (강의X)</li>
                <li>이벤트 상품은 비매품으로 자료는 절대 판매할수 없습니다.</li>
            </ul>

            <div class="infoTit"><strong>봉투모의고사 이벤트 신청안내</strong></div>
            <ul>
                <li>신청기간 : 2022년 3월 1일~3월 12일까지 ,매일 20시부터 선착순 200명(주말제외)</li>
                <li>3/1 ~ 3/6  매일 20시 <strong>1회차</strong> 봉투 선착순 당첨자 제공</li>
                <li>3/7 ~ 3/12 매일 20시 <strong>2회차</strong> 봉투 선착순 당첨자 제공 </li>
            </ul>

            <div class="infoTit"><strong>신청방법</strong></div>
            <ul>
                <li>로그인 이후 이벤트 페이지에서 신청가능합니다(희망응시청 필수 체크)</li>
                <li>한ID 당 매일 1회  , 총 12번 신청하기 가능(1회,2회 당첨시 중복참여불가) </li>
                <li>당첨시 로그인 > 내강의실 > 관리자 부여강좌 >단과확인 </li>
            </ul>

            <div class="infoTit"><strong>이벤트 봉투모의고사</strong></div>
            <div>
                - 무료이벤트  진행 : 매일 19시 선착순 200권 , 단 10일, 총 2,000명 </br>
                - 자료파일로 제공하며 2회 출력제한이 있습니다.</br>
                - 봉투모의고사 문제및 해설의 소유권 및 판권은㈜윌비스 신광은경찰학원에 있습니다.</br>
                - 무단복사 및 판매시 저작권법에 의거 경고조치 없이 고발하여 민.형사상 책임을 지게 됩니다.
        </div>
    </div>
</div>		

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $(document).ready(function() {
        AOS.init();
    });
</script>

<!-- End Container -->
<script type="text/javascript">
    function go_PassLecture(code) {
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }
        var url = '{{ front_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
        location.href = url;
    }

    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
    });
</script> 

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop