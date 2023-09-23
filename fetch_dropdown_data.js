document.addEventListener("DOMContentLoaded", function () {
    const countryDropdown = document.getElementById("country");
    const stateDropdown = document.getElementById("state");
    const cityDropdown = document.getElementById("city");

    // Function to populate dropdown options
    function populateDropdown(dropdown, data) {
        dropdown.innerHTML = "<option value=''>Select</option>";
        for (const item of data) {
            const option = document.createElement("option");
            option.value = item.id;
            option.textContent = item.name;
            dropdown.appendChild(option);
        }
    }

    countryDropdown.addEventListener("change", function () {
        const selectedCountry = countryDropdown.value;

        // Make an AJAX request to fetch states based on the selected country
        fetch("fetch_states.php?country_id=" + selectedCountry)
            .then(response => response.json())
            .then(data => populateDropdown(stateDropdown, data));
    });

    stateDropdown.addEventListener("change", function () {
        const selectedState = stateDropdown.value;

        // Make an AJAX request to fetch cities based on the selected state
        fetch("fetch_cities.php?state_id=" + selectedState)
            .then(response => response.json())
            .then(data => populateDropdown(cityDropdown, data));
    });
});
