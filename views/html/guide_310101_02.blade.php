@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">실무자격증<span class="row-line">|</span></li>
                <li class="subTit">소프트웨어자산관리사</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">교수진소개 메인</li>
                            <li><a href="#none">신규강좌게시판</li>
                            <li><a href="#none">경제학</a></li>
                            <li><a href="#none">행정법</a></li>
                            <li><a href="#none">행정학</a></li>
                            <li><a href="#none">정치학</a></li>
                            <li><a href="#none">국제법</a></li>
                            <li><a href="#none">재정학</a></li>
                            <li><a href="#none">정책학</a></li>
                            <li><a href="#none">정보체계론</a></li>
                            <li><a href="#none">국제경제학</a></li>
                            <li><a href="#none">교육학</a></li>
                            <li><a href="#none">PSAT</a></li>
                            <li><a href="#none">영어</a></li>
                            <li><a href="#none">한국사능력검정시험</a></li>
                            <li class="Tit">교수님 홈</li>
                            <li><a href="#none">개설강좌</a></li>
                            <li><a href="#none">무료강좌</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">학습자료실</a></li>
                            <li><a href="#none">수강후기</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">학원강의신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">학원강의신청</a></li>
                            <li><a href="#none">방문결제접수</a></li>
                            <li><a href="#none">학원공지사항</a></li>
                            <li><a href="#none">강의실배정표</a></li>
                            <li><a href="#none">강의시간표</a></li>
                            <li><a href="#none">강의자료실</a></li>
                            <li><a href="#none">강의계획서</a></li>
                            <li><a href="#none">전국모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">온라인수강신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">단강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">수험정보</a></li>
                            <li><a href="#none">학습가이드</a></li>
                            <li><a href="#none">시험통계</a></li>
                            <li><a href="#none">수험 FAQ</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="dropdown">
                    <a href="#none">고객센터</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">고객센터 HOME</a></li>
                            <li><a href="#none">자주하는 질문</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">1:1 상담</a></li>
                            <li class="Tit">수강지원</li>
                            <li><a href="#none">PC원격지원</a></li>
                            <li><a href="#none">학습프로그램설치</a></li>
                        </ul>
                    </div>
                </li>
                <li class="hanlim3094">
                    <a href="#none" target="_self">
                        학원 방문 결제 
                        <span class="arrow-Btn">></span>
                    </a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>자격정보</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">자격정보</h3>
            <h5 class="NGR mt20">가. 개요</h5>
            <div>
                기업과 기관의 경영활동 필수인 소프트웨어 자산을 관리하고 통제하기 위하여 그에 관련된 정책수립, 수요예측, 구매, 운영, 감사, 사후관리, 교육, 폐기에 이르는 모든 과정에 대한 
                지식과 실무능력을 갖춘 소프트웨어 관리 전문가를 말한다. 
            </div>
            <h5 class="NGR mt20">나. 제도 및 도입배경</h5>
            <div>
                기업과 기관의 소프트웨어 자산의 체계적인 관리에 대한 수요가 증가함에 따라 소프트웨어 자산관리의 전문가의 필요성이 대두되어 생겨난 것으로, 다양한 소프트웨어 저작권사의 라이선스 및 관련법에 대한 이해와 소프트웨어 
                자산관리 실무능력을 겸비한 소프트웨어 자산관리 전문가를 배양하고 검증하는 시험이다.
                소프트웨어자산관리사(C-SAM) 자격을 취득한 자는 기업경영 활동에서 발생하는 소프트웨어 문제 전반을 관리하고 주체적으로 문제를 해결 할 수 있는 실무능력과 전문적인 지식을 겸비한 자로서 역할을 수행할 수 있게 된다. 
            </div>
            <h5 class="NGR mt20">다. 필요성</h5>
            <ul class="st01">
                <li>소프트웨어 보호 업무를 다루는 전문인 양성을 통해, 소프트웨어 산업환경 개선과 발전에 이바지하고 새로운 사회 가치를 창출합니다.</li>
                <li>저작권사의 정책을 명확히 전달하여 저작권사와 기업(이용자)간 분쟁을 방지합니다.</li>
                <li>올바른 저작권 개념과 라이선스를 이해하고 관련 업무의 전문성을 확보합니다.</li>
            </ul>
            <h5 class="NGR mt20">라. 활용정보</h5>
            <div>소프트웨어도 기업의 자산으로서 체계적인 관리가 필요하다는 인식이 확산됨에 따라 기업 내에서 소프트웨어 자산관리 전문인력이 필요하게 되었습니다. 
                    이에 소프트웨어자산관리사를 통해 저작권사의 다양한 라이선스를 이해하여 실제 기업에서 사용중인 소프트웨어를 정확하게 파악하고 향후 필요한 소프트웨어에 대한 
                    예산을 책정하고 집행하는 등의 포괄적인 업무를 수행할 필요가 있습니다.<br>
                    또한 기업은 자산관리사를 통해 소프트웨어 지적재산권에 관한 법과 제도를 올바르게 이해하고 법적인 문제에 대응할 수 있게 되어 그 수요는 더욱 늘어나게 될 것입니다. 
            </div>
            <h5 class="NGR mt20">마. 역할</h5>
            <ul class="st01">
                <li>소프트웨어 자산관리(구매, 계약, 관리)</li>
                <li>회사 내 소프트웨어 지적재산권에 따르는 제반 업무 담당</li>
            </ul>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="50%">
                        <col>
                    </colgroup>
                    <thead>                    
                        <tr>
                            <th>소프트웨어 구입단계</th>
                            <th>소프트웨어 사용단계</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                - 기업에서 필요한 소프트웨어 종류와 수요량 판단<br />
                                - 적절한 소프트웨어 라이선스 계약<br />
                                - 효율적인 소프트웨어 구매와 유지보수를 통한 TCO 절감<br />
                                - 다양한 구매방식과 라이선스 변화에 대응<br />
                            </td>
                            <td>
                            	- 소프트웨어 활용 과정의 문제 대처<br />
                                - 정부의 지적재산권 단속 관련 창구 역할<br />
                                - 소프트웨어 저작권사와 제공업체 창구<br />
                                - 불법소프트웨어 사용에 따른 분쟁 발생 방지<br />
                                - 정품 소프트웨어 관리를 통한 기업 이미지 제고<br />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop