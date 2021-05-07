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
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  

.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2204_top_bg.jpg) no-repeat center top;}

.evt03 {background:#edd6c0;}

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


    <div class="evtContent NSK" id="evtContainer"> 

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2204_top.jpg" alt="밑바닥 기초영어 선석">  
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
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2204_03.jpg" alt="동영상 강의 80% 할인">       
            <a href="javascript:void(0);" title="쿠폰 다운로드" style="position: absolute; left: 35.55%; top: 81.14%; width: 14.54%; height: 6.86%; z-index: 2;"></a>   
            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/182220" target="_blank" title="동영상 강의 수강신청" style="position: absolute; left: 50.55%; top: 81.14%; width: 14.54%; height: 6.86%; z-index: 2;"></a>    
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

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    @stop