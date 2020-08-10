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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .evttop {background:#132460}
        .evt01 {background:#ececec}
        .evt02 {background:#fff}
        .evt03 {background:#132460; padding-bottom:150px}
        .evt03 div {width:1120px;margin:0 auto; background:#fff; padding:50px 30px}
        .evt03 h3 {text-align:center; color:#f26522; font-weight:bold; margin:20px auto 40px; font-size:40px; line-height:1.5}   
        .evt03 h3 span {display:block; font-size:30px}
        .evt03 tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .evt03 tr.st01 {background:#e3e4e5}
        .evt03 tr:hover {background:#fde4d8;}
        .evt03 th,
        .evt03 td {padding:15px 20px; font-size:16px; font-weight:bold; text-align:left; border-right:1px solid #000;text-align:center;}
        .evt03 thead th {background:#e2e2e2 !important;; color:#000; border-right:1px solid #000; font-weight:bold; text-align:center}        
        .evt03 th:last-child{border:0;}
        .evt03 td:nth-child(1) {text-align:center;}
        .evt03 td:nth-child(4) {text-align:center;}
        .evt03 td:last-child {border:0; text-align:center}
        .evt03 td p {font-size:12px}
        .evt03 td span {font-weight:normal}
        .evt03 a {padding:10px 15px; color:#fff; background:#000; font-size:14px; display:block; border-radius:20px;}
        .evt03 a:hover {background:#f26522;}
        .evt03 a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0} 
        .evt03 p {text-align:right; color:#000; font-weight:bold; margin-top:20px; font-size:14px}       
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evttop">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1758_top.jpg" alt="마무리특강" usemap="#Map1758a" border="0" />
            <map name="Map1758a" id="Map1758a">
                <area shape="rect" coords="258,701,862,818" href="#apply" />
            </map>
        </div>     

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1758_01.jpg" alt="핵심포인트"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1758_02.jpg" alt="마무리특강 학습전략"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1758_03.jpg" alt="마무리특강 교수진"/>
            <div> 
                <h3>2020 2차 대비 마무리 특강 수강신청
                <span>마지막에 무조건 이것만은 보고가자!!!</span></h3>
                <table>
                    <col width="18%" />
                    <col width="" />
                    <col width="24%" />
                    <col width="12%" />
                    <col width="" />
                    <thead>
                        <tr>
                            <th colspan="2">강의명</th>
                            <th>개강일</th>                        
                            <th>학원</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>형소법 신광은</td>
                            <td>마무리 특강</td>
                            <td>8.31(화) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1057&campus_ccd=605001" target="_blank">수강신청</a></td>                  
                        </tr>
                        <tr>
                            <td>형법 김원욱</td>
                            <td>마무리 특강</td>
                            <td>9.1(화) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1056&campus_ccd=605001" target="_blank">수강신청</a></td>                  
                        </tr>
                        <tr>
                            <td>한국사 원유철</td>
                            <td>마무리 특강</td>
                            <td>9.2(수) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1055&campus_ccd=605001" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>한국사 오태진</td>
                            <td>마무리 특강</td>
                            <td>9.2(수) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1055&campus_ccd=605001" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>행정법 장정훈</td>
                            <td>마무리 특강</td>
                            <td>9.2(수) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&course_idx=1046&campus_ccd=605001&subject_idx=1060" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>영어 하승민</td>
                            <td>마무리 특강</td>
                            <td>9.3(목) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1054&campus_ccd=605001" target="_blank">수강신청</a></td>
                        </tr>       
                        <tr>
                            <td>수사 신광은</td>
                            <td>마무리 특강</td>
                            <td>9.3(목) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&course_idx=1046&campus_ccd=605001&subject_idx=1059" target="_blank">수강신청</a></td>
                        </tr> 
                        <tr>
                            <td>경찰학 신광은</td>
                            <td>마무리 특강</td>
                            <td>9.4(금) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1058&campus_ccd=605001" target="_blank">수강신청</a></td>
                        </tr> 
                        <tr>
                            <td rowspan="2">학원 종합반</td>
                            <td colspan="2">2020 2차대비 마무리 특강 종합반 (원/오  택 1)</td>
                            <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1046" target="_blank">수강신청</a></td>
                        </tr>   
                        <tr>
                            <td colspan="2">2020 2차대비 마무리 특강 종합반 (경행경채)</td>
                            <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1046" target="_blank">수강신청</a></td>
                        </tr>            
                    </tbody>
                </table>
                <p>* 종합반 구매시 한국사 원/오 택1</p>      
            </div>  
        </div>
    </div>
    <!-- End Container -->


@stop