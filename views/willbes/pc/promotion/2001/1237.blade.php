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

        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        .evtTop {background:#9ab8d0 }
     
        .evt01 {background:#fff url(https://static.willbes.net/public/images/promotion/2019/05/1237_01_bg.jpg) no-repeat center top; }
        .evt02 {background:#2c2c2c}
        .evt03 {background:#f1f6f9 url(https://static.willbes.net/public/images/promotion/2019/05/1237_03_bg.jpg) no-repeat center top}
        .evt04 {background:#fff; padding-bottom:150px}
        .evt04 > div {width:960px; margin:50px auto 0}
        .evt04 table {background:#fff} 
		.evt04 p {font-size:1.5em;  color: #000; padding-bottom:20px; padding-top:20px; text-align:left}
        .evt04 tr {border-bottom:1px solid #ccc}        
        .evt04 tr.st01 {background:#ececec}
        .evt04 tr:hover {background:#f9f9f9}
        .evt04 th,
        .evt04 td {padding:15px 20px; font-size:16px; font-weight:500;}
        .evt04 th {background:#5f5f5f; color:#fff}
        .evt04 td:nth-child(1) {text-align:center}
        .evt04 td:nth-child(2) {text-align:left}
        .evt04 td:nth-child(3) {color:#246293}
        .evt04 td:last-child {border:0}
        .evt04 td p {font-size:12px}
        .evt04 table a {padding:10px 15px; color:#fff; background:#246293; font-size:14px; display:block; border-radius:20px 20px 0 20px}
        .evt04 table a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .evt04 table a:hover {background:#333; color:#fff;}
        .evt04 table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1237_top.jpg"  alt="해수부 청원경철 249명 신규채용" />
        </div>

        <div class="evtCtnsBox evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1237_01.jpg"  alt="만점 골든키 공득인" />
        </div>
        
        <div class="evtCtnsBox evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1237_02.jpg"  alt="왜 공등인이어야 하는가?" />
        </div>

        <div class="evtCtnsBox evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1237_03.jpg"  alt="체력은 제이슨" usemap="#Map1237A" border="0" />
            <map name="Map1237A" id="Map1237A">
                <area shape="rect" coords="548,543,983,618" href="https://police.willbes.net/event/show/cate/3007/pattern/ongoing?event_idx=247" target="_blank" alt="체력은제이슨" />
            </map>
        </div>        

        <div class="evtCtnsBox evt04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1237_04.jpg"  alt="해수부 청원경찰 대비 커리큘럼 수강신청" usemap="#Map1237B" border="0" />
            <map name="Map1237B" id="Map1237B">
                <area shape="rect" coords="384,406,489,484" href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/153503" target="_blank" alt="제1과목" />
                <area shape="rect" coords="879,406,983,484" href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/153504" target="_blank" alt="제2과목" />
            </map>
            <div>
                <p>● 제1과목</p>
                <table border="0" cellspacing="0" cellpadding="0">
                    <col width="15%" />
                    <col width="20%" />
                    <col  />
                    <col width="15%" />
                    <thead>
                        <tr>
                            <th>과목</th>
                            <th>과정</th>
                            <th>강좌명</th>
                            <th>학원강의</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>제 1과목</td>
                            <td>이론</td>
                            <td>2019 청원경찰채용대비 공득인 제1과목  핵심이론 특강</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/153489" target="_blank" >수강신청</a></td>
                        </tr>
                        <tr>
                            <td>제 1과목</td>
                            <td>문제풀이</td>
                            <td>2019 청원경찰채용대비 공득인 제1과목 문제풀이</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/153490" target="_blank" >수강신청</a></td>
                        </tr>
                    </tbody>
                </table>
                <p>● 제2과목</p>
                <table border="0" cellspacing="0" cellpadding="0">
                    <col width="15%" />
                    <col width="20%" />
                    <col  />
                    <col width="15%" />
                    <thead>
                        <tr>
                            <th>과목</th>
                            <th>과정</th>
                            <th>강좌명</th>
                            <th>학원강의</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>제 2과목</td>
                            <td>이론</td>
                            <td>2019 청원경찰채용대비 공득인 제2과목 핵심이론 특강</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/153491" target="_blank" >수강신청</a></td>
                        </tr>
                        <tr>
                            <td>제 2과목</td>
                            <td>문제풀이</td>
                            <td>2019 청원경찰채용대비 공득인 제2과목 문제풀이</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/153492" target="_blank" >수강신청</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>   
        
    </div>
    <!-- End Container -->   
   
@stop