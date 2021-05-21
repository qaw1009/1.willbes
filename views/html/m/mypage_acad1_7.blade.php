@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>   
                보강/복습동영상 신청
            </div>
        </div>
    </div> 

    <div class="paymentWrap mt20">
        <div class="paymentCtsEnd">
            <h4>회원정보</h4>
            <table>
                <colgroup>
                    <col style="width: 80px;">
                    <col>
                    <col style="width: 80px">
                    <col>
                </colgroup>
                <tbody>
                    <tr class="bgst01">
                        <th>회원명</th>
                        <td>윌비스</td>
                        <th>아이디</th>
                        <td>ABC****</td>
                    </tr>                
                </tbody>
            </table>

            <h4>강좌정보</h4>
            <table>
                <colgroup>
                    <col style="width: 80px;">
                    <col>
                    <col style="width: 80px">
                    <col>
                </colgroup>
                </tbody>
                    <tr class="bgst01">
                        <th>종합반명</th>
                        <td colspan="3"> [2020학년도]민쌤의 유아임용 합격생 간담회</td>
                    </tr>
                    <tr class="bgst01">
                        <th>과목</th>
                        <td>유아</td>
                        <th>강사명</th>
                        <td>민정선</td>
                    </tr>
                    <tr class="bgst01">
                        <th>강좌명</th>
                        <td colspan="3" class="tx-blue">2020 (9~10월) 실전 모의고사반 (7주)</td>
                    </tr>
                </tbody>
            </table>

            <h4>보강/복습동영상 신청하기</h4>
            <table>
                <colgroup>
                    <col style="width:100px">
                    <col>
                </colgroup>
                </tbody>
                    <tr>
                        <th>신청현황</th>
                        <td class="w-info tx-left">[총 신청 가능 개수] 2개  <span class="row-line">|</span>  [사용개수] 2개   <span class="row-line">|</span>  [남은개수] 1개</td>
                    </tr>
                    <tr>
                        <th>수업불참강의</th>
                        <td class="w-info tx-left">
                            <select id="" name="" title="" style="width:100%">
                                <option>강의선택</option>
                                <option>강의1</option>
                                <option>강의2</option>
                                <option>강의3</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>불참사유</th>
                        <td class="w-info tx-left"><textarea style="height:50px; overflow-h:over; width:100%"></textarea></td>
                    </tr>
                </tbody>
            </table>
            
            <div class="mb30 lh1_5 tx14">
            ⓘ 주의사항<br>
                - 보강/복습동영상 1회 신청 시 1회차 신청만 가능합니다.<br>
                - 보강/복습동영상은 2일 기간으로 제공되며, <span class="tx-red">수강시작을 하지 않으면 7일 이후에 자동으로 수강시작됩니다.</span><br>
                - 신청한 보강/복습동영상은 <span class="tx-blue">내강의실 > 학원강좌 > 보강/복습동영상</span> 메뉴에서 확인 가능합니다.<br>
                - 보강/복습동영상 신청은 종강 후 14일 이내까지 신청 가능합니다.
            </div>

            <h4>[보강/복습동영상 신청이력]</h4>
            <table>
                <colgroup>
                    <col style="width: 60px;">
                    <col style="width: 150px;">
                    <col style="width: 70px;">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>신청일</th>
                        <th>신청자</th>
                        <th>불참사유</th>
                    </tr>
                </thead>
                </tbody>
                    <tr class="tx-center">
                        <td>2</td>
                        <td>2021-00-00 15:35</td>
                        <td>홍길동</td>
                        <td>병가로 결석</td>
                    </tr>
                    <tr class="tx-center">
                        <td>1</td>
                        <td>2021-00-00 15:35</td>
                        <td>홍길동</td>
                        <td>병가로 결석</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="lec-btns w100p">
        <ul>
            <li><a href="#none" class="btn-purple">보강/복습동영상신청 ></a></li>
        </ul>
    </div>
   

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>

    
    <!-- Topbtn -->
</div>
<!-- End Container -->
@stop