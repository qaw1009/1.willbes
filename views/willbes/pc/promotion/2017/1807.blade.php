@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        /*.evtContent span {vertical-align:auto}*/
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/
        .evtCtnsBox {width:100%; min-width:1278px; margin:0 auto; text-align:center; font-size:14px; line-height:1.4}
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200716_top_bg.jpg) repeat-x center top;}
        .event01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200716_01_bg.jpg) repeat-x center top;}
        .event02 {background:#333} 


        .ssamLecTable {max-width:940px; margin:0 auto 50px; font-size:12px}
        .ssamLecTable h5 {font-size:30px; text-align:center; padding:20px 0}
        .ssamLecTable h5 span {color:#002060; vertical-align:top}
        .ssamLecTable table {border:2px solid #999}
        .ssamLecTable thead {border-bottom:2px solid #999}
        .ssamLecTable th,
        .ssamLecTable td {text-align:center; padding:10px 5px !important; line-height:1.4; border:0; border-right:1px solid #ccc; border-bottom:1px solid #ccc}
        .ssamLecTable thead th {color:#333; background:#e9ecf5; font-size:14px; font-weight:bold; }
        .ssamLecTable td a {display:block; padding:3px; border-radius:3px; font-size:11px}
        .ssamLecTable td a.btnSt01 {background:#ff6600; color:#fff;}
        .ssamLecTable td a.btnSt02 {background:#2e898e; color:#fff}
        .ssamLecTable td:nth-last-child(3) {font-size:11px; } 
        .ssamLecTable td strong {color:#000; font-size:12px}
        .ssamLecTable td em {color:#ed1c24}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox event03">
            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                <thead>

                </thead>
                <tbody>                                    
                    <tr>
                        <td id="board_content" class="w-txt tx-left" colspan="3">
                            <div class="ssamLecTable NGR">
                                <h5 class="NSK-Black">윌비스 임용 <span>2021년 연간패키지 및 1~2월 단과 </span>강의 일정</h5>
                                <div class="tx-right mb10">* 학원직강의 1주차 수업은 무료 공개강의로 진행됩니다. (과목별 특성에 따라 공개강의를 진행하지 않는 경우도 있음.)</div>
                                <table cellspacing="0" cellpadding="0">
                                    <col width="60px"/>
                                    <col width="60px"/>
                                    <col />
                                    <col width="150px"/>
                                    <col width="160px"/>
                                    <col width="70px"/>
                                    <col width="70px"/>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">과목</th>
                                            <th rowspan="2">교수명</th>
                                            <th rowspan="2">과정명</th>
                                            <th rowspan="2">(학원직강)<br>강의일정</th>
                                            <th rowspan="2">수강료</th>
                                            <th colspan="2">수강신청</th>
                                        </tr>
                                        <tr>
                                            <th>온라인</th>
                                            <th>학원</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2">교육학</td>
                                            <td>이인재</td>
                                            <td class="tx-left">01~02월 이인재 교육학 기초 이론반   
                                            <br><em>※ 01~02월 기초 이론반 수강 시,  2021년 교육학 연간 강의    무료수강</em></td>
                                            <td>01월04일(월)~<br>02월23일(화)<br />
                                            매주[월/화] 09:30~13:00</td>
                                            <td><strong>350,000</strong></td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3134/pattern/only/prod-code/174903" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3138/prod-code/174908" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td>홍의일</td>
                                            <td colspan="2" class="tx-left">추후공지 </td>
                                            <td>　</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="3">초  등</td>
                                            <td rowspan="3">배재민</td>
                                            <td class="tx-left">01~02월 기본이론반</td>
                                            <td>01월03일(일)~<br>02월28일(일)<br />
                                            매주[일] 13:00~19:00</td>
                                            <td><strong>350,000</strong></td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3136/pattern/only/prod-code/174797" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3140/prod-code/176117" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~10월) 배재민 초등 연간    패키지  <br />
                                            <em>*선착순 200명 할인혜택</em></td>
                                            <td>2,000,000 ▶ <strong>1,400,000</strong><br>(30%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3136/pack/648001/prod-code/176017" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176125" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~8월) 배재민 초등 상반기 패키지 </td>
                                            <td>1,500,000 ▶ <strong>1,200,000</strong><br>(20%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3136/pack/648001/prod-code/176514" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176515" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="9">국  어</td>
                                            <td rowspan="3">송원영</td>
                                            <td class="tx-left">01~02월 송원영 국어교육론 이론정리반</td>
                                            <td>01월07일(목)~<br>02월25일(목)<br />
                                            매주[목] 10:00~18:30</td>
                                            <td><strong>190,000</strong></td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176567" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176558" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-left">01~02월 송원영 국어/문학교육론 이론정리반</td>
                                            <td>01월07일(목)~<br>02월26일(금)<br />
                                            매주[목/금] 10:00~18:30</td>
                                            <td>380,000 ▶ <strong>320,000</strong><br>(약15%↓)</td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176552" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176551" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 송원영(국어/문학교육론)+권보민(문법) 연간 Full 패키지  
                                            <br><em>* 수강료 파격할인</em></td>
                                            <td>3,580,000 ▶ <strong>1,670,000</strong><br>(약53%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176586" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176588" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="6">권보민</td>
                                            <td class="tx-left">01~02월 현대 국어 문법 기초다지기</td>
                                            <td>01월02일(토)~<br>02월27일(토)<br />
                                            매주[토] 10:30~16:00</td>
                                            <td><strong>200,000</strong></td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176218" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176238" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-left">01~02월 기출문제 분석 및 응용반 1</td>
                                            <td>01월02일(토)~<br>02월27일(토)<br />
                                            매주[토] 16:00~17:00</td>
                                            <td><strong>50,000</strong></td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176217" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176239" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-left">01~02월 중세 국어 문법 감각 기르기(중세 국어 문법 개론서 예문 분석1)</td>
                                            <td>01월02일(토)~<br>02월27일(토)<br />
                                            매주[토] 17:00~18:00</td>
                                            <td><strong>50,000</strong> </td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176215" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176245" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 권보민 국어문법 연간 패키지</td>
                                            <td>1,640,000 ▶ <strong>1,066,000</strong><br>(35%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176236" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176262" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~6월) 권보민 국어문법 상반기 패키지 </td>
                                            <td>900,000 ▶ <strong>720,000</strong><br>(20%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176234" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176261" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 권보민(문법)+송원영(국어/문학교육론) 연간 Full 패키지  <br />
                                            <em>* 수강료 파격할인</em></td>
                                            <td>3,580,000 ▶ <strong>1,670,000</strong><br>(약53%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176586" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176588" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>                                       
                                        
                                        <tr>
                                            <td rowspan="7">영  어</td>
                                            <td rowspan="4">김유석</td>
                                            <td class="tx-left">01~02월 김유석 영미문학·영미시의 이해 </td>
                                            <td>01월08일(금)~<br>03월05일(금)<br />
                                            매주[금] 09:30~11:30</td>
                                            <td><strong>200,000</strong> </td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176740" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176723" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-left">01~02월 김유석 일반영어 Power Reading    Skills</td>
                                            <td>01월08일(금)~<br>03월05일(금)<br />
                                            매주[금] 12:30~15:00</td>
                                            <td><strong>220,000</strong> </td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176739" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176722" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 김유석 일반영어·문학 연간 패키지 </td>
                                            <td>2,060,000 ▶ <strong>1,700,000</strong><br>(약17%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176752" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176754" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~4월) 김유석 일반영어·문학 4개월 패키지 </td>
                                            <td>840,000 ▶ <strong>750,000</strong><br>(약10%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176755" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176756" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="3">김영문</td>
                                            <td class="tx-left">01~02월 김영문 영어학 기본이론반 (통사론)</td>
                                            <td>01월07일(목)~<br>03월04일(목)<br />
                                            매주[금] 10:00~13:00</td>
                                            <td>140,000 ▶ <strong>126,000</strong><br>(10%↓)</td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176448" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176447" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 김영문 영어학 연간 패키지 </td>
                                            <td>760,000 ▶ <strong>532,000</strong><br>(30%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176471" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176466" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~4월) 김영문 영어학 기본이론 패키지 </td>
                                            <td>280,000 ▶ <strong>224,000</strong><br>(20%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176549" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176550" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td rowspan="11">수  학</td>
                                            <td rowspan="5">김철홍</td>
                                            <td class="tx-left">01~02월 대수학과 정수로 완전학습반 (이론 및 문제풀이 통합반)
                                            <br><em>※ 직강 수강생: 전 강좌    복습용(0.8배수) 인강 제공</em></td>
                                            <td>01월03일(일)~<br>02월28일(일)<br />
                                            매주[일] 11:00~18:00</td>
                                            <td>380,000 ▶ <strong>340,000</strong><br>(10%↓)</td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176932" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176950" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 전공수학 내용학 All-In-One 패키지</td>
                                            <td>2,080,000 ▶ <strong>1,456,000</strong><br>(30%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176965" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176977" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~8월) 전공수학 내용학 심화 완전학습 패키지</td>
                                            <td>1,680,000 ▶ <strong>1,176,000</strong><br>(30%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176966" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176978" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~5월) 전공수학 내용학 핵심이론 패키지 [대수학과    정수론/해석학/미분기하학]</td>
                                            <td>1,060,000 ▶ <strong>742,000</strong><br>(30%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176967" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176979" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 전공수학(내용학&amp;교육론) All-In-One    패키지</td>
                                            <td>3,710,000 ▶ <strong>2,226,000</strong><br>(40%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176960" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176972" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="6">박태영</td>
                                            <td class="tx-left">01~02월 수학교육론 신기한(신론1,2와 기출을 결합한) 이론반
                                            <br><em>※ 직강 수강생: 전 강좌    복습용(0.8배수) 인강 제공</em></td>
                                            <td>01월06일(수)~<br>02월24일(수)<br />
                                            매주[수] 10:00~14:00</td>
                                            <td>300,000 ▶ <strong>270,000</strong><br>(10%↓)</td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176880" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176920" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-left">[복습특강 1] 수학교육론 교육과정 비교표 / 별책    유의사항 특강(외우기)</td>
                                            <td>01월27일(수)<br>14:00~17:00</td>
                                            <td><strong>30,000</strong> </td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176888" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176925" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 수학교육론 All-In-One 패키지</td>
                                            <td>1,430,000 ▶ <strong>1,000,000</strong><br>(약30%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176961" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176973" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~6월) 수학교육론 상반기 패키지</td>
                                            <td>900,000 ▶ <strong>630,000</strong><br>(30%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176962" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176974" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년 수학교육론 정규특강 패키지[상반기 복습특강+하반기특강]</td>
                                            <td>100,000 ▶ <strong>70,000</strong><br>(30%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176964" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176976" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 전공수학(내용학&amp;교육론) All-In-One    패키지</td>
                                            <td>3,710,000 ▶ <strong>2,226,000</strong><br>(40%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176960" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176972" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td>생  물</td>
                                          <td>강치욱</td>
                                            <td class="tx-left">01~04월 생물학 총론 11판<br />
                                              <em>※ 온라인 강의는 '강치욱 과학연구소(에코에티카)'에서 진행 됩니다.</em></td>
                                            <td>01월02일(토)~<br>04월24일(토)<br />
                                            매주[토] 13:00~20:00</td>
                                            <td>720,000 ▶ <strong>660,000</strong><br>(약 8%↓)</td>
                                            <td><a href="http://www.biokang.net" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/174811" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">도덕윤리</td>
                                            <td rowspan="2">김병찬</td>
                                            <td class="tx-left">01~02월 도덕윤리 교과내용학 Ⅰ[서양·동양·한국윤리]</td>
                                            <td>01월07일(목)~<br>03월04일(목)<br />
                                            매주[목] 10:00~18:00</td>
                                            <td>330,000 ▶ <strong>300,000</strong><br>(10%↓)</td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176646" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176656" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년 (1~10월) 도덕윤리 연간 Full 패키지
                                            <br><em>※ 직강 수강생: 전 강좌 복습용(0.6배수) 인강 제공</em></td>
                                            <td>1,980,000 ▶ <strong>1,728,000</strong><br>(약13%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176748" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176757" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        
                                        <tr>
                                            <td rowspan="3">역  사</td>
                                            <td rowspan="3">최용림</td>
                                            <td class="tx-left">01~02월 임용역사 이론반</td>
                                            <td>01월06일(수)~<br>02월25일(목)<br />
                                            매주[수/목] 10:00~18:00</td>
                                            <td>280,000 ▶ <strong>224,000</strong><br>(20%↓)</td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176159" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176169" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 임용역사 연간 패키지 </td>
                                            <td>1,580,000 ▶ <strong>948,000</strong><br>(40%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176176" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176178" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~6월) 임용역사 상반기 패키지 </td>
                                            <td>840,000 ▶ <strong>588,000</strong><br>(30%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176177" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176179" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="3">음  악</td>
                                            <td rowspan="3">다이애나</td>
                                            <td class="tx-left">01~02월 전공음악 기본이론(한.끝.맵.)   
                                            <br>
                                            <em>※ 개강일(1/2(토))은 오전10시 시작!</em></td>
                                            <td>01월02일(토)~<br>02월27일(토)<br />
                                            매주[토] 13:30~17:00</td>
                                            <td><strong>360,000</strong> </td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51090?cate_code=3137&subject_idx=1991&subject_name=%EC%A0%84%EA%B3%B5%EC%9D%8C%EC%95%85&tab=only_lecture" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51090?cate_code=3137&amp;subject_idx=1991&amp;subject_name=%EC%A0%84%EA%B3%B5%EC%9D%8C%EC%95%85&amp;tab=only_lecture" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-left">01~02월 전공음악 화성학반</td>
                                            <td>01월09일(토)~<br>02월27일(토)<br />
                                            매주[토] 10:00~12:30</td>
                                            <td><strong>360,000</strong> </td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51090?cate_code=3137&amp;subject_idx=1991&amp;subject_name=%EC%A0%84%EA%B3%B5%EC%9D%8C%EC%95%85&amp;tab=only_lecture" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51090?cate_code=3137&amp;subject_idx=1991&amp;subject_name=%EC%A0%84%EA%B3%B5%EC%9D%8C%EC%95%85&amp;tab=only_lecture" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 전공음악 All Free Pass
                                            <br>
                                            <em>※ 설명회 12월27일(일) 진행 이후 신청 가능합니다. </em></td>
                                            <td>12월27일(일) 공개</td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177108" target="_blank" class="btnSt01">설명회</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177108" target="_blank" class="btnSt02">설명회</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="4">전기<br />
                                            전자<br />
                                            통신</td>
                                            <td rowspan="4">최우영</td>
                                            <td class="tx-left">[전기·전자·통신 통합 단과] 01~02월 기초 전기·전자/회로 이론반</td>
                                            <td>01월11일(월)~<br>03월17일(수)<br />
                                            매주[월] 14:00~18:00<br />
                                            매주[수] 09:00~13:00</td>
                                            <td><strong>400,000</strong> </td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176676" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/176676" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 최우영 전기 Full 패키지 </td>
                                            <td>2,590,000 ▶ <strong>1,500,000</strong><br>(약42%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176685" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176811" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 최우영 전자 Full 패키지 </td>
                                            <td>2,790,000 ▶ <strong>1,500,000</strong><br>(약46%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176686" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176813" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 최우영 통신 Full 패키지 </td>
                                            <td>2,590,000 ▶ <strong>1,500,000</strong><br>(약42%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176687" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176812" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="4">정보<br />
                                            컴퓨터</td>
                                            <td rowspan="4">송광진</td>
                                            <td class="tx-left">01~03월 정보컴퓨터 내용학 일반과정</td>
                                            <td>01월03일(일)~<br>03월28일(일)<br />
                                            매주[일] 13:00~20:00</td>
                                            <td>600,000 ▶ <strong>570,000</strong><br>( 5%↓)</td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/175976" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/176130" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 송광진 정보컴퓨터 내용학 All-In-One 패키지(C언어 포함)</td>
                                            <td>2,600,000 ▶ <strong>2,100,000</strong><br>(25%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176005" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176146" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 송광진 정보컴퓨터 내용학 All-In-One    패키지(C언어 제외)</td>
                                            <td>2,800,000 ▶ <strong>1,950,000</strong><br>(25%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176263" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176265" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~6월) 송광진 정보컴퓨터 내용학 이론 All Pass</td>
                                            <td>1,200,000 ▶ <strong>1,020,000</strong><br>(15%↓)</td>
                                            <td><a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/176264" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/176266" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td>정컴<br>교육론</td>
                                            <td>장순선</td>
                                            <td class="tx-left">04월 정보컴퓨터 교육론 일반과정 </td>
                                            <td>04월03일(토)~<br>04월24일(토)<br />
                                            매주[토] 13:00~17:00</td>
                                            <td><strong>200,000</strong> </td>
                                            <td><a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/177050" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/pass/offLecture/show/cate/3141/prod-code/177051" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="3">중국어</td>
                                            <td rowspan="3">정경미</td>
                                            <td colspan="2" class="tx-left">01~04월 중국어 기본이론                                                </td>
                                            <td>600,000 ▶ <strong>540,000</strong><br>
                                            (10%↓)</td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995&subject_name=%EC%A0%84%EA%B3%B5%EC%A4%91%EA%B5%AD%EC%96%B4&tab=only_lecture" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995&subject_name=%EC%A0%84%EA%B3%B5%EC%A4%91%EA%B5%AD%EC%96%B4&tab=only_lecture" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">01~04월 중국어 기본독해                                                </td>
                                            <td>600,000 ▶ <strong>540,000</strong><br>
                                            (10%↓)</td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995&subject_name=%EC%A0%84%EA%B3%B5%EC%A4%91%EA%B5%AD%EC%96%B4&tab=only_lecture" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995&subject_name=전공중국어&tab=only_lecture" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tx-left">2021년(1~11월) 정경미 중국어 연간 패키지</td>
                                            <td>3,420,000 ▶ <strong>1,71,000</strong><br>
                                            (50%↓)</td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995&subject_name=전공중국어&tab=only_lecture" target="_blank" class="btnSt01">신청하기</a></td>
                                            <td><a href="https://ssam.willbes.net/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995&subject_name=전공중국어&tab=only_lecture" target="_blank" class="btnSt02">신청하기</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="mt20 tx-right">※ 상기 내용은 학원 사정 상 변경될 수 있습니다.</div>         
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{--
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200716_top.jpg" title=""/>
        </div>

        <div class="evtCtnsBox event01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200716_01.jpg" title="" usemap="#Map200716" border="0"/>
            <map name="Map200716" id="Map200716">
              <area shape="rect" coords="457,480,579,517" href="#none" title="이인재 문제지" />
              <area shape="rect" coords="587,480,709,520" href="#none" title="이인재 해설자료" />
              <area shape="rect" coords="715,480,837,521" href="#none" title="이인재 해설강의" />
              <area shape="rect" coords="459,716,578,758" href="#none" title="송원영 문제지" />
              <area shape="rect" coords="586,716,708,758" href="#none" title="송원영 해설자료" />
              <area shape="rect" coords="921,716,1044,758" href="#none" title="권보민 문제지" />
              <area shape="rect" coords="1052,716,1173,758" href="#none" title="권보민 해설자료" />
              <area shape="rect" coords="457,955,578,996" href="#none" title="박태영 문제지" />
              <area shape="rect" coords="586,955,708,996" href="#none" title="박태영 해설자료" />
              <area shape="rect" coords="716,955,838,996" href="#none" title="박태영 해설강의" />
              <area shape="rect" coords="458,1194,579,1232" href="#none" title="최용림 문제지" />
              <area shape="rect" coords="587,1194,707,1232" href="#none" title="최용림 해설강의" />
              <area shape="rect" coords="458,1433,577,1470" href="#none" title="송광진 문제지" />
              <area shape="rect" coords="587,1433,706,1470" href="#none" title="송광진 해설자료" />
              <area shape="rect" coords="924,1430,1044,1472" href="#none" title="장순선 문제지" />
              <area shape="rect" coords="1051,1430,1171,1472" href="#none" title="장순선 해설자료" />
              <area shape="rect" coords="459,1670,579,1708" href="#none" title="정경미 문제지" />
              <area shape="rect" coords="593,1670,710,1708" href="#none" title="정경미 해설자료" />
              <area shape="rect" coords="878,1787,1172,1846" href="#none" title="답안 작성지 다운로드" />              
            </map>
        </div>

        <div class="evtCtnsBox event02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200716_02.jpg" title=""/>
        </div>
        --}}
    </div>
    <!-- End Container -->
@stop