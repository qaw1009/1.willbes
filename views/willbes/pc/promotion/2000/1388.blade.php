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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#f5f5f5 url(https://static.willbes.net/public/images/promotion/2019/09/1388_bg.jpg) no-repeat center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {position:relative}
        .rulletBox {position:absolute; top:649px; width:810px; left:50%; margin-left:-410px; z-index:5}
        .rulletBox .btn-roulette {position:absolute; top:280px; width:255px; height:255px; left:50%; padding:0; margin:0; margin-left:-127px; background:none; z-index:6}
        .rulletBox a {position:absolute; top:670px; left:670px; width:80px; height:80px; line-height:60px; color:#810000; background:#fff; border-radius:40px;
            border:10px solid #810000; z-index:6}
            .rulletBox a:hover {background:#810000; color:#fff}

        .wb_02 {background:#f5f5f5}
        .wb_03 {background:#fff}
        .wb_05 {background:#dee7ec}

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
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1388_top.jpg" alt="실전 문제풀이 패키지"/>
            <div class="rulletBox">
                <canvas id="box_roulette" class="tutCanvas" width="810" height="810">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2019/09/1388_rull_start.png" alt="start" /></button>
                <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1388_01.png" alt="회원가입 합격 룰렛 이벤트" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1388_02.png" alt="회원가입" usemap="#Map1289A" border="0" />
            <map name="Map1289A" id="Map1289A">
            	<area shape="rect" coords="122,1826,239,1872" href="https://pass.willbes.net/promotion/index/cate/3019/code/1281" target="_blank" alt="공무원티패스" />
              <area shape="rect" coords="374,1825,494,1874" href="https://pass.willbes.net/home/index/cate/3035" target="_blank" alt="김동진법원팀" />
              <area shape="rect" coords="629,1826,746,1873" href="https://pass.willbes.net/promotion/index/cate/3023/code/1060" target="_blank" alt="소방패스" />
              <area shape="rect" coords="884,1826,998,1874" href="https://pass.willbes.net/home/index/cate/3028" target="_blank" alt="기술직" />
                <area shape="rect" coords="304,978,815,1058" href="https://www.willbes.net/member/join/?ismobile=0&amp;sitecode=2000" target="_blank" alt="회원가입" />
                <area shape="rect" coords="124,2248,237,2293" href="https://police.willbes.net/home/index/cate/3001" target="_blank" alt="신광은경찰" />
                <area shape="rect" coords="378,2248,490,2293" href="https://police.willbes.net/home/index/cate/3002" target="_blank" alt="경행경채" />
                <area shape="rect" coords="631,2248,744,2293" href="https://police.willbes.net/home/index/cate/3006" target="_blank" alt="경찰승진" />
                <area shape="rect" coords="883,2249,997,2294" href="https://police.willbes.net/home/index/cate/3006" target="_blank" alt="해양경찰" />                
            </map>
        </div>

        <div class="evtCtnsBox wb_05">
            <a href="https://pass.willbes.net/home/index/cate/3092" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1388_05.png"  alt="0원으로 공무원 시작하기"/></a>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1388_03.png"  alt="소문내기 이벤트" usemap="#Map1289B" border="0"/>
            <map name="Map1289B" id="Map1289B">
                <area shape="rect" coords="337,998,782,1067" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="소문내기 이미지 다운로드" />
            </map>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
        </div>

        

        <div class="wb_ctsInfo NGR" id="ctsInfo">
            <div>
                <h3 class="NGEB">돌려돌려~ 윌비스 룰렛 이벤트 유의사항</h3>
                <ul>
                    <li>본 이벤트는 이벤트 기간 내 윌비스 사이트 신규회원 가입 회원만 참여 가능합니다.</li>
                    <li>이벤트 기간 : 2019.9.9.(월)~10.8.(화)<Br>
                        당첨자 발표 및 경품 지급 안내 : 2019.10.11.(금) 윌비스 공무원/경찰 온라인 공지사항 참고
                    </li>
                    <li>당첨 경품은 룰렛 이미지를 통해 바로 확인 가능하나, 부정한 방법을 통해 참여할 경우 당첨 대상에서 제외됩니다. <Br>
                        (탈퇴 후 재가입, 중복 연락처로 가입, 매크로 등)</li>
                    <li>본 이벤트는 최초 1회에 한해 참여 가능하며, 당첨된 상품을 취소하거나 재참여하는 것은 불가합니다.</li>
                    <li>이벤트 경품은 당첨자 발표 이후 회원정보에 등록된 전화번호를 통해 발송 예정이오니, 당첨자 발표일 이전까지 정확한 개인정보를 입력해주시기 바랍니다.</li>
                    <li>지급되는 쿠폰 및 포인트는 발급일로부터 7일 이내 사용하실 수 있으며, 만료 시 재발급이 불가하므로 반드시 사용 가능 기간을 확인해주시기 바랍니다.</li>
                    <li>이벤트 경품은 거래처 사정에 의해 동일한 가격의 다른 상품으로 변경될 수 있습니다.</li>
                    <li>준비된 경품이 소진될 경우, 이벤트는 조기마감될 수 있습니다.</li>
                    <li>소문내기 이벤트는 위 명시된 커뮤니티에 ‘전체 공개’로 올린 게시글 중 당첨자 발표 당일 열람 가능한 링크만 인정됩니다.</li>
                    <li>소문내기 이벤트 참여 시, 정확하지 않은 URL을 기재하거나 커뮤니티 도배 등 기타 부정한 방법으로 참여 시 당첨이 취소될 수 있습니다.</li>
                </ul>        
                <p class="NSK"><span>※ 이용문의 : 고객만족센터 1544-5006</span></p>
            </div>
        </div>
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.roulette_script')
@stop