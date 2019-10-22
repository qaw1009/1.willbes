@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container GA NGR c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">공무원<span class="row-line">|</span></li>
                <li class="subTit">공무원학원</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 GA">
                        <div class="prof-drop-Box">
                            <h5>9급</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                                    <span>[영어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50500/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50346/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50274/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">김신주</a>                                    
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50310/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">이아림</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50648/?cate_code=3043&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50306/?cate_code=3043&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                                    <span>[행정법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50716/?cate_code=3043&subject_idx=1257&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">한세훈</a>
                                    <span>[행정학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50560/?cate_code=3043&subject_idx=1258&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                                </li>
                                <li>
                                    <span>[사회]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50182/?cate_code=3043&subject_idx=1279&subject_name=%EC%82%AC%ED%9A%8C')}}">문병일</a>
                                    <span>[국제법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50394/?cate_code=3043&subject_idx=1273&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95')}}">이상구</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>7급</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50242/?cate_code=3044&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                                    <span>[영어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50500/?cate_code=3044&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50346/?cate_code=3044&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                                    <span>[한국사]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50648/?cate_code=3044&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>                                                                        
                                </li>
                                <li>
                                    <span>[행정법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50716/?cate_code=3044&subject_idx=1257&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">한세훈</a>
                                    <span>[행정학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50560/?cate_code=3044&subject_idx=1258&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                                    <span>[헌법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50140/?cate_code=3044&subject_idx=1260&subject_name=%ED%97%8C%EB%B2%95')}}">유시완</a>                                                                       
                                </li>
                                <li>
                                    <span>[경제학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50488/?cate_code=3044&subject_idx=1261&subject_name=%EA%B2%BD%EC%A0%9C%ED%95%99')}}">황정빈</a> 
                                    <span>[세법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50188/?cate_code=3044&subject_idx=1269&subject_name=%EC%84%B8%EB%B2%95')}}">고선미</a>
                                    <span>[회계학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50228/?cate_code=3044&subject_idx=1270&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김영훈</a>                                    
                                </li>
                                <li>
                                    <span>[국제법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50394/?cate_code=3044&subject_idx=1273&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95')}}">이상구</a>
                                    <span>[국제정치학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50394/?cate_code=3044&subject_idx=1274&subject_name=%EA%B5%AD%EC%A0%9C%EC%A0%95%EC%B9%98%ED%95%99')}}">이상구</a>
                                    <span>[일본어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50727/?cate_code=3044&subject_idx=1307&subject_name=%EC%9D%BC%EB%B3%B8%EC%96%B4')}}">황선아</a>
                                </li>
                                <li>
                                    <span>[프랑스어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50002/?cate_code=3044&subject_idx=1324&subject_name=%ED%94%84%EB%9E%91%EC%8A%A4%EC%96%B4')}}">박훈</a>
                                    <span>[중국어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50062/?cate_code=3044&subject_idx=1308&subject_name=%EC%A4%91%EA%B5%AD%EC%96%B4')}}">조소현</a>
                                    <span>[경영학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50762/?cate_code=3044&subject_idx=1331&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">고강유</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>세무직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50242/?cate_code=3046&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                                    <span>[영어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50500/?cate_code=3046&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50346/?cate_code=3046&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50274/?cate_code=3046&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">김신주</a>                                    
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50310/?cate_code=3046&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">이아림</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50648/?cate_code=3046&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50306/?cate_code=3046&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                                    <span>[행정학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50560/?cate_code=3046&subject_idx=1258&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                                    <span>[세법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50188/?cate_code=3046&subject_idx=1269&subject_name=%EC%84%B8%EB%B2%95')}}">고선미</a>
                                </li>
                                <li>
                                    <span>[회계학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50228/?cate_code=3046&subject_idx=1270&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김영훈</a>
                                    <span>[사회]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50182/?cate_code=3046&subject_idx=1279&subject_name=%EC%82%AC%ED%9A%8C')}}">문병일</a>
                                </li>
                                <li>&nbsp;</li>
                                <li>&nbsp;</li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>법원직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50066/?cate_code=3059&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">이현나</a>
                                    <span>[영어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50652/?cate_code=3059&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">박초롱</a>
                                    <span>[한국사]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50572/?cate_code=3059&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">임진석</a>
                                </li>
                                <li>
                                    <span>[헌법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50592/?cate_code=3059&subject_idx=1260&subject_name=%ED%97%8C%EB%B2%95')}}">이국령</a>
                                    <span>[민법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50520/?cate_code=3059&subject_idx=1264&subject_name=%EB%AF%BC%EB%B2%95')}}">김동진</a>
                                    <span>[민사소송법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50146/?cate_code=3059&subject_idx=1265&subject_name=%EB%AF%BC%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95')}}">이덕훈</a>                                    
                                </li>
                                <li>
                                    <span>[형법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50074/?cate_code=3059&subject_idx=1262&subject_name=%ED%98%95%EB%B2%95')}}">문형석</a>
                                    <span>[형사소송법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50686/?cate_code=3059&subject_idx=1263&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95')}}">유안석</a>                                    
                                </li>
                            </ul>
                            <h5>소방직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50662/?cate_code=3050&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">김세령</a>
                                    <span>[영어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50310/?cate_code=3050&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">이아림</a>
                                    <span>[한국사]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50306/?cate_code=3050&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                                </li>
                                <li>
                                    <span>[소방학개론]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50466/?cate_code=3050&subject_idx=1259&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0')}}">김종상</a>  
                                    <span>[소방관계법규]]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50466/?cate_code=3050&subject_idx=1284&subject_name=%EC%86%8C%EB%B0%A9%EA%B4%80%EA%B3%84%EB%B2%95%EA%B7%9C')}}">김종상</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>기술직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50242/?cate_code=3052&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                                    <span>[영어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50500/?cate_code=3052&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50346/?cate_code=3052&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50648/?cate_code=3052&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50306/?cate_code=3052&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                                </li>
                                <li>
                                    <span>[전기기기]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50719/?cate_code=3052&subject_idx=1314&subject_name=%EC%A0%84%EA%B8%B0%EA%B8%B0%EA%B8%B0')}}">최우영</a>
                                    <span>[전기이론]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50719/?cate_code=3052&subject_idx=1319&subject_name=%EC%A0%84%EA%B8%B0%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                                    <span>[전자공학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1339&subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99')}}">최우영</a>                                                                        
                                </li>
                                <li>
                                    <span>[무선공학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1340&subject_name=%EB%AC%B4%EC%84%A0%EA%B3%B5%ED%95%99')}}">최우영</a>
                                    <span>[통신이론]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1341&subject_name=%ED%86%B5%EC%8B%A0%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                                    <span>[회로이론]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50719/?cate_code=3052&subject_idx=1344&subject_name=%ED%9A%8C%EB%A1%9C%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                                </li>
                                <li>
                                    <span>[전자이론]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1342&subject_name=%EC%A0%84%EC%9E%90%ED%9A%8C%EB%A1%9C')}}">최우영</a>
                                    <span>[전기자기학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1356&subject_name=%EC%A0%84%EA%B8%B0%EC%9E%90%EA%B8%B0%ED%95%99')}}">최우영</a>
                                </li>
                                <li>
                                    <span>[재배학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1317&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99')}}">장사원</a>
                                    <span>[식용작물]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1318&subject_name=%EC%8B%9D%EC%9A%A9%EC%9E%91%EB%AC%BC')}}">장사원</a>
                                    <span>[작물생리학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1366&subject_name=%EC%9E%91%EB%AC%BC%EC%83%9D%EB%A6%AC%ED%95%99')}}">장사원</a>
                                </li>
                                <li>
                                    <span>[생물]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1327&subject_name=%EC%83%9D%EB%AC%BC')}}">장사원</a>
                                    <span>[농촌지도론]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1376&subject_name=%EB%86%8D%EC%B4%8C%EC%A7%80%EB%8F%84%EB%A1%A0')}}">장사원</a>
                                    <span>[토양학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1389&subject_name=%ED%86%A0%EC%96%91%ED%95%99')}}">장사원</a>
                                </li>
                                <li> 
                                    <span>[유기농업기능사]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1378&subject_name=%EC%9C%A0%EA%B8%B0%EB%86%8D%EC%97%85%EA%B8%B0%EB%8A%A5%EC%82%AC')}}">장사원</a>                        
                                    <span>[응용역학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50436/?cate_code=3052&subject_idx=1360&subject_name=%EC%9D%91%EC%9A%A9%EC%97%AD%ED%95%99%EA%B0%9C%EB%A1%A0')}}">장성국</a>
                                    <span>[토목설계]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50436/?cate_code=3052&subject_idx=1361&subject_name=%ED%86%A0%EB%AA%A9%EC%84%A4%EA%B3%84')}}">장성국</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>군무원</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50728/?cate_code=3048&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">오훈</a>
                                    <span>[행정법]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50616/?cate_code=3048&subject_idx=1257&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">이석준</a>
                                    <span>[행정학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50560/?cate_code=3048&subject_idx=1258&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                                </li>
                                <li>
                                    <span>[경영학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50762/?cate_code=3048&subject_idx=1331&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">고강유</a>
                                    <span>[전자공학]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1339&subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99')}}">최우영</a>
                                    <span>[통신이론]</span>
                                    <a href="{{front_url('/pass/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1341&subject_name=%ED%86%B5%EC%8B%A0%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">수강신청</a>
                    <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 GA2">
                        <div class="lec-drop-Box">
                            <h5>9급</h5>
                            <ul>
                                <li>
                                    <a href="{{front_url('/pass/offPackage/index?cate_code=3043')}}">종합반</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/pass/offLecture/index?cate_code=3043')}}">단과</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/book/index/cate/3019')}}">교재구매</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>7급</h5>
                            <ul>
                                <li>
                                    <a href="{{front_url('/pass/offPackage/index?cate_code=3044')}}">종합반</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/pass/offLecture/index?cate_code=3044')}}">단과</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/book/index/cate/3020')}}">교재구매</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>세무직</h5>
                            <ul>
                                <li>
                                    <a href="{{front_url('/pass/offPackage/index?cate_code=3046')}}">종합반</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/pass/offLecture/index?cate_code=3046')}}">단과</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/book/index/cate/3022')}}">교재구매</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>군무원</h5>
                            <ul>
                                <li>
                                    <a href="{{front_url('/pass/offPackage/index?cate_code=3048')}}">종합반</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/pass/offLecture/index?cate_code=3048')}}">단과</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/book/index/cate/3024')}}">교재구매</a>
                                </li>
                            </ul>
                        </div>                        
                        <div class="lec-drop-Box">
                            <h5>소방직</h5>
                            <ul>
                                <li>
                                    <a href="{{front_url('/pass/offPackage/index?cate_code=3050')}}">종합반</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/pass/offLecture/index?cate_code=3050')}}">단과</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/book/index/cate/3023')}}">교재구매</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>기술직</h5>
                            <ul>
                                <li>
                                    <a href="{{front_url('/pass/offPackage/index?cate_code=3052')}}">종합반</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/pass/offLecture/index?cate_code=3052')}}">단과</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/book/index/cate/3028')}}">교재구매</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>법원직</h5>
                            <ul>
                                <li>
                                    <a href="{{front_url('/pass/offPackage/index?cate_code=3059')}}">종합반</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/pass/offLecture/index?cate_code=3059')}}">단과</a>
                                </li>
                                <li>
                                    <a href="{{front_url('/book/index/cate/3035?cate_code=3035&subject_idx=')}}">교재구매</a>
                                </li>
                            </ul>
                        </div>                       
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">무료이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">무료이벤트</li>
                            <li><a href="#none">추천 패키지</a></li>
                            <li><a href="#none">선택 패키지</a></li>
                            <li><a href="#none">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">합격관리반</a>
                </li>
                <li>
                    <a href="#none">수험가이드</a>
                </li>
                <li>
                    <a href="#none">학원공지사항</a>
                </li>
                <li>
                    <a href="#none">전국학원</a>
                </li>
                <li class="pass">
                    <a href="//pass.local.willbes.net/home/index/cate/3019" target="_self">
                    공무원온라인<span class="arrow-Btn">></span>
                    </a>
                 </li>
            </ul>
        </h3>
    </div>
    <div class="Section MainVisual mt20">
        <div class="widthAuto">
            <div class="VisualBox p_re">
                <div id="MainRollingDiv" class="MaintabList five">
                    <ul class="Maintab">
                        <li><a data-slide-index="0" href="javascript:void(0);" class="active">7급공무원</a></li>
                        <li><a data-slide-index="1" href="javascript:void(0);" class="">9급공무원</a></li>
                        <li><a data-slide-index="2" href="javascript:void(0);" class="">소방직</a></li>
                        <li><a data-slide-index="3" href="javascript:void(0);" class="">군무원</a></li>
                        <li><a data-slide-index="4" href="javascript:void(0);" class="">기술직</a></li>
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <div class="bx-wrapper">
                        <div class="bx-viewport">
                            <ul class="MaintabSlider">
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider01.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider02.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider03.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider04.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider05.jpg') }}" alt="배너명"></a></li>
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="VisualsubBox mt20">
                <ul>
                    <li>
                        <div class="bSlider acad">
                            <div class="sliderTM">
                                <div><a href="http://willbes.com"><img src="{{ img_url('gosi_acad/visual/visualsub_190129.jpg') }}" alt="배너명"></a></div>
                                <div>
                                    <img src="https://www.local.willbes.net/public/img/willbes/gosi_acad/visual/visualsub_190131.jpg" usemap="#Mapaaaaa" border="0" />
                                    <map name="Mapaaaaa" id="Mapaaaaa">
                                        <area shape="rect" coords="24,17,162,142" href="http://www.naver.com" />
                                        <area shape="rect" coords="172,21,360,144" href="http://www.daum.net" />
                                    </map>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bSlider acad">
                            <div class="sliderTM">
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190130.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190129.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bSlider acad">
                            <div class="sliderTM">
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190131.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190130.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Bnr mt5 mb80">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="#none"><img src="{{ img_url('gosi_acad/banner/bnr_190129.jpg') }}" alt="배너명"></a></li>
                </ul>
            </div>
        </div>
    </div>




    <div class="Section Section2 pt80 pb80">
        <div class="widthAuto">
            <div class="gosi-acadTit NSK-Thin mb50">
                여러분의 꿈과 목표를 위해,<br />
                <strong class="NSK-Black">오늘도 최선을 다하는 <span class="tx-color">윌비스 고시학원</span></strong>
            </div>
            <ul class="ProfBox">
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox01.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox04.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox02.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox05.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox03.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox01.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox04.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox02.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox05.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox03.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox01.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox04.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox02.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox05.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox03.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox01.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox04.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox02.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
                <li>
                	<div class="bSlider acad">
						<div class="sliderTM">
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox05.jpg') }}" alt="배너명"></a></div>
							<div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox03.jpg') }}" alt="배너명"></a></div>
                        </div>
					</div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section Section1 mt60">
        <div class="widthAuto">
            <div class="noticeTabs acad">
                <ul class="tabWrap noticeWrap_acad three">
                    <li><a href="#notice1" class="on">시험공고</a></li>
                    <li><a href="#notice2" class="">수험뉴스</a></li>
                    <li><a href="#notice3" class="">합격수기</a></li>
                </ul>
                <div class="tabBox noticeBox_acad">
                    <div id="notice1" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>HOT</span>국가직 | 2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a></li>
                            <li><a href="#none"><span>HOT</span>서울시 | 2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a></li>
                            <li><a href="#none">제주도 | 2019년도 제주교육청 지방공무원 임용시험 일정안내</a></li>
                            <li><a href="#none">광주광역시 | 2019년도 광주교육청 지방공무원 임용시험 일정안내</a></li>
                            <li><a href="#none">부산광역시 | 2019년도 부산교육청 지방공무원 임용시험 일정안내</a></li>
                        </ul>
                    </div>
                    <div id="notice2" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a></li>
                            <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a></li>
                            <li><a href="#none">설연휴학원고객센터운영안내22</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내22</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내22</a></li>
                        </ul>
                    </div>
                    <div id="notice3" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.333</a></li>
                            <li><a href="#none">3월 31일(금) 새벽시스템점검안내333</a></li>
                            <li><a href="#none">설연휴학원고객센터운영안내333</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내333</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내333</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="sliderEvt pick">
                <div class="will-acadTit">윌비스 <span class="tx-color">이벤트</span></div>
                <div class="bSlider acad">
                    <div class="sliderTM">
                        <div><a href="#none"><img src="{{ img_url('gosi_acad/event/evt190130.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi_acad/event/evt190130.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>
            </div>

            <ul class="acad_infoBox">
                <li class="w-infoBox1">
                    <a href="#none"><span>1:1 학습컨설팅</span></a>
                </li>
                <li class="w-infoBox2">
                    <a href="#none"><span>학원실강접수</span></a>
                </li>
                <li class="w-infoBox3">
                    <a href="#none"><span>학원개강안내</span></a>
                </li>
                <li class="w-infoBox4">
                    <a href="#none"><span>강의실배정표</span></a>
                </li>
                <li class="w-infoBox5">
                    <a href="#none"><span>모의고사신청</span></a>
                </li>
            </ul>
        </div>
    </div>


    <div class="Section mt80">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">공무원학원</span> 교수님</div>
            <img src="{{ img_url('gosi_acad/prof/ProfBig.jpg') }}" alt="배너명">
        </div>
    </div>


    <div class="Section mb50">
        <div class="widthAuto">
            <div class="sliderSuccess">
                <div class="will-acadTit">학원 <span class="tx-color">갤러리</span></div>
                <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                <ul>
                    <li>
                        <img src="{{ img_url('gosi_acad/gallery/gallery01.jpg') }}" alt="배너명">    
                        <div>   
                            <strong>[노량진]</strong>
                            <p>새벽부터 길게 늘어선 학원수강생의 모습 학원수강생의 모습 학원수강생의 모습</p>
                            <span>2019-01-15</span>   
                        </div> 
                    </li>
                    <li>
                        <img src="{{ img_url('gosi_acad/gallery/gallery02.jpg') }}" alt="배너명">    
                        <div>   
                            <strong>[노량진]</strong>
                            <p>새벽부터 길게 늘어선 학원수강생의 모습 학원수강생의 모습 학원수강생의 모습</p>
                            <span>2019-01-15</span>   
                        </div>     
                    </li>
                </ul>
            </div>
            <div class="sliderInfo">
                <div class="will-acadTit">Hot <span class="tx-color">Focus</span></div>
                <a href="#none" target="_blank">
                    <img src="{{ img_url('gosi_acad/event/hotFocus01.jpg') }}" alt="배너명">
                </a>
            </div>
        </div>
    </div>


    <div class="Section Section4 mb50">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">공무원</span> 캠퍼스</div>
            <div class="noticeTabs campus c_both">
                <ul class="tabWrap noticeWrap_campus">
                    <li><a href="#campus1" class="on">노량진(본원)</a><span class="row-line">|</span></li>
                    <li><a href="#campus2" class="">인천</a><span class="row-line">|</span></li>
                    <li><a href="#campus3" class="">대구</a><span class="row-line">|</span></li>
                    <li><a href="#campus4" class="">부산</a><span class="row-line">|</span></li>
                    <li><a href="#campus5" class="">광주</a></li>
                </ul>
                <div class="tabBox noticeBox_campus">
                    <div id="campus1" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapSeoul.jpg') }}" alt="노량진">
                            <span class="origin">노량진(본원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">노량진</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">노량진</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울시 동작구 장승배기로 168 드림타워<br/>
                                                (서울시 동작구 노량진동 54-11번지)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-0330</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                                <a href="http://pf.kakao.com/_kcZIu/chat" target="_blank"><img src="{{ img_url('gosi_acad/icon_kakaotalk.png') }}"> 카톡상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 노량진 //-->

                    <div id="campus2" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapIC.jpg') }}" alt="인천">
                            <span>인 천</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">인천</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">인천</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                인천 부평구 광장로 26 서연빌딩 4층 
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-1661</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 인천 //-->

                    <div id="campus3" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapDG.jpg') }}" alt="대구">
                            <span>대 구</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">대구</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">대구</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                대구 중구 중앙대로 412 CGV 2층 <br/>
                                                (남일동)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1522-6112</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 대구 //-->

                    <div id="campus4" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapBS.jpg') }}" alt="부산">
                            <span>부 산</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">부산</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">부산</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                부산 부산진구 부전동 223-8
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1522-8112</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 부산 //-->

                    <div id="campus5" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapKJ.jpg') }}" alt="광주">
                            <span>광 주</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">광주</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">광주</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                광주 북구 호동로 6-11
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">062-514-4560</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 광주 //-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->
@stop