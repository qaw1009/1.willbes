@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1965_top_bg.jpg) no-repeat center top;}	      
        .evt02 {background:#f0f0f0;padding-bottom:100px;}

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#555; color:#fff; line-height:1.5}
        .guide_box{width:980px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}
        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1965_top.jpg" alt="" border="0" />
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1965_01.jpg" alt="" />
		</div>

		<div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1965_02.jpg" alt="" usemap="#Map1965" border="0" />
            <map name="Map1965">
                <area shape="rect" coords="636,790,859,861" href="#none" alt="예비+정규순환">
                <area shape="rect" coords="636,1054,862,1122" href="#none" alt="정규순환">
            </map>
        </div> 
        
        <div class="evtCtnsBox evtInfo" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 윌비스김동진법원팀 교수진의 지정된 순환별 과정을 배수 제한 없이 무제한 수강 가능합니다.</li>
                            <li>「예비+정규순환」 상품 : <br>
                            민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 국어(이현나), 영어(박초롱), 한국사(임진석) 교수별 예비순환 및 1~5순환 과정</li>
                            <li>「정규순환」 상품 : <br>
                            민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 국어(이현나), 영어(박초롱), 한국사(임진석) 교수별 1~5순환 과정</li>
                            <li class="none">※ 개강 전후 부득이한 학원 사정에 의해 일부 강사진의 변동이 있을 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>등록일부터 2022년 2월 28일까지 제공되며, 결제가 완료되는 즉시 수강 가능한 강의가 제공됩니다.</li>
                            <li> ｢예비+정규순환｣ 상품의 경우, 2021년 1월 4일부터 2021년 예비순환 강의가 순차적으로 업로드 되어 제공됩니다.</li>
                            <li>2021년 4월 초부터 2021년 1~5순환 강의가 일정에 맞추어 순차적으로 업로드 되어 제공됩니다.</li>                                                        
                        </ol>
                    </dd>
                    <dt>수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>홈페이지 [내강의실] 메뉴에서 [무한PASS존]으로 접속합니다.</li>
                            <li>접속 후 구매하신 무한PASS 상품명 옆의 [강좌추가]를 선택합니다.</li>
                            <li>원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                            <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 
                                추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>                      
                        </ol>
                    </dd>
                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 교재는 무한PASS존 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                            <li>4~5순환 모의고사 문제 및 해설지는 택배를 통해 실물로 배송됩니다. 구체적인 방법은 4순환 개강 전 별도 고지해드립니다.</li>                      
                        </ol>
                    </dd>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                            <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 
                            구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>                      
                        </ol>
                    </dd>
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민형사상 책임을 질 수 있습니다.</li>                      
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>

	</div>
    <!-- End Container -->
@stop