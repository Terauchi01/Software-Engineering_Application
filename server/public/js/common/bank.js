{/* 
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/common/bank.js') }}"></script>
<h2>銀行情報</h2>
<label for="bank_id">銀行名</label>
<input type="text" id="bankSearch" placeholder="銀行名を検索">
<select id="bankSelect" name="bank_id">
    <option value="" disabled selected>銀行名を選択してください</option>
</select>

<label for="branch_id">支店名</label>
<select id="branchSelect" name="branch_id">
    <option value="" disabled selected>支店名を選択してください</option>
</select> 
*/}
$(document).ready(function() {
    var banksList = [];
    var bankSelect = $('#bankSelect');
    var branchSelect = $('#branchSelect');
    var bankSearch = $('#bankSearch');
    console.log(nowBankId);
    console.log(nowBranchId);

    function populateBankSelect(selectedBankId = null) {
        bankSelect.empty().append($('<option>', { value: '', text: '銀行名を選択してください' }));
        
        $.each(banksList, function(key, value) {
            var option = $('<option>', { value: key, text: value.name });
            if (key == selectedBankId) {
                option.attr('selected', true);
            }
            bankSelect.append(option);
        });
        
        branchSelect.empty().append($('<option>', { value: '', text: '支店名を選択してください' }));
        var selectedBankCode = bankSelect.val();
        populateBranchSelect(selectedBankCode,nowBranchId);
    }

    function populateBranchSelect(selectedBankCode = null, selectedBranchId = null) {
        if (!selectedBankCode) {
            return;
        }
        
        $.getJSON('/data/branches/' + selectedBankCode + '.json', function(json) {
            branchSelect.empty().append($('<option>', { value: '', text: '支店名を選択してください' }));
            
            $.each(json, function(branchCode, branch) {
                var option = $('<option>', { value: branchCode, text: branch.name });
                if (branchCode == selectedBranchId) {
                    option.attr('selected', true);
                }
                branchSelect.append(option);
            });
        }).fail(function(jqXHR, textStatus, errorThrown) {
            // console.log('支店名の取得に失敗');
        });
    }

    bankSelect.on('change', function() {
        var selectedBankCode = $(this).val();
        populateBranchSelect(selectedBankCode);
    });

    bankSearch.on('input', function() {
        var searchKeyword = bankSearch.val().trim().toLowerCase();
        populateBankSelect();
        bankSelect.trigger('change');
    });

    // JSONデータの取得
    $.getJSON('/data/banks.json', function(json){
        banksList = json;
        populateBankSelect(nowBankId); // 初回ロード時の初期化
    }).fail(function(jqXHR, textStatus, errorThrown) {
        // console.log('JSONデータ銀行名の取得に失敗');
    });
});
