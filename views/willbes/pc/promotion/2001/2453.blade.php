@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:200px; width:120px; right:10px;z-index:1;}        
        .sky a {display:block;margin-bottom:15px;}
      
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2453_bf_top_bg.jpg) no-repeat center top;}
        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2453_01_bg.jpg) no-repeat center top;}
        .wb_02 {background:#4f3030;}
        .wb_04 {background:#e2a990;}    
        .wb_04 ._tree_1 {width:122px;height:143px;position:absolute; top:200px; left:50%;z-index:1;background:url(https://static.willbes.net/public/images/promotion/2021/12/2453_red_start.png) no-repeat center top;
                    padding-top:45px;padding-right:10px;font-size:25px;color:#fff;font-weight:bold;line-height:30px;}
        .wb_04 ._tree_2 {width:122px;height:143px;position:absolute; top:269px; left:39%;z-index:1;background:url(https://static.willbes.net/public/images/promotion/2021/12/2453_green_start.png) no-repeat center top;
                    padding-top:45px;padding-right:10px;font-size:25px;color:#fff;font-weight:bold;line-height:30px;}
        .wb_04 ._tree_3 {width:122px;height:143px;position:absolute; top:350px; left:54%;z-index:1;background:url(https://static.willbes.net/public/images/promotion/2021/12/2453_green_start.png) no-repeat center top;
                padding-top:45px;padding-right:10px;font-size:25px;color:#fff;font-weight:bold;line-height:30px;}
        .wb_04 ._tree_4 {width:122px;height:143px;position:absolute; top:440px; left:37%;z-index:1;background:url(https://static.willbes.net/public/images/promotion/2021/12/2453_red_start.png) no-repeat center top;
                padding-top:45px;padding-right:10px;font-size:25px;color:#fff;font-weight:bold;line-height:30px;}
        .wb_04 ._tree_5 {width:122px;height:143px;position:absolute; top:500px; left:55%;z-index:1;background:url(https://static.willbes.net/public/images/promotion/2021/12/2453_red_start.png) no-repeat center top;
                    padding-top:45px;padding-right:10px;font-size:25px;color:#fff;font-weight:bold;line-height:30px;}
        .wb_04 ._tree_6 {width:122px;height:143px;position:absolute; top:575px; left:43.5%;z-index:1;background:url(https://static.willbes.net/public/images/promotion/2021/12/2453_green_start.png) no-repeat center top;
                    padding-top:45px;padding-right:10px;font-size:25px;color:#fff;font-weight:bold;line-height:30px;}
        .wb_04 ._tree_7 {width:122px;height:143px;position:absolute; top:600px; left:30%;z-index:1;background:url(https://static.willbes.net/public/images/promotion/2021/12/2453_red_start.png) no-repeat center top;
                    padding-top:45px;padding-right:10px;font-size:25px;color:#fff;font-weight:bold;line-height:30px;}     
        /* 이벤트 마감시 */
        .wb_04 .tree span.end {filter: brightness(0.4) blur(0.6px);}
        .wb_05 {background:#4f3030;}

        /*이용안내*/
        .evtInfo {padding:100px 0;background:#fff;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;color:#3a3a3a;}
        .guide_box dt{margin-bottom:10px; display:inline-block;font-weight:bold; font-size:17px; border-radius:30px;color:#3a3a3a;font-size:25px;}
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:none; margin-left:20px;color:#3a3a3a;font-size:16px;font-weight:bold;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px;}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
    
        <div class="sky" id="QuickMenu">
            <a href="#chris"><img src="https://static.willbes.net/public/images/promotion/2021/12/2453_sky01.png" alt="크리스마스 이벤트" ></a>
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/12/2453_sky02.png" alt="매일 선착순" ></a>
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2416" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2453_sky03.png" alt="14일 무료체험" ></a>
        </div>         

        <div class="evtCtnsBox wb_top" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2453_bf_top.jpg" alt="777"/>              
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2453_01.jpg" alt="크리스마스 이벤트"/>           
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2453_02.jpg" alt="참여방법"/>
                <a href="javascript:alert('Coming Soon!')" title="참여 클릭" style="position: absolute;left: 70.99%;top: 76.08%;width: 9.93%;height: 5.08%;z-index: 2;"></a> 
            </div>            
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up" id="chris">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2453_03.jpg" alt="소문내기"/>
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이벤트 이미지 다운로드" style="position: absolute;left: 26.99%;top: 88.08%;width: 47.93%;height: 5.08%;z-index: 2;"></a> 
            </div>
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y')){{--기존SNS예외처리시--}}
            @endif  
        </div>

        <form id="add_apply_form" name="add_apply_form">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="event_register_chk" value="N"/>
            <input type="hidden" name="comment_chk_yn" value="{{ (empty($arr_promotion_params["comment_chk_yn"]) === true ? '' : $arr_promotion_params["comment_chk_yn"]) }}"/>
            <input type="hidden" name="comment_ccd" value="713002">
            @if(empty($arr_base['add_apply_data']) === false)
                @foreach($arr_base['add_apply_data'] as $row)
                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                        <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                        @break;
                    @endif
                @endforeach
            @endif

            <div class="evtCtnsBox wb_04" data-aos="fade-up" id="evt_01">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/12/2453_04.jpg" alt="선착순 이벤트"/>
                    <a href="javascript:void(0);" title="이벤트 참여하기" onclick="fn_add_apply_submit(); return false;" style="position: absolute;left: 28.99%;top: 54.08%;width: 41.93%;height: 6.58%;z-index: 2;"></a>
                    <div class="tree">
                        @if(empty($arr_base['add_apply_data']) === false)
                            @foreach($arr_base['add_apply_data'] as $row)
                                <span class="_tree_{{ $loop->index }} {{ (time() >= strtotime($row['ApplyEndDatm']) || $row['PersonLimit'] <= $row['MemberCnt'] ? 'end' : '') }}">
                                    {{ $row['Name'] }}<br>{{ (time() >= strtotime($row['ApplyEndDatm']) || $row['PersonLimit'] <= $row['MemberCnt'] ? '-마감-' : $row['PersonLimit'].'명') }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </form>

        <div class="evtCtnsBox wb_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2453_05.jpg" alt="여기서 잠깐"/>           
        </div>

        <div class="evtCtnsBox evtInfo NGR" data-aos="fade-up">
            <div class="guide_box" >
                <h2 class="NSK-Black" >이용안내</h2>
                <dl>                   
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>1. 소문내기 진행시 한 ID당 총7번 참여횟수가 있습니다.</li>
                            <li>2. 이벤트기간동안 당첨회원님께는 12/27 개별문자안내공지해드립니다.</li>
                            <li>3. 중복당첨은 불가합니다.</li>
                            <li>4. 본 교재는 교수님들께서 직접구매하여 진행하고 있습니다.</li>
                        </ol>
                    </dd>
                    <dt>신청방법</dt>
                    <dd>
                        <ol>
                            <li>- 로그인 이후 소문내기 필수 참여</li>
                            <li>- 소문내기 참여후 매일 19시 윈터이벤트 참여하기 버튼 클릭!!</li>
                            <li>- 한ID 당 매일 1회  , 총 7번 신청하기 가능(이벤트 당첨시 중복참여불가)</li>
                            <li>- 선착순 이벤트로 진행됩니다.</li>
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
        $(document).ready(function(){AOS.init();});

        // 무료 당첨
        function fn_add_apply_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';
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
                ['신청 되었습니다.','당첨을 축하합니다.'],
                //['이벤트 신청후 이용 가능합니다.','봉투모의고사 신청후 이용 가능합니다.'],
                ['마감되었습니다.','내일 19시에 다시 도전해 주세요.']
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