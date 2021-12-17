@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox > a {border:1px solid #000}*/

    .evtCtnsBox .sTitle {margin:50px 0 30px; font-size:20px; text-align:left; color:#464646}
    .evtCtnsBox .sTitle span {vertical-align:top; color:#fc5777;  box-shadow:inset 0 -20px 0 rgba(252,87,119,.1)}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >       
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2469m_01.jpg" alt="기초입문서 무료배포" >
        <a href="#evt01" title="문제풀이" style="position: absolute; left: 28.33%; top: 66.16%; width: 43.19%; height: 6.7%; z-index: 2;"></a>
        <a href="#evt02" title="기본이론" style="position: absolute; left: 28.33%; top: 77.18%; width: 43.19%; height: 6.7%; z-index: 2;"></a> 
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up" id="evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2469m_02.jpg" alt="강력추천" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up" id="evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2469m_03.jpg"  alt="출제 범위,경향분석" />   
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/12/2469m_04.jpg" alt="선착순 200명 증정" >
        <a href="https://police.willbes.net/m/lecture/show/cate/3001/pattern/only/prod-code/171830" title="한능검" target="_blank" style="position: absolute; left: 8.19%; top: 30.32%; width: 29.58%; height: 3.71%; z-index: 2;"></a>
        <a href="https://police.willbes.net/m/lecture/show/cate/3001/pattern/only/prod-code/184584" title="지텔프" style="position: absolute; left: 8.19%; top: 45.88%; width: 29.58%; height: 3.71%; z-index: 2;"></a>
        <a href="https://police.willbes.net/promotion/index/cate/3001/code/2332" title="가산점" style="position: absolute; left: 8.19%; top: 61.87%; width: 29.58%; height: 3.71%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox evt_m08" data-aos="fade-top">
        <div class="sTitle NSK-Black">2022대비 온라인 <span>문제풀이 1단계 </span> 신청</div>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
        <div class="sTitle NSK-Black">2022대비 온라인 <span>기본이론</span> 신청</div>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif        
    </div> 
</div>

<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $( document ).ready( function() {
    AOS.init();
    } );
</script>

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