@extends('willbes.pc.layouts.master')
@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height:auto !important;
            margin-bottom:0 !important;
        }
        .evtContent { 
            position:relative;            
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /*****************************************************************/  

        .wb_cts01 {background:#231e1c url(http://file3.willbes.net/new_gosi/2019/03/EV190319_1_bg.png) no-repeat center top;} 

			
        .wb_cts02 p {text-align:center}
        
        .listTb {width:820px; margin:0 auto; border:#ddd 1px solid; font-family:'Noto Sans KR', Arial, Sans-serif}
        .listTb thead th{background:#f5f5f5; color:#383838;  font-size:20px; line-height:22px;  letter-spacing:-1px;  font-weight:bold;  border-right:#dddada 1px solid;}
        .listTb td{color:#636363; border-top:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;  vertical-align:middle; text-align:center; font-size:14px; padding:3px 0}
        .listTb th,
        .listTb td {
            padding: 10px 0; line-height:1.5;
        }
        .listTb .day{font-size:14px;color:#333;}
        .listTb .day span {color:#ed1c24; font-weight:bold; font-size:18px; letter-spacing:0px;}
        .listTb .txt_c{font-size:14px; color:#d96b14}
        .btn_p{text-align:center; padding:30px 0 150px;}
        
        .WB_cts03 {background:#8f755c}	
        .WB_cts03 ul {width:100%; margin:0 auto}	
        .WB_cts03 p{width:100%; text-align:center}

        /* 탭 */
        .tabContaier{width:100%; text-align:center;}
        .tabContaier ul {width:100%; max-width:980px; text-align:center; margin:0 auto}		
        .tabContaier li {display:inline; float:left; margin-bottom:20px}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}
        
        .wb_cts04 {background:#8f755c;}	
        .wb_cts04 #movieFrame {width:980px; height:500px; margin:0 auto; background:url(http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png) no-repeat center top;}
        .wb_cts04 .embedWrap {padding-top:13px; width:980px; margin:0 auto}
        .wb_cts04 .embed-container {position:absolute; padding-bottom:46.25%; height:0; overflow:hidden; width:980px; height:auto; margin:0 auto}        
        .wb_cts04 .mobileCh li {width:50%; display:inline; float:left;}
        .wb_cts04 .mobileCh li a {display:block; text-align:center; font-size:150%; font-weight:bold; color:#FFF; background:#1e162b; padding:30px 0}
        .wb_cts04 .mobileCh li a.ch2 {color:#6CF}
        .wb_cts04 .mobileCh li a:hover {color:#FC0}
        .wb_cts04 .mobileCh:after {content:""; display:block; clear:both}
        
        /*크롬*/
        @@media screen and (-webkit-min-device-pixel-ratio:0) {
        .wb_cts04 {background:#8f755c; position:relative;}	
        .wb_cts04 #mmovieFrame {width:980px; height:500px; margin:0 auto; background:url(http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png) no-repeat center top;}
        .wb_cts04 .embedWrap {width:980px; margin-left:0; padding:0}
        .wb_cts04 .embed-container {position:absolute; padding-bottom:46.25%; height:0; overflow:hidden; width:980px; height:auto; margin:0 auto}
        }    

        .wb_cts06 {background:#8f755c;}
        .wb_cts06 ul {width:980px; margin:0 auto; background:#8f755c}
        .wb_cts06 li {float:left; display:inline; margin:0 auto}	
            
        .wb_cts06 ul:after {content:""; display:block; clear:both}	
    </style>

    <div class="evtContent" id="evtContainer">
        <div class="evtCtnsBox wb_cts01" id="main">
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_1.png" alt="19년국가직9급채용시험대비적중50선LIVE" />
        </div>

        <div class="evtCtnsBox wb_cts02" id="event" >
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_2.png" alt="단,3시간 만에 한 과목의 전범위를 학습." /><br>
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_3.png" alt="절대 놓쳐서는 안될 적중 50선 LIVE!" /><br>
            <table  class="listTb">
                <caption>윌비스 적중50선 LIVE시간표</caption>
                <colgroup>
                    <col width="#" />
                    <col width="#" />
                    <col width="#" />
                    <col width="#" />
                    <col width="#" />
                </colgroup>
                <thead>
                    <tr>
                        <th>국어 <br>기미진</th>
                        <th>한국사<br>한경준</th>
                        <th>행정학<br>김덕관</th>
                        <th>영어 <br>한덕현</th>
                        <th>행정법<br>한세훈</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>듣기만 해도<br>암기가 되는<br><span class="txt_c">적중 50선</span></td>
                        <td>출제가능성<br>높은 한국사<br><span class="txt_c">적중 50선</span></td>
                        <td>시험 직전<br>기출변형 <br><span class="txt_c">적중 50선</span></td>
                        <td>명불허전<br>기출분석<br><span class="txt_c">적중 50선</span></td>
                        <td>행정법<br>핵심 문풀<br><span class="txt_c">적중 50선</span></td>
                    </tr>
                    <tr>
                        <td class="day" >2019.<span>3.28</span>(목)<br />19:00~22:00</td>
                        <td class="day" >2019.<span>3.29</span>(금)<br />19:00~22:00</td>
                        <td class="day" >2019.<span>3.31</span>(일)<br />14:00~17:00</td>
                        <td class="day" >2019.<span>4.1</span>(월)<br />19:00~22:00</td>
                        <td class="day" >2019.<span>4.2</span>(화)<br />19:00~22:00</td>
                    </tr>
                    <tr>
                        <td rowspan="3" class="btn">
                            <p><a href="#live" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p>
                                @php
                                    if (empty($file_data_promotion[0]) === true) {
                                        $download_data = "alert('라이브 당일 오후 3시부터 출력 가능합니다.');";
                                    } else {
                                        $download_data = "download('".$file_data_promotion[0]['EfIdx']."', '".$data['ElIdx']."', '1');";
                                    }
                                @endphp
                                <a href="javascript:{{ $download_data }}" onFocus="this.blur();">
                                    <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/>
                                </a>
                            </p>
                        </td>
                        <td rowspan="3" class="btn">
                            <p><a href="#live" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p>
                                @php
                                    if (empty($file_data_promotion[1]) === true) {
                                        $download_data = "alert('라이브 당일 오후 3시부터 출력 가능합니다.');";
                                    } else {
                                        $download_data = "download('".$file_data_promotion[1]['EfIdx']."', '".$data['ElIdx']."', '2');";
                                    }
                                @endphp
                                <a href="javascript:{{ $download_data }}" onFocus="this.blur();">
                                    <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/>
                                </a>
                            </p>
                        </td>
                        <td rowspan="3" class="btn">
                            <p><a href="#live" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p>
                                @php
                                    if (empty($file_data_promotion[2]) === true) {
                                        $download_data = "alert('라이브 당일 오전 10시부터 출력 가능합니다.');";
                                    } else {
                                        $download_data = "download('".$file_data_promotion[2]['EfIdx']."', '".$data['ElIdx']."', '3');";
                                    }
                                @endphp
                                <a href="javascript:{{ $download_data }}" onFocus="this.blur();">
                                    <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/>
                                </a>
                            </p>
                        </td>
                        <td rowspan="3" class="btn">
                            <p><a href="#live" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p>
                                @php
                                    if (empty($file_data_promotion[3]) === true) {
                                        $download_data = "alert('라이브 당일 오후 3시부터 출력 가능합니다.');";
                                    } else {
                                        $download_data = "download('".$file_data_promotion[3]['EfIdx']."', '".$data['ElIdx']."', '4');";
                                    }
                                @endphp
                                <a href="javascript:{{ $download_data }}" onFocus="this.blur();">
                                    <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/>
                                </a>
                            </p>
                        </td>
                        <td rowspan="3" class="btn">
                            <p><a href="#live" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p>
                                @php
                                    if (empty($file_data_promotion[4]) === true) {
                                        $download_data = "alert('라이브 당일 오후 3시부터 출력 가능합니다.');";
                                    } else {
                                        $download_data = "download('".$file_data_promotion[4]['EfIdx']."', '".$data['ElIdx']."', '5');";
                                    }
                                @endphp
                                <a href="javascript:{{ $download_data }}" onFocus="this.blur();">
                                    <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/>
                                </a>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="btn_p"><a href="{{ site_url('/pass/event/show/ongoing?event_idx=155&') }}" target="_blank"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_3_acago.png" alt="노량진 실강 신청하기" /></a></p>
            <p><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_4.png" alt="적중50선라이브와 함께 성적UP을 위한 완벽마무리" /></p>
        </div>
        <!--wb_cts02//-->

        <a name="live"></a>
        <div class="evtCtnsBox WB_cts03">
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5.png" alt="윌비스가 준비한 수험생 합격 응원 선물 적중 50선 LIVE"/ >
            <div class="tabContaier">
                <ul>
                    <li><a href="#tab1" id="tab_css1" {!! (date('YmdHis') > '20190328150000' && date('YmdHis') < '20190329120000') ? 'class="active"' : '' !!}><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t1.png" class="off" alt="3/28 기미진" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t1_on.png" class="on"  alt="#"/></a></li>
                    <li><a href="#tab2" id="tab_css2" {!! (date('YmdHis') > '20190329150000' && date('YmdHis') < '20190330120000') ? 'class="active"' : '' !!}><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t2.png" class="off" alt="3/29 한경준" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t2_on.png"  class="on" alt="#"/></a></li>
                    <li><a href="#tab3" id="tab_css3" {!! (date('YmdHis') > '20190331100000' && date('YmdHis') < '20180401120000') ? 'class="active"' : '' !!}><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t3.png" class="off" alt="3/31 김덕관" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t3_on.png"  class="on" alt="#"/></a></li>
                    <li><a href="#tab4" id="tab_css4" {!! (date('YmdHis') > '20190401150000' && date('YmdHis') < '20180402120000') ? 'class="active"' : '' !!}><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t4.png" class="off" alt="4/1  한덕현" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t4_on.png" class="on"  alt="#"/></a></li>
                    <li><a href="#tab5" id="tab_css5" {!! (date('YmdHis') > '20190402150000' && date('YmdHis') < '20180403120000') ? 'class="active"' : '' !!}><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t5.png" class="off" alt="4/2  한세훈" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t5_on.png" class="on"  alt="#"/></a></li>
                </ul>
                <div class="tabContents" id="tab1" style="display:none;">
                    <p>
                        @php
                            if (empty($file_data_promotion[0]) === true) {
                                $download_data = "alert('자료가 없습니다.');";
                            } else {
                                $download_data = "download('".$file_data_promotion[0]['EfIdx']."', '".$data['ElIdx']."', '1');";
                            }
                        @endphp
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor1.png" alt="국어기미진" usemap="#Map190319_c1" border="0" />
                        <map name="Map190319_c1" >
                            <area shape="rect" coords="678,234,964,296" href="javascript:{{ $download_data }}"  onFocus="this.blur();" alt="기미진자료다운" />
                        </map>
                    </p>
                </div>
                <div class="tabContents" id="tab2" style="display:none;">
                    <p>
                        @php
                            if (empty($file_data_promotion[1]) === true) {
                                $download_data = "alert('라이브 당일 오후 3시부터 출력 가능합니다.');";
                            } else {
                                $download_data = "download('".$file_data_promotion[1]['EfIdx']."', '".$data['ElIdx']."', '2');";
                            }
                        @endphp
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor2.png" alt="한국사한경준" usemap="#Map190319_c3" border="0" />
                        <map name="Map190319_c3" >
                            <area shape="rect" coords="677,227,962,293" href="javascript:{{ $download_data }}" onfocus="this.blur();" alt="한경준자료다운"/>
                        </map>
                    </p>
                </div>
                <div class="tabContents" id="tab3" style="display:none;">
                    <p>
                        @php
                            if (empty($file_data_promotion[2]) === true) {
                                $download_data = "alert('라이브 당일 오전 10시부터 출력 가능합니다.');";
                            } else {
                                $download_data = "download('".$file_data_promotion[2]['EfIdx']."', '".$data['ElIdx']."', '3');";
                            }
                        @endphp
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor3.png" alt="행정학김덕관" usemap="#Map190319_c4" border="0" />
                        <map name="Map190319_c4" >
                            <area shape="rect" coords="680,229,942,295"  href="javascript:{{ $download_data }}" onfocus="this.blur();" alt="김덕관자료다운"/>
                        </map>
                    </p>
                </div>
                <div class="tabContents" id="tab4" style="display:none;">
                    <p>
                        @php
                            if (empty($file_data_promotion[3]) === true) {
                                $download_data = "alert('라이브 당일 오후 3시부터 출력 가능합니다.');";
                            } else {
                                $download_data = "download('".$file_data_promotion[3]['EfIdx']."', '".$data['ElIdx']."', '4');";
                            }
                        @endphp
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor4.png" alt="영어한덕현" usemap="#Map190319_c5" border="0" />
                        <map name="Map190319_c5">
                            <area shape="rect" coords="682,228,951,295"  href="javascript:{{ $download_data }}"  onfocus="this.blur();" alt="한덕현자료다운"/>
                        </map>
                    </p>
                </div>
                <div class="tabContents" id="tab5" style="display:none;">
                    <p>
                        @php
                            if (empty($file_data_promotion[4]) === true) {
                                $download_data = "alert('라이브 당일 오후 3시부터 출력 가능합니다.');";
                            } else {
                                $download_data = "download('".$file_data_promotion[4]['EfIdx']."', '".$data['ElIdx']."', '5');";
                            }
                        @endphp
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor5.png" alt="행정법한세훈" usemap="#Map190319_c6" border="0" />
                        <map name="Map190319_c6" >
                            <area shape="rect" coords="673,227,934,301"  href="javascript:{{ $download_data }}" onFocus="this.blur();" alt="한세훈자료다운"/>
                        </map>
                    </p>
                </div>
            </div>
            <!--tabContaier//--> 
        </div>
        <!--WB_top03//-->

        <div class="wb_cts04"> 
            <!--PC-->
            <div id="movieFrame">
                @php
                    $set_on_day = ['20190328', '20190329', '20190331', '20190401', '20190402'];
                    $day = date('Ymd');
                    $time = date('His');

                    if ($day < '20190328') {
                        $live_type = 'standby';
                    } else if ($day >= '20190328' && $day <= '20190402'){
                        $live_type = 'on';
                    } else {
                        $live_type = 'off';
                    }

                    $live_video_type = 'off';
                    foreach ($set_on_day as $key => $val) {
                        if ($val == '20190331') {
                            if ($time >= '140000' && $time <= '170000') {
                                $live_video_type = 'on';
                            }
                        } else if ($day == $val){
                            if ($time >= '190000' && $time <= '220000') {
                                $live_video_type = 'on';
                            }
                        }
                    }
                @endphp

                 @if ($live_type == 'standby')
                    <!--강의전 화면-->
                    <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png" alt="라이브강의_지금은 진행시간이아닙니다" border="0" />
                 @elseif ($live_type == 'on' && $live_video_type == 'on')
                    <!--강의중 플레이어-->
                    <script src="/public/vendor/jwplayer/jwplayer.js"></script>
                    <div class="movieFrame">
                        <div class="embedWrap">
                            <div class="embed-container" id="myElement">
                                <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                                <script type="text/javascript">
                                        jwplayer("myElement").setup({
                                        width: '100%',
                                        logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                        image: "http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png",
                                        aspectratio: "16:9",
                                        autostart: "true",
                                        file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestream11011"
                                });
                                </script>
                            </div>
                            @if (APP_DEVICE == 'm')
                                <!--모바일용 -->
                                <ul class="mobileCh">
                                    <li><a href="javascript:fn_live('hd')">▶ 고화질 보기 클릭!</a></li>
                                    <li><a href="javascript:fn_live('low')" class="mbtn2">▶ 일반화질 보기 클릭!</a></li>
                                </ul>
                            @endif
                        </div>
                    </div>
                 @elseif ($live_type == 'on' && $live_video_type == 'off')
                     <!--강의전 화면-->
                         <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png" alt="라이브강의_지금은 진행시간이아닙니다" border="0" />
                 @else
                    <!--4월 2일 이후 강의 종료 후 화면-->
                    <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off2.png" alt="라이브강의_지금은 진행시간이아닙니다" border="0" />
                 @endif
            </div>
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts06">           
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_6_tip.png" alt="생방송 강의 진행 안내"  />
        </div>
        <!--WB_top06//-->

        <?php if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true): ?>
            <?php echo $this->runChild('willbes.pc.promotion.show_comment_list_normal_partial'); ?>
        <?php endif; ?>
        {{--@include('html.event_replyNotice')--}}
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function fn_live(p_type) {
            if(p_type == "hd"){
                location.href = "http://willbes.flive.skcdn.com/willbeslive/livestreamcop5011/Playlist.m3u8";
            }else{
                location.href = "http://willbes.flive.skcdn.com/willbeslive/livestreamcop5012/Playlist.m3u8";
            }
        }

        function inZero(p1,p2){
            var zero = "";
            for(var i=0; i<p2; i++){
                zero += "0";
            }
            return zero.toString().concat(p1).match(new RegExp("\\d{"+p2+"}$"));
        }

        function download(file_idx, event_idx, seq)
        {
            var today = new Date();
            var timeStr;

            var is_login = '{{sess_data('is_login')}}';
            if (is_login != true) {
                alert('회원만 강의자료를 다운로드 받을수 있습니다.');
                return;
            }
            timeStr = today.getFullYear().toString();
            timeStr += inZero(today.getMonth()+1,2);
            timeStr += inZero(today.getDate(),2);
            timeStr += inZero(today.getHours(),2);
            timeStr += inZero(today.getMinutes(),2);
            timeStr += inZero(today.getSeconds(),2);

            if(seq == 1 && (timeStr < 20190328150000 || timeStr > 20190329120000)){
                alert("3월28일 오후 3시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            } else if(seq == 2 && (timeStr < 20190329150000 || timeStr > 20190330120000)){
                alert("3월29일 오후 3시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            } else if(seq == 3 && (timeStr < 20190331100000 || timeStr > 20180401120000)){
                alert("3월31일 오전 10시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            } else if(seq == 4 && (timeStr < 20190401150000 || timeStr > 20180402120000)){
                alert("4월1일 오후 3시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            } else if(seq == 5 && (timeStr < 20190402150000 || timeStr > 20180403120000)) {
                alert("4월2일 오후 3시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            } else {
                var _url = '{{ site_url("/promotion/download") }}' + '?file_idx='+file_idx + '&event_idx='+event_idx;
                window.open(_url, '_blank');
            }
        }

        $(document).ready(function(){
            $(".tabContents").hide(); 
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){

            var activeTab = $(this).attr("href"); 
            $(".tabContaier ul li a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".tabContents").hide(); 
            $(activeTab).fadeIn(); 
            return false;
            });
        });
    </script>
@stop