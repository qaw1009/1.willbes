@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    등록기기 정보
                </div>
            </div>
        </div>

        <div class="willbes-Txt NGR c_both mt20">
            <div class="willbes-Txt-Tit NG">· 기기등록 유의사항 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
            - MAC Address란 컴퓨터 내부에 장착된 LAN 카드고유의 일련번호를 말합니다.<br/>
            - <span class="tx-red">MAC Address는 PC/모바일 제한없이 최대 2대까지 등록이 가능합니다.</span><br/>
            - 기기정보는 수강신청 후 강의시청시 자동으로 저장됩니다.<br/>
            <div class="willbes-Txt-Tit NG mt20">· 등록기기 초기화(삭제 유의사항)</div>
            - 초기화(삭제)는 기기불량 등으로 인한 제품변경이나 A/S를 받은경우, 기기를 새로 구매한 경우 이용해 주시기 바랍니다.<br/>
            - 부득이하게 등록된 컴퓨터나 스마트기기의 변경을 원하실 겅우, 고객센터(1544-5006)로 전화주시기 바랍니다.<br/>
            - 회원님께서 직접 등록기기 초기화(삭제) (MAC Address 초기화)를 하실수 있으며, <span class="tx-red">직접 초기화(삭제)횟수는 1회로 제한됩니다.</span><br/>
            - 수강중인 강좌가 없거나 현재 수강중인 강좌가 있어도 등록기기 초기화가 가능합니다.<br/>
        </div>
        <form name="deviceForm" id="deviceForm" >
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="page" id="page" value="1" />
            <input type="hidden" name="sdate" id="sdate" value="" />
            <input type="hidden" name="edate" id="edate" value="{{date("Y-m-d", time())}}" />
            <div class="willbes-User-Tablet">
                <dl>
                    <dt>등록현황 PC {{$data['pc_cnt']}}대 + 모바일 {{$data['mobile_cnt']}}대</dt>
                    <dt><span class="row-line">|</span></dt>
                    <dt>초기화가능 횟수 <span class="tx-red">{{$data['member_reset']}}</span>회</dt>
                </dl>
                <ul>
                    <li><a href="javascript:;" onclick="fnDate('{{date("Y-m-d", strtotime(date('Y-m-d').'-15day'))}}', this)">15일</a></li>
                    <li><a href="javascript:;" onclick="fnDate('{{date("Y-m-d", strtotime(date('Y-m-d').'-1month'))}}', this)">1개월</a></li>
                    <li><a href="javascript:;" onclick="fnDate('{{date("Y-m-d", strtotime(date('Y-m-d').'-3month'))}}', this)">3개월</a></li>
                    <li><a class="on" href="javascript:;" onclick="fnDate('', this)">전체</a></li>
                </ul>
            </div>
        </form>
        <div class="tabletTabs c_both" id="devicelist"></div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

    </div>
    <!-- End Container -->
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

            url = "{{ front_url("/classroom/pass/ajaxMyDevice/") }}";
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
            url = "{{ front_url("/classroom/pass/delMyDevice/") }}";
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
@stop