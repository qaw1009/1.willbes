@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

    .evtTop {position:relative}

    .evtInfo {padding:80px 20px; background:#f4f4f4; color:#000; font-size:16px;}     

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
      }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }

</style>

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}

    <input type="hidden" id="chk_price" name="chk_price" value="0"/>
</form>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox dday NSK-Thin">
        <strong class="NSK-Black">사전접수 이벤트 마감까지 <span id="ddayCountText"></span> </strong>
        <a href="#evt03">사전접수 이벤트중 ></a>
    </div>

    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div> 

    <div class="evtCtnsBox evtTop" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2335_mtop.jpg" alt="2022 합격전략반" >
    </div> 

    <div class="evtCtnsBox evt01" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2335_m01.jpg" alt="수강과목" >
    </div> 

    <div class="evtCtnsBox evt02" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2335_m02.jpg" alt="스케줄" >   
        <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank" title="강의시간표 확인하기" style="position: absolute; left: 21.39%; top: 83.96%; width: 56.25%; height: 11.73%; z-index: 2;"></a>     
    </div> 

    <div class="evtCtnsBox evt03" data-aos="fade-left" id="evt03">   
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2335_m03.jpg" alt="스페셜패키지" > 
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
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

    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}','txt');
    });

    function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
    {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        var $regi_form = $('#' + ele_id);
        var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
        var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
        var params;

        if ($is_chk.length > 0) {
            if ($is_chk.is(':checked') === false) {
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
        }

        if ($prod_code.length < 1) {
            alert('강좌를 선택해 주세요.');
            return;
        }

        {{-- 장바구니 저장 기본 파라미터 --}}
            params = [
            { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
            { 'name' : '_method', 'value' : 'POST' },
            { 'name' : 'cart_type', 'value' : cart_type },
            { 'name' : 'learn_pattern', 'value' : learn_pattern },
            { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
        ];

        {{-- 선택된 상품코드 파라미터 --}}
        $prod_code.each(function() {
            params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
        });

        {{-- 장바구니 저장 URL로 전송 --}}
        formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
    }

    /* 수강신청*/

    {{-- 수강신청 이동 --}}
    function goLecture(prod_code) {
        if ($('#is_chk').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }
        location.href = '{{ front_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + prod_code;
    }
    function goLecture2(code){
        if ($('#is_chk').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }
            var url = '{{ site_url('/package/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop