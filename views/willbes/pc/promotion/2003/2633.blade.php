@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff           
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #fff}*/
        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/04/2633_top_bg.jpg) no-repeat center top; height:1116px}  
        .evtTop span {position: absolute; width:523px; top:210px; left:50%; margin-left:-261px;  z-index: 10;} 

        .evt01 {background:#b4172a}
        
        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#f4f4f4; color:#363636; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all; font-size:14px; color:#555;}
        .guide_box h2 {font-size:30px; margin-bottom:30px; color:#000}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}
        .evtInfo p {font-size:16px; color:#000; font-weight:bold; margin-top:30px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">            
            <span data-aos="fade-down"><img src="https://static.willbes.net/public/images/promotion/2022/04/2633_top_img.png" alt="9급 검찰직 합격설명회"/></span>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2633_top.jpg" alt="9급 검찰직 합격설명회"/>
                <a href="https://www.youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg/videos" target="_blank" title="유튜브 윌비스 검찰팀" style="position: absolute; left: 24.02%; top: 83.87%; width: 51.88%; height: 8.06%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2633_01.jpg" alt=""/>
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3149/prod-code/194556" target="_blank" title="설명회 신청" style="position: absolute; left: 24.64%; top: 42.36%; width: 50.8%; height: 4.82%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3149/prod-code/194557" target="_blank" title="수강신청" style="position: absolute; left: 24.64%; top: 87.16%; width: 50.8%; height: 4.82%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">1~4순환 연간반 상품안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>윌비스검찰팀 교수진의 지정된 1~4순환 수강 가능합니다.(별도 특강 제외)</li>
                            <li>형법(문형석), 형사소송법(유안석), 영어(박초롱), 한국사(임진석), 국어(박재현)’ 교수별 1~4순환 과정 중 구매한 상품에 해당되는 강의<br>
                                ※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.</li>                          
                        </ol>
                    </dd>
                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>수강시작일로부터 2023년 시험일까지 제공되며, 수강을 시작하는 즉시 실강 참여가 가능합니다.</li>          
                        </ol>
                    </dd>
                    <dt>복습동영상 제공 - 학원에서 담당직원 신청 승인완료 후 제공</dt>
                    <dd>
                        <ol>
                            <li>홈페이지 [내강의실] 메뉴에서 패키지 및 단강좌 선택[관리자가부여한강좌]로 접속합니다.</li>
                            <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                        </ol>
                    </dd>
                    <dt>교재 및 자료 관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 또는 학원에서 구입 가능합니다.</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                            <li class="strong">학원에서는 1인 1부가 원칙</li>      
                        </ol>
                    </dd>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>학원법 환불 규정에 의해 환불 가능합니다.</li>                      
                        </ol>
                    </dd>                 
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민.형사상 책임을 질 수 있습니다.</li>                      
                        </ol>
                    </dd>                    
                </dl>
                <p>※ 이용문의 : 학원 1544-0330</p>
            </div>
        </div>


    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );      
    </script>
    
@stop