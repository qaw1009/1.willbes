@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    span {vertical-align:auto}
    .eventPop {width:600px; margin:0 auto; font-size:14px; color:#333; line-height:1.5; padding:0 20px 50px; height:700px; overflow-y:auto;}
    .eventPop h3 {position:fixed; top:0; left:50%; margin-left:-300px; font-size:20px; border-bottom:2px solid #000; text-align:center; padding:15px 0; color:#2dda77; width:600px; background:#fff; z-index: 1;} 

    .evt-pop-box01 {padding:15px; background:#f4f4f4}
    .evt-pop-box01 li {list-style:disc; margin-left:20px}

    .evt-pop-box02 {margin-top:20px; border-top:1px solid #666; }
    .evt-pop-box02 li {display:flex; justify-content: space-between; align-items: stretch; border-bottom:1px solid #e4e4e4; padding:10px 0}
    .evt-pop-box02 li:last-child {border-bottom:1px solid #666;}
    .evt-pop-box02 li span {flex-grow: 1; flex-basis: 25%; text-align:center;}
    .evt-pop-box02 li a {color:blue; display:block;}

    .btnSt01 a {border:1px solid #000; padding:5px 10px; background:#fff}
    .btnSt02 a {padding:5px 10px; background:#000; color:#fff}

    .question {margin-top:20px; padding:10px 10px 10px 30px; border:1px solid #ccc; position:relative}
    .question span {position:absolute; top:10px; left:0; background:#ccc; width:25px; height:25px; text-align:center}
    .question ul {margin-top:15px; padding-top:15px; border-top:1px dashed #ccc}
    .question li {list-style-type: decimal; margin-left:20px; vertical-align: text-top; margin-bottom:5px;}

    .explain {padding:10px; border:1px solid #ccc; margin-top:40px}
    .exp-title {color:#2dda77; font-size:16px}
    .exp-title strong {color:#000;}
    .exp-txt {background:#f2fff8; padding:10px; margin-top:10px}
    .exp-txt div {font-weight:bold; color:#000; font-size:16px}

    .explain-X .exp-title {color:red;}
    .explain-X .exp-txt {background:#fceded;}

    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}    
    select,
    input[type=text] {padding:2px; margin-right:10px; height:26px; border:1px solid #e4e4e4}
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}    
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    input + label:hover {cursor: pointer;}
</style>

<form id="" name="" method="post"  action="">
    <div class="eventPop NSK">
        <h3 class="NSK-Black">DAILY QUIZ</h3>  

        {{--퀴즈 리스트--}}
        <div class="mt80">   
            <ul class="evt-pop-box01">
                <li>직전 퀴즈에 참여해 주셔야 다음 퀴즈에 참여하실 수 있습니다.</li>
                <li>한번 체크한 답안은 수정할 수 없습니다.</li>
            </ul>  
            <ul class="evt-pop-box02">
                <li>
                    <span>1회</span>
                    <span>2021.08.02</span>
                    <span><a hreft="#none">DAY 1</a></span>
                    <span>참여완료</span>
                </li>
                <li>
                    <span>2회</span>
                    <span>2021.08.03</span>
                    <span><a hreft="#none">DAY 2</a></span>
                    <span>참여완료</span>
                </li>
                <li>
                    <span>3회</span>
                    <span>2021.08.04</span>
                    <span><a hreft="#none">DAY 4</a></span>
                    <span>참여완료</span>
                </li>
                <li>
                    <span>4회</span>
                    <span>2021.08.05</span>
                    <span><a hreft="#none">DAY 5</a></span>
                    <span>참여완료</span>
                </li>
                <li>
                    <span>5회</span>
                    <span>2021.08.06</span>
                    <span><a hreft="#none">DAY 5</a></span>
                    <span class="tx-red">미참여</span>
                </li>
                <li>
                    <span>6회</span>
                    <span>2021.08.07</span>
                    <span><a hreft="#none">DAY 5</a></span>
                    <span class="tx-red">미참여</span>
                </li>
            </ul>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        {{--문제풀기 정답화면--}}
        <div>
            <ul class="evt-pop-box02 bg-light-gray">
                <li>
                    <span>1회</span>
                    <span>2021.08.02</span>
                    <span><a hreft="#none">DAY 1</a></span>
                </li>
            </ul>

            <div class="btnSt01 mt20 tx-right"><a href="#none">전체퀴즈</a></div>

            <div class="question">
                <span>1</span>
                문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다.

                <ul>
                    <li><input type="radio" name="aa1" id="aa1" value="" > <label for="aa1">보기1</label></li>
                    <li><input type="radio" name="aa2" id="aa2" value="" > <label for="aa2">보기2</label></li>
                    <li><input type="radio" name="aa3" id="aa3" value="" > <label for="aa3">보기3</label></li>
                    <li><input type="radio" name="aa4" id="aa4" value="" > <label for="aa4">보기4</label></li>
                </ul>
            </div>

            <div class="btnSt02 mt20 tx-center"><a href="#none">정답 확인</a></div>

            <div class="explain">
                <p class="exp-title"><strong>[정답 ③]</strong> O 정답입니다. </p>
                <div class="exp-txt">
                    해설이 출력됩니다. 해설이 출력됩니다. 해설이 출력
                    해설이 출력됩니다. 해설이 출력됩니다.<br>
                    해설이 출력됩니다. 해설이 출력됩니다. 해설이 출력
                    해설이 출력됩니다.<br>
                </div>
            </div>

            <div class="btnSt01 mt40 tx-center"><a href="#none">다음 문제 →</a></div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        {{--문제풀기 오답화면--}}
        <div>
            <ul class="evt-pop-box02 bg-light-gray">
                <li>
                    <span>1회</span>
                    <span>2021.08.02</span>
                    <span><a hreft="#none">DAY 1</a></span>
                </li>
            </ul>

            <div class="btnSt01 mt20 tx-right"><a href="#none">전체퀴즈</a></div>

            <div class="question">
                <span>1</span>
                문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다.

                <ul>
                    <li><input type="radio" name="ab1" id="ab1" value="" > <label for="ab1">보기1</label></li>
                    <li><input type="radio" name="ab2" id="ab2" value="" > <label for="ab2">보기2</label></li>
                    <li><input type="radio" name="ab3" id="ab3" value="" > <label for="ab3">보기3</label></li>
                    <li><input type="radio" name="ab4" id="ab4" value="" > <label for="ab4">보기4</label></li>
                </ul>
            </div>

            <div class="btnSt02 mt20 tx-center"><a href="#none">정답 확인</a></div>

            <div class="explain explain-X">
                <p class="exp-title"><strong>[정답 ③]</strong> X 오답입니다. </p>
                <div class="exp-txt">
                    해설이 출력됩니다. 해설이 출력됩니다. 해설이 출력
                    해설이 출력됩니다. 해설이 출력됩니다.<br>
                    해설이 출력됩니다. 해설이 출력됩니다. 해설이 출력
                    해설이 출력됩니다.<br>
                </div>
            </div>

            <div class="btnSt01 mt40 tx-center"><a href="#none">완료</a></div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        {{--정답화면--}}
        <div>
            <ul class="evt-pop-box02 bg-light-gray">
                <li>
                    <span>1회</span>
                    <span>2021.08.02</span>
                    <span><a hreft="#none">DAY 1</a></span>
                </li>
            </ul>

            <div class="btnSt01 mt20 tx-right"><a href="#none">전체퀴즈</a></div>

            <div class="question">
                <span>1</span>
                문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다.

                <ul>
                    <li><input type="radio" name="aa1" id="aa1" value="" > <label for="aa1">보기1</label></li>
                    <li><input type="radio" name="aa2" id="aa2" value="" > <label for="aa2">보기2</label></li>
                    <li><input type="radio" name="aa3" id="aa3" value="" checked> <label for="aa3">보기3</label></li>
                    <li><input type="radio" name="aa4" id="aa4" value="" > <label for="aa4">보기4</label></li>
                </ul>
            </div>

            <div class="explain mt20">
                <p class="exp-title"><strong>[정답 ③]</strong> O 정답입니다. </p>
                <div class="exp-txt">
                    해설이 출력됩니다. 해설이 출력됩니다. 해설이 출력
                    해설이 출력됩니다. 해설이 출력됩니다.<br>
                    해설이 출력됩니다. 해설이 출력됩니다. 해설이 출력
                    해설이 출력됩니다.<br>
                </div>
            </div>

            <div class="btnSt01 mt40 tx-center"><a href="#none">다음 문제 →</a></div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        {{--오답화면--}}
        <div>
            <ul class="evt-pop-box02 bg-light-gray">
                <li>
                    <span>1회</span>
                    <span>2021.08.02</span>
                    <span><a hreft="#none">DAY 1</a></span>
                </li>
            </ul>

            <div class="btnSt01 mt20 tx-right"><a href="#none">전체퀴즈</a></div>

            <div class="question">
                <span>1</span>
                문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다. 문제가 출력됩니다.

                <ul>
                    <li><input type="radio" name="ab1" id="ab1" value="" > <label for="ab1">보기1</label></li>
                    <li><input type="radio" name="ab2" id="ab2" value="" checked> <label for="ab2">보기2</label></li>
                    <li><input type="radio" name="ab3" id="ab3" value=""> <label for="ab3">보기3</label></li>
                    <li><input type="radio" name="ab4" id="ab4" value="" > <label for="ab4">보기4</label></li>
                </ul>
            </div>

            <div class="explain explain-X mt20">
                <p class="exp-title"><strong>[정답 ③]</strong> X 오답입니다. </p>
                <div class="exp-txt">
                    해설이 출력됩니다. 해설이 출력됩니다. 해설이 출력
                    해설이 출력됩니다. 해설이 출력됩니다.<br>
                    해설이 출력됩니다. 해설이 출력됩니다. 해설이 출력
                    해설이 출력됩니다.<br>
                </div>
            </div>

            <div class="btnSt01 mt40 tx-center"><a href="#none">완료</a></div>
        </div>


    </div>
</form>

@stop