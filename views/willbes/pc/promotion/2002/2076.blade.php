@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
        }
        .evtContent span {vertical-align:middle;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .evt00 {background:#0a0a0a}  

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2076_top_bg.jpg) no-repeat center top;}
     
        .evt02 {background:#e1e1e1}
        .evt03 {background:#f3f3f3}

        .evt05 {background:#58489b; padding-bottom:100px}
        .evt05_txt {color:#fff; margin-bottom:50px}
        .evt05_txt div {margin-bottom:20px}
        .evt05_txt span {border:2px solid #fff; border-radius:60px; padding:10px 20px; font-size:24px; display:inline-block}
        .evt05_table {width:1000px; margin:0 auto; padding:50px; background:#fff;}        
        .evt05_table .title {font-size:30px; color:#1f2327; text-align:left; margin-bottom:30px}
        .evt05_table .title  span {color:#58489b; border-bottom:3px solid #9e96c2}
        .evt05_table tr {border-bottom:1px solid #ccc;border-top:1px solid #ccc;}        
        .evt05_table tr.st01 {background:#e3e4e5}
        .evt05_table tr:hover {background:#f4f2fe;}
        .evt05_table th,
        .evt05_table td {padding:15px 20px; font-size:16px; font-weight:500;}
        .evt05_table th {background:#58489b; color:#fff ;border-right:1px solid #ccc;}
        .evt05_table th:last-child{border:0;}
        .evt05_table td:nth-child(1) {text-align:center;border-right:1px solid #ccc;}
        .evt05_table td:nth-child(2) {border-right:1px solid #ccc;}
        .evt05_table td:nth-child(3) {border-right:1px solid #ccc;}
        .evt05_table td:last-child {border:0}
        .evt05_table td p {font-size:12px}
        .evt05_table a {padding:10px 15px; color:#fff; background:#9081ce; font-size:14px; display:block; border-radius:20px;}
        .evt05_table a:hover {background:#000;}
        .evt05_table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
        .evt05_table{background:#fff;}        
       

        .wb_ctsInfo {background:#fff; padding:100px 0}  
        .wb_ctsInfo div {
            width:980px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;
            font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#000;font-weight:bold;} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; color:#000;font-weight:bold;font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;}  
        .wb_ctsInfo div dd {margin-bottom:30px;}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
            color:#000;
            font-weight:bold;
        }
        .wb_ctsInfo div dl:before{
            background: #000 none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px;
            color:#000;
            font-weight:bold;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}

        .wb_ctsInfo .original {text-decoration:line-through; color:#666} 
        .wb_ctsInfo .discount {color:#e80000;} 

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

    <div class="p_re evtContent NSK" id="evtContainer">  
            
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

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
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2076_top.jpg" title="프리미엄 심화기출">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2076_01.jpg" title="더 늦기전에 준비">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2076_02.jpg" title="전문교수진">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2076_03.jpg" title="지금부터 준비">
        </div>

        <div class="evtCtnsBox evt04">           
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2076_04.jpg" title="샤르드골 명언">        
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2076_05.jpg" title="프리미엄 심화과정">
            <div class="evt05_txt">
                <div>*행정법 영상반 – 최신개정부분 실강진행 예정(일정 추후공지)</div>
                <span>일반경찰</span> <span>경행경채</span>
            </div>                   
       
            <div class="evt05_table">     
                <div class="title NSK-Black">              
                    <span>NEW</span> 2021년 2차 합격대비 심화과정 단과
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
                                <td>형소법 신광은</td>
                                <td>2021년 2차대비  신광은 심화 형소법</td>
                                <td>3/15(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/178767" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>영어 하승민</td>
                                <td>2021년 2차대비 하승민 심화 영어</td>
                                <td>3/29(월)</td>                       
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/178811" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>형법 김원욱</td>
                                <td>2021년 2차대비 김원욱 심화형법</td>
                                <td>4/5(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/178772" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>수사 신광은</td>
                                <td>2021년 2차대비 신광은 심화 수사</td>
                                <td>4/21(수)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3011/prod-code/178774" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>경찰학 장정훈</td>
                                <td>2021년 2차대비 장정훈 심화 경찰학</td>
                                <td>4/26(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/178773" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 오태진</td>
                                <td>2021년 2차대비 오태진 심화 한국사</td>
                                <td>5/11(화)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/178771" target="_blank">수강신청</a></td>
                            </tr>            
                            <tr>
                                <td>한국사 원유철</td>
                                <td>2021년 2차대비 원유철 심화 한국사</td>
                                <td>5/10(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/178770" target="_blank">수강신청</a></td>
                            </tr>          
                            <tr>
                                <td>행정법 장정훈</td>
                                <td>2021년 2차대비 장정훈 심화 행정법(영상반 20.6)</td>
                                <td>5/10(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3011/prod-code/178775" target="_blank">수강신청</a></td>
                            </tr>               
                        </tbody>
                    </table>        
                </div>                                  
            </div>       
       
            <div class="evt05_table" id="all_lec">           
                <div class="title NSK-Black">              
                    <span>NEW</span> 2021년 2차 합격대비 심화과정 종합반
                </div>     
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="70%" />
                        <col width="15%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>개강일</th>                        
                                <th>학원</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2021년 2차 경찰시험대비 심화이론+기출 패키지(史 오태진)</td>
                                <td>3/15(월) </td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/178813" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>2021년 2차 경찰시험대비 심화이론+기출 패키지(史 원유철)</td>
                                <td>3/15(월)</td>                       
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/178812" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>2021년 2차 경찰시험대비 심화이론+기출 패키지(경행경채)</td>
                                <td>3/15(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/178814" target="_blank">수강신청</a></td>
                            </tr>
                        </tbody>
                    </table>        
                </div>                                  
            </div>   
        
        </div>                       

        <div class="wb_ctsInfo" id="careful">
            <div>
                <h3 class="NSK-Black">유의사항</h3>
                <dd>
                    <dt>[사전접수 10%할인이벤트]</dt>
                    <dl>일반경찰 : <span class="original">750,000원</span> > 675,000원</dl>
                    <dl>경행경채 : <span class="original">680,000원</span> > 612,000원</dl>
                    <dl>사전접수 이벤트는 조기 마감될수 있습니다.</dl>                    
                </dd>               
                <dd>
                    <dt>* 학원 심화과정 수강문의 1544-0336</dt>
                </dd>
            </div>
        </div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">       
          /*디데이카운트다운*/
          $(document).ready(function() {
              dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop