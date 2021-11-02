@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .sky {position:fixed;top:200px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2401_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#f4f4f4;}

        .evt03 {background:#f4f4f4;}        

        .evt04 {padding:100px 0; width:1120px; margin:0 auto}
        .evt04 .sTitle {margin:50px 0 30px; font-size:25px; text-align:left; color:#464646}

        .evtInfo {padding:80px 0; background:#e1e3e3; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:2.0;}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:16px;}
        .evtInfoBox .infoTit{font-size:35px;padding-bottom:25px;}     
        .evtInfoBox ul {margin-bottom:30px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/promotion/index/cate/3103/code/2395" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2401_sky.png" alt="바로가기">
            </a>
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-down">           
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2401_top.jpg" alt="실전덕후단 수강후기"/>              
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2401_01.jpg" alt="교수진" />
        </div>                   

        <div class="evtCtnsBox evt02" data-aos="fade-left"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2401_02.jpg" alt="100% 선물당첨" />
                <a href="https://www.willbes.net/classroom/home/index" target="_blank" title="후기 쓰러 가기" style="position: absolute;left: 28.98%;top: 81.43%;width: 41.46%;height: 8.77%;z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2401_03.jpg" alt="어떻게 작성?" />
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2401_04.jpg" alt="강의 신청" />
            <div class="sTitle NSK-Black">실전 464</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <div class="sTitle NSK-Black">새벽실전 모의고사</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
            <div class="sTitle NSK-Black">ONEDAY 특강            </div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @endif
        </div>

        <div class="evtCtnsBox evtInfo">
			<div class="evtInfoBox">			
                <div class="infoTit"><strong>이벤트 유의사항</strong></div>
				<ul>
                    <li>본 이벤트는 윌비스 공무원 회원 누구나 참여 가능합니다.</li>
                    <li>이벤트 기간 : ~2021년 11월 17일 (수)</li>
                    <li>당첨자 발표일 : 2021년 11월 18일 (목) 윌비스 공무원 공지사항</li>
                    <li>유/무료 강좌 관계 없이 실전덕후단 커리큘럼에 해당하는 강좌를 수강하신 후 수강 후기를 작성해주시면 이벤트 자동 참여로 간주됩니다.<br>
                        - 실전덕후단 교수진 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 행정학 김철, 행정법 이석준<br>
                        - 커리큘럼 : 실전464, ONEDAY 특강, 새벽실전모의고사
                    </li>
                    <li>1명이 여러 개의 수강후기를 작성한 경우, 당첨 확률이 높아집니다.</li>
                    <li>지나치게 성의 없는 수강후기나 무분별한 욕설/비방 후기의 경우 관리자에 의하여 임의 삭제 처리 및 전원 당첨 경품 지급 시 제외될 수 있습니다.</li>
                    <li>수강후기 작성 혜택 및 사용법, 기간 등은 당첨자 발표 시 안내드릴 예정입니다.</li>
				</ul>
			</div>
		</div>

    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

    <script type="text/javascript">
       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop