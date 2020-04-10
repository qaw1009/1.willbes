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
            background:#E2E2E2;
        }
        .evtContent span {vertical-align:top;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative}

        /************************************************************/

        .sky {position:fixed; top:200px;right:10px;z-index:10;}

        .evtTop00 {background:#404040}

        .evtTop {background:#f1f1f1 url(https://static.willbes.net/public/images/promotion/2020/03/1560_top_bg.jpg) no-repeat center top;}

        .evt01,
        .evt02,
        .evt03 {background:#fff;}

        .wb_05 {background:#e2e2e2;padding-bottom:100px;}
        .wb_05_table {width:1000px; margin:0 auto;}
        .wb_05_table div {margin-bottom:80px; font-size:40px; padding-bottom:50px}
        .wb_05_table div span {color:#c43f90; border-bottom:3px solid #fff2fa}
        .wb_05_table table {background:#fff; width:90%;margin:0 auto;} 
        .wb_05_table tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .wb_05_table tr.st01 {background:#e3e4e5}
        .wb_05_table tr:hover {background:#f7e9c3;}
        .wb_05_table th,
        .wb_05_table td {padding:15px 20px; font-size:16px; font-weight:500;}
        .wb_05_table th {background:#e4e4e4; color:#000;border-right:1px solid #000;}
        .wb_05_table th:last-child{border:0;}
        .wb_05_table td:nth-child(1) {text-align:center;border-right:1px solid #000;}
        .wb_05_table td:nth-child(2) {border-right:1px solid #000;}
        .wb_05_table td:nth-child(3) {border-right:1px solid #000;}
        .wb_05_table td:last-child {border:0}
        .wb_05_table td p {font-size:12px}
        .wb_05_table a {padding:10px 15px; color:#fff; background:#6846A1; font-size:14px; display:block; border-radius:20px;}
        .wb_05_table a:hover {background:#000;}
        .wb_05_table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
        .wb_05_table{background:#fff;}
        .lecture_box{content:"";display:block;clear:both;}
        .lecture_box .season{float:left;font-size:17px;width:70px;height:25px;line-height:25px;
                            background:#FFB200;color:#fff;border-radius:13px;font-weight:700;margin-left:100px;margin:50px;}
        .lecture_box .title{float:left;font-size:27px;color:#1f2327;font-weight:700;margin:50px -40px;}
       

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:28px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#424ac7}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#424ac7}
        to{color:#000}
        } 
        
    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>사전접수 이벤트<br>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} 까지</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td>남았습니다!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="sky">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_sky.png" alt="스카이베너" >
            </a>   
        </div>       
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_top.jpg" title="프리미엄 심화과정">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_01.jpg" title="더 늦기전에 준비">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_02.jpg" title="전문교수진">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_03.jpg" title="지금부터 준비">
        </div>

        <div class="evtCtnsBox wb_05" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_05.jpg" title="프리미엄 심화과정">            
       
            <div class="evtCtnsBox wb_05_table">           
                <div class="lecture_box">              
                    <p class="season">NEW</p>
                    <h3 class="title">2020년 2차 합격대비 심화이론 강의</h3>
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
                                <th colspan="2">온라인</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>형소법 신광은</td>
                                <td>2020 2차대비 신광은 형소법 심화이론</td>
                                <td>4/20(월)</td>                        
                                <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163704" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>영어 하승민</td>
                                <td>2020 2차대비 하승민 영어 심화이론</td>
                                <td>4/20(월)</td>                       
                                <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163708" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 오태진</td>
                                <td>2020 2차대비 오태진 한국사 심화이론</td>
                                <td>4/23(목)</td>                      
                                <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163710" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 원유철</td>
                                <td>2020 2차대비 원유철 한국사 심화이론</td>
                                <td>4/23(목)</td>                      
                                <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163712" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>형법 김원욱</td>
                                <td>2020 2차대비 김원욱 형법 심화이론</td>
                                <td>5/6(수)</td>                        
                                <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163714" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>경찰학 장정훈</td>
                                <td>2020 2차대비 장정훈 경찰학 심화이론</td>
                                <td>5/25(월)</td>                      
                                <td><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163719" target="_blank">수강신청</a></td>
                            </tr>                 
                        </tbody>
                    </table>        
                </div>                                  
            </div>    
            <div class="evtCtnsBox wb_05_table">           
                <div class="lecture_box">              
                    <p class="season">NEW</p>
                    <h3 class="title">2020년 합격대비 심화이론 종합반 - 일반경찰</h3>
                </div>     
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="" />
                        <col width="20%" />                        
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>개강일</th>                        
                                <th>온라인</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2020 경찰시험대비 심화이론 종합반( 史 오태진)</td>
                                <td>4/20(월)</td>                        
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/163844" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>2020 경찰시험대비 심화이론 종합반( 史 원유철)</td>
                                <td>4/20(월)</td>                        
                                <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/163839" target="_blank">수강신청</a></td>
                            </tr>                                                   
                        </tbody>
                    </table>        
                </div>                                  
            </div>   
            <div class="evtCtnsBox wb_05_table">           
                <div class="lecture_box">              
                    <p class="season">NEW</p>
                    <h3 class="title">2020년 합격대비 심화이론 종합반 - 경행경채</h3>
                </div>     
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="" />
                        <col width="20%" />                        
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>개강일</th>                        
                                <th>온라인</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2020 경찰시험대비 심화과정 종합반</td>
                                <td>4/20(월)</td>                        
                                <td><a href="https://police.willbes.net/package/index/cate/3002/pack/648001" target="_blank">수강신청</a></td>
                            </tr>                                                                     
                        </tbody>
                    </table>        
                </div>                                  
            </div>   
        </div>
        
	</div>
    <!-- End Container -->

    <script type="text/javascript">     
        
          /*디데이카운트다운*/
          $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop