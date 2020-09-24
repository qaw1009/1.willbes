<a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}'); hideContinueLayer('buy_continue_layer');">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">
    교재상세정보
</div>
<div class="lecDetailWrap">
    <div class="tabBox">
        <div class="tabLink book2">
            <div class="bookWrap">
                <div class="bookInfo">
                    <div class="bookImg">
                        <img src="{{ $data['wAttachImgPath'] . $data['wAttachImgOgName'] }}" width="200" height="250">
                    </div>
                    <div class="bookDetail p_re">
                        <div class="bookBuy">
                            @if($data['IsSalesAble'] == 'Y')
                            <ul class="bookBuyBtns">
                                <li class="btnCart"><a href="#none" name="btn_book_cart" data-direct-pay="N" data-is-redirect="N" data-prod-code="{{ $data['ProdCode'] }}" data-layer-dt-type="info_form">장바구니</a>
                                <li class="btnBuy"><a href="#none" name="btn_book_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $data['ProdCode'] }}">바로결제</a></li>
                            </ul>
                            @endif
                        </div>
                        <div class="book-Tit tx-dark-black NG">{{ $data['ProdName'] }}</div>
                        <div class="book-Author tx-gray">
                            <ul>
                                <li>분야 : {{ $data['CateName'] }} <span class="row-line">|</span></li>
                                <li>저자 : {{ $data['wAuthorNames'] }} <span class="row-line">|</span></li>
                                <li>출판사 : {{ $data['wPublName'] }} <span class="row-line">|</span></li>
                                <li>판형/쪽수 : {{ $data['wEditionSize'] }} / {{ $data['wPageCnt'] }}</li>
                            </ul>
                            <ul>
                                <li>출판일 : {{ $data['wPublDate'] }} <span class="row-line">|</span></li>
                                <li>교재비 : <strong class="tx-light-blue">{{ number_format($data['RealSalePrice']) }}원</strong> (↓{{ $data['SaleRate'] . $data['SaleRateUnit'] }})
                                    <strong class="tx-{{ $data['wSaleCcd'] == '112001' ? 'light-blue' : 'red' }}">[{{ $data['wSaleCcdName'] }}]</strong>
                                </li>
                            </ul>
                        </div>
                        <div class="bookBoxWrap">
                            <ul class="tabWrap tabDepth2">
                                <li><a href="#info1" class="pl10 pr10 on">교재소개</a></li>
                                <li><a href="#info2" class="pl10 pr10">교재목차</a></li>
                            </ul>
                            <div class="tabBox">
                                <div id="info1" class="tabContent">
                                    <div class="book-TxtBox tx-gray">
                                        {!! $data['wBookDesc'] !!}
                                    </div>
                                </div>
                                <div id="info2" class="tabContent">
                                    <div class="book-TxtBox tx-gray">
                                        {!! $data['wTableDesc'] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/public/js/willbes/tabs.js"></script>