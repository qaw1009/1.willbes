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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000} */

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2588_top_bg.jpg) no-repeat center top;}
        
        .evt01 {background:#ffc000;padding-bottom:100px;}
        .evt01 .btn {clear:both; width:550px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:25px; color:#000; background:#fff; padding:20px 0; margin-top:50px; border-radius:50px}
        .evt01 .btn a:hover {color:#fff;background:#34B696;}

        .evt02 {background:#f0f0f0;}
      
        .evt03 {background:#212121;padding-bottom:100px;}
        .evt03 span {font-size:35px;border-bottom:3px solid #000;}

        /* 탭 */
        .evtTab {width:980px; margin:0 auto}
        .evtTab li {display:inline; float:left; width:50%;line-height:1.25;}
        .evtTab li a {display:block; color:#000;background:#828282;font-size:25px; padding:20px 0;font-weight:bold}
        .evtTab li:first-child a {border-right:0}
        .evtTab li:last-child a {border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {background:#ffde00;color:#000;}
        .evtTab:after {content:''; display:block; clear:both}

        .evt03_apply {background:#212121;padding-bottom:50px;}

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#fff; color:#363636; line-height:1.5;background:#f9f9f9;}
        .guide_box{width:1000px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box h3 {font-size:25px; margin-bottom:30px;}
        .guide_box h4 {font-size:20px; margin-bottom:30px;}       
        .guide_box dt{margin-bottom:10px;display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:25px;}
        .guide_box dl{color:#555;font-size:15px;}
        .guide_box dd li{margin-bottom:5px; list-style:none; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box span {color: #6336c7; vertical-align:top}
        .guide_box dd:last-child {margin:0}
        .guide_box div {font-size:16px; margin-top:20px}

        /************************************************************/
        
    </style>
    
	<div class="evtContent NGR">

		<div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2588_top.jpg" alt="예비순환" />            
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2588_01.jpg" alt="후기" />
            <div class="btn NGEB">
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" title="확인하기" target="_blank">더 많은 합격수기 확인하기 ></a>
            </div>
        </div>
        
        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2588_02.jpg" alt="커리큘럼" />
        </div>
        
        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2588_03.jpg" alt="수강신청" />
            <ul class="evtTab">
                <li><a href="#tab01"><span>오프라인</span> 수강 상품 보기<br> 학원종합반 & 온라인관리반 </a></li>
                <li><a href="#tab02"><span>온라인</span> 수강 상품 보기<br> 동영상패키지 & 동영상단과 </a></li>
            </ul>
            <div id="tab01">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2588_03_01.jpg" alt="오프라인" />
                    <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" title="학원종합반" target="_blank" style="position: absolute;left: 63.91%;top: 24.62%;width: 18.01%;height: 6.55%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" title="자세히 알아보기" target="_blank" style="position: absolute;left: 65.41%;top: 53.62%;width: 20.01%;height: 9.55%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" title="온라인관리반" target="_blank" style="position: absolute;left: 63.91%;top: 67.62%;width: 18.01%;height: 6.55%;z-index: 2;"></a>
                </div> 
            </div>
            <div id="tab02">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2588_03_02.jpg" alt="온라인" />
                    <a href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/192579" title="동영상 패키지" target="_blank" style="position: absolute;left: 63.91%;top: 9.82%;width: 18.01%;height: 2.75%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/194642" title="김동진" target="_blank" style="position: absolute;left: 69.41%;top: 31.27;top: 30.97%;width: 18.01%;height: 2.79%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/192576" title="박초롱" target="_blank" style="position: absolute;left: 69.41%;top: 31.27;top: 39.67%;width: 18.01%;height: 2.79%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/192571" title="이덕훈" target="_blank" style="position: absolute;left: 69.41%;top: 31.27;top: 48.47%;width: 18.01%;height: 2.79%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/192577" title="임진석" target="_blank" style="position: absolute;left: 69.41%;top: 31.27;top: 57.17%;width: 18.01%;height: 2.79%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/192572" title="문형석" target="_blank" style="position: absolute;left: 69.41%;top: 31.27;top: 65.97%;width: 18.01%;height: 2.79%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/192575" title="이국령" target="_blank" style="position: absolute;left: 69.41%;top: 31.27;top: 74.67%;width: 18.01%;height: 2.79%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/192574" title="유안석" target="_blank" style="position: absolute;left: 69.41%;top: 31.27;top: 83.47%;width: 18.01%;height: 2.79%;z-index: 2;"></a>
                    <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/192578" title="박재현" target="_blank" style="position: absolute;left: 69.41%;top: 31.27;top: 92.17%;width: 18.01%;height: 2.79%;z-index: 2;"></a>
                </div>
            </div>
        </div>       
              
        <div class="evtCtnsBox evtInfo" data-aos="fade-up">

            <div class="guide_box">
                <h2 class="NSK-Black">이용안내</h2>
                <h3 class="NSK-Black">&lt;오프라인 상품&gt;</h2>
                <h4 class="NSK-Black">1. 2023대비 예비순환 학원 종합반</h4>
                <dl>
                    <dt>(1)상품구성</dt>
                    <dd>
                        <ol>
                            <li>- 학원종합반 상품은 윌비스 김동진법원팀 노량진학원에 등원하여 실강 강의를 수강하고, 출결 및 학습관리/
                            상담 등을 대면하여 받을 수 있습니다.</li>
                            <li>- 학원종합반 등록 시 예비순환에 강의용 교재를 저자 구매 제공으로 무료제공해드립니다.</li>
                            <li>- 2023대비 김동진법원팀 전용 W플래너를 무료로 제공해드립니다.</li>
                            <li>- 실강 강의 종료 후 전용자습실을 제공하며, 1인 1개의 개인사물함을 무료로 제공해드립니다.</li>
                            <li>- 실강으로 수강한 강의를 복습동영상으로 신청하는 경우 상담을 거쳐 무제한 제공해드립니다.</li>
                        </ol>
                    </dd>

                    <dt>(2)수강기간</dt>
                    <dd>
                        <ol>
                            <li>- 2022년 5월 2일(월)부터 7월 2일(토)까지 실강이 진행됩니다.</li>
                        </ol>
                    </dd>

                    <dt>(3)교재 및 자료 관련</dt>
                    <dd>
                        <ol>
                            <li>- 모든 교재는 무료로 제공해드립니다.(저자구매제공)</li>
                            <li>- 모든 강의자료는 학원에서 강의 진행 전 배부해드립니다.</li>
                        </ol>
                    </dd>

                    <dt>(4)환불 관련</dt>
                    <dd>
                        <ol>
                            <li>- 환불은 학원설립 및 과외교습에 관한 법률의 규정에 따라 진행된 강의에 해당하는 수강료를 공제합니다.</li>
                            <li>- 1개월 강의료 기준으로 강의시작 후 1/3 진행 전에는 1/3을 공제하고, 1/3~1/2 진행 시에는 1/2을 공제, ½이상 진행 시 전액을 공제합니다.</li>
                            <li>- 중도 환불 시 무료로 제공된 교재 및 W플래너 구매비용이 추가로 공제될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>(5)유의사항</dt>
                    <dd>
                        <ol>
                            <li>- 학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>- 복습동영상 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                        </ol>
                    </dd>
                    <div class="NSK-Black">※ 이용문의 : 김동진법원팀 노량진학원 1544-0330(2번 연결)</div>
                </dl>               
                <h4 class="NSK-Black mt50">2. 2023대비 예비순환 온라인관리반</h4>
                <dl>
                    <dt>(1)상품구성</dt>
                    <dd>
                        <ol>
                           <li>- 온라인관리반 상품은 윌비스 김동진법원팀의 예비순환 온라인 동영상 강의를 수강하고, 매주 월~토 기간동안
                            오픈채팅을 통한 출석체크와 학습내역 확인을 통한 학습관리, 그리고 전화 또는 방문상담을 제공해드립니다.</li>
                            <li>- 수강기간 내 예비순환 온라인 동영상 강의는 무제한 수강이 가능합니다.</li>
                            <li>- 온라인관리반 등록 시 예비순환에 강의용 교재를 저자 구매 제공으로 무료제공해드립니다.</li>
                            <li>- 2023대비 김동진법원팀 전용 W플래너를 무료로 제공해드립니다.</li>
                        </ol>
                    </dd>

                    <dt>(2)수강기간</dt>
                    <dd>
                        <ol>
                            <li>- 2022년 5월 3일(화)부터 동영상 강의가 업로드 되며, 마지막 업로드 예정일인 7월 3일(일) 이후 7월 10일(일)까지 
                            무제한 수강하실 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>(3) 동영상 수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>- ① 홈페이지 [내강의실] 메뉴에서 [온라인강좌] > [수강중강좌] > [관리자부여강좌(복습동영상)]로 접속합니다.<br>
                            &nbsp;&nbsp;② 접속 후 구매하신 패키지 상품명 옆의 [강좌추가]를 선택합니다.③ 원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                            <li>- 수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC & 모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>- PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>(4)교재 및 자료 관련</dt>
                    <dd>
                        <ol>
                            <li>- 모든 교재는 무료로 제공해드립니다.(저자구매제공) 단, 배송비가 부과될 수 있습니다.</li>
                            <li>- 강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                        </ol>
                    </dd>

                    <dt>(5)환불 관련</dt>
                    <dd>
                        <ol>
                            <li>- 결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불 대상이 됩니다.</li>
                            <li>- 자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li> - 본 상품은 할인가가 적용된 특별기획 상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>(6)유의사항</dt>
                    <dd>
                        <ol>
                            <li>- 본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>- 학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>- 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                        </ol>
                    </dd>
                    <div class="NSK-Black">※ 이용문의 : 고객만족센터 1544-5006</div>
                </dl>
                <h3 class="NSK-Black mt50">&lt;온라인  상품&gt;</h2>
                <h4 class="NSK-Black">1. 2023대비 예비순환 패키지</h4>
                <dl>
                    <dt>(1)상품구성</dt>
                    <dd>
                        <ol>
                            <li>- 패키지 상품은 윌비스 김동진법원팀 교수진의 지정된 예비순환 과정을 기간 내 배수 제한 없이 무제한 수강 가능합니다.</li>
                            <li>- 민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 영어(박초롱), 한국사(임진석), 국어(박재현) 교수별 예비순환 과정</li>
                            <li>※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>(2)수강기간</dt>
                    <dd>
                        <ol>
                            <li>- 수강시작일로부터 120일동안 제공되며, 수강을 시작하는 즉시 수강 가능한 강의가 제공됩니다.</li>
                            <li>- 2023 예비순환 강의는 2022년 5월 2일부터 진행되므로 5월 3일부터 순차적으로 업로드될 예정입니다.</li>               
                        </ol>
                    </dd>
                    
                    <dt>(3) 동영상 수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>- ① 홈페이지 [내강의실] 메뉴에서 [온라인강좌] > [수강중강좌] > [패키지강좌]로 접속합니다.<br>
                            &nbsp;&nbsp;② 접속 후 구매하신 패키지 상품명 옆의 [강좌추가]를 선택합니다.<br>
                            &nbsp;&nbsp;③ 원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                            <li>- 수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC & 모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>- PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>                
                        </ol>
                    </dd>

                    <dt>(4)교재 및 자료 관련</dt>
                    <dd>
                        <ol>
                            <li>- 모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>- 민법 강의 중 기본강의 교재는 2021년 기본서로 진행됩니다. 7월 중 2022년 개정판이 출간되며, 8월 기본강의는 개정판으로 진행됩니다.</li>
                            <li>- 강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                        </ol>
                    </dd>

                    <dt>(5)환불 관련</dt>
                    <dd>
                        <ol>
                            <li>- 결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                            <li>- 자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li>- 본 상품은 할인가가 적용된 특별기획 상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>
                        </ol>
                    </dd>                   
                    
                    <dt>(6)유의사항</dt>
                    <dd>
                        <ol>
                            <li>- 본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>- 학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>- 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                        </ol>
                    </dd>
                    <div class="NSK-Black">※ 이용문의 : 고객만족센터 1544-5006</div>
                </dl>
                <h4 class="NSK-Black mt50">2. 2023대비 예비순환 단과</h4>
                <dl>
                    <dt>(1)상품구성</dt>
                    <dd>
                        <ol>
                            <li>- 단과 상품은 구매하신 교수의 단과과목을 지정된 기간 내 2배수 제한으로 수강 가능합니다. 개별수강기간은 각 과목별 구매페이지에서 확인하실 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>(2)수강기간</dt>
                    <dd>
                        <ol>
                            <li>- 구매하신 단과 과목의 개별 수강기간은 각 과목별 구매페이지에서 확인하실 수 있습니다. 일부 과목의 경우 구매시기에 따라 수강기간이 차이가 날 수 있습니다.</li>
                            <li>- 단과 과목별 개강시기는 민법 5/2(월), 헌법 5/4(수), 한국사 5/3(화), 형법 5/7(토), 영어 5/3(화), 민소법 6/6(월), 형소법 6/13(월), 국어 6/23(목)이며, 특별한 사정이 없는 한 개강 다음날부터 업로드 될 예정입니다.</li>
                        </ol>
                    </dd>

                    <dt>(3) 동영상 수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>- 홈페이지 [내강의실] 메뉴에서 [온라인강좌] > [수강중강좌] > [단과강좌]로 접속하여 수강합니다.</li>
                            <li>- 수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC & 모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>- PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후
                                단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>(4)교재 및 자료 관련</dt>
                    <dd>
                        <ol>
                            <li>- 모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>- 민법 강의 중 기본강의 교재는 2021년 기본서로 진행됩니다. 7월 중 2022년 개정판이 출간되며, 8월 기본강의는 개정판으로 진행됩니다.</li>
                            <li>- 강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                        </ol>
                    </dd>

                    <dt>(5)환불 관련</dt>
                    <dd>
                        <ol>
                            <li>- 결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불 대상이 됩니다.</li>
                            <li>- 자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li> - 본 상품은 할인가가 적용된 특별기획 상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>(6)유의사항</dt>
                    <dd>
                        <ol>
                            <li>- 본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>- 학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>- 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>                     
                        </ol>
                    </dd>
                    <div class="NSK-Black">※ 이용문의 : 고객만족센터 1544-5006</div>
                </dl>
                
            </div>
        </div>

    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        AOS.init();
      });
    </script>

    <script type="text/javascript">
      
         /*탭*/
         $(document).ready(function(){
            $('.evtTab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).hide()
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
        });        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop