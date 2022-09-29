@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox a {border:1px solid #000;}

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2789m_top.jpg"  alt="기출해서 무료특강" />        
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2789m_01.jpg" alt="경찰총평 이벤트1"/>      
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2789m_02.jpg" alt="경찰총평 이벤트2"/>   
        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51395?subject_idx=2128&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="박우찬 경찰학" target="_blank" style="position: absolute; left: 32.78%; top: 33.49%; width: 15.14%; height: 2.78%; z-index: 2;"></a>
        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51259?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="이국령 헌법" target="_blank" style="position: absolute; left: 66.11%; top: 33.49%; width: 15.14%; height: 2.78%; z-index: 2;"></a>

        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51394?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="임종희 형사법" target="_blank" style="position: absolute; left: 32.78%; top: 51.36%; width: 15.14%; height: 2.78%; z-index: 2;"></a>
        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51392?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="문형석 형법" target="_blank" style="position: absolute; left: 66.11%; top: 51.36%; width: 15.14%; height: 2.78%; z-index: 2;"></a>

        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51389?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="김한기 형소법" target="_blank" style="position: absolute; left: 32.78%; top: 69.29%; width: 15.14%; height: 2.78%; z-index: 2;"></a>
        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51398?subject_idx=2178&subject_name=%EB%B2%94%EC%A3%84%ED%95%99%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="김한기 범죄학" target="_blank" style="position: absolute; left: 66.11%; top: 69.29%; width: 15.14%; height: 2.78%; z-index: 2;"></a>

        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51397?subject_idx=2012&subject_name=G-TELP&tab=qna" title="제니 지텔프" target="_blank" style="position: absolute; left: 32.78%; top: 86.99%; width: 15.14%; height: 2.78%; z-index: 2;"></a>
        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51126?subject_idx=2088&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EB%8A%A5%EB%A0%A5%EA%B2%80%EC%A0%95%EC%8B%9C%ED%97%98&tab=qna" title="오태진 한능검" target="_blank" style="position: absolute; left: 66.11%; top: 86.99%; width: 15.14%; height: 2.78%; z-index: 2;"></a>    
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2789m_03.jpg" alt="이벤트 유의사항"/>
        <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" title="윌비스경찰 채널" target="_blank" style="position: absolute; left: 22.5%; top: 73.75%; width: 55%; height: 9.68%; z-index: 2;"></a>      
    </div>

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2789m_04.jpg" alt="이벤트 유의사항"/>       
    </div>

    {{--기본댓글--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_normal_partial')
    @endif
    
</div>
<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
    AOS.init();
    });
</script>

@stop