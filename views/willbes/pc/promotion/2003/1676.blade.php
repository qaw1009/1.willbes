@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">     
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed;top:150px;right:0; width:160px; text-align:center; z-index:1;}
        .skybanner a {display:block; margin-bottom:10px}


        .evttop_banner {background:#433F71; padding-top:50px}

        /* 탭 */
        .tabContaier{width:1120px; margin:0 auto}
        .tabContaier ul {width:1120px; text-align:center; margin:0 auto}
        .tabContaier li {display:inline; float:left; width:50%}
        .tabContaier a {display:block; padding:20px 0; line-height:1; text-align:center; font-size:30px;color:#7B7F82;} 
        .tabContaier .time {font-size:25px;}
        .tabContaier li:last-child {margin:0}
        .tabContaier a:hover,
        .tabContaier a.active {background:#433F71; border:1px solid #433F71; color:#fff;}
        .tabContaier ul:after {content:''; display:block; clear:both;}
        .tabContents {margin-top:20px}

        .evttop {background:url(https://static.willbes.net/public/images/promotion/2020/06/1676_top_bg.jpg) no-repeat center top; }

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
		.wb_ctsInfo {background:#2b2b2b; padding:100px 0; margin-top:50px}  
        .wb_ctsInfo div {width:980px; margin:0 auto; color:#fff; width:900px; display:block; border:1px solid #aaa; padding:80px; line-height:1.5; font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important; }
        .wb_ctsInfo div h3 {font-size:28px !important; letter-spacing:-1px; margin-bottom:30px; color:#fff;}        
        .wb_ctsInfo ul li .big {font-size:15px; font-weight:bold;}
        .wb_ctsInfo ul li {margin:10px 0 15px 15px; list-style:decimal; color:#eee; font-size:13px;}        
		.txt_point {color:#ff9472; font-size:12px;}
        	
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  

        <div class="skybanner">
            <a href="#evt3">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1676_sky2.png" title="한덕현 티패스">
            </a> 
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1676_sky.png" usemap="#Map1676_sky" title="반반한 모의고사" border="0">
            <map name="Map1676_sky">
                <area shape="rect" coords="6,116,152,194" href="#youtube_watch" />
                <area shape="rect" coords="4,199,150,272" href="#detail" />
                <area shape="rect" coords="4,279,149,355" href="#evt1" />
                <area shape="rect" coords="-1,359,149,437" href="#evt3" />
            </map>           
        </div>         
        
        <div class="evtCtnsBox wb_top_tab" >
            <div class="tabContaier">
                <ul class="NGEB">
                    <li>
                        <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1675">더켠의 아침 똑똑 영어<br>
                        <span class="time">매일 아침 07:30AM~08:00AM</span></a>
                    </li>
                    <li>
                        <a href="#none" class="active">더켠의 반반한 밤<br>
                        <span class="time">매일 밤 21:00PM~22:00PM</span></a>
                    </li>
                </ul>
            </div>
        </div>        
        {{--
        <div class="evtCtnsBox evttop_banner" >     
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1676_top_banner.jpg" usemap="#Map1588banner"  title="더켠의 반반한 밤" border="0" />
            <map name="Map1588banner" id="Map1588banner">
                <area shape="rect" coords="597,16,806,94" href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" />
                <area shape="rect" coords="809,15,1020,95"href="https://www.willbes.net/classroom/mocktest/exam/index" target="_blank" />
            </map>             
        </div>
        --}}   
        <div class="evtCtnsBox evttop" >     
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_top.jpg"  title="더켠의 반반한 밤">            
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01.jpg" title="마무리짓는 1시간"> 
            <div class="box_book">
                <div class="slice_area">
                    <ul class="slidesDay">
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01_monday.png" alt="월요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01_tuesday.png" alt="화요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01_wednesday.png" alt="수요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01_thursday.png" alt="목요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01_friday.png" alt="금요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01_saturday.png" alt="토요일"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01_sunday.png" alt="일요일"/></li>         
                    </ul> 
                </div>        
            </div>            
        </div>              

        <div class="evtCtnsBox evt01s">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01s.jpg" title="더켠읜 반반한 모의고사">    
            <map name="Map1588a" id="Map1588a">
                <area shape="rect" coords="359,844,751,907" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ/videos?view=0&sort=dd&shelf_id=7" target="_blank" />
            </map>
        </div>     

        <div class="evtCtnsBox evt01s_youtube">  
            <iframe src="https://www.youtube.com/embed/8T84bvoKd28?rel=0M" frameborder="0" allowfullscreen="" id="youtube_watch"></iframe>          
        </div>

        <div class="evtCtnsBox evt01ss">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_01ss.jpg" title="공시 영어의 지존">        
        </div>
        
        <div class="evtCtnsBox evt02" id="pairing">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_02.jpg" id="detail" title="편성표">
            <div class="slide_con">
                <ul id="slidesImg4">        
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1676_02_november.jpg" /></li>
                    {{--<li><img src="https://static.willbes.net/public/images/promotion/2020/10/1676_02_december.jpg" /></li>--}}
                </ul>
         
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_02_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_02_right.png"></a></p>
            
            </div>        
        </div>           

        {{-- 출석체크 --}}
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1676_03.jpg" name="evt1" usemap="#Map1676b" id="evt1" title="지금 바로 출석체크하러 가기" border="0" >
            <map name="Map1676b">
                <area shape="rect" coords="368,974,749,1034" href="#to_go" />
            </map>
        </div>

        <div class="evtCtnsBox evt03ss">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1676_03ss.gif" name="evt3" usemap="#Map1676ss" id="evt3" title="다시보기 서비스" border="0">
            <map name="Map1676ss" id="Map1676ss">
                <area shape="rect" coords="182,565,496,640" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/173676" target="_blank" alt="11월 방송" />
                <area shape="rect" coords="618,565,942,642" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/163829" target="_blank" alt="1년치 방송" />
                <area shape="rect" coords="650,950,908,1054" href="https://pass.willbes.net/promotion/index/cate/3019/code/1614" target="blank" alt="티패스" />
            </map>  
        </div>


        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_04.jpg" usemap="#Map1676e" title="라이브 티비" border="0">
            <map name="Map1676e" id="Map1588e">
                <area shape="rect" coords="123,27,396,126" href="#pairing" />
                <area shape="rect" coords="436,24,711,126" href="@if(!sess_data('is_login')) {{'javascript:alert(\'로그인 후 서비스 이용이 가능합니다\')'}} @else @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif @endif" />
                <area shape="rect" coords="738,24,996,126" href="https://pass.willbes.net/pass/support/notice/show?board_idx=266556" target="_blank" />
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
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_05.jpg" title="출석 횟수">
            <span class="NSK-Black">{{$arr_base['add_apply_member_login_count']}}</span>
            @php $apply_check = false; @endphp
            @foreach($arr_base['add_apply_data'] as $row)
                @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                    @if($row['MemberLoginCnt'] == '0')
                    <a href="javascript:fn_add_apply_submit();">
                        <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_stamp.png" title="출석전" class="checkoff">
                    </a>
                    @else
                    <a href="javascript:alert('이미 출석체크 하셨습니다.');">
                        <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_stamp_check.png" title="출석후" class="checkon">
                    </a>
                    @endif
                    @php $apply_check = true; @endphp
                    @break;
                @endif
            @endforeach
            @if($apply_check === false)
                <a href="javascript:alert('출석체크 기간이 아닙니다.');">
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1676_stamp.png" title="출석전" class="checkoff">
                </a>
            @endif
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
						&nbsp;- 2주분 방송 진행 후 월~금 : 무료 온라인 모의고사 접수 진행 (*금요일 오후 6시 신청 접수 마감)<br>
						&nbsp;- 모의고사 접수 후 토~일 : 무료 온라인 모의고사 응시 기간<br>
						&nbsp;- 모의고사 응시 후 월 오후 7~8시 : 모의고사 해설 방송 진행 (실시간 LIVE)<br>    
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
						&nbsp;- 본 이벤트는 로그인 후 참여 가능하며,11월 2일(월)부터 11월 27일(금)까지 총 20회 진행됩니다. (*공휴일 제외)<br>
						&nbsp;- 출석체크 가능 시간은 정규방송 (월~금) 기준 오후 9~10시 사이, 모의고사 해설 LIVE 11/9(월), 11/23(월)의 경우 <br>
						&nbsp;&nbsp;&nbsp;오후 7-8시만 인정되며 방송이 종료되지 않더라도 해당 시간 이외 출석체크는 출석으로 인정되지 않습니다.<br>
						&nbsp;- 총 출석횟수에 따라 경품이 차등 지급되며, 단 1번만 참여해도 경품이 전원 지급됩니다.<br>
						&nbsp;- 당첨자 안내 공지는 12/1(화) 윌비스 공무원 공지사항을 통해 확인하실 수 있습니다.<br>
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