@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evt03 {background:#010111}
    .evtinfo {text-align:left; padding:40px 20px}
    .evtinfo p {font-size:120%}
    .evtinfo li {list-style-type: disc; margin-left:20px}

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
    <div class="evtCtnsBox"  data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2516m_01.jpg" alt="설공합경" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2516m_02.jpg" alt="명절" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2516m_03.jpg" alt="걱정하지 마세요" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2516m_04.jpg" alt="열공다짐 이벤트" >
        <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" title="회원가입" style="position: absolute; left: 24.44%; top: 55.37%; width: 50.28%; height: 8.3%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2516m_05.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evtinfo">
        <p>이벤트 유의사항</p>
        <ul>
            <li>본 이벤트는 ID당 1회만 참여 가능합니다.</li>
            <li>본 이벤트와 관련이 없는 게시물의 경우 관리자에 의해 삭제될 수 있습니다.</li>
            <li>이벤트 혜택은 모바일 쿠폰 형태로 지급되며, 회원정보상의 휴대전화번호로 발송됩니다.</li>
            <li>휴대전화번호 미기재, 오기입으로 인한 재발송은 불가하니, 이벤트 참여 전 반드시 확인하시기 바랍니다.</li>
            <li>이벤트 상품은 상기 이미지와 다를 수 있으며, 유사한 금액대의 다른 상품으로 변경될 수 있습니다.</li>
            <li>학원 사정으로 인해 당첨자 발표 및 쿠폰지급일이 변경 될 수 있습니다.</li>
        </ul>
    </div>

    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_normal_partial', array('login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')))
    @endif

    {{--<div class="reply">
        <div class="replyWrite">
            <textarea id="event_comment" name="event_comment" cols="30" rows="3"></textarea>
            <div class="mt10">* 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</div>
            <div class="mt10">
                <span id="content_byte"><i>0</i> byte</span>
                <a type="button" class="btnrwt" id="btn_submit_comment">글쓰기</a>
            </div>
        </div>
        <ul class="replyList">
            <li>
                <div class="ryw_info">
                    <strong>김창*</strong> <span class="date">2022-01-21</span>
                    <a class="rpDel" href="#none">삭제</a>
                </div>
                <div class="ryw_cont">
                    <div>본 이벤트와 관련이 없는 게시물의 경우 관리자에 의해 삭제될 수 있습니다</div>
                </div>
            </li>
            <li>
                <div class="ryw_info">
                    <strong>김창*</strong> <span class="date">2022-01-21</span>
                    <a class="rpDel" href="#none">삭제</a>
                </div>
                <div class="ryw_cont">
                    <div>본 이벤트는 ID당 1회만 참여 가능합니다</div>
                </div>
            </li>
        </ul>
        <div class="Paging">
            <ul>
                <li class="Prev"><a href="#none"><img src="/public/img/willbes/paging/paging_prev.png"></a></li>
                <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                <li><a href="#none">2</a><span class="row-line">|</span></li>
                <li><a href="#none">3</a><span class="row-line">|</span></li>
                <li><a href="#none">4</a><span class="row-line">|</span></li>
                <li><a href="#none">5</a></li>
                <li class="Next"><a href="#none"><img src="/public/img/willbes/paging/paging_next.png"></a></li>
            </ul>
        </div>
    </div>--}}


</div>

<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $(document).ready(function() {
        AOS.init();
    });
</script>
@stop