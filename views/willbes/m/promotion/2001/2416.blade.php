@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .slide_con {padding:0 30px 30px}
    .slide_con img {width:290px;margin:0 auto;}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {
        width: auto;
        bottom: -30px;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 3px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #d5c15e;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

    /*탭(이미지)*/
    .tabs{width:100%; text-align:center; padding-bottom:20px;}
    .tabs ul {width:1120px;margin:0 auto;padding-top:60px;}		
    .tabs li {display:inline; float:left;padding-right:20px;}  
    .tabs ul:after {content:""; display:block; clear:both}

    .evt_m08 .sTitle {margin:50px 0 30px; font-size:20px; text-align:left; color:#464646}
    .evt_m08 span {vertical-align:top;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  { 

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
       
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">    

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_mtop.gif" alt="" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m01.jpg" alt="" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m02.jpg" alt="" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m03.jpg" alt="" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m04.jpg" alt="" >
            <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171830" target="_blank" title="신광은 경찰 패스" style="position: absolute;left: 25.44%;top: 48.95%;width: 50.78%;height: 4.71%;z-index: 2;"></a>
            <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/184584" target="_blank" title="신광은 경찰 패스" style="position: absolute;left: 25.44%;top: 89.45%;width: 50.78%;height: 4.71%;z-index: 2;"></a>
        </div>     
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m05.jpg" alt="" >
            <a href="javascript:void(0)" onclick="fn_add_apply_submit({{ $arr_base['add_apply_data'][0]['EaaIdx'] or '' }}); return false;" title="14일 무료체험" style="position: absolute;left: 2.44%;top: 67.95%;width: 34.78%;height: 19.71%;z-index: 2;"></a>
            <a href="https://police.willbes.net/m/promotion/index/cate/3001/code/2390" target="_blank" title="신광은 경찰 패스" style="position: absolute;left: 11.44%;top: 91.65%;width: 80.78%;height: 6.71%;z-index: 2;"></a>
        </div>    
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m06.jpg" alt="" >
        <div class="wrap">    
            <div class="slide_con">
                <ul id="slidesImg2">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m06_nail01.png" alt="" />                          
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m06_nail02.png" alt="" />  
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m06_nail03.png" alt="" />  
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m06_nail04.png" alt="" />  
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m06_nail05.png" alt="" />
                    </li>                  
                </ul>
            </div>
        </div>       
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m06_btn.jpg" title="플래너 6종 다운로드" />
            <a href="{{ (empty($file_yn) === false && $file_yn[0] == 'Y' ? front_url($file_link[0]) : $file_link[0]) }}" title="플래너 다운로드" style="position: absolute;left: 28.55%;top: 16.99%;width: 43.3%;height: 39.51%;z-index: 2;"></a>
        </div>     
    </div>

    <div class="evtCtnsBox" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07.jpg" alt="" >
        <div class="wrap">    
            <div class="slide_con">
                <ul id="slidesImg3">
                    @for($i=1;$i<=12;$i++)
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_{{(strlen($i) > 1 ? '' : '0').$i}}.png" alt="" />
                            <a href="{{ (sess_data('is_login') === false ? 'javascript:void(0);' : (empty($file_yn) === false && $file_yn[$i] == 'Y' ? front_url($file_link[$i]) : $file_link[$i])) }}"
                               onclick="{{ (sess_data('is_login') === false ? 'javascript:alert(\'로그인 후 이용해주세요.\'); return false;' : '') }}" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                        </li>
                    @endfor
                    {{--<li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_01.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[1] == 'Y'){{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_02.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[2] == 'Y'){{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_03.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[3] == 'Y'){{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_04.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[4] == 'Y'){{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_05.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[5] == 'Y'){{ front_url($file_link[5]) }} @else {{ $file_link[5] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_06.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[6] == 'Y'){{ front_url($file_link[6]) }} @else {{ $file_link[6] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_07.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[7] == 'Y'){{ front_url($file_link[7]) }} @else {{ $file_link[7] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_08.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[8] == 'Y'){{ front_url($file_link[8]) }} @else {{ $file_link[8] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_09.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[9] == 'Y'){{ front_url($file_link[9]) }} @else {{ $file_link[9] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_10.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[10] == 'Y'){{ front_url($file_link[10]) }} @else {{ $file_link[10] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_11.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[11] == 'Y'){{ front_url($file_link[11]) }} @else {{ $file_link[11] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_07_12.png" alt="" />
                        <a href="@if(empty($file_yn) === false && $file_yn[12] == 'Y'){{ front_url($file_link[12]) }} @else {{ $file_link[12] }} @endif" title="배경화면 다운로드" style="position: absolute;left: 0;top: 90.55%;width: 100%;height: 11.21%;z-index: 2;"></a>
                    </li>--}}
                </ul>
            </div>
        </div>    
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m07_btn.jpg" title="배경화면 다운로드" />            
        </div>
    </div>

    <div class="evtCtnsBox evt_m08" data-aos="fade-top">
        <img src="https://static.willbes.net/public/images/promotion/2021/11/2416_m08.jpg" alt="" >
        <div class="sTitle NSK-Black">2022대비 온라인 <span>심화기출</span> 신청</div>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
        <div class="sTitle NSK-Black">2022대비 온라인 <span>기본이론</span> 신청</div>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif        
    </div>   

</div>
<form id="add_apply_form" name="add_apply_form">
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
    <input type="hidden" name="register_type" value="promotion"/>
    <input type="hidden" name="event_register_chk" value="N"/>
    <input type="hidden" name="add_apply_chk[]" value="" />
</form>
<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
</script>

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg2").bxSlider({
            auto: true,
            speed: 500,
            pause: 4000,
            mode:'horizontal',
            autoControls: false,
            controls:false,
            pager:true,
        });
    });

    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg3").bxSlider({
            auto: true,
            speed: 500,
            pause: 4000,
            mode:'horizontal',
            autoControls: false,
            controls:false,
            pager:true,
        });
    });

    /*탭(이미지버전)*/
    $(document).ready(function(){
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