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
        .evtContent span {vertical-align:top;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative}

        /************************************************************/

        .sky {position:fixed; top:200px;right:10px;z-index:10;}

        .evtTop00 {background:#404040}

        .evtTop {background:#f1f1f1 url(https://static.willbes.net/public/images/promotion/2020/03/1560_top_bg.jpg) no-repeat center top;}

        .evt01,.evt02,.evt03 {background:#fff}

        .evt04 {background:#5b467c}

        .evt05 {background:#e2e2e2;padding-bottom:100px;}
        .evt05 .apply_kind {font-size:30px;font-weight:bold;margin:75px 0;}
        .evt05 div span {color:#6846A1;}
        .evt05 p {font-size:14px}
        .evt05 .popup {font-size:20px; width:200px; line-height:1.5; background:#000; color:#fff; display:block; border-radius:20px;
        position:absolute; left:50%; margin-left:300px; top:100px; padding:10px 0; 
        }
        .evt05 .popup span {color:#6846A1}
        .evt05 table {background:#fff; width:1000px; margin:0 auto; background:#fff;} 
        .evt05 tr {border-bottom:1px solid #ccc}        
        .evt05 tr.st01 {background:#ececec}
        .evt05 tr:hover {background:#fdf5e4}
        .evt05 th,
        .evt05 td {padding:15px 20px; font-size:16px; font-weight:500;}
        .evt05 th {background:#5f5f5f; color:#fff}
        .evt05 td:nth-child(1) {text-align:center}
        .evt05 td:nth-child(2) {text-align:center;}
        .evt05 td:nth-child(3) {color:#6846A1}
        .evt05 td:last-child {border:0}
        .evt05 td p {font-size:12px}
        .evt05 a {padding:10px 15px; color:#fff; background:#6846A1; font-size:14px; display:block; border-radius:20px;}
        .evt05 a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .evt05 a:hover {background:#000; color:#fff;}
        .evt05 a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}

        .text_bold{font-weight:bold;}
        
        .wb_ctsInfo {background:#2b2b2b; padding:100px 0}  
        .wb_ctsInfo div {
            width:980px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;
            font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#f97f7a} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
        }
        .wb_ctsInfo div dl:before{
            background: #f97f7a none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}
        
    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 

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

        <div class="evtCtnsBox evt04" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_04.jpg" usemap="#Map1560a" title="4월 심화과정 개강 이벤트" border="0">
            <map name="Map1560a" id="Map1560a">
                <area shape="rect" coords="412,480,527,542" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" />
                <area shape="rect" coords="812,481,927,541" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041" target="_blank" />
                <area shape="rect" coords="237,980,455,1048" href="#to_go" />
                <area shape="rect" coords="663,979,881,1050" href="#to_go" />
            </map>
        </div>

        <div class="evtCtnsBox evt05">        
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_05.jpg" title="프리미엄 심화과정">
            <div class="apply_kind">
                <span><span style=color:red;>NEW</span> 2020년 2차 합격대비 심화과정 강의 ></span>
            </div>      

            <table cellspacing="0" cellpadding="0">
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
                        <td><span class="text_bold">형소법 신광은</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2020 2차대비 신광은 형소법 심화이론</td>
                        <td>4/13(월)</td>
                        <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1057" target="_blank">수강신청</a></td>
                    </tr>    
                    <tr>
                        <td><span class="text_bold">형법 김원욱</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2020 2차대비 김원욱 형법 심화이론</td>
                        <td>5/4(월)</td>
                        <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1056" target="_blank">수강신청</a></td>
                    </tr>   
                    <tr>
                        <td><span class="text_bold">영어 하승민</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2020 2차대비 하승민 영어 심화이론</td>
                        <td>5/4(월)</td>
                        <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1054" target="_blank">수강신청</a></td>
                    </tr>   
                    <tr>
                        <td><span class="text_bold">행정법 장정훈</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2020 2차대비 장정훈 행정법 심화기출</td>
                        <td>5/7(목)</td>
                        <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041&subject_idx=1060" target="_blank">수강신청</a></td>
                    </tr>   
                    <tr>
                        <td><span class="text_bold">수사 신광은</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2020 2차대비 신광은 수사 심화이론</td>
                        <td>5/11(월)</td>
                        <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041&subject_idx=1059" target="_blank">수강신청</a></td>
                    </tr>   
                    <tr>
                        <td><span class="text_bold">한국사 오태진</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2020 2차대비 오태진 한국사 심화이론</td>
                        <td>5/25(월)</td>
                        <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055" target="_blank">수강신청</a></td>
                    </tr>        
                    <tr>
                        <td><span class="text_bold">한국사 원유철</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2020 2차대비 원유철 한국사 심화이론</td>
                        <td>5/25(월)</td>
                        <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055" target="_blank">수강신청</a></td>
                    </tr>        
                    <tr>
                        <td><span class="text_bold">경찰학 장정훈</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2020 2차대비 장정훈 경찰학 심화이론</td>
                        <td>6/4(목)</td>
                        <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1058" target="_blank">수강신청</a></td>
                    </tr>                   
                </tbody>
            </table>
            <div class="apply_kind" id="to_go">
                <span><span style=color:red;>NEW</span> 2020년 합격대비 심화과정 종합반 - 일반경찰 ></span>
            </div>                     
            
            <table cellspacing="0" cellpadding="0">
                <col width="60%" />
                <col width="20%" />               
                <col width="20%" />
                <thead>
                    <tr>
                        <th>강의명</th>
                        <th>개강일</th>
                        <th>학원</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2020 경찰시험대비 심화과정 종합반( 史 오태진)</td>
                        <td>4/13(월)</td>
                        <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                    </tr>    
                    <tr>
                        <td>2020 경찰시험대비 심화과정 종합반( 史 원유철)</td>
                        <td>4/13(월)</td>
                        <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                    </tr>                  
                </tbody>
            </table> 

            <div class="apply_kind">
                <span><span style=color:red;>NEW</span> 2020년 합격대비 심화과정 종합반 - 경행경채 ></span>
            </div> 

             <table cellspacing="0" cellpadding="0">
                <col width="60%" />
                <col width="20%" />               
                <col width="20%" />
                <thead>
                    <tr>
                        <th>강의명</th>
                        <th>개강일</th>
                        <th>학원</th>
                    </tr>
                </thead>
                    <tr>
                        <td>2020 경찰시험대비 심화과정 종합반</td>
                        <td>4/13(월)</td>
                        <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                    </tr>    
                </tbody>
            </table>      

        </div>

        <div class="wb_ctsInfo NGR" id="ctsInfo">
            <div>
                <h3 class="NGEB">유의사항</h3>
                <dd>
                    <dt>사전접수 이벤트 ></dt>
                    <dl>3.5(목) 18시까지 접수 시 35%할인</dl>                   
                </dd>                
                <dd>
                    <dt>재등록 이벤트 ></dt>
                    <dl>대상자 : 2019년 이후 심화종합반 실강 수강이력이 있는 수강생</dl>
                    <dl>수강이력이 있는 수강생에게 50,000원 추가할인 쿠폰 발급됩니다.</dl>
                    <dl>쿠폰 사용방법 : 심화종합반 바로 결제 > 쿠폰적용 > 50,000원 추가할인쿠폰 사용<br>
                    (할인쿠폰이 발급되지 않은 경우 학원으로 문의 바랍니다.)</dl>
                    <dl>발급된 할인쿠폰은 본인만 사용 가능하며, 유효기간 내에 심화과정종합반에 한하여 사용 가능합니다.</dl>
                </dd>
                <dd>
                    <dt>환승 이벤트 ></dt>
                    <dl>대상자 : 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있고, 최근 1년간 자사 실강 수강이력기 없는 수강생</dl>
                    <dl>타학원 수강이력을 반드시 증명할 수 있어야 합니다.</dl>
                </dd>
                <dd>
                    <dt><span style="vertical-align:text-bottom">*</span> 심화과정 수강문의 1544-0336</dt>
                </dd>
            </div>
        </div>
	</div>
    <!-- End Container -->

@stop