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
            background:#fff url(https://static.willbes.net/public/images/promotion/2020/09/1863_top_bg.jpg) no-repeat center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto;}

        /************************************************************/

        .evt00 {background:#0a0a0a}

        .wb_top {position:relative; height:1177px}
        .wb_top li {position:absolute; left:50%; z-index:1}
        .wb_top li:nth-child(1) {top:62px; margin-left:-180px; animation:slidein1 0.5s ease-in; -webkit-animation:slidein1 0.5s ease-in;}
        .wb_top li:nth-child(2) {top:136px; margin-left:-180px; animation:slidein2 1.0s ease-in; -webkit-animation:slidein2 1.0s ease-in;}
        .wb_top li:nth-child(3) {top:192px; margin-left:-260px; animation:slidein3 1.5s ease-in; -webkit-animation:slidein3 1.5s ease-in;}
        .wb_top li:nth-child(4) {top:260px; margin-left:-150px}
        .wb_top li:nth-child(5) {top:605px; margin-left:-150px; animation:slidein4 2.0s ease-in; -webkit-animation:slidein4 2.0s ease-in;}
        .wb_top li:nth-child(6) {top:682px; margin-left:-290px; animation:slidein5 2.5s ease-in; -webkit-animation:slidein5 2.5s ease-in;}
        .wb_top li:nth-child(7) {top:874px; margin-left:-270px; height:303px}
        .wb_top li:nth-child(7) iframe {width:540px; height:303px}

        @@keyframes slidein1 {from {top:92px; opacity: 0;}to {top:62px; opacity: 1}}
		@@keyframes slidein2 {from {top:166px;  opacity: 0;}to {top:136px; opacity: 1}}
        @@keyframes slidein3 {from {top:222px; opacity: 0;}to {top:192px; opacity: 1}}	
        @@keyframes slidein4 {from {top:635px; opacity: 0;}to {top:605px; opacity: 1}}
		@@keyframes slidein5 {from {top:712px;opacity: 0;}to {top:682px; opacity: 1}}

        .wb_00 {width:1120px;}

        .wb_01 {width:1120px; position:relative;}
        .wb_01 .rulletBox {position:absolute; top:80px; width:810px; left:50%; margin-left:-410px; z-index:5; /*border:1px solid #000*/}
        .wb_01 .rulletBox .btn-roulette {position:absolute; top:280px; width:255px; 
            height:255px; left:50%; padding:0; margin:0; margin-left:-127px; background:none; z-index:6}
        .wb_01 .rulletBox a {position:absolute; top:650px; left:650px; width:80px; height:80px; line-height:60px; color:#000; background:#fff; 
            border-radius:40px;
            border:10px solid #000; z-index:6}
        .wb_01 .rulletBox a:hover {background:#5a14d6; color:#fff}

        .wb_02 a {display:block; width:600px; margin:50px auto; background:#040b28; color:#fff; font-size:30px; border-radius:10px; padding:20px 0}
        .wb_02 a:hover {background:#ff3b9c;}

        .wb_03 {background:#f6f6f6}

        .giftPopupWrap {
            position:absolute; 
            background: rgba(0, 0, 0, 0.6);
            filter: alpha(opacity=60);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;            
            width: 100%;
            height: 100%;  
            z-index: 105;        
        }
        .giftPop {width:786px; margin:100px auto 0; position:relative}
        .giftPop span {display:block; position:absolute; top:343px; width:100%; text-align:center; z-index:10}

        .tabs li {display:inline; float:left; width:33.333333%}
        .tabs li a {display:block; text-align:center; height:140px; line-height:140px; background:#040b28; margin-right:1px}
        .tabs li a.active {background:#f93b99;}
        .tabs:after {content:""; display:block; clear:both}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}" readonly="readonly"/>
        <input type="hidden" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}/>
        <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" maxlength="11" readonly="readonly">
        <input type="hidden" name="register_type" value="promotion" readonly="readonly"/>

        @foreach($arr_base['register_list'] as $key => $val)
            @if(empty($val['RegisterExpireStatus']) === false && $val['RegisterExpireStatus'] == 'Y')
                <input type="hidden" name="register_chk[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" readonly="readonly"/>
            @endif
        @endforeach
    </form>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox wb_top">
            <ul>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_txt01.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_txt02.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_txt03.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_txt04.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_txt05.png" alt=""/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_txt06.png" alt=""/></li>
                <li><iframe src="https://www.youtube.com/embed/GcVDeVDxOB4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
            <ul>
        </div>        

        <div class="evtCtnsBox wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1863_top.png" alt="룰렛 이벤트"/>            
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <div class="evtCtnsBox wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1863_02.jpg" alt="룰렛 이벤트"/>
            <ul class="tabs">
                <li><a href="#tab01"><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_tab01.png" alt="pass를 잡아라"/></a></li>
                <li><a href="#tab02"><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_tab02.png" alt="문제풀이 1단계 무료특강"/></a></li>
                <li><a href="#tab03"><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_tab03.png" alt="형법 무료특강"/></a></li>
            </ul>
        </div>

        <div id="tab01" class="pb100">
            <div class="evtCtnsBox wb_00">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1863_04.jpg" alt="룰렛 이벤트"/>
            </div>

            <div class="evtCtnsBox wb_01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1863_05.jpg" alt="룰렛 이벤트"/>
                <div class="rulletBox">
                    <canvas id="box_roulette" class="tutCanvas" width="810" height="810">Canvas not supported</canvas>
                    <button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2020/09/1863_rull_start.png" alt="start" /></button>
                    <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1863_06.jpg" alt="룰렛 이벤트"/>
            </div>        

            <div class="giftPopupWrap" id="giftPopupWrap" style="display:none;">
                <div class="giftPop">
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/1863_rull_popup.png" alt="당첨팝업" usemap="#Map1698pop" border="0"/>
                    <map name="Map1698pop" id="Map1698pop">
                        <area shape="rect" coords="637,85,715,163" href="#none" onClick="closeWin('giftPopupWrap')" alt="닫기" />
                    </map>
                    {{-- 상품이미지 01 ~ 08 --}}
                    <span id="gift_box_id"></span>
                </div>
            </div>
        </div>

        <div id="tab02" class="pb100">
            <div class="evtCtnsBox wb_02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1863_07.jpg" alt="룰렛 이벤트"/>
                <a href="javascript:;" class="NSK-Black" onclick="fn_submit();">문풀1단계 패키지 모두 받기 ></a>
            </div>
        </div>

        <div id="tab03">
            <div class="evtCtnsBox wb_00">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1863_08.jpg" alt="룰렛 이벤트" />
            </div>        

            <div class="evtCtnsBox wb_03">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1863_09.jpg" alt="룰렛 이벤트" usemap="#Map1863A" border="0" />
                <map name="Map1863A">
                    <area shape="rect" coords="141,159,255,201" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167023" target="_blank" alt="죄수론">
                    <area shape="rect" coords="380,158,496,203" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167489" target="_blank" alt="구성요건 착오">
                    <area shape="rect" coords="625,159,744,201" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168022" target="_blank" alt="공범과신분">
                    <area shape="rect" coords="866,160,980,199" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168198" target="_blank" alt="배임죄">
                    <area shape="rect" coords="142,341,255,383" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/169145" target="_blank" alt="횡령죄">
                    <area shape="rect" coords="384,342,493,381" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/170566" target="_blank" alt="원자행">
                    <area shape="rect" coords="632,343,749,384" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/172060" target="_blank" alt="채용및승진">
                </map>
            </div>  
        </div> 
    </div>
    <!-- End Container -->
    <script>
        $regi_form = $('#regi_form');

        {{--무료 강좌발급--}}
        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var _url = '{!! front_url('/event/registerStore') !!}?event_code={{$data["ElIdx"]}}';

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert('강좌가 지급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        $(document).ready(function(){
            $('.tabs').each(function(){
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
    </script>

    @include('willbes.pc.promotion.roulette_script')
    
@stop