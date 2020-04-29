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
        .evttop {background:url(https://static.willbes.net/public/images/promotion/2020/04/1621_top_bg.jpg) repeat-x center top;}
        .evt01 {background:#ececec}
        .evt02 {background:#fff}
        .evt03 {background:#55509c; padding-bottom:150px}
        .evt03 div {width:1120px;margin:30px auto 0; background:#fff; padding:30px 20px}
        .evt03 tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .evt03 tr.st01 {background:#e3e4e5}
        .evt03 tr:hover {background:#e8e6fd;}
        .evt03 th,
        .evt03 td {padding:15px 20px; font-size:16px; font-weight:bold; text-align:left; border-right:1px solid #000;text-align:center;}
        .evt03 thead th {background:#e2e2e2 !important;; color:#000; border-right:1px solid #000; font-weight:bold; text-align:center}        
        .evt03 th:last-child{border:0;}
        .evt03 td:nth-child(1) {text-align:center;}
        .evt03 td:nth-child(4) {text-align:center;}
        .evt03 td:last-child {border:0; text-align:center}
        .evt03 td p {font-size:12px}
        .evt03 td span {font-weight:normal}
        .evt03 a {padding:10px 15px; color:#fff; background:#6846A1; font-size:14px; display:block; border-radius:20px;}
        .evt03 a:hover {background:#000;}
        .evt03 a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0} 
        .evt03 p {text-align:right; color:#55509c; font-weight:bold; margin-top:20px; font-size:14px}       
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evttop">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1621_top.jpg" alt="기본이론 종합반" usemap="#Map1592a" border="0" />
            <map name="Map1592a" id="Map1592a">
                <area shape="rect" coords="258,701,862,818" href="#apply" onfocus='this.blur()' />
            </map>
        </div>     

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1621_01.jpg" alt="어떤 커리큘럼이 좋을까"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1621_02.jpg" alt="기본이론은 신광은경찰"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1621_03.jpg" alt="혜택은 특별"/>
            <div> 
            <table border="0" cellspacing="0" cellpadding="0">
                    <col width="18%" />
                    <col width="" />
                    <col width="24%" />
                    <col width="12%" />
                    <col width="" />
                    <thead>
                        <tr>
                            <th colspan="2">강의명</th>
                            <th>개강일</th>                        
                            <th>동영상</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>형법 김원욱</td>
                            <td>형법 마무리 특강</td>
                            <td>5.4(월)~5(화) 14:00</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164360" target="_blank">수강신청</a></td>                  
                        </tr>
                        <tr>
                            <td>한국사 오태진</td>
                            <td>한국사 마무리 특강</td>
                            <td>5.6(수) 14:00</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164369" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>영어 하승민</td>
                            <td>영어 마무리 특강</td>
                            <td>5.8(금) 14:00</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164373" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>한국사 원유철</td>
                            <td>한국사 마무리 특강</td>
                            <td>5.11(월) 14:00</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164367" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>형소법 신광은</td>
                            <td>형소법 마무리 특강</td>
                            <td>5.12(화)~13(수) 14:00</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164352" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td>경찰학 장정훈</td>
                            <td>경찰학 마무리 특강</td>
                            <td>5.14(목)~15(금) 14:00</td>
                            <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164358" target="_blank">수강신청</a></td>
                        </tr>    
                        <tr>
                            <td>온라인 종합반</td>
                            <td colspan="2">2020 1차대비 마무리 특강 종합반</td>
                            <td><a href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1010" target="_blank">수강신청</a></td>
                        </tr>              
                    </tbody>
                </table>
                <p>* 종합반 구매시 한국사 원/오 택1</p>      
            </div>  
        </div>
    </div>
    <!-- End Container -->


    <script type="text/javascript"> 

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop