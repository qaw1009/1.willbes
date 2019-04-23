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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1204_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#5f5f5f}
        .evt02 {background:#6d6d6d}        
        .evt03 {background:#7f7f7f}
        .evt04 {margin:0 auto; padding:100px 0; background:#e2e2e2}
        .evt04 div {margin-bottom:80px; font-size:40px;}
        .evt04 div span {color:#ce9317; border-bottom:3px solid #fdf5e4}
        .evt04 table {background:#fff; width:1000px; margin:0 auto; background:#fff} 
        .evt04 tr {border-bottom:1px solid #ccc}        
        .evt04 tr.st01 {background:#ececec}
        .evt04 tr:hover {background:#fdf5e4}
        .evt04 th,
        .evt04 td {padding:15px 20px; font-size:16px; font-weight:500;}
        .evt04 th {background:#5f5f5f; color:#fff}
        .evt04 td:nth-child(1) {text-align:center}
        .evt04 td:nth-child(2) {text-align:left}
        .evt04 td:nth-child(3) {color:#ce9317}
        .evt04 td:last-chiild {border:0}
        .evt04 td p {font-size:12px}
        .evt04 a {padding:10px 15px; color:#fff; background:#ce9317; font-size:14px; display:block; border-radius:20px 20px 0 20px}
        .evt04 a:hover {background:#252525}
        .evt04 a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1204_top.jpg" title="마무리특강">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1204_01.jpg" title="조금 다른 전략으로 학습">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1204_02.jpg" title="마무리특강 학습전략">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1204_03.jpg" title="마무리특강 교수진">
        </div>

        <div class="evtCtnsBox evt04">
            <div class="NSK-Black">2019 1차 대비 마무리 특강 <span>학원 개설강좌</span></div>
            <table border="0" cellspacing="0" cellpadding="0">
                <col width="20%" />
                <col width="" />
                <col width="20%" />
                <col width="15%" />
                <col width="15%" />
                <thead>
                    <tr>
                        <th colspan="2">강의명</th>
                        <th>개강일</th>
                        <th>학원강의</th>
                        <th>동영상강의</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>경찰학 장정훈</td>
                        <td>2019 장정훈 경찰학 심화기출</td>
                        <td>5/6(월) 9:00</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1058') }}" target="_blank">수강신청</a></td>
                        <td><a href="#none">준비중</a></td>
                    </tr>
                    <tr>
                        <td>한국사 오태진</td>
                        <td>2019 오태진 한국사 심화이론</td>
                        <td>5/8(수) 14:00</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055') }}" target="_blank">수강신청</a></td>
                        <td><a href="#none">준비중</a></td>
                    </tr>
                    <tr>
                        <td>한국사 원유철</td>
                        <td>2019 원유철 한국사 심화이론</td>
                        <td>5/6(월) 14:00</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055') }}" target="_blank">수강신청</a></td>
                        <td><a href="#none">준비중</a></td>
                    </tr>
                    <tr>
                        <td>행정법 장정훈</td>
                        <td>2019 장정훈 행정법 심화기출</td>
                        <td>5/10(금) 14:00</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3011&campus_ccd=605001&course_idx=1042&subject_idx=1060') }}" target="_blank">수강신청</a></td>
                        <td><a href="#none">준비중</a></td>
                    </tr>                    
                    <tr>
                        <td>수사 신광은</td>
                        <td>2019 신광은 수사 이론 </td>
                        <td>5/13(월) 14:00</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3011&campus_ccd=605001&course_idx=1040&subject_idx=1059') }}" target="_blank">수강신청</a></td>
                        <td><a href="#none">준비중</a></td>
                    </tr>
                    <tr>
                        <td>영어 하승민</td>
                        <td>2019 하승민 영어 심화이론</td>
                        <td>5/13(월) 14:00</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1054') }}" target="_blank">수강신청</a></td>
                        <td><a href="#none">준비중</a></td>
                    </tr>
                    <tr>
                        <td>형소법 신광은</td>
                        <td>2019 신광은 형소법 심화이론</td>
                        <td>5/17(금) 9:00</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041') }}" target="_blank">수강신청</a></td>
                        <td><a href="#none">준비중</a></td>
                    </tr>
                    <tr>
                        <td>형법 김원욱</td>
                        <td>2019 김원욱 형법 심화이론(판례)</td>
                        <td>6/6(목) 9:00</td>
                        <td><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1056') }}" target="_blank">수강신청</a></td>
                        <td><a href="#none">준비중</a></td>
                    </tr>
                    <tr class="st01">
                      <td>학원 종합반</td>
                      <td>2019 심화이론/기출 종합반</td>
                      <td>&nbsp;</td>
                      <td colspan="2"><a href="{{ site_url('/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041') }}" target="_blank">수강신청</a></td>
                    </tr>
                    {{--
                    <tr class="st01">
                      <td>동영상 종합반</td>
                      <td colspan="2">2019년 1차대비 윌비스 신광은경찰 마무리 특강 (史원유철)</td>
                      <td colspan="2"><a href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/152830') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr class="st01">
                        <td>동영상 종합반</td>    
                        <td colspan="2">2019년 1차대비 윌비스 신광은경찰 마무리 특강 (史오태진)</td>
                        <td colspan="2"><a href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/152829') }}" target="_blank">수강신청</a></td>
                    </tr>
                    --}}
                </tbody>
            </table>
        </div>
	</div>
    <!-- End Container -->

@stop