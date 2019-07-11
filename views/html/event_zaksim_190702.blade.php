@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
.popWrap {width:782px; margin:20px auto; border:1px solid #000; box-shadow:5px 5px 5px rgba(0,0,0,.1)}
.popWrap * {font-family:'Noto Sans KR', Arial, Sans-serif}

.popWrap span {vertical-align:auto}
.popWrap .logo {padding-top:10px; position:relative;}
.popWrap .logo .zaksim {position:absolute; top:22px; right:30px; z-index:10}

.copyright {position:relative; background:#fee9a3; padding:40px; margin-bottom:30px}
.copyright span {display:block; width:150px; height:150px; border-radius:75px 0 75px 75px; background:#051a2b; text-align:center; color:#fff; 
    font-weight:bold; font-size:24px; padding-top:35px; line-height:1.4;
}
.copyright div {position:absolute; top:50px; left:240px; font-size:18px; line-height:1.5; color:#051a2b; padding-right:40px}
.copyright div h4 {font-size:40px; font-weight:bold; border-bottom:1px dotted #051a2b}
.copyright div p {font-size:12px; margin-top:10px; color:#000}

input[type=text] {padding:2px; width:150px}
input {margin-right:5px}
label {vertical-align:middle; margin-right:10px;}
input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
select {padding:5px;}
select option:before {height:20px}

.popCts {padding:0 50px 50px; letter-spacing: -1px;}
.popCts h4 {margin-bottom:20px; font-size:18px; font-weight:bold}
.popCts table {width:100%; border-top:2px solid #8f8f8f; border-bottom:1px solid #8f8f8f; margin:20px 0}
.popCts th,
.popCts td {border-bottom:1px solid #d9d9d9; padding:10px; line-height:1.4}
.popCts td strong {font-size:13px; color:#000}
.popCts thead th {background:#f8f8f8; color:#555; font-weight:bold; text-align:center;}
.popCts tbody th {background:#f9f2eb}
.popCts tbody td {text-align:left}
.popCts > ul {margin-bottom:30px}
.popCts > ul:last-child {margin:0}
.popCts li {line-height:1.5; list-style:disc; margin-left:15px}
.cl01 {color:#051a2b; padding:10px 0; font-weight:bold}

.popCts .btns {margin:30px 0 60px; text-align:center}
.popCts .btns a {display:inline-block; height:50px; padding:0 20px; background:#051a2b; font-size:160%; color:#fff; line-height:50px; font-weight:500; border-radius:10px}	
.popCts .btns a:hover {background:#1f326a; color:#fff}
</style>

<div class="popWrap NGR">
    <div class="logo">
        <img src="https://police.stage.willbes.net/public/img/willbes/gnb/logo.gif" alt="윌비스" />
        <span class="zaksim"><img src="https://static.willbes.net/public/images/btob/zaksim_logo_b.png" alt="작심독서실" /></span>
    </div>
    <div class="copyright">
        <span>제휴<br>인증센터</span>
        <div>
            윌비스 신광은 경찰/공무원 & 작심독서실
            <h4>온라인 강좌 수강신청</h4>
            <p>대한민국 1등 윌비스 신광은경찰 및 공무원 & 업계성장률 1위<br> 프리미엄 독서실 국민브랜드 '작심'이 함께 열공 지원합니다.</p>
        </div>
    </div>
    <div class="popCts">
        <h4>◎ 작심회원 인증 정보 입력</h4>
        • 윌비스 회원이 아니신 분은 회원 가입 후 신청해 주세요. (로그인 필수)
        <form id="form1" name="form1" method="post" action="">
            <table>
                <col width="20%"/>
                <col />                
                <tbody>
                    <tr>
                        <th>지점정보</th>
                        <td>
                            <select name="select1" id="select1">
                                <option>지역</option>
                                <option>서울</option>
                                <option>경기</option>
                            </select>
                            <select name="select2" id="select2">
                                <option>독서실명</option>
                                <option>노량진</option>
                                <option>신림</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>신청강좌</th>
                        <td>
                            <select name="select3" id="select3">
                                <option>수험직렬</option>
                                <option>9급</option>
                                <option>7급</option>
                            </select>
                            <select name="select4" id="select4">
                                <option>신청강좌</option>
                                <option>국어</option>
                                <option>영어</option>
                            </select>
                         </td>
                    </tr>
                </tbody>
            </table>
            <input type="checkbox" name="checkbox2" id="checkbox2" /><label for="checkbox2">아래 콘텐츠 및 개인정보 이용안내 관련한 내용을 확인하였고, 이에 동의합니다. (필수)</label>
        </form>

        <div class="btns">
            <a href="javascript:fn_submit()">작심회원 인증 신청하기</a>
        </div>

        <h4>◎ 콘텐츠 및 개인정보 이용 안내</h4>
        <div class="cl01">[콘텐츠 이용안내]</div>
        <ul>
            <li>해당 콘텐츠는 작심독서실 1개월(30일), 작심스터디카페 4주권 또는 월 100시간권 이상 이상 이용권을 결제한 작심 회원 대상입니다.</li>
            <li>지점에 따라 제공이 불가능할 수 있습니다.(해당 지점에 확인해주세요.)</li>
            <li>지급 강좌는 좌석 이용기간이 만료되면 종료됩니다.</li>
            <li>아이디공유, 재판매, 양도시에는 콘텐츠는 지급대상에서 제외되며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
            <li>수강시 이용 가능한 기기는 PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능합니다.</li>
            <li>인증 신청 후 승인 완료는 해당 지점에 문의해 주세요.</li>
            <li>동영상 수강과 관련한 문의사항은 윌비스 온라인 고객센터(1544-5066)로 문의해 주세요.</li>

        </ul>
        <div class="cl01">[개인정보 이용안내]</div>
        <ul>
            <li>
            본 서비스는 작심독서실 이용자에 한해 제공되며, 이용자 확인을 위해 다음과 같이 개인정보가 제공됩니다.
            <table>
                <col width="55%"/>
                <col />                
                <tbody>
                    <tr>
                        <th>개인정보 항목</th>
                        <td>회원명,아이디,연락처,생년월일(성별)</td>
                    </tr>
                    <tr>
                        <th>개인정보를 제공 받는 자</th>
                        <td>㈜아이엔지스토리 '작심독서실', '작심스터디카페'</td>
                    </tr>
                    <tr>
                        <th>개인정보를 제공 받는 자의 개인정보 이용목적</th>
                        <td>'작심독서실', '작심스터디카페' 이용자 확인</td>
                    </tr>
                    <tr>
                        <th>개인정보를 제공 받는 자의 개인정보 이용기간 및 보유기간</th>
                        <td>제휴 종료 시</td>
                    </tr>
                </tbody>
            </table>
            </li>
            <li>상기 개인정보 제공 및 활용에 대한 동의를 거부할 수 있으며, 동의를 거부하실 경우 이용이 제한될 수 있습니다.</li>
        </ul>
     
    </div>
    <!--popCts//-->            
</div>

@stop