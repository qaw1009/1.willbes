@extends('willbes.pc.layouts.master_popup')
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
                @foreach($subject_list as $key => $val)
                <li>
                    <p>{{ $val['CcdName'] }}</p>
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
                        @foreach($newQuestion['QuestionNO'][$val['PpIdx']] as $key2 => $val2)
                        <tr class="check">
                            <th>{{ $val2 }}</th>
                            <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][$key2] !!}</td>
                            <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][$key2] }}</td>
                            <td>{{ $newQuestion['Answer'][$val['PpIdx']][$key2] }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th>점수</th>
                            <th colspan="3">{{ $newQuestion['OrgPoint'][$val['PpIdx']][0] }} 점</th>
                        </tr>
                    </table>
                </li>
                @endforeach

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