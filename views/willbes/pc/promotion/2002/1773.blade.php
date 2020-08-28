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
            background:#dcdcdc;
        }
        .evtContent span {vertical-align:top;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative}

        /************************************************************/

        .sky li:first-child {position:fixed; top:200px;right:10px;z-index:10;}
        .sky li:last-child {position:fixed; top:400px;right:15px;z-index:10;}

        .evtTop00 {background:#0a0a0a;}

        .evtTop {background:#281276 url(https://static.willbes.net/public/images/promotion/2020/08/1773_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#8D85FF;}

        .evt02,.evt03,.evt04 {background:#fff}

        .evt05 {background:#281281;}     

        .wb_05,.wb_06 {background:#EDEDED;}
        .wb_05_table {width:1000px; margin:0 auto;border:2px solid #4C3AB0;}
        .wb_05_table div {margin-bottom:80px; font-size:40px;}
        .wb_05_table div span {color:#c43f90; border-bottom:3px solid #fff2fa}
        .wb_05_table table {background:#fff; width:90%;margin:0 auto;} 
        .wb_05_table tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .wb_05_table tr.st01 {background:#e3e4e5}
        .wb_05_table tr:hover {background:#ff7b77;}
        .wb_05_table th,
        .wb_05_table td {padding:15px 20px; font-size:16px; font-weight:500;}
        .wb_05_table th {background:#55FCC5; color:#000;border-right:1px solid #000;}
        .wb_05_table th:last-child{border:0;}
        .wb_05_table td:nth-child(1) {text-align:center;border-right:1px solid #000;}
        .wb_05_table td:nth-child(2) {border-right:1px solid #000;}
        .wb_05_table td:nth-child(3) {border-right:1px solid #000;}
        .wb_05_table td:last-child {border:0}
        .wb_05_table td p {font-size:12px}
        .wb_05_table a {padding:10px 15px; color:#000; background:#F3FC53; font-size:14px; display:block; border-radius:20px;}
        .wb_05_table a:hover {background:#000;color:#fff;}
        .wb_05_table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
        .wb_05_table{background:#fff;}
        .wb_06{padding:100px 0;}
        .lecture_box{content:"";display:block;clear:both;}
        .lecture_box .season{float:left;font-size:17px;width:125px;height:50px;line-height:50px;
                            background:#4B3AAC;color:#fff;border-radius:50px;font-weight:700;margin-left:100px;margin:50px;}
        .lecture_box .title{float:left;font-size:25px;color:#1f2327;font-weight:700;margin:60px -25px;}

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

        .wb_ctsInfo .original {text-decoration:line-through;} 
        .wb_ctsInfo .discount {color:#e80000;} 

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">        

        <ul class="sky">
            <li>
                <a href="#event">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_sky01.png" alt="할인쿠폰 바로보기" >
                </a>
            </li> 
            <li>
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1770" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_sky02.png" alt="5개월 패스 바로보기" >
                </a>
            </li>               
        </ul>       
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_top.jpg" title="심화 이론.기출 패키지">        
        </div>

        <div class="evtCtnsBox evt01" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_01.jpg" usemap="#Map1773a" title="쿠폰 이벤트" border="0">
            <map name="Map1773a" id="Map1773a">
                <area shape="rect" coords="232,757,551,893" href="javascript:giveCheck();" alt="이벤트 쿠폰받기">
                <area shape="rect" coords="567,755,884,894" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_02.jpg" title="더 늦기전에 준비">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_03.jpg" title="전문 교수진">
        </div>
        
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_04.jpg" title="심화기출 스텝">
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_05.jpg" usemap="#Map1773b" title="6월 심화기출 개강 이벤트" border="0">
            <map name="Map1773b" id="Map1773b">
                <area shape="rect" coords="621,423,863,531" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" />
                <area shape="rect" coords="209,955,433,1028" href="#careful" />
                <area shape="rect" coords="702,956,919,1027" href="#careful" />
            </map>
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_06.jpg" title="심화기출 단과반">            
       
            <div class="evtCtnsBox wb_05_table">           
                <div class="lecture_box">              
                    <p class="season">NEW</p>
                    <h3 class="title">2021년 1차 합격대비 심화과정 단과 </h3>
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
                                <td>2021년 1차대비  신광은 심화 형소법</td>
                                <td>10/5(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171319" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>영어 하승민</td>
                                <td>2021년 1차대비 하승민 심화 영어</td>
                                <td>10/19(월)</td>                       
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171168" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>형법 김원욱</td>
                                <td>2021년 1차대비 김원욱 심화 형법</td>
                                <td>10/26(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171169" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 오태진</td>
                                <td>2021년 1차대비 오태진 심화 한국사</td>
                                <td>11/16(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171246" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 원유철</td>
                                <td>2021년 1차대비 원유철 심화 한국사</td>
                                <td>11/16(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171170" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>경찰학 장정훈</td>
                                <td>2021년 1차대비 장정훈 심화 경찰학</td>
                                <td>12/3(목)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171312" target="_blank">수강신청</a></td>
                            </tr>             
                        </tbody>
                    </table>        
                </div>                                  
            </div>   
        
        </div> 

         <div class="evtCtnsBox wb_06">         
       
            <div class="evtCtnsBox wb_05_table">           
                <div class="lecture_box">              
                    <p class="season">NEW</p>
                    <h3 class="title">2021년 합격대비 심화과정 종합반</h3>
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
                                <td>2021 경찰시험대비 심화이론+기출 패키지( 史 오태진)</td>
                                <td>10/5(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/171331" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>2021 경찰시험대비 심화이론+기출 패키지( 史 원유철)</td>
                                <td>10/5(월)</td>                       
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/171323" target="_blank">수강신청</a></td>
                            </tr>
                        </tbody>
                    </table>        
                </div>                                  
            </div>   
        
        </div>                       

        <div class="wb_ctsInfo NGR" id="careful">
            <div>
                <h3 class="NGEB">유의사항</h3>
                <dd>
                    <dt>사전접수 이벤트 ></dt>
                    <dl>9.7(월) 까지  누구나  50,000원 할인쿠폰 발급진행</span></dl>                   
                </dd>     
                <dd>
                    <dt>재등록 이벤트 ></dt>
                    <dl>대상자 : 2019년 9월 이후 심화종합반 실강 수강이력이 있는 수강생</dl>
                    <dl>수강이력이 있는 수강생에게 10% 할인쿠폰 발급됩니다.(중복할인 불가)</dl>
                    <dl>쿠폰 사용방법 : 심화종합반 바로 결제 > 쿠폰적용 > 10%할인쿠폰 사용<br/>
                        (할인쿠폰이 발급되지 않은 경우 학원으로 문의 바랍니다.)
                    </dl>
                    <dl>발급된 할인쿠폰은 본인만 사용 가능하며, 유효기간 내에 심화과정종합반에 한하여 사용 가능합니다.</dl>
                </dd>
                <dd>
                    <dt>환승 이벤트 ></dt>
                    <dl>대상자 : 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상있는 수험생</dl>
                    <dl>2020년 이후 자사 실강 수강이력이 없는 수험생</dl>
                    <dl>타학원 수강이력을 반드시 증명할 수 있어야 합니다.</dl>
                </dd>
                <dd>
                    <dt><span style="vertical-align:text-bottom">*</span>학원 심화과정 수강문의 1544-0336</dt>
                </dd>
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