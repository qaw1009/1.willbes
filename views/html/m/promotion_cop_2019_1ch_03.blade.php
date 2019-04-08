@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="predictWrap">
        <div class="willbes-Tit"> 
            합격예측 풀서비스 <span class="NGEB">사전예약</span>
        </div>
        <div class="marktxt2">빠르고 간편한 모바일 전용 채점 서비스 입니다.</div>            
    	<div class="tg-note">
    		<div class="tg-tit"> <a href="#none">채점 시 유의사항<img src="{{ img_url('m/mypage/icon_arrow_off_white.png') }}"></a></div>
    		<div class="tg-cont">
    			<ul>
    				<li>
    					성적 신뢰도를 위해 최초채점을 제외하고 2회까지만 재채점을 통해 수정이 가능합니다.
    				</li>
    				<li>
						채점하는 방식은 본인의 상황에 맞게 선택할 수 있습니다.<br />
                        - '일반채점' : 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크 (PC)<br />
                        - '빠른채점'은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력 (PC/모바일)<br />
                        - '직접입력'은 별도 채점 없이 본인의 점수를 직접 입력 (PC/모바일)                        
					</li>
    				<li>
    					채점 후 ‘완료’ 버튼을 반드시 눌러야 전형정보 관리에 성적이 반영됩니다.
    				</li>
    				<li>
    					기본정보는 사전예약 기간에만(~4/26) 수정이 가능하며, 본 서비스 오픈 후에는(4/27~) 수정이 불가합니다.
    				</li>
                    <li>
                    	자세한 합격예측 분석 데이터는 PC버전에서 확인 가능합니다.
					</li>
    			</ul>    			
    		</div>
        </div>
        <!-- //tg-note -->

        <div class="markMbtn2">
        	<a href="#none" class="btn2">기본정보입력</a>     	
            <a href="javascript:alert('기본정보를 저장하고 채점해주세요.');" >채점 및 성적확인</a>
        </div>

        <h4 class="markingTit1">채점하기</h4>
        <form name="frm"  id="frm" action="" method="post">
            <ul class="markTab">
                <li><a href="#tab1">빠른채점</a></li>
                <li><a href="#tab2">직접입력</a></li>
            </ul>
            <div id="tab1">
                <div class="marking">
                    <h5>공통과목 : 과목1</h5>
                    <ul>
                        <li>
                            <div>    
                                <label>1 ~ 5번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>6 ~ 10번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>11 ~ 15번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>16 ~ 20번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="marking">
                    <h5>공통과목 : 과목2</h5>
                    <ul>
                        <li>
                            <div>    
                                <label>1 ~ 5번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>6 ~ 10번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>11 ~ 15번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>16 ~ 20번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="marking">
                    <h5>선택과목 : 과목1</h5>
                    <ul>
                        <li>
                            <div>    
                                <label>1 ~ 5번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>6 ~ 10번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>11 ~ 15번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>16 ~ 20번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="marking">
                    <h5>선택과목 : 과목2</h5>
                    <ul>
                        <li>
                            <div>    
                                <label>1 ~ 5번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>6 ~ 10번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>11 ~ 15번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>16 ~ 20번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="marking">
                    <h5>선택과목 : 과목3</h5>
                    <ul>
                        <li>
                            <div>    
                                <label>1 ~ 5번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>6 ~ 10번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>11 ~ 15번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>16 ~ 20번</label>
                                <input value="" type="number" maxlength="5" name="" id="">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mt10 tx-center">
                    답안을 다시 한번 확인 하시고,
                    하단 완료 버튼을 눌러 주세요.
                </div>
                <div class="markSbtn1">
                    <a href="#none">완료</a>
                    <a href="#none" class="btn3">취소</a>
                </div>
            </div>

            <div id="tab2">
                <div class="marking marking2">
                    <ul>
                        <li>
                            <div>    
                                <label>공통과목1</label>
                                <input value="" type="number" maxlength="3" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>공통과목2</label>
                                <input value="" type="number" maxlength="3" name="" id="">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="marking marking3">
                    <ul>
                        <li>
                            <div>    
                                <label>선택과목1</label>
                                <input value="" type="number" maxlength="3" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>선택과목2</label>
                                <input value="" type="number" maxlength="3" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div>    
                                <label>선택과목3</label>
                                <input value="" type="number" maxlength="3" name="" id="">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mt10 tx-center">
                    점수를 직접 입력 하실 경우, 
                    정오표는 별도로 제공되지 않습니다.
                </div>
                <div class="markSbtn1">
                    <a href="#none">완료</a>
                    <a href="#none" class="btn3">취소</a>
                </div>
            </div>
            
        </form>

        
        
        
    </div>  
    <!-- predictWrap //-->
    
    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

</div>
<!-- End Container -->

<script type="text/javascript">
    $(function() {
        $('.tg-tit a').click(function() {
            var $lec_buy_table = $('.tg-cont');

            if ($lec_buy_table.is(':hidden')) {
                $lec_buy_table.show().css('visibility','visible');
                $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off_white.png');
            } else {
                $lec_buy_table.hide().css('visibility','hidden');
                $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on_white.png');
            }
        });
    });

    /*tab*/
    $(document).ready(function(){
        $('.markTab').each(function(){
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
</script>
@stop