@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')


<!-- Container-->
<style type="text/css">
.subContainer {
    min-height:auto !important;
    margin-bottom:0 !important;
}
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  
.top_bg {background:url(https://static.willbes.net/public/images/promotion/2019/07/1316_top_bg.jpg) no-repeat center top;}
.top_bg .check{
    position:absolute; width:1000px; left:50%; top:920px; margin-left:-500px; z-index:1;font-size:14px;text-align:center;line-height:1.5;
    letter-spacing:-1px;
}

.top_bg span {position:absolute; z-index:5;}
.top_bg .img03 {width:520px; top:380px; left:50%; margin-left:-500px; animation:img3 0.5s ease-in;-webkit-animation:img3 0.5s ease-in;}
@@keyframes img3{
    from{margin-left:0; opacity: 0;}
    to{margin-left:-560px; opacity: 1; transform:rotate(720deg);}
}
@@-webkit-keyframes img3{
    from{margin-left:0; opacity: 0;}
    to{margin-left:-560px; opacity: 1; transform:rotate(720deg);}
}

.evtCtnsBox .check label{color:#fff;font-size:16px;}
.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7;border-radius:20px; margin-left:20px}
.evtCtnsBox .check a:hover {color: #fff;background: #000;}

.evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/07/1316_top_bg.jpg) repeat center top;}
.evt02 {background:#0d40b6;}
.evt03 {background:#dae3ea;}
.evt04 {background:#e5eef3;}
.evt04 .check{position:absolute;width: 800px;left:50%;top:970px;margin-left:-400px;z-index:1;font-size:14px; text-align:center;line-height:1.5; letter-spacing:-1px;}
.evt04 .check label{color:#a5aeb5;}
.evt05 {background:#a5aeb5;}
.evt06 {background:#637078;}
</style>


    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox top_bg">  
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1316_top.jpg" alt="하승민영어 T-PASS" usemap="#Map1316a" border="0">
            <map name="Map1316a" id="Map1316a">
                <area shape="rect" coords="261,832,851,901" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청 이용약관동의"/>
            </map>
            <span class="img03"><img src="https://static.willbes.net/public/images/promotion/2019/07/1316_t_pass.png" alt="T-PASS"></span>

            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>  


        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1316_01.jpg" alt="많은 수험생들이 어려워하는 과목 영어">  
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1316_02.jpg" alt="경찰영어의 자신감 충전"> 
        </div>

		<div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1316_03.jpg" alt="경찰영어커리큘럼"> 
        </div>

        <div class="evtCtnsBox evt05">
          <a href="#"><img src="https://static.willbes.net/public/images/promotion/2019/07/1316_04.jpg" alt="수강신청" ></a>
          </div>
        <div class="evtCtnsBox evt06" id="careful">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1316_05.jpg" alt="이용안내 및 유의사항"> 
        </div>    
                        
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        function go_PassLecture(no){

            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var lUrl;
            if(no == 1){
                lUrl = "#";
            }
            location.href = lUrl;
        }

        function goDesc(tab){
            location.href = '#careful';
        }
    </script>

        <script type="text/javascript">
        function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
    {
        alert("로그인 후 이용하여 주십시오.");
return;

        var $regi_form = $('#' + ele_id);
        var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
        var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
        var params;

        if ($is_chk.length > 0) {
            if ($is_chk.is(':checked') === false) {
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
        }

        if ($prod_code.length < 1) {
            alert('강좌를 선택해 주세요.');
            return;
        }

                params = [
            { 'name' : '_csrf_token', 'value' : 'd74589844f72a04cf7b4e31d64296e43' },
            { 'name' : '_method', 'value' : 'POST' },
            { 'name' : 'cart_type', 'value' : cart_type },
            { 'name' : 'learn_pattern', 'value' : learn_pattern },
            { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
        ];

                $prod_code.each(function() {
            params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
        });

                formCreateSubmit('//police.willbes.net/cart/store', params, 'POST');
    }

    // 날짜차이 계산
    var dDayDateDiff = {
        inDays: function(dd1, dd2) {
            var tt2 = dd2.getTime();
            var tt1 = dd1.getTime();

            return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
        },
        inWeeks: function(dd1, dd2) {
            var tt2 = dd2.getTime();
            var tt1 = dd1.getTime();

            return parseInt((tt2-tt1)/(24*3600*1000*7));
        },
        inMonths: function(dd1, dd2) {
            var dd1Y = dd1.getFullYear();
            var dd2Y = dd2.getFullYear();
            var dd1M = dd1.getMonth();
            var dd2M = dd2.getMonth();

            return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
        },
        inYears: function(dd1, dd2) {
            return dd2.getFullYear()-dd1.getFullYear();
        }
    };

        function dDayCountDown(end_date) {
        // 마감일 1개월전 날짜 (사용안함)
        //var arr_start_date = moment(end_date).add(-1, 'months').format('YYYY-M-D').split('-');
        var arr_end_date = end_date.split('-');
        var event_day = new Date(arr_end_date[0], parseInt(arr_end_date[1]) - 1, arr_end_date[2], 23, 59, 59);
        var now = new Date();
        var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));

        var Monthleft = event_day.getMonth() - now.getMonth();
        var Dateleft = dDayDateDiff.inDays(now, event_day);
        var Hourleft = timeGap.getHours();
        var Minuteleft = timeGap.getMinutes();
        var Secondleft = timeGap.getSeconds();

        if ((event_day.getTime() - now.getTime()) > 0) {
            $('#dd1').attr('src', 'https://static.willbes.net/public/images/promotion/common/' + parseInt(Dateleft/10) + '.png');
            $('#dd2').attr('src', 'https://static.willbes.net/public/images/promotion/common/' + parseInt(Dateleft%10) + '.png');

            $('#hh1').attr('src', 'https://static.willbes.net/public/images/promotion/common/' + parseInt(Hourleft/10) + '.png');
            $('#hh2').attr('src', 'https://static.willbes.net/public/images/promotion/common/' + parseInt(Hourleft%10) + '.png');

            $('#mm1').attr('src', 'https://static.willbes.net/public/images/promotion/common/' + parseInt(Minuteleft/10) + '.png');
            $('#mm2').attr('src', 'https://static.willbes.net/public/images/promotion/common/' + parseInt(Minuteleft%10) + '.png');

            $('#ss1').attr('src', 'https://static.willbes.net/public/images/promotion/common/' + parseInt(Secondleft/10) + '.png');
            $('#ss2').attr('src', 'https://static.willbes.net/public/images/promotion/common/' + parseInt(Secondleft%10) + '.png');

            setTimeout(function() {
                dDayCountDown(end_date);
            }, 1000);
        } else {
            $('#newTopDday').hide();
        }
    }
</script>


@stop