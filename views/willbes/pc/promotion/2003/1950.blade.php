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
            background:#fff url(https://static.willbes.net/public/images/promotion/2020/12/1950_top_bg.jpg) no-repeat center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto;}

        /************************************************************/

        .topimg01,
        .topimg02 {position:absolute; left:50%; z-index:1;}
        .topimg01 {width:353px; margin-left:-520px; top:-20px; -webkit-animation:swing 2s linear infinite;animation:swing 2s linear infinite}
        @@keyframes swing{
            0%{-webkit-transform:rotate(5deg);-webkit-transform-origin:0 0;transform:rotate(5deg);transform-origin:0 0;}
            50%{-webkit-transform:rotate(0deg);-webkit-transform-origin:0 0;transform:rotate(0deg);transform-origin:0 0}
            100%{-webkit-transform:rotate(5deg);-webkit-transform-origin:0 0;transform:rotate(5deg);transform-origin:0 0}
        }
        .topimg02 {top:1188px; width:1105px; margin-left:-507px}

        .wb_top {position:relative; overflow:hidden}

        .rulletBox {position:absolute; top:649px; width:810px; left:50%; margin-left:-410px; z-index:5}
        .rulletBox .btn-roulette {position:absolute; top:280px; width:255px; 
            height:255px; left:50%; padding:0; margin:0; margin-left:-127px; background:none; z-index:6}
        .rulletBox a {position:absolute; top:650px; left:650px; width:80px; height:80px; line-height:60px; color:#000; background:#fff; 
            border-radius:40px;
            border:10px solid #000; z-index:6}
        .rulletBox a:hover {background:#5a14d6; color:#fff}
        .wb_01 {width:1120px; margin}
        .wb_02 {background:#ebebeb;}
        .wb_03 {background:#555}

        .giftPopupWrap {
            position:absolute; 
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
        .giftPop {width:786px; margin:100px auto 0; position:relative}
        .giftPop span {display:block; position:absolute; top:343px; width:100%; text-align:center; z-index:10}

        /* 이용안내 */
        .wb_info {padding:100px 0; background:#555; color:#fff}
        .guide_box{width:980px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px; }
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}        
        .guide_box dd{color:#fff; margin:0 0 20px 5px; line-height:17px}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:13px;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="giftPopupWrap" id="giftPopupWrap" style="display:none;">
            <div class="giftPop">
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1950_rull_popup.png" alt="당첨팝업" usemap="#Map1950pop" border="0"/>
                <map name="Map1950pop" id="Map1950pop">
                    <area shape="rect" coords="637,85,715,163" href="#none" onClick="closeWin('giftPopupWrap')" alt="닫기" />
                </map>
                {{-- 상품이미지 01 ~ 08 --}}
                <span id="gift_box_id"></span>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1950_top.jpg" alt="룰렛 이벤트"/>
            <div class="rulletBox">
                <canvas id="box_roulette" class="tutCanvas" width="810" height="810">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette('https://static.willbes.net/public/images/promotion/2020/12/1950_rull_gift0','png'); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2020/06/1698_rull_start.png" alt="start" /></button>
                <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
            </div>
            <div class="topimg01"><img src="https://static.willbes.net/public/images/promotion/2020/12/1951_img01.png" alt="산타"/></div>
            <div class="topimg02"><img src="https://static.willbes.net/public/images/promotion/2020/12/1951_img02.png" alt="선물"/></div> 
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1950_01.jpg" alt="룰렛 이벤트" usemap="#Map1950A" border="0" />
            <map name="Map1950A">
                <area shape="rect" coords="254,639,368,680" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" target="_blank" alt="신규가입">
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1950_02.jpg" alt="룰렛 이벤트 소문내기" usemap="#Map1950B" border="0"/>
            <map name="Map1950B">
                <area shape="rect" coords="290,916,353,980" href="https://www.instagram.com/" target="_blank" alt="인스타">
                <area shape="rect" coords="384,916,449,981" href="https://www.facebook.com/" target="_blank" alt="페이스북">
                <area shape="rect" coords="481,916,546,979" href="https://section.blog.naver.com/BlogHome.nhn?directoryNo=0&currentPage=1&groupId=0" target="_blank" alt="블로그">
                <area shape="rect" coords="579,916,640,979" href="https://cafe.naver.com/gugrade" target="_blank" alt="네이버카페">
                <area shape="rect" coords="675,917,735,979" href="http://cafe379.daum.net/_c21_/home?grpid=8mGI" target="_blank" alt="구꿈사">
                <area shape="rect" coords="767,916,834,978" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" alt="공갤">
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1950_03.jpg" alt="사전예약" usemap="#Map1950C" border="0" />
            <map name="Map1950C">
                <area shape="rect" coords="129,843,321,894" href="https://pass.willbes.net/home/index/cate/3019" target="_blank" alt="9급패스">
                <area shape="rect" coords="459,844,650,892" href="https://pass.willbes.net/home/index/cate/3103" target="_blank" alt="7급psat">
                <area shape="rect" coords="798,842,990,893" href="https://pass.willbes.net/home/index/cate/3035" target="_blank" alt="김동진법원팀">
                <area shape="rect" coords="130,1243,317,1295" href="https://pass.willbes.net/home/index/cate/3023" target="_blank" alt="소방패스">
                <area shape="rect" coords="460,1245,649,1290" href="https://pass.willbes.net/home/index/cate/3028" target="_blank" alt="기술직">
                <area shape="rect" coords="801,1244,986,1294" href="https://pass.willbes.net/home/index/cate/3024" target="_blank" alt="군무원패스">
            </map>
        </div>        

        <div class="evtCtnsBox wb_info" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">공무원 100%당첨 열공룰렛 이벤트 공지사항</h2>
                <dl>
                    <dt>룰렛 이벤트</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 이벤트 기간 내 윌비스 통합사이트 신규회원가입 및 [관심직렬]→[공무원] 체크 시에만 참여 가능합니다. </li>
                            <li>이벤트 기간 : 2020.12.16.(수)~12.31.(목)<br>
                            - 경품 지급 안내 : 2021.1.5.(목) 윌비스 공무원 온라인 온라인 공지사항 참고</li>
                            <li>당첨 경품은 룰렛 이미지를 통해 바로 확인 가능하며, 부정한 방법을 통해 참여할 경우 당첨 대상에서 제외됩니다. <br>
                            (탈퇴 후 재가입, 중복 연락처로 가입, 매크로 등)</li>
                            <li>본 이벤트는 최초 1회에 한해 참여 가능하며, 당첨된 상품을 취소하거나 재참여하는 것은 불가합니다.</li>
                            <li>이벤트 경품은 당첨자 발표 이후 회원정보에 등록된 전화번호를 통해 발송 예정이오니, 당첨자 발표일 이전까지 정확한 개인정보를 입력해주시기 바랍니다.</li>
                            <li>지급되는 쿠폰/포인트는 발급일로부터 7일 이내 사용하실 수 있으며, 만료 시 재발급이 불가하므로 반드시 사용 가능 기간을 확인해주시기 바랍니다.</li>
                            <li>이벤트 경품은 거래처 사정에 의해 동일한 가격의 다른 상품으로 변경될 수 있습니다.</li>
                            <li>준비된 경품이 소진될 경우, 이벤트는 조기마감될 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dt>소문내기 이벤트</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 로그인 후 참여 가능합니다.</li>
                            <li>이벤트 기간 : 2020.12.16.(수)~12.31.(목)<br>
                            - 경품 지급 안내 : 2021.1.5.(목) 윌비스 공무원 온라인 온라인 공지사항 참고</li>
                            <li>이벤트 기간 외 참여 후 인증한 URL은 이벤트 정상 참여로 인정되지 않습니다.</li>
                            <li>지정된 커뮤니티 외 타 커뮤니티/SNS 등에 작성한 글은 인정되지 않습니다.</li>
                            <li>이벤트 종료일을 기준으로 삭제/수정된 글 및 비공개 처리된 글은 정상 참여로 인정되지 않습니다.</li>
                            <li>다양한 커뮤니티에 다양한 내용으로 참여 시 당첨확률이 올라갑니다.</li>
                            <li>소문내기 글 제목에 “윌비스“, “열공룰렛“ 키워드가 반드시 포함되어야 정상 참여로 인정됩니다.</li>                            
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->
    @include('willbes.pc.promotion.roulette_script')    
@stop