@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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

        .wb_top {background:#1c1c1c url(https://static.willbes.net/public/images/promotion/2020/08/1751_top_bg.jpg) no-repeat center top;}   

        .wb_02 {background:#F5F9FC}

        /*교수진 호버*/
        .PeMenu {width:1120px; margin:0 auto}
        .PeMenu li {display:inline; float:left;margin-left:13px;}         
        .PeMenu li img.off {display:block} 	
        .PeMenu li img.on {display:none}
        .PeMenu li:hover img.off {display:none} 	
        .PeMenu li:hover img.on {display:block}

        .wb_03 {background:#032E5B} 

        .check {position:absolute;bottom:50px;left:50%;margin-left:-490px;width:980px;padding: 20px 0px 20px 10px;letter-spacing:3;color:#fff;z-index:5;}
        .check label {cursor:pointer;font-size:15px;color:#FFF;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:25px; width:25px;}
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#000; background:#00cfef; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        
        .wb_cts04 {width:100%; text-align:center;  min-width:1210px; background:#e5dac9 ;}                
        
    </style>
    
    <div class="p_re evtContent NGR" id="evtContainer">

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
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1751_top.jpg" alt="군무원 PASS"/>        
        </div>

        <div class="evtCtnsBox wb_01">
  			<img src="https://static.willbes.net/public/images/promotion/2020/08/1751_01.jpg" alt="군무원 패스와 함께"/>
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
                <area shape="rect" coords="908,584,1000,632" href="javascript:go_PassLecture('170039');">
            </map>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 군무원 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#guide">이용안내확인하기 ↓</a>
            </div>    
        </div>

        <div class="evtCtnsBox wb_04" id="guide">
			<img src="https://static.willbes.net/public/images/promotion/2020/08/1751_04.jpg" alt="군무원 PASS 이용안내" />	
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