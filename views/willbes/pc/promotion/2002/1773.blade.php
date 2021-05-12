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

        .sky li{position:fixed; top:200px;right:15px;z-index:10;}

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
        .wb_05_table tr:hover {background:#f4f4f4;}
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

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NGR" id="evtContainer">        

        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>마감까지<br>남은시간</span></td>
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
                    <td><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <ul class="sky">
            {{--
            <li>
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1770" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_sky02.png" alt="5개월 패스 바로보기" >
                </a>
            </li>
            --}}               
        </ul>       
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_top.jpg" title="심화 이론.기출 패키지">        
        </div>
        {{--
        <div class="evtCtnsBox evt01" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1773_01.jpg" usemap="#Map1773a" title="쿠폰 이벤트" border="0">
            <map name="Map1773a" id="Map1773a">
                <area shape="rect" coords="232,757,551,893" href="javascript:giveCheck();" alt="이벤트 쿠폰받기">
                <area shape="rect" coords="567,755,884,894" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" />
            </map>
        </div>
        --}}
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
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1773_05.jpg" usemap="#Map1773b" title="6월 심화기출 개강 이벤트" border="0">
            <map name="Map1773b" id="Map1773b">
                <area shape="rect" coords="702,395,944,503" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" />
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
                                <td>10/12(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171319" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>형법 신광은</td>
                                <td>2021년 1차대비  신광은 심화(이론) 형법</td>
                                <td>10/17(토)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1056" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>영어 하승민</td>
                                <td>2021년 1차대비 하승민 심화 영어</td>
                                <td>10/26(월)</td>                       
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171168" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>형법 김원욱</td>
                                <td>2021년 1차대비 김원욱 심화 형법</td>
                                <td>11/2(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171169" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 오태진</td>
                                <td>2021년 1차대비 오태진 심화 한국사</td>
                                <td>11/23(월)</td>                      
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171246" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>한국사 원유철</td>
                                <td>2021년 1차대비 원유철 심화 한국사</td>
                                <td>11/23(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/171170" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>경찰학 장정훈</td>
                                <td>2021년 1차대비 장정훈 심화 경찰학</td>
                                <td>11/26(목)</td>                      
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
                                <td>2021 경찰시험대비 종합반A<br>
                                형소법,형법(기출),경찰학,영어,한국사</td>
                                <td>10/12(월)</td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
                            </tr>
                            <tr>
                                <td>2021 경찰시험대비 종합반B<br>
                                형소법,형법(이론+기출),경찰학,영어,한국사</td>
                                <td>10/12(월)</td>
                                <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank">수강신청</a></td>
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
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

        {{--쿠폰발급--}}
        var $regi_form = $('#regi_form');
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}&event_code={{$data['ElIdx']}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                        {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop