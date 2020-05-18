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
            background:#fff;
            margin-top:20px !important;
            padding:0 !important;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed;top:250px;right:10px;z-index:1;}

        .evttop_banner {background:#FDEADB;}

        .evttop {background:#020015 url(https://static.willbes.net/public/images/promotion/2020/04/1588_top_bg.jpg) no-repeat center top; }

        .box_book{width:920px; margin:0 auto;border-top:2px solid #22197f;}

        .slice_area {margin-top:-5px;}
        .evt01 {background:#f3f3f3}
        .evt01s {padding-top:80px; background:#f3f3f3}
        .evt01s_youtube {background:#f3f3f3}
        .evt01s_youtube iframe{width:853px; height:480px; margin:50px auto 0;}
        .evt01ss {padding-top:100px; background:#f3f3f3}

        .evt02 {background:#e7e7e7;padding-bottom:120px;}    
        .evt02 .slide_con {position:relative; width:900px; margin:0 auto}
        .evt02 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt02 .slide_con p.leftBtn {left:-80px}
        .evt02 .slide_con p.rightBtn {right:-80px}

        .evt_soon {padding:50px 0;}

        .evt03, .evt03ss, .evt04{background:#fff}
        
        .evt05 {background:#fff; position:relative}
        .evt05 span {font-size:60px; position:absolute; top:35px; left:50%; margin-left:110px; color:#ce2721; animation: sp01 1.5s linear infinite;}
        @@keyframes sp01{
		from{transform:scale(1.1)}50%{transform:scale(0.9)}to{transform:scale(1.1)}
        }
        .evt05 a {position:absolute; top:30px; left:50%; margin-left:280px}               
	
	    /*유의사항*/
		.wb_ctsInfo {background:#2b2b2b; padding:100px 0}  
        .wb_ctsInfo div {width:980px; margin:0 auto; color:#fff; width:900px; display:block; border:1px solid #aaa; padding:80px; line-height:1.5; font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important; }
        .wb_ctsInfo div h3 {font-size:28px !important; letter-spacing:-1px; margin-bottom:30px; color:#fff;}        
        .wb_ctsInfo ul li .big {font-size:15px; font-weight:bold;}
        .wb_ctsInfo ul li {margin:10px 0 15px 15px; list-style:decimal; color:#eee; font-size:13px;}        
		.txt_point {color:#ff9472; font-size:12px;}
        	
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  
        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1588_sky.png" usemap="#Map1588_sky" title="반반한 모의고사" border="0">
            <map name="Map1588_sky" id="Map1588_sky">
                <area shape="rect" coords="6,116,152,194" href="#youtube_watch" />
                <area shape="rect" coords="4,199,150,272" href="#detail" />
                <area shape="rect" coords="4,279,149,355" href="#evt1" />
                <area shape="rect" coords="-1,359,149,437" href="#evt3" />
                <area shape="rect" coords="1,443,147,523" href="#evt3" />
            </map>           
        </div>
       
        <div class="evtCtnsBox evttop_banner" >     
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1588_top_banner.jpg" usemap="#Map1588banner"  title="더켠의 반반한 밤" border="0" />
            <map name="Map1588banner" id="Map1588banner">
                <area shape="rect" coords="597,16,806,94" href="https://pass.willbes.net/pass/mockTest/apply/cate/" onfocus='this.blur()' target="_blank" />
                <area shape="rect" coords="809,15,1020,95"href="https://www.willbes.net/classroom/MockExam/" onfocus='this.blur()' target="_blank" />
            </map>             
        </div>                    
        
        <div class="evtCtnsBox evttop" >     
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1588_top.jpg"  title="더켠의 반반한 밤">            
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01.jpg" title="마무리짓는 1시간"> 
            <div class="box_book">
                <div class="slice_area">
                    <ul class="slidesDay">
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_monday.png" alt="월요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_tuesday.png" alt="화요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_wednesday.png" alt="수요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_thursday.png" alt="목요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_friday.png" alt="금요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_saturday.png" alt="토요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01_sunday.png" alt="일요일"/></li>         
                    </ul> 
                </div>        
            </div>            
        </div>              

        <div class="evtCtnsBox evt01s">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01s.jpg" title="더켠읜 반반한 모의고사">    
            <map name="Map1588a" id="Map1588a">
                <area shape="rect" coords="359,844,751,907" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ/videos?view=0&sort=dd&shelf_id=7" target="_blank" />
            </map>
        </div>     

        <div class="evtCtnsBox evt01s_youtube">  
            <iframe src="https://www.youtube.com/embed/8T84bvoKd28?rel=0M" frameborder="0" allowfullscreen="" id="youtube_watch"></iframe>          
        </div>

        <div class="evtCtnsBox evt01ss">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_01ss.jpg" title="공시 영어의 지존">        
        </div>
        
        <div class="evtCtnsBox evt02" id="pairing">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02.jpg" id="detail" title="편성표">
            <div class="slide_con">
                <ul id="slidesImg4">
                    {{--<li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02_april.jpg" /></li>--}}
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02_may.jpg" /></li>
                </ul>
                {{--
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/03/1588_02_right.png"></a></p>
                --}}
            </div>        
        </div>           

        {{-- 출석체크 --}}
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_03.jpg" usemap="#Map1588b" title="지금 바로 출석체크하러 가기" border="0" id="evt1" >
            <map name="Map1588b" id="Map1588b">
                <area shape="rect" coords="370,974,751,1034" href="#to_go" />
            </map>
        </div>

        {{--
        <div class="evtCtnsBox evt03c">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_03s.jpg" usemap="#Map1588c" title="반반한 소문내기" border="0" id="evt2">
            <map name="Map1588c" id="Map1588c">
                <area shape="rect" coords="181,839,363,926" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="392,837,556,926" href="http://cafe.daum.net/9glade" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="587,834,754,927" href="https://cafe.naver.com/gugrade" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="781,832,951,929" href="https://cafe.naver.com/willbes" target="_blank" onfocus='this.blur()' />
            </map>
        --}}      

        </div>
        <div class="evtCtnsBox evt03ss">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1588_03ss.gif" usemap="#Map1588ss" id="evt3" title="다시보기 서비스" border="0">
            <map name="Map1588ss" id="Map1588ss">
                <area shape="rect" coords="184,565,498,640" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/164554" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="622,564,946,641" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/163829" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="769,935,908,1053" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/163940" target="_blank" onfocus='this.blur()' />
            </map>         
        </div>

        {{-- TODO --}}
        {{-- 다시보기 구매 --}}
        {{--
        <div class="evtCtnsBox evt03ss">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_03ss.jpg" usemap="#Map1588d" title="지금 바로 구매하기" border="0">
            <map name="Map1588d" id="Map1588d">
                <area shape="rect" coords="378,332,741,382" href="#none;" />
            </map>
        </div>
        --}}

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_04.jpg" usemap="#Map1588e" title="라이브 티비" border="0">
            <map name="Map1588e" id="Map1588e">
                <area shape="rect" coords="123,27,396,126" href="#pairing" onfocus='this.blur()' />
                <area shape="rect" coords="436,24,711,126" href="@if(!sess_data('is_login')) {{'javascript:alert(\'로그인 후 서비스 이용이 가능합니다\')'}} @else @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif @endif" onfocus='this.blur()' />
                <area shape="rect" coords="738,24,996,126" href="https://pass.willbes.net/pass/support/notice/show?board_idx=266556" target="_blank" onfocus='this.blur()' />
            </map>      
            <div class="liveWrap" >
                @if(empty($data['PromotionLivePlayer']) === false && $data['PromotionLivePlayer'] == 'youtube')
                    @include('willbes.pc.promotion.live_video_youtube_partial')
                @else
                    @include('willbes.pc.promotion.live_video_partial')
                @endif
            </div>                 
        </div>

        {{-- 출석체크 추가신청 form --}}
        <form id="add_apply_form" name="add_apply_form">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            {{-- <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/> --}}
            <input type="hidden" name="event_register_chk" value="N"/>
            @foreach($arr_base['add_apply_data'] as $row)
                @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                    <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                    @break;
                @endif
            @endforeach
        </form>

        {{-- 출석체크 --}}
        <div class="evtCtnsBox evt05" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_05.jpg" title="출석 횟수">
            <span class="NSK-Black">{{$arr_base['add_apply_member_login_count']}}</span>
            @php $apply_check = false; @endphp
            @foreach($arr_base['add_apply_data'] as $row)
                @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                    @if($row['MemberLoginCnt'] == '0')
                    <a href="javascript:fn_add_apply_submit();">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_stamp.png" title="출석전" class="checkoff">
                    </a>
                    @else
                    <a href="javascript:alert('이미 출석체크 하셨습니다.');">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_stamp_check.png" title="출석후" class="checkon">
                    </a>
                    @endif
                    @php $apply_check = true; @endphp
                    @break;
                @endif
                @if($apply_check === false)
                    <a href="javascript:alert('출석체크 기간이 아닙니다.');">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_stamp.png" title="출석전" class="checkoff">
                    </a>
                @endif
            @endforeach
        </div>

        {{-- 이모티콘 댓글 --}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
        @endif

        <div class="wb_ctsInfo">
            <div>
                <h3 class="NGEB">- 유의사항 - </h3>
                <ul>
				    <li>
                        <span class="big">더켠의 반반한 모의고사는 윌비스공무원학원 실강 동영상 촬영분을 일정에 맞추어 정기 송출해드리는 방송이오니,<br> 방송 시간에 맞추어 본 페이지에 접속 후 수강하시면 됩니다.</span><br> 
						<span class="txt_point">(*2주에 1회 진행하는 온라인 모의고사에 대한 해설 방송은 실시간 LIVE로 진행됩니다.)</span>
					</li>
                    <li>                    
                        <span class="big">윌비스 통합사이트에 로그인한 회원이라면 누구나 온라인 무료수강 가능합니다.</span>
                    </li>       
                    <li>                    
                        <span class="big">더켠의 반반한 모의고사 과정 진행 안내</span><br>
						&nbsp;- 매주 월~금 오후 9~10시 : 더켠의 반반한 모의고사+해설 정규 방송<br>    
						&nbsp;- 매월 홀수 주 월~금 : 무료 온라인 모의고사 접수 진행 (*금요일 오후 6시 모의고사 신청 접수 마감)<br>
						&nbsp;- 매월 홀수 주 토~일 : 무료 온라인 모의고사 응시 기간<br>
						&nbsp;- 매월 짝수 주 월 오후 7~8시 : 모의고사 해설 방송 진행 (실시간 LIVE)<br>    
						<span class="txt_point"> (*무료 온라인 모의고사의 경우, 2주에 1회 진행)</span><br>    
					</li>    
                    <li>                    
                        <span class="big">본 방송은 방송 종료 후 유료 동영상 강의로 전환됩니다.<br>단, 정규방송과의 형평성을 고려하여 방송 후 일주일 뒤 동영상
                        서비스가 제공됩니다.</span>
					</li>
                    <li>                    
                        <span class="big">강의 자료 제공 일정 안내</span><br>
                        &nbsp;- 방송 당일 오후 12시~오후 22시 : 문제 자료 (사전에 인쇄하여 풀어보신 후 수업에 참여바랍니다.)<br>
						&nbsp;- 방송 당일 오후 22시~자정 : 문제+해설+스터디 자료<br>
					</li>     
                    <li>                   
                        <span class="big">본 방송은 PC 및 모바일로 시청 가능합니다.</span><br>
						&nbsp;- PC의 경우 익스플로러와 크롬 브라우저에서만 시청 가능합니다.<br>
						&nbsp;- 모바일 기기 접속 시 3G/LTE 데이터 요금이 부과되오니 데이터 사용량을 사전에 확인해주시기 바랍니다.<br>
					</li>   
                    <li>                    
                        <span class="big">열공 출첵 이벤트 관련</span><br>
						&nbsp;- 본 이벤트는 로그인 후 참여 가능하며, 5월 11일(월)부터 6월 5일(금)까지 총 20회 진행됩니다. (공휴일 제외)<br>
						&nbsp;- 출석체크 가능 시간은 정규방송 (월~금) 기준 오후 9~10시 사이, 모의고사 해설 LIVE (5/11(월), 5/25(월))의 경우<br>
						&nbsp;오후 7-8시만 인정되며 방송이 종료되지 않더라도 해당 시간 이외 출석체크는 출석으로 인정되지 않습니다.<br>
						&nbsp;- 총 출석횟수에 따라 경품이 차등 지급되며, 단 1번만 참여해도 경품이 전원 지급됩니다.<br>
						&nbsp;- 당첨자 안내 공지는 6월 9일(화) 윌비스 공무원 공지사항을 통해 확인하실 수 있습니다.<br>
					</li>
                    <li>                    
                        <span class="big">돌발퀴즈 이벤트 관련</span><br>
						&nbsp;- 본 이벤트는 수업 진행 도중 진행되며, 본 페이지 댓글로만 정답을 제출하실 수 있습니다.<br>
						&nbsp;- 선착순으로 정해진 인원에 맞추어 당첨자가 선정되며, 돌발퀴즈 다음날 오전 당첨자 공지 후 경품 발송됩니다.<br>
						&nbsp;- 회원정보에 등록된 전화번호로 경품이 발송되오니, 이벤트 참여 전 올바른 전화번호를 입력해주시기 바랍니다.				
                    </li>                            
                </ul>
            </div>
        </div>
                
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var BxBook = $('.slidesDay').bxSlider({
                slideWidth: 153,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });

        {{-- 출석 체크 --}}
        function fn_add_apply_submit() {

            @if(date('YmdHi') < '202004132100' && ENVIRONMENT == 'production')
                alert('4월13일 21:00 부터 이벤트 참여 가능합니다.');
                return;
            @endif

            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
                alert('이벤트 기간이 아닙니다.'); return;
            }

            if (!confirm('출첵하시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.reload();
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg || '') );
            }, null, false, 'alert');
        }

        // 이벤트 추가 신청 메세지
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['이미 신청하셨습니다.','이미 출첵하셨습니다.'],
                ['신청 되었습니다.','출첵 완료!'],
                // ['처리 되었습니다.','장바구니에 담겼습니다.'],
                // ['마감되었습니다.','이벤트 기간에 응모해주세요. 당일 20:00부터 시작됩니다.']
            ];

            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }
    </script>

@stop