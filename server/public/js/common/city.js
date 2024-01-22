//<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
//<script>const citiesData = @json($Cities);</script>
//<script src="{{ asset('js/common/city.js') }}"></script>
//server/resources/views/coop/CoopRegistrationRequest.blade.phpこれとそのコントローラを参照
document.addEventListener('DOMContentLoaded', function() {
    // const citiesData = @json($Cities); // コントローラーから渡された市区町村データ
    function updateCities() {
        const selectedPrefecture = document.getElementById('prefecture').value;
        const citiesSelect = document.getElementById('city');
        citiesSelect.innerHTML = '';
        const currentCityId = citiesData[0];
        delete citiesData[0];
        if (selectedPrefecture in citiesData) {
            for (const id in citiesData[selectedPrefecture]) {
                if (citiesData[selectedPrefecture].hasOwnProperty(id)) {
                    const option = document.createElement('option');
                    option.value = id;
                    option.text = citiesData[selectedPrefecture][id];
                    if (id == currentCityId){
                        option.selected = true;
                    }
                    citiesSelect.appendChild(option);
                }
            }
        }
    }
    document.getElementById('prefecture').addEventListener('change', updateCities);
    updateCities();
});
