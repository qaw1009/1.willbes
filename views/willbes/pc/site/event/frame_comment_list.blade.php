@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')

<div class="willbes-Leclist c_both mt50" style="padding-bottom: 40px;">
    <div class="LeclistTable p_re">
        <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black bdb-gray tx-gray">
            <colgroup>
                <col style="width: 830px;">
                <col style="width: 110px;">
            </colgroup>
            <thead>
            <tr>
                <th class="w-textarea pl20 pt25"><textarea placeholder="댓글을 입력해 주세요."></textarea></th>
                <th class="w-btn pr20 pt25">
                    <button type="submit" onclick="" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                        <span>등록</span>
                    </button>
                </th>
            </tr>
            <tr>
                <td class="w-list tx-left pl20 bd-none" colspan="2">* 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</td>
            </tr>
            </thead>
        </table>
        <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black bdb-gray tx-gray mt30">
            <colgroup>
                <col style="width: 95px;">
                <col style="width: 90px;">
                <col style="width: 615px;">
                <col style="width: 140px;">
            </colgroup>
            <thead>
            <tr>
                <td class="w-no"><img src="{{ img_url('sub/icon_notice.gif') }}"></td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                <td class="w-more"><a class="tx-light-blue" href="#none" onclick="openWin('NOTICEPASS')">자세히보기 ></a></td>
            </tr>
            <tr>
                <td class="w-no"><img src="{{ img_url('sub/icon_notice.gif') }}"></td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20">공지사항 제목이 노출됩니다.</td>
                <td class="w-more"><a class="tx-light-blue" href="#none">자세히보기 ></a></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="w-no">홍길동</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">
                    2018년 하반기 경찰공무원 경력경쟁채용시험 공고<a class="w-del" href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a>
                </td>
            </tr>
            <tr>
                <td class="w-no">홍길*</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">
                    이벤트에 참여해 봤자 어차피 당첨이 안되서 별관심 없었는데 신광은 교수님 너무 좋아하고 존경하여 참여하게 되었습니다.<br/>
                    모를 행운이 언젠간 올 수도 있겠죠? ㅎ 다른분이 당첨되셔도 미리 축하 말씀드릴께욧! 신광은 경찰팀 파이팅! 그뒤에서 묵묵히<br/>
                    주시는 직원분들도 팟팅하시구요 감기 조심하세요 ㅎㅎ 어홍헝홍홍ㅋㅋ
                </td>
            </tr>
            <tr>
                <td class="w-no">홍길*</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
            </tr>
            <tr>
                <td class="w-no">홍길*</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
            </tr>
            <tr>
                <td class="w-no">홍길*</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
            </tr>
            <tr>
                <td class="w-no">홍길*</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
            </tr>
            <tr>
                <td class="w-no">홍길*</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
            </tr>
            <tr>
                <td class="w-no">홍길*</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
            </tr>
            <tr>
                <td class="w-no">홍길*</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
            </tr>
            <tr>
                <td class="w-no">홍길*</td>
                <td class="w-date">2018-00-00</td>
                <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
            </tr>
            </tbody>
        </table>
        <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right p_ab" style="right: 0;">
            <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                <span>목록</span>
            </button>
        </div>
        <div class="Paging">
            <ul>
                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                <li><a href="#none">2</a><span class="row-line">|</span></li>
                <li><a href="#none">3</a><span class="row-line">|</span></li>
                <li><a href="#none">4</a><span class="row-line">|</span></li>
                <li><a href="#none">5</a><span class="row-line">|</span></li>
                <li><a href="#none">6</a><span class="row-line">|</span></li>
                <li><a href="#none">7</a><span class="row-line">|</span></li>
                <li><a href="#none">8</a><span class="row-line">|</span></li>
                <li><a href="#none">9</a><span class="row-line">|</span></li>
                <li><a href="#none">10</a></li>
                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
            </ul>
        </div>
    </div>
</div>

@stop