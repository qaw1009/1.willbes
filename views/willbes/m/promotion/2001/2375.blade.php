@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evtCtnsBox a:hover {box-shadow:0 5px 20px rgba(0,0,0,.5); border-radius:6px}

    .evtInfo {padding:40px 20px; background:#333; color:#fff; font-size:16px;}
    .guide_box {text-align:left; line-height:1.4}
    .guide_box li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px; color:#ccc}
    .guide_box h2 {font-size:24px; margin-bottom:30px}
    .guide_box dt {margin:20px 0 10px; font-weight:600}
    .guide_box dd {margin-bottom:5px}
    .guide_box .only {color:#E80000;vertical-align:top;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px) {

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {

    }
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }
</style>

<div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>
    <div class="evtCtnsBox evtTop" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/10/2375m_top.gif" alt="리얼후기" >
    </div>
    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/10/2375m_01.jpg" alt="교재 득템" >
    </div>
    
    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/10/2375m_02.jpg" alt="인기교재 무료 증정" >
    </div>
    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/10/2375m_03.jpg" alt="수강후기 작성 방법" >
        <a href="https://police.willbes.net/promotion/index/cate/3001/code/2368" target="_blank" title="신규가입" style="position: absolute; left: 60.83%; top: 12.03%; width: 23.89%; height: 3.01%; z-index: 2;"></a>
        <a href="https://www.willbes.net/classroom/on/list/ongoing" target="_blank" title="수강후기 작성하기" style="position: absolute; left: 11.39%; top: 86.55%; width: 77.08%; height: 5.47%; z-index: 2;"></a>
    </div>
    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/10/2375m_04.jpg" alt="감사드립니다." >
    </div>
    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/10/2375m_05.jpg" alt="이벤트1" >
        <a href="#none" title="패스 받기" style="position: absolute; left: 34.44%; top: 58.06%; width: 30.83%; height: 5.37%; z-index: 2;"></a>
    </div>
    <div class="evtCtnsBox evt06" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/10/2375m_06.jpg" alt="이벤트2" >
    </div>
    <div class="evtCtnsBox evt07" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/10/2375m_07.jpg" alt="이벤트3" >
    </div>
    <div class="evtCtnsBox evt08" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2021/10/2375m_08.jpg" alt="" >
        <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="다운로드" style="position: absolute; left: 14.31%; top: 40.4%; width: 74.58%; height: 9.06%; z-index: 2;"></a>
        <a href="http://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute; left: 29.86%; top: 76.63%; width: 9.31%; height: 19.93%; z-index: 2;"></a>
        <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute; left: 45%; top: 76.63%; width: 9.31%; height: 19.93%; z-index: 2;"></a>
        <a href="https://cafe.naver.com/kts9719" target="_blank" title="닥공사" style="position: absolute; left: 60.42%; top: 76.63%; width: 9.31%; height: 19.93%; z-index: 2;"></a>
    </div>

    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial')
    @endif

    <div class="evtCtnsBox evtInfo" id="infoText" data-aos="fade-up">
        <div class="guide_box" >
            <h2 class="NSK-Black" >윌비스 신광은경찰 수강후기 이벤트 이용안내</h2>
            <dl>
                <dt>14일 PASS 이벤트 유의사항</dt>
                <dd>
                    <ol>
                        <li>본 이벤트는 ID당 1회만 참여 가능합니다.
                        <li>이벤트 참여일로부터 14일간 신광은경찰팀 전 강좌를 자유롭게 수강 가능합니다.
                        <li>해당 14일 PASS는 [내강의실 > 수강중인 강의 > 패키지강좌]에서 확인하시기 바랍니다.
                        <li>이벤트 혜택으로 지급된 PASS는 연장 및 환불이 불가능합니다.</li>
                    </ol>
                </dd>
                <dt>11월 신규강의 이벤트 유의사항</dt>
                <dd>
                    <ol>
                        <li>본 이벤트는 중복 참여는 가능하나, 당첨은 ID당 최대 1회 가능합니다.</li>
                        <li>본 이벤트와 관련이 없는 게시물의 경우 관리자에 의해 삭제될 수 있습니다.</li>
                        <li>당첨자는 [내강의실]에 지급된 강의를 확인하시기 바랍니다.</li>
                        <li>이벤트 혜택으로 지급된 강의는 환불이 불가능합니다.</li>
                        <li>당첨자 발표는 윌비스신광은경찰 온라인 [공지사항]에서 확인 가능합니다.</li>
                        <li>학원 사정으로 인해 당첨자 발표 및 상품 지급일이 변경될 수 있습니다.</li>                      
                    </ol>
                </dd>
                <dt>소문내기 이벤트 유의사항</dt>
                <dd>
                    <ol>
                        <li>본 이벤트는 ID당 1회만 참여 가능합니다.</li>
                        <li>당첨자는 추첨을 통해 선별되며 윌비스신광은경찰 온라인 [공지사항]에서 확인 가능합니다.</li>
                        <li>본 이벤트와 관련이 없는 게시물의 경우 관리자에 의해 삭제될 수 있습니다.</li>
                        <li>부정한 방법으로 이벤트에 참여하거나, 타인의 게시글 도용 시 당첨자에서 제외됩니다.</li>
                        <li>게시글 삭제 및 비공개 처리 등의 이유로 URL 조회가 안되는 경우 당첨자에서 제외됩니다.</li>
                        <li>학원 사정으로 인해 당첨자 발표일이 변경될 수 있습니다.</li>
                    </ol>
                </dd>
            </dl>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  $( document ).ready( function() {
    AOS.init();
  });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')


@stop