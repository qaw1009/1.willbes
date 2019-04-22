@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
<!-- Container -->
<style type="text/css">
    .willbes-Layer-PassBox {height:auto;}
</style>

<div class="willbes-Layer-PassBox NGR">
    <div class="markingTilte">
        <span>점수 직접 입력</span>
        <div class="btns3">
            <a href="javascript:window.close()">닫기</a>
        </div>
    </div>
    <div class="omrWarp">
        <div class="qMarking">
            <div class="selfMarking">
                <table class="boardTypeB">
                    <col width="40%" />
                    <col width="" />
                    <tr>
                        <th scope="col">과목</th>
                        <th scope="col">점수입력</th>
                    </tr>
                    <tr>
                        <td>한국사</td>
                        <td><input name=" " type="number" id=" " value=" " maxlength="3"> 점</td>
                    </tr>
                    <tr>
                        <td>영어</td>
                        <td><input name=" " type="number" id=" " value=" " maxlength="3"> 점</td>
                    </tr>
                    <tr>
                        <td>형법</td>
                        <td><input name=" " type="number" id=" " value=" " maxlength="3"> 점</td>
                    </tr>
                    <tr>
                        <td>형사소송법</td>
                        <td><input name=" " type="number" id=" " value=" " maxlength="3"> 점</td>
                    </tr>
                    <tr>
                        <td>경찰학개론</td>
                        <td><input name=" " type="number" id=" " value=" " maxlength="3"> 점</td>
                    </tr>
                </table>
                <p>* 점수를 직접 입력 하실 경우, 정오표는 별도로 제공되지 않습니다.</p>
            </div>
        </div>
    </div><!--omrWarp//-->
      
    <div class="btns">
        <a href="javascript:fn_Submit();">채점완료</a> <a href="javascript:fn_Clean()" class="btn2">채점취소</a>
    </div>
    </form>
</div>
<!--willbes-Layer-PassBox//-->



@stop