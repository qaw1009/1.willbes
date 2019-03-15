<script>
var book_data = [];
@foreach($data as $row)
    @foreach($row['ProdBookData'] as $book_row)
    book_data['{{$row['ProdCode']}}_{{$book_row['ProdBookCode']}}'] = '<tr>'+
'<td class="btnClose"><a href="javascript:;" onclick="fnDelBook(this);"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>'+
'<td class="w-tit tx-left pl60">{{$book_row['ProdBookName']}}</td>'+
'<td class="w-price">{{number_format($book_row['RealSalePrice'])}}원'+
'<input type="hidden" name="prod_code[]" class="bookorder" data-price="{{ $book_row['RealSalePrice'] }}" value="{{$book_row['ProdBookCode']}}:613001:{{$row['ProdCode']}}" /></td>'+
'</tr>';
    @endforeach
@endforeach
</script>
@forelse($data as $row)
    @if(empty($row['ProdBookData']) == false)
        <table cellspacing="0" cellpadding="0" class="listTable passTable under-gray tx-gray">
            <colgroup>
                <col style="width: 60px;">
                <col style="width: 70px;">
                <col style="width: 410px;">
                <col style="width: 70px;">
                <col style="width: 140px;">
            </colgroup>
            <thead>
            <tr>
                <th class="tx-left" colspan="5">
                    {{$row['SubjectName']}}<span class="row-line">|</span>{{$row['wProfName']}}<br/>
                    <div class="w-tit tx-left strong">{{$row['subProdName']}}</div>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($row['ProdBookData'] as $book_row)
                <tr>
                    <td><input type="checkbox" id="goods_chk" name="goods_chk" onchange="fnBookAdd(this);" class="goods_chk" value="{{$row['ProdCode']}}_{{$book_row['ProdBookCode']}}" @if($book_row['wSaleCcd'] != '112001' || $book_row['Paid'] == true) disabled="disabled" @endif></td>
                    <td class="w-type"><span class="tx-light-blue">{{$book_row['BookProvisionCcdName']}}</span></td>
                    <td class="w-tit tx-left pl20">{{$book_row['ProdBookName']}}</td>
                    <td class="w-buy"><span class="tx-{{($book_row['wSaleCcd'] == '112001') ? 'light-blue' : 'red'}}">[{{$book_row['wSaleCcdName']}}]</span></td>
                    <td class="w-price">{{number_format($book_row['RealSalePrice'])}}원 (<span class="tx-red">↓{{$book_row['SaleRate']}}{{$book_row['SaleRateUnit']}}</span>)</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@empty
    <table cellspacing="0" cellpadding="0" class="listTable passTable under-gray tx-gray">
        <colgroup>
            <col style="width: 60px;">
            <col style="width: 70px;">
            <col style="width: 410px;">
            <col style="width: 70px;">
            <col style="width: 140px;">
        </colgroup>
        <thead>
        <tr>
            <th class="tx-center" colspan="5" style="text-align: center;">검색된 목록이 없습니다.</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endforelse
<script type="text/javascript">
    function fnDelBook(obj, price)
    {
        $(obj).parent().parent().remove();
        fnUpdateBookPrice();
    }

    function fnBookAdd(obj)
    {
        if($(obj).is(":checked")){
            $('#book-order-table > tbody:last').append(book_data[$(obj).val()]).end();
        }
        fnUpdateBookPrice();
    }

    function fnUpdateBookPrice()
    {
        var price = 0;
        var trans = 0;

        $(".bookorder").each(function(index){
            price += $(this).data('price')
        });

        /*
        if(price > 0){
            trans = 2500;
        } else {
            trans = 0;
        }
        */

        //$("#trans-price").text(addComma(trans) + '원');
        $("#book-price").text(addComma(price) + '원');
        $("#tot-price").text(addComma(trans+price) + '원');
    }
</script>