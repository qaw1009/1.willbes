@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
.leaveArmyJoin div h3 {    
    text-align:center;
    font-size:30px;
    border-bottom:3px solid #000;
    padding:20px 0;
}
.leaveArmyJoin span {vertical-align:top}
.laj_sec {font-size:14px; line-height:1.4}
.laj_sec .infoBox {margin-bottom:30px; border-bottom:1px dotted #666; padding-bottom:30px}
.laj_sec .infoBox p {font-size:16px; margin-bottom:20px}
.laj_sec .infoBox li {margin-left:20px; list-style:disc}
.laj_sec input[type=text]  {
    background: #fff;
    height: 25px;
    border: 1px solid #d4d4d4;
    line-height: 25px;
}
.attach > li {
    margin-bottom:5px;
}
.attach > li strong {
    display: inline-block;
    width: 80px;
    text-align:center;
}
.laj_sec textarea {
    text-align:left;
    border:1px solid #e2e2e2;
    padding:10px;
    width: 95%;
    resize: none;
}
.laj_sec .termsBx01 {padding:10px ; height:100px; overflow:hidden; overflow-y:scroll; border:1px solid #cecece;}
.laj_sec .termsBx01 li {margin-bottom:10px}


</style>
<div class="willbes-Layer-PassBox leaveArmyJoin NSK">
    <div><h3 class="NSK-Black"><span class="tx-red">올라에듀</span> 온라인회원 <span class="tx-red">T-PASS</span> 전용인증</h3></div>
    <div class="laj_sec"> 
        <div class="infoBox">
            <p>윌비스 경찰 온라인T-PASS 할인쿠폰 인증을 위한 사이트입니다.
            올라에듀(온라인 전용)T-PASS회원들 께서는 지금듣고있는 강의구매내역 캡쳐본이나 영수증 부분을 인증해주시기 바랍니다.
            인증을 받으셔야 이벤트혜택이 적용되어니 사이트 이용에 참고하시기 바랍니다.</p>
            <ul>
                <li>[올라에듀 전용]윌비스경찰 올인원 T-PASS 구매하시기전 꼭! 필수인증하시기 바랍니다.</li>
                <li><strong class="tx-red">올라에듀 온라인 각 교수님 T-PASS 구매내역을 증빙할수 있는서류 제출 필수</strong></li>
                <li>인증후에 관리자 승인시 <strong class="tx-red">윌비스아이디로 자동 201,000원 할인쿠폰이 발급</strong>됩니다.</li>
                <li>승인후에 인증회원 전용 <strong class="tx-red">윌비스교수님 T-PASS 결제링크를 추후 문자</strong>로 보내드립니다.</li>
                <li>할인쿠폰은 3명 교수님 <strong class="tx-red">T-PASS 할인쿠폰 총 3장</strong>입니다.(쿠폰유효기간 : 7일)</li>
                <li>헌법 : 이국령 / 형사법 :임종희 / 형사법 :문형석&김한기</li>
                <li><strong>T-PASS 강의기간 : 23년 1차 시험일 까지 (3월 31일까지)</strong></li>
            </ul>
        </div>       
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}        
            <h4>수강생 정보</h4> 
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                    <caption>가입정보</caption>
                    <thead>
                        <tr>
                            <th class="w-tit">이름</th>
                            <th class="w-tit">아이디</th>
                            <th class="w-tit">전화번호</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input id="ARM_NM" name="ARM_NM" type="text"></td>
                            <td><input id="ARM_DIV" name="ARM_DIV" type="text"></td>                      
                            <td><input id="ARM_RANK" name="ARM_RANK" type="text"></td>
                        </tr>
                        <tr>
                            <td colspan="3">* 전화번호를 꼭 확인해 주세요. 인증완료시 SMS로 발송될 예정입니다.</td>
                        </tr>
                    </tbody>
                </table>
                <h4 class="mt40">인증 파일 등록</h4> 
                <ul class="attach">
                    <li>
                        <strong>첨부 파일</strong>                      
                        <!--div class="filetype">
                            <input type="text" class="file-text" />
                            <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                            <span class="file-select"-->
                                <input type="file" class="input-file" size="3" id="attachfile" name="attachfile" >
                            <!--/span>
                            <input class="file-reset NSK" type="button" value="X" />
                        </div-->
                    </li>
                    <li>* 파일의 크기는 2MB까지 업로드 가능</li>
                    <li>* 이미지파일 (jpg, png등) 또는 PDF 파일 첨부</li>
                    <li>* 관리자 인증 시, SMS로 개별 알림</li>
                    <li>* 인증시간 : 오후 4시 이전 요청시, 당일 인증 완료 / 오후 4시 이후 요청시 익일 인증완료.</li>
                    <li>* 증빙서류 미비시 승인거절될수 있습니다.</li>
                </ul>

                <h4 class="mt40">개인정보 수집/이용 동의 안내</h4>
                <div class="termsBx01">
                    <ul>
                        <li>
                            1. 개인정보 수집 이용 목적<br>
                            - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br>
                            - 이벤트 참여에 따른 경품 지급</li> 
                        <li>
                            2. 개인정보 수집 항목<br>
                            - 신청인의 이름,아이디,전화번호</li> 
                        <li>
                            3. 개인정보 이용기간 및 보유기간<br>
                            - 본 수집, 활용목적 달성 후 바로 파기</li> 
                        <li>
                            4. 개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                            - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                        </li> 
                    </ul>                  
                </div>
                <div class="mt20">
                    위의 내용을 이해하였으며 위와 같은 개인정보 수집 이용에 
                    <label for="ACCEPT_YN1"><input type="radio" name="ACCEPT_YN" value="Y" id="ACCEPT_YN1"> 동의합니다. </label>
                    <label for="ACCEPT_YN2"><input type="radio" name="ACCEPT_YN" value="N" id="ACCEPT_YN2"> 동의하지 않습니다.</label>
                </div>
            </div>

            <div class="laj_btns">
                <a href="#none" class="btnA">
                    인증요청
                </a>
                <a href="#none">
                    취소
                </a>
            </div>
        </form>
    </div>   
</div>
<!--willbes-Layer-PassBox//-->

@stop