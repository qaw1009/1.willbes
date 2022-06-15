@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_top {background:url("https://static.willbes.net/public/images/promotion/2022/06/2687_top_bg.jpg") no-repeat center top;}

    .evt01 {padding:100px 0;}

    /*전체 탭*/
    .evt_tab {padding-bottom:100px;}
    .tabs {width:1120px; margin:0 auto;padding-bottom:50px;}
    .tabs li {display:inline; float:left; width:25%;} 
    .tabs li a {display:block; color:#fff; background:#000; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:20px;font-weight:bold;}
    .tabs li a:hover,
    .tabs li a.active {background:#2260ff;}
    .tabs li:last-child a {margin:0}
    .tabs:after {content:""; display:block; clear:both}

     /*2번째 탭*/
    .step {font-size:17px;line-height:2;padding-bottom:50px;}
    .stage {font-size:17px;line-height:1.5;text-align:left;width:720px;margin:0 auto;padding-bottom:5px;}
    .phase {display:inline-block;background:#000;color:#fff;border-radius:10px;width:75px;text-align:center;}
    .bold {font-weight:bold;}
    .table_type {width:720px; margin:1em auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid}
    .table_type caption {display:none}	
    .table_type th,
    .table_type td {letter-spacing:normal; text-align:center; padding:10px 8px}
    .table_type th {color:#464646; background:#f3f3f3; font-weight:400; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid}
    .table_type th.th2 {background:#fffcd1}
    .table_type td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646; text-align:center;}
    .table_type td input {vertical-align:middle}
    .table_type td span.blueB {font-weight:bold; color:#33F}
    .table_type td span.redB {font-weight:bold; color:#C00}
    .table_type td label {margin-right:10px}
    .table_type .lineNo {border-right:none}
    ul.sel_info li { display: inline-block; margin-right:10px; margin-bottom:5px;vertical-align:bottom;}

    .eventPopS3 {padding:20px;}
    .eventPopS3 p {font-weight:bold; margin-bottom:10px}
    .eventPopS3 ul {border:1px solid #adadad; padding:10px 4px;text-align:left;line-height:1.5;}
    .eventPopS3 ul {width:720px;margin:0 auto;}
    .eventPopS3 li {padding:0; margin:0;margin-left:15px; margin-bottom:5px} 
    .eventPopS3 div {margin-top:10px;}
    .eventPopS3 input {vertical-align:middle}
    
    .markSbtn1 {width:100%; margin:1.5em auto; text-align:center;}
    .markSbtn1 a {display:inline-block; padding:10px;background:#2260ff; color:#fff;margin:0 5px}
    .markSbtn1 a.btn2 {background:#bf1212; border:1px solid #bf1212}
    .markSbtn1 a.btn3 {background:#fff; border:1px solid #333; color:#333}

    #frm3 {width:720px;margin:0 auto;}

    .marking {margin:10px; padding:10px; border:1px dashed #e4e4e4}
    .marking h5 {font-size:17px; margin-bottom:10px;text-align:left;font-weight:bold;}
    .marking li {display:inline; float:left; width:16.666%;}
    .marking li div {margin-right:4px;  padding:3px; background:#666; text-align:center}
    .marking li div label {color:#fff; padding-bottom:5px; display: block}
    .marking li div input {width:100%; padding:5px 0; margin:0 auto; text-align:center; letter-spacing:4px}
    .marking li div span {position:absolute; right:20px; top:30px; z-index: 10;}
    .marking ul:after {content:""; display:block; clear:both}
            
    </style>

    <!-- Container -->

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2687_top.jpg" alt="psat 합격을 예측하다">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2687_01.jpg" alt="신뢰할수 있는 합격 예상 커트라인">          
        </div>

        <div class="evtCtnsBox evt_tab" data-aos="fade-up">
            <ul class="tabs">
				<li><a href="#tab01">메인</a></li>
				<li><a href="#tab02">기본정보 및 답안입력</a></li>
				<li><a href="#tab03">성적확인 및 분석</a></li>
				<li><a href="#tab04">합격예측</a></li>			
			</ul>
			<div id="tab01">
                추후 디자인             
            </div>            
			<div id="tab02">
                <div class="step">
                    시험 보시느라 수고 많으셨습니다.<br>
                    나의 합격 여부를 함께 알아볼까요?<br>
                    성적채점은 <span class="bold">총 3 단계로 진행</span>됩니다
                </div>
                <div>
                    <div class="stage"><span class="phase">1단계</span> <span class="bold">기본정보 입력</span><br>
                        기본 정보를 입력하시면 합격예측 서비스 이용이 가능합니다.
                    </div>                    
                    <form name="frm"  id="frm" action="" method="post">
                        <table cellspacing="0" cellpadding="0" class="table_type">
                            <col width="30%" />
                            <col width="*" />
                            <tr>
                                <th>이름</th>
                                <td>
                                    <label>
                                        <input type="text" name="textfield" id="textfield"> 
                                    </label>
                                </td>                                                            
                            </tr>
                            <tr>
                                <th>연락처</th>
                                <td>
                                    <label>
                                        <input type="text" name="textfield" id="textfield" onkeyup="fn_OnlyNumber(this);"> 
                                    </label>
                                </td>
                            </tr>        
                                <th>직렬</th>
                                <td>
                                    <select title="직렬선택" name="test_subject" id="test_subject" >
                                        <option value="">직렬선택</option>
                                        <option  value="">직렬1</option>
                                        <option  value="">직렬2</option>
                                        <option  value="">직렬3</option>
                                    </select>                         
                                    <select title="지역구분" id="listview" name="listview">
                                        <option value="">지역</option>
                                        <option value="">지역1</option>
                                        <option value="">지역2</option>
                                        <option value="">지역3</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>시험응시번호</th>
                                <td>
                                    <label>
                                        <input type="text" name="textfield" id="textfield" onkeyup="fn_OnlyNumber(this);"> 
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>책형</th>
                                <td>
                                    <ul class="sel_info">
                                        <li><input type="radio" name="lec1" id="lec1" value="A" /> <label for="lec1">가형</label></li>
                                        <li><input type="radio" name="lec2" id="lec2" value="B" />
                                        나형</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>가산점</th>
                                <td>
                                    <ul class="sel_info">
                                        <li><input type="radio" name="term1" id="term1" value="A" />
                                        10점
                                            <label for="term1"></label></li>
                                        <li><input type="radio" name="term2" id="term2" value="B" />
                                            5점
                                        </li>
                                        <li><input type="radio" name="term3" id="term3" value="C" />
                                        3점
                                        </li>
                                        <li><input type="radio" name="term4" id="term4" value="D" />
                                        없음
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <div class="eventPopS3">
                        <div class="stage">📣 <span class="bold">이벤트 참여에 따른 사전 동의사항</span></div>
                        <ul>
                            <li>
                                <span class="bold">1. 개인정보 수집 항목(개인정보 보호법 제15조 제2항)</span><br>
                                - 성명, 응시번호, 휴대폰 번호, 전자 우편 주소                            
                            </li>
                            <li>
                                <span class="bold">2. 개인정보 수집 및 이용 목적(개인정보 보호법 제15조 제2항 제1호)</span><br>
                                - 성적 이벤트 등의 본인확인<br>
                                - 고지사항 전달, 본인 의사 확인 등 원활한 의사소통 경로의 확보<br>
                                - 서비스 이용과 관련된 정보 안내 등 편의제공 목적
                            </li>
                            <li>
                                <span class="bold">3. 개인정보 보유 및 이용기간(개인정보 보호법 제15조 제2항 제3호)</span><br>
                                - 수집된 개인정보는 상기 2번의 용도 이외의 목적으로는 사용되지 않습니다.
                            </li>
                            <li>
                                <span class="bold">4.개인정보 수집동의 거부 및 거부에 따른 이용제한(개인정보 보호법 제15조 제2항 제4호)</span><br>
                                - 고객님은 개인정보의 수집 및 이용에 대하여 동의를 거부할 수 있습니다.<br>
                                - 개인정보 수집에 동의하지 않거나, 부정확한 정보를 입력하는 경우, 본 이벤트 관련 서비스 이용이 제한됨을 알려드립니다.
                            </li>
                        </ul>
                        <div class="stage">
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y" ><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </div>
                    </div>                
                    <div class="markSbtn1">
                        <a href="javascript:void(0)">저 장</a>
                    </div>
                    <div class="stage">
                        <span class="phase">2단계</span> <span class="bold">체감난이도 입력</span>
                    </div>
                    <form name="frm2"  id="frm2" action="" method="post">
                        <table cellspacing="0" cellpadding="0" class="table_type">
                            <col width="30%" />
                            <col width="*" />                           
                            <tr>
                                <th>언어논리</th>
                                <td>
                                    <ul class="sel_info">
                                        <li><input type="radio" name="lev1" id="lev1" value="A" />
                                        매우 어려움
                                        </li>
                                        <li><input type="radio" name="lev2" id="lev2" value="B" />
                                            어려움
                                        </li>
                                        <li>
                                            <input type="radio" name="lev3" id="lev3" value="C" />
                                            보통
                                        </li>
                                        <li>
                                            <input type="radio" name="lev4" id="lev4" value="D" />
                                            쉬움
                                        </li>
                                        <li>
                                            <input type="radio" name="lev5" id="lev5" value="E" />
                                            매우 쉬움
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>상황판단</th>
                                <td>
                                    <ul class="sel_info">
                                        <li>
                                            <input type="radio" name="lev1" id="lev1" value="A" />
                                            매우 어려움 </li>
                                        <li>
                                            <input type="radio" name="lev2" id="lev2" value="B" />
                                            어려움 </li>
                                        <li>
                                            <input type="radio" name="lev3" id="lev3" value="C" />
                                            보통 </li>
                                        <li>
                                            <input type="radio" name="lev4" id="lev4" value="D" />
                                            쉬움 </li>
                                        <li>
                                            <input type="radio" name="lev5" id="lev5" value="E" />
                                            매우 쉬움 </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>자료해석</th>
                                <td>
                                    <ul class="sel_info">
                                        <li>
                                            <input type="radio" name="lev1" id="lev1" value="A" />
                                            매우 어려움 </li>
                                        <li>
                                            <input type="radio" name="lev2" id="lev2" value="B" />
                                            어려움 </li>
                                        <li>
                                            <input type="radio" name="lev3" id="lev3" value="C" />
                                            보통 </li>
                                        <li>
                                            <input type="radio" name="lev4" id="lev4" value="D" />
                                            쉬움 </li>
                                        <li>
                                            <input type="radio" name="lev5" id="lev5" value="E" />
                                            매우 쉬움 </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>전체</th>
                                <td>
                                    <ul class="sel_info">
                                        <li>
                                            <input type="radio" name="lev1" id="lev1" value="A" />
                                            매우 어려움 </li>
                                        <li>
                                            <input type="radio" name="lev2" id="lev2" value="B" />
                                            어려움 </li>
                                        <li>
                                            <input type="radio" name="lev3" id="lev3" value="C" />
                                            보통 </li>
                                        <li>
                                            <input type="radio" name="lev4" id="lev4" value="D" />
                                            쉬움 </li>
                                        <li>
                                            <input type="radio" name="lev5" id="lev5" value="E" />
                                            매우 쉬움 </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th><p>가장 어려웠던 과목</p></th>
                                <td>
                                    <ul class="sel_info">
                                        <li>
                                            <input type="radio" name="lec3" id="lec3" value="A" />
                                            언어논리
                                        </li>
                                        <li>
                                            <input type="radio" name="lec4" id="lec4" value="B" />
                                        상황판단</li>
                                        <li>
                                            <input type="radio" name="lec5" id="lec5" value="C" />
                                        자료해석</li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <div class="markSbtn1">
                        <a href="javascript:void(0)">설 문 완 료</a>
                    </div>
                    <div class="stage">
                        <span class="phase">3단계</span> <span class="bold">답안 입력 / 채점결과 확인</span>
                    </div>
                    <form name="frm3"  id="frm3" action="" method="post">                    
                        <div id="tab1">
                            <div class="marking">
                                <h5>헌법</h5>
                                <ul>
                                    <li>
                                        <div>    
                                            <label>번호</label>
                                            <input value="" name="답안입력" id="답안입력" placeholder="답안입력" disabled>
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>1 ~ 5번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>6 ~ 10번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>11 ~ 15번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>16 ~ 20번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>21 ~ 25번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="marking">
                                <h5>형사법</h5>
                                <ul>
                                    <li>
                                        <div>    
                                            <label>번호</label>
                                            <input value="" name="답안입력" id="답안입력" placeholder="답안입력" disabled>
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>1 ~ 5번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>6 ~ 10번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>11 ~ 15번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>16 ~ 20번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>21 ~ 25번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="marking">
                                <h5>경찰학</h5>
                                <ul>
                                    <li>
                                        <div>    
                                            <label>번호</label>
                                            <input value="" name="답안입력" id="답안입력" placeholder="답안입력" disabled>
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>1 ~ 5번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>6 ~ 10번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>11 ~ 15번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>16 ~ 20번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>    
                                            <label>21 ~ 25번</label>
                                            <input value="" type="number" maxlength="5" name="" id="">
                                        </div>
                                    </li>                                 
                                </ul>
                            </div>                       
                        </div>                        
                    </form>
                    <div class="markSbtn1">
                        <a href="javascript:void(0)">채 점 하 기</a>
                    </div>
                </div>

			<div id="tab03">
                3
			</div>
			<div id="tab04">
                4
			</div>
        </div>

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            loginAlert();   {{-- 비로그인시 로그인 메세지 --}}
        });

        {{-- 초기 로그인 얼럿 --}}
        function loginAlert() {
            {!! login_check_inner_script('로그인 후 이벤트에 참여해주세요.','Y') !!}
        }

        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        );
    </script>
@stop