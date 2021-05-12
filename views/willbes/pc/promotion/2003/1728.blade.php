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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        /*타이머*/
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

        .sky {position:fixed; top:250px; right:10px; z-index:1;}
        .sky ul li {padding-bottom:15px;}

        .evtTop {background:#154E3B url(https://static.willbes.net/public/images/promotion/2020/08/1728_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#EAEAEA url(https://static.willbes.net/public/images/promotion/2020/07/1728_02_bg.jpg) no-repeat center top;}

        .evt04 {background:#E4E4E4;}

        .evt04s {background:#154E3B;}

        .evt05 {background:#4fdeb1;padding-top:125px;padding-bottom:160px;position:relative;}
        .evt05 .contents_img{width:927px;}

        /* TAB */
        .tab {width:927px; margin:0 auto; bottom:120px;}		
        .tab li { float:left;}
        .tab a img.off {display:block}
        .tab a img.on {display:none}
        .tab a.active img.off {display:none}
        .tab a.active img.on {display:block}
        .tab:after {content:""; display:block; clear:both}

        /*수강신청 체크*/
        .check { position:absolute; bottom:50px; left:50%; margin-left:-490px; width:930px; padding:20px 0px 20px 10px; letter-spacing:3; color:#000; z-index:5}
        .check label {cursor:pointer; font-size:18px;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#000; margin-left:50px; border-radius:20px;font-size:14px;}

        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1210px; margin:0 auto; padding:50px 0 100px}
        .content_guide_wrap .guide_tit{width:1210px;margin:0 auto;text-align:center; }
        .content_guide_box{width:960px; margin:0 auto; border:2px solid #202020;padding-top:30px}
        .content_guide_box dl{margin:0 20px; word-break:keep-all; padding:30px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box h2{font-size:25px;padding-left:50px;font-weight:bold;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:14px;}
        .content_guide_box .step {display:inline-block; float:left; width:23%; border:1px solid #c4c4c4; margin-top:10px; margin-right:2%; text-align:center; line-height:1.2}
        .content_guide_box .step h4 {color:#fff; font-size:18px; background:#c4c4c4; padding:10px 0}
        .content_guide_box .step h5 {font-size:18px; color:#333; font-weight:bold; margin-bottom:20px}
        .content_guide_box .step div {padding:20px; min-height:200px; font-size:14px}
        .content_guide_box .step span {color:#fd4e3d; font-size:10px;}
        .content_guide_box dd:after {content:""; display:block; clear:both}
        .content_guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}

        .evt06{padding:100px 0;}

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

        <div class="sky">
            <ul>          
                <li><a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2020/08/1728_sky.png"  title="티패스 추가할인" /></a></li>
                {{--<li><a href="#certification"><img src="https://static.willbes.net/public/images/promotion/2020/08/1728_sky2.png"  title="수험표 인증 특별할인" /></a></li>--}}
            </ul>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1728_top.jpg" title="최우영 T-PASS" />          
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1728_01.jpg" title="단기 성적형상에 효과적" />
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1728_02.jpg" usemap="#Map1728_cafe" title="카폐바로가기" border="0" />
            <map name="Map1728_cafe" id="Map1728_cafe">
                <area shape="rect" coords="466,604,632,637" href="http://cafe.daum.net/sharkchoi/" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1728_03.jpg" title="최우영이 정답" />
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1728_04.jpg" title="커리큘럼" />
        </div>
        {{--
        <div class="evtCtnsBox evt04s" id="certification">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1728_04s.jpg" usemap="#Map1728_certification" title="인증하기" border="0" />
            <map name="Map1728_certification" id="Map1728_certification">
                <area shape="rect" coords="301,721,816,796" href="javascript:certOpen();" />
                <area shape="rect" coords="472,821,649,854" href="#notice" />
            </map>
        </div>
        --}}
        <div class="evtCtnsBox evt05">
            <ul class="tab" id="apply">
            <li><a href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2020/08/1728_tab01_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/08/1728_tab01_on.png" class="on"  /></a></li>
            <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2020/08/1728_tab02_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/08/1728_tab02_on.png" class="on"  /></a></li>
            <li><a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2020/08/1728_tab03_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/08/1728_tab03_on.png" class="on"  /></a></li>
            </ul>
            <div id="tab1">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1728_tab01_contents.png" usemap="#Map1728cts1" class="contents_img" title="통신직" border="0"  />
                <map name="Map1728cts1" id="Map1728cts1">
                    <area shape="rect" coords="695,461,855,598" href="javascript:go_PassLecture('169198');"  >
                </map>
            </div>
            <div id="tab2">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1728_tab02_contents.png" usemap="#Map1728cts2" class="contents_img" title="전기직" border="0" />
                <map name="Map1728cts2" id="Map1728cts2">
                    <area shape="rect" coords="697,472,856,588" href="javascript:go_PassLecture('169199');"  >
                    <area shape="rect" coords="696,597,855,711" href="javascript:go_PassLecture('169201');"  >
                </map>
            </div>   
            <div id="tab3">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1728_tab03_contents.png" usemap="#Map1728cts3" class="contents_img" title="통신직" border="0"  />
                <map name="Map1728cts3" id="Map1728cts3">
                    <area shape="rect" coords="695,461,855,598" href="javascript:go_PassLecture('170039');"  >
                </map>
            </div>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 최우영 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#notice">이용안내확인하기 ↓</a>
            </div>
        </div>

        <div class="evt06">
            <div class="content_guide_box" id="notice">
                    <h2 classc="title">이용안내 및 유의사항</h2>
                    <dl>
                        <dt>
                            <h3>상품구성</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>최우영 T-PASS 제공 과정</li>
                                &nbsp;&nbsp;- 통신직 : 2020년도 대비 이론 + 2021년도 9급 국가직·지방직/군무원 대비 신규 개강 전 과정<br/>
                                &nbsp;&nbsp;- 전기직 : 2020년도 대비 이론 및 문제풀이 + 2021년도 전기직 대비 신규 개강 전 과정<br/>
                                &nbsp;&nbsp;- 전자직 : 2020년도 대비 이론 및 문제풀이 + 2021년도 군무원 전자직 대비 신규 개강 전 과정                          
                                <li>본 T-PASS 내 제공되는 과정 중 신규 개강이 진행되지 않는 경우, 전년도 진행 과정으로 대체 제공될 수 있습니다.</li>
                                <li>본 T-PASS를 통한 강의 수강 시, 각 과정당 3배수 제한이 적용됩니다.</li>
                                <li>본 상품의 이용기간은 수강신청 상세 안내화면에 표시된 기간 만큼 제공됩니다.</li>                                
                            </ol>
                        </dd>

                        <dt>
                            <h3>교재안내</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>교재는 별도로 제공되지 않으며, 각 강좌별 교재는 강좌소개 및 홈페이지 상단의 [교재구매] 메뉴에서 별도로 구매 가능합니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>기기제한</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 PASS 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.</li>
                                &nbsp;&nbsp;- PC+모바일 수강 시 : PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                                <li>계정당 최초 1회에 한해 직접 기기정보 초기화 진행 가능하며, 별도 기기정보 초기화가 추가로 필요하신 경우 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다. (윌비스 고객만족센터 1544-5006)</li>                         
                            </ol>
                        </dd>

                        <dt>
                            <h3>수강안내</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                                <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                                <li>본 PASS 이용 중에는 일시정지/재수강/연장 기능을 사용할 수 없습니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>결제/환불</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>결제일로부터 7일 이내 전액 환불 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다. 강의 자료 및 모바일 강의 다운로드 서비스 이용 시 수강한 것으로 간주됩니다.</li>
                                <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감 후 환불됩니다.</li>
                                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하오니 유의바랍니다.</li>
                            </ol>
                        </dd>

                    </dl>
                </div>
            </div>
        </div>   

    </div>
    <!-- End Container -->

    <script type="text/javascript">

        {{-- 수강인증 --}}
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

        /* 수강신청 동의*/
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3028/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*탭*/
        $(document).ready(function(){
        $('.tab').each(function(){
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

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });   
      
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop