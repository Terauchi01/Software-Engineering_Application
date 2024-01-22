{/* 
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var bankId = {{ intval($data['bank_id'], 10) }};
    var branchId = {{ intval($data['branch_id'], 10) }};
</script>
<script src="{{ asset('js/common/view_bank.js') }}"></script> 
AdminViewCoopInfo.blade.phpを見る
*/}
$(document).ready(function() {
    var formattedBankId = bankId.toString().padStart(4, '0');
    var banksList = [];
    $.getJSON('/data/banks.json', function(json) {
        banksList = json;
        var bankName = banksList[formattedBankId] ? banksList[formattedBankId].name : '銀行が見つかりません';
        $('#bankInfo').html('<p>銀行名 ' + bankName + '</p>');
    });

    var formattedBranchId = branchId.toString().padStart(3, '0');
    var branchList = [];
    $.getJSON('/data/branches/' + formattedBankId + '.json', function(json) {
        branchList = json;
        var branchName = branchList[formattedBranchId] ? branchList[formattedBranchId].name : '支店が見つかりません';
        $('#branchInfo').html('<p>支店名 ' + branchName + '</p>');
    });
});