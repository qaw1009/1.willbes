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
            background:#fff url(https://static.willbes.net/public/images/promotion/2020/12/1951_top_bg.jpg) no-repeat center top;
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
            border-radius:40px; border:10px solid #000; z-index:20}
        .rulletBox a:hover {background:#5a14d6; color:#fff}
        

        .wb_01 {width:1120px; margin}
        .wb_02 {background:#ebebeb;}
        .wb_02 .slider {position:absolute; width:1200px; left:50%; margin-left:-600px;}
        .wb_02 .slider div {}
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
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1951_rull_popup.png" alt="당첨팝업" usemap="#Map1951pop" border="0"/>
                <map name="Map1951pop" id="Map1951pop">
                    <area shape="rect" coords="637,85,715,163" href="#none" onClick="closeWin('giftPopupWrap')" alt="닫기" />
                </map>
                {{-- 상품이미지 01 ~ 08 --}}
                <span id="gift_box_id"></span>
            </div>            
        </div>        

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1951_top.jpg" alt="룰렛 이벤트"/>
            <div class="rulletBox">
                <canvas id="box_roulette" class="tutCanvas" width="810" height="810">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette('https://static.willbes.net/public/images/promotion/2020/12/1951_rull_gift0','png'); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2020/06/1698_rull_start.png" alt="start" /></button>
                <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
            </div>    
            <div class="topimg01"><img src="https://static.willbes.net/public/images/promotion/2020/12/1951_img01.png" alt="산타"/></div>
            <div class="topimg02"><img src="https://static.willbes.net/public/images/promotion/2020/12/1951_img02.png" alt="선물"/></div>        
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1951_01.jpg" alt="룰렛 이벤트" usemap="#Map1951A" border="0" />
            <map name="Map1951A">
                <area shape="rect" coords="254,639,368,680" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2014" target="_blank" alt="신규가입">
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1951_02.jpg"/>
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1951_04.jpg" alt="사전예약" />
            <div class="slider">
                <div><img src="https://static.willbes.net/public/images/promotion/2020/11/1951_04_01.jpg" alt="강사진"></div>                            
                <div><img src="https://static.willbes.net/public/images/promotion/2020/11/1951_04_02.jpg" alt="강사진"></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/11/1951_04_03.jpg" alt="강사진"></div>
            </div>
            <div class="mt80"><img src="https://static.willbes.net/public/images/promotion/2020/11/1951_04_bottom.jpg" alt="사전예약" /></div>
        </div>        

        <div class="evtCtnsBox wb_info" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">N잡 100%당첨 룰렛이벤트 유의사항</h2>
                <dl>
                    <dt>룰렛 이벤트</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 이벤트 기간 내 윌비스 통합사이트 신규회원가입 및 [관심직렬]→[N잡] 체크 시에만 참여 가능합니다. </li>
                            <li>이벤트 기간 : 2020.12.16.(수)~12.31.(목)<br>
                            - 경품 지급 안내 : 2021.1.5.(목) 윌비스 N잡 온라인 공지사항 참고</li>
                            <li>당첨 경품은 룰렛 이미지를 통해 바로 확인 가능하며, 부정한 방법을 통해 참여할 경우 당첨 대상에서 제외됩니다. <br>
                            (탈퇴 후 재가입, 중복 연락처로 가입, 매크로 등)</li>
                            <li>본 이벤트는 최초 1회에 한해 참여 가능하며, 당첨된 상품을 취소하거나 재참여하는 것은 불가합니다.</li>
                            <li>이벤트 경품은 당첨자 발표 이후 회원정보에 등록된 전화번호를 통해 발송 예정이오니, 당첨자 발표일 이전까지 정확한 개인정보를 입력해주시기 바랍니다.</li>
                            <li>지급되는 쿠폰은 발급일로부터 7일 이내 사용하실 수 있으며, 만료 시 재발급이 불가하므로 반드시 사용 가능 기간을 확인해주시기 바랍니다.</li>
                            <li>이벤트 경품은 거래처 사정에 의해 동일한 가격의 다른 상품으로 변경될 수 있습니다.</li>
                            <li>준비된 경품이 소진될 경우, 이벤트는 조기마감될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>의지 보여주기! 댓글 이벤트</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 로그인 후 참여 가능합니다.</li>
                            <li>이벤트 기간 : 2020.12.16.(수)~12.31.(목)<br>
                            - 경품 지급 안내 : 2021.1.5.(목) 윌비스 N잡 온라인 공지사항 참고</li>
                            <li>이벤트 기간 외 참여 후 작성한 댓글은 이벤트 정상 참여로 인정되지 않습니다.</li>
                            <li>이벤트 종료일을 기준으로 삭제/수정된 글 및 비공개 처리된 글은 정상 참여로 인정되지 않습니다.</li>
                            <li>다양한 내용으로 다양한 의지를 담은 내용의 댓글 작성 시 당첨 확률이 높아집니다.</li>
                            <li>이벤트 내용과 상관 없는 댓글 및 도배/무의미하거나 성의없는 댓글 등은 관리자에 의해 임의적으로 삭제될 수 있습니다.</li>                            
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->
    @include('willbes.pc.promotion.roulette_script')
    
@stop