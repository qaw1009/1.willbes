@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}
    li {list-style:none;}

    .evtTop {position:relative}

    .evtTime { text-align:center;}
    .evtTime .dday {font-size:22px;padding:20px 0;}
    .evtTime .dday span {color:#a0774e; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}

    .evt03 {position:relative;}
    .evt03 li img {position:absolute;left:50%;top:76%;margin-left:-252px;width:70%;}    
    .check { position:absolute; bottom:50px; left:50%; margin-left:-360px; width:720px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
    .check label {cursor:pointer; font-size:16px;color:#FFF;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
   

    .evtFooter {margin:0 auto;text-align:left; color:#000; line-height:1.7;background:#fff }
    .evtFooter h3 {font-size:20px;color:#f3f3f3; background:#161616; text-align:center; padding:10px 0}
    .evtFooter .infoBox {padding:20px;}
    .evtFooter p {margin-bottom:10px; color:#252525; font-size:19px;}
    .evtFooter p span {display:inline-block; font-size:10px; padding-bottom:5px; vertical-align:middle}
    .evtFooter div,
    .evtFooter ul {margin-bottom:20px; padding:0 10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal; color:#636363;font-size:14px;}
    .evtFooter li span {color:#252525;}

    .fixed {position:fixed; width:100%; left:0; z-index:10; border:0; opacity: .95;} 
    .fixed ul {width:100%; max-width:720px; margin:0 auto; background:rgba(255,255,255,0.5); background:#f3f3f3; box-shadow:0 10px 10px rgba(102,102,102,0.2);}

    /* 폰 가로, 태블릿 세로*/
    @@media all and (min-width:320px) and (max-width:480px)  {
        .evt03 li img {position:absolute;left:50%;top:78%;margin-left:-115px;width:50%;}    
        .check {position:absolute;width:300px;left:50%;margin-left:-150px;bottom:10px;padding:10px;}
        .check label {font-size:12px;}
        .check input {width:16px;height:16px;}
    }

    /* 태블릿 세로 */
    @@media all and (min-width:481px) and (max-width:768px)  {
        .evt03 li img {position:absolute;left:50%;top:77%;margin-left:-150px;width:65%;}    
        .check {position:absolute;width:400px;left:50%;margin-left:-200px;bottom:25px;padding:10px;}
        .check label {font-size:15px;}
        .check input {width:20px;height:20px;}
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1480m_top.gif" alt="" > 
    </div>  

    <div class="evtCtnsBox evtTime">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">사전예약 마감까지 <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div> 
    </div>    
    
    <div class="evtCtnsBox evt01" >
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1480m_01.jpg" alt="" >
    </div>

    <div class="evtCtnsBox evt02" >
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1480m_02.jpg" alt="" >
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1480m_03.jpg" alt="" >
        <li> 
            <a href="javascript:go_PassLecture('163827');">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1480m_03_apply.png" alt="" >
            </a>    
        </li>
        <div class="check">
            <label>
                <input name="ischk"  type="checkbox" value="Y" />
                페이지 하단 김동진법원팀PASS 이용안내를 모두 확인하였고, 이에 동의합니다. 
            </label>
        </div>        
    </div>

    <div class="evtCtnsBox evtFooter">
        <h3 class="NSK-Black">김동진법원팀PASS 이용안내</h3>
        <div class="infoBox">
            <p class="NSK-Black"><span>●</span> 상품구성 </p>
            <ul>
                <li>본 PASS는 법원사무직 과정으로, 참여 교수진의 2020 대비 민법 입문특강 및 2021 대비 1~5순환 신규과정을 배수 제한 없이 무제한으로 수강 가능합니다.</li>
            </ul>

            <p class="NSK-Black"><span>●</span> 수강관련</p>
            <ul>
                <li>[내강의실]-[무한PASS존]-[강좌추가]버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                <li>본 PASS는 일시정지/연장/재수강 기능을 제공하지 않습니다.</li>
                <li>본 PASS 수강 시 이용가능한 기기는 PC/모바일 총 2대입니다.</li>
                <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>
            </ul>

            <p class="NSK-Black"><span>●</span> 환불정책</p>
            <ul>
                <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 정가 기준으로 계산하여 사용 일수만큼 차감하고 환불됩니다.</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Container -->

<script type="text/javascript">
    /*스크롤고정*/
    $(function() {
        var nav = $('.evtMenu');
        var navTop = nav.offset().top+100;
        var navHeight = nav.height()+10;
        var showFlag = false;
        nav.css('top', -navHeight+'px');
        $(window).scroll(function () {
            var winTop = $(this).scrollTop();
            if (winTop >= navTop) {
                if (showFlag == false) {
                    showFlag = true;
                    nav
                        .addClass('fixed')
                        .stop().animate({'top' : '0px'}, 100);
                }
            } else if (winTop <= navTop) {
                if (showFlag) {
                    showFlag = false;
                    nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                        nav.removeClass('fixed');
                    });
                }
            }
        });
    });

    $(window).on('scroll', function() {
        $('.top-tab').each(function() {
            if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                $('.top-tab').removeClass('active')
                $(this).addClass('active');
            }
        });
    });

    /*수강신청 동의*/ 
    function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
    }    
    

    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDownText('{{$arr_promotion_params['edate']}}');
    });

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop