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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2020/09/1842_top_bg.jpg") center top no-repeat}
        .evtTop div {position:absolute; top:672px; left:50%; width:1120px; margin-left:-560px; z-index:1; color:#fff; font-size:18px; line-height:1.2}
        .evtTop div p {font-size:26px}
        .evtTop span {color:#ead4b5; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite; vertical-align: top;}
        @@keyframes upDown{
            from{color:#ebca8b}
            50%{color:#ff6600}
            to{color:#ebca8b}
        }
        @@-webkit-keyframes upDown{
            from{color:#ebca8b}
            50%{color:#ff6600}
            to{color:#ebca8b}
        } 
        .evt01 {padding-bottom:150px; }
        /* TAB */
        .tab {position:absolute; top:1160px; left:50%; width:100%; margin-left:-50%; text-align:center; z-index:1}	
        .tab ul {}	
        .tab li {display:inline-block; margin-right:10px; font-size:14px}
        .tab a {display:block; width:150px; height:150px; border-radius:75px; background:#e0e0e0; overflow:hidden; position:relative; opacity: 0.5;}
        .tab a img {width:100%; position:absolute; top:50%; left:50%; margin-top:-50%; margin-left:-50%;}
        .tab a.active {width:250px; height:250px; border-radius:125px; background:#7063e7; opacity: 1; 
            margin-top:0; animation:upDown2 .5s ease-out;-webkit-animation:upDown2 .5s ease-out; box-shadow:0px 7px 7px 0px rgba(0, 1, 1, 0.2);  }
        @@keyframes upDown2{
            from{transform: rotate(0deg) scale(0.7); }
            to{transform: rotate(1440deg) scale(1); }
        }
        @@-webkit-keyframes upDown2{
            from{transform: rotate(0deg) scale(0.7); }
            to{transform: rotate(1440deg) scale(1); }
        } 
        .tab li div {margin-top:10px;} 
        .tab li a.active+div {font-size:20px; color:#7063e7; font-weight:bold}
        .tab ul:after {content:""; display:block; clear:both}

        .tabCts {margin-top:330px;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}

 </style>

 <div class="p_re evtContent NSK" id="evtContainer">  
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1842_top.jpg"  title="윌비스 T-PASS" />
        <div>
            지금 T-PASS 구매하면 추가 10%할인 쿠폰 지급!
            <p class="NSK-Black">
                <span>
                    @php
                        if(empty($arr_promotion_params['edate']) === false && strlen($arr_promotion_params['edate']) == 10){
                            $week_w = array('일','월','화','수','목','금','토');
                            $edate = str_replace("-","",$arr_promotion_params['edate']);
                            $d_week = $week_w[date("w",strtotime($edate))];
                            $format_date = date("m월 d일", strtotime($edate)) . ' (' . $d_week . ')';
                        }
                    @endphp
                    {{ $format_date }}
                </span>
                마감됩니다!
            </p>
        </div>
    </div>

    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1842_01.jpg"  title="윌비스 T-PASS 커리큘럼" />
        <div class="tab">
            <ul>
                <li>
                    <a href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2020/09/1842_tab_07.png" alt="황남기"/></a>
                    <div>행정법/헌법 황남기</div>
                </li>
                <li>
                    <a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1842_tab_05.png" alt="김덕관"/></a>
                    <div>행정학 김덕관</div>
                </li>
                <li>
                    <a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1842_tab_06.png" alt="기미진"/></a>
                    <div>국어 기미진</div>
                </li>
                <li>
                    <a href="#tab4"><img src="https://static.willbes.net/public/images/promotion/2020/09/1842_tab_01.png" alt="한덕현"/></a>
                    <div>영어 한덕현</div>
                </li>
                <li>
                    <a href="#tab5"><img src="https://static.willbes.net/public/images/promotion/2020/09/1842_tab_02.png" alt="조민주"/></a>
                    <div>한국사 조민주</div>
                </li>
                <li>
                    <a href="#tab6"><img src="https://static.willbes.net/public/images/promotion/2020/09/1842_tab_03.png" alt="오태진"/></a>
                    <div>한국사 오태진</div>
                </li>
                <li>
                    <a href="#tab7"><img src="https://static.willbes.net/public/images/promotion/2020/09/1842_tab_04.png" alt="이석준"/></a>
                    <div>행정법 이석준</div>
                </li>
            </ul>
        </div>
        <div class="tabCts">
            <div id="tab1">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1842_cts_07.jpg" usemap="#Map1842_1" title="황남기" border="0" />
                <map name="Map1842_1">
                    <area shape="rect" coords="500,234,802,322" href="https://pass.willbes.net/promotion/index/cate/3019/code/1077" target="_balnk">
                </map>       
            </div>
            <div id="tab2">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1842_cts_05.jpg" usemap="#Map1842_2" title="김덕관" border="0"/>
                <map name="Map1842_2">
                    <area shape="rect" coords="500,234,802,322" href="https://pass.willbes.net/promotion/index/cate/3019/code/1080" target="_balnk">  
                </map>
            </div>
            <div id="tab3">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1842_cts_06.jpg" usemap="#Map1842_3" title="기미진" border="0"/>
                <map name="Map1842_3">
                    <area shape="rect" coords="500,234,802,322" href="https://pass.willbes.net/promotion/index/cate/3019/code/1623" target="_balnk">
                </map>
            </div>
            <div id="tab4">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1842_cts_01.jpg" usemap="#Map1842_4" title="한덕현" border="0"/>
                <map name="Map1842_4">
                    <area shape="rect" coords="500,234,802,322" href="https://pass.willbes.net/promotion/index/cate/3019/code/1614" target="_balnk">
                </map>     
            </div>
            <div id="tab5">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1842_cts_02.jpg" usemap="#Map1842_5" title="조민주" border="0"/>
                <map name="Map1842_5">
                    <area shape="rect" coords="500,234,802,322" href="https://pass.willbes.net/promotion/index/cate/3019/code/1788" target="_balnk">
                </map>   
            </div>
            <div id="tab6">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1842_cts_03.jpg" usemap="#Map1842_6" title="오태진" border="0"/>
                <map name="Map1842_6">
                    <area shape="rect" coords="500,234,802,322" href="https://pass.willbes.net/promotion/index/cate/3019/code/1392" target="_balnk">
                </map>   
            </div>
            <div id="tab7">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1842_cts_04.jpg" usemap="#Map1842_7" title="이석준" border="0"/>
                <map name="Map1842_7">
                    <area shape="rect" coords="500,234,802,322" href="https://pass.willbes.net/promotion/index/cate/3019/code/1792" target="_balnk">
                </map>    
            </div>
        </div>
    </div>  

    <div class="evtCtnsBox evtInfo" id="ctsInfo">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">이용안내 및 유의사항</h4>
            <div class="infoTit"><strong>상품구성</strong></div>
            <ul>
                <li>교수별 제공되는 커리큘럼은 상이할 수 있으니 각 T-PASS의 수강 기능 과목을 확인 후 신청해주시기 바랍니다.</li>
                <li>수강기간은 각 교수님의 T-PASS마다 상이하니 구매전 수강기간을 확인해 주시기 바랍니다.</li>  
                <li>할인쿠폰은 본 페이지 내에 있는 T-PASS 구매 시에만 발급되며, 구매 즉시 내강의실에 자동 지급처리됩니다.<br>
                    본 쿠폰은 동일한 T-PASS 상품이 아닌 다른 T-PASS를 구매하시는 경우 사용 가능합니다.</li>                       
            </ul>
            <div class="infoTit"><strong>교재안내</strong></div>
            <ul>
                <li>교재는 별도로 제공되지 않으며, 각 강좌별 교재는 강좌 소개 및 홈페이지 상단의 [교재구매] 메뉴에서 별도로 구매 가능합니다.</li> 
                <li>본 상품 이용 시 일시정지/연장/재수강은 제공되지 않습니다.</li>       
            </ul>
            <div class="infoTit"><strong>기기제한</strong></div>
            <ul>
                <li>PC/모바일 기기 대수 PC 2대 or 모바일 2대 or PC 1대 + 모바일 1대(총 2대)</li>                				
            </ul>
            <div class="infoTit"><strong>수강안내</strong></div>
            <ul>
                <li>본 상품 이용 시 일시정지/연장/재수강이 불가합니다.</li>
                <li>[내강의실] - [무한PASS존]에 접속하여 상품명 옆의 [강좌추가] 버튼을 클릭하여 수강할 수 있습니다.</li>   
                <li>PC/모바일 기기변경 시, 최초 1회 직접 변경 가능하며, 이후 특별한 사유에 의한 기기 변경 요청은 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>                  				
            </ul>
            <div class="infoTit"><strong>결제/환불</strong></div>
            <ul>
                <li>결제일로부터 7일 이내 전액 환불 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                <li>강의 자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                <li>본 상품은 특별 기획 강좌로 환불 시에는 수강하신 상품의 정가를 기준으로 이용기간을 공제하고 환불됩니다.</li>
                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>                    				
            </ul>
            <div class="infoTit"><strong>※ 이용 문의 : 윌비스 고객만족센터 1544-5006</strong></div>
        </div>
    </div> 
</div>
<!-- End Container -->

<script type="text/javascript">
$(document).ready(function(){
        $('.tab ul').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[3] || $links[3]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})})}
        );

</script>


@stop