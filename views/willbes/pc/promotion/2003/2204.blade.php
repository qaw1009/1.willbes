@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
/*****************************************************************/  

.sky {position:fixed; top:250px; right:10px; z-index:2;}

.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2204_top_bg.jpg) no-repeat center top;}
.evt_top .youtube {padding-top:150px;}

.evt03 {background:#edd6c0;}
.evt03 .p_re {width:1120px; margin:0 auto}
.evt03 .p_re a:hover {background:rgba(0,0,0,.3)}

/*타이머*/
.newTopDday * {font-size:24px}
.newTopDday {background:#e4e4e4; width:100%; padding:15px 0 40px}
.newTopDday ul {width:1120px; margin:0 auto;}
.newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-size:28px; height:60px; line-height:60px; padding-top:10px !important; font-weight:bold; color:#000}
.newTopDday ul li strong {line-height:60px}
.newTopDday ul li img {width:50px}
.newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; font-size:16px; color:#666; line-height:2.5; }
.newTopDday ul li:first-child span { font-size:28px; color:#000; }
.newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:60px}
.newTopDday ul:after {content:""; display:block; clear:both}

.evt04 {padding-bottom:100px;}


</style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer"> 

        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2207" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2204_sky.png" alt="선석 티패스" />
            </a>
        </div>        

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2204_top.jpg" alt="밑바닥 기초영어 선석">  
            <div class="youtube">
                <iframe width="850" height="480" src="https://www.youtube.com/embed/zMd06TYCzGo?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
            </div>
        </div>

        <div class="evtCtnsBox evt01">            
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2204_01.jpg" alt="어떤 수험생에게 필요한가요?">
        </div>     

        <div class="evtCtnsBox evt02">            
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2204_02.jpg" alt="지금부터 시작">
        </div>    

        <div class="evtCtnsBox evt03">            
            <!-- 타이머 -->
            <div id="newTopDday" class="newTopDday NG">        
                <div>
                    <ul>
                        <li>    
                            <span class="NGEB">마감까지</span>
                        </li>
                        <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                        <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                        <li><strong>일</strong></li>
                        <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                        <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                        <li><strong>:</strong></li>
                        <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                        <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                        <li><strong>:</strong></li>
                        <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                        <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                        <li>
                            남았습니다.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p_re"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2204_03.jpg" alt="동영상 강의 80% 할인">       
                <a href="javascript:void(0);" title="쿠폰 다운로드" onclick="giveCheck();" style="position: absolute; left: 25.55%; top: 80.14%; width: 23.54%; height: 6.86%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/184485" target="_blank" title="동영상 강의 수강신청" style="position: absolute; left: 50.55%; top: 80.14%; width: 23.54%; height: 6.86%; z-index: 2;"></a> 
            </div>   
        </div>  

        <div class="evtCtnsBox evt04">            
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2204_04.jpg" alt="2022 공무원 합격을 경험하고 싶다면?">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif            
        </div>                            
              
    </div>
     <!-- End Container -->

     <script>
         var $regi_form = $('#regi_form');

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(strtotime(date('YmdHi')) >= strtotime($arr_promotion_params['edate']))
                alert('이벤트가 종료되었습니다.');
                return;
            @endif

            @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다.');
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    @stop