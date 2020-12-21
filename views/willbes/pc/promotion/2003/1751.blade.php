@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        /*타이머*/
        .time {width:100%; text-align:center; background:#e1e1e1}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:80%}
        .time .time_txt {font-size:28px; color:#000; letter-spacing: -1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }            

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/12/1751_top_bg.jpg) no-repeat center top;}   

        .wb_01 .tImg img {margin-right:5px; width:330px;}

        .wb_02 {background:#F5F9FC}

        /*교수진 호버*/
        .PeMenu {width:1120px; margin:0 auto}
        .PeMenu li {display:inline-block; float:left; width:20%;}       
        .PeMenu li img {margin:0 auto}  
        .PeMenu li img.off {display:block} 	
        .PeMenu li img.on {display:none}
        .PeMenu li:hover img.off {display:none} 	
        .PeMenu li:hover img.on {display:block}
        .PeMenu ul:after {content:''; display:block; clear:both}

        .wb_03 {background:#032E5B} 

        .check {position:absolute;bottom:50px;left:50%;margin-left:-490px;width:980px;padding: 20px 0px 20px 10px;letter-spacing:3;color:#fff;z-index:5;}
        .check label {cursor:pointer;font-size:15px;color:#FFF;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:25px; width:25px;}
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#000; background:#00cfef; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        
        .wb_cts04 {width:100%; text-align:center;  min-width:11200px; background:#e5dac9;}   

        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}               
        
    </style>
    
    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</td>
                    <td class="time_txt">마감까지<br><span>남은 시간은</span></td>
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
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1751_top.jpg" alt="군무원 PASS"/>        
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1751_01_01.jpg" alt="군무원 패스와 함께"/>
            <div class="tImg">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1717_01_t01.gif" alt="국어 기미진" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1717_01_t04.gif" alt="행정법 이석준" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1717_01_t05.gif" alt="행정학 김덕관" />
            </div>
  			<img src="https://static.willbes.net/public/images/promotion/2020/12/1751_01.jpg" alt="군무원 패스와 함께"/>
			<div class="menuWarp">    
            	<div class="PeMenu">
            		<ul>
                		<li> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts1.png" alt="국어 기미진" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts1_on.png" alt="국어 기미진on" class="on"/>
                        </li>                        
                		<li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts2.png" alt="국어 임재진" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts2_on.png" alt="국어 임재진on" class="on"/>
                        </li>                        
                		<li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts3.png" alt="행정학 김덕관" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts3_on.png" alt="정학 김덕관on" class="on"/>
                        </li>
                        <li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts4.png" alt="행정학 김헌" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts4_on.png" alt="행정학 김헌on" class="on"/>
                        </li>
                        <li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts5.png" alt="행정법 이석준" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01_cts5_on.png" alt="행정법 이석준on" class="on"/>
                        </li>                        
               		 </ul>
            	</div>
            </div>
  			<img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01s.jpg" alt="강좌 제공"/>
        </div>
        
        <div class="evtCtnsBox wb_02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1751_02.jpg" alt="고득점 커리큘럼"/>        
        </div>
          
        <div class="evtCtnsBox wb_03" id="event">       
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1751_03.jpg" usemap="#Map1751_apply" title="수강신청" border="0" />
            <map name="Map1751_apply" id="Map1751_apply">
                <area shape="rect" coords="343,568,468,631" href="javascript:go_PassLecture('169730');">
                <area shape="rect" coords="907,443,1000,490" href="javascript:go_PassLecture('170030');">
                <area shape="rect" coords="907,514,1000,562" href="javascript:go_PassLecture('170029');">
                <area shape="rect" coords="908,584,1000,632" href="javascript:go_PassLecture('170031');">
            </map>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 군무원 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#guide">이용안내확인하기 ↓</a>
            </div>    
        </div> 

        <div class="evtCtnsBox wb_info" id="guide">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 군무원PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 군무원 9급 행정직 대비 과정으로, 참여 교수진의 전 강좌를 배수 제한 없이 무제한으로 수강 가능합니다.</li>
                            <li>2. 수강 가능 교수진 : 국어 기미진/임재진, 행정법 이석준, 행정학 김덕관/김헌<br>
                                (국어 임재진, 행정학 김헌 교수 과정은 2020년 대비 진행된 기존 과정만 제공됩니다.)</li>
                            <li>3. 2020년 대비 전 강좌 및 2021년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
                            (일부 교수진의 경우, 학원 사정으로 인하여 신규 과정이 업데이트 되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 수강해주셔야 합니다.)</li>
                            <li>4. 참여 교수진의 강의 진행 일정은 과목별로 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.<br>
                            (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)</li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 워하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>본 PASS를 이용 중에는 일시정지 기능을 사용할 수 없습니다.</li>
                            <li>본 PASS 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                            - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>                           
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                                · 결제금액 - (강좌 정상가의 1일 이용대금×이용일수)
                            </li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사고발조치가 단행될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>라이브모드 수강관련</dt>
                    <dd>
                        <ol>
                            <li>공무원학원 실강 내 LIVE로 진행되는 강좌만 제공됩니다. (* 일부 특강 제외)<br>
                            - 국어 기미진, 행정법 이석준, 행정학 김덕관</li>
                            <li>제공되는 강좌 및 진행일정은 우측 버튼 클릭 후 페이지 하단에서 확인 가능합니다.
                            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
                            <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
                            <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다. (* 이전 구매자 소급 적용) </li>
                        </ol>
                    </dd>                    
                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script>  

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });        

        /* 수강신청 */
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop