@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">통합회원가입</span>
        </div>
        <!-- 통합회원가입 : 회원가입완료 -->
        <div class="Member mem-CombineFin widthAuto690">
            <ul class="tabs-Step mb60">
                <li>본인인증</li>
                <li>약관동의/정보입력</li>
                <li class="on">회원가입완료</li>
            </ul>
            <div class="user-Txt tx-black">
                <span class="tx-blue">{{$MemName}}</span>님, <strong>윌비스 통합 회원 가입을 환영합니다.</strong></br>
                아이디<span class="tx-blue"> {{$MemId}}</span>로 모든 윌비스 서비스를 이용하실 수 있습니다.
            </div>
            <img class="mt70" src="{{ img_url('login/willbes_welcome.jpg') }}">
            <div class="info-Txt info-Txt-Wrap tx-black bg-none mt60">
                <strong class="tx-gray">시작할 서비스를 선택해 주세요</strong>
                <select id="site" name="site" title="선택안함" class="seleSite">
                    <option value="/">선택안함</option>
                    @foreach($Site as $row)
                        <option value="//{{ $row['SiteUrl'] }}">{{ $row['SiteName'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" id="btn_start" class="mem-Btn h36 mt70 bg-blue bd-dark-blue">
                <span>시작하기</span>
            </button>
        </div>
        <!-- End 통합회원가입 : 회원가입완료 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btn_start').click(function () {
                var url = $("#site option:selected").val();
                location.replace(url);
            });
        });
    </script>
@stop