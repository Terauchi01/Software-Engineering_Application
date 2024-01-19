//<script>const citiesData = @json($Cities);</script>
//<script src="{{ asset('js/common/city.js') }}"></script>
//server/resources/views/coop/CoopRegistrationRequest.blade.phpこれとそのコントローラを参照
document.addEventListener('DOMContentLoaded', function() {
    // const citiesData = @json($Cities); // コントローラーから渡された市区町村データ
    function updateCities() {
        const selectedPrefecture = document.getElementById('prefecture').value;
        const citiesSelect = document.getElementById('city');
    
        // 現在の選択肢をクリア
        citiesSelect.innerHTML = '';
    
        // 対応する市区町村を追加
        if (selectedPrefecture in citiesData) {
            // オブジェクトの各プロパティに対して処理を行う
            for (const id in citiesData[selectedPrefecture]) {
                if (citiesData[selectedPrefecture].hasOwnProperty(id)) {
                    const option = document.createElement('option');
                    option.value = id;
                    option.text = citiesData[selectedPrefecture][id];
                    citiesSelect.appendChild(option);
                }
            }
        }
    }
    
    // 都道府県が変更されたときに市区町村を更新
    document.getElementById('prefecture').addEventListener('change', updateCities);
    
    // 初期表示時にも実行
    updateCities();
});