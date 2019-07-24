@extends('html.m.layouts.master')

@section('content')
<link href="/public/css/willbes/promotion/2002_1332M.css" rel="stylesheet">

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
    					기본정보는 사전예약 기간에만(~8/30) 수정이 가능하며, 본 서비스 오픈 후에는(8/31~) 수정이 불가합니다.
    				</li>
                    <li>
                    	자세한 합격예측 분석 데이터는 PC버전에서 확인 가능합니다.
					</li>
    			</ul>    			
    		</div>
        </div>
        <!-- //tg-note -->

        <div class="markMbtn2">
        	<a href="#none">기본정보입력</a>        	
            <a href="javascript:alert('4월27일(토) 오픈예정입니다.')" class="btn2">채점 및 성적확인</a>
            {{-- 27일부터 보이는 버튼
            <a href="javascript:alert('기본정보를 저장하고 채점해주세요.');" class="btn2">채점 및 성적확인</a>
            --}}
        </div>

        <h4 class="markingTit1">기본정보입력</h4>
        <form name="frm"  id="frm" action="" method="post">
            <table cellspacing="0" cellpadding="0" class="table_type">
                <col width="20%" />
                <col width="*" />
                <tr>
                <th>직렬(직류)</th>
                <td>
                    <select title="응시직렬" name="test_subject" id="test_subject" >
                        <option value="">응시직렬</option>
                        <option  value="">직렬1</option>
                        <option  value="">직렬2</option>
                        <option  value="">직렬3</option>
                    </select>                         
                    <select title="지역구분" id="listview" name="listview">
                        <option value="">지역구분</option>
                        <option value="">지역1</option>
                        <option value="">지역2</option>
                        <option value="">지역3</option>
                    </select>
                </td>
                </tr>
                <tr>
                    <th>응시과목</th>
                    <td>
                        {{--직렬/지역 선택 전--}}
                        직렬(지역)구분을 선택해주세요.
                        {{--직렬/지역 선택 후--}}
                        <div>
                            <p>공통과목 : 과목1, 과목2</p>
                            <p>선택과목(3과목)를 체크해주세요.</p>
                            <ul class="sel_info">
                                <li><input type="checkbox" name="aa1" id="aa1" value="" > <label for="aa1">선택과목A</label></li>
                                <li><input type="checkbox" name="aa2" id="aa2" value="" > <label for="aa2">선택과목B</label></li>
                                <li><input type="checkbox" name="aa3" id="aa3" value="" > <label for="aa3">선택과목C</label></li>
                                <li><input type="checkbox" name="aa4" id="aa4" value="" > <label for="aa4">선택과목D</label></li>
                                <li><input type="checkbox" name="aa5" id="aa5" value="" > <label for="aa5">선택과목E</label></li>
                                <li><input type="checkbox" name="aa6" id="aa6" value="" > <label for="aa6">선택과목F</label></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>시험응시번호</th>
                    <td>
                        <label>
                            <input type="text" name="textfield" id="textfield" onkeyup="fn_OnlyNumber(this);"> 
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>가산점 여부</th>
                    <td>                        
                        <ul class="sel_info">
                            <li><input type="radio" name="gasan1" id="gasan1" value="A" /> <label for="gasan1">5점</label></li>
                            <li><input type="radio" name="gasan2" id="gasan2" value="B" /> <label for="gasan2">4점</label></li>
                            <li><input type="radio" name="gasan3" id="gasan3" value="C" /> <label for="gasan3">3점</label></li>
                            <li><input type="radio" name="gasan4" id="gasan4" value="D" /> <label for="gasan4">2점</label></li>
                            <li><input type="radio" name="gasan5" id="gasan5" value="E" /> <label for="gasan5">1점</label></li>
                            <li><input type="radio" name="gasan6" id="gasan6" value="F" /> <label for="gasan6">없음</label></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>신광은팀<br />수강 </th>
                    <td>
                        <ul class="sel_info">
                            <li><input type="radio" name="lec1" id="lec1" value="A" /> <label for="lec1">온라인강의</label></li>
                            <li><input type="radio" name="lec2" id="lec2" value="B" /> <label for="lec2">학원강의</label></li>
                            <li><input type="radio" name="lec3" id="lec3" value="C" /> <label for="lec3">온라인+학원강의</label></li>
                            <li><input type="radio" name="lec4" id="lec4" value="D" /> <label for="lec4">미수강</label></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>시험<br />준비 기간 </th>
                    <td>
                        <ul class="sel_info">
                            <li><input type="radio" name="term1" id="term1" value="A" /> <label for="term1">6개월 이하</label></li>
                            <li><input type="radio" name="term2" id="term2" value="B" /> <label for="term2">1년 이하</label></li>
                            <li><input type="radio" name="term3" id="term3" value="C" /> <label for="term3">2년 이하</label></li>
                            <li><input type="radio" name="term4" id="term4" value="D" /> <label for="term4">2년 이상</label></li>
                        </ul>
                    </td>
                </tr>
            </table>
        </form>
        
        <div class="markSbtn1">
            <a href="#none">저장</a>
        </div>
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
</script>
@stop