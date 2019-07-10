<ul class="tabMock three">
    <li><a class="@if($page_type=='info') on @endif" href="{{front_url('/mockTest/info/cate/'.$__cfg['CateCode'])}}">모의고사안내</a></li>
    <li><a class="@if($page_type=='apply') on @endif" href="{{front_url('/mockTest/apply/cate/'.$__cfg['CateCode'])}}">모의고사접수</a></li>
    <li><a class="@if($page_type=='board' || $page_type=='board_etc') on @endif" href="{{front_url('/mockTest/board/cate/'.$__cfg['CateCode'])}}">이의제기/정오표</a></li>
</ul>
@if($page_type != 'board_etc')
    <div class="willbes-Cart-Txt NG mt30 p_re">
        <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
            <tbody>
            <tr>
                <td>
                    @if($page_type=='info')
                    · 모의고사 접수 프로세스<br/>
                    &nbsp; 접수할 모의고사명 클릭 → 접수 정보 입력 → 결제하기 → 결제완료 → 응시표 출력(해당 모의고사명 클릭)<br/>
                    · 나의 모의고사 접수현황은 내강의실 > 모의고사관리 > 접수현황에서 확인 가능합니다.<br/>
                    @elseif($page_type=='apply')
                    · 모의고사 접수 프로세스<br/>
                    &nbsp; 접수할 모의고사명 클릭 → 접수 정보 입력 → 결제하기 → 결제완료 → 응시표 출력(해당 모의고사명 클릭)<br/>
                    · 나의 모의고사 접수현황은 내강의실 > 모의고사관리 > 접수 현황에서 확인 가능합니다.<br/>
                    · 결제 후 모의고사 응시정보 수정은 불가능하며, 응시정보 수정을 원하실 경우 환불 후 접수기간 내에 재결제하셔야 합니다.<br/>
                    @elseif($page_type=='board')
                    · 응시중인 모의고사만 이의제기 등록이 가능합니다.(단, 내가 응시한 모의고사만 이의제기 등록 가능)<br/>
                    · 응시기간 종료시 이의제기 등록이 불가능합니다.<br/>
                    · 이의제기 및 정오표 보기는 응시기간과 무관하게 확인할 수 있습니다.<br/>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endif