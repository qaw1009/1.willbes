
<a class="closeBtn" href="#none" onclick="closeWin('MyDevice')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">등록기기정보</div>

<div class="lecMoreWrap">

    <div class="PASSZONE-List widthAutoFull">
        <ul class="passzoneInfo tx-gray NGR">
            <li class="tit strong">· 기기등록 유의사항</li>
            <li class="txt">- MAC Address란 컴퓨터 내부에 장착된 LAN 카드 고유의 일련번호를 말합니다.</li>
            <li class="txt tx-red">- MAC Address는 PC/모바일 제한없이 최대 2대까지 등록이 가능합니다.</li>
            <li class="txt">- 기기정보는 수강신청후 강의시청 시 자동으로 저장됩니다.</li>
            <li class="tit strong mt30">· 등록기기 초기화(삭제)유의사항</li>
            <li class="txt">- 초기화(삭제)는 기기불량 등으로 인한 제품변경이나 A/S를 받은 경우,기기를 새로 구매한 경우 이용해 주시기 바랍니다.</li>
            <li class="txt">- 부득이하게 등록된 컴퓨터나 스마트기기의 변경을 원하실 경우, 고객센터(1544-5006)로 전화주시기 바랍니다.</li>
            <li class="txt">- 회원님께서 직접 등록기기 초기화(삭제)(MAC Address 초기화)를 하실 수 있으며, <span class="tx-red">직접 초기화(삭제) 횟수는 1회로 제한됩니다.</span></li>
            <li class="txt">- 수강중인 강좌가 없거나 현재 수강중인 강좌가 있어도 등록기기 초기화가 가능합니다.</li>
        </ul>
        <div class="PASSZONE-User-Tablets NG">
            <ul>
                <li>
                    <dl>
                        <dt class="w-tit">기기등록현황</dt>
                        <dt>PC {{$data['pc_cnt']}}대 + 모바일 {{$data['mobile_cnt']}}대</dt>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="w-tit">초기화가능횟수 : <span class="tx-red">{{$data['member_reset']}}</span>회</dt>
                        <dt style="margin: 0;"><span class="row-line">|</span></dt>
                        <dt>총초기화(삭제)횟수 : {{$data['reset_cnt']}}회</dt>
                    </dl>
                </li>
            </ul>
        </div>
        <div class="PASSZONE-Lec-Section">
            <div class="Search-Result strong mt25 mb10 tx-gray">· 기기등록 / 초기화(삭제) 내역</div>
            <form name="deviceForm" id="deviceForm" >
                <input type="hidden" name="page" id="page" value="1" />
                <input type="hidden" name="sdate" id="sdate" value="" />
                <input type="hidden" name="edate" id="edate" value="{{date("Y-m-d", time())}}" />
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray h42 mb10">
                    <!-- <span class="w-data">
                        기간검색
                        <input type="text" id="search_start_date" name="search_start_date" class="iptDate datepicker" maxlength="10" autocomplete="off"> ~&nbsp;
                        <input type="text" id="search_end_date" name="search_end_date" class="iptDate datepicker" maxlength="10" autocomplete="off">
                    </span> -->
                    <span class="w-month">
                        <ul>
                            <li><a class="btn-set-search-date on" data-period="0-all" style="cursor:pointer;" onclick="fnDate('', this)">전체</a></li>
                            <li><a class="btn-set-search-date" data-period="1-months" style="cursor:pointer;" onclick="fnDate('{{date("Y-m-d", strtotime(date('Y-m-d').'-1month'))}}', this)">1개월</a></li>
                            <li><a class="btn-set-search-date" data-period="3-months" style="cursor:pointer;" onclick="fnDate('{{date("Y-m-d", strtotime(date('Y-m-d').'-3month'))}}', this)">3개월</a></li>
                            <li><a class="btn-set-search-date" data-period="6-months" style="cursor:pointer;" onclick="fnDate('{{date("Y-m-d", strtotime(date('Y-m-d').'-6month'))}}', this)">6개월</a></li>
                        </ul>
                    </span>
                </div>
            </form>
            <div class="LeclistTable bdt-gray" id="devicelist"></div>
        </div>
    </div>
    <!-- PASSZONE-List -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        fnDeviceList(1)
    });

    function fnDate($sdate, obj)
    {
        $(obj).parent().parent().find('a').removeClass();
        $(obj).addClass('on');
        $('#sdate').val($sdate);
        fnDeviceList(1);
    }

    function fnDeviceList($page)
    {
        $("#page").val($page);

        url = "{{ site_url("/classroom/pass/ajaxMyDevice/") }}";
        data = $('#deviceForm').serialize();

        sendAjax(url,
            data,
            function(d){
                $("#devicelist").html(d).end();
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, false, 'GET', 'html');
    }

    function fnDeviceReset(mdidx)
    {
        url = "{{ site_url("/classroom/pass/delMyDevice/") }}";
        data = 'mdidx=' + mdidx;

        sendAjax(url,
            data,
            function(d){
                alert('초기화되었습니다.');
                fnDeviceList($('#page').val());
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, false, 'GET', 'json');
    }
</script>

