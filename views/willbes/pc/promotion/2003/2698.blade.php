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


        .evtTop {background:#008aff;}

        .evt01 {background:#a6cfff}
        .evt02 {background:#f0f0f0}
        .evt03 {background:#212121}

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#555; color:#fff; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}
        /************************************************************/      
    </style> 

    <div class="evtContent NSK" id="evtContainer">
		<div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2698_top.jpg" alt="김동진 법원팀 예비순환" />
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2698_01.jpg" alt="" />
                <a href="#none" title="" style="position: absolute; left: 32.5%; top: 34.31%; width: 34.82%; height: 2.82%; z-index: 2;"></a>
                <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute; left: 32.41%; top: 92.59%; width: 34.91%; height: 2.98%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">         
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2698_02.jpg" alt="연간 커리큘럼">
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2698_03_01.jpg" alt="예비순환 온라인"/>
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" title="온라인 관리반이란?" style="position: absolute; left: 65.09%; top: 35.4%; width: 20.8%; height: 12.6%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" title="수강신청" style="position: absolute; left: 64.2%; top: 49.5%; width: 17.86%; height: 5.9%; z-index: 2;"></a>
            </div>
            <div class="wrap">                
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2698_03_02.jpg" alt="온오프라인 상품 "/>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" title="학원 종합반" style="position: absolute; left: 31.79%; top: 22.43%; width: 36.79%; height: 2.6%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" title="온라인 관리반이란?" style="position: absolute; left: 56.96%; top: 26.21%; width: 16.79%; height: 4.19%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" title="온라인 관리반" style="position: absolute; left: 31.79%; top: 38.62%; width: 36.79%; height: 2.6%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2658" title="온라인 패스" style="position: absolute; left: 31.79%; top: 54.95%; width: 36.79%; height: 2.6%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/index/cate/3035/pack/648001" title="온라인 패키지" style="position: absolute; left: 31.79%; top: 88.64%; width: 36.79%; height: 2.6%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evtInfo" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">2023대비 예비순환 온라인관리반 Light 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>온라인관리반 상품은 윌비스김동진법원팀의 예비순환 온라인 동영상 강의를 수강하고, 매주 월~토 기간동안
                                오픈채팅을 통한 출석체크와 학습내역 확인을 통한 학습관리, 그리고 전화 또는 방문상담을 제공해드립니다.</li>
                            <li>수강기간 내 본인이 신청한 과목의 예비순환 온라인 동영상 강의는 무제한 수강이 가능합니다.</li>
                            <li>온라인관리반 등록 시 예비순환에 강의용 교재를 저자 구매 제공으로 무료 제공해드립니다.</li>
                            <li>2023대비 김동진법원팀 전용 W플래너를 무료로 제공해드립니다.</li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>2022년 7월 4일(월)부터 1순환 시작 전인 8월 7일(일)까지 무제한 수강하실 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>동영상 수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>① 홈페이지 [내강의실] 메뉴에서 [온라인강좌] > [수강중강좌] > [관리자부여강좌(복습동영상)]로 접속합니다.<br>
                                ② 접속 후 구매하신 패키지 상품명 옆의 [강좌추가]를 선택합니다.<br>
                                ③ 원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                            <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                        </ol>
                    </dd>
                    
                    <dt>교재 및 자료 관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 무료로 제공해드립니다(저자구매제공)</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불 관련</dt>
                    <dd>
                        <ol>
                            <li>환불은 학원설립및과외교습에관한법률의 규정에 따라 진행된 강의에 해당하는 수강료를 공제합니다.</li>
                            <li>1개월 강의료 기준으로 강의시작 후 1/3 진행 전에는 1/3을 공제하고, 1/3~1/2 진행 시에는 1/2을 공제, 1/2이상 진행 시 전액을 공제합니다.</li>
                            <li>중도 환불 시 무료로 제공된 교재 및 플래너 구매비용이 추가로 공제될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>복습동영상 아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민/형사상 책임을 질 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>※ 이용문의 : 김동진법원팀 노량진학원 1544-0330(2번 연결)</dt>
                </dl>
            </div>
        </div>

	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function(){AOS.init();});
    </script> 

    <script type="text/javascript">         
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        };
    </script>
@stop