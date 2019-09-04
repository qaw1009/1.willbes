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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1204_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#5f5f5f}
        .evt02 {background:#6d6d6d}        
        .evt03 {background:#7f7f7f}
        .evt04 {margin:0 auto; padding:100px 0; background:#e2e2e2;}
        .evt04 div {font-size:40px;}
        .evt04 div span {color:#ce9317; border-bottom:3px solid #fdf5e4}
        .evt04 p {font-size:14px}
        .evt04 .popup {font-size:20px; width:200px; line-height:1.5; background:#000; color:#fff; display:block; border-radius:20px;
        position:absolute; left:50%; margin-left:300px; top:100px; padding:10px 0; 
        }
        .evt04 .popup span {color:#ce9317}
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
        .evt04 td:last-child {border:0}
        .evt04 td p {font-size:12px}
        .evt04 a {padding:10px 15px; color:#fff; background:#ce9317; font-size:14px; display:block; border-radius:20px 20px 0 20px}
        .evt04 a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .evt04 a:hover {background:#252525; color:#fff;}
        .evt04 a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1204_top.jpg" title="마무리특강">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1204_01.jpg" title="조금 다른 전략으로 학습">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1204_02.jpg" title="마무리특강 학습전략">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1204_03.jpg" title="마무리특강 교수진">
        </div>

        <div class="evtCtnsBox evt04">
            <div class="NSK-Black">
            2020 대비 <span>심화이론 개설 강의</span>            
            </div>
            <p class="mt50 mb80">* 수강신청 클릭 시 가장 최근 진행 된 심화강좌로 연결됩니다.</p>
            <span class="popup NSK-Black">
                심화기출<br>
                <span>11월 4일</span><br>
                개강 예정!
            </span>
            
            <table cellspacing="0" cellpadding="0">
                <col width="20%" />
                <col width="" />
                <col width="20%" />
                <col width="15%" />
                <col width="15%" />
                <thead>
                    <tr>
                        <th colspan="2">강의명</th>
                        <th>동영상강의</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>형사소송법 신광은</td>
                        <td>2012 신광은 사소송법 심화이론</td>
                        <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156687" target="_blank">수강신청</a></td>
                    </tr>    
                    <tr>
                        <td>경찰학개론 장정훈</td>
                        <td>2020 장정훈 경찰학개론 심화기출</td>
                        <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156694" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>형법 김원욱</td>
                        <td>2020 김원욱 형법 심화이론(판례)</td>
                        <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156697" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>영어 하승민</td>
                        <td>2020 하승민 영어 심화이론</td>
                        <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156704" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>한국사 원유철</td>
                        <td>2020 원유철 한국사 심화이론</td>
                        <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156708" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>한국사 오태진</td>
                        <td>2020 오태진 한국사 심화이론</td>
                        <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156706" target="_blank">수강신청</a></td>
                    </tr>
                    {{--  
                    <tr>
                        <td>수사 신광은</td>
                        <td>2020 신광은 수사 이론 </td>
                        <td><a href="{{ site_url('/lecture/show/cate/3002/pattern/only/prod-code/153345') }}" target="_blank">수강신청</a></td>
                    </tr>                  
                    <tr>
                        <td>행정법 장정훈</td>
                        <td>2020 장정훈 행정법 심화기출</td>
                        <td><a href="{{ site_url('/lecture/show/cate/3002/pattern/only/prod-code/153346') }}">수강신청</a></td>
                    </tr> 
                    --}}                   
                </tbody>
            </table>
        </div>
	</div>
    <!-- End Container -->

@stop