<form id="auth_form" name="auth_form" method="POST" onsubmit="return false;" enctype="multipart/form-data" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="ag_idx" id="ag_idx" value="{{$data['AgIdx']}}">
    <input type="hidden" name="learn_pattern" value="book"/> {{--학습형태--}}
    <input type="hidden" name="cart_type" value="book"/> {{--장바구니 탭 아이디--}}
    <input type="hidden" name="is_direct_pay" value=""/> {{--바로결제 여부--}}

    {{--<input type="hidden" id="auth_affiliation" name="auth_affiliation" value="2024학년도 대비 Warm up class 모집"/>
    <input type="hidden" id="etc_content1" name="etc_content1" value="프로모션-{{$promotion}}"/>--}}

    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03.jpg" alt="인강 무료체험 신청"/>
    <h5 class="NSK-Black">이벤트참여 사전 동의사항 <span class="NSK">* 윌비스임용의 본 이벤트 참여를 위해서는 아래 명시된 사항을 자세히 읽어 보시고 동의를 해주셔야 가능합니다.</span></h5>
    <ul class="infotext">
        <li>개인정보 수집 이용 목적<br>
            - 본 이벤트의 대상자(대학교(원)의 재학생) 확인 및 각종 문의사항 응대<br>
            - 통계분석 및 기타 마케팅에 활용<br>
            - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공 </li>
        <li>개인정보 수집 항목<br>
            - 필수 항목 : 성명, 본사ID, 연락처, 재학중인 학교와 학과(학부)의 재학생 임을 인증할 수 있는 서류(재학증명서, 성적증명서 등)<br>
            - 문화상품권 수령자: 주민등록증 사본 </li>
        <li>개인정보 이용기간 및 보유기간<br>
            - 본사의 이용 목적 달성되었거나, 신청자의 해지 요청 및 삭제요청 시 바로 파기 </li>
        <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다. </li>
        <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
        <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
    </ul>
    <div class="checkinfo"><input type="checkbox" name="auth_is_chk" value="Y" id="auth_is_chk"><label for="auth_is_chk"> 이벤트참여에 따른 개인정보 및 마케팅활용 동의하기(필수)</label></div>
    <h5 class="NSK-Black mt50">재학생 인증 <span class="NSK">* 윌비스임용의 본 이벤트의 대상자는 임용시험준비를 시작하는 대학교(원)의 재학생입니다.</span></h5>
    <div>
        <table>
            <col width="18%">
            <col width="25%">
            <col width="15%">
            <col width="20%">
            <col width="15%">
            <col>
            <tr>
                <th>이름</th>
                <td>{{ sess_data('mem_name') }}</td>
                <th>윌비스 ID</th>
                <td>{{ sess_data('mem_id') }}</td>
                <th>연락처</th>
                <td><input type="text" id="auth_phone" name="auth_phone" value="{{ sess_data('mem_phone') }}" maxlength="11"/></td>
            </tr>
            <tr>
                <th>대학교(원)/학부(학과)</th>
                <td><input type="text" name="auth_affiliation" id="auth_affiliation" title="대학교(원) / (학부)학과" maxlength="50" style="width:100%"></td>
                <th>재학생인증 파일</th>
                <td colspan="3">
                    <div>
                        <input type="file" id="auth_attach_file" name="auth_attach_file" title="재학생인증 파일" onchange="chkUploadFile(this);" style="width:60%"/>&nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" alt="삭제"></a>

                        <p class="tx12 mt10">*파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등)만 가능합니다.</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="mt10">* 재학생 인증 파일은 <strong>재학증명서, 성적증명서 등 재학생임을 인증할 수 있는 서류</strong>만 인정됩니다. (학생증 X)</div>

    {{--<div class="btns">
        <a href="javascript:void(0);" onclick="fn_submit();">확인</a>
        <a href="javascript:void(0);" onclick="reset_form(this);">취소</a>
    </div>--}}

    <div class="freelecList">
        <h5 class="NSK-Black">인강 <strong>2주 무료체험</strong> 강좌 <span class="NSK">* 본 무료체험 최대 4개강좌까지 신청이 가능합니다.</span></h5>
        <div class="freelecwrap">
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t01.jpg" alt=""/>
                    <div>
                        <p>합격할 수 있는<br> 구체적 방법 제시!!</p>
                        <p>국어교육론<br> 문학교육론</p>
                        <p>송원영 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[0]['ProdCode']}}" id="{{$list_product[0]['GroupNum'].'-'.$list_product[0]['ProdCode']}}">
                            국어/문학교육론 이론정리 <span>[{{ $list_product[0]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t02.jpg" alt=""/>
                    <div>
                        <p>시험 출제 교수진의<br> 의도가 잘 반영된 강의! </p>
                        <p>국어문법</p>
                        <p>권보민 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[1]['ProdCode']}}" id="{{$list_product[1]['GroupNum'].'-'.$list_product[1]['ProdCode']}}">
                            현대 국어 문법 기초다지기 <span>[{{ $list_product[1]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t03.jpg" alt=""/>
                    <div>
                        <p>지금, 여기!!<br> 깨어있는 국어교육!</p>
                        <p>전공국어</p>
                        <p>구동언 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[2]['ProdCode']}}" id="{{$list_product[2]['GroupNum'].'-'.$list_product[2]['ProdCode']}}">
                            국어교육의 이해 <span>[{{ $list_product[2]['wUnitLectureCnt'] }}강]</span></label></li>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[3]['ProdCode']}}" id="{{$list_product[3]['GroupNum'].'-'.$list_product[3]['ProdCode']}}">
                            학교문법의 이해(현대국어 체계) <span>[{{ $list_product[3]['wUnitLectureCnt'] }}강]</span></label></li>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[4]['ProdCode']}}" id="{{$list_product[4]['GroupNum'].'-'.$list_product[4]['ProdCode']}}">
                            문학교육의 이해(현대시) <span>[{{ $list_product[4]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t04.jpg" alt=""/>
                    <div>
                        <p>합격생이 추천하는<br> 명품강의!!</p>
                        <p>일반영어<br> 영미문학</p>
                        <p>김유석 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[5]['ProdCode']}}" id="{{$list_product[5]['GroupNum'].'-'.$list_product[5]['ProdCode']}}">
                            영미문학 영미시의 이해 <span>[{{ $list_product[5]['wUnitLectureCnt'] }}강]</span></label></li>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[6]['ProdCode']}}" id="{{$list_product[6]['GroupNum'].'-'.$list_product[6]['ProdCode']}}">
                            일반영어 Power Reading Skills <span>[{{ $list_product[6]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t05.jpg" alt=""/>
                    <div>
                        <p>영어학의 정석!<br>합격의 가장 빠른 길!!</p>
                        <p>영어학</p>
                        <p>김영문 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[7]['ProdCode']}}" id="{{$list_product[7]['GroupNum'].'-'.$list_product[7]['ProdCode']}}">
                            영어학 기본이론 1 <span>[{{ $list_product[7]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t06.jpg" alt=""/>
                    <div>
                        <p>합격 전략에 기반을 둔,<br> 명쾌한 전공수학!</p>
                        <p>전공수학</p>
                        <p>김철홍 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[8]['ProdCode']}}" id="{{$list_product[8]['GroupNum'].'-'.$list_product[8]['ProdCode']}}">
                            대수학과 정수론 <span>[{{ $list_product[8]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t07.jpg" alt=""/>
                    <div>
                        <p>학습방법. 시기,<br>학습량의 균형!!<br>최적의 커리큘럼!</p>
                        <p>수학교육론</p>
                        <p>박태영 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[9]['ProdCode']}}" id="{{$list_product[9]['GroupNum'].'-'.$list_product[9]['ProdCode']}}">
                            신론과 기출을 결합한 이론 <span>[{{ $list_product[9]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t11.jpg" alt=""/>
                    <div>
                        <p>방대한 학습범위를<br> 효과적으로 정리!</p>
                        <p>도덕윤리</p>
                        <p>김병찬 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[10]['ProdCode']}}" id="{{$list_product[10]['GroupNum'].'-'.$list_product[10]['ProdCode']}}">
                            교과내용학(서양,동양,한국윤리) <span>[{{ $list_product[10]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t08.jpg" alt=""/>
                    <div>
                        <p>학적중!<br> 신뢰의 이름!!</p>
                        <p>전공역사</p>
                        <p>김종권 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[11]['ProdCode']}}" id="{{$list_product[11]['GroupNum'].'-'.$list_product[11]['ProdCode']}}">
                            전공역사 개념 구조화 <span>[{{ $list_product[11]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t09.jpg" alt=""/>
                    <div>
                        <p>합격으로 가는<br>가장 빠르고<br> 안전한 방법!!</p>
                        <p>전기.전자.통신</p>
                        <p>최우영 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[12]['ProdCode']}}" id="{{$list_product[12]['GroupNum'].'-'.$list_product[12]['ProdCode']}}">
                            기초 전기전자/회로이론 <span>[{{ $list_product[12]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox">
                <div class="lecimg">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t10.jpg" alt=""/>
                    <div>
                        <p>20년 강의 경력,<br> 임용 중국어<br> 합격의 기준!!</p>
                        <p>전공중국어</p>
                        <p>장영희 교수</p>
                    </div>
                </div>
                <ul>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[13]['ProdCode']}}" id="{{$list_product[13]['GroupNum'].'-'.$list_product[13]['ProdCode']}}">
                            중국어 이론 입문 <span>[{{ $list_product[13]['wUnitLectureCnt'] }}강]</span></label></li>
                    <li><label><input type="checkbox" name="app_prod_code[]" value="{{$list_product[14]['ProdCode']}}" id="{{$list_product[14]['GroupNum'].'-'.$list_product[14]['ProdCode']}}">
                            중국어 독해 입문 <span>[{{ $list_product[14]['wUnitLectureCnt'] }}강]</span></label></li>
                </ul>
            </div>
            <div class="freelecbox"></div>
            <div class="freelecbox"></div>
        </div>
        <div class="btns">
            <a href="javascript:;" class="auth_apply">인강 2주 무료체험 신청하기 ></a>
        </div>
    </div>
</form>

<script type="text/javascript">
    var $auth_form = $('#auth_form');
    var $limit_cnt = {{$data['LimitSelectCnt']}};

    $(document).ready(function (){
        $auth_form.find('.auth_apply').click(function() {
            {!! sess_data('is_login') !== true ? 'fn_login_check();return;' : '' !!} {{-- TODO ajax 로 호출 한 본체 function--}}
            @if($is_apply === 'Y')
                var _url = '{!! front_url('authGive/apply/') !!}';
                ajaxSubmit($auth_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, addValidate, false, 'alert');
            @else
                alert("{{$is_apply_msg}}");return;
            @endif
        });

        var addValidate = function() {
            if($auth_form.find("input:checkbox[name='auth_is_chk']").is(":checked") === false) {
                alert("이벤트참여에 따른 개인정보 및 마케팅 활용에 동의하셔야 신청이 가능합니다.");
                $auth_form.find("input:checkbox[name='auth_is_chk']").focus();
                return false;
            }
            if($auth_form.find("input:text[name='auth_phone']").val() === '') {
                alert($auth_form.find("input:text[name='auth_phone']").prop('title')+" (을)를 입력해 주세요.");
                $auth_form.find("input:text[name='auth_phone']").focus();
                return false;
            }
            if($auth_form.find("input:text[name='auth_affiliation']").val() === '') {
                alert($auth_form.find("input:text[name='auth_affiliation']").prop('title')+" (을)를 입력해 주세요.");
                $auth_form.find("input:text[name='auth_affiliation']").focus();
                return false;
            }
            if($auth_form.find("input:file[name='auth_attach_file']").val() === '') {
                alert($auth_form.find("input:file[name='auth_attach_file']").prop('title')+" (을)를 등록해 주세요.");
                $auth_form.find("input:file[name='auth_attach_file']").focus();
                return false;
            }
            if ($('input:checkbox[name="app_prod_code[]"]:checked').length < 1) {
                alert('강좌를 선택해 주세요.');
                return false;
            }
            if ($('input:checkbox[name="app_prod_code[]"]:checked').length > $limit_cnt) {
                alert($limit_cnt+"개 강좌까지만 신청 가능합니다.");
                return false;
            }
            if (!confirm('해당 강좌를 신청하시겠습니까?')) { return false; }
            return true;
        }
    });

    function chkUploadFile(ele){
        if($(ele).val()){
            var filename =  $(ele).prop("files")[0].name;
            var ext = filename.split('.').pop().toLowerCase();
            if($.inArray(ext, ['gif','jpg','jpeg','png','bmp','pdf']) == -1) {
                $(ele).val("");
                alert('이미지 파일 또는 PDF 파일만 업로드 가능합니다.');
            }
        }
    }

    function del_file(){
        if($("#auth_attach_file").val() != '') {
            if(confirm("첨부파일을 삭제 하시겠습니까?")) {
                $("#auth_attach_file").val("");
            }
        }
    }
</script>