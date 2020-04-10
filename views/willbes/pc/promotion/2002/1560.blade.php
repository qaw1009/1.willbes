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
        .evt03,
        .evt04Tab {background:#fff}
        .evt04Tab ul {width:900px; margin:0 auto}
        .evt04Tab li { display:inline; float:left; width:50%}
        .evt04Tab li a {display:block; height:70px; line-height:70px; text-align:center; color:#5b467c; border:2px solid #5b467c; border-bottom:0; font-size:24px}
        .evt04Tab li a.active {background:#5b467c; color:#fff}
        .evt04Tab:after {content:""; display:block; clear:both}

        .evt04 {background:#5b467c}        

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

        <div class="evtCtnsBox evt04Tab">
            <ul class="tabs NGEB">
                <li><a href="#tab01" class="active">일반경찰</a></li>
                <li><a href="#tab02">경행경채</a></li>
            </ul>
        </div>

        <div class="evtCtnsBox evt04" id="apply">
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_04.jpg" usemap="#Map1560a" title="4월 심화이론 일반경찰" border="0">
                <map name="Map1560a" id="Map1560a">
                    <area shape="rect" coords="666,389,855,480" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="일반경찰" />
                    <area shape="rect" coords="237,903,455,971" href="#ctsInfo" />
                    <area shape="rect" coords="663,901,881,972" href="#ctsInfo" />
                </map>
            </div>
            <div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1560_04_1.jpg" usemap="#Map1560aa" title="4월 심화이론 경행경채" border="0">
                <map name="Map1560aa" id="Map1560aa">
                    <area shape="rect" coords="420,421,535,483" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041" target="_blank" alt="경행경채 3법" />
                    <area shape="rect" coords="800,421,915,481" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041" target="_blank" />
                    <area shape="rect" coords="237,903,455,971" href="#ctsInfo" />
                    <area shape="rect" coords="663,902,881,973" href="#ctsInfo" />
                </map>
            </div>
        </div>


        <div class="evtCtnsBox wb_05">
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
                                <th colspan="2">학원</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>형소법 신광은</td>
                                <td>2020 2차대비 신광은 형소법 심화이론</td>
                                <td>4/20(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1057" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>영어 하승민</td>
                                <td>2020 2차대비 하승민 영어 심화이론</td>
                                <td>4/20(월)</td>                       
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1054" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 오태진</td>
                                <td>2020 2차대비 오태진 한국사 심화이론</td>
                                <td>4/23(목)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 원유철</td>
                                <td>2020 2차대비 원유철 한국사 심화이론</td>
                                <td>4/23(목)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>형법 김원욱</td>
                                <td>2020 2차대비 김원욱 형법 심화이론</td>
                                <td>5/6(수)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1056" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>경찰학 장정훈</td>
                                <td>2020 2차대비 장정훈 경찰학 심화이론</td>
                                <td>5/25(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1058" target="_blank">수강신청</a></td>
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
                                <th>학원</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2020 경찰시험대비 심화이론 종합반( 史 오태진)</td>
                                <td>4/20(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/162436" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>2020 경찰시험대비 심화이론 종합반( 史 원유철)</td>
                                <td>4/20(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/162435" target="_blank">수강신청</a></td>
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
                                <th>학원</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2020 경찰시험대비 심화과정 종합반 (수사, 행정법 동영상으로 제공)</td>
                                <td>4/20(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                            </tr>  
                            <tr>
                                <td>2020 경찰시험대비 심화이론 경행 3법 종합반 </td>
                                <td>4/20(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                            </tr>                                                      
                        </tbody>
                    </table>        
                </div>                                  
            </div>   
        </div>                  

        <div class="wb_ctsInfo NGR" id="ctsInfo">
            <div>
                <h3 class="NGEB">유의사항</h3>
                <dd>
                    <dt>사전접수 이벤트 ></dt>
                    <dl>4.20(월)18시까지 접수 시 42%할인</dl>                   
                </dd>
                <dd>
                    <dt>경행3법 종합반 이벤트 ></dt>
                    <dl>2019년 이후 자사 경행 수강이력이 있거나 2019 경행시험 응시이력이 있는경우에만 등록 가능합니다.</dl>                   
                </dd>                
                <dd>
                    <dt>재등록 이벤트 ></dt>
                    <dl>대상자 : 2019년 이후 심화종합반 실강 수강이력이 있는 수강생</dl>
                    <dl>수강이력이 있는 수강생에게 10%할인 쿠폰 발급됩니다.</dl>
                    <dl>쿠폰 사용방법 : 심화종합반 바로 결제 > 쿠폰적용 > 10%할인쿠폰 사용<br/>
                    (할인쿠폰이 발급되지 않은 경우 학원으로 문의 바랍니다.)</dl>
                    <dl>발급된 할인쿠폰은 본인만 사용 가능하며, 유효기간 내에 심화과정종합반에 한하여 사용 가능합니다.</dl>
                    <dl>경행 3법 종합반은 쿠폰 사용이 불가합니다.</dl>
                </dd>
                <dd>
                    <dt>환승 이벤트 ></dt>
                    <dl>대상자 : 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있고, 2019년 이후 자사 실강 수강이력이 없는 수강생</dl>
                    <dl>타학원 수강이력을 반드시 증명할 수 있어야 합니다.</dl>
                </dd>
                <dd>
                    <dt><span style="vertical-align:text-bottom">*</span> 심화과정 수강문의 1544-0336</dt>
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