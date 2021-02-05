@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}
    .evtCtnsBox li {list-style:none;}

    .evtTop {position:relative}

    .evt01 .slide_con {padding-bottom:30px}
    .evt01 .slide_con img {max-width:348px; margin:0 auto}
    .evt01 .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .evt01 .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        bottom: 0;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .evt01 .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .evt01 .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
    .evt01 .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .evt01 .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #fd898c;
    }
    .evt01 .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }
    .evt01 .slide_con .bx-wrapper .bx-pager {     
        bottom: -30px;
    }  
    .evt02 {position:relative;}
 
    .check {width:100%; text-align:center; color:#fff; position:absolute; bottom:6vh}
    .check label {cursor:pointer; font-size:14px;color:#FFF;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

    .evt03 {padding-bottom:50px}   

    .evtFooter {margin:0 auto; padding-bottom:30px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#fff; background:#252525; text-align:center; padding:15px 0}
    .evtFooter p {margin-bottom:10px; color:#252525; font-size:19px;}
    .evtFooter p span {display:inline-block; font-size:10px; padding-bottom:5px; vertical-align:middle}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}
    .evtFooter li a {display:inline-block; margin-left:10px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}

    .fixed {position:fixed; width:100%; left:0; z-index:10; border:0; opacity: .95;} 
    .fixed ul {width:100%; max-width:720px; margin:0 auto; background:rgba(255,255,255,0.5); background:#f3f3f3; box-shadow:0 10px 10px rgba(102,102,102,0.2);}

    /* 폰 가로, 태블릿 세로*/
    @@media all and (max-width:480px)  {      
        .check label {font-size:12px;}
        .check input {width:16px;height:16px;}
    }

    /* 태블릿 세로 */
    @@media all and (min-width:481px) and (max-width:768px)  { 
        .check label {font-size:13px;}
        .check input {width:20px;height:20px;}
    }
</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/1717m_top.jpg" alt="9급 패스" > 
    </div>  
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/1717m_01_01.jpg" alt="" >
        <div class="slide_con">
            <div id="slidesImg1">
                <div><img src="https://static.willbes.net/public/images/promotion/2021/01/1717_01_t01.gif" alt="국어 기미진"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2021/01/1717_01_t02.gif" alt="영어 한덕현"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2021/01/1717_01_t03.gif" alt="영어 이아림"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2021/01/1717_01_t04.gif" alt="영어 양익"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2021/01/1717_01_t05.gif" alt="한국사 한경준"/></div>
            </div>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2021/01/1717m_01_02.jpg" alt="" >
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1717m_01.jpg" alt="" >
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/1717m_02.jpg" alt="9급 패스" >  
        <a href="javascript:go_PassLecture('177930');" title="9급문풀패스" style="position: absolute; left: 58.47%; top: 45.5%; width: 28.19%; height: 7.73%; z-index: 2;"></a>
        <a href="javascript:go_PassLecture('168184');" title="12개월" style="position: absolute; left: 11.81%; top: 78.25%; width: 30.14%; height: 8.46%; z-index: 2;"></a>
        <a href="javascript:go_PassLecture('177584');" title="21년 9급 지방직까지" style="position: absolute; left: 57.22%; top: 78.43%; width: 30.14%; height: 8.46%; z-index: 2;"></a>

        <div class="check">
            <label>
                <input name="ischk"  type="checkbox" value="Y" />
                페이지 하단 윌비스 9급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
        </div>        
    </div>

    <div class="evtCtnsBox evtFooter">
        <h3 class="NSK-Black">윌비스 9급PASS 이용안내</h3>
        <div class="infoBox">
            <p class="NSK-Black"><span>●</span> 상품구성 </p>
            <ul>
                <li>본 PASS는 일반행정직 대비 과정으로, 참여 교수진의 전 강좌를 배수 제한 없이 무제한으로 수강 가능합니다.<br>
                    *국어 기미진, 영어 한덕현 일부과정 제외
                </li>
                <li>수강 가능 교수진 : 국어 기미진, 영어 한덕현/성기건/김영, 한국사 조민주, 행정법 이석준/황남기/한세훈, 행정학 김덕관, 사회 문병일, 수학 곽윤근</li>
                <li>2019년 7월부터 진행된 2020년 대비 전 과정 및 2021년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
                    (일부 교수진의 경우, 신규 과정이 업데이트되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 제공해드립니다.)     
                </li>
            </ul>

            <p class="NSK-Black"><span>●</span> 수강관련</p>
            <ul>
                <li>[내강의실]-[무한PASS존]-[강좌추가]버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                <li>본 PASS는 일시정지/연장/재수강 기능을 제공하지 않습니다.</li>
                <li>본 PASS 수강 시 이용가능한 기기는 PC/모바일 총 2대입니다.</li>
                <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>
            </ul>

            <p class="NSK-Black"><span>●</span> 환불정책</p>
            <ul>
                <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 정가 기준으로 계산하여 사용 일수만큼 차감하고 환불됩니다.</li>
            </ul>

            <p class="NSK-Black"><span>●</span>  라이브모드 수강관련</p>
            <ul>
                <li>공무원학원 실강 내 LIVE로 진행되는 강좌만 제공됩니다. (* 일부 특강 제외)<br>
                - 국어 기미진, 영어 한덕현, 한국사 조민주, 행정법 이석준, 행정학 김덕관</li>
                <li>제공되는 강좌 및 진행일정은 [자세히보기 >] 클릭 후 페이지 하단에서 확인 가능합니다. <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
                <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
                <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다. (* 이전 구매자 소급 적용) </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Container -->

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">
    /*수강신청 동의*/ 
    function go_PassLecture(code){
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }

        var url = '{{ site_url('/m/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
        location.href = url;
    } 
     
    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg1").bxSlider({
            auto: true, 
            speed: 500, 
            pause: 5000, 
            mode:'fade', 
            autoControls: false, 
            adaptiveHeight: true,
            controls:false,
            pager:true,
        });
    }); 
</script>

@stop