@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        .evtTop00 {background:#404040}
        .evtTop {background:#c87d14}     
        .evt01 {background:#fff; padding:0 0 130px}
        .evt01 ul {width:984px; margin:0 auto}
        .evt01 li {display:inline; float:left; width:16.66666%}
        .evt01 li a {display:block; padding:15px 0; text-align:center; color:#fff; background:#b7b7b7; font-size:14px; margin:0 4px; font-weight:bold }
        .evt01 li a:hover,
        .evt01 li a.active {color:#fff; background:#b5172c;}
        .evt01 ul:after {content:""; display:block; clear:both}

        .evt02 {background:#252525}
        .evt03 {background:#dedede}
        .evt04 {background:#fff}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_top.jpg" usemap="#Map1284A" title="요약 문제풀이 1단계" border="0">
            <map name="Map1284A" id="Map1284A">
                <area shape="rect" coords="369,1080,745,1174" href="#evt03" alt="수강신청" />
            </map>         
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_01.jpg" title="교수님이 알려주는 1단계란?">
            <ul>
                <li><a href="#tab01">중요 포인트 →</a></li>
                <li><a href="#tab02">중요 포인트 →</a></li>
                <li><a href="#tab03">중요 포인트 →</a></li>
                <li><a href="#tab04">중요 포인트 →</a></li>
                <li><a href="#tab05">중요 포인트 →</a></li>
                <li><a href="#tab06">중요 포인트 →</a></li>
            </ul>
            <div class="mt50">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_01_01.jpg" title="신광은" id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_01_02.jpg" title="오태진" id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_01_03.jpg" title="원유철" id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_01_04.jpg" title="김원욱" id="tab04">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_01_05.jpg" title="장정훈" id="tab05">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_01_06.jpg" title="하승민" id="tab06">
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_02.jpg" title="채용인원 1,627명"/>
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_03.jpg" usemap="#Map1284B" title="개설강좌" border="0"/>
        <map name="Map1284B" id="Map1284B">
        <area shape="rect" coords="88,684,258,984" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1057" target="_blank" alt="형소법" />
        <area shape="rect" coords="286,682,449,981" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1055" target="_blank" alt="한국사" />
        <area shape="rect" coords="474,685,649,983" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1056" target="_blank" alt="형법" />
        <area shape="rect" coords="676,680,846,977" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1058" target="_blank" alt="경찰학개론" />
        <area shape="rect" coords="872,927,1047,981" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1054" target="_blank" alt="영어" />
        <area shape="rect" coords="79,1335,264,1590" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1057" target="_blank" alt="형사소송법" />
        <area shape="rect" coords="280,1335,452,1387" href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1060" target="_blank" alt="신청하기" />
        <area shape="rect" coords="476,1334,648,1591" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1056" target="_blank" alt="형법" />
        <area shape="rect" coords="675,1332,847,1595" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1058" target="_blank" alt="경찰학개론" />
        <area shape="rect" coords="873,1331,1046,1389" href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&amp;campus_ccd=605001&amp;course_idx=1043&amp;subject_idx=1059" target="_blank" alt="수사" />
        <area shape="rect" coords="474,2067,650,2128" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&amp;course_idx=1043&amp;campus_ccd=605001" target="_blank" alt="종합" />
        </map>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_04.jpg" usemap="#Map1284C" title="교재안내" border="0"/>
            <map name="Map1284C" id="Map1284C">
                <area shape="rect" coords="490,903,631,955" href="https://police.willbes.net/book/index/cate/3001" target="_blank" alt="구매하기" />
                <area shape="rect" coords="489,1686,632,1746" href="https://police.willbes.net/book/index/cate/3001" target="_blank" alt="구매하기" />
            </map>
        </div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">    
    $(document).ready(function(){
        $('.evt01 ul').each(function(){
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
</script>

@stop