@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        /************************************************************/
        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:200px;right:10px; width:120px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/05/2213_top_bg.jpg) no-repeat center top; position:relative; border-bottom:5px solid #000}
        .evtTop .evtTab {width:1120px; position:absolute; bottom:-5px; left:50%; margin-left:-560px}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; background:#000; color:#939393; font-size:24px; height:65px; line-height:65px; text-align:center; margin-top:5px}
        .evtTab li a.active {background:#fff; color:#000; border:5px solid #000; border-bottom:0; height:70px; line-height:65px; margin:0}
        .evt02 {background:#fff}
        .evt02_01 {background:#2b2b2b}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:30px}

        .evt03 {background:#008dfa}

        .evt06 {padding:150px 0; width:1120px; margin:0 auto;} 
        .evt06 .title {text-align:left; font-size:24px; margin:100px auto 30px; font-weight:bold}
        .evt06 .title span {vertical-align:top; color:#ed0000;}
    </style> 

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#evt06"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2213_sky.png" alt="6월 BEST 강좌" >
            </a>            
        </div> 

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" alt="경찰학원부분 1위"/>
        </div>              

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2213_top.jpg" alt="5월 추천강좌"/>
            <ul class="evtTab NSK-Black">
                <li><a href="#tab01">21년 2차 준비 수험생</a></li>
                <li><a href="#tab02">22년 1차 준비 수험생</a></li>
            </ul>
        </div>

        <div id="tab01">
            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2213_t01_01.jpg"  alt=""/>
            </div>

            <div class="evtCtnsBox evt02">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2213_t01_02.jpg"  alt=""/>
                    <a href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1007&school_year=2021" title="문제풀이1단계" target="_blank" style="position: absolute; left: 11.52%; top: 32.63%; width: 24.73%; height: 48.94%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1008&school_year=2021" title="문제풀이2단계" target="_blank" style="position: absolute; left: 37.5%; top: 32.63%; width: 24.73%; height: 48.94%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1009&school_year=2021" title="문제풀이3단계" target="_blank" style="position: absolute; left: 63.21%; top: 32.63%; width: 24.73%; height: 48.94%; z-index: 2;"></a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2213_t02_01.jpg"  alt=""/>
            </div>

            <div class="evtCtnsBox evt02_01">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2213_t02_02.jpg"  alt=""/>
                    <a href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1004&school_year=2022" title="기본완성" target="_blank" style="position: absolute; left: 5.63%; top: 43.72%; width: 40.54%; height: 11.58%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51126?subject_idx=2088&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EB%8A%A5%EB%A0%A5%EA%B2%80%EC%A0%95%EC%8B%9C%ED%97%98&tab=open_lecture" title="오태진 한능검" target="_blank" style="position: absolute; left: 5.63%; top: 57.25%; width: 40.54%; height: 11.58%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51123?subject_idx=2012&subject_name=G-TELP&tab=open_lecture" title="김준기 지텔프" target="_blank" style="position: absolute; left: 5.63%; top: 70.56%; width: 40.54%; height: 11.58%; z-index: 2;"></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/1891#start" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2213_02.jpg"  alt="셀프 진단하기"/>
            </a>
        </div>

        <div class="evtCtnsBox evt06" id="evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2213_03_tit.jpg" alt="6월 BEST 강좌"/>
            <div class="title">2021대비 온라인 <span>문제풀이 1단계</span> 신청 ></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 

            <div class="title">2022대비 온라인 <span>기본과정</span> 신청 ></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif  

            <div class="mt100">
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2245" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2213_03.jpg" alt="신광은 경찰 무제한 패스"/>
                </a>
            </div>
        </div>
    </div>
    <!-- End Container -->
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

                    e.preventDefault()}
                )}
            )}
        ); 
    </script>
@stop