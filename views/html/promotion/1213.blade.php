@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">

    
    <!-- Container -->   

<div class="p_re evtContent NSK-Thin" id="evtContainer">
    @include('html.1210_top')

    <div class="evtCtnsBox">  
        <div class="sub_warp">
            <div class="sub4_1">
                <h2>시험총평 및 기출해설</h2>
                <table cellspacing="0" cellpadding="0" class="boardTypeB">
                    <col />
                    <tr>
                        <th width="15%">과목</th>
                        <th width="20%">교수 </th>
                        <th>강의명</th>
                        <th width="10%">해설자료</th>
                        <th width="10%">해설강의 </th>
                    </tr>	
                    <tr>
                        <td>형사소송법</td>
                        <td>
                            {{--lms에 등록된 강좌 리스트 (104X104) 사진 불러오기--}}
                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50547/lec_list_505471.png" title="신광은 교수" /> 신광은 교수
                        </td>
                        <td>2019년 1차 경찰채용 필기시험 형사소송법 해설 </td>
                        <td><a href="#none" class="btn_data" alt="해설자료"></a></td>
                        <td><a href="#none" class="btn_lec" alt="해설강의"></a></td>                        
                    </tr>
                    <tr>
                        <td>경찰학개론</td>
                        <td><img src="https://police.willbes.net/public/uploads/willbes/professor/50031/lec_list_50031.png" title="장정훈 교수" /> 장정훈 교수</td>
                        <td>2019년 1차 경찰채용 필기시험 경찰학개론 해설 </td>
                        <td>준비중</td>
                        <td><a href="#none" class="btn_lec" alt="해설강의"></a></td>                        
                    </tr>
                    <tr>
                        <td>형법</td>
                        <td><img src="https://police.willbes.net/public/uploads/willbes/professor/50297/lec_list_50297.png" title="김원욱 교수" /> 김원욱 교수</td>
                        <td>2019년 1차 경찰채용 필기시험 형법 해설 </td>
                        <td><a href="#none" class="btn_data" alt="해설자료"></a></td>
                        <td>준비중</td>                        
                    </tr>
                </table>
            </div>

            <div class="m_section3_5">시험지 및 정답 다운로드
                <a href="#none" target="_blank">바로가기 ▶</a>
            </div>
        </div>        
    </div>
    <!--evtCtnsBox//-->
    
</div>
<!-- End Container -->

@stop