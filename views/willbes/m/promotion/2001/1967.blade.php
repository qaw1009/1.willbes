@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; word-break: keep-all;}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .title {font-size:30px;  margin:20px 10px; text-align:left; color:#65069b}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left;background:#555; color:#fff; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#fff}
    .evtFooter p {margin-bottom:10px; color:#fff; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {

    }
    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_mpolice.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_mtop.jpg" alt="" >
    </div> 
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_m01.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_m02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_m03.jpg" alt="" >
    </div> 
    
    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
    @endif

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_m04.jpg" alt="" >
    </div> 

    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
    @endif

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_m05.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_m06.jpg" alt="" usemap="#Map1967a" border="0" >
        <map name="Map1967a" id="Map1967a">
            <area shape="rect" coords="279,693,441,742" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/175823" target="_blank" />
            <area shape="rect" coords="278,975,441,1023" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/175824" target="_blank" />
        </map>
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_m07.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_m08.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_m09.jpg" alt="" usemap="#Map1967b" border="0" >
        <map name="Map1967b" id="Map1967b">
            <area shape="rect" coords="581,81,668,105" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1007" target="_blank" />
            <area shape="rect" coords="581,201,668,225" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1008" target="_blank" />
            <area shape="rect" coords="581,328,669,352" href="javascript:alert('1월중 오픈 예정!')"  />
        </map>
    </div> 

    <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">윌비스 신광은 경찰 실전문제풀이 풀패키지 이용안내</h3>
        <p>● 상품구성 </p>
        <ul>
            <li>1.선택한 문제풀이 풀패키지 표기 기간 동안 문풀 1~3단계 전 강좌를 무제한 수강 할 수 있습니다.</li>
            <li>2.문풀 풀패키지 일바 직렬의 경우 한국사 교수님을 1분 선택하셔야 합니다.(변경은 불가)</li>
            <li>3.문풀 풀패키지 강좌는 결제 완료 후 수강이 즉시 시작됩니다.(수강일 설정 불가)</li>
        </ul>

        <p>● 수강관련</p>
        <ul>
            <li>1.로그인 후 [내 강의실]-[무한 PASS존]으로 접속합니다.
            <br/>&nbsp;&nbsp;&nbsp;구매하신 [실전 문풀 풀패키지] 선택 후 [강좌 추가하기]클릭, 원하시는 강좌를 등록하시면 수강 할 수 있습니다.</li>
            <li>2.문풀 풀패키지는 시작일 변경 및 지정,일시정지,수강 연장,재수강 신청 등이 되지 않는 상품입니다.</li>
            <li>3.문풀 풀패키지 수강 시 이용 가능한 기기는 2대로 제한됩니다.(PC 2대 또는 모바일 2대 또는 PC 1대+모바일 1대)</li>
            <li>4.PC,모바일 등 단말기 초기화가 필요한 경우 최초 초기화는 본인이 직접 초기화 진행 가능 합니다.
            <br/>&nbsp;&nbsp;&nbsp;그 이후 추가 초기화가 필요할 시 내용 확인 후 초기화 진행 가능 하오니 고객센터로 문의 바랍니다.
            (무한 PASS존 내 등록 기기정보 확인)</li>
            <li>5. 21년 1차대비 2단계,3단계 문제풀이 강의는 강의자료 3회출력제한 됩니다. <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=252343" target="_blank">출력제한 안내 바로보기 ></a></li>
        </ul>

        <p>● 교재 구매</p>
        <ul>
            <li>1.실전 문풀 패키지 강의에 사용되는 교재는 별도로 구매하셔야 하며,각 강좌별 교재는 강좌 소개 및 [교재구매] 메뉴에서 구매 가능합니다.</li>     
        </ul>

        <p>● 환불 안내</p>
        <ul>
            <li>1.결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li> 
            <li>2.고객 변심으로 인한 부분 환불은 수강 시작일(당일포함)로부터 7일이 경과되면,문제풀이 풀패키지 정가 기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.</li>
        </ul>

        <p>● 유의사항</p>
        <ul>
            <li>1.본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립급 사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li> 
            <li>2.신광은 경찰 PASS 강좌(부가 서비스 등)중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
            <li>3.아이디 공유,타인양도 등 부정 사용 적발 시 회원 자격 박탈 및 환불 불가하며,불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
        </ul>

        <div>※ 이용문의:고객만족센터 1544-5006</div>
    </div>  

<!-- End Container -->
@stop