@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /* 이용안내 */
    .evtInfo {padding:50px 20px; background:#f4f4f4; color:#363636; line-height:1.5}
    .guide_box{text-align:left; word-break:keep-all; font-size:14px; color:#555;}
    .guide_box h2 {font-size:30px; margin-bottom:30px; color:#000}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
    .guide_box dd{margin-bottom:50px;}
    .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;}
    .guide_box dd li.none {list-style:none; margin-left:0}
    .guide_box dd:last-child {margin:0}
    .evtInfo p {font-size:16px; color:#000; font-weight:bold; margin-top:30px}
    
    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evtTop" data-aos="fade-down">            
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2643m_top.jpg" alt="연간 종합반 선접수 이벤트" />        
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2643m_01.jpg" alt="법원직에서 인증된 강의력과 시스템" />  
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2643m_02.jpg" alt="합격에서 필요한 것들만 한다" />  
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2643m_03.jpg" alt="윌비스 검찰팀" />  
    </div>

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2643m_04.jpg" alt="신청하기" /> 
            <a href="https://pass.willbes.net/m/pass/offLecture/show/cate/3149/prod-code/194557" target="_blank" title="학원 연간종합반" style="position: absolute; left: 12.06%; top: 38.11%; width: 76.03%; height: 5.98%; z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3148/pack/648001/prod-code/194775" target="_blank" title="온라인" style="position: absolute; left: 12.06%; top: 83.71%; width: 76.03%; height: 5.98%; z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evtInfo">
        <div class="guide_box">
            <h2 class="NSK-Black" data-aos="fade-up">1~4순환 연간반(실강반) 상품안내</h2>
            <dl>
                <dt>(1) 상품구성</dt>
                <dd>
                    <ol>
                        <li>윌비스검찰팀 교수진의 지정된 1~4순환 수강 가능합니다.(별도 특강 제외)</li>
                        <li>형법(문형석), 형사소송법(유안석), 영어(박초롱), 한국사(임진석), 국어(박재현)’ 교수별 1~4순환 과정 중 구매한 상품에 해당되는 강의<br>
                            ※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.</li>                          
                    </ol>
                </dd>
                <dt>(2) 수강기간</dt>
                <dd>
                    <ol>
                        <li>수강시작일로부터 2023년 시험일까지 제공되며, 수강을 시작하는 즉시 실강 참여가 가능합니다.</li>          
                    </ol>
                </dd>
                <dt>(3) 복습동영상 제공 - 학원에서 담당직원 신청 승인완료 후 제공</dt>
                <dd>
                    <ol>
                        <li>홈페이지 [내강의실] 메뉴에서 패키지 및 단강좌 선택[관리자가부여한강좌]로 접속합니다.</li>
                        <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                        <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                    </ol>
                </dd>
                <dt>(4) 교재 및 자료 관련</dt>
                <dd>
                    <ol>
                        <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 또는 학원에서 구입 가능합니다.</li>
                        <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                        <li class="strong">학원에서는 1인 1부가 원칙</li>      
                    </ol>
                </dd>
                <dt>(5) 환불관련</dt>
                <dd>
                    <ol>
                        <li>학원법 환불 규정에 의해 환불 가능합니다.</li>                      
                    </ol>
                </dd>                 
                <dt>(6) 유의사항</dt>
                <dd>
                    <ol>
                        <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                        <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                        <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민.형사상 책임을 질 수 있습니다.</li>                      
                    </ol>
                </dd>                    
            </dl>
            <p>※ 이용문의 : 학원 1544-0330</p>
            <h2 class="NSK-Black" style="padding-top:100px;" data-aos="fade-up">온라인 PASS 상품안내</h2>
            <dl>
                <dt>(1) 상품구성</dt>
                <dd>
                    <ol>
                        <li>온라인 PASS 상품은 윌비스검찰팀 교수진의 지정된 ‘1~4순환’ 과정을 기간 내 배수 제한 없이 무제한 수강 가능합니다.</li>
                        <li>형법(문형석), 형사소송법(유안석), 국어(박재현), 영어(박초롱), 한국사(임진석)’ 교수별 1~4순환 과정 중 구매한 상품에 해당되는 강의<br>
                            ※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.</li>                          
                    </ol>
                </dd>
                <dt>(2) 수강기간</dt>
                <dd>
                    <ol>
                        <li>수강시작일로부터 2023년 시험일까지 제공되며, 수강을 시작하는 즉시 수강 가능한 강의가 제공됩니다.</li>
                        <li>1순환 강의는 2022년 6월 27일부터 진행 예정이므로 6월 28일부터 순차적으로 업로드 될 예정입니다.</li>  
                    </ol>
                </dd>
                <dt>(3) 동영상 수강방법 및 제한</dt>
                <dd>
                    <ol>
                        <li>
                            ① 홈페이지 [내강의실] 메뉴에서 [PASS강의] > [수강중강좌]로 접속합니다.<br>
                            ② 접속 후 구매하신 PASS 상품명 옆의 [강좌추가]를 선택합니다.<br>
                            ③ 원하는 과목/교수/강좌를 선택하여 추가하신 후 수강이 가능합니다.
                        </li>
                        <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                        <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                    </ol>
                </dd>
                <dt>(4) 교재 및 자료 관련</dt>
                <dd>
                    <ol>
                        <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 [수강중강좌] 페이지 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                        <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>                            
                    </ol>
                </dd>
                <dt>(5) 환불관련</dt>
                <dd>
                    <ol>
                        <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                        <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                        <li>본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>
            
                    </ol>
                </dd>                 
                <dt>(6) 유의사항</dt>
                <dd>
                    <ol>
                        <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                        <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                        <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민.형사상 책임을 질 수 있습니다.</li>                      
                    </ol>
                </dd>                    
            </dl>
            <p>※ 이용문의 : 고객만족센터 1544-5006</p>
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


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop