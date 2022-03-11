@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox span { vertical-align:top}   

    /************************************************************/

    .evt_apply {padding-bottom:50px;}

    /* 이용안내 */
    .evtInfo {padding:50px 0 100px; background:#fff; color:#000; line-height:1.5}
    .guide_box{margin:0 auto; padding:50px; text-align:left; word-break:keep-all;border:2px solid #000;}
    .guide_box h2 {font-size:25px; margin-bottom:30px;}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
    .guide_box dd{margin-bottom:50px;}
    .guide_box dd li{margin-bottom:5px; list-style:disc; margin-left:20px;font-size:14px;}
    .guide_box dd li.none {list-style:none; margin-left:0}
    .guide_box dd span {color:#FF1D1D;vertical-align:top;font-weight:bold;}
    .guide_box dd:last-child {margin:0}

    </style>

    <div id="Container" class="Container NSK c_both">
        
        <div class="evtCtnsBox" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2577_mtop.jpg" alt="3순환 온라인 첨삭반">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2577_m01.jpg" alt="강의일정 안내">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2577_m02.jpg" alt="합격생 첨삭">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2577_m03.jpg" alt="수험생활 관리">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2577_m04.jpg" alt="수강안내">
                <a href="https://gosi.willbes.net/support/gosiNotice/show/cate/3094?board_idx=290148&s_cate_code=3094&s_campus=0&s_keyword=&prof_idx=&subject_idx=&view_type=&s_cate_code_disabled=Y&page=2" title="원격채점 방법 안내 자세히 보러가기 ▶" target="_blank" style="position: absolute;left: 54.46%;top: 88.67%;width: 35.21%;height: 5.41%;z-index: 2;"></a>
            </div>   
        </div>

        <div class="evtCtnsBox evt_apply" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2577_m05.jpg" alt="신청하기">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif   
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 한림법학원 5급행정대비 3순환 온라인 첨삭반 안내 </h2>
                <dl>
                    <dt>수강료</dt>
                    <dd>
                        <ol>    
                            <li>3과목 이상의 강의를 선택 결제시 자동 할인 적용됩니다.</li>
                            <li>4과목 신청시 : 25% 할인</li>
                            <li>3과목 신청시 : 15% 할인</li>            
                        </ol>
                    </dd>
                    <dt>수강관련</dt>
                    <dd>
                        <ol>    
                            <li>강의 일정에 따라 홈페이지 “내강의실”에서 강의 진행됩니다.</li>
                            <li>개강 전 원격 채점 진행방법에 관해 안내드립니다.</li>
                            <li>강의 일정은 실강 진행 상황에 따라 변경될 수 있습니다.</li>
                            <li>이용 중에는 휴강 기능을 이용할 수 없습니다.</li>
                            <li>복습동영상은 과목별 1회에 한해 30일간 제공되며, 2022년 6월 30일까지 신청 가능합니다.(이후 신청 불가)</li>
                        </ol>
                    </dd>
                    <dt>강의업로드 및 답안 첨삭</dt>
                    <dd>
                        <ol>    
                            <li>강의는 정해진 회차 해당일 <span>오후 1시전까지 업로드</span> 됩니다.</li>
                            <li><span>답안첨삭방법은 상세공지사항을 참고</span> 부탁드립니다.</li>
                        </ol>
                    </dd> 
                    <dt>교재</dt>
                    <dd>
                        <ol>    
                            <li>무료제공되는 교재 외의 교재 및 자료는 별도로 구매하셔야 합니다.</li>
                        </ol>
                    </dd>
                    <dt>기기제한</dt>
                    <dd>
                        <ol>    
                            <li>수강 기기는 2대로 제한됩니다.(PC 1대, 핸드폰 1대 또는 각 기기별 2대)로 제한됩니다.</li>
                        </ol>
                    </dd>
                    <dt>유의사항</dt>
                    <dd>
                        <ol>    
                            <li>아이디 공유 적발 시 회원 자격이 박탈되며 환불 불가함을 원칙으로 합니다.</li>
                            <li>추가적인 불법 공유 행위 적발 시 형사 고발 조치가 진행될 수 있는 점, 양지해주시기 바랍니다.</li>
                        </ol>
                    </dd>
                    <dt>환불정책</dt>
                    <dd>
                        <ol>    
                            <li>환불시 할인율 적용이 해지되며, 신청일 기준 정가 정산됩니다.</li>
                            <li>환불시 무료제공된 교재 비용 차감됩니다.</li>
                            <li>기타 환불 정책은 결제시 공지된 [환불정책 안내]에 따라 진행됩니다.</li>
                        </ol>
                    </dd>                                                  
                </dl>
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