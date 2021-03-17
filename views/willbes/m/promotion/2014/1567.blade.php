@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evtMenu {background:#fff; width:100%; border-bottom:1px solid #edeff0; border-top:1px solid #edeff0}
    .tabs {width:100%; max-width:720px; margin:0 auto;}
    .tabs li {display:inline; float:left; width:25%}
    .tabs li a {display:block; text-align:center; font-size:14px; line-height:1.5; padding:15px 0; color:#999; font-weight:bold; letter-spacing:-1px;}
    .tabs li a:hover,
    .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
    .tabs:after {content:""; display:block; clear:both}

    .evt05 {text-align:left; padding:0 20px; margin-top:80px; word-break: keep-all;}
    .evt05 h5 {color:#3b3aaf; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
    .evt05 .evt05Txt01 { font-size:1.6rem;}
    .evt05 .curriculum {margin:30px 0}
    .evt05 dl {margin-top:30px;}
    .evt05 dl:first-child {margin:0}
    .evt05 dt {font-size:16px; font-weight:bold; color:#3b3aaf; margin:30px 0 10px}
    .evt05 dt:first-child {margin:0 0 10px}
    .evt05 dd {margin-bottom:10px; line-height:1.4}

    .evt05 .sample {margin-top:50px}
    .evt05 .sample li {display:inline; float:left; width:49%; padding:15px 0; margin-right:1%; border-radius:10px; 
        background: #acacac; color:#fff; font-size:16px; font-weight:600; text-align:center}
    .evt05 .sample li p {margin-bottom:15px;}
    .evt05 .sample li a {display:inline-block; padding:5px 10px; font-size:14px; margin:0 2px 5px; border-radius:4px; background:#000; color:#fff;}
    .evt05 .sample li a:hover {background:#fff; color:#000}
    .evt05 .sample li:last-child {margin:0}
    .evt05 .sample:after {content:""; display:block; clear:both}

    .evt05 .evt05Txt02 {font-size:14px; line-height:1.4; letter-spacing:-1px; color:#333; margin:20px auto 0; text-align:left}

    .evt06 {background:#f5f5f5}
    .evt06 .columns {padding:20px;
        column-count: 1;
        column-gap:20px;
    }
    .evt06 .columns div {
        text-align:justify; font-size:14px; line-height:1.4;
        display:inline-block;
        padding:20px; border:1px solid #eee; border-radius:10px;
        margin-bottom:20px; color:#888; background:#fff;
    }
    .evt06 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
    .evt06 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
    .evt06 .columns div strong {font-size:bold; color:#333}

    .evt07 {background:#6664ff; padding-bottom:20px}
    .evt07 li {display:inline; float:left; width:100%}
    .evt07 li a {display:block; font-size:1rem; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px; margin:0 20px;}
    .evt07 li a:hover {background:#fff; color:#000;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .evt07 li span {display:block; font-size:1.25rem}
    .evt07 ul:after {content:""; display:block; clear:both}

    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
        background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2);left:0; z-index:10;
        text-align:center;
    }

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
    .btnbuy a {display:block; width:100%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; 
        padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3b3aaf;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#3b3aaf;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px) {
        .evt07 li {display:block; float:none; width:100%; margin-bottom:5px}  
    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .evt07 li {display:block; float:none; width:100%; margin-bottom:5px}  
    }
    /* 태블릿 세로 */
    @@media only screen and (min-width: 690px) {
        .evt05 h5 br {display:none}
        .evt05 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}          
    }
</style>
<div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_top.jpg" alt="월매출 2억 신화 정문진 대표" >          
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_01.jpg" alt="월매출 2억 신화 정문진 대표" >          
    </div>
    
    <div class="evtMenu">
        <ul class="tabs">
            <li><a href="#tab01" data-tab="tab01" class="top-tab">수강신청</a></li>
            <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
            <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
            <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
        </ul>
    </div>

    <div id="tab01" class="evtCtnsBox">
        <a href="https://njob.stage.willbes.net/m/support/notice/show/cate/?board_idx=323127" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1567_02.jpg" alt="정문진" >
        </a>
    </div>

    <div id="tab02" class="evtCtnsBox mt50">
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/QZUkyd8EluI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
 
        <div>
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_03_01.jpg" alt=" " >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_03_02.jpg" alt=" " >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_03_03.jpg" alt=" " >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_04.jpg" alt=" " >
        </div> 
    </div>  

    <div id="tab03" class="evtCtnsBox">
        <div class="evt05">
            <h5 class="NSK-Black">
                <div>무재고 배송대행 <Br> 도매매 샵플링 </div>
                <div>진짜 고수에게 배우는<Br> 이커머스 운영전략 커리큘럼</div> 
            </h5>
            <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>

            <ul class="sample">
                @if(empty($arr_base['promotion_otherinfo_data']) === false)
                    @php $i = 1; @endphp
                    @foreach($arr_base['promotion_otherinfo_data'] as $row)
                        <li>
                            <p>{{$i}}강 맛보기 수강 ▼</p>
                            <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");'>고해상도 ></a>
                            <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=SD", "{{config_item('starplayer_license')}}");'>저해상도 ></a>
                        </li>
                        @php $i += 1; @endphp
                    @endforeach
                @else
                    <li><a href="#none">1강 맛보기 수강 준비중 ></a></li>
                    <li><a href="#none">2강 맛보기 수강 준비중 ></a></li>
                @endif
            </ul>

            <div class="evt05Txt02">
                * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                * 스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                * 팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
            </div>

            <div class="curriculum">
            	<dl>
                    <dt>INTRO. 안녕하세요, 잘나가는 유통선배 정문진입니다.</dt> 
                    <dd>- 이 강의를 들어야 하는 이유</dd>
                    <dd>- 이 강의에서 우리가 배울 내용</dd>                

                    <dt>Chapter 1. 쇼핑몰 창업 준비 사항</dt>
                    <dd>- 사업자 신고 및 통신판매업 신고</dd>   
                    <dd>- 오픈 마켓 판매자 입점</dd>
                    <dd>- 샵플링 가입 및 안내</dd>                    

                    <dt>Chapter2. 쇼핑몰 운영을 위한 유용한 정보</dt>
                    <dd>- 스마트 워킹을 위한 필수 프로그램</dd>
                    <dd>- 스마트 워킹을 위한 유용한 정보</dd>
                    <dd>- 도매꾹과 도매매의 차이점</dd>
                    <dd>- 오픈 마켓 전체 상품 공지 사항 설정</dd>
                    <dd>- 이미지 호스팅_ebay와 11번가</dd>
                    
                    <dt>Chapter 3. 쇼핑몰 운영을 위한 통합 솔루션 기본 설정법</dt>
                    <dd>- 도매매 API 연동하기</dd>
                    <dd>- 쇼핑몰 연동 – 5대 오픈마켓 (지마켓, 옥션)</dd>
                    <dd>- 쇼핑몰 연동 – 5대 오픈마켓 (11번가, 스마트스토어)</dd>
                    <dd>- 쇼핑몰 연동 – 5대 오픈마켓 (인터파크) </dd>
                    <dd>- 쇼핑몰 연동 – 3대 소셜커머스 (쿠팡, 티몬, 위메프)</dd>
                    <dd>- 쇼핑몰 기본 및 배송 정보 설정_G마켓 상품등록 1.0</dd>
                    <dd>- 쇼핑몰 기본 및 배송 정보 설정_G마켓 상품등록 2.0</dd>
                    <dd>- 쇼핑몰 기본 및 배송 정보 설정_옥션 상품등록 1.0</dd>
                    <dd>- 쇼핑몰 기본 및 배송 정보 설정_옥션 상품등록 2.0</dd>
                    <dd>- 쇼핑몰 기본 및 배송 정보 설정_11번가 일반상품</dd>
                    <dd>- 쇼핑몰 기본 및 배송 정보 설정_11번가 단일상품</dd>
                    <dd>- 쇼핑몰 기본 및 배송 정보 설정_인터파크</dd>
                    <dd>- 쇼핑몰 기본 및 배송 정보 설정_스마트스토어</dd>
                    <dd>- 쇼핑몰 기본 및 배송 정보 설정_3대 소셜커머스 (쿠팡, 티몬, 위메프)</dd>

                    <dt>Chapter 4. 좋은 상품 소싱하는 방법과 우수 공급사 찾기</dt>
                    <dd>- 무재고 배송 대행 상품 선정의 이해</dd>
                    <dd>- 시즌상품 키워드 선정 방법 (ESM 시즌키워드)</dd>
                    <dd>- 상품판매 주기 확인 방법 (네이버 데이터랩)</dd>
                    <dd>- 도매매 사이트 내 우수 상품 및 공급사 찾는 방법</dd>

                    <dt>Chapter 5. 대량으로 쇼핑몰 상품 등록 및 발주하기</dt>
                    <dd>- 쇼핑몰 상품 등록</dd>
                    <dd>- 수량 별 배송 기본 설정</dd>
                    <dd>- 묶음 배송 설정</dd>
                    <dd>- 도매매 현금성 e-money 충전방법</dd>
                    <dd>- 도매매 주문 방법</dd>
                    <dd>- 도매매 운송장 처리</dd>

                    <dt>Chapter 6. 고객 클레임 처리하는 방법</dt>
                    <dd>- 쇼핑몰 고객 클레임 처리 취소 관련</dd>
                    <dd>- 쇼핑몰 고객 클레임 처리 반품 관련</dd>
                    <dd>- 쇼핑몰 고객 클레임 처리 교환 관련</dd>

                    <dt>Chapter 7. 매출과 바로 연결되는 쇼핑몰 별 최적화 팁</dt>
                    <dd>- G마켓/옥션 상품 등록 최적화 (1)</dd>
                    <dd>- G마켓/옥션 상품 등록 최적화 (2)</dd>
                    <dd>- G마켓/옥션 상품 등록 최적화 (3)</dd>
                    <dd>- 11번가 상품 등록 최적화 (1)</dd>
                    <dd>- 11번가 상품 등록 최적화 (2)</dd>
                    <dd>- 11번가 상품 등록 최적화 (3)</dd>
                    <dd>- 스마트스토어 상품 등록 최적화 (1)</dd>
                    <dd>- 스마트스토어 상품 등록 최적화 (2)</dd>
                    <dd>- 스마트스토어 상품 등록 최적화 (3)</dd>
                    <dd>- 스마트스토어 상품 등록 최적화 (4)</dd>
                    <dd>- 인터파크 상품 등록 최적화 (1)</dd>
                    <dd>- 인터파크 상품 등록 최적화 (2)</dd>
                    <dd>- 쿠팡 상품 등록 최적화 (1)</dd>
                    <dd>- 쿠팡 상품 등록 최적화 (2)</dd>
                    <dd>- 쿠팡 상품 등록 최적화 (3)</dd>
                    <dd>- 위메프 상품 등록 최적화 (1)</dd>
                    <dd>- 위메프 상품 등록 최적화 (2)</dd>
                    <dd>- 티몬 상품 등록 최적화 (1)</dd>
                    <dd>- 티몬 상품 등록 최적화 (2)</dd>

                    <dt>Chapter 8. 통합 관리 솔루션, 현명하게 사용하기</dt>
                    <dd>- 쇼핑몰 통합 관리 솔루션 샵플링이란?</dd>
                    <dd>- 샵플링 동기화_상품 품절 시</dd>
                    <dd>- 샵플링 동기화_옵션 품절, 가격 설정</dd>
                    <dd>- 샵플링 동기화_상품 가격 설정</dd>
                    <dd>- 샵플링 동기화_상품 가격의 재설정</dd>
                    <dd>- 등록 실패 메시지 유형_상품명 관련</dd>
                    <dd>- 등록 실패 메시지 유형_카테고리 관련</dd>
                    <dd>- 등록 실패 메시지 유형_상품 정보 분류 관련</dd>
                    <dd>- 샵플링 활용과 팁_도매꾹 1일 1상품</dd>
                    <dd>- 샵플링 활용과 팁_도매매 공급사 공지사항</dd>
                    <dd>- 샵플링 활용과 팁_도매매 판매 상품 관리 방법</dd>
                    <dd>- 샵플링 활용과 팁_스마트스토어 내 해시태그 대량 등록</dd>
                    <dd>- 샵플링 활용과 팁_도매꾹/도매매 공급사로 상품 등록</dd>
                    <dd>- 샵플링 활용과 팁_도매매 엑셀 DB 다운로드 활용</dd>

                    <dt>OUTRO. 수고하셨습니다!</dt>
                    <dd>- 강의를 마치며 : 무재고 배송대행 성공하는 방법</dd><br>

                    <dd>(*커리큘럼은 사정에 따라 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.)</dd>
                </dl> 
            </div>           
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_05.jpg" alt="" >
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_06.jpg" alt="BEST 수강후기" >
            <div class="columns">
                <div>
                    <h4>수강생 이*경님</h4>
                    <p></p>
                    2주차 부터는 본격적으로 스토어운영 관련 키워드 분석과 시즌 상품 키워드에 대해 실천 팁을
                    아낌없이 공개해주시는 강사님! 강사님 수업이 참 매력적이에요. 조용조용 할 얘기 다 하면서 웃자고 건넨 농담에 
                    그다지 웃기지 않는 반응에 대처하는 강사님이 귀여워요.
                </div>  
                <div>
                    <h4>수강생 김*용님</h4>
                    <p></p>
                    지난주 수업이 끝나고 이번 주는 혼자서 열심히 상품 등록하고 있어요.매일 꾸준히 상품에 대해 공부하면서
                    상품 등록을 반복해야 해요. 상품 등록은 익숙하게 잘 할 수 있어요. 샵플링을 통해 등록된 상품의 주문도 들어와서
                    발주 및 운송장 처리도 해봤어요. 아직은 주문이 많지 않아 서서히 하고 있어요.
                    앞으로 주문이 많아 질 날을 기대하면서, 좋은 상품을 찾아봅니다.
                    찾고 찾아 상품등록도 해보는 중입니다.
                </div> 
                <div>
                    <h4>수강생 신*한님</h4>
                    <p></p>
                    생각했던 것 보다 더, 기대했던 것보다 훨씬 더 내용이 알차고 좋았어요.
                    정문진 대표님이 실제 경험에서 우러난 강의여서 더욱더 좋았답니다.
                    다음기회에 한 번 더 들어보고 싶어요. 정문진 대표님의 동영상 강의도 찾아서 들어보려고 합니다.
                    수고해주신 강사님게 감사한 마음을 전합니다.
                </div>        
            </div>                
        </div>
        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_07.jpg" alt="BEST 수강후기" >
            <ul>
                <li>
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
                    <span class="NSK-Black">지금, 수강신청하고 </span>
                    제2의 월급통장 만들기 도전! →
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

        <p># 수강안내</p>
        <ul>
            <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
            <li>PC/휴대폰/태블릿에서 언제든 수강가능합니다.</li>
            <li>커리큘럼은 사정에 따라 일부 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.</li>
            <li>동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
            스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
            팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.</li>
            <li>결제 완료 시 강의는 즉시 수강 시작되오니, 이 점 참고 부탁 드립니다.</li>
            <li>수강상품 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
            <li>본 강의는 재수강,수강연장은 불가능합니다.</li>
        </ul>

        <p># 환불안내</p>
        <ul>
            <li>이용안내 및 환불 특약으로 안내된 별도 환불 기준이 있는 경우 우선 적용합니다.</li>
            <li>강의재생시간에 관계없이 강의를 재생한 경우, 학습 자료 및 모바일 다운로드 이용한 경우 수강한 것으로 간주합니다.(맛보기 강의 제외)</li>
            <li>강좌비*에서 기수강 강의수에 대한 금액* 및 위약금*(강의 정상가의 10%)을 차감 후 부분 환불이 진행됩니다.<br>
            * 강좌비: 결제금액에서 서비스프로그램 등 추가 혜택에 해당하는 금액을 차감한 순수강좌비<br>
            * 기수강강의 금액: 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수)<br>
            * 수강시작일로부터 7일 이내 위약금 없음<br>
            * 수강시작일로부터 7일 이후 위약금 적용 (정상가의 10% 공제) </li>
            <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.<br>
            (샵플링 프로그램 1개월 정가 275,000원 기준 환불시 기사용분 차감)</li>
            <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
            <li>총강의수 전체 기수강 시에는 전액환불이 불가합니다.</li>
        </ul>

        <p># 기타유의사항</p>
        <ul>
            <li>제공되는 사은혜택과 동영상은 구분하여 별도구매 불가합니다.</li>
            <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다. </li>
            <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
            <li>지급된 샵플링 프로그램 이용을 위해서는 사업자등록번호가 필요합니다. (2020년 4월 9일 이전 별도 공지)</li>
        </ul>

        <div>※ 이용문의 : 고객만족센터 1544-5006</div>
    </div>
</div>
<!-- End Container -->


<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">
        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
            [온라인강의] 신청하기 >
        </a>
    </div>
    <div id="pass" class="infoCheck">
        <input type="checkbox" name="y_pkg" value="162746" style="display: none;" checked/>
        <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
        <a href="#infoText">이용안내 확인하기 ↓</a>
    </div>
</div>

    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDownText('{{$arr_promotion_params['edate']}}');
        });

        /*스크롤고정*/
        $(function() {
            var nav = $('.evtMenu');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });

        $(window).on('scroll', function() {
            $('.top-tab').each(function() {
                if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                    $('.top-tab').removeClass('active')
                    $(this).addClass('active');
                }
            });
        });

        function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
        {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form = $('#' + ele_id);
            var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
            var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
            var params;

            if ($is_chk.length > 0) {
                if ($is_chk.is(':checked') === false) {
                    alert('이용안내에 동의하셔야 합니다.');
                    $is_chk.focus();
                    return;
                }
            }

            if ($prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            {{-- 장바구니 저장 기본 파라미터 --}}
                params = [
                { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
                { 'name' : '_method', 'value' : 'POST' },
                { 'name' : 'cart_type', 'value' : cart_type },
                { 'name' : 'learn_pattern', 'value' : learn_pattern },
                { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
            ];

            {{-- 선택된 상품코드 파라미터 --}}
            $prod_code.each(function() {
                params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
            });

            {{-- 장바구니 저장 URL로 전송 --}}
            formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
        }

        // 날짜차이 계산
        var dDayDateDiff = {
            inDays: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
            },
            inWeeks: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return parseInt((tt2-tt1)/(24*3600*1000*7));
            },
            inMonths: function(dd1, dd2) {
                var dd1Y = dd1.getFullYear();
                var dd2Y = dd2.getFullYear();
                var dd1M = dd1.getMonth();
                var dd2M = dd2.getMonth();

                return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
            },
            inYears: function(dd1, dd2) {
                return dd2.getFullYear()-dd1.getFullYear();
            }
        };

        {{--
         * 프로모션용 디데이카운터 텍스트
         * @@param end_date [마감일 (YYYY-MM-DD)]
        --}}
        function dDayCountDownText(end_date, ele_id) {
            if(!ele_id) ele_id = 'ddayCountText';
            var arr_end_date = end_date.split('-');
            var event_day = new Date(arr_end_date[0], parseInt(arr_end_date[1]) - 1, arr_end_date[2], 23, 59, 59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));
            var date_left = String( dDayDateDiff.inDays(now, event_day) );
            var hour_left = String( timeGap.getHours() );
            var minute_left = String( timeGap.getMinutes() );
            var second_left = String(  timeGap.getSeconds() );

            if(date_left.length == 1) date_left = '0' + date_left;
            if(hour_left.length == 1) hour_left = '0' + hour_left;
            if(minute_left.length == 1) minute_left = '0' + minute_left;
            if(second_left.length == 1) second_left = '0' + second_left;

            if ((event_day.getTime() - now.getTime()) > 0) {
                $('#'+ele_id).html(hour_left + ':' + minute_left + ':' + second_left);
                $('#ddayCountDayText').html(date_left + '일 ');

                setTimeout(function() {
                    dDayCountDownText(end_date, ele_id);
                }, 1000);
            } else {
                $('#'+ele_id).hide();
            }
        }

    </script>

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop