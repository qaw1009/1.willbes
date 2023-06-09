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

        .skybanner {
            position:fixed;
            top:280px;
            right:0;
            z-index:1;
        }

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:28px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }

        .wb_top {background:#353a41 url(https://static.willbes.net/public/images/promotion/2019/07/1268_top_bg.jpg) no-repeat center top; position:relative}
        .wb_top span {position:absolute; left:50%; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .wb_top span.img1 {top:190px; margin-left:-330px; width:560px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        .wb_top span.img2 {top:250px; margin-left:-285px; width:546px; animation:iptimg2 0.5s ease-in;-webkit-animation:iptimg2 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-560px; opacity: 0;}
        to{margin-left:-330px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-560px; opacity: 0;}
        to{margin-left:-330px; opacity: 1;}
        }
        
        @@keyframes iptimg2{
        from{margin-left:0; opacity: 0;}
        to{margin-left:-285px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
        from{margin-left:0; opacity: 0;}
        to{margin-left:-285px; opacity: 1;}
        }

        .wb_01 {background:#343434}
        .wb_02 {background:#24272d url(https://static.willbes.net/public/images/promotion/2019/06/1268_02_bg.jpg) no-repeat center top;}
        .wb_03 {background:#aeaeae}
        .wb_04 {background:#fff}
        .wb_05 {background:#555}
        .wb_06 {background:#ececec}
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">        
        <div class="skybanner" >
            <a href="#wb_04"><img src="https://static.willbes.net/public/images/promotion/2019/06/1268_skybanner.png" alt="스카이배너" ></a>
        </div>        

        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt">문제풀이 종합반<br><span>사전접수 이벤트</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1268_top.jpg" alt="실전 문제풀이 패키지"/>
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2019/06/1268_top_img1.png" alt=" "></span>
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2019/06/1268_top_img2.png" alt=" "></span>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1268_01.jpg" alt="문제풀이과정 커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1268_02.jpg" alt="교수진" />
        </div>

        <div class="evtCtnsBox wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1268_03.jpg"  alt="문제풀이 특징" usemap="#Map1268C" border="0"/>
            <map name="Map1268C" id="Map1268C">
                <area shape="rect" coords="183,2739,269,2767" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1044&amp;subject_idx=1057" target="_blank" alt="형소법" />
                <area shape="rect" coords="319,2742,405,2765" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1044&amp;subject_idx=1058" target="_blank" alt="경찰학개론" />
                <area shape="rect" coords="454,2743,538,2765" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1044&amp;subject_idx=1055" target="_blank" alt="한국사" />
                <area shape="rect" coords="452,2769,538,2789" href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&amp;campus_ccd=605001&amp;course_idx=1044&amp;subject_idx=1060" target="_blank" alt="행정법" />
                <area shape="rect" coords="590,2743,671,2763" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1044&amp;subject_idx=1056" target="_blank" alt="형법" />
                <area shape="rect" coords="726,2742,808,2764" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1044&amp;subject_idx=1054" target="_blank" alt="영어" />
                <area shape="rect" coords="724,2768,810,2790" href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&amp;campus_ccd=605001&amp;course_idx=1044&amp;subject_idx=1059" target="_blank" alt="수사" />
            </map>
        </div>

        <div class="evtCtnsBox wb_04" id="wb_04">      
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1268_04.jpg"  alt="이벤트" usemap="#Map1268A" border="0" />
            <map name="Map1268A" id="Map1268A">
                <area shape="rect" coords="73,575,470,638" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1045" target="_blank" alt="일반경찰3 신청하기" />
                <area shape="rect" coords="640,575,1044,642" href="https://police.willbes.net/pass/offPackage/index?cate_code=3011&campus_ccd=605001&course_idx=1045" target="_blank" alt="경행경채3 신청하기" />
            </map> 
        </div>

        <div class="evtCtnsBox wb_06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1268_06.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox wb_05" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1268_05.jpg"  alt="유의사항"/>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop