@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:150px; right:10px;z-index:1;}
        .sky a {display:block; margin-bottom:10px;}
        
        .wb_tops {background:url(https://static.willbes.net/public/images/promotion/2021/09/1983_tops_bg.jpg) no-repeat center top;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/1983_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#fff;}       

        .wb_cts02 {background:#f4f4f4; position:relative}
        .wb_cts02 .tImg {position:absolute; top:390px; left:50%; margin-left:-415px; padding:0 18px}
        .wb_cts02 .tImg img {margin-right:10px; width:264px;height:153px;}

        .wb_cts03 {background:#fff}

        .wb_cts04 {background:#6324ae}

        .wb_cts05 {background:#f4f4f4; padding-bottom:150px}
        .wb_cts05 a {display:block; color:#fff; text-align:center;}        
        .wb_cts05 .linkbtn01 {display:block;width:434px; margin:50px auto 0; }
        .wb_cts05 .linkbtn01 a {background:#010f1a; font-size:23px; padding:20px 0; border-radius:30px }
        .wb_cts05 .linkbtn02 {display:block;width:150px; margin:30px auto 0; }
        .wb_cts05 .linkbtn02 a {padding:10px 0; border:2px solid #959595; color:#333; font-size:14px; font-weight:bold}

        .wb_cts06 {padding-bottom:50px;}
        .wb_cts06 table {width:860px; margin:25px auto 50px; border-top:1px solid #828282}
        .wb_cts06 table th,
        .wb_cts06 table td {font-size:14px; padding:20px; text-align:center; line-height:1.5; border-right:1px solid #828282;position:relative;}
        .wb_cts06 table th:last-child,
        .wb_cts06 table td:last-child {border-right:0}
        .wb_cts06 table tr {border-bottom:1px solid #828282}
        .wb_cts06 table thead th { font-size:18px; font-weight:bold; background:#ececf3}
        .wb_cts06 table thead th strong {color:#5914a7}
        .wb_cts06 table tbody th {font-weight:bold;}
        .wb_cts06 table td.bg {background:#ececf3}
        .wb_cts06 table td span.point {color:#fff; padding:2px 6px; background:red; font-size:11px; border-radius:4px; margin-left:5px}
        .wb_cts06 table td input {height:24px; width:24px; vertical-align:middle}
        .wb_cts06 table td label {font-size:30px; color:#5914a7; font-weight:bold; margin-left:10px}
        .wb_cts06 table td p {font-size:22px;color:#464646;text-decoration:line-through;}

        .wb_cts07 {background:#ededed}

         /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#e4e4e4; width:100%; padding:15px 0 40px}
        .newTopDday ul {width:1120px; margin:0 auto;}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-size:28px; height:60px; line-height:60px; padding-top:10px !important; font-weight:bold; color:#000}
        .newTopDday ul li strong {line-height:60px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; font-size:16px; color:#666; line-height:1.3; }
        .newTopDday ul li:first-child span { font-size:28px; color:#000; }
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:60px}
        .newTopDday ul:after {content:""; display:block; clear:both}  
        
        /*수강신청 체크*/
        .check p {margin-bottom:50px;padding-top:50px;}
        .check p a {display:block; width:525px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#5914a7; text-align:center; border-radius:90px;}
        .check p a:hover {background:#000;}
        .check label {cursor:pointer;color:#000;font-weight:bold;font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#5914a7}   

        /* 이용안내 */
        .wb_info {padding:100px 0; background:#f4f4f4}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 40px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday NG">        
            <div>
                <ul>
                    <li>
                        세무직 PASS - {{$arr_promotion_params['turn']}}기<br />
                        <span class="NGEB">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 마감!</span>
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다
                    </li>
                </ul>
            </div>
        </div>

        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1531" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/11/1983_sky01.png"  title="" /></a>
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2021/12/2160_sky01.png"  title="12월의기적" /></a>
        </div>      

        <div class="evtCtnsBox wb_tops" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/1983_tops.jpg" alt="독점공개" />
                <a href="https://pass.willbes.net/lecture/show/cate/3022/pattern/only/prod-code/184117" title="이윤호 회계학" target="_blank" style="position: absolute;left: 0;top: 16.97%;width: 49.5%;height: 29.19%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3022/pattern/only/prod-code/184118" title="박창한 세법" target="_blank" style="position: absolute;left: 50%;top: 16.97%;width: 49.5%;height: 29.19%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/1983_top.jpg" alt="세무직 패스"  />
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1983_01.jpg" alt="전격출시"  />
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1983_02.jpg" alt="라이브로 만나다" />
            <div class="tImg">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1982_02_01.gif" alt="강의1" />
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1982_02_02.gif" alt="강의2" />
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1982_02_04.gif" alt="강의4" />
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1983_03.jpg" alt="교수진" />
        </div>

        <div class="evtCtnsBox wb_cts04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1983_04.jpg" alt="커리큘럼" />
        </div>
{{--
        <div class="evtCtnsBox wb_cts05" id="evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/1983_05.jpg" alt="커리큘럼" />
            <div class="linkbtn01 NGEB"><a href="javascript:certOpen();">재도전 & 환승 인증하기 →</a></div>
            <div class="linkbtn02"><a href="#tip">유의사항 확인하기 →</a></div>
        </div>
--}}

        <div class="evtCtnsBox wb_cts06" id="apply" data-aos="fade-up">   
            <img src="https://static.willbes.net/public/images/promotion/2021/12/1983_06.jpg" title="수강신청" /><br>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/1983_06_apply.png" title="신청하기" />
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1531" target=_blank title="신청하기" style="position: absolute;left: 43.93%;top: 60.11%;width: 41.7%;height: 19.68%;z-index: 2;"></a>
            </div>
            <table>
                <col />
                <col width="40%" />
                <col width="40%" />
                <thead>
                    <tr>
                        <th>구분</th>
                        <th>윌비스 세무직 <strong>PASS</strong></th>
                        <th>윌비스 세무직 <strong>전공과목 T-PASS</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>과목/교수진</th>
                        <td>국어 <strong>오대혁</strong>, 영어 <strong>한덕현</strong>, 한국사 <strong>오태진/김상범</strong><br />
                        회계학 <strong>이윤호</strong>, 세법 <strong>박창한</strong></td>
                        <td>회계학 <strong>이윤호</strong>, 세법 <strong>박창한</strong></td>
                    </tr>
                    <tr>
                        <th>수강기간</th>
                        <td colspan="2">2022 지방직 시험일까지<br />
                        배수 제한 없는 <strong>무제한 수강</strong></td>
                    </tr>
                    <tr>
                        <th>기기대수</th>
                        <td colspan="2">PC or 모바일 <strong>총 2대지원</strong></td>
                    </tr>
                    <tr>
                        <th>혜택</th>
                        <td colspan="2" class="bg">
                        ① 윌비스 공무원학원 <strong>국어 / 영어 / 한국사 무편집 LIVE 강의 제공</strong><span class="point">LIVE</span><br />
                        ② 2022 대비 신규 진행<strong> ALL 과정 업데이트</strong><br />
                        ③ 직렬별 온라인 모의고사 진행 시 <strong>무료 제공</strong></td>
                    </tr>
                    <tr>
                        <th>정가</th>
                        <td class="NSK-Black">
                            <p>490,000원</p>
                        </td>
                        <td class="NSK-Black">
                            <p>450,000원</p>
                        </td>
                    </tr>
                    <tr>
                        <th>이벤트 가격</th>
                        <td class="NSK-Black">
                            <div><input type="radio" id="y_pkg1" name="y_pkg" value="176432" onClick=""/><label for="y_pkg1">340,000원</label></div>
                            <div class="tx-red">
                            12월의 기적, 12/22(수) 마감!<br>    
                            * 지금 구매 시 3만포인트 추가 제공!</div>
                        </td>
                        <td class="NSK-Black">
                            <input type="radio" id="y_pkg2" name="y_pkg" value="176415" onClick=""/><label for="y_pkg2">290,000원</label>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="check" id="chkInfo">               
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tip" class="infotxt" > 유의사항 자세히보기 ↓</a>
                <p class="NGEB"><a onclick="go_PassLecture(1);" target="_blank">지금 바로 신청하기 ></a></p>     
            </div>      
        </div>

        <div class="evtCtnsBox wb_cts07" id="apply2" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/1983_07.jpg" alt="신청하기" />
                <a href="https://pass.willbes.net/lecture/show/cate/3022/pattern/only/prod-code/184117" title="이윤호 회계학" target="_blank" style="position: absolute;left: 29.75%;top: 73.97%;width: 15.5%;height: 11.19%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3022/pattern/only/prod-code/184118" title="박창한 세법" target="_blank" style="position: absolute;left: 54.95%;top: 73.97%;width: 15.5%;height: 11.19%;z-index: 2;"></a>
            </div>   
        </div>

        <div class="evtCtnsBox wb_info" id="tip" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 세무직 PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 세무직 대비 과정으로, 참여 교수진의 전 강좌를 배수 제한없이 무제한으로 수강 가능합니다.<br>
                                영어 한덕현 [기본문법>제니스문법>기출리뷰>스나이퍼32>실전동형모의고사] 과정만 제공.
                            </li>
                            <li>수강 가능 교수진 : 국어 오대혁, 영어 한덕현, 한국사 김상범/오태진, 회계학 이윤호, 세법 박창한</li>
                            <li>2022년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
                            (일부 교수진의 경우, 신규 과정이 업데이트 되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 제공해드립니다.)</li>
                            <li>참여 교수진의 일정 및 진행 방식은 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.<br>
                            (과목별 교수진의 제공 과정은 수강신청 안내 화면을 참고해주시기 바랍니다.)</li>
                            <li>이벤트 해당 상품 (전과목PASS) 구매 시  지급되는 추가 포인트의 경우, 교재 구매 시 사용할 수 있으며 결제완료 후 익일 담당자 확인 후에 지급해드릴 예정입니다.</li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭,원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>본 PASS를 이용 중에는 일시 정지 기능을 사용할 수 없습니다.</li>
                            <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                            - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>                           
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                                · 전과목PASS (12월의 기적 이벤트 기간 내 구매) : 결제금액 - 지급된 수강지원포인트 - (강좌 정상가의 1일 이용대금*이용일수)<br>
                                · 문제풀이PASS : 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br>
                            </li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>
                        </ol>
                    </dd>
{{--
                    <dt>재도전&환승 인증 이벤트 유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 1아이디당 1회만 참여 가능합니다.</li>
                            <li>인증 완료 처리는 신청 후, 24시간 이내에 처리됩니다. 단, 주말 및 공휴일 인증 건의 경우 평일 오전 중으로 처리됩니다.<br>
                            1) 재도전 인증<br>
                                - 본인의 이름이 명시된 수험표 또는 윌비스 PASS 수강생의 경우 [내강의실] 페이지 내 이름과 PASS명이 명시된 이미지 캡쳐 후 업로드 시 인증 가능합니다.<br>
                            2) 환승 인증<br>
                                - 본인의 이름, 수강내역, 결제내역 등이 명확하게 기재된 수강증 등의 캡쳐를 통해서만 인증이 가능합니다.<br>
                            (결제내역을 통한 인증 시, 수강자 이름과 결제 금액, 강좌명이 필수로 기재되어 있어야 합니다.)</li>
                            <li>본 이벤트는 이벤트 참여자가 본인의 명의로 구매/응시한 내용에 한합니다.</li>
                            <li>등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
                            <li>발급된 쿠폰의 사용 기간은 3일로, 본 페이지 내에서 판매 중인 PASS 상품에만 적용 가능합니다.</li>
                        </ol>
                    </dd>
--}}
                    <dt>라이브모드 수강관련</dt>
                    <dd>
                        <ol>
                            <li>공무원학원 실강 내 LIVE로 진행되는 강좌만 제공됩니다. (* 일부 특강 제외)<br>
                            - 국어 오대혁, 영어 한덕현, 한국사 김상범</li>
                            <li>제공되는 강좌 및 진행일정은 우측 버튼 클릭 후 페이지 하단에서 확인 가능합니다.
                            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
                            <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
                            <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다. </li>
                        </ol>
                    </dd>                
                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>

    <script>   
    
        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            if(code == 1){
                code = $('input[name="y_pkg"]:checked').val();
                if (typeof code == 'undefined' || code == '') {
                    alert('강좌를 선택해 주세요.');
                    return;
                }
            }
            location.href = "{{ site_url('/periodPackage/show/cate/3022/pack/648001/prod-code/') }}" + code;
        }

        /* 팝업창 */ 
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop