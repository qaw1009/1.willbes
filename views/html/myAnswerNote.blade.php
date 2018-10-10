@extends('willbes.pc.layouts.master_popup')

@section('content')
<!-- Popup -->
<div class="Popup ExamBox">
	<div class="popTitBox">
		<div class="pop-Tit NG"><img src="{{ img_url('/mypage/logo.gif') }}"> 전국 모의고사</div>
		<div class="pop-subTit">2018 제2회 전국모의고사 (12/03 사행) - 9급 [일행/세무] *선택과목 과학 제외</div>
	</div>
	<div class="popupContainer">
		<ul class="tabSty">
			<li><a href="{{ site_url('/home/html/statsTotalList') }}">전체 성적 분석</a></li>
			<li><a href="{{ site_url('/home/html/statsSubjectList') }}">과목별 문항분석</a></li>
			<li class="active"><a href="#none">오답노트</a></li>
		</ul>
		<!-- //tab -->
		<div class="wBx mgT1 mgB1 mt30">
			<table cellspacing="0" cellpadding="0" class="findTb">
				<colgroup>
					<col style="width: 120px"/>
					<col width="*">
				</colgroup>
				<tbody>
					<tr>
						<th>문제선택</th>
						<td class="pl15">
							<select class="sele" id="ITEMID" name="ITEMID" onchange="">
								<option value="국어">국어</option>
								<option value="영어">영어</option>
								<option value="한국사">한국사</option>
								<option value="행정법">행정법</option>
								<option value="행정학">행정학</option>
							</select>
							<select class="sele" id="CORRECTYN" name="CORRECTYN">
								<option value="">전체문항</option>
								<option value="Y">정답문항</option>
								<option value="N">오답문항</option>
							</select>
							<select class="sele" id="QUESTIONYN" name="QUESTIONYN">
								<option value="1" selected="">문제만보기</option>
								<option value="2">문제+해설보기</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>영역선택</th>
						<td class="pl15">
							<div class="f_left chkWp">
								<input type="checkbox" id="ID_ALL" name="ID_ALL" value="0"><label for="ID_ALL">전체영역</label>
								<span id="QUESTIONRANGEID">
                                    <input type="checkbox" id="ID" name="ID" value="1"><label for="ID">국어문법</label>
                                    <input type="checkbox" id="ID" name="ID" value="2"><label for="ID">국어규범</label>
                                    <input type="checkbox" id="ID" name="ID" value="3"><label for="ID">비문학</label>
                                    <input type="checkbox" id="ID" name="ID" value="4"><label for="ID">현대문학</label>
                                    <input type="checkbox" id="ID" name="ID" value="5"><label for="ID">어휘와 한자</label>
                                    <input type="checkbox" id="ID" name="ID" value="6"><label for="ID">고전문학</label>
                                    <input type="checkbox" id="ID" name="ID" value="30"><label for="ID">한자</label>
                                </span>
							</div>
							<div class="f_right btnAgR mr20">
								<a class="btnGray" href="#none">조회</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
        </div>
		<div class="btnAgR mgB1 mr20">
			<a class="btnBlue" href="{{ site_url('/home/html/answerNote') }}">전체 문제보기</a>
			<a class="btnGray" href="#none">출력하기</a>
        </div>
		<div class="wBx">
			<ul class="exam-paperList mgB3">
				<li>
					<a name="que4" class="no">01.</a>
					<span class="que"><img src="{{ img_url('/sample/imgFileView1.jpg') }}"></span>
					<div class="btnAgR">
						<a href="#none" class="btnM1 btnlineBlue">문항삭제</a>
						<a href="#none" class="btnM2 btnGray">메모</a>
						<a href="#none" class="btnM3 btnGray">메모저장후추가</a>
					</div>
					<div class="agR">
						<textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
					</div>
				</li>
				<li>
					<a name="que4" class="no">04.</a>
					<span class="que"><img src="{{ img_url('/sample/imgFileView4.jpg') }}"></span>
					<div class="btnAgR">
						<a href="#none" class="btnM1 btnlineBlue">문항삭제</a>
						<a href="#none" class="btnM2 btnGray">메모</a>
						<a href="#none" class="btnM3 btnGray">메모저장후추가</a>
					</div>
					<div class="agR">
						<textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
					</div>
				</li>
				<li>
					<a name="que4" class="no">06.</a>
					<span class="que"><img src="{{ img_url('/sample/imgFileView2.jpg') }}"></span>
					<div class="btnAgR">
						<a href="#none" class="btnM1 btnlineBlue">문항삭제</a>
						<a href="#none" class="btnM2 btnGray">메모</a>
						<a href="#none" class="btnM3 btnGray">메모저장후추가</a>
					</div>
					<div class="agR">
						<textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- //popupContainer -->
</div>
<!-- End Popup -->
<script type="text/javascript">
	$(function() {
		$('.btnAgR a.btnM2').click(function() {

			var $textarea_layer = $(this).parents('li').find('textarea');
			var $btn2_layer = $(this).parents('li').find('a.btnM2');
			var $btn3_layer = $(this).parents('li').find('a.btnM3');

			$btn2_layer.hide();
			$btn3_layer.css('display','inline-block');
			$textarea_layer.css('display','inline-block');
		});
	});
</script>
@stop