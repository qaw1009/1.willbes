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
            position:relative;
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

        .skybanner {position:fixed;top:350px;right:200px;z-index:1;}
        .skybanner2{position:fixed;top:500px;right:200px;z-index:1;}

        .wb_cts00 {background:#404040}
        .wb_top{background:#3c4765}
        .wb_cts01 {background:#4f4f4f}   
        .wb_cts02 {background:#464646}
        .wb_cts03 {background:#585858}
        .wb_cts04,.wb_cts05 {background:#fff}
        .wb_cts06,.wb_cts07 {background:#e2e2e2}
        .wb_cts08{background:#555}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
      
        <div class="skybanner" >
            <a href="#to_go1"><img src="https://static.willbes.net/public/images/promotion/2019/10/1412_skybanner01.png" alt="심화기출 이벤트" ></a>
        </div>

        <div class="skybanner2" >
            <a href="#to_go2"><img src="https://static.willbes.net/public/images/promotion/2019/10/1412_skybanner02.png" alt="사전예약 이벤트" ></a>
        </div>         
       

		<div class="evtCtnsBox wb_cts00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_00.jpg" alt="슈퍼pass"/>            
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_top.jpg" alt="프리미엄 심화기출"  />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_01.jpg" alt="스텝1"  />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_02.jpg" alt="스텝2"  />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_03.jpg" alt="스텝3"  />
        </div>

        <div class="evtCtnsBox wb_cts04" id="to_go1" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_04.jpg" alt="이벤트1" usemap="#Map1412a" border="0"  />
            <map name="Map1412a" id="Map1412a">
                <area shape="rect" coords="80,694,285,752" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1042&campus_ccd=605001" target="_blank" />
                <area shape="rect" coords="462,696,662,752" href="#to_go3" />
                <area shape="rect" coords="833,697,1040,753" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1042&campus_ccd=605001" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts05" id="to_go2">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_05.jpg" alt="이벤트2"  />
        </div>
		
		<div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_06.jpg" alt="프리미엄 종합반" usemap="#Map1412b" border="0"  />
            <map name="Map1412b" id="Map1412b">
                <area shape="rect" coords="894,485,1033,657" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1042&campus_ccd=605001" target="_blank" />
                <area shape="rect" coords="894,919,1034,985" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1042&campus_ccd=605001" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_07.jpg" alt="프리미엄 단과반" usemap="#Map1412c" border="0"  />
            <map name="Map1412c" id="Map1412c">
                <area shape="rect" coords="917,591,1015,628" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1056" target="_blank" />
                <area shape="rect" coords="916,639,1015,678" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1054" target="_blank" />
                <area shape="rect" coords="914,689,1018,727" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1055" target="_blank" />
                <area shape="rect" coords="915,742,1016,779" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1055" target="_blank" />
                <area shape="rect" coords="917,788,1018,829" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1057" target="_blank" />
                <area shape="rect" coords="913,841,1019,878" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1054" target="_blank" />
                <area shape="rect" coords="913,890,1016,927" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1058" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts08" id="to_go3" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_08.jpg" alt="유의사항"  />
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">  			

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop