@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">

    
    <!-- Container -->   

<div class="p_re evtContent NSK-Thin" id="evtContainer">
    @include('html.1210_top')

    <div class="evtCtnsBox">   
        <div class="s_section2" id="sub2">
            <div class="s_section2_wrap">
                <h2><span>2018 채점</span> 서비스</h2>
                시험 채점 및 응시 전형에 필요한 개인 정보와 전형정보를 입력/관리하는 페이지입니다.
                <div>
                    <p>채점 시 유의사항</p>
                    <ul>
                        <li>▶ 성적 신뢰도를 위해 최초채점을 제외하고 2회까지만 재채점을 통해 수정이 가능하오니, 신중하게 채점해 주시기 바랍니다.</li>
                        <li>▶ 채점하는 방식은 본인의 상황에 맞게 선택하실 수 있습니다.<br />
                            - '<strong>일반채점</strong>'은 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크하는 방식입니다.<br />
                            - '<strong>빠른채점</strong>'은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력하는 방식입니다.<br />
                            - '<strong>직접입력</strong>'은 별도 채점 없이 본인의 점수를 직접 입력하는 방식입니다.<br />
                        </li>
                        <li>▶ 채점 후 '지금 성적을 반영합니다' 버튼을 반드시 눌러야 전형정보 관리에 성적이 반영됩니다.</li>
                        <li>▶ 기본정보는 사전예약 기간에만(~12/21) 수정이 가능하며, 본 서비스 오픈 후에는(12/22~) 수정이 불가합니다. </li>
                    </ul>
                </div>
            </div>
        </div>	

        
    </div>
    <!--evtCtnsBox//-->
    
</div>
<!-- End Container -->



@stop