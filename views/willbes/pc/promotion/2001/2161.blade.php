@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/
        .skyBanner {position:fixed; width:130px; top:200px; right:10px; z-index:10;}
        .skyBanner a {display:block; margin-bottom:10px}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2161_top_bg.jpg) no-repeat center top;}
        .evt_01 {background:#3252a9; padding-bottom:150px; font-size:14px; line-height:1.4}
        .c_table {width:900px; margin:50px auto 100px; border-radius:40px; padding:40px; background:#fff; box-shadow: 5px 5px 25px rgba(0,0,0,.5);}
        .c_table table {border-radius:40px; }
        .c_table th,
        .c_table td {font-size:28px; text-align:center}
        .c_table th {background:#11153a; color:#edbb3b; padding:30px 0; }        
        .c_table tbody tr {border-bottom:1px solid #cfd1d1; border-left:1px solid #cfd1d1}
        .c_table tbody td {border-right:1px solid #cfd1d1; color:#acacac; height:100px; line-height:100px; position:relative}
        .c_table tbody td span.end {display:block; position:absolute; top:0; left:0; width:100%; height:100%; z-index:5; background:url(https://static.willbes.net/public/images/promotion/2021/04/2161_end.png) no-repeat center center;}        
        .c_table .txtinfo { margin:20px 0; border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto}

        .evt_02 {background:#ececec}
        .evt_03_box {width:1030px; margin:0 auto}
        .evt_03_box li {display:inline; float:left; width:33.33333%}
        .evt_03_box li a {display:block; background:#1b1b1b; color:#fff; font-size:20px; margin-right:10px; border-radius:10px; padding:15px 0}
        .evt_03_box li a:hover,
        .evt_03_box li a.active {background:#c11c20}
        .evt_03_box ul:after {content:''; display:block; clear:both}

        .evt_04 {background:#d3e7ff;}  

        .evt_05 {background:#29306a}
        .evt_05 > div,
        .evt_06 > div {position:relative; width:1120px; margin:0 auto}       

        .evtCtnsBox input[type=text] {height:40px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle; width:40%; font-size:16px}
        .evtCtnsBox input[type=checkbox] {width:20px; height:20px} 
        .evtCtnsBox .btnRequest {width:600px; margin:0 auto}
        .evtCtnsBox .btnRequest a {display:block; border-radius:50px; padding:20px; text-align:center; color:#fff; background:#000; font-size:30px}
        .evtCtnsBox .btnRequest a:hover {background:#ffff00; color:#11153a}

        .evtInfo {padding:80px 0; background:#333333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style-type: disc; margin-left:20px; margin-bottom:10px; font-size:14px}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:37px; height:67px; margin-top:-34px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-50px}
        .slide_con p.rightBtn {right:-50px}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4 li img {width:100%}
        #slidesImg4:after {content::""; display:block; clear:both} 
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skyBanner">
            <a href="#evt01"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_sky01.png" alt="이벤트 하나"/></a>
            <a href="#evt05"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_sky02.png" alt="이벤트 둘"/></a>
            <a href="#evt06"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_sky03.png" alt="이벤트 셋"/></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>     


        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2161_top.jpg"  alt="기초 입문서 무료배포 " />
        </div>

        <form id="add_apply_form" name="add_apply_form">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="event_register_chk" value="N"/>

            @foreach($arr_base['add_apply_data'] as $row)
                @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                    <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                    @break;
                @endif
            @endforeach

            <div class="evtCtnsBox evt_01" id="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2161_01_01.jpg"  alt="선착순 100명 " />
                <div class="c_table NSK-Black">
                    <table>
                        <col />
                        <thead>
                            <tr>
                                <th>월</th>
                                <th>화</th>
                                <th>수</th>
                                <th>목</th>
                                <th>금</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(empty($arr_base['add_apply_data']) === false)
                            @foreach($arr_base['add_apply_data'] as $key => $row)
                                @php $col_cnt = 5; @endphp
                                @if($loop->index % $col_cnt === 1)
                                    <tr>
                                @endif
                                        <td>
                                            {{$row['Name']}}
                                            @if(time() >= strtotime($row['ApplyEndDatm']) || $row['PersonLimit'] <= $row['MemberCnt'])
                                                <span class="end"></span>
                                            @endif
                                        </td>
                                @if($loop->index % $col_cnt === 0)
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2161_01_02.jpg"  alt="선착순 100명 " />
                <div class="c_table tx-left">
                    <div>
                        <input type="text" value="{{ sess_data('mem_name') }}" placeholder="이름" readonly onclick="loginCheck();">
                        <input type="text" value="{{ sess_data('mem_phone') }}" placeholder="연락처 '-'없이 숫자만 입력" readonly onclick="loginCheck();">
                    </div>
                    <div class="txtinfo">
                        ▶ 개인정보 수집 및 이용에 대한 안내<br>
                        <br>
                        개인정보 수집 이용 목적 <br>
                        - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br>
                        - 이벤트 참여에 따른 강의 수강자 목록에 활용<br>
                        <br>
                        개인정보 수집 항목 <br>
                        - 신청인의 이름,연락처<br>
                        <br>
                        개인정보 이용기간 및 보유기간<br>
                        - 본 수집, 활용목적 달성 후 바로 파기<br>
                        <br>
                        개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익 <br>
                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                    </div>
                    <div><input name="is_chk" type="checkbox" value="Y" id="is_chk" onclick="loginCheck();"/> <label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label></div>
                </div>
                <div class="btnRequest NSK-Black"><a href="javascript:void(0);" onclick="fn_add_apply_submit();">하루 100명 선착순! 신청하기 ></a></div>
            </div>
        </form>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2161_02.jpg"  alt="강력 추천 합니다." />            
        </div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2161_03_01.jpg"  alt="출제범위 및 경향분석" />
            <div class="evt_03_box">
                <ul class="evtTab">
                    <li><a href="#tab01">형사법(형법, 형소법)</a></li>
                    <li><a href="#tab02">경찰학</a></li>
                    <li><a href="#tab03">헌법</a></li>
                </ul>
                <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_03_01_t1.jpg"  alt="신광은" /></div>
                <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_03_01_t2.jpg"  alt="장정훈" /></div>
                <div id="tab03"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_03_01_t3.jpg"  alt="김원욱" /></div>
            </div>  
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2161_03_02.jpg"  alt="3가지 포인트" />  
            <div class="evt_03_box">
                <ul class="evtTab">
                    <li><a href="#tab04">형사법(형법, 형소법)</a></li>
                    <li><a href="#tab05">경찰학</a></li>
                    <li><a href="#tab06">헌법</a></li>
                </ul>
                <div id="tab04"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_03_02_t1.jpg"  alt="신광은" /></div>
                <div id="tab05"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_03_02_t2.jpg"  alt="장정훈" /></div>
                <div id="tab06"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_03_02_t3.jpg"  alt="김원욱" /></div>
            </div>    
        </div>

        <div class="evtCtnsBox evt_04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2161_04.jpg"  alt="고득점 전략가" /> 
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_04_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_04_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_04_03.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_p_prev.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/04/2161_p_next.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt_05" id="evt05">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2161_05.jpg"  alt="무료수강 이벤트" />
                <a href="https://police.willbes.net/lecture/index/cate/3001/pattern/free" target="_blank" title="3과목 기초입문" style="position: absolute; left: 32.23%; top: 65.11%; width: 35.98%; height: 4.73%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180748" target="_blank" title="형사법" style="position: absolute; left: 52.86%; top: 73.74%; width: 28.93%; height: 3.96%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180566" target="_blank" title="경찰학" style="position: absolute; left: 52.77%; top: 77.95%; width: 28.93%; height: 3.96%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180567" target="_blank" title="헌법" style="position: absolute; left: 52.77%; top: 81.97%; width: 28.93%; height: 3.96%; z-index: 2;"></a>
            </div> 
        </div>

        <div class="evtCtnsBox evt_06" id="evt06">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2161_06.jpg"  alt="소문내기 이벤트" /> 
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운받기" style="position: absolute; left: 26.96%; top: 82.66%; width: 45.63%; height: 5.88%; z-index: 2;"></a>
            </div>            
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif 

        <div class="evtCtnsBox evtInfo">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">[2022년 대비 기초 입문서 ] 무료배포 이벤트</h4>
				<ul>
                    <li>이벤트 기간<br>
                        2021.04.5(월) ~ 2021.04.30(금)</li>
                    <li>이벤트 대상<br>
                        4/5(월) 이후 신규 회원 및 기존회원 누구나</li>
                    <li>이벤트 내용<br>
                        매일 선착순 100명에게 "2022년 개편 대비 기초 입문서" 무료 배포</li>                         
				</ul>
				<div class="infoTit NSK-Black">유의사항</div>
				<ul>
                    <li>한 ID당 1회만 참여 가능합니다. </li> 
                    <li>본인 ID로만 참여 가능하며, 타인의 ID로는 참여가 불가능합니다.</li> 
                    <li>회원탈퇴 후 재가입하여 참여하시는 분은 이벤트 당첨에서 제외됩니다.</li> 
                    <li>회원정보 오류로 인해 미발송된 경우 재발송이 불가하오니, 이벤트 참여 전 정확한 확인을 부탁드립니다.</li> 
                    <li>이벤트 상품 발송 후에는 환불이 불가능합니다. (파손시 교환 가능합니다.)</li> 
                    <li>당첨된 교재는 당첨 즉시 [로그인] > [장바구니] > [교재 ]  에서 확인하실 수 있습니다.</li> 
                    <li>배송비 결제 관련 2021년 04월 30일(금)까지 배송비 2,500원을 결제해야 하며 이후, 교재 재 지급은 불가능합니다.<br>
                    *기한 내 배송비를 결제하지 않을 경우, 장바구니에 지급된 교재는 7일 이후 삭제됩니다.<br>
                    *무료배포 상품의 경우, 마이페이지 장바구니 상에서 포인트 결제 및 쿠폰 사용이 불가하며 판매용 교재와는 합배송 불가합니다.</li> 
                    <li>배송비 결제 완료하신 분들에 한해 순차적으로 배송됩니다.<br>
                    * 발송일정은 내부사정에 의해 변동될 수 있습니다. <br>
                    *물품을 받을 배송지는 반드시 이벤트 참여 전에 다시 확인해주세요. <br>
                    *배송은 배송비 결제 시 입력한 배송 주소지로 발송되며, 입력된 배송지가 잘못되어있으면 배송이 되지 않을 수도 있습니다. 이 경우에는 윌비스에서 책임 지지 않습니다 *배송 주소지 변경은 불가합니다.</li> 
                    <li>탈퇴, 타인의 개인정보 도용 등의 부정한 방법으로 이벤트 참여 시, 혜택 제공 대상자에서 제외됩니다.</li>
				</ul>
				<h4 class="NSK-Black">소문내기 이벤트</h4>
                <div class="infoTit NSK-Black">[22년 개편과목 기초입문서 무료배포 소문내기 이벤트]</div>
				<ul>
                    <li>소문내기 이벤트 기간 : 21.04.05(월) ~ 21.04.30(금)</li>                      
                    <li>4/30(금)까지 진행되며, 기초입문서 제공일은 4월 12일(월)과 4월 19일(월), 4월26일(월) 추첨되며, 이후 당첨자에게는 신청 시 입력한 휴대전화 번호로 개별 연락드립니다.</li>
                    <li>소문내기 이벤트시 100% 당첨으로, 선착순 200명 선정되며, 기초입문서 장바구니 유효기간은 7일 입니다.</li>
                    <li>장바구니 유효기간 이후 기초입문서 재지급은 불가 합니다.</li>
                    <li>해당 이벤트는 로그인 후, 참여 가능합니다.<br>
                    - 동일한 URL은 한 번 참여한 것으로 인정됩니다. <br>
                    - 동일 게시판에 1일 1개글 이상 작성시 1회 참여만 인정됩니다. (참여 카페, 커뮤니티/게시판/날짜를 다르게 한 다중참여는 가능) <br>
                    - 동일한 게시글은 한번만 인정됩니다(최초 작성 글)<br>
                    - 참여는 여러 번 가능하나 혜택은 ID당 1회만 지급됩니다. 21년 04월 30일 23시 59분 59초 까지의 기록을 기준으로 대상자를 선정합니다. </li>
                    <li>[로그인 > 장바구니]을 통해 확인 가능합니다. </li>
                    <li>잘못된 정보를 기재, 기타 부정한 방법으로 참여할 경우 당첨이 취소 될 수 있습니다. </li>
                    <li>소문내기 이벤트 인증 게시글은 각 커뮤니티의 정책에 의해 게시글이 삭제되어 확인할 수 없는 경우는 인증에 포함되지 않습니다.</li>
                    <li>해당 이벤트는 사정에 의해 변경 혹은 종료될 수 있습니다. </li>
                    <li>유의사항을 읽지 않고 발생한 모든 사항에 대해서 윌비스경찰은 책임지지 않습니다.</li>
				</ul>
                <div class="infoTit NSK-Black">※ 이용문의 : 고객센터 1544-5006 / 온라인 1:1 상담 게시판</div>
			</div>
		</div>       


    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('.evtTab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
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

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
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

        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        }

        // 무료 당첨
        function fn_add_apply_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

            if ($("input:checkbox[name='is_chk']:checked").val() !== 'Y') {
                alert('윌비스 개인정보 제공에 동의하셔야 합니다.');
                return;
            }

            if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
                alert('이벤트 기간이 아닙니다.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }
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
                ['이미 신청하셨습니다.','이미 참여하셨습니다.'],
                ['신청 되었습니다.','당첨을 축하합니다. 장바구니를 확인해 주세요.'],
                //['이벤트 신청후 이용 가능합니다.','봉투모의고사 신청후 이용 가능합니다.'],
                ['마감되었습니다.','내일 14시에 다시 도전해 주세요.']
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