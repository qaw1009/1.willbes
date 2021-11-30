@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            background:#fff;
            position:relative;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .sky {position:fixed; width:120px; top:200px; right:25px; z-index:10;}
        .sky a {display:block;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/11/2416_top_bg.jpg) center top no-repeat;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2416_01_bg.jpg) center top no-repeat;}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2416_02_bg.jpg) center top no-repeat;}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2416_03_bg.jpg) center top no-repeat;}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2416_04_bg.jpg) center top no-repeat;}

        /*탭(이미지)*/
        .tabs{width:100%; text-align:center; padding-bottom:20px;}
        .tabs ul {width:1120px;margin:0 auto;padding-top:60px;}		
        .tabs li {display:inline; float:left;padding-right:20px;}
        .tabs li:first-child {padding-left:50px;}
        .tabs li:last-child {padding-right:35px;}      
        .tabs ul:after {content:""; display:block; clear:both}

        .slide_con_bg {background:url(https://static.willbes.net/public/images/promotion/2021/11/2416_background.png) center top no-repeat;}
        .slide_con {position:relative; width:421px; margin:0 auto;}	
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:61px; height:61px; z-index:100}
        .slide_con p a {cursor:pointer;  width:61px; height:61px;}
        .slide_con p.leftBtn {left:-285px;}
        .slide_con p.rightBtn {right:-285px;}       

        .evt08 {padding-bottom:100px; width:1120px; margin:0 auto}
        .evt08 .sTitle {margin:50px 0 30px; font-size:25px; text-align:left; color:#464646}
        .evt08 span {vertical-align:top;}

    </style>

    <div class="evtContent NSK" id="evtContainer">   

        <div class="sky" id="QuickMenu">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_sky01.png" alt="14일 패스"/></a>
            <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_sky02.png" alt="스터디 플래너"/></a>
            <a href="#evt_03"><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_sky03.png" alt="배경화면"/></a>        
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_top.gif" title="겨울나기" />       
        </div>       

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_01.jpg" title="why" />
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_02.jpg" title="fast" />
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_03.jpg" title="이론/기출 학습꿀팁" />
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_04.jpg" title="검정제 학습꿀팁" />
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171830" target="_blank" title="한능검 추천강좌" style="position: absolute;left: 18.55%;top: 73.19%;width: 25.3%;height: 6.51%;z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/184584" target="_blank" title="지텔프 추천강좌" style="position: absolute;left: 56.55%;top: 73.19%;width: 25.3%;height: 6.51%;z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt05" id="evt_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_05.jpg" title="14일 패스 무료" />
                <a href="javascript:void(0)" onclick="fn_add_apply_submit({{ $arr_base['add_apply_data'][0]['EaaIdx'] or '' }}); return false;" title="14일 무료체험" style="position: absolute;left: 8.55%;top: 67.99%;width: 29.3%;height: 18.51%;z-index: 2;"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2390" target="_blank" title="신광은 경찰 패스" style="position: absolute;left: 16.55%;top: 90.19%;width: 67.3%;height: 5.91%;z-index: 2;"></a>
            </div>   
        </div>

        <div class="evtCtnsBox evt06" id="evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06.jpg" title="플래너 다운받기" />
            <div class="tabs">
                <div id="tab01s" class="active">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_nail01.png" title="먼슬리1" />                   
                </div>                                        
                <div id="tab02s">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_nail02.png" title="먼슬리2" />           
                </div>
                <div id="tab03s">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_nail03.png" title="위클리" />            
                </div>
                <div id="tab04s">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_nail04.png" title="원데이 가로형" />       
                </div>
                <div id="tab05s">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_nail05.png" title="원데이 세로형" />
                </div>
                <ul>
                    <li>
                        <a href="#tab01s">                            
                            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_thumb01.png" title="먼슬리1" />
                        </a>
                    </li>
                    <li>
                        <a href="#tab02s">                           
                            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_thumb02.png" title="먼슬리2" />
                        </a>
                    </li>
                    <li>
                        <a href="#tab03s">                           
                            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_thumb03.png" title="위클리" />
                        </a>
                    </li>
                    <li>
                        <a href="#tab04s">                           
                            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_thumb04.png" title="원데이 가로형" />
                        </a>
                    </li>
                    <li>
                        <a href="#tab05s">                           
                            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_thumb05.png" title="원데이 세로형" />
                        </a>
                    </li>
                </ul>                
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_06_btn.jpg" title="플래너 6종 다운로드" />
                <a href="{{ (empty($file_yn) === false && $file_yn[0] == 'Y' ? front_url($file_link[0]) : $file_link[0]) }}" title="플래너 다운로드" style="position: absolute;left: 29.55%;top: 18.99%;width: 41.3%;height: 31.51%;z-index: 2;"></a>
            </div>    
        </div>        

        <div class="evtCtnsBox evt07" id="evt_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07.jpg" title="배경화면 다운받기" />
                <div class="slide_con_bg">     
                    <div class="slide_con">
                        <ul id="slidesImg3">
                            @for($i=1;$i<=12;$i++)
                                <a href="{{ (sess_data('is_login') === false ? 'javascript:void(0);' : (empty($file_yn) === false && $file_yn[$i] == 'Y' ? front_url($file_link[$i]) : $file_link[$i])) }}"
                                   onclick="{{ (sess_data('is_login') === false ? 'javascript:alert(\'로그인 후 이용해주세요.\'); return false;' : '') }}" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;" target="_blank">
                                    <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_{{(strlen($i) > 1 ? '' : '0').$i}}.png" alt="" /></li>
                                </a>
                            @endfor
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_left.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/11/2416_right.png"></a></p>
                    </div>
                </div>
            </div>    
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_btn.jpg" title="온라인 회원만 가능" />
            </div>  
        </div>

        <div class="evtCtnsBox evt08" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_08.jpg" title="12월 추천강좌 바로가기" />
            <div class="sTitle NSK-Black">2022대비 온라인 <span>심화기출</span> 신청</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
            <div class="sTitle NSK-Black">2022대비 온라인 <span>기본이론</span> 신청</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
        </div>   
    </div>
    <!-- End Container -->

    <form id="add_apply_form" name="add_apply_form">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
        <input type="hidden" name="register_type" value="promotion"/>
        <input type="hidden" name="event_register_chk" value="N"/>
        <input type="hidden" name="add_apply_chk[]" value="" />
    </form>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
        AOS.init();
        } );

        /*탭(이미지버전)*/
        $(document).ready(function() {
            $('.tabs ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                //$active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });

        /*슬라이드*/
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1120,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

        {{-- 무료 강좌지급 --}}
        var $add_apply_form = $('#add_apply_form');
        function fn_add_apply_submit(eaa_idx) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                var _url = '{!! front_url('/event/addApplyStore') !!}';
            if (!eaa_idx) {
                alert('이벤트 기간이 아닙니다.');
                return;
            }
            $add_apply_form.find('input[name="add_apply_chk[]"]').val(eaa_idx);
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
                ['처리 되었습니다.','장바구니에 담겼습니다.'],
                ['신청 되었습니다.','신청 되었습니다. 내강의실에서 확인해 주세요.'],
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
 