<?php 

$jsonFilePath = '../Me.json';
$jsonData = file_get_contents($jsonFilePath);
$dataArray = json_decode($jsonData, true);

if ($dataArray === null && json_last_error() !== JSON_ERROR_NONE) {
    die("Error parsing JSON: " . json_last_error_msg());
}

$avatarUrl = $dataArray['avatar'];
echo '<img  src="' . $avatarUrl . '" alt="Avatar">' . "<br>";
echo "Name: " . $dataArray['name'] . "<br>";
echo "Email: " . $dataArray['email'] . "<br>";
echo "City: " . $dataArray['city'] . "<br>";
//show experience 
if (isset($dataArray['experience']) && is_array($dataArray['experience'])) {
    if (!empty($dataArray['experience'][0]['position'])) {
        echo "Experience: " . $dataArray['experience'][0]['position'] . "<br>";
    }
} else {
    echo "No experience data available.<br>";
}
//show skills list
if (isset($dataArray['skills']) && is_array($dataArray['skills'])) {
    echo "Skills:<br>";
    echo "<ul>";
    foreach ($dataArray['skills'] as $skill) {
        echo "<li>" . $skill . "</li>";
    }
    echo "</ul>";
} else {
    echo "No skills data available.<br>";
}

