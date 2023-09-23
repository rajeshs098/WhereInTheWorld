<!DOCTYPE html>
<html>
<head>
    <title>Location Dropdowns</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Populate countries in the country dropdown (you might fetch this from your database)
            $.ajax({
                url: 'get_countries.php', // Replace with your PHP script to fetch countries
                method: 'GET',
                success: function(data){
                    $('#country').html(data);
                }
            });

            // Populate states or cities based on selected country or state
            $('#country').change(function(){
                var country_id = $(this).val();
                $.ajax({
                    url: 'get_locations.php',
                    method: 'POST',
                    data: { country_id: country_id },
                    success: function(data){
                        $('#state').html(data);
                        $('#city').html('<option value="">Select City</option>'); // Clear city dropdown
                    }
                });
            });

            $('#state').change(function(){
                var state_id = $(this).val();
                $.ajax({
                    url: 'get_locations.php',
                    method: 'POST',
                    data: { state_id: state_id },
                    success: function(data){
                        $('#city').html(data);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <form action="process_form.php" method="POST">
        <label for="country">Country:</label>
        <select name="country" id="country">
            <option value="">Select Country</option>
            <!-- Countries will be populated via AJAX -->
        </select>
        <br>
        <label for="state">State:</label>
        <select name="state" id="state">
            <option value="">Select State</option>
            <!-- States will be populated via AJAX based on selected country -->
        </select>
        <br>
        <label for="city">City:</label>
        <select name="city" id="city">
            <option value="">Select City</option>
            <!-- Cities will be populated via AJAX based on selected state -->
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
