@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
<!-- Container -->
<style type="text/css">
    .willbes-Layer-PassBox {height:auto; padding:0}
</style>

<div class="willbes-Layer-PassBox NGR">
    <div class="markingTilte">
        <span>정오표</span>
        <div class="btns3">
            <a href="javascript:window.close()">닫기</a>
        </div>
    </div>
    <div class="omrWarp">
        <ul class="errata">
            <li>
                <p>과목1</p>
                <table class="boardTypeB">
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <tr>
                        <th scope="col">구분</th>
                        <th scope="col">정오</th>
                        <th scope="col">정답</th>
                        <th scope="col">내답</th>
                    </tr>
                    <tr class="check">
                        <th>1번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>2번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>3번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>4번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>5번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>6번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>7번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>8번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>9번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>10번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>11번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>12번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>13번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>14번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>15번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>16번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>17번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>18번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>19번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>1</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>20번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>2</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>점수</th>
                        <th colspan="3">40 점</th>
                    </tr>
                </table>
            </li>
            <li>
                <p>과목2</p>
                <table class="boardTypeB">
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <tr>
                        <th scope="col">구분</th>
                        <th scope="col">정오</th>
                        <th scope="col">정답</th>
                        <th scope="col">내답</th>
                    </tr>
                    <tr class="check">
                        <th>1번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>2번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>3번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>4번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>5번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>6번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>7번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>8번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>9번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>10번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>11번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>12번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>13번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>14번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>15번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>16번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>17번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>18번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>19번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>1</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>20번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>2</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>점수</th>
                        <th colspan="3">40 점</th>
                    </tr>
                </table>
            </li>
            <li>
                <p>과목3</p>
                <table class="boardTypeB">
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <tr>
                        <th scope="col">구분</th>
                        <th scope="col">정오</th>
                        <th scope="col">정답</th>
                        <th scope="col">내답</th>
                    </tr>
                    <tr class="check">
                        <th>1번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>2번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>3번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>4번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>5번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>6번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>7번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>8번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>9번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>10번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>11번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>12번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>13번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>14번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>15번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>16번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>17번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>18번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>19번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>1</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>20번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>2</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>점수</th>
                        <th colspan="3">40 점</th>
                    </tr>
                </table>
            </li>
            <li>
                <p>과목4</p>
                <table class="boardTypeB">
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <tr>
                        <th scope="col">구분</th>
                        <th scope="col">정오</th>
                        <th scope="col">정답</th>
                        <th scope="col">내답</th>
                    </tr>
                    <tr class="check">
                        <th>1번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>2번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>3번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>4번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>5번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>6번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>7번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>8번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>9번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>10번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>11번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>12번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>13번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>14번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>15번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>16번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>17번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>18번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>19번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>1</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>20번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>2</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>점수</th>
                        <th colspan="3">40 점</th>
                    </tr>
                </table>
            </li>
            <li>
                <p>과목5</p>
                <table class="boardTypeB">
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <tr>
                        <th scope="col">구분</th>
                        <th scope="col">정오</th>
                        <th scope="col">정답</th>
                        <th scope="col">내답</th>
                    </tr>
                    <tr class="check">
                        <th>1번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>2번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>3번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>4번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>5번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>6번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>7번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>8번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>9번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>10번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>11번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>12번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr class="check">
                        <th>13번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>14번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>15번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>16번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>17번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr class="check">
                        <th>18번</th>
                        <td>O</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>19번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>1</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>20번</th>
                        <td><span class="tx-red">X</span></td>
                        <td>2</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>점수</th>
                        <th colspan="3">40 점</th>
                    </tr>
                </table>
            </li>
        </ul>
    </div><!--omrWarp//-->
    {{--
    <div class="btns">
        <a href="#none">수정하기</a>
        <a href="#none" class="btn2">내성적 확인하기</a>
    </div>
    --}}
    </form>
</div>
<!--willbes-Layer-PassBox//-->



@stop