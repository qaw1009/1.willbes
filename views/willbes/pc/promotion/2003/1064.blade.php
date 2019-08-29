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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        /*타이머*/
        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px}
        .time .time_txt span {color:#b71314; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#ef6759}
        50%{color:#ff6600}
        to{color:#ef6759}
        }
        @@-webkit-keyframes upDown{
        from{color:#ef6759}
        50%{color:#ff6600}
        to{color:#ef6759}
        } 
            

        .wb_cts00 {background:#181818 url(https://static.willbes.net/public/images/promotion/2019/05/1064_top_bg.jpg) no-repeat center top; position:relative; height:1169px;}
        .wb_cts00 p {width:100%; margin:0 auto;}
        .wb_cts00 ul {width:100%; margin:0 auto:}
        .bannerImg3 {position:absolute; width:1124px; left:50%; bottom:160px; margin-left:-560px; z-index:100}

        .wb_cts01 {background:#ffbc0d;}

        .wb_cts02 {background:#212121;}

        .wb_cts03 {background:#ffbc0d;}

        .wb_cts04 {background:#e5dac9:}

        .wb_cts05 {background:#fff:}

        .check {width:100%; margin:0 auto; margin:0 auto; background:#ffbc0d; padding:15px 0px 120px 20px; letter-spacing:3; font-size:14px; font-weight:bold; color:#362f2d;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px;color:#27262c; background:#e3c0a2; margin-left:50px; border-radius:20px}
    </style>



    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt">{{$arr_promotion_params['turn']}}기 - <span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</td>
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

        <div class="evtCtnsBox wb_cts00" >
            <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1064_top.gif" alt="2020 윌비스 김동진법원팀 PASS"/></p>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1064_text1.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1064_text2.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1064_text3.png" alt=""/></li>
                </ul>
            </div>
        </div><!--wb_cts00//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1266_01.gif" alt="김동진법원팀 지금 PASS 구매 시, 특별 혜택!" />
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <ul>                
                <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1064_02.jpg" alt="윌비스 법원직만을 위한 혁신적인 커리큘럼" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1064_03.jpg" alt="업계의 판도를 바꿀, 차원이 다른 김동진법원팀 교수진" usemap="#Map190108_c1" border="0" />
                    <map name="Map190108_c1" >
                        <area shape="rect" coords="861,1129,978,1174" href="http://cafe.daum.net/LAW-KDJTEAM" target="_blank"/>
                    </map>
                </li>
            </ul>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1266_04.gif" alt="2020 윌비스 김동진 법원팀 PASS  " usemap="#Map190108_c2" border="0" />
            <map name="Map190108_c2" >
                <area shape="rect" coords="784,749,957,836" href="javascript:go_PassLecture(2);" onfocus="this.blur();" />
            </map>
            <div class="check" id="chkInfo">
                <label>
                    <input name="ischk" type="checkbox" value="Y" /> 페이지 하단 김동진 법원팀 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tab1">이용안내확인하기 ↓</a>
            </div>
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05"  id="tab1">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1266_05.jpg" alt=" 2020 윌비스 김동진법원팀PASS" />
        </div><!--wb_cts05//-->

    </div>
    <!-- End Container -->

    <script>
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1, 
                moveSlides:1,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

        function go_PassLecture(no){

            if(parseInt(no)==1 || parseInt(no)==2){
                if($("input[name='ischk']:checked").size() < 1 && $("input[name='ischk2']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    $("#chkInfo").focus();
                    return;
                }
            }else if(parseInt(no)==3 || parseInt(no)==4){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }
            }else if(parseInt(no)==5 || parseInt(no)==6){
                if($("input[name='ischk2']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }
            }

            var lUrl = "";

            if(parseInt(no)==1 || parseInt(no)==3 || parseInt(no)== 5){
                lUrl = "{{ site_url('/periodPackage/show/cate/3035/pack/648001/prod-code/153337') }}"
            }else{
                lUrl = "{{ site_url('/periodPackage/show/cate/3035/pack/648001/prod-code/153337') }}"
            }

            location.href = lUrl;

        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop