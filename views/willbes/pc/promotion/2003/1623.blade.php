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

        .evtTop {background:#fbc3cd url(https://static.willbes.net/public/images/promotion/2020/05/1623_top_bg.jpg) no-repeat center top;} 
        .evt01 {background:#fdfdfd}
        .evt02 {background:#ebeff0}
        .evt03 {background:#444df4}
        .evt04 {background:#ebeff0;position:relative;padding-bottom:65px;}	
        .evt04 ul {position:absolute; left:50%;}
        .evt04 li:nth-child(1) {margin-left:-730px;margin-top:840px;}
        .evt04 li:nth-child(2) {margin-left:-201px;margin-top:-30px;}
        .evt04 li:nth-child(3) {margin-left:325px;margin-top:-30px;}   
        .evt04 li input {height:30px; width:30px;}
        .evt04 li label {display:none}     

        .evt04 .check04 {width:877px; height:112px; margin:20px auto 0;}   
        .evt04 .check_bg {background:#ccc;}  
        .evt04 .check {width:980px; margin:0 auto;  padding:50px 0px 30px 20px; letter-spacing:3; font-weight:bold; color:#362f2d; font-size:14px}
        .evt04 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .evt04 .check a {display:inline-block; padding:12px 20px 10px 20px;background:#e3c0a2; margin-left:50px; border-radius:20px}

        .evt04 .buyLec {padding-top:50px;}
		.evt04 .buyLec a {width:1120px;margin:0 auto;display:block; text-align:cetner; font-size:30px; font-weight:600; background:#D43728; color:#fff; padding:20px 0; border-radius:50px}
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
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1623_top_bg.gif" title="기미진T-PASS" />                  
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
            <ul>                
                <li><input type="radio" id="y_pkg" name="y_pkg" value="164736" onClick=""/><label for="y_pkg">새벽모고 포함 12개월</label></li>
                <li><input type="radio" id="y_pkg" name="y_pkg" value="164737" onClick=""/><label for="y_pkg">새벽모고 제외 12개월</label></li>
                <li><input type="radio" id="y_pkg" name="y_pkg" value="163552" onClick=""/><label for="y_pkg">새벽모고 4개월</label></li>
            </ul>
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1623_04.jpg" alt="수강신청"/>
            
            <div class="check_bg">
                <div class="check" id="chkInfo">
                    <label>
                        <input name="is_chk" type="checkbox" value="Y" /> 페에지 하단 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다.             
                    </label>
                    <a href="#tip">이용안내확인하기 ↓</a>
                </div> 
            </div>
            <div>                
                <div class="buyLec">
                    {{--<a href="#none" onclick="goCartNDirectPay('event', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">--}}
                    <a href="#none" onclick="goPassLecture()">
                        수강신청 >
                    </a> <!--소방패스 신청하기-->
                </div>
            </div>                   
        </div>

        <div class="evtCtnsBox evt05" id="tip">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1623_05.jpg" title="이용안내 및 유의사항" />
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
            dDayCountDown('{{$arr_promotion_params['edate']}}');
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