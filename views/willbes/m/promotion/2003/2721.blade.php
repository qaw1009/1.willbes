@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    .dday {font-size:2.4vh !important; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#4e62df; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:1.4px !important;}

    .tabs {display:flex; justify-content: space-between;}
    .tabs a {display:block; margin-right:2px}
    .tabs img.on {display:none}
    .tabs img.off {display:block}
    .tabs a.active img.on {display:block}
    .tabs a.active img.off {display:none}
    .tabs a:last-child {margin-right:0}
    .tabCts {position:relative; padding-top:43.5%; }
    .tabCts:nth-child(1) {background:url(https://static.willbes.net/public/images/promotion/2022/07/2721m_02_tab01_img.jpg) no-repeat center top; background-size:100%; }
    .tabCts:nth-child(2) {background:url(https://static.willbes.net/public/images/promotion/2022/07/2721m_02_tab02_img.jpg) no-repeat center top; background-size:100%; }
    .tabCts:nth-child(3) {background:#000 url(https://static.willbes.net/public/images/promotion/2022/07/2721m_02_tab03_img.jpg) no-repeat center top; background-size:100%; }
    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } 
    .embed-container iframe {position: absolute; top: 0; left: 0; width: 100%; height: 100%; background:#000;}
    .tabCts:nth-child(3)  .embed-container {color:#fff; justify-content: center; align-items: center; font-size:3vh; padding:25% 0 30%}

    .wb_cts04 {background:#4d62df; position: relative; padding-bottom:100px}

    .check label {cursor:pointer; font-size:1.6vh;color:#fff;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:5px 10px; color:#fff; background:#2d2d2d; margin-left:10px; border-radius:4px;font-size:1.4vh;} 

    .event05 .passbuy a {display:block; width:80%; margin:0 auto; background:#1c2127; color:#fff; font-size:2.4vh; border-radius:40px; padding:10px 0; font-weight:bold}  
    .event05 .passbuy a:hover {background:#fb6250; color:#fff;}
    

    /* 이용안내 */
    .evtInfo {padding:50px 20px; background:#f4f4f4; color:#3a3a3a; font-size:1.6vh;}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox li {list-style:disc; margin-left:20px;}
    .evtInfoBox h4 {font-size:3vh; margin-bottom:50px}
    .evtInfoBox .infoTit {margin-bottom:10px; font-size:1.8vh;}
    .evtInfoBox .infoTit strong {padding:5px 20px; border-radius:50px; background:#333; color:#fff}
    .evtInfoBox ul {margin-bottom:30px}   
    
    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .check br {display:none}
    }

</style>

<div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox dday NSK-Thin">
        <strong>{{$arr_promotion_params['turn']}}기 마감 <span id="ddayCountText" class="NSK-Black"></span> </strong>      
    </div>   


    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_top.jpg" alt="장사원 T-PASS" >
    </div> 
    
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_01.jpg" alt="혜택" />
    </div>

    <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_02.jpg" alt="직렬별 교수진" />
        <div class="tabs">
            <a href="#tab01" class="active">
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_02_tab01.jpg" alt="오대혁" class="off"/>
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_02_tab01_on.jpg" alt="오대혁" class="on"/>
            </a>
            <a href="#tab02">
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_02_tab02.jpg" alt="김철" class="off"/>
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_02_tab02_on.jpg" alt="김철" class="on"/>
            </a>
            <a href="#tab03">
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_02_tab03.jpg" alt="임병주" class="off"/>
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_02_tab03_on.jpg" alt="임병주" class="on"/>
            </a>
        </div>
        <div >
            <div id="tab01" class="tabCts">
                <div class="embed-container">
                    <iframe src="https://www.youtube.com/embed/dKr_BWdDT7g?rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div id="tab02" class="tabCts">
                <div class="embed-container">
                    <iframe width="512" height="288" src="https://www.youtube.com/embed/4jqSvpDe900?rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div id="tab03" class="tabCts">
                <div class="embed-container">
                    Coming soon!
                    <iframe width="512" height="288" src="https://www.youtube.com/embed/Ma8d0QFnhEg?rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_03.jpg" alt="혜택" />
    </div>

    <div class="evtCtnsBox wb_cts04" id="apply" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2721m_04.jpg" alt="수강신청"/>    
            <a href="javascript:go_PassLecture('199872');" style="position: absolute; left: 50.69%; top: 78.58%; width: 36.39%; height: 11.77%;z-index: 2;"></a>
        </div>    
        <div class="check">
            <label>
                <input name="ischk"  type="checkbox" value="Y" />
                페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
            <a href="#careful">이용안내확인하기 ↓</a>
        </div>
    </div>

    <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">윌비스 군무원 PASS 이용안내</h4>

            <div class="infoTit"><strong>상품구성</strong></div>
            <ul>
                <li>본 PASS는 군무원 행정직 9급 대비 과정으로, 참여 교수진의 2022~2023 대비 전 강좌를 배수 제한 없이 무제한으로 수강 가능합니다.<br>
                - 국어 오대혁, 행정학 김철/김덕관, 행정법 L교수 (8월 초 공개)/신기훈<br>
                    (행정학 김덕관, 행정법 신기훈 교수의 강의는 2022 대비 과정만 제공합니다.)</li>
                <li>2022년 7월부터 진행된 2022년 대비 전 과정 및 2023년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
                (일부 교수진의 경우, 신규 과정이 업데이트 되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 제공해드립니다.)
                </li>
                <li>참여 교수진의 일정 및 진행 방식은 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.<br>
                (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)</li>
                <li>이벤트 해당 상품 (전과목PASS) 구매 시  지급되는 추가 포인트의 경우, 교재 구매 시 사용할 수 있으며 결제완료 후 익일 담당자 확인 후에 지급해드릴 예정입니다.</li>
            </ul>

            <div class="infoTit"><strong>수강기간</strong></div>
            <ul>
                <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>       
            </ul>

            <div class="infoTit"><strong>수강관련</strong></div>
            <ul>
                <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭,원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                <li>본 PASS를 이용 중에는 일시 정지 기능을 사용할 수 없습니다.</li>
                <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>       
            </ul>

            <div class="infoTit"><strong>교재관련</strong></div>
            <ul>
                <li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>        				
            </ul>

            <div class="infoTit"><strong>환불정책</strong></div>
            <ul>
                <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                    · 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br>
                    * 수강지원 포인트 포함 상품 환불 시 포인트를 미사용한 경우는 회수 후 환불 처리하오나, 포인트를 사용하였다면 사용분만큼 결제금액에서 차감 후 환불됩니다.
                </li>
            </ul>

            <div class="infoTit"><strong>유의사항</strong></div>
            <ul>
                <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>
            </ul>

            <div class="infoTit"><strong>라이브모드 수강관련</strong></div>
            <ul>
                <li>공무원학원 실강 내 LIVE로 진행되는 강좌만 제공됩니다. (* 일부 특강 제외)<br>
                - 국어 오대혁, 영어 한덕현, 한국사 김상범
                </li>
                <li>제공되는 강좌 및 진행일정은 우측 버튼 클릭 후 페이지 하단에서 확인 가능합니다.
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
                <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
                <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다.</li>
            </ul>

            <div class="infoTit"><strong>윌비스 고객만족센터 1544-5006</strong></div>
        </div>
    </div>
</div>

<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $( document ).ready( function() {
        AOS.init();
    });

    var tab1_url = "https://www.youtube.com/embed/dKr_BWdDT7g?rel=0";
    var tab2_url = "https://www.youtube.com/embed/4jqSvpDe900?rel=0";   
    var tab3_url = "https://www.youtube.com/embed/Ma8d0QFnhEg?rel=0";
    $(document).ready(function() {
    $(".tabCts").hide(); 
    $(".tabCts:first").show();
    $(".tabs a").click(function(){ 
            var activeTab = $(this).attr("href"); 
            var html_str = "";
            if(activeTab == "#tab01"){
                html_str = "<div class='embed-container'><iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe></div>";
            }else if(activeTab == "#tab02"){
                html_str = "<div class='embed-container'><iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe></div>";
            }else if(activeTab == "#tab03"){
                html_str = "<div class='embed-container'><iframe src='"+tab3_url+"' frameborder='0' allowfullscreen></iframe></div>";                
            }
            $(".tabs a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".tabCts").hide(); 
            $(".tabCts").html(''); 
            $(activeTab).html(html_str);
            $(activeTab).fadeIn(); 
            return false; 
            });
        });


    /*수강신청 동의*/ 
    function go_PassLecture(code){
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }

        var url = '{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/') }}' + code;
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