<!DOCTYPE html>
<?php
if (isset($_POST['submit'])) {
    $myFile = "elect.json";
    $arr_data = array(); // create empty array

        //checking for empty input
    if ($_POST['electronics'] != "" && $_POST['p_consumption'] != "") {
        function cleanUsersTextInput($data)
        {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $electronics = cleanUsersTextInput($_POST['electronics']);
        $p_consumption = cleanUsersTextInput($_POST['p_consumption']);
        
        //Get form data
        $formdata = array(
            'electronics' => $electronics,
            'p_consumption' => $p_consumption,
            
        );
        //Get data from existing json file
        $jsondata = file_get_contents($myFile);

        // converts json data into array
        $arr_data = json_decode($jsondata, true);

        // Push user data to array
        $arr_data['electronicss_details'] = $formdata;

        //Convert updated array to JSON
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

        //write json data into data.json file
        if (file_put_contents($myFile, $jsondata)) {
            echo "Data successfully saved 
        <br>
        Hello " . $electronics . ", saved successfully!
        ";
        }
        exit();
    } else {
        echo "One or more  of your details are missing"; 
    
    // <a href=''> << Back to signUp </a>
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>form</title>
</head>
<body>
        <center>
            <main>
                <H1> INSERT YOUR ELECTRONICS DETAILS HERE</H1>
            
                <form method="POST">
                    
                    <div>
                        <p>ELECTRONICS TYPE</p>
                        <input type="text" name="electronics" placeholder="ELECTRONICS">
                    </div>

                    <div>
                        <p>POWER CONSUMPTION (IN WATTS)</p>
                        <input type="number" name="p_consumption" placeholder="WATTS">
                    </div>

                    <div>
                        <button name="submit">INSERT</button>
                    </div>
                            
                </form>
            </main>
        </center>


</body>
</html>