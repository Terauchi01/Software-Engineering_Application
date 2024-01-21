{/* 
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
    $.getJSON('/data/banks.json', function(json){
        banksList = json;
        var bankSelect = $('#bankSelect');
        $.each(banksList, function(key, value) {
            bankSelect.append($('<option>', {
                value: key,
                text: value.name
            }));
        });
        bankSelect.on('change', function() {
            var selectedBankCode = $(this).val();
            var branchSelect = $('#branchSelect');
            var brancheList=[];
            $.getJSON('/data/branches/' + selectedBankCode + '.json', function(json) {
                brancheList = json;
                branchSelect.empty();
                branchSelect.append($('<option>', {
                    value: '',
                    text: '支店名を選択してください'
                }));
                $.each(brancheList, function(branchCode, branch) {
                    branchSelect.append($('<option>', {
                        value: branchCode,
                        text: branch.name
                    }));
                });
            }).fail(function(jqXHR, textStatus, errorThrown) {
                // console.log('支店名の取得に失敗');
            });
        });
        var bankSearch = $('#bankSearch');
        bankSearch.on('input', function() {
            var searchKeyword = bankSearch.val().trim().toLowerCase();
            bankSelect.empty();
            bankSelect.append($('<option>', {
                value: '',
                text: '銀行名を検索してください'
            }));
            $.each(banksList, function(key, value) {
                if (value.name.toLowerCase().includes(searchKeyword)) {
                    bankSelect.append($('<option>', {
                        value: key,
                        text: value.name
                    }));
                }
            });
        });
    }).fail(function(jqXHR, textStatus, errorThrown) {
        // console.log('JSONデータ銀行名の取得に失敗');
    });
});