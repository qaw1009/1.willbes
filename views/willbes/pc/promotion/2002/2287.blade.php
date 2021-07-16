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
        .evt00 {background:#0a0a0a}
        .evttop {background:#f7f1e2}
        .evt01 {background:#ececec}
        .evt02 {background:#fff}
        .evt03 {background:#5d460b; padding-bottom:150px}
        .evt03 div {width:1120px;margin:0 auto; background:#fff; padding:30px 30px}
        .evt03 h3 {text-align:center; color:#f26522; font-weight:bold; margin:20px auto 40px; font-size:40px; line-height:1.5}   
        .evt03 h3 span {display:block; font-size:30px}
        .evt03 tr {border-bottom:1px solid #6e6e6e;border-top:1px solid #6e6e6e;}        
        .evt03 tr.st01 {background:#e3e4e5}
        .evt03 tr:hover {background:#fde4d8;}
        .evt03 th,
        .evt03 td{padding:10px 0; font-size:18px; font-weight:bold; text-align:left; border-right:1px solid #6e6e6e;text-align:center; color:#333333;}
        .evt03 thead th {background:#e2e2e2 !important;; color:#2d2d2d; border-right:1px solid #6e6e6e; font-weight:bold; text-align:center; padding:14px 0;}        
        .evt03 th:last-child{border:0;}
        .evt03 td:nth-child(1) {text-align:left; font-weight:normal; border-right:0; text-indent:18px;}
        .evt03 td:nth-child(2){text-align:left;}
        .evt03 td:nth-child(4) {text-align:center;}
        .evt03 td:last-child {text-align:center; border-right:0;}
        .evt03 td.bdr{border-right:1px solid #6e6e6e; font-weight:bold;}
        .evt03 td p {font-size:12px}
        .evt03 td span {font-weight:normal}
        .evt03 a {padding:7px 20px; color:#fff; background:#000; font-size:18px; display:inline-block; border-radius:20px;}
        .evt03 a:hover {background:#5d460b;}
        .evt03 a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0} 
        .evt03 p {text-align:right; color:#55509c; font-weight:bold; margin-top:20px; font-size:14px}         
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <div data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="경찰학원부분 1위"/>
            </div>
        </div>

        <div class="evtCtnsBox evttop">
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2287_top.jpg" alt="마무리특강" />
            </div>
        </div>     

        <div class="evtCtnsBox evt01">
            <div data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2287_01.jpg" alt="핵심포인트"/>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2287_02.jpg" alt="마무리특강 학습전략"/>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img data-aos="fade-left" src="https://static.willbes.net/public/images/promotion/2021/07/2287_03.jpg" alt="마무리특강 교수진"/>
            <div> 
                <table>
                    <col width="110px" />
                    <col width="90px" />
                    <col width="450px" />
                    <col width="200px" />
                    <col width="auto" />
                    <thead>
                        <tr>
                            <th colspan="3">강의명</th>
                            <th>개강일</th>                        
                            <th>학원 수강신청</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>형법</td>
                            <td>김원욱</td>
                            <td>형법 마무리 특강</td>
                            <td>8.2(월) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1056&campus_ccd=605001" target="_blank">수강신청</a></td>                  
                        </tr>
                        <tr>
                            <td>형소법</td>
                            <td>신광은</td>
                            <td>형소 마무리 특강</td>
                            <td>8.3(화) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1057&campus_ccd=605001" target="_blank">수강신청</a></td>                  
                        </tr>
                        <tr>
                            <td>영어</td>
                            <td>하승민</td>
                            <td>영어 마무리 특강</td>
                            <td>8.4(수) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1054&campus_ccd=605001" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>행정법</td>
                            <td>장정훈</td>
                            <td>행정법 마무리 특강</td>
                            <td>8.4(수) 14:00</td>
                             <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&course_idx=1046&campus_ccd=605001&subject_idx=1060" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td>원유철</td>
                            <td>한국사 마무리 특강</td>
                            <td>8.5(목) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&campus_ccd=605001&subject_idx=1055&prof_idx=50642" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>한국사</td>
                            <td>오태진</td>
                            <td>한국사 마무리 특강</td>
                            <td>8.5(목) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&campus_ccd=605001&subject_idx=1055&prof_idx=50132" target="_blank">수강신청</a></td>
                        </tr>       
                        <tr>
                            <td>수사</td>
                            <td>신광은</td>
                            <td>수사 마무리 특강</td>
                            <td>8.5(목) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&course_idx=1046&campus_ccd=605001&subject_idx=1059" target="_blank">수강신청</a></td>
                        </tr> 
                        <tr>
                            <td>경찰학</td>
                            <td>장정훈</td>
                            <td>경찰학 마무리 특강</td>
                            <td>8.6(목) 14:00</td>
                            <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&campus_ccd=605001&subject_idx=1058" target="_blank">수강신청</a></td>
                        </tr> 
                        <tr>
                            <td rowspan="2" colspan="2" class="bdr">학원 종합반</td>
                            <td colspan="2" class="tx-center">2021 2차대비 마무리 특강 종합반 (원/오  택 1)</td>
                            <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1046" target="_blank">수강신청</a></td>
                        </tr>   
                        <tr>
                            <td colspan="2" class="bdr tx-center">2021 2차대비 마무리 특강 종합반 (경행경채)</td>
                            <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1046" target="_blank">수강신청</a></td>
                        </tr>            
                    </tbody>
                </table>
                <p>* 종합반 구매시 한국사 원/오 택1</p>      
            </div>  
        </div>
    </div>
    <!-- End Container -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

@stop