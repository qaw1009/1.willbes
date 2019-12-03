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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/12/1467_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#fdfdfd}
        .evt02 {background:#ebeff0}
        .evt03 {background:#fdfdfd}
        .evt04 {background:#222335; position:relative}
        .evt05 {background:#fff}

        .check { position:absolute; bottom:20px; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:14px}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#ea263e; margin-left:50px; border-radius:20px}
        .check a:hover {background:#fdfe0d; color:#ea263e}

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
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1467_top.gif" usemap="#Map1467" title="기미진T-PASS" border="0" />
            <map name="Map1467" id="Map1467">
                <area shape="rect" coords="52,798,1071,888" href="#lec_go" alt="수강신청">
            </map>
        </div>

        <div class="evtCtnsBox evt01">
		    <img src="https://static.willbes.net/public/images/promotion/2019/12/1467_01.jpg" usemap="#Map_pass_go" title="현직근무자가 추천하는 기특한 국어" border="0" />
			<map name="Map_pass_go">
			  <area shape="rect" coords="773,866,1045,914" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4&board_idx=225216&tab=notice" target="_blank" alt="합격수기">
			</map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1467_02.jpg" title="기미진국어를 수식하는말 모음" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1467_03.jpg" title="기특한국어커리큘럼" />
        </div>

        <div class="evtCtnsBox evt04" id="lec_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1467_04.jpg" usemap="#Map_1074_lec2" title="기미진T-PASS" border="0" />
			<map name="Map_1074_lec2">
                <area shape="rect" coords="485,771,705,825" href="javascript:go_PassLecture(1);" target="_blank" alt="아침특강 제외">
                <area shape="rect" coords="746,773,976,823" href="javascript:go_PassLecture(2);" target="_blank" alt="아침특강 포함">
            </map>
            <div class="check">
                <label>
                    <input name="ischk2"  type="checkbox" value="Y" />
                    페이지 하단 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tab1">이용안내확인하기 ↓</a>
            </div>
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1467_05.jpg" alt="이용안내 및 유의사항 " />
        </div>
        <!--wb_cts06//-->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
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
                lUrl = "{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/158434') }}"
            }else{
                lUrl = "{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/158433') }}"
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