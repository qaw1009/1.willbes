@extends('willbes.pc.layouts.master_popup')

@section('content')
<!-- Popup -->
<div class="Popup willbes-Layer-PassBox">
    <div class="popupContainer">
        <div class="lecMoreWrap pt10">
            <div class="PASSZONE-List widthAutoFull">
                <div class="passzoneTitInfo tx-light-blue tx-center NG">8/13 빅매지2 - 경행경채 모의고사</div>
                <div class="PASSZONE-Lec-Section">
                    <div class="Search-Result strong mb15 tx-gray">· 응시과목</div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable usertestTable under-gray bdt-gray tx-gray GM">
                            <colgroup>
                                <col style="width: 20%;"/>
                                <col style="width: 20%;"/>
                                <col style="width: 20%;"/>
                                <col style="width: 20%;"/>
                                <col style="width: 20%;"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="Top" colspan="3">필수과목</th>
                                    <th>선택과목1</th>
                                    <th>선택과목2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="Top">국어</td>
                                    <td>영어</td>
                                    <td>한국사</td>
                                    <td>행정법</td>
                                    <td>행정학</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="PASSZONE-Lec-Section pt40">
                    <div class="Search-Result strong mb15 tx-gray">· 응시기간 및 시험시간</div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable usertestTable under-gray bdt-gray tx-gray GM">
                            <colgroup>
                                <col style="width: 40%;"/>
                                <col style="width: 30%;"/>
                                <col style="width: 30%;"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="Top">응시기간</th>
                                    <th>시험시간</th>
                                    <th>남은시간</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="Top">2018-00-00 00:00 ~ 2018-00-00 00:00</td>
                                    <td>1시간 40분 (100분)</td>
                                    <td>1시간 00분 50초</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="passzonefinInfo tx-gray tx-center mt50">
                    답안제출이 모두 완료되었습니다.<br/>
                    성적이 집계된 후 성적표를 확인할 수 있습니다.<br/>
                    <strong>시험을 끝내시면 재응시할 수 없습니다.</strong><br/>
                    <div>
                        * 성적표는 시험응시일 마감 이후 3일 ~ 5일 안에 제공<br/>
                        * 성적확인 메뉴 : 내강의실 > 모의고사관리 > 성적결과
                    </div>
                </div>
                <div class="passzonebtn tx-center mt30 none">
                    <span>
                        <button type="submit" onclick="" class="btnAuto130 h36 mem-Btn bg-black bd-dark-gray strong">
                            <span class="strong">시험종료</span>
                        </button>
                    </span>
                    <span>
                        <button type="submit" onclick="" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
                            <span class="strong">답안다시확인</span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- //popupContainer -->
</div>
<!-- End Popup -->
@stop