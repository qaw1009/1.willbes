@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff url(https://static.willbes.net/public/images/promotion/2019/12/1484_top_bg.jpg) no-repeat center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {position:relative}
        .rulletBox {position:absolute; top:1670px; width:810px; left:50%; margin-left:-400px; z-index:5}
        .rulletBox .btn-roulette {position:absolute; top:280px; width:255px; height:255px; left:50%; padding:0; margin:0; margin-left:-127px; background:none; z-index:6}
        .rulletBox a {position:absolute; top:670px; left:670px; width:80px; height:80px; line-height:60px; color:#810000; background:#fff; border-radius:40px; font-weight:bold; font-size:16px;
            border:10px solid #810000; z-index:6}
        .rulletBox a:hover {background:#810000; color:#fff}

        .wb_01 {background:#f0f1eb; padding-bottom:100px}

        .giftPopupWrap {
            position:absolute; 
            /*display: none;*/
            background: rgba(0, 0, 0, 0.6);
            filter: alpha(opacity=60);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;            
            width: 100%;
            height: 100%;  
            z-index: 105;        
        }
        .giftPop {width:728px; margin:150px auto 0; position:relative}
        .giftPop span {display:block; position:absolute; top:245px; width:100%; text-align:center; z-index:10}

        .wb_ctsInfo {background:#2b2b2b; padding:100px 0}  
        .wb_ctsInfo div {width:1000px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;
            font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#f97f7a}  
        .wb_ctsInfo div ul {margin-bottom:30px}
        .wb_ctsInfo div li {
		    margin-left:15px;
            list-style:disc;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="giftPopupWrap" id="giftPopupWrap" style="display: none;">
            <div class="giftPop">
                <img src="https://static.willbes.net/public/images/promotion/2019/09/1388_rull_popup.png" alt="당첨팝업" usemap="#Map1289pop" border="0"/>
                <map name="Map1289pop" id="Map1289pop">
                    <area shape="rect" coords="341,484,387,527" href="#none" onclick="closeWin('giftPopupWrap')" alt="닫기" />
                </map>
                {{-- 상품이미지 01 ~ 08 --}}
                <span id="gift_box_id"></span>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1484_top.gif" alt="새해맞이 합격선물 대잔치" usemap="#Map1484A" border="0"/>
            <map name="Map1484A" id="Map1484A">
                <area shape="rect" coords="295,666,413,755" href="#event01" alt="합격다짐 룰렛대잔치" />
                <area shape="rect" coords="501,668,620,753" href="#event02" alt="신규가입 축하대잔치" />
                <area shape="rect" coords="704,665,826,754" href="#event03" alt="새해맞이 소문대잔치" />
            </map>
            <br>
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1484_top_rull.jpg" alt="합격다짐 룰렛대잔치" id="event01"/>
            <div class="rulletBox">
                <canvas id="box_roulette" class="tutCanvas" width="810" height="810">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2019/09/1388_rull_start.png" alt="start" /></button>
                <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
            </div>
        </div>

        {{--댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1484_01.jpg" alt="신규가입 축하대잔치" usemap="#map1484z" id="event02" border="0"/>
            <map name="map1484z" id="map1484z">
                <area shape="rect" coords="435,1061,719,1134" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank" />
            </map>
            <Br>
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1484_02.jpg" alt="새해맞이 소문대잔치" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="201,1043,389,1138" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" alt="공무원갤러리" />
                <area shape="rect" coords="196,1152,388,1245" href="https://cafe.naver.com/polstudy/" target="_blank" alt="순경 갤러리" />
                <area shape="rect" coords="427,1040,595,1135"  href="http://cafe.daum.net/9glade" target="_blank" alt="구꿈사" />
                <area shape="rect" coords="426,1150,595,1244" href="http://cafe.daum.net/policeacademy?q=%B0%E6%BD%C3%B8%F0" target="_blank" alt="경시모" />
                <area shape="rect" coords="641,1035,819,1141" href="https://cafe.naver.com/gugrade" target="_blank" alt="공드림" />
                <area shape="rect" coords="637,1149,819,1249" href="https://cafe.naver.com/polstudy/" target="_blank" alt="경꿈사" />
                <area shape="rect" coords="857,1100,1025,1200" href="https://cafe.naver.com/willbes" target="_blank" alt="네이버카페 윌비스" />
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial', array('bottom_cafe_type'=>'N'))
        @endif
        

        <div class="wb_ctsInfo" id="ctsInfo">
            <div>
                <h3 class="NGEB">이벤트 유의사항</h3>
                <div>*이벤트 참여 전 유의사항을 반드시 읽어주시기 바랍니다.</div>
                <div class="mt20"><strong>[이벤트 공통 유의사항]</strong></div>
                <ul>
                    <li>본 이벤트 진행 기간은 2019.12.31.(화)~2020.1.19.(일), 총 20일간 입니다.</li>
                    <li>진행된 이벤트에 대한 당첨자 발표는 2020.1.21.(화) 윌비스 통합 공지사항 및 공무원/경찰 각 공지사항에서 확인하실 수 있습니다.</li>
                    <li>본 이벤트는 윌비스 회원만 참여 가능합니다.</li>
                    <li>제공되는 이벤트 경품은 파트너사의 사정에 의해 동일 금액의 유사 상품으로 변경될 수 있습니다.</li>
                    <li>기프티콘에 대한 재발송은 불가하오니, 이벤트 종료일 이전까지 올바른 전화번호로 수정해주시기 바랍니다.</li>
                    <li>각 이벤트 내 중복 당첨은 불가하나, 이벤트 간 중복 당첨은 가능합니다.</li>
                </ul> 
                <div class="mt20"><strong>[합격다짐 룰렛대잔치]</strong></div>
                <ul>
                    <li>본 이벤트는 신규회원/기존회원 모두 참여 가능합니다.</li>
                    <li>합격다짐 댓글 작성 시, [내강의실]-[쿠폰/포인트]에 강의포인트 1,000점이 자동 적립됩니다. (*유효기간 : 7일)</li>
                    <li>댓글 작성 시 지급되는 강의포인트 1,000점은 아이디당 최초 1회만 지급됩니다. (*중복 지급 불가)</li>
                    <li>룰렛이벤트의 경우, 윌비스 회원이면 누구나 조건 없이 이벤트 기간 내 1계정당 1번씩 참여 가능합니다.</li>
                </ul> 
                <div class="mt20"><strong>[신규가입 축하대잔치]</strong></div>
                <ul>
                    <li>본 이벤트는 2020년 1월 1일 이후에 가입한 신규회원만 참여 가능합니다.</li>
                    <li>이벤트 기간 내 공무원or경찰 사이트 내에서 3만원 이상 결제완료 시 이벤트에 자동 참여됩니다.</li>
                </ul>
                <div class="mt20"><strong>[새해맞이 소문대잔치]</strong></div>
                <ul>
                    <li>본 이벤트는 신규회원/기존회원 모두 참여 가능합니다.</li>
                    <li>지정된 커뮤니티 외 타 커뮤니티/SNS 등에 작성한 글은 인정되지 않습니다.</li>
                    <li>이벤트 종료일을 기준으로 삭제/수정된 글 및 비공개 처리된 글은 정상 참여로 인정되지 않습니다.</li>
                    <li>다양한 커뮤니티에 다양한 내용으로 참여 시, 당첨확률이 올라갑니다.</li>
                    <li>소문내기 글 제목에 “윌비스”, “선물대잔치” 키워드가 반드시 포함되어야 정상 참여로 인정됩니다.</li>
                </ul>     
                <p class="NSK"><span>※ 이용문의 : 고객만족센터 1544-5006</span></p>
            </div>
        </div>
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.roulette_script')
@stop