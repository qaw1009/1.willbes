@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt00 {text-align:center;}
    .evt00 .dday {font-size:22px;padding:20px 0;}
    .evt00 .dday span {color:#435d96; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}

    .evt01 {padding-bottom:50px;}
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

    .evt03 {position:relative;}


    .evt03_01 {background:url(https://static.willbes.net/public/images/promotion/2021/02/1751m_03_bg.jpg) repeat-y; background-size:100%; padding:0 8% 30px}
    .evt03_01 table {border:1px solid #ccc}
    .evt03_01 th,
    .evt03_01 td {padding:10px; text-align:center; font-size:14px; border-right:1px solid #ccc}
    .evt03_01 th {font-weight:bold; background:#f4f4f4}
    .evt03_01 tr {border-bottom:1px solid #ccc}
    .evt03_01 td a {background:#111; color:#fff; display:block; margin:0 5%; padding:5px 0}
  
    .check {padding:20px 0px 50px 10px; letter-spacing:0; color:#fff; background-color:#032e5b;}
    .check label {cursor:pointer; font-size:14px;color:#FFF;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:block; padding:10px 20px; color:#032e5b; border-radius:20px; font-size:14px; background-color:#dac28d; width:280px; margin:15px auto}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#252525; font-size:19px;}
    .evtFooter p span {display:inline-block; font-size:10px; padding-bottom:5px; vertical-align:middle}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}
    .evtFooter li a {display:inline-block; margin-left:10px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}

    /* 폰 가로, 태블릿 세로*/
    @@media all and (min-width:320px) and (max-width:408px) {       
    .check label {font-size:10px;}
    .check input {width:15px;height:15px;}
    .check img {width:75%;}
    }

    @@media all and (min-width:409px) and (max-width:588px) {       
    .check label {font-size:12px;}
    .check input {width:20px;height:20px;}
    .check img {width:75%;}
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt00 .dday {font-size:30px;}
        .evt00 .dday span {box-shadow:inset 0 -20px 0 rgba(0,0,0,0.1);}  
     
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">      
    <div class="evtCtnsBox evt00 ddayArea">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">군무원 패스 마감까지 <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div>     
    </div>   

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/1751m_top.jpg" alt="군무원패스" >
    </div>  
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1751m_01_01.jpg" alt="" >
        <div class="slide_con">
            <div id="slidesImg1">
                <div><img src="https://static.willbes.net/public/images/promotion/2020/12/1717_01_t01.gif" alt="국어 기미진"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/12/1717_01_t04.gif" alt="행정법 이석준"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/12/1717_01_t05.gif" alt="행정학 김덕관"/></div>
            </div>
        </div> 
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1751m_01s.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1751m_02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evt03 p_re">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/1751m_03.jpg" alt="수강신청" >
        <a href="javascript:go_PassLecture('178781');" title="시험일까지" style="position: absolute; left: 59.03%; top: 53.01%; width: 27.64%; height: 6.9%; z-index: 2;"></a>
        <a href="javascript:go_PassLecture('169730');" title="12개월" style="position: absolute; left: 12.92%; top: 86.9%; width: 30.28%; height: 8.12%; z-index: 2;"></a>
        <a href="javascript:go_PassLecture('177805');" title="6개월" style="position: absolute; left: 55.42%; top: 86.9%; width: 30.28%; height: 8.12%; z-index: 2;"></a>           
    </div> 

    <div class="evtCtnsBox evt03_01">
        <table cellspacing="0" cellpadding="0">
            <col span="3" />
            <tr>
                <th colspan="3">12개월</th>
            </tr>
            <tr>
                <td>국어+행정학</td>
                <td>35만원</td>
                <td><a href="javascript:go_PassLecture('170029');">수강신청</a></td>
            </tr>
            <tr>
                <td>국어+행정법</td>
                <td>35만원</td>
                <td><a href="javascript:go_PassLecture('170030');">수강신청</a></td>
            </tr>
            <tr>
                <td>행정학+행정법</td>
                <td>35만원</td>
                <td><a href="javascript:go_PassLecture('170031');">수강신청</a></td>
            </tr>
            <tr>
                <th colspan="3">6개월</th>
            </tr>
            <tr>
                <td>국어+행정학</td>
                <td>25만원</td>
                <td><a href="javascript:go_PassLecture('177807');">수강신청</a></td>
            </tr>
            <tr>
                <td>국어+행정법</td>
                <td>25만원</td>
                <td><a href="javascript:go_PassLecture('177808');">수강신청</a></td>
            </tr>
            <tr>
                <td>행정학+행정법</td>
                <td>25만원</td>
                <td><a href="javascript:go_PassLecture('177809');">수강신청</a></td>
            </tr>
        </table>
    </div> 

    <div class="evtCtnsBox check">
        <label>
            <input name="ischk"  type="checkbox" value="Y" />
            페이지 하단 군무원 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
        </label>
        <a href="#guide">
            이용안내 확인하기 ↓
        </a>
    </div> 

    <div class="evtCtnsBox evtFooter" id="guide">
        <h3 class="NSK-Black">윌비스 군무원PASS 이용안내</h3>
        <p class="NSK-Black"><span>●</span> 상품구성 </p>
        <ul>
            <li>본 PASS는 군무원 9급 행정직 대비 과정으로, 참여 교수진의 전 강좌를 배수 제한 없이 무제한으로 수강 가능합니다.</li>
            <li>수강 가능 교수진 : 국어 기미진/임재진, 행정법 이석준, 행정학 김덕관/김헌 (국어 임재진, 행정학 김헌 교수 과정은 2020년 대비 진행된 기존 과정만 제공됩니다.)</li>
            <li>2020년 대비 전 강좌 및 2021년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.(일부 교수진의 경우, 학원 사정으로 인하여 신규 과정이 업데이트 되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 수강해주셔야 합니다.)</li>
            <li>참여 교수진의 강의 진행 일정은 과목별로 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다. (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)</li>
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

        <p class="NSK-Black"><span>●</span> 라이브모드 수강관련</p>
        <ul>
            <li>공무원학원 실강 내 LIVE로 진행되는 강좌만 제공됩니다. (* 일부 특강 제외)<br>
            - 국어 기미진, 행정법 이석준, 행정학 김덕관</li>
            <li>제공되는 강좌 및 진행일정은 [자세히보기 >] 클릭 후 페이지 하단에서 확인 가능합니다. <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
            <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
            <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다. (* 이전 구매자 소급 적용) </li>
        </ul>

        <div>※ 이용문의 : 1544-5006</div>
    </div>  
</div>
<!-- End Container -->

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
<script type="text/javascript">
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}','txt');
    });

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

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

<!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
<script language='javascript'>
    var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
    var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
</script>
<noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
<!-- AceCounter Log Gathering Script End -->

@stop