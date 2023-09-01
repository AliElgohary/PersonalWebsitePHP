<?php

class HomeController
{
    public $dataArray;
    public $jsonFilePath;
    public $jsonData;

    public function __construct()
    {
        // Initialize properties in the constructor
        $this->jsonFilePath = '../Me.json';
        $this->jsonData = file_get_contents($this->jsonFilePath);
        $this->dataArray = json_decode($this->jsonData, true);

        if ($this->dataArray === null && json_last_error() !== JSON_ERROR_NONE) {
            die("Error parsing JSON: " . json_last_error_msg());
        }
    }

    public function Index()
    {
        echo '<a href="profile">Profile</a><br>';
        echo '<a href="skills">skills</a>';
    }

    public function profile()
    {
        $avatarUrl = $this->dataArray['avatar'];
        echo '<img src="' . $avatarUrl . '" alt="Avatar">' . "<br>";
        echo "Name: " . $this->dataArray['name'] . "<br>";
        echo "Email: " . $this->dataArray['email'] . "<br>";
        echo "City: " . $this->dataArray['city'] . "<br>";
    }
    public function skills()
    {
        // Display experience
        if (isset($this->dataArray['experience']) && is_array($this->dataArray['experience'])) {
            echo "Experience:<br>";
            echo "<ul>";
            foreach ($this->dataArray['experience'] as $experience) {
                if (!empty($experience['position'])) {
                    echo "<li>" . $experience['position'] . "</li>";
                }
            }
            echo "</ul>";
        } else {
            echo "No experience data available.<br>";
        }
    
        // Display skills list
        if (isset($this->dataArray['skills']) && is_array($this->dataArray['skills'])) {
            echo "Skills:<br>";
            echo "<ul>";
            foreach ($this->dataArray['skills'] as $skill) {
                echo "<li>" . $skill . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No skills data available.<br>";
        }
    }
    
}
?>
