<?php
// 1. Arithmetic Operators
$a = 20;
$b = 4;

$sum = $a + $b;
$difference = $a - $b;
$product = $a * $b;
$quotient = $a / $b;
$modulus = $a % $b;
$exponentiation = $a ** 2;

// 2. Assignment Operator
$c = 10;
$c += 5;
$c -= 5;
$c *= 2;
$c /= 5;

// 3. Comparison Operators
$isEqual = ($a == $b);
$isNotEqual = ($a != $b);
$isIdentical = ($a === 20);
$isGreater = ($a > $b);
$isLower = ($a < $b);
$isGreaterOrEqual = ($a >= $b);
$isLessOrEqual = ($a <= $b);

// 4. Increment/Decrement Operators
$a++;
$b--;

// 5. Logical Operators
$andResult = ($a > 10 && $b < 5);
$orResult = ($a > 15 || $b > 5);
$notResult = !($a < 25);

// 6. String Operators
$firstName = "Osama";
$lastName = "Hamdain";
$fullName = $firstName . " " . $lastName;

// 7. Array Operators
$array1 = [1, 2, 3];
$array2 = [3, 4, 5];
$union = $array1 + $array2; // اتحاد المصفوفات
$intersect = array_intersect($array1, $array2); // تقاطع المصفوفات

// 8. Conditional Assessment Operators
// (Ternary Operator)
$max = ($a > $b) ? $a : $b;

//If
$age = 20;
if ($age >= 18) {
    echo "أنت بالغ.";
}

//If..Else
if ($age >= 18) {
    echo "أنت بالغ.";
} else {
    echo "أنت قاصر.";
}

//If..Else If
$score = 75;
if ($score >= 90) {
    echo "ممتاز";
} elseif ($score >= 75) {
    echo "جيد جداً";
} elseif ($score >= 60) {
    echo "جيد";
} else {
    echo "راسب";
}

//Nested if
$hasLicense = true;
if ($age >= 18) {
    if ($hasLicense) {
        echo "يمكنك القيادة.";
    } else {
        echo "لا يمكنك القيادة بدون رخصة.";
    }   
} else {
    echo "أنت قاصر ولا يمكنك القيادة.";
}

//Switch
$day = "الأحد";
switch ($day) {
    case "السبت":
        echo "اليوم هو السبت.";
        break;
    case "الأحد":
        echo "اليوم هو الأحد.";
        break;
    default:
        echo "اليوم هو يوم آخر.";
}

//Loop
for ($i = 0; $i < 5; $i++) {
    echo $i . "\n";
}

//While
$i = 0;
while ($i < 5) {
    echo $i . "\n";
    $i++;
}

//Do While
do {
    echo $i . "\n"; // يطبع الأرقام من 0 إلى 4
    $i++;
} while ($i < 5);

//Foreach
$Names = ['Osama', 'Abdullah', 'Hamdain'];
foreach ($Names as $Name) {
    echo $Name . "\n";
}

//Nested For
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= 2; $j++) {
        echo "i: $i, j: $j\n";
    }
}

// Function
class CPU {
    public $type;

    public function __construct($type) {
        $this->type = $type;
    }
}

$cpu = new CPU("Core i9");
echo $cpu->type;

// Test
$cpu2=new CPU();
$cpu2->$type="Core i10";
echo $cpu2->$type;
?>