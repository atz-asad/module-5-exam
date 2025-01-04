<?php
// Question 1 Solution
$randomStrings = ["Apple", "banana", "Apricot", "grape", "avocado", "Mango", "almond"];

$filteredStrings = array_filter($randomStrings, function($str) {
    return stripos($str, 'A') === 0; 
});

$uppercasedStrings = array_map('strtoupper', $filteredStrings);

print_r($uppercasedStrings);

echo "<br>";

// Question 2 Solution
class Student {

    // Attributes
    private $name;
    private $grades;

    public function __construct($name, $grades) {
        $this->name = $name;
        $this->grades = $grades;
    }

    public function averageGrade() {
        $totalGrades = array_sum($this->grades);  
        $numberOfGrades = count($this->grades);  
        return $numberOfGrades > 0 ? $totalGrades / $numberOfGrades : 0; 
    }

    public function displayResult() {
        $average = $this->averageGrade(); 
        echo "Student: " . $this->name . "\n";
        echo "Average Grade: " . number_format($average, 2) . "\n"; 
    }
}

// Example
$student = new Student("Alice", [85, 90, 78, 92]);
$student->displayResult();

?>
