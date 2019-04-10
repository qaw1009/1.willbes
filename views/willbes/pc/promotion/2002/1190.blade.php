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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1190_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#ececec}
        .evt02 {background:#fff;}        
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1190_03_bg.jpg) no-repeat center top;}
        .evt04 {width:1000px; margin:0 auto; padding:100px 0}
        .evt04 div {margin-bottom:80px; font-size:40px;}
        .evt04 div span {color:#c43f90; border-bottom:3px solid #fff2fa}
        .evt04 table {background:#fff; width:100%} 
        .evt04 tr {border-bottom:1px solid #ccc}
        .evt04 tr:hover {background:#fff2fa}
        .evt04 tr:last-child {background:#b6bec9}
        .evt04 th,
        .evt04 td {padding:15px 20px; font-size:16px; font-weight:500;}
        .evt04 th {background:#e4e4e4; color:#000}
        .evt04 td:nth-child(1) {text-align:center}
        .evt04 td:nth-child(2) {text-align:left}
        .evt04 td:nth-child(3) {color:#c43f90}
        .evt04 td:last-chiild {border:0}
        .evt04 td p {font-size:12px}
        .evt04 a {padding:10px 15px; color:#fff; background:#c43f90; font-size:14px; display:block; border-radius:20px 20px 0 20px}
        .evt04 a:hover {background:#252525}
        .evt04 a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1190_top.jpg" title="마무리특강">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1190_01.jpg" title="조금 다른 전략으로 학습">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1190_02.jpg" title="마무리특강 학습전략">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1190_03.jpg" title="마무리특강 교수진">
        </div>

        <div class="evtCtnsBox evt04">
            <div class="NSK-Black">2019 1차 대비 마무리 특강 <span>학원 개설강좌</span></div>
            <table border="0" cellspacing="0" cellpadding="0">
                <col width="20%" />
                <col width="" />
                <col width="20%" />
                <col width="18%" />
                <thead>
                    <tr>
                        <th colspan="2">강의명</th>
                        <th>개강일</th>
                        <th>수강신청</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>형법
                            김원욱</td>
                        <td>형법 마무리 특강</td>
                        <td>4/15(월) 14:30</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1056&campus_ccd=605001') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>한국사 오태진</td>
                        <td>한국사 마무리 특강</td>
                        <td>4/16(화) 14:30</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1055&campus_ccd=605001&prof_idx=50132') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>한국사 원유철</td>
                        <td>한국사 마무리 특강</td>
                        <td>4/16(화) 14:30</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1055&campus_ccd=605001&prof_idx=50642') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>형소법 신광은</td>
                        <td>형소법 마무리 특강</td>
                        <td>4/18(목) 14:30</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1057&campus_ccd=605001') }}" target="_blank">수강신청</a></td>
                    </tr>                    
                    <tr>
                        <td>경찰학 장정훈</td>
                        <td>경찰학 마무리 특강</td>
                        <td>4/19(금) 14:30</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1058&campus_ccd=605001') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>영어 하승민</td>
                        <td>영어 마무리 특강</td>
                        <td>4/20(토) 14:30</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1054&campus_ccd=605001') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>학원 종합반</td>
                        <td>2019 1차 대비 마무리 특강 종합반</td>
                        <td>&nbsp;</td>
                        <td><a href="{{ site_url('/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1046') }}" target="_blank">수강신청</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>
    <!-- End Container -->

@stop