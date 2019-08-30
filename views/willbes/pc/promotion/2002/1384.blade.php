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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/08/1379_top_bg.jpg) no-repeat center top;}       
        .evt01 {background:#eee;}
        .evt02 {background:#fff;}
        .evt03 {background:#555;}  
        .evt04 {background:#fff; padding:100px 0} 
        .evt04 div {width:1000px; margin:0 auto}
        .evt04 table {width:100%; border-top:2px solid #000; border-bottom:2px solid #000}        
        .evt04 table td,
        .evt04 table th {padding:15px; font-size:14px;}
        .evt04 th {font-weight:bold}  
        .evt04 thead th {color:#000; border-bottom:1px solid #000; }
        .evt04 tbody tr td:nth-child(1) {text-align:left; font-weight:bold}
        .evt04 table tr {border-bottom:1px solid #eee; color:#999}
        .evt04 table tr.on {color:#000}
        .evt04 table tr.on span {padding:8px 0; border-radius:15px; background:#fcdea2; display:block}
        .evt04 table tbody tr:hover {
            background:#eee;    
        }
        .evt04 tbody tr:last-child {border:0}        
        .evt04 div a {display:block; padding:20px 0; border-radius:30px; font-size:24px; background:#000; color:#fff; margin:50px 0 30px}
        .evt04 div li {list-style-type:disc !important; margin-left:25px; text-align:left; font-size:14px; margin-bottom:10px;}
        .evt05 {background:#555;} 
        .evt06 {background:#555;} 
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">       
        <div class="evtCtnsBox evtTop">
            top
        </div>
      
        <div class="evtCtnsBox evt01">
           01         
        </div>

        <div class="evtCtnsBox evt02">
           02
        </div>

        <div class="evtCtnsBox evt03">
           03
        </div>
        
        <div class="evtCtnsBox evt04">
            <div>
                <table cellspacing="0" cellpadding="0">
                    <col width="*" />
                    <col style="width:15%" />
                    <col style="width:15%" />
                    <col style="width:12%" />
                    <col style="width:12%" />
                    <thead>
                        <tr>
                            <th scope="col">강의명</th>
                            <th scope="col">과목</th>
                            <th scope="col">시간</th>
                            <th scope="col">일정</th>
                            <th scope="col">학원</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="on">
                            <td>2020년 합격대비 HALF 불금모의고사 [1회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>9.20(금)</td>
                            <td><span>접수중</span></td>
                        </tr>
                        <tr class="on">
                            <td>2020년 합격대비 HALF 불금모의고사 [2회]</td>
                            <td>영어/경찰</td>
                            <td>18:00 ~ 18:30</td>
                            <td>10.4(금)</td>
                            <td><span>접수중</span></td>
                        </tr>
                        <tr class="on">
                            <td>2020년 합격대비 HALF 불금모의고사 [3회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>10.11(금)</td>
                            <td><span>접수중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [4회]</td>
                            <td>영어/경찰학</td>
                            <td>18:00 ~ 18:30</td>
                            <td>10.18(금)</td>
                            <td>접수 준비중</td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [5회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>10.25(금)</td>
                            <td><span class="st01">접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [6회]</td>
                            <td>영어/경찰학</td>
                            <td>18:00 ~ 18:30</td>
                            <td>11.8(금)</td>
                            <td><span class="st01">접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [7회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>11.15(금)</td>
                            <td><span class="st01">접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [8회]</td>
                            <td>영어/경찰학</td>
                            <td>18:00 ~ 18:30</td>
                            <td>11.22(금)</td>
                            <td><span class="st01">접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [9회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>12.6(금)</td>
                            <td>접수 준비중</td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [10회]</td>
                            <td>영어/경찰학</td>
                            <td>18:00 ~ 18:30</td>
                            <td>12.13(금)</td>
                            <td><span class="st01">접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [11회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>12.20(금)</td>
                            <td><span class="st01">접수 준비중</span></td>
                        </tr>
                    </tbody>
                </table>
                <a href="https://police.willbes.net/pass/mockTest/apply/cate" target="_blank" class="NSK-Black">모의고사 신청하기 ></a>
                <ul>
                    <li>해당 모의고사는 학원전용 모의고사입니다.</li>
                    <li>학원일정에 따라 연기 또는 변경될수 있습니다.</li>
                    <li>온라인은 진행하지 않습니다.</li>
                    <li>불금모의고사 문의 : 1544-0336</li>
                </ul>
            </div>
            
        </div>

        <div class="evtCtnsBox evt05">
           05
        </div>

        <div class="evtCtnsBox evt06">
           06
        </div>

        {{--홍보url댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

    </div>
    <!-- End Container -->


@stop