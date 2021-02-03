@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
    /*****************************************************************/ 
    .evt_top {background:url('https://static.willbes.net/public/images/promotion/2021/02/2051_top_bg.jpg') no-repeat center top; margin-top:20px; height:1013px; position:relative;}   

    .evt_top .tabs {width:1120px; position:absolute; top:920px; left:50%; margin-left:-560px; z-index:1}
    .evt_top .tabs li {display:inline; float:left; width:20%}
    .evt_top .tabs li a {display:block; background:url('https://static.willbes.net/public/images/promotion/2021/02/2051_tab_off.png') no-repeat right top; color:#fff; font-size:20px; height:206px; line-height:1.2; text-align:center;}
    .evt_top .tabs li a:hover,
    .evt_top .tabs li a.active {background:url('https://static.willbes.net/public/images/promotion/2021/02/2051_tab_on.png') no-repeat right top; }
    .evt_top .tabs li a span {height:58px; line-height:58px; font-size:20px; display:block; margin-bottom:20px}
    
    .evt01 {background:#fff; padding-top:150px}   

    .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:14px}
    .evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:40px; margin-bottom:30px}
    .evtInfoBox .infoTit {font-size:20px;margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox ul li {list-style:disc; margin-left:20px}

    </style> 

    <div class="evtContent NSK">

        <div class="evtCtnsBox evt_top"> 
            <ul class="tabs NSK-Black">
                <li>
                    <a href="#tab01">
                        <span>01</span>
                        새해 덕담<br>
                        나누면<br>
                        복이 세배!<br>
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <span>02</span>
                        단 1개만<br>
                        구매해도,<br>
                        혜택이 세배!<br>
                    </a>
                </li>
                <li>
                    <a href="#tab03">
                        <span>03</span>
                        소문내기<br>
                        하면,<br>
                        기쁨이 세배!<br>
                    </a>
                </li>
                <li>
                    <a href="#tab04">
                        <span>04</span>
                        오직 설<br>
                        연휴에만<br>
                        할인받으소!!<br>
                    </a>
                </li>
                <li>
                    <a href="#tab05">
                        <span>05</span>
                        설 연휴<br>
                        학원<br>
                        운영 안내<br>
                    </a>
                </li>
            </ul>
        </div>


        <div class="evtCtnsBox evt01" id="tab01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2051_01.jpg" alt="복이 세배!" >
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial',array('write_yn'=>'N'))
            @endif 
        </div>
        

        <div class="evtCtnsBox evt02" id="tab02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2051_02.jpg" alt="혜택이 세배!" usemap="#Map2051A" border="0" >
            <map name="Map2051A" id="Map2051A">
                <area shape="rect" coords="274,548,426,594" href="#none" alt="단과쿠폰" />
                <area shape="rect" coords="482,548,635,594" href="#none" alt="패키지쿠폰" />
                <area shape="rect" coords="682,548,834,594" href="#none" alt="패스쿠폰" />
            </map>
        </div>

        <div class="evtCtnsBox evt03" id="tab03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2051_03.jpg" alt="기쁨이 세배!" usemap="#Map2051B" border="0" >
            <map name="Map2051B" id="Map2051B">
                <area shape="rect" coords="234,731,403,797" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" alt="공갤" />
                <area shape="rect" coords="418,731,562,797" href="https://cafe.daum.net/9glade" target="_blank" alt="구꿈사" />
                <area shape="rect" coords="576,731,728,797" href="https://cafe.naver.com/gugrade" target="_blank" alt="공드림" />
                <area shape="rect" coords="741,731,889,797" href="https://cafe.naver.com/willbes" target="_blank" alt="윌비스" />
            </map>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
            @endif 
        </div>


        <div class="evtCtnsBox evt04" id="tab04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2051_04.jpg" alt="할인받으소!!" usemap="#Map2051C" border="0" >
            <map name="Map2051C" id="Map2051C">
                <area shape="rect" coords="104,732,247,782" href="https://pass.willbes.net/promotion/index/cate/3019/code/1717" target="_blank" alt="문풀패스" />
                <area shape="rect" coords="357,732,496,781" href="https://pass.willbes.net/promotion/index/cate/3022/code/1983" target="_blank" alt="세무직패스" />
                <area shape="rect" coords="626,732,768,781" href="https://pass.willbes.net/home/index/cate/3103" target="_blank" alt="psat패스" />
                <area shape="rect" coords="878,732,1017,781" href="https://pass.willbes.net/promotion/index/cate/3020/code/1878" target="_blank" alt="전문과목패스" />
                <area shape="rect" coords="105,1214,246,1260" href="https://pass.willbes.net/promotion/index/cate/3023/code/1060" target="_blank" alt="소방직문풀패스" />
                <area shape="rect" coords="366,1212,510,1262" href="https://pass.willbes.net/promotion/index/cate/3024/code/1751" target="_blank" alt="군문원문풀" />
                <area shape="rect" coords="616,1043,759,1094" href="https://pass.willbes.net/promotion/index/cate/3024/code/2064" target="_blank" alt="군수직" />
                <area shape="rect" coords="617,1212,757,1262" href="https://pass.willbes.net/promotion/index/cate/3024/code/2064" target="_blank" alt="정보직" />
                <area shape="rect" coords="875,1213,1017,1261" href="https://pass.willbes.net/promotion/index/cate/3035/code/1965" target="_blank" alt="법원직" />
                <area shape="rect" coords="102,1523,243,1573" href="https://pass.willbes.net/promotion/index/cate/3028/code/1068" target="_blank" alt="농업직" />
                <area shape="rect" coords="102,1688,241,1736" href="https://pass.willbes.net/promotion/index/cate/3028/code/2028" target="_blank" alt="장사원_선석" />
                <area shape="rect" coords="367,1688,501,1735" href="https://pass.willbes.net/promotion/index/cate/3028/code/1728" target="_blank" alt="통신전기" />
                <area shape="rect" coords="636,1465,742,1503" href="https://pass.willbes.net/promotion/index/cate/3028/code/2015" target="_blank" alt="산림자원직" />
                <area shape="rect" coords="636,1545,742,1582" href="https://pass.willbes.net/promotion/index/cate/3028/code/2013" target="_blank" alt="전산직" />
                <area shape="rect" coords="636,1632,740,1670" href="https://pass.willbes.net/promotion/index/cate/3028/code/2014" target="_blank" alt="환경직공채" />
                <area shape="rect" coords="635,1722,743,1758" href="https://pass.willbes.net/promotion/index/cate/3028/code/2014" target="_blank" alt="환경직특채" />
                <area shape="rect" coords="895,1466,1003,1502" href="https://pass.willbes.net/promotion/index/cate/3028/code/1915" target="_blank" alt="기계직" />
                <area shape="rect" coords="895,1545,1005,1583" href="https://pass.willbes.net/promotion/index/cate/3028/code/1915" target="_blank" alt="축산직" />
                <area shape="rect" coords="896,1633,1004,1670" href="https://pass.willbes.net/promotion/index/cate/3028/code/1915" target="_blank" alt="조경직" />
                <area shape="rect" coords="895,1721,1002,1759" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/178876" target="_blank" alt="토목직" />
            </map>
        </div>

        <div class="evtCtnsBox evt05" id="tab05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2051_05.jpg" alt="학원 운영 안내" >
        </div> 
        
        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NGEB">이벤트 유의사항</h4>
                <div class="mb30">이벤트 참여 전 유의사항을 반드시 숙지해주시기 바랍니다.</div>
                <div class="infoTit"><strong>[이벤트 공통 유의사항]</strong></div>
                <ul>
                    <li>본 이벤트는 윌비스 회원만 참여 가능합니다.</li>
                    <li>이벤트 진행 기간은 2021.2.5.(금)~2021.2.14.(월), 총 10일간입니다.</li>
                    <li>진행된 이벤트에 대한 당첨자 발표 및 안내는 2021.2.16.(화) 윌비스 공무원 온라인 공지사항에서 확인하실 수 있습니다.</li>
                    <li>당첨자 발표 공지사항을 통해 이벤트 경품 지급일이 안내될 예정이며, 제공되는 이벤트 경품은 파트너사의 사정에 의해 동일 금액의 유사 상품으로 변경될 수 있습니다.</li>
                    <li>이미 지급된 경품에 대한 재지급은 불가하오니, 이벤트 종료일 이전까지 회원정보에 등록된 전화번호를 올바르게 수정해주시기 바랍니다.</li>
                    <li>각 이벤트 내 중복 당첨은 불가하나, 이벤트 간 중복 당첨은 가능합니다.</li>
                </ul>
                <div class="infoTit"><strong>[새해 덕담 나누면, 복이 세배!]</strong></div>
                <ul>
                    <li>제시된 키워드를 많이 이용하여 기발한 댓글을 작성해주신 분을 대상으로 우선 추첨 진행합니다.</li>
                    <li>지나친 도배/욕설, 주제와 상관없는 댓글은 예고없이 관리자에 의해 삭제될 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>[단 1개면 구매해도, 혜택이 세배!]</strong></div>
                <ul>
                    <li>안내된 쿠폰은 이벤트 기간 내 계정당 각각 최초 1회만 다운로드 가능합니다.</li>
                    <li>발급받으신 쿠폰은 이벤트 기간 내에만 사용 가능하며 추후 재발급 불가합니다.</li>
                    <li>이벤트 기간 내 강의 구매 시 본 이벤트에 자동 응모되며, 이벤트 종료 후 무작위 추첨을 통해 당첨자를 선정합니다.</li>
                </ul>
                <div class="infoTit"><strong>[소문내기 하면, 기쁨이 세배!]</strong></div>
                <ul>
                    <li>지정된 커뮤니티 외 타 커뮤니티/SNS 등에 작성한 글은 인정되지 않습니다.</li>
                    <li>당첨자 선정 시 삭제/수정된 글 및 비공개 처리된 글은 정상 참여로 인정되지 않습니다.</li>
                    <li>소문내기 글 제목에 “윌비스”, “설이벤트“ 키워드가 반드시 포함되어야 정상 참여로 인정됩니다.</li>
                </ul>

                <div class="strong"><strong>※ 이용문의 : 고객만족센터 1544-5006</div>
            </div>
        </div>

    </div>
    <!-- End Container --> 

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')


@stop