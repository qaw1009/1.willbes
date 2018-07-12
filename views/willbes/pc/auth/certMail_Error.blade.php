@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">이메일인증</span>
        </div>

        <!-- 유효기간경과 -->
        <div class="Member mem-Expired widthAuto690">
            <div class="user-Txt tx-black tx-left">
                {{$msg}}
            </div>
            @if(empty($returnurl) == false)
                <div class="info-Txt tx-black">
                    <div class="info-Txt-box tx-left">
                        인증 메일 발송 후 <strong class="tx-red valign-base">30분간 인증이 유효</strong>합니다.<br/>
                        다시 인증해 주시기 바랍니다.<br/>
                        <div class="expired-Btn btnAuto130 h36">
                            <button type="submit" id="btn_ok" class="mem-Btn bg-blue bd-dark-blue">
                                <span>확인</span>
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="searchclear-Btn btnAuto180 mt50 h36">
                    <button type="submit" id="btn_ok" class="mem-Btn bg-blue bd-dark-blue">
                        <span>확인</span>
                    </button>
                </div>
            @endif
        </div>
        <!-- End 유효기간경과 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
    <script>
        $(document).ready(function() {
            $('#btn_ok').click(function (){
                location.replace('@if(empty($returnurl))/@else{{$returnurl}}@endif');
            });
        });
    </script>
@stop