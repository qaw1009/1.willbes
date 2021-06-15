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
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/05/1623_top_bg.jpg) no-repeat center top;} 
        .evt01 {background:#fdfdfd}
        .evt02 {background:#ebeff0}
        .evt03 {background:#444df4}
        .evt04 {background:#ebeff0; position:relative; padding-bottom:65px;}	
        .evt04 ul {position:absolute; width:100%; top:780px; z-index: 10;}
        .evt04 li {display:inline-block; float:left; width:50%; text-align:center}
        .evt04 li input {height:30px; width:30px;}
        .evt04 li label {display:none}     

        .evt04 .check {font-weight:bold; color:#362f2d; font-size:14px}
        .evt04 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .evt04 .check a {display:inline-block; padding:12px 20px 10px 20px;background:#e3c0a2; margin-left:50px; border-radius:20px}

        .evt04 .buyLec {padding-top:50px;}
		.evt04 .buyLec a {width:900px;margin:0 auto;display:block; text-align:cetner; font-size:30px; font-weight:600; background:#D43728; color:#fff; padding:20px 0; border-radius:50px}
		.evt04 .buyLec a:hover {background:#D43728; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

        .evt05 {background:#fff}
    
        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px}
        .time .time_txt span {color:#407df3; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#407df3}
        50%{color:#d20f5d}
        to{color:#407df3}
        }
        @@-webkit-keyframes upDown{
        from{color:#407df3}
        50%{color:#d20f5d}
        to{color:#407df3}
        } 

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }

        .evtInfo {padding:100px 0; background:#555; color:#fff; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} 마감!</span></td>
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

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1623_top.gif" title="기미진T-PASS" />                  
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1623_01.jpg" usemap="#Map1623a" title="합격수기 보기" border="0" />
            <map name="Map1623a" id="Map1623a">
                <area shape="rect" coords="770,862,1046,918" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4&board_idx=225216&tab=notice" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1623_02.jpg" title="기미진국어를 수식하는말 모음" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1623_03.jpg" title="커리큘럼" />
        </div>

        <div class="evtCtnsBox evt04" id="event"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/1623_04.jpg" alt="수강신청"/>
                <ul>                
                    <li><input type="radio" id="y_pkg1" name="y_pkg" value="164736" onClick=""/><label for="y_pkg1">전과정 티패스</label></li>
                    <li><input type="radio" id="y_pkg2" name="y_pkg" value="163552" onClick=""/><label for="y_pkg2">새벽모고 티패스</label></li>
                </ul>      
            

                <div class="check" id="chkInfo">
                    <label>
                        <input name="is_chk" type="checkbox" value="Y" /> 페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.             
                    </label>
                    <a href="#tip">이용안내확인하기 ↓</a>
                </div> 

                <div>                
                    <div class="buyLec">
                        <a href="#none" onclick="goPassLecture()">
                            수강신청 >
                        </a> <!--소방패스 신청하기-->
                    </div>
                </div>  
            </div>                  
        </div>

        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내 및 유의사항</h2>
                <dl>
                    <dd>
                        <ol>
                            <li>제공과정<br>
                                - 전 과정 T-PASS : 2020~2021 진행 기미진 국어 9급 지방직 대비 전 과정 (새벽모의고사 포함)<br>
                                - 새벽모의고사 T-PASS : 2019.11~2020.6 진행 기미진 국어 새벽실전모의고사</li>
                            <li>본 상품의 수강기간은 상품 수강신청 상세안내 화면에 표기된 기간만큼 제공됩니다.</li>
                            <li>개강일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                            <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li> 
                        </ol>
                    </dd>
                    <dt>기기제한</dt>
                    <dd>
                        <ol>
                            <li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                                - PC 2대 or 모바일 2대 of PC 1대 + 모바일 1대(총 2대)</li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최조 1회에 한해 [내강의실] > [등록기기정보]에서 직접 초기화 가능하며,
                                그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006 or 1:1 상단게시판으로 문의바랍니다.</li>                                       
                        </ol>
                    </dd>
                    <dt>수강안내</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에 무한 PASS존으로 접속합니다.</li>
                            <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>
                            <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li>
                            <li>윌비스 LIVE모드는 학원실강에서 진행되는 콘텐츠로, 본 상품에는 LIVE모드 별도 제공되지 않습니다.</li>                                  
                        </ol>
                    </dd>
                    <dt>결제/환불</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                            <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                            <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                                - 결제금액 : (강좌 정상가의 1일 이용대금X이용일수)</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.<br>
                            이용 문의 : 윌비스 고객만족센터 1544-5006</li>                   
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>    

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });   

        /*수강신청 라디오박스*/
        function goPassLecture() {
            var frm = $('#event');
            var prod_code = frm.find('input[name="y_pkg"]:checked');
            var is_chk = frm.find('input[name="is_chk"]:checked');

            if (is_chk.length < 1) {
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }

            if (prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            location.href = '{{ front_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + prod_code.val();
        }

    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop