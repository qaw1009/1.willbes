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
    font-size:12px;
    border:1px solid #e2e2e2;
    padding:10px;
    width: 95%;
    resize: none;
    line-height: 1.3;
}
.laj_sec .termsBx01 {padding:10px ; height:80px; overflow:hidden; overflow-y:scroll; border:1px solid #cecece; line-height:1.5}
.laj_sec .termsBx01 li {margin-bottom:10px}


</style>
<div class="willbes-Layer-PassBox leaveArmyJoin NGR">
    <div><h3 class="NSK">타 학원 수강생 인증</h3></div>
    <div class="laj_sec">        
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
                <h4 class="mt40">학습이력</h4> 
                <ul class="attach">
                    <li>                          
                        <strong>수강사이트</strong>
                        <input id=" " name=" " type="text" style="width:150px;">
                         * 10자 미만 입력                       
                    </li>
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
                </ul>

                <h4 class="mt40">개인정보 수집/이용 동의 안내</h4>
                <div class="termsBx01">
                    <ul>
                        <li>
                            1. 개인정보 수집 이용 목적<br>
                            - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                            - 통계분석 및 마케팅<br>
                            - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                        </li>
                        <li>
                            2. 개인정보 수집 항목<br>
                            - 필수항목 : 성명, 연락처, 이메일
                        </li>
                        <li>
                            3. 개인정보 이용기간 및 보유기간<br>
                            - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                        </li>
                        <li>
                            4. 신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                        </li>
                        <li>
                            5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                        </li>
                        <li>
                            6. 이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.
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
                    등록
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