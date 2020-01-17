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
.evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

/************************************************************/

/*타이머*/
.time {width:100%; text-align:center; background:#e1e1e1}
.time {text-align:center; padding:20px 0}
.time table {width:1120px; margin:0 auto}
.time table td:first-child {font-size:40px}
.time table td img {width:80%}
.time .time_txt {font-size:28px; color:#000; letter-spacing: -1px}
.time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}

.skybanner{position:fixed;top:500px;right:10px;z-index:1;}

.wb_cts01{background:#1c1c1c url("https://static.willbes.net/public/images/promotion/2019/07/1313_top_bg.jpg") no-repeat center top}

.wb_cts02{background:#ccc}
.wb_cts03{background:#f4f4f4;position:relative;padding-bottom:100px;}
.wb_cts03 li {position:absolute;margin-left:350px;}
.wb_cts03 li:nth-child(1) {left:830px;bottom:535px;}
.wb_cts03 li:nth-child(2) {left:1000px;bottom:535px;}
.wb_cts03 li:nth-child(3) {left:830px;bottom:465px;} 
.wb_cts03 li:nth-child(4) {left:1000px;bottom:465px;}
.wb_cts03 li:nth-child(5) {left:830px;bottom:395px;}
.wb_cts03 li:nth-child(6) {left:1000px;bottom:395px;} 
.wb_cts03 li input {height:30px; width:30px;}

.wb_top .check {position:absolute; width:1000px; left:50%; top:900px; margin-left:-500px; letter-spacing:3 !important; color:#fff; font-size:14px; z-index:10}
.wb_cts04 .check {color:#fff; font-size:14px}
.check p {margin-bottom:20px;}
.check p a {display:block; width:432px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#b6061b; text-align:center; border-radius:90px;}
.check p a:hover {color:#8d0033; background:#eee53b;}
.check label {cursor:pointer}
.check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
.check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
.check a.infotxt:hover {background:#8d0033}       

.tabContaier{width:1120px;margin:0 auto;}
.tabContaier li{display:inline-block;width:280px;height:84px;line-height:84px;background:#fff;color:#000;float:left;font-size:18px;font-weight:bold;}
.tabContaier:after {content:""; display:block; clear:both}
.tabContaier li a{display:block;}
.tabContaier li a:hover,
.tabContaier li a.active {background:#b6061b;color:#fff;}
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
    <div class="skybanner">
        <a href="#banner">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_quick.png" alt="퀵배너">       
        </a>
    </div> 

    <div class="evtCtnsBox wb_cts01">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1313_top.jpg"  title="군무원 0원 패스" />
    </div>  

    <div class="evtCtnsBox wb_cts02">
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_mid.jpg"  title="윌비스 교수진과 함께" />
        <div class="tabContaier">    
            <ul>    
                <li><a href="#tab1" class="active">국어</a></li>
                    
                <li><a href="#tab2">행정학</a></li>
                
                <li><a href="#tab3">행정법</a></li>
                   
                <li><a href="#tab4">한국사능력검정시험</a></li>
            </ul>
        </div> 
        <div id="tab1" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_01.jpg" title="국어탭" />      
        </div>
        <div id="tab2" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_02.jpg"  title="행정학탭" />      
        </div>
        <div id="tab3" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_03.jpg"  title="행정법탭" />      
        </div>
        <div id="tab4" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_04.jpg" title="한극사능력검정시험탭" />      
        </div>   
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_mid_curri.jpg" title="커리큘럼" />        
    </div> 


    <div class="evtCtnsBox wb_cts03"id="banner">    
        <img src="https://static.willbes.net/public/images/promotion/2020/01/1313_pass.jpg" usemap="#Map1313abc" border="0">
        <map name="Map1313abc" id="Map1313abc">
            <area shape="rect" coords="186,1031,313,1076" href="javascript:;" onclick="go_PassLecture('155378')" alt="군무원 0원 패스"/>
            <area shape="rect" coords="788,768,914,812" href="javascript:;" onclick="go_PassLecture('155379')" alt="6개월 패스"/>
        </map>
        <ul>
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155380" onClick=""/><label for="y_pkg"></label></li>   
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155381" onClick=""/><label for="y_pkg"></label></li>
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155382" onClick=""/><label for="y_pkg"></label></li>
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155383" onClick=""/><label for="y_pkg"></label></li>   
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155385" onClick=""/><label for="y_pkg"></label></li>
            <li><input type="radio" id="y_pkg" name="y_pkg" value="155386" onClick=""/><label for="y_pkg"></label></li>         
        </ul>

        <div class="check" id="chkInfo">
            <p class="NGEB"><a onclick="go_PassLecture(1);" target="_blank">윌비스 군무원PASS 신청하기</a></p>      
            <label>
                <input name="ischk" type="checkbox" value="Y" />
                페이지 하단 군무원0원PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
            <a href="#tip" class="infotxt" > 이용안내확인하기 ↓</a>
        </div>
        {{--
        <span class="btn_area">
            <a href="#none" onclick="goPassLecture()" class="btn">윌비스 군무원PASS 신청하기</a>
        </span>
        <div class="check NGR" id="chkInfo">
            <input name="ischk" type="checkbox" value="Y" id="txt1"/> <label for="txt1">페이지 하단 군무원0원PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
            <a href="#tip">이용안내확인하기 ↓</a>
        </div>
        --}}    
    </div>
 
    <div class="evtCtnsBox wb_cts04" id="tip">
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_bot.jpg" title="이용안내" />  
    </div>
  
</div>
<!-- End Container -->

<script type="text/javascript">
$(document).ready(function(){
    $(".tabContents").hide();
    $(".tabContents:first").show();
    $(".tabContaier ul li a").click(function(){
    var activeTab = $(this).attr("href");
    $(".tabContaier ul li a").removeClass("active");
    $(this).addClass("active");
    $(".tabContents").hide();
    $(activeTab).fadeIn();
    return false;
    });
});

 /*디데이카운트다운*/
$(document).ready(function() {
    dDayCountDown('{{$arr_promotion_params['edate']}}');
});

function go_PassLecture(code){
    if($("input[name='ischk']:checked").size() < 1){
        alert("이용안내에 동의하셔야 합니다.");
        return;
    }
    if(code == 1){
        code = $('input[name="y_pkg"]:checked').val();
        if (typeof code == 'undefined' || code == '') {
            alert('강좌를 선택해 주세요.');
            return;
        }
    }
    location.href = "{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/') }}" + code;
}

</script>
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop