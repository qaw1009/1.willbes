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

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}   

        .wb_cts00 {background:#404040}
        .wb_top{background:url(https://static.willbes.net/public/images/promotion/2019/11/1412_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:#4f4f4f}   
        .wb_cts02 {background:#464646}
        .wb_cts03 {background:#585858}
        .wb_cts04,.wb_cts05 {background:#fff}
        .wb_cts07 {background:#e2e2e2}
        .wb_cts08{background:#555}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        이벤트<br>최종마감까지
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>     

    	<div class="evtCtnsBox wb_cts00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_00.jpg" alt="슈퍼pass"/>            
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1412_top.jpg" alt="프리미엄 심화기출"  />
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

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1412_04_1.jpg">        
        </div>  	

        <div class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1412_07_v2.jpg" alt="프리미엄 단과반" usemap="#Map1412c" border="0"  />
            <map name="Map1412c" id="Map1412c">
                <area shape="rect" coords="787,610,885,647" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1056" target="_blank" />
                <area shape="rect" coords="786,658,885,697" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1054" target="_blank" />
                <area shape="rect" coords="785,708,889,746" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1055" target="_blank" />
                <area shape="rect" coords="785,760,886,797" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1055" target="_blank" />
                <area shape="rect" coords="784,808,885,849" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1057" target="_blank" />
                <area shape="rect" coords="782,859,888,896" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1054" target="_blank" />
                <area shape="rect" coords="784,910,887,947" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1058" target="_blank" />
                <area shape="rect" coords="926,611,1026,647" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157653" target="_blank" />
                <area shape="rect" coords="927,658,1025,696" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157663" target="_blank" />
                <area shape="rect" coords="925,710,1024,747" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157657" target="_blank" />
                <area shape="rect" coords="926,760,1026,797" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157659" target="_blank" />
                <area shape="rect" coords="924,810,1026,848" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157647" target="_blank" />
                <area shape="rect" coords="926,859,1025,896" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157664" target="_blank" />
                <area shape="rect" coords="925,912,1024,945" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157651" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts08" id="to_go3" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1412_08.jpg" alt="유의사항"  />
        </div>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop