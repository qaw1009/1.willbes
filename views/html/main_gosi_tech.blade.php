@extends('willbes.pc.layouts.master')

@section('content')
<link href="/public/css/willbes/style_gosi_tech.css??ver={{time()}}" rel="stylesheet">
<style>
/*********************************************     Main Container : tech     *********************************************/

</style>
<!-- Container -->
<div id="Container" class="Container tech NGR c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">온라인공무원<span class="row-line">|</span></li>
                <li class="subTit">기술직</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 gosi">
                        <div class="prof-drop-Box">
                            <h5>9급</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50661/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">김세령</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김영</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50651/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">박초롱</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50309/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이아림</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경춘</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50003/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">원유철</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50441/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">박민주</a>
                                </li>
                                <li>
                                    <span>[행정법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">황남기</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50717/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">한세훈</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">이석준</a>
                                </li>
                                <li>
                                    <span>[행정학]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50041/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">윤세훈</a>
                                    <span>[세법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95">고선미</a>
                                </li>
                                <li>
                                    <span>[회계학]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>
                                    <span>[국제법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50393/?subject_idx=1127&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95">이상구</a>
                                </li>
                                <li>
                                    <span>[사회]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">문병일</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50313/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">한수성</a>
                                    <span>[수학]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50201/?subject_idx=1135&subject_name=%EC%88%98%ED%95%99">곽윤근</a>
                                </li>
                                <li>
                                    <span>[공직선거법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50109/?subject_idx=1137&subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95">황남기</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>7급</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                </li>
                                <li>
                                    <span>[행정법]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50717/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">한세훈</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">황남기</a>
                                    <span>[행정학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50041/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">윤세훈</a>
                                </li>
                                <li>
                                    <span>[헌법]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50139/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">유시완</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50109/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">황남기</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50577/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">박기범</a>
                                    <span>[경제학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50487/?subject_idx=1115&subject_name=%EA%B2%BD%EC%A0%9C%ED%95%99">황정빈</a>
                                </li>
                                <li>
                                    <span>[세법]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95">고선미</a>    
                                    <span>[회계학]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>
                                    <span>[국제법]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">이상구</a>                                    
                                </li>
                                <li>
                                    <span>[국제정치학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50393/?subject_idx=1128&subject_name=%EA%B5%AD%EC%A0%9C%EC%A0%95%EC%B9%98%ED%95%99">이상구</a>                                    
                                    <span>[공직선거법]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50109/?subject_idx=1137&subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95">황남기</a>    
                                    <span>[일본어]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50726/?subject_idx=1161&subject_name=%EC%9D%BC%EB%B3%B8%EC%96%B4">황선아</a>
                                </li>
                                <li>
                                    <span>[G-TELP]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50713/?subject_idx=1177&subject_name=G-TELP">서민지</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50275/?subject_idx=1177&subject_name=G-TELP">이유정</a>                                     
                                    <span>[프랑스어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50001/?subject_idx=1178&subject_name=%ED%94%84%EB%9E%91%EC%8A%A4%EC%96%B4">박훈</a>    
                                </li>
                                <li>
                                    <span>[중국어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50061/?subject_idx=1162&subject_name=%EC%A4%91%EA%B5%AD%EC%96%B4">조소현</a>                                    
                                    <span>[경영학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50549/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99">전수환</a>    
                                    <span>[물리학개론]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50127/?subject_idx=1226&subject_name=%EB%AC%BC%EB%A6%AC%ED%95%99%EA%B0%9C%EB%A1%A0">고진목</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>세무직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김영</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                </li>
                                <li>
                                    <span>[세법]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95">고선미</a>   
                                </li>
                                <li> 
                                    <span>[회계학]</span>                                    
                                    <a href="/professor/show/cate/3022/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>                                 
                                </li>
                                <li>
                                    <span>[사회]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">문병일</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50313/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">한수성</a>
                                </li>
                                <li>
                                    <span>[수학]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50201/?subject_idx=1135&subject_name=%EC%88%98%ED%95%99">곽윤근</a>
                                </li>
                                <li>&nbsp;</li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>법원직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50065/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">이현나</a>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50651/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">박초롱</a>
                                    <a href="/professor/show/cate/3035/prof-idx/50545/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김반이</a>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50571/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">임진석</a>
                                </li>
                                <li>
                                    <span>[헌법]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50591/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">이국령</a>    
                                    <span>[형법]</span>                                    
                                    <a href="/professor/show/cate/3035/prof-idx/50073/?subject_idx=1116&subject_name=%ED%98%95%EB%B2%95">문형석</a>
                                    <span>[형사소송법]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50685/?subject_idx=1117&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95">유안석</a>
                                </li>
                                <li>
                                    <span>[민법]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50519/?subject_idx=1118&subject_name=%EB%AF%BC%EB%B2%95">김동진</a>    
                                    <span>[민사소송법]</span>                                    
                                    <a href="/professor/show/cate/3035/prof-idx/50145/?subject_idx=1119&subject_name=%EB%AF%BC%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95">이덕훈</a>
                                </li>
                            </ul>
                            <h5>소방직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50661/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">김세령</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50309/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이아림</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50479/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이현정</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50565/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">제니</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경준</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50403/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">배준환</a>
                                </li>
                                <li>
                                    <span>[소방학개론]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50465/?subject_idx=1113&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0">김종상</a>    
                                    <span>[사회]</span>                                    
                                    <a href="/professor/show/cate/3023/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">문병일</a>                                    
                                </li>
                                <li>
                                    <span>[소방관계법규]]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50465/?subject_idx=1138&subject_name=%EC%86%8C%EB%B0%A9%EA%B4%80%EA%B3%84%EB%B2%95%EA%B7%9C">김종상</a>
                                    <span>[체력]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50387/?subject_idx=1399&subject_name=%EC%B2%B4%EB%A0%A5">제이슨</a>                                   
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>기술직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김영</a>                                    
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경준</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50441/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">박민주</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                </li>
                                <li>
                                    <span>[보건행정]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50395/?subject_idx=1129&subject_name=%EB%B3%B4%EA%B1%B4%ED%96%89%EC%A0%95">하재남</a>    
                                    <span>[공중보건]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50395/?subject_idx=1130&subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4">하재남</a>
                                    <span>[전기기기]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50718/?subject_idx=1168&subject_name=%EC%A0%84%EA%B8%B0%EA%B8%B0%EA%B8%B0">최우영</a>
                                </li>
                                <li>
                                    <span>[재배학]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99">장사원</a>    
                                    <span>[식용작물]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1172&subject_name=%EC%8B%9D%EC%9A%A9%EC%9E%91%EB%AC%BC">장사원</a>
                                    <span>[통신이론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50718/?subject_idx=1173&subject_name=%EC%A0%84%EA%B8%B0%EC%9D%B4%EB%A1%A0">최우영</a>
                                </li>
                                <li>
                                    <span>[전자공학]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1193&subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99">최우영</a>    
                                    <span>[무선공학]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1194&subject_name=%EB%AC%B4%EC%84%A0%EA%B3%B5%ED%95%99">최우영</a>
                                    <span>[통신이론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1195&subject_name=%ED%86%B5%EC%8B%A0%EC%9D%B4%EB%A1%A0">최우영</a>
                                </li>
                                <li>
                                    <span>[회로이론]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50718/?subject_idx=1198&subject_name=%ED%9A%8C%EB%A1%9C%EC%9D%B4%EB%A1%A0">최우영</a>    
                                    <span>[전기자기학]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1210&subject_name=%EC%A0%84%EA%B8%B0%EC%9E%90%EA%B8%B0%ED%95%99">최우영</a>
                                    <span>[응용역학개론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50435/?subject_idx=1214&subject_name=%EC%9D%91%EC%9A%A9%EC%97%AD%ED%95%99%EA%B0%9C%EB%A1%A0">장성국</a>
                                </li>
                                <li>
                                    <span>[토목설계]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50435/?subject_idx=1215&subject_name=%ED%86%A0%EB%AA%A9%EC%84%A4%EA%B3%84">장성국</a>    
                                    <span>[기계일반]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50463/?subject_idx=1216&subject_name=%EA%B8%B0%EA%B3%84%EC%9D%BC%EB%B0%98">김정배</a>
                                    <span>[기계설계]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50463/?subject_idx=1217&subject_name=%EA%B8%B0%EA%B3%84%EC%84%A4%EA%B3%84">김정배</a>
                                </li>
                                <li>
                                    <span>[작물생리학]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1220&subject_name=%EC%9E%91%EB%AC%BC%EC%83%9D%EB%A6%AC%ED%95%99">장사원</a>    
                                    <span>[생물]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1222&subject_name=%EC%83%9D%EB%AC%BC">장사원</a>
                                    <span>[물리학개론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50127/?subject_idx=1226&subject_name=%EB%AC%BC%EB%A6%AC%ED%95%99%EA%B0%9C%EB%A1%A0">고진목</a>
                                </li>
                                <li>
                                    <span>[간호관리]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50539/?subject_idx=1227&subject_name=%EA%B0%84%ED%98%B8%EA%B4%80%EB%A6%AC">김명애</a>    
                                    <span>[지역사회간호]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50539/?subject_idx=1228&subject_name=%EC%A7%80%EC%97%AD%EC%82%AC%ED%9A%8C%EA%B0%84%ED%98%B8">김명애</a>
                                </li>
                                <li>
                                    <span>[농촌지도론]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1230&subject_name=%EB%86%8D%EC%B4%8C%EC%A7%80%EB%8F%84%EB%A1%A0">장사원</a>    
                                    <span>[유기농업기능사]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1232&subject_name=%EC%9C%A0%EA%B8%B0%EB%86%8D%EC%97%85%EA%B8%B0%EB%8A%A5%EC%82%AC">장사원</a>
                                    <span>[토양학]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1243&subject_name=%ED%86%A0%EC%96%91%ED%95%99">장사원</a>
                                </li>
                            </ul>                            
                        </div>

                        <div class="prof-drop-Box">
                            <h5>군무원</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50729/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">오훈</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50621/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">임재진</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[행정법]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">이석준</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50639/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">변원갑</a>
                                    <span>[행정학]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50107/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김헌</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                </li>
                                <li>
                                    <span>[공중보건]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50395/?subject_idx=1130&subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4">하재남</a>    
                                    <span>[G-TELP]</span>                                    
                                    <a href="/professor/show/cate/3024/prof-idx/50713/?subject_idx=1177&subject_name=G-TELP">서민지</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50275/?subject_idx=1177&subject_name=G-TELP">이유정</a>                                 
                                </li>
                                <li>
                                    <span>[경영학]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50763/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99">고강유</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50549/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99">전수환</a>
                                    <span>[전자회로]</span>                                    
                                    <a href="/professor/show/cate/3024/prof-idx/50163/?subject_idx=1196&subject_name=%EC%A0%84%EC%9E%90%ED%9A%8C%EB%A1%9C">최우영</a>
                                </li>
                                <li>
                                    <span>[한국사검정능력시험]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50619/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98">김상범</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50305/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98">한경준</a>
                                </li>
                            </ul>
                            <h5>부사관</h5>
                            <ul>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50479/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이현정</a>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50649/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">정훈의</a>
                                    <span>[언어논리]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50231/?subject_idx=1146&subject_name=%EC%96%B8%EC%96%B4%EB%85%BC%EB%A6%AC">이서연</a>
                                </li>
                                <li>
                                    <span>[자료해석/공간/지각/상환판단]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50239/?subject_idx=1197&subject_name=%EC%9E%90%EB%A3%8C%ED%95%B4%EC%84%9D%2F%EA%B3%B5%EA%B0%84%2F%EC%A7%80%EA%B0%81%2F%EC%83%81%ED%99%A9%ED%8C%90%EB%8B%A8">황두기</a>  
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">수강신청</a>
                    <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 gosi2">
                        <div class="lec-drop-Box">
                            <h5>9급</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3019/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3019/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/userPackage/show/cate/3019/prod-code/154935/lidx/3">DIY패키지</a>
                                </li>
                                <li>
                                    <a href="/promotion/index/cate/3019/code/1281">T-PASS</a>   
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>7급</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3020/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3020/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3020/pack/648002">선택패키지</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>세무직</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3022/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3022/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/promotion/index/cate/3019/code/1281">T-PASS</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>법원직</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3035/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3035/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/promotion/index/cate/3035/code/1385">순환별패키지</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>소방직</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3023/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3023/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/promotion/index/cate/3023/code/1060">소방PASS</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>기술직</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3028/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3028/pack/648001">추천패키지</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>군무원</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3024/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3024/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/userPackage/show/cate/3024/prod-code/155023/lidx/3">DIY패키지</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>부사관</h5>
                            <ul>
                                <li>
                                    <a href="/promotion/index/cate/3030/code/1093">부사관PASS</a>   
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">패키지</li>
                            <li><a href="#none">추천 패키지</a></li>
                            <li><a href="#none">선택 패키지</a></li>
                            <li><a href="#none">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="pass dropdown">
                    <a href="//pass.dev.willbes.net/pass/home/index" target="_self">
                        공무원학원
                        <span class="arrow-Btn">></span>
                    </a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">공무원학원</li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605001" target="_self">노량진(본원)</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605003" target="_self">부산</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605004" target="_self">대구</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605005" target="_self">인천</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605006" target="_self">광주</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Section sortMenu NSK">
        <div class="widthAuto">
            <ul>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1068#to_go">농업직</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1068#to_go">농촌지도사</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1068#tab5">유기농업기능사</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1071">전송기술직</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1071">통신기술직</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1728#apply">전기직</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1728#apply">전자직</a></li>
                <li><a href="https://pass.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&series_ccd=614021">토목직</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1915">축산직</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2000">기계직</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2001">조경직</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2013">전산직</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2014">환경직(공채)</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2014">환경직(특채)</a></li>
                <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2015">산림자원직</a></li>
                <li><a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/178589">공통과목</a></li>
            </ul>
        </div>
    </div> 

    <div class="Section gosi-tech-Sec NSK">
        <div class="gosi-tech-bntop">                        
            <div id="TechRollingSlider" class="TechtabBox">
                <ul class="TechtabSlider">
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_01.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_03.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_04.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_01.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_04.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_03.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                </ul>                  
                <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p> 
            </div> 
            
            <div id="TechRollingDiv" class="TechtabList">
                <div class="Techtab">
                    <li><a data-slide-index="0" href="javascript:void(0);" class="active">농업전공X영어<br>PACKAGE</a></li>
                    <li><a data-slide-index="1" href="javascript:void(0);">전기/통신 5과목<br>PACKAGE</a></li>
                    <li><a data-slide-index="2" href="javascript:void(0);">농업직 5과목<br>PACKAGE</a></li>
                    <li><a data-slide-index="3" href="javascript:void(0);">축산/기계/조경<br>NEW 라인업</a></li>
                    <li><a data-slide-index="4" href="javascript:void(0);">환경직<br>PACKAGE</a></li>
                    <li><a data-slide-index="5" href="javascript:void(0);">전산직<br>PACKAGE</a></li>
                    <li><a data-slide-index="6" href="javascript:void(0);">임업직<br>PACKAGE</a></li>
                    <li><a data-slide-index="7" href="javascript:void(0);">전기/통신<br>최우영</a></li>
                    <li><a data-slide-index="8" href="javascript:void(0);">농업직렬<br>장사원</a></li>
                </div>
            </div>           
        </div>        
    </div>

    <div class="Section pkgWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK tx22">지금 이 시기에 딱 맞는 <span>PACKAGE</span></div>
            <div class="pkgLeft bSlider">
                <div class="slider">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_445x350_01.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_445x350_02.jpg" alt="배너명"></a></div>
                </div>
            </div>
            <div class="pkgRight bSlider">
                <div class="slider">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_01.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_02.jpg" alt="배너명"></a></div>
                </div>
            </div>
        </div>
    </div> 

    <div class="Section tech-bnfull">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_1120x286.jpg" alt="배너명"></a>
        </div>
    </div> 

    <div class="Section gosi-tech-bn01 NSK">
        <div class="widthAuto">  
            <div class="bnTitle"> 
                <div class="will-nTit NSK-Black">추천 <span>이론강좌</span></div>  
                <div>
                    과목별 기초 개념과<br>
                    배경지식을 다지는<br>
                    학습 전략
                </div> 
                <div><a href="https://pass.willbes.net/package/index/cate/3028/pack/648001?course_idx=1055" target="_blank">패키지 확인하기 ></a></div>               
            </div>
            <ul>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_03.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_04.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_03.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_01.jpg" alt="배너명"></a></div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="widthAuto mt80">  
            <div class="bnTitle"> 
                <div class="will-nTit NSK-Black">추천 <span>문제풀이</span></div>  
                <div>
                    기출 문제 및<br>
                    예상 문제풀이를 통한<br>
                    출제포인트 공략<br>
                </div> 
                <div><a href="https://pass.willbes.net/package/index/cate/3028/pack/648001?course_idx=1056" target="_blank">패키지 확인하기 ></a></div>               
            </div>
            <ul>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_02.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_04.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_03.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_06.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/2028_266x250_05.jpg" alt="배너명"></a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section tech-bnfull02">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/2003/3028_1120_img01.jpg" alt="빈틈없는 완벽한 실력을 쌓게 됩니다.">
        </div>
    </div>    

    <div class="Section mt100">
        <div class="widthAuto">
            <div class="tx16">무엇 하나 빠지지 않는 빈틈없는 라인업</div>
            <div class="will-nTit NSK-Black mt20">체계적인 학습 CARE, <span>윌비스 기술직 교수진</span></div>  
            <ul class="ProfBoxB">
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section NSK mt90">
        <div class="widthAuto">  
            <div class="willbesNews">
                <div class="noticeTabs f_left">
                <div class="will-listTit">공지사항</div>
                    <div class="tabBox noticeBox" style="margin-top:-30px">
                        <div class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="noticeTabs f_right">
                    <ul class="tabWrap noticeWrap three">
                        <li><a href="#notice1" class="on">시험공고</a></li>
                        <li><a href="#notice2" class="">수험뉴스</a></li>
                        <li><a href="#notice3" class="">합격수기</a></li>
                    </ul>
                    <div class="tabBox noticeBox">
                        <div id="notice1" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>국가직 | 2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>HOT</span>서울시 | 2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">제주도 | 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">광주광역시 | 2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">부산광역시 | 2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice2" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice3" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--willbesNews //-->
        </div>
    </div>

    <div class="Section NSK mt70 mb90">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 2</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0336</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 22시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 공무원 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                    <div class="nTxt">모바일<br/>서비스</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                    <div class="nTxt">1:1<br/>고객지원</div>
                                </a>
                            </li>
                        </ul>
                    </dt>
                    
                </dl>
            </div>            
        </div>
    </div>
    <!-- CS센터 //-->

</div>
<!-- End Container -->

<script type="text/javascript">   
    //상단 메인 배너
    $(function(){ 
        var slidesImg = $(".TechtabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:5000,
            sliderWidth:2000,
            auto : true,	
            autoHover: true,						
            pagerCustom: '#TechRollingDiv',
            controls:false, 				
            onSliderLoad: function(){
                $("#TechRollingSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });	
        $("#imgBannerRight").click(function (){
            slidesImg.goToPrevSlide();
        });
    
        $("#imgBannerLeft").click(function (){
            slidesImg.goToNextSlide();
        });			
    });        
</script>
@stop