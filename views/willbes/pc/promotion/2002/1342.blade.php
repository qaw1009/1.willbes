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
            min-width:1210px !important;
            background:#aca28d;
            margin-top:20px !important;
            padding:0 !important;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/07/1342_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#ececec}
        .evt02 {background:#fff;}        
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2019/07/1342_03_bg.jpg) no-repeat center top;margin-bottom:-75px;}
        .evt04 {width:1000px; margin:0 auto; padding:100px 0;}
        .evt04 div {margin-bottom:80px; font-size:40px;}
        .evt04 div span {color:#c43f90; border-bottom:3px solid #fff2fa}
        .evt04 table {background:#fff; width:100%} 
        .evt04 tr {border-bottom:1px solid #000;}        
        .evt04 tr.st01 {background:#e3e4e5}
        .evt04 tr:hover {background:#f7e9c3;}
        .evt04 th,
        .evt04 td {padding:15px 20px; font-size:16px; font-weight:700;}
        .evt04 th {background:#e4e4e4; color:#000;border-right:1px solid #000;}
        .evt04 th:last-child{border:0;}
        .evt04 td:nth-child(1) {text-align:center;border-right:1px solid #000;}
        .evt04 td:nth-child(2) {border-right:1px solid #000;}
        .evt04 td:nth-child(3) {border-right:1px solid #000;}
        .evt04 td:nth-child(4) {border-right:1px solid #000;}
        .evt04 td:last-chiild {border:0}
        .evt04 td p {font-size:12px}
        .evt04 a {padding:10px 15px; color:#fff; background:#ffc849; font-size:14px; display:block; border-radius:20px;}
        .evt04 a:hover {background:#000;}
        .evt04 a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1342_top.jpg" title="마무리특강">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1342_01.jpg" title="조금 다른 전략으로 학습">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1342_02.jpg" title="마무리특강 학습전략">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1342_03.jpg" usemap="#Map" title="마무리특강 교수진"/>
        </div>
        
        <div class="evtCtnsBox evt04">
            <table border="0" cellspacing="0" cellpadding="0">
                <col width="20%" />
                <col width="" />
                <col width="20%" />
                <col width="15%" />
                <thead>
                    <tr>
                        <th colspan="2">강의명</th>
                        <th>개강일</th>                        
                        <th>학원 수강신청</th>
                        <th colspan="2">동영상 수강신청</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>형소법 신광은</td>
                        <td>형소법 마무리 특강</td>
                        <td>8/19(월) 14:30</td>                        
                        <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1057&campus_ccd=605001" target="_blank">수강신청</a></td>
                        <td colspan="2"><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156130" target="_blank">학원 수강신청</a></td>
                    </tr>
                    <tr>
                        <td>경찰학 장정훈</td>
                        <td>경찰학 마무리 특강</td>
                        <td>8/20(화) 14:30</td>                        
                        <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1058&campus_ccd=605001" target="_blank">수강신청</a></td>
                        <td colspan="2"><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156128" target="_blank">학원 수강신청</a></td>
                    </tr>
                    <tr>
                        <td>한국사 오태진</td>
                        <td>한국사 마무리 특강</td>
                        <td>8/21(수) 14:30</td>                       
                        <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1055&campus_ccd=605001" target="_blank">수강신청</a></td>
                        <td colspan="2"><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156134" target="_blank">학원 수강신청</a></td>
                    </tr>
                    <tr>
                        <td>한국사 원유철</td>
                        <td>한국사 마무리 특강</td>
                        <td>8/21(수) 14:30</td>                       
                        <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1055&campus_ccd=605001" target="_blank">수강신청</a></td>
                        <td colspan="2"><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156136" target="_blank">학원 수강신청</a></td>
                    </tr>                    
                    <tr>
                        <td>행정법 장정훈</td>
                        <td>행정법 마무리 특강</td>
                        <td>8/21(수) 14:30</td>                        
                        <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&course_idx=1046&subject_idx=1060&campus_ccd=605001" target="_blank">수강신청</a></td>
                        <td colspan="2"><a href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/156123" target="_blank">학원 수강신청</a></td>
                    </tr>
                    <tr>
                        <td>형법 김원욱</td>
                        <td>형법 마무리 특강</td>
                        <td>8/22(목) 14:30</td>                      
                        <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1056&campus_ccd=605001" target="_blank">수강신청</a></td>
                        <td colspan="2"><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156124" target="_blank">학원 수강신청</a></td>
                    </tr>
                    <tr>
                        <td>영어 하승민</td>
                        <td>영어 마무리 특강</td>
                        <td>8/23(금) 14:30</td>                      
                        <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1054&campus_ccd=605001" target="_blank">수강신청</a></td>
                        <td colspan="2"><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156138" target="_blank">학원 수강신청</a></td>
                    </tr>
                    <tr>
                        <td>수사 신광은</td>
                        <td>수사 마무리 특강</td>
                        <td>8/23(금) 14:30</td>                      
                        <td><a href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&course_idx=1046&subject_idx=1059&campus_ccd=605001" target="_blank">수강신청</a></td>
                        <td colspan="2"><a href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/156122" target="_blank">학원 수강신청</a></td>
                    </tr>
                    <tr>
                        <td>학원 종합반</td>
                        <td colspan="2">2019년 2차대비 마무리특강 종합반</td>                                          
                        <td><a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1046" target="_blank">수강신청</a></td>
                        <td style="border:none;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

	</div>
    <!-- End Container -->

@stop