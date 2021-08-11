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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5); border-radius:4px}

        /************************************************************/

        .skybanner {position:fixed;top:60px;right:10px; width:220px; text-align:center; z-index:1;}
        .skybanner a {display:block; margin-bottom:5px;}

        .evttop_banners {background:#060606;} 
        .evttop_banners a:hover {border:1px solid #fef200}

        .evttop {background:url(https://static.willbes.net/public/images/promotion/2021/02/1676_top_bg.jpg) no-repeat center top; }

        .box_book{width:920px; margin:50px auto;border-top:2px solid #22197f;}

        .slice_area {margin-top:-5px;}
        .evt01 {background:#fff; padding-top:100px}
        .evt01 iframe{width:853px; height:480px; margin:50px auto 0;}

        .evt02 {background:#e7e7e7;}    
        .evt02 .slide_con {position:relative; width:900px; margin:0 auto}
        .evt02 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt02 .slide_con p.leftBtn {left:-80px}
        .evt02 .slide_con p.rightBtn {right:-80px}       
        
        .evt05 {background:#fff; position:relative}
        .evt05 span {font-size:60px; position:absolute; top:35px; left:50%; margin-left:110px; color:#ce2721; animation: sp01 1.5s linear infinite;}
        @@keyframes sp01{
		from{transform:scale(1.1)}50%{transform:scale(0.9)}to{transform:scale(1.1)}
        }
        .evt05 a {position:absolute; top:30px; left:50%; margin-left:280px}               
	
        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#555; color:#fff; line-height:1.5; margin-top:100px}
        .guide_box{width:980px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:10px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}    	
    </style>

    <div class="evtContent NGR" id="evtContainer">  
        <div class="skybanner" id="QuickMenu">
            <a href="#evt3">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1676_sky2.png" title="한덕현 티패스">
            </a> 
            {{--
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1676_sky.png" usemap="#Map1676_sky" title="반반한 모의고사" border="0">
            <map name="Map1676_sky">
                <area shape="rect" coords="6,116,152,194" href="#watch" />
                <area shape="rect" coords="4,199,150,272" href="#detail" />
                <area shape="rect" coords="4,279,149,355" href="#evt1" />
                <area shape="rect" coords="3,359,153,437" href="#evt3" />
            </map>        
            --}}
            <img src="https://static.willbes.net/public/images/promotion/2021/08/1676_sky3.png" usemap="#Map1676_sky03" border="0">
            <map name="Map1676_sky03" id="Map1676_sky03">
                <area shape="rect" coords="17,87,100,189" href="#evt4" />
                <area shape="rect" coords="115,86,206,189" href="#evt1" />
            </map>
        </div>    

        
        <div class="evtCtnsBox evttop_banners">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/1676_top_banner.jpg">
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="" style="position: absolute; left: 53.57%; top: 43.57%; width: 16.79%; height: 31.43%; z-index: 2;"></a>
                <a href="https://www.willbes.net/classroom/mocktest/exam/index" target="_blank" title="" style="position: absolute; left: 74.29%; top: 43.57%; width: 16.79%; height: 31.43%; z-index: 2;"></a>  
            </div>        
        </div>
        

        <div class="evtCtnsBox evttop">                 
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1676_top.jpg"  title="더켠의 반반한 밤">                        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1676_01_01.jpg" title="마무리짓는 1시간"> 
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
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1676_01_02.jpg" title="더켠읜 반반한 모의고사" id="watch"><br>
            {{--<iframe src="https://www.youtube.com/embed/8T84bvoKd28?rel=0M" frameborder="0" allowfullscreen="" id="youtube_watch"></iframe>--}}
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1676_01_03.jpg" title="더켠읜 반반한 모의고사">         
        </div> 

        
        <div class="evtCtnsBox evt02" id="pairing">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1676_02_01.jpg" id="detail" title="편성표">
            <div class="slide_con">
                <ul id="slidesImg4">                   
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/08/1676_02_august.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/08/1676_02_September.jpg" /></li>
                </ul>    

                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_02_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1676_02_right.png"></a></p>  
                      
            </div> 
            <img src="https://static.willbes.net/public/images/promotion/2021/08/1676_02_02.jpg">       
        </div>           

        {{-- 출석체크 --}}
        <div class="evtCtnsBox evt03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/1676_03_01.jpg" name="evt1" id="evt1">
                <a href="#to_go" title="출석체크하러 가기" style="position: absolute; left: 30.89%; top: 89.05%; width: 38.39%; height: 5.44%; z-index: 2;"></a>
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/1676_03_02.png" name="evt3" id="evt3">
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183200" target="_blank" title="8월방송" style="position: absolute; left: 25.8%; top: 75.72%; width: 21.34%; height: 9.91%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2180" target="_blank" title="한덕현 t-pass" style="position: absolute; left: 53.21%; top: 75.72%; width: 21.34%; height: 9.91%; z-index: 2;"></a>
            </div>
            <div class="wrap" id="evt4">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/1676_03_03.jpg">
                <a href="https://www.instagram.com/?hl=ko" target="_blank" title="인스타" style="position: absolute; left: 8.93%; top: 79.26%; width: 15.89%; height: 7.87%; z-index: 2;"></a>
                <a href="https://ko-kr.facebook.com" target="_blank" title="페이스북" style="position: absolute; left: 26.43%; top: 79.26%; width: 15.89%; height: 7.87%; z-index: 2;"></a>
                <a href="https://top.cafe.daum.net" target="_blank" title="다음카페" style="position: absolute; left: 41.96%; top: 79.26%; width: 15.89%; height: 7.87%; z-index: 2;"></a>
                <a href="https://section.cafe.naver.com/ca-fe" target="_blank" title="네이버카페" style="position: absolute; left: 57.86%; top: 79.26%; width: 15.89%; height: 7.87%; z-index: 2;"></a>
                <a href="https://gall.dcinside.com/board/lists?id=government" target="_blank" title="공무원갤러리" style="position: absolute; left: 74.91%; top: 79.26%; width: 15.89%; height: 7.87%; z-index: 2;"></a>
            </div>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1676_03_03.jpg" usemap="#Map1676e" title="라이브 티비" border="0">
            <map name="Map1676e">
                <area shape="rect" coords="162,62,552,163" href="#pairing" />
                <area shape="rect" coords="569,64,959,159" href="@if(!sess_data('is_login')) {{'javascript:alert(\'로그인 후 서비스 이용이 가능합니다\')'}} @else @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif @endif" />
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

            <span class="NSK-Black">
                @if(time() < strtotime('202108070000'))
                    {{$arr_base['add_apply_member_login_count'] + 1}}
                @else
                    {{$arr_base['add_apply_member_login_count']}}
                @endif
            </span>
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
       

        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">유의사항</h2>
                <dl>
                    <dd>
                        <ol>
                            <li>더켠의 반반&똑똑영어는 사전에 촬영, 촬영분을 실시간으로 송출해드리는 방송이오니 방송 시간에 맞추어 본 페이지에 접속 후 수강하시면 됩니다.
                            (*2주에 1회 진행하는 온라인 모의고사에 대한 해설 방송은 실시간 LIVE로 진행됩니다.)</li>
                            <li>윌비스 통합사이트에 로그인한 회원이라면 누구나 온라인 무료수강 가능합니다.</li>

                            <li>더켠의 반반&똑똑영어 과정 진행 안내 (총 20회)<br>
                            - 매주 월/수/금 21:00~22:00 반반한 모의고사 (모의고사 10문항), 10회분<br>
                            - 매주 화/목 21:00~21:40 똑똑영어 (어휘), 8회분<br>
                            - 1주차/3주차 월~금 : 무료 온라인 모의고사 접수 진행<br>
                            - 1주차/3주차 토~일 : 무료 온라인 모의고사 응시 기간<br>
                            - 2주차/4주차 월 오후 7~8시 : 모의고사 해설 방송 진행 (실시간 LIVE), 2회분
                            </li>

                            <li>본 방송은 방송 종료 후 유료 동영상 강의로 전환됩니다.<br>
                            단, 정규방송과의 형평성을 고려하여 방송 후 1주일 뒤 동영상 서비스가 제공됩니다.</li>

                            <li>강의 자료 제공 일정 안내<br>
                            - 방송 당일 오후 12시~오후 21시40분 : 문제 자료 (사전에 인쇄하여 풀어보신 후 수업에 참여바랍니다.)<br>
                            - 방송 당일 오후 21시40분~자정 : 문제+해설+스터디 자료</li>
                            <li>본 방송은 PC 및 모바일로 시청 가능합니다.<br>
                            - PC의 경우 익스플로러와 크롬 브라우저에서만 시청 가능합니다.<br>
                            - 모바일 기기 접속 시 3G/LTE 데이터 요금이 부과되오니 데이터 사용량을 사전에 확인해주시기 바랍니다.</li>
                            <li>열공 출첵 이벤트 관련<br>
                            - 본 이벤트는 로그인 후 참여 가능하며,8/16(월)~9/10(금)까지 총 20회 진행됩니다. (*공휴일 제외)<br>
                            - 출석체크 가능 시간은 반반(월/수/금) 21:00~22:00, 똑똑(화/목) 21:00~21:40, 모의고사 해설 LIVE (8/23(월), 9/6(월))19:00~20:00로, 시간 내에
                              페이지 새로고침 (F5) 후 출석체크 버튼 클릭 시 정상 인정되며, 방송이 종료되지 않더라도 해당 시간 이외에는 출석으로 인정되지 않습니다. <br>
                            - 당첨자 안내 공지는 9/14(화) 윌비스 공무원 공지사항을 통해 확인하실 수 있습니다.</li>
                        </ol>
                    </dd>
                </dl>
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