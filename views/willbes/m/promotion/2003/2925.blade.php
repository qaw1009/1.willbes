@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox wrap" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2925m_top.jpg" alt="10일 체험팩" >    
    </div>  

    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_normal_partial')
    @endif

    <div class="evtCtnsBox wrap" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2925m_bt.jpg" alt="수강평 남기기"/>
        <a href="https://pass.willbes.net/m/support/qna/index" title="남기기" style="position: absolute;left: 21.97%;top: 74.96%;width: 56.25%;height: 9.84%;z-index: 2;"></a>
    </div>

</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
      $(document).ready(function() {
        AOS.init();
      });

    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop