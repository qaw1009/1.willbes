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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .sky {position:fixed; width:160px; top:200px;right:10px;z-index:1;}
        .sky a {display:block; margin-bottom:10px}
        
        .evt00 {background:#0a0a0a}

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2021/03/2112_top_bg.jpg") no-repeat center top;} 

        .evt02 {background:#013b72;}   

        .evt03 {background:#fff;padding:100px 0;}
        .lecbuybtn {width:935px; margin:50px auto}
        .lecbuybtn a {display:block; padding:20px 0; text-align:center; color:#fff; background:#000; font-size:30px; font-weight:600; border-radius:60px}

        .evt03 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; text-align:left; letter-spacing:-1px;}
        .evt03 .check a {display:inline-block; padding:15px; color:#fff; background:#000; margin-left:300px; border-radius:30px; font-size:15px}
        .evt03 .check p {font-size:14px; padding:25px 0 0 165px; line-height:1.4}

        .evt04 {background:#f8f8f8; padding-bottom:80px}

        .evt05 {background:#1a1a1a;}

        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1000px; margin:0 auto; padding:100px 0; font-size:14px}
        .content_guide_wrap .guide_tit{margin-bottom:50px; text-align:left; font-size:30px;}

        .content_guide_wrap .tabs {width:1000px; margin:0 auto;} 
        .content_guide_wrap .tabs li {display:inline; float:left; width:50%}
        .content_guide_wrap .tabs li a {display:block; text-align:center; height:60px; line-height:60px; font-size:140% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap .tabs li a:hover,
        .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap .tabs:after {content:""; display:block; clear:both}
        .content_guide_box {width:1000px; margin:0 auto; border:2px solid #202020; border-top:0; padding-top:30px}
        .content_guide_box dl{margin:0 20px; word-break:keep-all; padding:30px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; margin-right:10px; font-size:120%}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px; line-height:1.5}
        .content_guide_box dd:after {content:""; display:block; clear:both}

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday div {font-size:22pt;color:#000; margin-top:10px;}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%}
        .newTopDday ul li:first-child span {font-size:12px; color:#999; margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul li:last-child span {display:block; margin-top:10px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            background-color: #fff;
        }
        .b-close {
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" id="chk_price" name="chk_price" value="0"/>
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">        

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>윌비스 신광은 경찰 2021~22대비</span>
                        <div class="NSK-Black">0원 PASS {{$arr_promotion_params['turn']}}기</div>
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
                        <a href="#pass" target="_self">수강하기 &gt;</a>
                        <span class="NSK-Black">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} {{ $arr_promotion_params['etime'] or '' }} 마감!</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evtTop" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_top.jpg" alt="스파르타 온라인 패스 관리반" />               
        </div>

        <div class="evtCtnsBox evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_01.jpg" alt="지금 당장 필요한건?" />               
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_02.jpg" alt="스페셜 혜택" />               
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2112_03_01.jpg"  alt="신광은경찰PASS">             
        </div>

        <div class="evtCtnsBox evt03" id="pass"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2112_03_03.jpg"  alt="온라인 PASS 바로가기" usemap="#Map2112_pass" border="0">
            <div class="lecbuybtn"><a href="https://willbesedu.willbes.net/pass/offLecture/index?cate_code=3125&course_idx=1404&subject_idx=2159" target="_blank">온라인 pass 바로가기 ></a></div> 

            {{--
            <div class="check">                    
                <a href="javascript:goDesc('tab1')">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 0원 패스의 수강기간 갱신 및 환급이 불가합니다.<br />
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br/>
                    ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.<br />
                    ※ 재수강 & 환승쿠폰은 0원 무제한 패스에는 적용되지 않습니다.
                </p>
            </div>
            --}}

        </div>  

        {{--
        <div class="evtCtnsBox evt01_04" id="coupon_box">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_04.jpg" alt="쿠폰 받기" />
                <a href="javascript:void(0);" title="쿠폰받기" onclick="giveCheck();" style="position: absolute; left: 39.59%; top: 78.87%; width: 20.82%; height: 5.8%; z-index: 2;"></a>
            </div>
        </div>     
        --}}  

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_05.jpg"  alt="최정예 교수진" />
        </div>

        <div class="content_guide_wrap" id="tab">
            <p class="guide_tit">윌비스 <span class="NSK-Black tx-blue">신광은 경찰 PASS </span> 이용안내 </p>
            <ul class="tabs">
                <li><a href="#tab1">22년 2차 PASS</a></li>
                <li><a href="#tab2">22년 1차 PASS</a></li>
            </ul>

            <div class="content_guide_box" id="tab1">
                <dl>
                    <dt>
                        <h3>22년 2차PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 2022년 8월 31일 까지만  들을수 있는 기간제 PASS입니다.</li>
                            <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022년 대비 형사법, 경찰학, 헌법 전 강좌<br>
                                - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>
                                - 해당 상품은 일반공채 대비 상품으로 범죄학은 수강 불가합니다.<br>
                                <div class="tx-blue">
                                    *형사소송법/형사법 : 신광은 교수님<br>
                                    *경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                                    *형법 : 김원욱 교수님 / 신광은 교수님<br>
                                    *헌법 : 김원욱 교수님 / 이국령 교수님<br>
                                    *G-TELP : 김준기 교수님<br>
                                    *한능검 : 오태진 교수님<br>
                                    *실용글쓰기 : 박우찬 교수님
                                </div>
                            </li>
                            <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                            <li>포인트가 포함된 상품을 구매할 경우 익일 오전 일괄 지급됩니다. (금요일~일요일 구매 시 월요일 오전 일괄지급)</li>
                            <li>포인트는 구매일로부터 1년 동안 사용 가능하며, 1년이 지날 경우 자동 소멸됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>최종합격시 환급안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>환급 시 상품 결제 금액에서 지급된 혜택만큼 차감 후 환급됩니다. (제세공과금 22% 제외)<br>
                                ※ 지급된 혜택(포인트 등)을 사용하지 않았어도 지급된 만큼 차감 후 환급금 책정</li>
                            <li>수강기간 내에 진행된 순경 공채 시험 최종합격 및 인증자료를 제출하여야 환급금 지급 대상이 됩니다.<br>
                                ※ 환급 가능 직렬 : 일반공채, 101경비단, 전의경 경채, 경찰행정 경채</li>
                            <li>환급 신청은 합격한 시험의 최종합격자 발표일로부터 1개월 이내에만 가능합니다.<br>
                            패스 수강 기간 내에 합격예측 서비스 1회 이상 참여 해주셔야합니다.<br>
                            (해당 서비스는 시즌성 이벤트로 일정 기간이 지나면 확인 불가하니, 참여 후 캡쳐해서 추후 증빙자료로 제출하셔야합니다.)<br>
                            패스 수강기간 내에 모든 전국 모의고사 및 빅매치 모의고사를 모두 응시하여야 합니다.<br>
                            (온/오프 무관하며, 추후 응시내역 파일첨부 제출해 주셔야 합니다.)<br>
                            환급 신청 기간 내에 최종 합격 인증 자료 및 신청 서류 제출이 완료된 회원에게 환급 가능합니다.<br>
                            - 제출 서류 (모든 제출 서류는 반드시 윌비스 신광은 경찰 아이디 수강생 본인 명의이여야 합니다.)<br>
                            ① 응시표 사본 : 응시번호 기재 필수, 응시원서/응시접수증/응시표출력 전체화면 등 대체 가능<br>
                            ② 최종 합격증명서 : 최종 합격 확인 증명 가능한 관련 사이트 전체 화면 캡쳐본 등 대체 가능<br>
                            ③ 신분증 사본 : 제세공과금 세무 증빙을 위해 주민등록번호 앞/뒷자리 전체가 보여야 함<br>
                            ④ 통장사본 : 수강료 환급 받을 수강생 본인 명의 통장<br>
                            ⑤ 합격수기 : 공지 글 내 첨부된 파일을 다운 후 양식에 맞추어 작성 후 첨부 (한글 또는 워드 파일)<br>
                            ⑥ 개인정보 수집 및 활용 동의서 : 공지 글 내 첨부된 파일을 프린트하여 자필 서명 후 사진 또는 스캔하여 이미지 첨부<br>
                            ⑦ 윌비스 신광은 경찰 합격예측서비스 & 모의고사 내역 : 시험 후 오픈되는 합격예측서비스 참여 인증 캡쳐 및 윌비스신광은경찰 모의고사 전체 응시 내역<br>
                            * 전국모의고사 및 빅매치 모의고사 중 온라인 경행경채 직렬이 없다면 온라인 일반경찰로 응시를 꼭 하시기 바랍니다.<br>
                            (* 학원 모의고사에 따라 진행)<br>
                            최종합격자 발표일로부터 1개월경과 후 요청 시에는 환급이 불가합니다.<br>
                            자세한 환급신청 방법은 공지사항에서 확인 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                            사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                            (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                            총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                                (단,이벤트시 쿠폰사용가능)</li>
                            <li>신광은 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                            이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                            <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

            <div class="content_guide_box" id="tab2">
                <dl>
                    <dt>
                        <h3>22년 1차 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 22년 1차 필기시험일까지 수강 가능합니다.(2022년 2월 28일)</li>
                            <li>
                                본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022년 대비 형사법, 경찰학개론, 헌법 전 강좌<br>
                                - 해당 상품은 일반공채 대비 상품으로 범죄학은 수강 불가합니다.
                                <div class="tx-blue">
                                    * 형사법 : 신광은 교수님<br>
                                    * 경찰학(개편) : 장정훈 교수님<br>
                                    * 헌법 : 김원욱 교수님 / 이국령 교수님
                                </div>
                            </li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 2배수 수강 할 수 있습니다.</li>
                            <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=250648" target="_blank" class="tx-blue">배수제한 공지 자세히 보기 ></a>)</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>  

                    <dt>
                        <h3>교재 및 포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다. </li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>최종합격시 환급안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>환급 시 상품 결제 금액의 50% 금액에서 지급된 혜택만큼 차감 후 환급됩니다. (제세공과금 22% 제외)<br>
                                ※ 지급된 혜택(포인트 등)을 사용하지 않았어도 지급된 만큼 차감 후 환급금 책정</li>
                            <li>수강기간 내에 진행된 순경 공채 시험 최종합격 및 인증자료를 제출하여야 환급금 지급 대상이 됩니다.<br>
                                ※ 환급 가능 직렬 : 일반공채, 101경비단, 전의경 경채, 경찰행정 경채</li>
                            <li>환급 신청은 합격한 시험의 최종합격자 발표일로부터 1개월 이내에만 가능합니다.(22년 1차 최종합격)<br>
                            패스 수강 기간 내에 합격예측 서비스 1회 이상 참여 해주셔야합니다.<br>
                            (해당 서비스는 시즌성 이벤트로 일정 기간이 지나면 확인 불가하니, 참여 후 캡쳐해서 추후 증빙자료로 제출하셔야합니다.)<br>
                            패스 수강기간 내에 모든 전국 모의고사 및 빅매치 모의고사를 모두 응시하여야 합니다.<br>
                            (온/오프 무관하며, 추후 응시내역 파일첨부 제출해 주셔야 합니다.)<br>
                            환급 신청 기간 내에 최종 합격 인증 자료 및 신청 서류 제출이 완료된 회원에게 환급 가능합니다.<br>
                            - 제출 서류 (모든 제출 서류는 반드시 윌비스 신광은 경찰 아이디 수강생 본인 명의이여야 합니다.)<br>
                            ① 응시표 사본 : 응시번호 기재 필수, 응시원서/응시접수증/응시표출력 전체화면 등 대체 가능<br>
                            ② 최종 합격증명서 : 최종 합격 확인 증명 가능한 관련 사이트 전체 화면 캡쳐본 등 대체 가능<br>
                            ③ 신분증 사본 : 제세공과금 세무 증빙을 위해 주민등록번호 앞/뒷자리 전체가 보여야 함<br>
                            ④ 통장사본 : 수강료 환급 받을 수강생 본인 명의 통장<br>
                            ⑤ 합격수기 : 공지 글 내 첨부된 파일을 다운 후 양식에 맞추어 작성 후 첨부 (한글 또는 워드 파일)<br>
                            ⑥ 개인정보 수집 및 활용 동의서 : 공지 글 내 첨부된 파일을 프린트하여 자필 서명 후 사진 또는 스캔하여 이미지 첨부<br>
                            ⑦ 윌비스 신광은 경찰 합격예측서비스 & 모의고사 내역 : 시험 후 오픈되는 합격예측서비스 참여 인증 캡쳐 및 윌비스신광은경찰 모의고사 전체 응시 내역<br>
                            * 전국모의고사 및 빅매치 모의고사 중 온라인 경행경채 직렬이 없다면 온라인 일반경찰로 응시를 꼭 하시기 바랍니다.<br>
                            (* 학원 모의고사에 따라 진행)<br>
                            최종합격자 발표일로부터 1개월경과 후 요청 시에는 환급이 불가합니다.<br>
                            자세한 환급신청 방법은 공지사항에서 확인 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                            사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                            총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.(재수강/환승 및 이벤트진행시 제외)</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>
        </div>
        <!-- content_guide_wrap //-->

    </div>
    <!-- End evtContainer -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        /*패스, 총 결제금액 */
        function fnChkPrice(obj,depth){
            var add_price = 0;
            var total_price;
            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            var order_yn = 'Y';

            switch (depth){
                case 1: // 무제한 pass, 12개월 pass
                    if($(obj).is(':checked') === true){
                        $("input[name='y_pkg']").prop("checked", false);
                        $(obj).prop("checked", true);
                        $('#chk_price').val($(obj).data('sale-price'));

                        $("#add_prod_wrap").removeClass('d_none');
                    }else{
                        $('#chk_price').val(0);
                        $("input[name='y_pkg']").prop("checked", false);
                    }
                    break;

                case 2: // 2021년대비 pass
                    if($(obj).is(':checked') === true){
                        $("input[name='y_pkg']").prop("checked", false);
                        $(obj).prop("checked", true);
                        $('#chk_price').val($(obj).data('sale-price'));

                        $("#add_prod_wrap").addClass('d_none');
                    }else{
                        $('#chk_price').val(0);
                    }
                    break;

                case 3: // 한정판매
                    if($(obj).is(':checked') === true){
                        if(order_cnt === 0 && $("#y_pkg1").is(':checked') === false && $("#y_pkg2").is(':checked') === false){
                            order_yn = 'N';
                        }else{
                            add_price = $(obj).data('sale-price');
                        }
                    }
                    break;

                default: break;
            }

            if(order_yn === 'N'){
                $("#y_pkg4").prop("checked", false);
                alert('0원 무제한 PASS 또는 12개월 PASS 상품을 구매하셔야 합니다.');
            }else{
                total_price = parseInt($('#chk_price').val()) + parseInt(add_price);
                $("#total_price").html(addComma(total_price));
            }
        }

        /*쿠폰발급-*/
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if(empty($arr_promotion_params) === false)

            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';

            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                }
            }, showValidateError, null, false, 'alert');
            @endif
        }
        
        /*tab*/
        $(document).ready(function(){
            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".content_guide_box").hide();
                $(activeTab).fadeIn();
                return false;
            });

            var url = window.location.href;
            if(url.indexOf("tab3") > -1){
                var activeTab = "#tab3";
                $(".tabsl li a").removeClass("active");
                $(".tabs li a[href='#tab3']").addClass("active");
                $(".tabContents").hide();
                $(activeTab).show();
                return false;
            }else{
                $(".tabs li a").removeClass("active");
                $(".tabs li a[href='#tab1']").addClass("active");
                $(".content_guide_box").hide();
                $(".content_guide_box:first").show();
            }
        });

        function goDesc(tab){
            location.href = '#tab';
            var activeTab = "#"+tab;
            $(".tabs li a").removeClass("active");
            $(".tabs li a[href='#"+tab+"']").addClass("active");
            $(".content_guide_box").hide();
            $(activeTab).show();
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });


    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-69505110-4');
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop