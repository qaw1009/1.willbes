@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}
    li {list-style:none;}

    .evtTop {position:relative}

   .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px;z-index:100;}
    .btnbuy {max-width:720px; margin:0 auto}
    .btnbuy a {display:block; width:99%; max-width:700px; margin:0 auto 5px; font-size:1.2rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#0099ff;}
   

    .evtFooter {margin:0 auto;text-align:left; color:#000; line-height:1.7;background:#fff }
    .evtFooter h3 {font-size:20px;color:#f3f3f3; background:#161616; text-align:center; padding:10px 0}
    .evtFooter .infoBox {padding:20px;}
    .evtFooter p {margin-bottom:10px; color:#252525; font-size:19px;}
    .evtFooter p span {display:inline-block; font-size:10px; padding-bottom:5px; vertical-align:middle}
    .evtFooter div,
    .evtFooter ul {margin-bottom:20px; padding:0 10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal; color:#636363;font-size:14px;}
    .evtFooter li span {color:#252525;}

    .fixed {position:fixed; width:100%; left:0; z-index:10; border:0; opacity: .95;} 
    .fixed ul {width:100%; max-width:720px; margin:0 auto; background:rgba(255,255,255,0.5); background:#f3f3f3; box-shadow:0 10px 10px rgba(102,102,102,0.2);}

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        .btnbuy a {display:inline-block;width:49%; }  
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt00 .dday {font-size:30px;}
        .evt00 .dday span {box-shadow:inset 0 -20px 0 rgba(0,0,0,0.1);}  
        .btnbuy a {font-size:1.5rem;}  
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1480m_top.gif" alt="" > 
    </div>  
    
    <div class="evtCtnsBox evt01" >
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1480m_01.jpg" alt="" >
    </div>

    <div class="evtCtnsBox evt02" >
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1480m_02.jpg" alt="" >
        <div class="MainBnrSlider swiper-container swiper-container-arrow">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/2020/09/1480m_02_01.jpg" title=""></div>
                <div class="swiper-slide swiper-slide2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1480m_02_02.jpg" title=""></div>
                <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/2020/09/1480m_02_03.jpg" title=""></div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
      
    <div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1480m_03.gif" alt="" >
    </div>

    {{--
    <div class="evtCtnsBox evt_certi" >
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1480m_certi.jpg" alt="" usemap="#Map1480m_certi" border="0" >
        <map name="Map1480m_certi" id="Map1480m_certi">
            <area shape="rect" coords="143,1047,577,1105" href="https://pass.willbes.net/promotion/index/cate/3035/code/1480" target="_blank">
        </map>
    </div>
    --}}

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1480m_04.jpg" alt="" >   
    </div>

    <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">김동진법원팀 순환별 패키지 이용안내</h3>
        <div class="infoBox">
            <p class="NSK-Black"><span>●</span> 상품구성 </p>
            <ul>
                <li>본 PASS는 법원사무직 과정으로, 참여 교수진의 지정된 2021 대비 순환별 과정을 배수 제한 없이 무제한으로 수강 가능합니다.</li>
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
            <p class="NSK-Black"><span>●</span> 교재관련 (*4~5순환 패키지의 경우에만 해당)</p>
            <ul>
                <li>본 상품은 교재를 별도 구매하셔야 하며, 각 강좌별 교재는 무한PASS존 내 [교재구매] 버튼을 통해 구매 가능합니다.</li>
                <li>4순환 진도별모의고사 신청방법<br>
                    - 수강신청 후 ▷ 내강의실 ▷패키지강좌 ▷김동진 교수 민법 4순환 과정 클릭(전과목) ▷교재구매 클릭 ▷결제<br>
                    - 반드시 위 신청방법 참고하여 4순환 진도별모의고사 신청해 주셔야 만 배송됩니다.<br>
                    - 배송일정 :  1차 배송 9.22~23일경, 2차 10.22~26일경, 3차 11.20~23일경
                </li>
                <li>5순환 전범위모의고사 신청 안내 및 배송안내는 12월 말경 문자 공지 예정입니다.</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Container -->

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="javascript:goLecture('172372');">
        4~5순환 전과목 패키지 신청 >
        </a>
        <a href="javascript:goLecture2('171369');">
        1~3순환 법과목 패키지 신청 >
        </a>
    </div>
    <div id="pass" class="infoCheck">
        <input type="checkbox" name="y_pkg" value="162748" style="display: none;" checked/>
        <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
        <a href="#infoText">이용안내 확인하기 ↓</a>
    </div>
</div>

<script type="text/javascript">

    {{-- 수강신청 이동 --}}
    function goLecture(prod_code) {
        if ($('#is_chk').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }
        location.href = '{{ front_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + prod_code;
    }
    function goLecture2(code){
        if ($('#is_chk').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }
            var url = '{{ site_url('/package/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop