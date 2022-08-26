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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2755_top_bg.jpg) no-repeat center top; height:920px}
        .wb_top span {position: absolute; top:280px; left:50%; margin-left:-160px}
        /*탭*/
        .wb_tab {background:#181818; height:130px}
        .tabs {width:1130px; margin:0 auto; display:flex}         
        .tabs li {border-right:1px solid #6a6a6a;}
        .tabs li:last-child {border-right:0;}
        .tabs li a {display:block;}
        .tabs li a img.off {display:block}
        .tabs li a img.on {display:none}
        .tabs li a:hover img.off,
        .tabs li a.active img.off {display:none}
        .tabs li a:hover img.on,
        .tabs li a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}	 

        .evt01 {background:#f1f1f1;padding-bottom:100px;}

        .evt02 {background:#2f456d;}
        
        .evt03 {background:#f1f1f1 url(https://static.willbes.net/public/images/promotion/2022/08/2755_03_bg.jpg) no-repeat center top;padding-bottom:100px;}
        .evt03s {background:#ECDFD9;}
        .evt03 .member {width:600px; margin:60px auto;}
        .evt03 .member a {background:#c00d0d; display:block; font-size:36px; color:#fff; padding:0 30px; background:#000; border-radius:60px; height:80px; line-height:80px; box-shadow:10px rgba(0,0,0,.5);}
        .evt03 .member a:hover {background:#5b18a7}


    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK">

        <div class="evtCtnsBox wb_top" >            
            <span data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/08/2755_top.png" title="합격을 도와줘" /></span>
        </div>

        <div class="evtCtnsBox wb_tab" data-aos="fade-up">
            <ul class="tabs">
                <li>
                    <a href="#tab01">
                        <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_tab01.jpg" title="소원을말해봐" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_tab01_on.jpg" title="소원을말해봐" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_tab02.jpg" title="수강을도와줘" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_tab02_on.jpg" title="수강을도와줘" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab03">
                        <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_tab03.jpg" title="기간연장" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_tab03_on.jpg" title="기간연장" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab04">
                        <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_tab04.jpg" title="수강할인" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_tab04_on.jpg" title="수강할인" class="on"/> 
                    </a>
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox evt01" id="tab01" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_01.jpg" title="소원을말해봐"> 
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif 
        </div>

        <div class="evtCtnsBox evt02" id="tab02" data-aos="fade-right">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_02.jpg" title="수강을도와줘">
                <a onclick="giveCheck('{{$arr_promotion_params['give_idx1'] or ''}}');" title="단과1만원할인"  style="position: absolute;left: 7.89%;top: 69.83%;width: 22.36%;height: 5.39%;z-index: 2;"></a>
                <a onclick="giveCheck('{{$arr_promotion_params['give_idx2'] or ''}}');" title="패키지2만원할인"  style="position: absolute;left: 38.89%;top: 69.83%;width: 22.36%;height: 5.39%;z-index: 2;"></a>
                <a onclick="giveCheck('{{$arr_promotion_params['give_idx3'] or ''}}');" title="패스3만원할인"  target="_blank" style="position: absolute;left: 69.89%;top: 69.83%;width: 22.36%;height: 5.39%;z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt03" id="tab03" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_03.jpg" title="기간연장">
                <div class="evt03s">
                    <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_03s.gif" title="단과/패키지/패스">
                </div>
                <div class="member NSK-Black">
                    <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" target="_blank">
                        지금 바로 회원 가입하기 >
                    </a>
                </div>
            </div>      
        </div>

        <div class="evtCtnsBox evt04" id="tab04" data-aos="fade-right">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2755_04.jpg" title="수강할인">
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2354" style="position: absolute; left: 12.5%; top: 41.42%; width: 35.27%; height: 3.72%; z-index: 2;" target="_blank" title="윌비스티패스"></a>
                <a href="https://pass.willbes.net/support/notice/show?board_idx=429102" style="position: absolute; left: 52.77%; top: 41.42%; width: 35.27%; height: 3.72%; z-index: 2;" target="_blank" title="9월신규강좌"></a>

                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2502" style="position: absolute; left: 10.27%; top: 69.44%; width: 18.75%; height: 2.84%; z-index: 2;" target="_blank" title="9급패스" ></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3022/code/1983" style="position: absolute; left: 40.71%; top: 69.44%; width: 18.75%; height: 2.84%; z-index: 2;" target="_blank" title="세무직패스"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2503" style="position: absolute; left: 70.98%; top: 69.44%; width: 18.75%; height: 2.84%; z-index: 2;" target="_blank" title="소방패스"></a>

                <a href="https://pass.willbes.net/promotion/index/cate/3024/code/2721" style="position: absolute; left: 10.27%; top: 89.25%; width: 18.75%; height: 2.84%; z-index: 2;" target="_blank" title="군무원패스"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2115" style="position: absolute; left: 40.71%; top: 89.25%; width: 18.75%; height: 2.84%; z-index: 2;" target="_blank" title="축산직패스"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2531" style="position: absolute; left: 70.98%; top: 89.25%; width: 18.75%; height: 2.84%; z-index: 2;" target="_blank" title="조경직패스"></a>
            </div> 
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">

        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck(give_idx) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)

                @if(strtotime(date('YmdHi')) >= strtotime($arr_promotion_params['edate']))
                    alert('쿠폰발급 기간이 아닙니다.');
                    return;
                @endif

                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&give_idx=' + give_idx;
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @endif
        }

        /*tab*/
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
        ) 
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>
@stop