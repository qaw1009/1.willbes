@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    .evtCtnsBox .wrap a:hover {box-shadow:0 5px 20px rgba(0,0,0,.5); border-radius:20px}

    .evtInfo {padding:50px 20px; font-size:14px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:30px; margin-bottom:40px}
    .evtInfoBox .infoTit {font-size:18px;margin-bottom:15px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {list-style-type:disc; margin-left:20px; margin-bottom:5px}
</style>


<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox evt00" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_01.jpg" alt="기초 입문서 무료 배포 이벤트"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_02.jpg" alt="살펴보기"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_03.jpg" alt="진짜는 다르다"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_04.jpg"  alt="1+5 추가혜택"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_05.jpg"  alt="무료 혜택"/>
            <a href="#none" title="2020 기초입문서" style="position: absolute; left: 20.5%; top: 27.45%; width: 58.47%; height: 7.29%; z-index: 2;"></a>
            <a href="#none" title="3법 기초입문강의" style="position: absolute; left: 20.5%; top: 36.36%; width: 58.47%; height: 7.29%; z-index: 2;"></a>
            <a href="#none" title="G-TELP 문법강의" style="position: absolute; left: 20.5%; top: 45.02%; width: 58.47%; height: 7.29%; z-index: 2;"></a>
            <a href="#none" title="한능검 기본개념편" style="position: absolute; left: 20.5%; top: 53.68%; width: 58.47%; height: 7.29%; z-index: 2;"></a>
            <a href="#none" title="PASS 10%할인쿠폰" style="position: absolute; left: 20.5%; top: 62.11%; width: 58.47%; height: 7.29%; z-index: 2;"></a>
            <a href="#none" title="단과 20%할인쿠폰" style="position: absolute; left: 20.5%; top: 70.69%; width: 58.47%; height: 7.29%; z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evtInfo" id="careful">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">이벤트 유의사항</h4>
            <ul>
                <li>본 이벤트는 준비된 수량이 조기 소진될 경우 이벤트 조기 종료 및 당첨이 취소 될 수 있습니다.</li> 
                <li>윌비스 회원대상으로 1개의 ID당 1번만 참여 가능하며, 비회원의 경우 신규가입 후 참여 가능합니다.</li> 
                <li>기초입문서 교재는 비매품으로 배송비는 본인 부담입니다. (배송비 2,500원)</li> 
                <li>입문서 무료로 받기 신청한 회원께서는 장바구니에 지급된 교재 배송비를 결제해 주셔야 출고가 진행됩니다.</li> 
                <li>기초입문서 이벤트 교재는 로그인>장바구니(교재) 확인가능합니다.</li> 
                <li>3법기초입문강의는 내강의실 >수강중인강의> 관리자 부여강좌(단과) 확인가능합니다. (기간 20일)</li> 
                <li>G-TELP 문법강의는 내강의실 >수강중인강의> 관리자 부여강좌(단과) 확인가능합니다. (기간 7일)</li> 
                <li>한능검 기본개념편 강의는 내강의실 >수강중인강의> 관리자 부여강좌(단과) 확인가능합니다(기간 7일)</li> 
                <li>PASS 10%쿠폰 및 단과 20%쿠폰은 온라인 전용이며 쿠폰현황에서 확인가능합니다.(유효기간 7일)</li>                
            </ul>		
        </div>
    </div> 
</div>	

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $( document ).ready( function() {
    AOS.init();
    } );
</script>


@stop