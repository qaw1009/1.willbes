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
            background:#e2e2e2;
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
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/08/1360_top_bg.jpg) no-repeat center top;}      
        .wb_01 {background:#fff;}
        .wb_02 {background:#5f5f5f}
        .wb_03 {background:#464646}
        .wb_04 {background:#5f5f5f;}
        .wb_05 {background:#e2e2e2;}

        .wb_05_table {width:1000px; margin:0 auto;height:610px;margin-top:-50px;}
        .wb_05_table div {margin-bottom:80px; font-size:40px;}
        .wb_05_table div span {color:#c43f90; border-bottom:3px solid #fff2fa}
        .wb_05_table table {background:#fff; width:90%;margin:0 auto;} 
        .wb_05_table tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .wb_05_table tr.st01 {background:#e3e4e5}
        .wb_05_table tr:hover {background:#f7e9c3;}
        .wb_05_table th,
        .wb_05_table td {padding:15px 20px; font-size:16px; font-weight:700;}
        .wb_05_table th {background:#e4e4e4; color:#000;border-right:1px solid #000;}
        .wb_05_table th:last-child{border:0;}
        .wb_05_table td:nth-child(1) {text-align:center;border-right:1px solid #000;}
        .wb_05_table td:nth-child(2) {border-right:1px solid #000;}
        .wb_05_table td:nth-child(3) {border-right:1px solid #000;}
        .wb_05_table td:last-chiild {border:0}
        .wb_05_table td p {font-size:12px}
        .wb_05_table a {padding:10px 15px; color:#fff; background:#ffc849; font-size:14px; display:block; border-radius:20px;}
        .wb_05_table a:hover {background:#000;}
        .wb_05_table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}

        .wb_05_table{background:#fff;}

        .lecture_box{content:"zz";display:block;clear:both;}
        .lecture_box .season{float:left;font-size:17px;width:70px;height:25px;line-height:25px;
                            background:#966100;color:#fff;border-radius:13px;font-weight:700;margin-left:100px;margin:50px;}
        .lecture_box .title{float:left;font-size:27px;color:#1f2327;font-weight:700;margin:50px -40px;}

        .wb_06 {background:#555;margin-top:115px;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">        
        <div class="skybanner" >
            <a href="#to_go"><img src="https://static.willbes.net/public/images/promotion/2019/08/1360_skybanner.png" alt="스카이배너" ></a>
        </div>           
    
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_top.jpg" alt="프리미엄 심화 이론"/>       
        </div>
       
        <div class="evtCtnsBox wb_01" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_01.jpg" alt="사전접수 이벤트" usemap="#Map1360a" border="0" />
            <map name="Map1360a" id="Map1360a">
                <area shape="rect" coords="456,622,664,684" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="신청하기" />
                <area shape="rect" coords="76,1188,289,1250" href="#careful" />
                {{--<area shape="rect" coords="459,1189,668,1250" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="신청하기" />--}}
                <area shape="rect" coords="833,1184,1044,1250" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="신청하기" />
            </map>          
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_02.jpg" alt="더 늦기 전에 준비" />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_03.jpg" alt="최적화된 전문교수진"/>
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_04.jpg" alt="심화이론,지금부터 준비"/>
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_05.jpg" alt="수강 신청하기"/>                   
        </div> 
            <div class="evtCtnsBox wb_05_table">           
                <div class="lecture_box">              
                    <p class="season">new</p>
                    <h3 class="title">2020년 합격대비 심화이론 강의</h3>
                </div>     
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="20%" />
                        <col width="" />
                        <col width="20%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th colspan="2">강의명</th>
                                <th>개강일</th>                        
                                <th colspan="2">학원</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>형법 김원욱</td>
                                <td>2020 김원욱 형법 심화이론</td>
                                <td>9.9(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1056" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>영어 하승민</td>
                                <td>2020 하승민 영어 심화이론</td>
                                <td>9.9(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1054" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 원유철</td>
                                <td>2020 원유철 한국사 심화이론</td>
                                <td>9.25(수)</td>                       
                                <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 오태진</td>
                                <td>2020 오태진 한국사 심화이론</td>
                                <td>9.25(수)</td>                       
                                <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055" target="_blank">수강신청</a></td>
                            </tr>                    
                            <tr>
                                <td>형사소송법 신광은</td>
                                <td>2020 신광은 형사소송법 심화이론</td>
                                <td>10.11(금)</td>                    
                                <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1057" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>경찰학개론 장정훈</td>
                                <td>2020 장정훈 경찰학개론 심화이론</td>
                                <td>10.28(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1058" target="_blank">수강신청</a></td>
                            </tr>                        
                        </tbody>
                    </table>        
                </div>                                  
            </div>    
            <div class="evtCtnsBox wb_05_table"style="height:350px;">           
                <div class="lecture_box">              
                    <p class="season">new</p>
                    <h3 class="title">2020년 합격대비 심화이론 종합반</h3>
                </div>     
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="20%" />
                        <col width="" />
                        <col width="20%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th colspan="2">강의명</th>
                                <th>개강일</th>                        
                                <th colspan="2">학원</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">2020 경찰시험대비 심화과정 종합반 (史 오태진)</td>
                                <td>9.9(월)</td>                        
                                <td style="border:none;"><a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td colspan="2">2020 경찰시험대비 심화과정 종합반 (史 원유철)</td>
                                <td>9.9(월)</td>                        
                                <td style="border:none;"><a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                            </tr>                                                   
                        </tbody>
                    </table>        
                </div>                                  
            </div>    
            <div class="evtCtnsBox wb_05_table" style="height:350px;">           
                <div class="lecture_box">              
                    <p class="season">new</p>
                    <h3 class="title">2020년 합격대비 심화이론 + 심화기출 종합반</h3>
                </div>     
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="20%" />
                        <col width="" />
                        <col width="20%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th colspan="2">강의명</th>
                                <th>개강일</th>                        
                                <th colspan="2">학원</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">2020 경찰시험대비 심화이론 + 심화기출 종합반 (史 오태진)</td>
                                <td>9.9(월)</td>                        
                                <td style="border:none;"><a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td colspan="2">2020 경찰시험대비 심화이론 + 심화기출 종합반 (史 원유철)</td>
                                <td>9.9(월)</td>                        
                                <td style="border:none;"><a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                            </tr>                                                  
                        </tbody>
                    </table>        
                </div>                                  
            </div>    
               
        <div class="evtCtnsBox wb_06" id="careful">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_06.jpg" alt="유의사항"/>         
        </div>
      
    </div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop