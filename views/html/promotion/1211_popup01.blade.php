@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
<!-- Container -->
<style type="text/css">
    .willbes-Layer-PassBox {height:auto; padding:0}
</style>

<div class="willbes-Layer-PassBox NGR">
    <div class="markingTilte">
        <span>일반 채점</span>
        <div class="btns3">
            <a href="javascript:window.close()">닫기</a>
        </div>
    </div>
    <div class="omrWarp">
            <!--문제지-->
            <div class="omrL">
            	<ul class="tabSt1 NGEB">
                    <li><a href="#none" class="active">한국사</a></li>
                    <li><a href="#none">영어</a></li>
                    <li><a href="#none">형법</a></li>
                    <li><a href="#none">형사소송법</a></li>
                    <li><a href="#none">경찰학개론</a></li>
                </ul>
                <div class="paper">
                    <iframe src="/public/uploads/lms/predict/37/Q_2f7e5f150dbe5810da0b3a5c8f7e74cf.pdf" name="frmL" id="frmL" width="99%" height="650px" marginwidth="0" marginheight="0" scrolling="yes" frameborder="0" ></iframe>
                    <img src="http://file3.willbes.net/new_cop/2018/12/20181221j_default.jpg" width="100%"/>
                </div>
            </div>
            <!--omrL//-->


            <!--답안지-->
            <div class="omrR">
                <p>왼쪽 문제에 맞춰 실제 시험에서 제출한 문항별 답안지를 체크해 주세요.</p>
                <div>
                    <table class="boardTypeB">
                        <col width="20%" />
                        <col width="20%" />
                        <col width="20%" />
                        <col width="20%" />
                        <col width="20%" />
                        <tr>
                            <th scope="col">번호</th>
                            <th scope="col">1번</th>
                            <th scope="col">2번</th>
                            <th scope="col">3번</th>
                            <th scope="col">4번</th>
                        </tr>
                        <tr class="check">
                            <td>1</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><input type="radio" name="" id="" value="1"></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>3</td>
                            <td><input type="radio" name="" id="" value="1"></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3" checked></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><input type="radio" name="" id="" value="1"></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><input type="radio" name="" id="" value="1"></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>6</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><input type="radio" name="" id="" value="1"></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>8</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>9</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>10</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>11</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td><input type="radio" name="" id="" value="1"></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>13</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td><input type="radio" name="" id="" value="1"></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td><input type="radio" name="" id="" value="1"></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>16</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><input type="radio" name="" id="" value="1"></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>18</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>19</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                        <tr class="check">
                            <td>20</td>
                            <td><input type="radio" name="" id="" value="1" checked></td>
                            <td><input type="radio" name="" id="" value="2"></td>
                            <td><input type="radio" name="" id="" value="3"></td>
                            <td><input type="radio" name="" id="" value="4"></td>
                        </tr>
                    </table>
                    <div class="btns2">
                        <a href="javascript:fn_Save()">저장</a>
                    </div>
                </div>
                <div class="btns">
                    <a href="javascript:fn_DetScore()">채점완료</a> <a href="javascript:fn_close()" class="btn2">채점취소</a>
                </div>
            </div><!--omrR//-->
        </div><!--omrWarp//-->  
    </form>
</div>
<!--willbes-Layer-PassBox//-->



@stop