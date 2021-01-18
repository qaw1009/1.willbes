@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .Container {width:100%; max-width:720px; margin:0 auto; position:relative;}    
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}   
    .evt01 {margin:50px auto; padding:10px; text-align:left; font-size:16px; line-height:1.4}   
    .evt01 .info {font-size:14px;}
    .evt01 .info ul {border:1px solid #ccc; background:#f4f4f4; padding:20px; margin:20px 0 10px;}
    .evt01 .info li {margin-left:20px; list-style:disc; margin-bottom:5px}
    .evt01 .info ul:after {content:""; display:block; clear:both}    
    .table_wrap {padding:10px 0}
    .table_wrap table {width:100%; border-top:1px solid #d0d2d9; background:#fff; margin-top:10px !important}
    .table_wrap table:first-of-type{margin-top:0}
    .table_wrap table td,
    .table_wrap table th{padding:10px; border:1px solid #d0d2d9; border-left:0; border-top:0; font-size:15px; text-align:center}
    .table_wrap table th{color:#767987; font-weight:500; background:#dfe1e7}
    .table_wrap table td{color:#444;padding:10px; line-height:1.5; text-align:left}
    .table_wrap table tr:first-of-type th{border-top:1px solid #d0d2d9}
    .table_wrap table tr th:first-of-type,
    .table_wrap table tr td:first-of-type{border-left:1px solid #d0d2d9}
    .table_wrap table input {width:100px}
    .evt01 .btnSet {width:80%; margin:50px auto}
    .evt01 .btnSet a {display:block; padding:20px 0; text-align:center; font-size:25px; font-weight:bold; background:#427eec; color:#fff; border-radius:50px}
    .evt01 .btnSet a:hover {background:#333;}
    .evt01 input,
    .evt01 label {vertical-align:middle}
    .evt01 label {margin-left:5px; font-size:14px}
    .evt01 input[type=checkbox] {width:20px; height:20px}
</style>

<div id="Container" class="Container NSK c_both">  

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2039_top.jpg" alt="2022학년도 대비 합격전략 설명회"/>       
    </div>

    <form>
        <div class="evtCtnsBox evt01">
            안녕하세요.<br>
            윌비스 임용고시학원입니다.  <br>
            <br>
            2022학년도대비 연간패키지 수강이벤트 당첨을 진심으로 축하드립니다. <br>
            경품인 모바일 문화상품권의 제공을 위해 개인정보보호관계 법령에 따라 고객님의 개인 정보 수집 관련 안내문을 아래와 같이 고지드립니다. <br>
            <br>
            홈페이지 로그인 후, 동의 여부 체크 및 개인 정보 기재를 <span class="tx-red">2021년 01월 27일(수)까지</span> 부탁드립니다.<br>
            * 기일내 정보 미입력 및 비 동의시 모바일 문화상품권 발송이 지연됩니다.<br>
            <div class="info">
                <ul>
                    <li>개인정보 및 고유식별정보 수집/이용 동의<br>   
                    1) 개인정보의 수집ㆍ이용 목적 : 경품(문화상품권) 지급 및 기타소득 신고 처리를 위한 수집<br>
                    2) 수집하려는 개인정보의 항목 : 학원ID, 이름, 연락처, 주민등록번호, 수강과목<br>
                    3) 개인정보의 보유 및 이용 기간 : 소득세법에 따라 5년간 보관<br>
                    4) 동의를 거부할 권리가 있다는 사실 및 동의 거부에 따른 불이익이 있는 경우에는 그 불이익의 내용: 고객님은 동의를 거부하실 수 있으며, 거부 시 경품 지급이 불가합니다. </li>
                    <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
                    <li>개인정보 수집/이용에 동의하셨으면, 아래 사항을 기재해 주시기 바랍니다.</li>
                </ul>
                <label><input type="checkbox"> 윌비스에 개인정보 제공 동의하기(필수)</label>
            </div>
            <div class="table_wrap">
                <table>
                    <col width="20%">
                    <col>
                    <tbody>
                        <tr>
                            <th>* 성명/ID</th>
                            <td>홍길동 / willbes</td>
                        </tr>
                        <tr>
                            <th>* 연락처</th>
                            <td>010-1234-5678</td>
                        </tr>
                        <tr>
                            <th>* 주민번호</th>
                            <td>
                                <input name="" id="" style="width:100px;" type="text" value=""> - 
                                <input name="" id="" style="width:100px;" type="text" value="">
                            </td>
                        </tr>
                        <tr>
                            <th>수강과목</th>
                            <td>
                                <select name="select1" id="select1">
                                    <option>선택</option>
                                    <option>초등 배재민</option>
                                    <option>전공국어 송원영</option>
                                    <option>전공국어 권보민</option>
                                    <option>전공영어 김유석</option>
                                    <option>전공수학 김철홍</option>
                                    <option>수학교육론 박태영</option>
                                    <option>도덕윤리 김병찬</option>
                                    <option>전공역사 최용림</option>
                                    <option>전공음악 다이애나</option>
                                    <option>전기·전자 최우영</option>
                                    <option>정보컴퓨터 송광진</option>
                                    <option>전공중국어 정경미</option>
                                </select>
                                <p class="tx12 mt10">* 상품권은 작성된 문자로 발송됩니다. 연락처 수정은 홈페이지 상단 “내강의실”에서 변경할 수 있습니다. </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="btnSet">
                    <a href="#none">문화상품권 신청하기 ></a>
                </div>
            </div>
        </div>
    </form> 

</div>
<!-- End Container -->

@stop