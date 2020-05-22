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

        .sky {position:fixed; top:200px;right:0;z-index:10;}
        .sky li{padding-bottom:10px;}

        .evtTop00 {background:#404040}

        .evtTop {background:#00323b url(https://static.willbes.net/public/images/promotion/2020/05/1644_top_bg.jpg) no-repeat center top;}

        .evt01,.evt02,.evt03 {background:#fff}
     
        .evt04 {background:#00797f url(https://static.willbes.net/public/images/promotion/2020/05/1644_04_bg.jpg) no-repeat center top;}        

        .wb_05,.wb_06 {background:#dcdcdc;}
        .wb_05_table {width:1000px; margin:0 auto;border:2px solid #00797f;}
        .wb_05_table div {margin-bottom:80px; font-size:40px;}
        .wb_05_table div span {color:#c43f90; border-bottom:3px solid #fff2fa}
        .wb_05_table table {background:#fff; width:90%;margin:0 auto;} 
        .wb_05_table tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .wb_05_table tr.st01 {background:#e3e4e5}
        .wb_05_table tr:hover {background:#ff7b77;}
        .wb_05_table th,
        .wb_05_table td {padding:15px 20px; font-size:16px; font-weight:500;}
        .wb_05_table th {background:#a4ede5; color:#000;border-right:1px solid #000;}
        .wb_05_table th:last-child{border:0;}
        .wb_05_table td:nth-child(1) {text-align:center;border-right:1px solid #000;}
        .wb_05_table td:nth-child(2) {border-right:1px solid #000;}
        .wb_05_table td:nth-child(3) {border-right:1px solid #000;}
        .wb_05_table td:last-child {border:0}
        .wb_05_table td p {font-size:12px}
        .wb_05_table a {padding:10px 15px; color:#fff; background:#00797f; font-size:14px; display:block; border-radius:20px;}
        .wb_05_table a:hover {background:#000;}
        .wb_05_table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
        .wb_05_table{background:#fff;}
        .wb_06{padding-bottom:150px;}
        .lecture_box{content:"";display:block;clear:both;}
        .lecture_box .season{float:left;font-size:17px;width:125px;height:50px;line-height:50px;
                            background:#ff4b45;color:#fff;border-radius:50px;font-weight:700;margin-left:100px;margin:50px;}
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
       

        <ul class="sky">
            <li>
                <a href="#event">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_sky01.png" alt="6월 심화기출" >
                </a>
            </li>
            <li>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042" target="_blank"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_sky02.png" alt="3개월 필합 패스" >
                </a>
            </li>       
            <li>
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_sky03.png" alt="3개월 슈퍼 패스" >
                </a>
            </li>              
        </ul>       
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
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
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_top.jpg" title="프리미엄 심화기출">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_01.jpg" title="더 늦기전에 준비">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_02.jpg" title="전문교수진">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_03.jpg" title="지금부터 준비">
        </div>

        <div class="evtCtnsBox evt04" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_04.jpg" usemap="#Map1644a" title="6월 심화기출 개강 이벤트" border="0">
            <map name="Map1644a" id="Map1644a">
                <area shape="rect" coords="621,510,871,625" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042" target="_blank" />
                <area shape="rect" coords="205,1036,431,1101" href="#careful" />
                <area shape="rect" coords="698,1035,917,1101" href="#careful" />
            </map>
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_05.jpg" title="심화기출 단과반">            
       
            <div class="evtCtnsBox wb_05_table">           
                <div class="lecture_box">              
                    <p class="season">NEW</p>
                    <h3 class="title">2020년 2차 합격대비 심화기출 단과강의</h3>
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
                                <td>2020 2차대비 신광은 형사소송법 심화기출</td>
                                <td>6.2(화)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1057" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>영어 김현정</td>
                                <td>2020 2차대비 김현정 영어심화기출</td>
                                <td>6.2(화)</td>                       
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1054" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>수사 신광은</td>
                                <td>2020 2차대비 신광은 수사 심화기출</td>
                                <td>6.2(화)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1042&subject_idx=1059" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 원유철</td>
                                <td>2020 2차대비 원유철 한국사 심화기출</td>
                                <td>6.4(목)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1055" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 오태진</td>
                                <td>2020 2차대비 오태진 한국사 심화기출</td>
                                <td>6.4(목)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1055" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>행정법 장정훈</td>
                                <td>2020 2차대비 장정훈 행정법 심화기출</td>
                                <td>6.4(목)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1042&subject_idx=1060" target="_blank">수강신청</a></td>
                            </tr>            
                            <tr>
                                <td>경찰학 장정훈</td>
                                <td>2020 2차대비 경찰학개론 심화기출</td>
                                <td>6.12(금)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1058" target="_blank">수강신청</a></td>
                            </tr>          
                            <tr>
                                <td>김원욱 형법</td>
                                <td>2020 2차대비 김원욱 형법 심화기출</td>
                                <td>6.22(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042&subject_idx=1056" target="_blank">수강신청</a></td>
                            </tr>               
                        </tbody>
                    </table>        
                </div>                                  
            </div>   
        
        </div> 

         <div class="evtCtnsBox wb_06">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1644_06.jpg" title="심화기출 종합반">            
       
            <div class="evtCtnsBox wb_05_table">           
                <div class="lecture_box">              
                    <p class="season">NEW</p>
                    <h3 class="title">2020년 2차 합격대비 심화기출 종합반</h3>
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
                                <td>2020년 2차 경찰시험대비 심화기출 종합반(史)오태진</td>
                                <td>6.2(화)</td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>2020년 2차 경찰시험대비 심화기출 종합반(史)원유철</td>
                                <td>6.2(화)</td>                       
                                <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>2020년 2차 경찰시험대비 심화기출 종합반 &gt; 경행경채</td>
                                <td>6.2(화)</td>                      
                                <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1042" target="_blank">수강신청</a></td>
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
                    <dt>[사전접수 이벤트]</dt>
                    <dl>사전접수 할인 : <span class="original">690,000원</span> > 480,000원 <span class="discount">(30%할인이벤트)</span></dl>  
                    <dl>조기마감될수 있습니다.</dl>                    
                </dd>     
                <dd>
                    <dt>[재등록 이벤트]</dt>
                    <dl>대상자 : 2019년 이후 심화종합반 실강 수강이력이 있는 수강생수강이력이 있는 수강생에게 50,000원 할인 쿠폰 발급됩니다.</dl>
                    <dl>쿠폰 사용방법 : 심화종합반 바로 결제 > 쿠폰적용 > 50,000원 할인쿠폰 사용(할인쿠폰이 발급되지 않은 경우 학원으로 문의 바랍니다.)</dl>
                    <dl>발급된 할인쿠폰은 본인만 사용 가능하며, 유효기간 내에 심화과정종합반에 한하여 사용 가능합니다.</dl>
                </dd>
                <dd>
                    <dt>[환승이벤트]</dt>
                    <dl>심화기출 50% 할인 : <span class="original">690,000원</span> > 345,000원</dl>
                    <dl> 대상자 : 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있고,<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2019년 이후 자사 실강 수강이력이 없는 타학원수강생 수강이력을 반드시 증명할 수 있어야 합니다.
                    </dl>
                </dd>
                <dd>
                    <dt><span style="vertical-align:text-bottom">*</span> 학원사정으로 이벤트 기간 및 금액변동이 있을 수 있습니다.</dt>
                    <dt><span style="vertical-align:text-bottom">*</span> 심화기출  수강문의 : 1544-0336(노량진)</dt>
                </dd>
            </div>
        </div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        /*tab*/
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                //$active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });
        
          /*디데이카운트다운*/
          $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop