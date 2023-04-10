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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/ 


        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/04/2948_top_bg.jpg) no-repeat center top;}
        .evtTop span.title {position:absolute; left:50%; top: 330px; width:691px; margin-left:-526px; -webkit-animation:upDown 1.5s infinite; letter-spacing:-1px; text-align:center; z-index: 2;}
        @@keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }
        @@-webkit-keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }
        .evtTop span.pro {position:absolute; left:50%; bottom:0; width:688px; margin-left:0; }

        .evt01 {background:#59d448; padding-bottom:150px}
        .evt01 .shinyBtn {width:600px; margin:auto;}
        .evt01 .shinyBtn a {background:#292733; color:#fff; border-radius:10px; font-size:30px; display:block; padding:20px; overflow: hidden; position:relative;}
        .evt01 .shinyBtn a:hover {background:#000;}
        .evt01 .shinyBtn a:after{
            content:'';
            position: absolute;
            top:0;
            left:0;
            background-color: #fff;
            width: 30px;
            height: 100%;
            z-index: 1;
            transform: skewY(129deg) skewX(-60deg);
        }
        .evt01 .shinyBtn a:after{animation:shinyBtn 2s ease-in-out infinite;}
        @@keyframes shinyBtn {
            0% {transform: scale(0) rotate(45deg); opacity: 0;}
            80% {transform: scale(0) rotate(45deg); opacity: 0.2;}
            81% {transform: scale(4) rotate(45deg); opacity: 0.5;}
            100% {transform: scale(60) rotate(45deg); opacity: 0;}
        }

        .evt02 {background:#f0f0f0; }
        .evt02 .lecBtns {position: absolute; top:1700px; width:878px; left:50%; margin-left:-439px; z-index: 2; display:flex; justify-content: space-between;}
        .evt02 .lecBtns a {line-height:1.5; background:#2f38ff; color:#fff; border-radius:10px; padding:10px; display: block; width:145px; margin:0 2px}
        .evt02 .lecBtns a:hover {background:#000;}

        .evt03 {background:#212121; padding-bottom:150px}
        .evt03 .tab {display:flex; justify-content: space-between; width:960px; margin:0 auto}
        .evt03 .tab a {display:block; width:100%; text-align:center; font-size:30px; font-weight:bold; background:#4b4747; color:#212121; padding:20px; margin-right:2px; line-height:1.4}
        .evt03 .tab a p {font-size:20px}
        .evt03 .tab a:hover,
        .evt03 .tab a.active {background:#59d448;}

        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:15px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:disc; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:14px}
        .guide_box span{color:red;}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}






        /************************************************************/

    </style>

    <div class="evtContent NSK" id="evtContainer">

		<div class="evtCtnsBox evtTop">           
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2948_top.jpg" alt="김동진 법원팀" />   
            <span class="title"><img src="https://static.willbes.net/public/images/promotion/2023/04/2948_top_img01.png" alt=""/></span>   
            <span class="pro" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2023/04/2948_top_img02.png" alt=""/></span>         
		</div>
        
        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2948_01.jpg" alt="" />
            <div class="shinyBtn NSK-Black">
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank">더 많은 합격수기 확인하기 ></a>
            </div>
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2948_02.jpg" alt=""/> 
                <div class="lecBtns">  
                    <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx=" target="_blank">[예비순환]<p>맛보기 강의 ></p></a>
                    <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" target="_blank">[1순환]<p>맛보기 강의 ></p></a> 
                    <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" target="_blank">[2순환]<p>맛보기 강의 ></p></a> 
                    <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" target="_blank">[3순환]<p>맛보기 강의 ></p></a> 
                    <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" target="_blank">[4순환]<p>맛보기 강의 ></p></a> 
                    <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" target="_blank">[5순환]<p>맛보기 강의 ></p></a>          
                </div>
            </div>
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2948_03_01.jpg" alt="" />
            <div class="tab">
                <a href="#tab01">
                    오프라인 수강 상품 보기
                    <p>학원종합반 & 온라인관리반</p>
                </a>
                <a href="#tab02">
                    온라인 수강 상품 보기
                    <p>동영상패키지 & 동영상단과</p>
                </a>
            </div>
            <div id="tab01" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2948_03_02.jpg" alt="">
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" style="position: absolute; left: 64.02%; top: 28.97%; width: 17.59%; height: 6.25%; z-index: 2;" title="학원종합반"></a>
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" target="_blank" style="position: absolute; left: 65.18%; top: 56.25%; width: 20.18%; height: 9.13%; z-index: 2;" title="온라인관리반이란?"></a>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" style="position: absolute; left: 63.84%; top: 69.44%; width: 17.77%; height: 6.25%; z-index: 2;" title="온라인관리반"></a>
            </div>
            <div id="tab02" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2948_03_03.jpg" alt="">
                <a href="https://pass.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/207017" target="_blank" style="position: absolute; left: 63.93%; top: 13.5%; width: 17.77%; height: 2.92%; z-index: 2;" title="온라인패키지"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/207018" target="_blank" style="position: absolute; left: 69.46%; top: 36.97%; width: 17.77%; height: 2.92%; z-index: 2;" title="민법 김동진"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/207023" target="_blank" style="position: absolute; left: 69.46%; top: 46.75%; width: 17.77%; height: 2.92%; z-index: 2;" title="영어 박초롱"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/207019" target="_blank" style="position: absolute; left: 69.46%; top: 56.54%; width: 17.77%; height: 2.92%; z-index: 2;" title="민소법 이덕훈"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/207024" target="_blank" style="position: absolute; left: 69.46%; top: 66.23%; width: 17.77%; height: 2.92%; z-index: 2;" title="한국사 임진석"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/207020" target="_blank" style="position: absolute; left: 69.46%; top: 76.02%; width: 17.77%; height: 2.92%; z-index: 2;" title="형법 문형석"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/207022" target="_blank" style="position: absolute; left: 69.46%; top: 85.76%; width: 17.77%; height: 2.92%; z-index: 2;" title="헌법 이국령"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/207021" target="_blank" style="position: absolute; left: 69.46%; top: 95.41%; width: 17.77%; height: 2.92%; z-index: 2;" title="형소법 유안석"></a>
            </div>
		</div>

        <div class="evtCtnsBox wb_info" id="info" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">법원직 예비순환 오프라인 상품 이용안내</h2>
                <dl>
                    <dt>1. 2024대비 예비순환 학원 종합반</dt>
                    <dd>
                        <ol>
                            <li>상품구성<br>
                            - 학원종합반 상품은 윌비스김동진법원팀 노량진학원에 등원하여 실강 강의를 수강하고, 출결 및 학습관리/
                                상담 등을 대면하여 받을 수 있습니다.<br>
                            - 2024대비 민법 예비순환 강의는 2023대비 입문특강 및 1순환 강의를 예비순환용 복습자료와 함께 비디오로 
                                수강하는 방식으로 진행됩니다.<br>
                            - 학원종합반 등록 시 예비순환에 강의용 교재를 저자 구매 제공으로 무료제공해드립니다.<br>
                            - 2024대비 김동진법원팀 전용 W플래너를 무료로 제공해드립니다.<br>
                            - 당일 실강 강의 종료 후 전용자습실을 제공하며, 1인 1개의 개인사물함을 무료로 제공해드립니다.<br>
                            - 실강으로 수강한 강의를 복습동영상으로 신청하는 경우 실강 종료 시까지 무제한 제공해드립니다.<br></li>
                            <li>수강기간<br>
                            - 2022년 5월 8일(월)부터 7월 5일(토)까지 실강이 진행됩니다. <br>
                            <li>교재 및 자료 관련<br>
                            - 모든 교재는 무료로 제공해드립니다(저자구매제공).<br>
                            - 모든 강의자료는 학원에서 강의 진행 전 배부해드립니다.<br></li>
                            <li>환불 관련<br>
                            - 환불은 학원설립및과외교습에관한법률의 규정에 따라 진행된 강의에 해당하는 수강료를 공제합니다.<br>
                            - 1개월 강의료 기준으로 강의시작 후 1/3 진행 전에는 1/3을 공제하고, 1/3~1/2 진행 시에는 1/2을 공제, ½이상 진행 시 전액을 공제합니다.<br>
                            - 중도 환불 시 무료로 제공된 교재 및 플래너 구매비용이 추가로 공제될 수 있습니다.</li>
                            <li>유의사항<br>
                            - 학원 및 강사 개인 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.<br>
                            - 복습동영상 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>2. 2023대비 예비순환 온라인관리반</dt>
                    <dd>
                        <ol>
                            <li>상품구성<br>
                            - 온라인관리반 상품은 윌비스김동진법원팀의 예비순환 온라인 동영상 강의를 수강하고, 매주 월~토 기간동안
                                오픈채팅을 통한 출석체크와 학습내역 확인을 통한 학습관리, 그리고 전화 또는 방문상담을 제공해드립니다.<br>
                            - 수강기간 내 예비순환 온라인 동영상 강의는 무제한 수강이 가능합니다.<br>
                            - 2024대비 민법 예비순환 강의는 2023대비 입문특강 및 1순환 강의를 예비순환용 복습자료와 함께 수강하는
                                방식으로 진행됩니다.<br>
                            - 온라인관리반 등록 시 예비순환에 강의용 교재를 저자 구매 제공으로 무료 제공해드립니다(배송비 본인 부담).<br>
                            - 2023대비 김동진법원팀 전용 W플래너를 무료로 제공해드립니다(배송비 본인 부담).</li>
                            <li>수강기간<br>
                            - 2022년 5월 9일(화)부터 동영상 강의가 업로드 되며, 마지막 업로드 예정일인 7월 6일(목) 이후 7월 31일(월)까지 
                                무제한 수강하실 수 있습니다. 다만 김동진법원팀은 안정적인 수강을 위해 제작된 시간표를 맞추어 5/15(월)부터 
                                수강하는 것을 추천드립니다.</li>
                            <li>동영상 수강방법 및 제한<br>
                            ① 홈페이지 [내강의실] 메뉴에서 [온라인강좌] > [수강중강좌] > [관리자부여강좌(복습동영상)]로 접속합니다.<br>
                            ② 접속 후 구매하신 패키지 상품명 옆의 [강좌추가]를 선택합니다.<br>
                            ③ 원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.<br>
                            - 수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.<br>
                            - PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                            <li>교재 및 자료 관련<br>
                            - 모든 교재는 무료로 제공해드립니다(저자구매제공). 단, 배송비가 부과될 수 있습니다.<br>
                            - 강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                            <li>환불 관련<br>
                            - 환불은 학원설립및과외교습에관한법률의 규정에 따라 진행된 강의에 해당하는 수강료를 공제합니다.<br>
                            - 1개월 강의료 기준으로 강의시작 후 1/3 진행 전에는 1/3을 공제하고, 1/3~1/2 진행 시에는 1/2을 공제, ½이상 진행 시 전액을 공제합니다.<br>
                            - 중도 환불 시 무료로 제공된 교재 및 플래너 구매비용이 추가로 공제될 수 있습니다.</li>
                            <li>유의사항<br>
                            - 학원 및 강사 개인 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.<br>
                            - 복습동영상 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                        </ol>
                    </dd>   
                </dl>

                <h2 class="NSK-Black">법원직 예비순환 온라인 상품 이용안내</h2>
                <dl>
                    <dt>1. 2024대비 예비순환 패키지</dt>
                    <dd>
                        <ol>
                            <li>상품구성<br>
                            - 패키지 상품은 윌비스김동진법원팀 교수진의 지정된 예비순환 과정을 기간 내 배수 제한 없이 무제한 수강 가능합니다.<br>
                            - 민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 영어(박초롱), 한국사(임진석) 교수별 예비순환 과정<br>
                            - 2024대비 민법 예비순환 강의는 2023대비 입문특강 및 1순환 강의를 예비순환용 복습자료와 함께 수강하는
                                방식으로 진행됩니다.<br>
                                ※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.</li>
                            <li>수강기간<br>
                            - 수강시작일로부터 120일동안 제공되며, 수강을 시작하는 즉시 수강 가능한 강의가 제공됩니다.<br>
                            - 2023 예비순환 강의는 2023년 5월 8일부터 진행되므로 5월 9일부터 순차적으로 업로드될 예정입니다. <br>
                                다만 김동진법원팀은 안정적인 수강을 위해 제작된 시간표를 맞추어 5/15(월)부터 수강하는 것을 
                                추천드립니다.</li>
                            <li>동영상 수강방법 및 제한<br>
                            ① 홈페이지 [내강의실] 메뉴에서 [온라인강좌] > [수강중강좌] > [패키지강좌]로 접속합니다.<br>
                            ② 접속 후 구매하신 패키지 상품명 옆의 [강좌추가]를 선택합니다.<br>
                            ③ 원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.<br>
                            - 수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.<br>
                            - PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                            <li>교재 및 자료 관련<br>
                            - 모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 가능합니다.<br>
                            - 강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                            <li>환불 관련<br>
                            - 결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.<br>
                            - 자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.<br>
                            - 본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>
                            <li>유의사항<br>
                            - 본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.<br>
                            - 학원 및 강사 개인 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.<br>
                            - 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>2. 2023대비 예비순환 단과</dt>
                    <dd>
                        <ol>
                            <li>상품구성<br>
                            - 단과 상품은 구매하신 교수의 단과과목을 지정된 기간 내 2배수 제한으로 수강 가능합니다. 개별수강기간은 각 과목별 구매페이지에서 확인하실 수 있습니다.<br>
                            - 2024대비 민법 예비순환 강의는 2023대비 입문특강 및 1순환 강의를 예비순환용 복습자료와 함께 수강하는
                                방식으로 진행됩니다.</li>
                            <li>수강기간<br>
                            - 구매하신 단과 과목의 개별 수강기간은 각 과목별 구매페이지에서 확인하실 수 있습니다. 일부 과목의 경우 구매시기에 따라 수강기간이 차이가 날 수 있습니다.<br>
                            - 단과 과목별 개강시기는 민법 5/8(월), 영어 5/8(월), 한국사 5/9(화), 헌법 5/10(수), 형법 5/12(금), 민소법 5/13(토), 형소법 6/16(금)이며, 특별한 사정이 없는 한 개강 다음날(영업일 기준)부터 업로드될 예정입니다.</li>
                            <li>동영상 수강방법 및 제한<br>
                            - 홈페이지 [내강의실] 메뉴에서 [온라인강좌] > [수강중강좌] > [단과강좌]로 접속하여 수강합니다.<br>
                            - 수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.<br>
                            - PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후
                                단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                            <li>교재 및 자료 관련<br>
                            - 모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 가능합니다.<br>
                            - 강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                            <li>환불 관련<br>
                            - 결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.<br>
                            - 자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.<br>
                            - 본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>
                            <li>유의사항<br>
                            - 학원 및 강사 개인 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.<br>
                            - 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                        </ol>
                    </dd>   
                </dl>

                <div class="inquire">※ 이용문의 : 김동진법원팀 노량진학원 1544-0330(2번 연결)</div>
            </div>
        </div>

	</div>
    <!-- End Container -->


    <script>
        /*탭*/
        $(document).ready(function(){
            $('.tab').each(function(){
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
      $(document).ready(function() {
            AOS.init();
        });
    </script>
@stop