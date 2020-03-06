<div>
    <a href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?search_order=course&course_idx=1219') }}">
        <img src="https://static.willbes.net/public/images/promotion/main/2000_sky01.jpg">
    </a>
</div>
<div class="mt5">
    <a href="{{ site_url('/support/qna/index?s_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
        <img src="https://static.willbes.net/public/images/promotion/main/2000_sky03.jpg" alt="동영상 1:1상담">
    </a>
</div>
<div class="mt5">
    <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
        <img src="https://static.willbes.net/public/images/promotion/main/2000_sky02.jpg" alt="학원 1:1상담">
    </a>
</div>
@if(empty($__cfg['CateCode']) === false && ($__cfg['CateCode'] == '3098' || $__cfg['CateCode'] == '3099'))
<div class="mt5">
    <a href="{{ site_url('/support/notice/show/cate/' . $__cfg['CateCode'] . '?board_idx=262920') }}">
        <img src="https://static.willbes.net/public/images/promotion/main/2005_sky_200306.jpg" alt="불법공유">
    </a>
</div>
@endif
<div class="mt5">
    {!! banner_html(element('메인_우측퀵_01', $data['arr_main_banner'])) !!}
</div>
<ul>
    <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/109?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">강의 계획서</a></li>
    <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/80?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">강의 시간표</a></li>
    <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/82?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">강의실 배정표</a></li>
    @if(empty($__cfg['CateCode']) === false && ($__cfg['CateCode'] == '3094' || $__cfg['CateCode'] == '3095' || $__cfg['CateCode'] == '3096' || $__cfg['CateCode'] == '3097'))
        <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/110?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">강의 자료실</a></li>
    @endif
</ul>