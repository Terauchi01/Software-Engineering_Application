//<script src="{{ asset('js/admin/delete.js') }}"></script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('masterCheckbox').addEventListener('change', function() {
        var masterCheckbox = this;
        var itemCheckboxes = document.querySelectorAll('.itemCheckbox');

        itemCheckboxes.forEach(function(itemCheckbox) {
            itemCheckbox.checked = masterCheckbox.checked;
        });
    });

    // 各行のチェックボックスに対するイベントリスナーも追加する場合
    document.querySelectorAll('.itemCheckbox').forEach(function(itemCheckbox) {
        itemCheckbox.addEventListener('change', function() {
            var allChecked = true;
            document.querySelectorAll('.itemCheckbox').forEach(function(checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });
            document.getElementById('masterCheckbox').checked = allChecked;
        });
    });
    document.getElementById('deleteButton').addEventListener('click', function() {
        var selectedCoops = document.querySelectorAll('.itemCheckbox:checked');

        if (selectedCoops.length > 0) {
            var confirmation = confirm("選択した項目を削除しますか？");

            if (confirmation) {
                const selectedIds = Array.from(selectedCoops).map(function(checkbox) {
                    return checkbox.value;
                });
                var url = $('#url').val();
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: { elements: selectedIds },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log('リクエストが成功しました:', response);                        
                        document.querySelectorAll('.itemCheckbox').forEach(function(checkbox) {
                            checkbox.checked = false;
                        });
                        location.reload();
                    },
                    error: function (error) {
                        console.error('エラー:', error);
                    }
                });
            }
        } else {
            alert("削除する項目を選択してください。");
        }
    });
});
