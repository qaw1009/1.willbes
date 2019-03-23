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
        
        .wb_cts04 {background:#8f755c}	
        .wb_cts04 .movieFrame {width:980px; height:500px; margin:0 auto; background:url(http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png) no-repeat center top;}
        .wb_cts04 .embedWrap {padding-top:13px;}
        .wb_cts04 .embed-container {position:absolute; padding-bottom:46.25%; height:0; overflow:hidden; width:980px; height:auto; margin:0 auto}
        /*.wb_cts04 .embedWrap {width:980px; margin:0 auto}
        .wb_cts04 .embed-container {position:absolute; padding-bottom:46.25%; height:0; overflow:hidden; width:980px; height:auto; margin:0 auto}*/
        .wb_cts04 .mobileCh li {width:50%; display:inline; float:left;}
        .wb_cts04 .mobileCh li a {display:block; text-align:center; font-size:150%; font-weight:bold; color:#FFF; background:#1e162b; padding:30px 0}
        .wb_cts04 .mobileCh li a.ch2 {color:#6CF}
        .wb_cts04 .mobileCh li a:hover {color:#FC0}
        .wb_cts04 .mobileCh:after {content:""; display:block; clear:both}
        
        /*크롬*/
        @@media screen and (-webkit-min-device-pixel-ratio:0) {
        .wb_cts04 {background:#8f755c; position:relative}	
        .wb_cts04 .embedWrap {width:980px; margin-left:-28px; padding:0}
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
                            <p><a href="javascript:fn_live('hd');" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p><a href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/></a></p>
                        </td>
                        <td rowspan="3" class="btn">
                            <p><a href="javascript:fn_live('hd');" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p><a href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');" onFocus="this.blur();"> <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/> </a></p>
                        </td>
                        <td rowspan="3" class="btn">
                            <p><a href="javascript:fn_live('hd');" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p><a href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/></a></p>
                        </td>
                        <td rowspan="3" class="btn">
                            <p><a href="javascript:fn_live('hd');" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p><a href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/></a></p>
                        </td>
                        <td rowspan="3" class="btn">
                            <p><a href="javascript:fn_live('hd');" onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_live.jpg" alt="#"/></a></p>
                            <p><a href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');"  onFocus="this.blur();"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_btn_down.jpg" alt="#"/></a></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="btn_p"><a href="javascript:alert('실강 준비중입니다.');" ><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_3_acago.png" alt="노량진 실강 신청하기" /></a></p>
            <p><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_4.png" alt="적중50선라이브와 함께 성적UP을 위한 완벽마무리" /></p>
        </div>
        <!--wb_cts02//-->


        <div class="evtCtnsBox WB_cts03">
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5.png" alt="윌비스가 준비한 수험생 합격 응원 선물 적중 50선 LIVE"/ >
            <div class="tabContaier">
                <ul>
                    <li><a href="#tab1" id="tab_css1"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t1.png" class="off" alt="3/28 기미진" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t1_on.png" class="on"  alt="#"/></a></li>
                    <li><a href="#tab2" id="tab_css2"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t2.png" class="off" alt="3/29 한경준" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t2_on.png"  class="on" alt="#"/></a></li>
                    <li><a href="#tab3" id="tab_css3"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t3.png" class="off" alt="3/31 김덕관" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t3_on.png"  class="on" alt="#"/></a></li>
                    <li><a href="#tab4" id="tab_css4"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t4.png" class="off" alt="4/1  한덕현" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t4_on.png" class="on"  alt="#"/></a></li>
                    <li><a href="#tab5" id="tab_css5"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t5.png" class="off" alt="4/2  한세훈" /><img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_t5_on.png" class="on"  alt="#"/></a></li>
                </ul>
                <div class="tabContents" id="tab1" style="display:none;">
                    <p>
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor1.png" alt="국어기미진" usemap="#Map190319_c1" border="0" />
                        <map name="Map190319_c1" >
                            <area shape="rect" coords="678,234,964,296" href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');"  onFocus="this.blur();" alt="기미진자료다운" />
                        </map>
                    </p>
                </div>
                <div class="tabContents" id="tab2" style="display:none;">
                    <p>
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor2.png" alt="한국사한경준" usemap="#Map190319_c3" border="0" />
                        <map name="Map190319_c3" >
                            <area shape="rect" coords="677,227,962,293" href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');" onfocus="this.blur();" alt="한경준자료다운"/>
                        </map>
                    </p>
                </div>
                <div class="tabContents" id="tab3" style="display:none;">
                    <p>
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor3.png" alt="행정학김덕관" usemap="#Map190319_c4" border="0" />
                        <map name="Map190319_c4" >
                            <area shape="rect" coords="680,229,942,295"  href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');" onfocus="this.blur();" alt="김덕관자료다운"/>
                        </map>
                    </p>
                </div>
                <div class="tabContents" id="tab4" style="display:none;">
                    <p>
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor4.png" alt="영어한덕현" usemap="#Map190319_c5" border="0" />
                        <map name="Map190319_c5">
                            <area shape="rect" coords="682,228,951,295"  href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');"  onfocus="this.blur();" alt="한덕현자료다운"/>
                        </map>
                    </p>
                </div>
                <div class="tabContents" id="tab5" style="display:none;">
                    <p>
                        <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_5_professor5.png" alt="행정법한세훈" usemap="#Map190319_c6" border="0" />
                        <map name="Map190319_c6" >
                            <area shape="rect" coords="673,227,934,301"  href="javascript:alert('라이브 진행 당일 오후 3시부터 출력 가능합니다.');" onFocus="this.blur();" alt="한세훈자료다운"/>
                        </map>
                    </p>
                </div>
            </div>
            <!--tabContaier//--> 
        </div>
        <!--WB_top03//-->

        <div class="evtCtnsBox wb_cts04"> 
            <!--PC-->
            <div id="movieFrame">
                <!--강의전 화면-->
                <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png" alt="라이브강의_지금은 진행시간이아닙니다" border="0" />

                <!--강의중 플레이어-->
                <div class="movieFrame">
                    <div class="embedWrap">
                        <div class="embed-container" id="myElement">
                            <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                            <script type="text/javascript">				
                                    jwplayer("myElement").setup({ 
                                    width: '100%',
                                    logo: {file: 'http://file3.willbes.net/new_cop/2018/07/cop_bi.png'},
                                    image: "http://file3.willbes.net/new_cop/2019/03/EV190308P_08_playBg.jpg",
                                    aspectratio: "16:9",
                                    autostart: "true",												
                                    file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop5011"
                            });
                            </script>
                        </div>
                        <!--모바일용 -->
                        <ul class="mobileCh">
                            <li><a href="javascript:fn_live('hd')">▶ 고화질 보기 클릭!</a></li>
                            <li><a href="javascript:fn_live('low')" class="mbtn2">▶ 일반화질 보기 클릭!</a></li>
                        </ul>
                    </div>
                </div>

                <!--4월 2일 이후 강의 종료 후 화면-->
                <img src="http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off2.png" alt="라이브강의_지금은 진행시간이아닙니다" border="0" />

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

    <script src="/public/js/willbes/jwplayer/jwplayer.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        
            // 날짜 조회
            function getTodayDate(){
                var _date = new Date();
                var _year = _date.getFullYear();
                var _month = (_date.getMonth() + 1);
                var _day = _date.getDate();		    
                
                if(parseInt(_month)<10){ 
                    _month = "0"+_month; 
                }
                if(parseInt(_day)<10){ 
                        _day = "0"+_day; 
                }		    
                
                var tmp = _year + _month + _day;
                return tmp;
            };

            // 날짜가 변경되면 날짜 선택 탭이 해당일로 자동으로 변경되도록 한다.
            if(getTodayDate()=="20190328"){
                $("#tab_css1").addClass('active');	
                var activeTab = $("#tab_css1").attr("href"); 
                $(".tabContents").hide(); 
                $(activeTab).fadeIn(); 
            }
            if(getTodayDate()=="20190329"){
                $("#tab_css2").addClass('active');	
                var activeTab = $("#tab_css2").attr("href"); 
                $(".tabContents").hide(); 
                $(activeTab).show(); 
            }
            if(getTodayDate()=="20190331"){
                $("#tab_css3").addClass('active');	
                var activeTab = $("#tab_css3").attr("href"); 
                $(".tabContents").hide(); 
                $(activeTab).show(); 
            }
            if(getTodayDate()=="20190401"){
                $("#tab_css4").addClass('active');	
                var activeTab = $("#tab_css4").attr("href"); 
                $(".tabContents").hide(); 
                $(activeTab).show(); 
            }
            if(getTodayDate()=="20190402"){
                $("#tab_css6").addClass('active');	
                var activeTab = $("#tab_css6").attr("href"); 
                $(".tabContents").hide(); 
                $(activeTab).show(); 
            }
        });

        function inZero(p1,p2){
            var zero = "";
            for(var i=0; i<p2; i++){
                zero += "0";
        }
            return zero.toString().concat(p1).match(new RegExp("\\d{"+p2+"}$"));
        }

        
        
        function fn_live(ch_no){
            var today = new Date();
            var timeStr;
            
            timeStr = today.getFullYear().toString();
            timeStr += inZero(today.getMonth()+1,2);
            timeStr += inZero(today.getDate(),2);
            
            if(timeStr == 20190328 && (ch_no == 'a1' || ch_no == 'a2')){//국어 기미진
                fn_live('1', ch_no);
                return;
            }else if(timeStr == 20190329 && (ch_no == 'b1' || ch_no == 'b2')){//한국사 한경준
                fn_live('2', ch_no);
                return;
            }else if(timeStr == 20190331 && (ch_no == 'a1' || ch_no == 'a2')){//행정학 김덕관
                fn_live('3', ch_no);
                return;
            }else if(timeStr == 20190401 && (ch_no == 'b1' || ch_no == 'b2')){//영어 한덕현
                fn_live('4', ch_no);
                return;
            }else if(timeStr == 20190402 && (ch_no == 'a1' || ch_no == 'a2')){//행정법 한세훈
                fn_live('5', ch_no);
                return;
            }else{
                alert("라이브특강 시간을 확인해주세요.");
                return;
            }			
            
        }
        
        function fn_live(p_type){
            
            if("<c:out value='${userInfo.USER_ID}' />" == "") {
			alert("회원만 라이브특강을 시청하실수 있습니다.");
			return;
            }	
        
            var isMobile;
		
		    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
			    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
			   
			    isMobile = "M";
		    }else{
			    isMobile = "P";
            }

            if(ch_no == 'a1') {
                Channel_cd = "7011";
            }else if (ch_no == 'b1') {
                Channel_cd = "11011";
            }else if (ch_no == 'a2') {
                Channel_cd = "7012";
            }else if (ch_no == 'b2') {
                Channel_cd = "11012";
            }else{
                Channel_cd = "7011";
            }
            
            var today = new Date();
            var timeStr;
            var isVw;

            timeStr = today.getFullYear().toString();
            timeStr += inZero(today.getMonth()+1,2);
            timeStr += inZero(today.getDate(),2);
            timeStr += inZero(today.getHours(),2);
            timeStr += inZero(today.getMinutes(),2);
            timeStr += inZero(today.getSeconds(),2);
            
            if("<c:out value='${userInfo.USER_ID}' />" == "") {
                alert("회원만 라이브특강을 시청하실수 있습니다.");
                return;
            }
            
            if(seq == 1){
                $("#TeacherID").val('wgt178');
            }else if(seq == 2){
                $("#TeacherID").val('wgt-170302');
            }else if(seq == 3){
                $("#TeacherID").val('wgt-1607');
            }else if(seq == 4){
                $("#TeacherID").val('wgt68');
            }else if(seq == 5){
                $("#TeacherID").val('wgt2005');
            }else{
                $("#TeacherID").val('');
            }
            
            $.ajax({
                type: "POST",
                url: '<c:url value="/event/getVodEndDate.json"/>',
                data: $("#eventCnt").serialize(),
                dataType: "text",
                async : false,
                success: function(RES) {
                    if($.trim(RES)=="Y"){
                    //정상적인 라이브 수강시간
                        isVw = "Y";
                    }else{
                        isVw = "N";
                    }				   
                },error: function(){
                    isVw = "N";
                }
        });
            
            if (isVw == "Y") {
                
            }else{
                alert("라이브특강 시간을 확인해주세요.");
                return;
            }
            
            $.ajax({
                type: "POST",
                url: '<c:url value="/event/eventCount.json"/>',
                data: $("#eventCnt").serialize(),
                cache: false,
                dataType: "json",
                error: function (request, status, error) {
                },
                success: function (response, status, request) {
                    if(response.result == "1") {

                    }
                }
            }); 

            if(isMobile == "P"){
                location.href = "/promotion/index/cate/3019/code/1141&Channel_cd="+Channel_cd+"&AutoStart=true#movieFrame";
            }else{
			if(p_type == "hd"){
				location.href = "http://willbes.flive.skcdn.com/willbeslive/livestreamcop5011/Playlist.m3u8";
			}else{
				location.href = "http://willbes.flive.skcdn.com/willbeslive/livestreamcop5012/Playlist.m3u8";
			}	
		}
            
        }
        
        function fn_download(seq){

            if("<c:out value='${userInfo.USER_ID}' />" == "") {
                alert("회원만 강의자료를 다운로드 받을수 있습니다.");
                return;
            }
            
            var today = new Date();
            var timeStr;
            var path;

            timeStr = today.getFullYear().toString();
            timeStr += inZero(today.getMonth()+1,2);
            timeStr += inZero(today.getDate(),2);
            timeStr += inZero(today.getHours(),2);
            timeStr += inZero(today.getMinutes(),2);
            timeStr += inZero(today.getSeconds(),2);
            
            $("#SEQ").val(seq);

            if(seq == 1){
                $("#TeacherID").val('wgt178');
            }else if(seq == 2){
                $("#TeacherID").val('wgt-170302');
            }else if(seq == 3){
                $("#TeacherID").val('wgt-1607');
            }else if(seq == 4){
                $("#TeacherID").val('wgt68');
            }else if(seq == 5){
                $("#TeacherID").val('wgt2005');
            }else{
                $("#TeacherID").val('');
            }
            
            if(seq == 1 && (timeStr < 20190328150000 || timeStr > 20190329120000)){
                alert("3월28일 오후 3시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            }else if(seq == 2 && (timeStr < 20190329150000 || timeStr > 20190330120000)){
                alert("3월29일 오후 3시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            }else if(seq == 3 && (timeStr < 20190331100000 || timeStr > 20180401120000)){
                alert("3월31일 오전 10시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            }else if(seq == 4 && (timeStr < 20190401150000 || timeStr > 20180402120000)){
                alert("4월1일 오후 3시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            }else if(seq == 5 && (timeStr < 20190402150000 || timeStr > 20180403120000)){
                alert("4월2일 오후 3시부터 다운가능하며,\n정답해설은 다음날 12시까지 다운받으실 수 있습니다.");
                return;
            }else{
                
    //			alert($("#eventCnt").serialize());
                $.ajax({
                    type: "POST",
                    url: '<c:url value="/event/getFilePath.json"/>',
                    data: $("#eventCnt").serialize(),
                    cache: false,
                    dataType: "json",
                    error: function (request, status, error) {
                        alert("자료다운 실패");
                    },
                    success: function (response, status, request) {
                        if(response.result != "") {
                            path = response.result;
                            //alert(path);
                            if(confirm("다운로드 하시겠습니까?")){
                                location.href = "<c:url value='/download.do' />?path=" + path;
                            }												
                        }else{
                            alert("생방송 당일 오후 3시부터 다운받으실 수 있습니다.");
                            return;
                        }
                    }
                });
        }
            
        }
    </script>
    <script type="text/javascript">
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