@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        수강후기
    </div>

    <div class="sortList">
        <ul>
            <li><a href="#none">교육학 김차웅</a></li>
            <li><a href="#none">교육학 이인재</a></li>
            <li><a href="#none">교육학 홍의일</a></li>
            <li><a href="#none">유아 민정선</a></li>
            <li><a href="#none">초등 배재민</a></li>
            <li><a href="#none">전공국어 송원영</a></li>
            <li><a href="#none">전공국어 이원근</a></li>
            <li><a href="#none">전공국어 권보민</a></li>
            <li><a href="#none">전공영어 김유석</a></li>
            <li><a href="#none">전공영어 김영문</a></li>
            <li><a href="#none">전공영어 공훈</a></li>
            <li><a href="#none">전공수학 김철홍</a></li>
            <li><a href="#none">수학교육론 박태영</a></li>
            <li><a href="#none">전공생물 강치욱</a></li>
            <li><a href="#none">생물교육론 양혜정</a></li>
            <li><a href="#none">도덕윤리 김병찬</a></li>
            <li><a href="#none">전공역사 최용림</a></li>
            <li><a href="#none">전공음악 다이애나</a></li>
            <li><a href="#none">전기전자통신 최우영</a></li>
            <li><a href="#none">정보컴퓨터 송광</a></li>
            <li><a href="#none">정컴교육론 장순선</a></li>
            <li><a href="#none">전공중국어 정경미</a></li>
            <li><a href="#none" class="on">전체</a></li>
        </ul>
    </div>

    <div class="ml10 tx-red">※ 수강후기는 내강의실에서 등록 가능합니다.</div>

    <div class="sort">
        <a href="#none" class="on">BEST순</a>
        <a href="#none">최신순</a>
        <a href="#none">평점순</a>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <colgroup>
                <col style="width: 87%;">
                <col style="width: 13%;">
            </colgroup>
            <tbody>
                <tr class="replyList willbes-Open-Table">
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt><img src="{{ img_url('prof/icon_best_reply.gif') }}"> 도덕윤리 <span class="row-line">|</span> 김병찬</dt>
                        </dl>
                        <div class="w-tit">
                            김병찬교수님 강의를 들으면 합격의 길이 보입니다.
                        </div>
                        <dl class="w-info tx-gray">
                            <dt><img src="{{ img_url('sub/star5.gif') }}"> <span class="row-line">|</span> 홍길* <span class="row-line">|</span> 2018-00-00</dt>                            
                        </dl>
                    </td>
                    <td class="MoreBtn tx-center">></td>
                </tr>
                <tr class="replyTxt willbes-Open-List bg-light-gray">
                    <td class="w-txt NGR" colspan="2">
                        <div class="tx-blue strong mb10">2019 (9~10월) 모의고사반</div>
                        입학할때 부터 학교 선배들도 항상 김병찬교수님 강의를 듣고 있었고 사물함엔 김병찬 교수님 교재로 빼곡했습니다.
                        그냥 당연히 임용준비하는 사람은 다 듣는가보다 하고 자연스레 4학년때 김병찬 교수님 직강을 신청하여 듣게됐습니다.
                        직접 들어보니 정말 대단하시다는 생각이 들었습니다. 흐름에 맞춰 개념정리를 쭈~욱 해주시는데 들어주시는 예시들도
                        너무 적절했고 어려운 학자들도 이해가 잘됐습니다. 무엇보다도 교수님 강의의 가장 큰 장점은 확실한 반복적 학습인것 같습니다. 
                        1년 패키지를 듣게되면 강의마다 총 4번의 복습을 거치게 돼있습니다. 개념정리, 기출분석, 문제풀이, 모의고사 각각 다른 수업같지만 
                        그 주제에 맞춰 이론을 시간내에 최소 4번 복습할 수 있습니다. 작년 초수에 수업도 들으면서 교생도 나가고 시간이 없어서 원문, 
                        교과서 거의 못봤지만 교수님 강의듣고 복습하고 시키시는대로 (?) 해서 1차 합격했습니다!
                        저처럼 빠듯한 시간내에 개념을 복습해야 한다는 분들은 꼭꼭 추천해드리고 싶네요. 원문을 못본건 아쉽지만 교수님 강의만 완벽히 
                        이해하고 암기가 뒷받침해준다면 1차는 누구나 통과할 수 있습니다! 제가 해낸걸보니,,,, ㅎㅎ 
                        아쉽게 2차에서 최탈하고 교수님 하반기 문제풀이, 모의고사 강의 다시 인강으로 신청해서 듣고있습니다. 역시는 역시입니다 ^^. 
                        6개월 기간제하고 공부를 최근 시작하며 너무 불안했지만 교수님 강의를 들으며 다시 용기가 생겼습니다. 감사합니다! 
                        작년 모의고사 종강 때 교수님께 마지막 인사드리러 가면서 많은 격려도 받고 붙으면 꼭 인사드리러오고 싶다고했는데! 
                        올해는 꼭 최종합격해서 교수님뵙고싶습니다! 제 마음속의 지주이시자 도덕윤리과계의 1인자 김병찬 교수님 강의! 적극 추천합니다!!!! 
                    </td>
                </tr>
                <tr class="replyList willbes-Open-Table">
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>전공영어 <span class="row-line">|</span> 김영문</dt>
                        </dl>
                        <div class="w-tit">
                            개인적으로 생각하는 영어학계 1타 강사
                        </div>
                        <dl class="w-info tx-gray">
                            <dt><img src="{{ img_url('sub/star3.gif') }}"> <span class="row-line">|</span> 심청* <span class="row-line">|</span> 2018-00-00</dt>                            
                        </dl>
                    </td>
                    <td class="MoreBtn tx-center">></td>
                </tr>
                <tr class="replyTxt willbes-Open-List bg-light-gray">
                    <td class="w-txt NGR" colspan="2">
                        <div class="tx-blue strong mb10">2020 1~2월 김영문 영어학 기본이론반(통사론)</div>
                        김영문 교수님이 임용 영어학 강사님들 중 가장 학식이 높고 통찰력이 뛰어나신 거 같습니다. 감사합니다. 
                    </td>
                </tr>
                <tr class="replyList willbes-Open-Table">
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>교육학 <span class="row-line">|</span> 김차웅</dt>
                        </dl>
                        <div class="w-tit">
                            2019 합격수기(교육학을 중심으로) : 메인화면 수기 응모 글에 파일 올렸어요. ^^
                        </div>
                        <dl class="w-info tx-gray">
                            <dt><img src="{{ img_url('sub/star4.gif') }}"> <span class="row-line">|</span> 심청* <span class="row-line">|</span> 2018-00-00</dt>                            
                        </dl>
                    </td>
                    <td class="MoreBtn tx-center">></td>
                </tr>
                <tr class="replyTxt willbes-Open-List bg-light-gray">
                    <td class="w-txt NGR" colspan="2">
                        <div class="tx-blue strong mb10">2018 9~11월 교육학논술 총정리/모의고사반</div>
                        수학 전공이지만 다른 학원에서 들었고, 교육학은 김차웅 선생님을 들었습니다.
                        응모 상품권은 생각 없습니다. ㅠㅠ 교육학 수강 소감을 중심으로 수기 글 작성해 봤습니다.
                        파일은 선생님 카페에 올린 글을 그대로 복사해 붙였구요. 아래 글은 수기 글 일부이오니.....짤린 부분은 파일 참고 바래요.
                        늦더라도 함께꼭 교단에서 만나기 바랍니다.<br>
                        <br>
                        (아래 글)
                        어쨌든 최종탈락을 하고 나니, 주변에서 들려오는 말에 귀를 기울이지 않을 수 없었죠.“그렇게 막무가내 공부만 한다고 무조건 합격하는 건 아니다. 
                        머리를 좀 써서 공부해라”, “네가 지방 출신이라 몰라서 그래. 서울 애들하고 경쟁이 안 될걸” (참고로 전 지방 국립 사대 출신입니다요.) 
                        시험이란 게 원래 죽도록 열심히 공부했든, 적당히 놀면서 공부했든, 최종합격을 하지 못하면 결국 똑같은 결과잖아요. 
                        떨어지면 죽어라 공부한 사람도 바보 되는 게 시험이지요!! 나름대로 `죽어라` 공부했지만, 전 그렇게 바보 됐습니다요!! ^^
                        하지만 적당히 놀면서 공부해도 합격할 수 있는 특별한 재주를 가진 것도 아니니, 한번 더 바보가 되더라도 
                        내가 할 수 있는 건 다시 도전하는 것뿐이었습니다. 최탈 바보가 할 수 있는 건 노력 밖에 없으니까요!! ㅠㅠ
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="Paging">
            <ul>
                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                <li><a href="#none">2</a><span class="row-line">|</span></li>
                <li><a href="#none">3</a><span class="row-line">|</span></li>
                <li><a href="#none">4</a><span class="row-line">|</span></li>
                <li><a href="#none">5</a></li>
                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
            </ul>
        </div>
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

</div>
<!-- End Container -->
@stop