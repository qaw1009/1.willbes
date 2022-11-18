@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/        

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/11/2827_top_bg.jpg) no-repeat center top; height:1428px;}
        .evtTop span {position: absolute; top:300px; left:50%; margin-left:-380px; z-index: 2;}

        a.btn {width:600px; margin:50px auto; display:block; background:#010a2b; color:#fff; font-size:30px; padding:20px; border-radius:20px}
        a.btn:hover,
        .evt03 a.btn:hover {background:#06f4f6; color:#010a2b}

        .evt01 {margin-top:100px}

        /*선착순 이벤트*/
        .evt03 {background:#010729 url(https://static.willbes.net/public/images/promotion/2022/11/2827_03_bg.jpg) repeat-x center top; padding:100px 0}
        .evt03 a.btn {background:#000;}
        .evt03 .attend {width:1000px; margin:50px auto; line-height:1.4; font-size:16px; display:flex; justify-content: space-between; flex-wrap: wrap;}
        .evt03 .attend > div {background:url(https://static.willbes.net/public/images/promotion/2022/11/2827_date_bg.png) no-repeat center center; width:183px; height:183px; display:flex; justify-content: center; align-items: center;  flex: 1 1 20%; margin-bottom:20px; position: relative;}
        .evt03 .attend > div:hover {cursor: pointer;}
        .evt03 .attend > div p {display:block; font-size:18px;  width:100%; margin:0; padding:0; line-height:1.2}
        .evt03 .attend > div p strong {font-size:22px; font-weight:bold;}
        .evt03 .attend > div div {position: absolute; width:100%; height:100%; background:rgba(0,0,0,.8); color:#fff; font-size:40px; border-radius:20px; display:flex; justify-content: center; align-items: center; font-weight:bold}

        /* 
        .evt03 .attend {position:absolute; bottom:475px; left:50%; width:850px; margin-left:-425px; z-index:1; display: flex; justify-content: space-evenly; flex-wrap: wrap;}
        .evt03 .attend span {background:url(https://static.willbes.net/public/images/promotion/2022/11/2827_date_bg.png) no-repeat center top; width:176px; height:176px;
        font-size:18px; padding-top:30px; font-family: Impact,  "Noto Sans KR Regular", Haettenschweiler, 'Arial Narrow Bold', sans-serif; color:#425A94; margin-bottom:10px}
        .evt03 .attend span.end {background-image:url(https://static.willbes.net/public/images/promotion/2022/11/2827_as_off.png); font-size:0;}
        */

        .evt05 {background:#010c2c;}

    </style>

    <div class="evtContent NSK" id="evtContainer">       

        <div class="evtCtnsBox evtTop">
            <span data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/11/2827_top_img.png" title="극한 퀴즈쇼  "></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <a href="#reply" class="btn NSK-Black">11/26일 극한 퀴즈쇼 참가 신청하기 ></a>
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_01.jpg" title="퀴즈쇼 참가 이벤트">
            <div id="reply">
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
            </div> 
        </div>   

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_02.jpg" title="라이브 방송">
            <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" class="btn NSK-Black">윌비스경찰 유튜브 채널 바로가기 ></a>
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

            <div class="evtCtnsBox evt03" data-aos="fade-up" id="first_come">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_03.png" alt="무료증정 이벤트"/>
                    <div class="attend">
                        <div>
                            <p>11/21(월)<br>
                            경찰학<br>
                            2총기<br>
                            <strong>50명</strong></p>
                            <div>마감</div>
                        </div>
                        <div>
                            <p>11/22(화)<br>
                            경찰학<br>
                            2총기<br>
                            <strong>50명</strong></p>
                        </div>
                        <div>
                            <p>11/23(수)<br>
                            경찰학<br>
                            2총기<br>
                            <strong>50명</strong></p>
                        </div>
                        <div>
                            <p>11/24(목)<br>
                            경찰학<br>
                            2총기<br>
                            <strong>50명</strong></p>
                        </div>
                        <div>
                            <p>11/25(금)<br>
                            경찰학<br>
                            2총기<br>
                            <strong>50명</strong></p>
                        </div>
                        <div>
                            <p>11/28(월)<br>
                            경찰학<br>
                            서브노트<br>
                            <strong>50명</strong></p>
                        </div>
                        <div>
                            <p>11/29(화)<br>
                            경찰학<br>
                            서브노트<br>
                            <strong>50명</strong></p>
                        </div>
                        <div>
                            <p>11/30(수)<br>
                            경찰학<br>
                            서브노트<br>
                            <strong>50명</strong></p>
                        </div>
                        <div>
                            <p>12/1(목)<br>
                            경찰학<br>
                            서브노트<br>
                            <strong>50명</strong></p>
                        </div>
                        <div>
                            <p>12/2(금)<br>
                            경찰학<br>
                            서브노트<br>
                            <strong>50명</strong></p>
                        </div>
                    </div>
                    <a href="#none" class="btn NSK-Black">김재규 교수님 스탬프 랠리 신청하기 ></a>


                    {{--
                    <div class="attend {{time() .' '. strtotime($row['ApplyEndDatm'])}}" data-aos="fade-right">
                        @if(empty($arr_base['add_apply_data']) === false)
                            @foreach($arr_base['add_apply_data'] as $key => $row)
                                <span class="{{ (time() >= strtotime($row['ApplyEndDatm']) || $row['PersonLimit'] <= $row['MemberCnt'] ? 'end' : '') }}">{{$row['Name']}}</span>
                            @endforeach
                        @endif
                    </div>
                    <a href="javascript:void(0);" title="신청하기" onclick="fn_add_apply_submit(); return false;" style="position: absolute;left: 21.05%;top: 83.77%;width: 54.11%;height: 5.02%;z-index: 2;"></a>
                    --}}
                </div>
            </div>
        </form> 
        
        
        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_04.jpg" title="총알 스탬프랠리">
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2827_05.jpg" title="김재규 총알 경찰학">
        </div>
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>

    <script type="text/javascript">
        // 무료 당첨
        function fn_add_apply_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

            if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
                alert('이벤트 기간이 아닙니다.'); return;
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
                ['이미 신청하셨습니다.','이미 당첨되셨습니다.'],
                ['신청 되었습니다.','당첨을 축하합니다. 장바구니를 확인해 주세요.'],
                //['이벤트 신청후 이용 가능합니다.','봉투모의고사 신청후 이용 가능합니다.'],
                ['마감되었습니다.','내일 21시에 다시 도전해 주세요.']
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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop