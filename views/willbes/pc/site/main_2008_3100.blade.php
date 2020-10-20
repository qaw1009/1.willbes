@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container cop2008 NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section mt30">
            <div class="widthAuto">  
                <div class="widthAuto smallTit mt60">          
                    <p><span>제70기 경찰간부합격 <strong>PROGRAM</strong></span></p>            
                </div>
            </div>
            <div class="widthAuto bnrSec01 nSlider pick mt60"> 
                <ul>
                    <li>
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderNum') !!}
                    </li>
                    <li>
                        {!! banner_html(element('메인_서브', $data['arr_main_banner']), 'sliderNum') !!}
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mt95">
            <div class="widthAuto">  
                <div class="widthAuto smallTit">           
                    <p><span>윌비스한림법학원 경찰간부 <strong>전문 교수진</strong></span></p>            
                </div>
            </div>
            <div class="widthAuto">
                <ul class="ProfCopBox mt60">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/3100_prof_yas.jpg" alt="조현">
                        <ul class="ProfBtns">
                            <li><a href="javascript:alert('맛보기 준비중')">▶</a></li>
                            <li><a href="/professor/show/cate/3100/prof-idx/51141?subject_idx=1595&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    {{--
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/3100_prof_jjh.jpg" alt="정주형">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50859', 'OT');">▶</a></li>
                            <li><a href="/professor/show/cate/3100/prof-idx/50859/?subject_idx=1595&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    --}}
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/3100_prof_kth.jpg" alt="고태환">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50863', 'OT');">▶</a></li>
                            <li><a href="/professor/show/cate/3100/prof-idx/50863/?subject_idx=1597&subject_name=%EB%AF%BC%EB%B2%95%EC%B4%9D%EC%B9%99" target="_blank">교수소개</a></li>
                        </ul>
                    </li>                    
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/3100_prof_mhs.jpg" alt="문형석">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50856', 'OT');">▶</a></li>
                            <li><a href="/professor/show/cate/3100/prof-idx/50856/?subject_idx=1592&subject_name=%ED%98%95%EB%B2%95" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/3100_prof_ldh.jpg" alt="이동호">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50858', 'OT');">▶</a></li>
                            <li><a href="/professor/show/cate/3100/prof-idx/50858/?subject_idx=1593&subject_name=%ED%96%89%EC%A0%95%ED%95%99" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/3100_prof_jjc.jpg" alt="정진찬">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50862', 'OT');">▶</a></li>
                            <li><a href="/professor/show/cate/3100/prof-idx/50862/?subject_idx=1594&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/3100_prof_ljs.jpg" alt="임진석">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50855', 'OT');">▶</a></li>
                            <li><a href="/professor/show/cate/3100/prof-idx/50855/?subject_idx=1591&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mt95">
            <div class="widthAuto">  
                <div class="widthAuto smallTit">          
                    <p><span>윌비스한림법학원 경찰간부 <strong>온라인 Hot Issue</strong></span></p>            
                </div>
            </div>
            <div class="widthAuto bnrSec02 mt60"> 
                <ul>
                    @for($i=1; $i<=2; $i++)
                        @if(isset($data['arr_main_banner']['메인_강좌소개_'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_강좌소개_'.$i], 'slider') !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mb100 mt50">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>    

        <div id="QuickMenu" class="MainQuickMenu">
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>    
    </div>    
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop