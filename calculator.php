<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .calculator {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input[type="number"], select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Calculator</h2>
        <form action="calculator.php" method="post">
            <input type="number" name="num1" placeholder="Enter first number" required>
            <select name="operation">
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (*)</option>
                <option value="divide">Division (/)</option>
                <option value="power">Exponentiation (^)</option>
                <option value="percentage">Percentage (%)</option>
                <option value="sqrt">Square Root (√)</option>
                <option value="log">Logarithm (log)</option>
            </select>
            <input type="number" name="num2" placeholder="Enter second number" required>
            <button type="submit">Calculate</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operation = $_POST["operation"];

            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "divide":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Cannot divide by zero";
                    }
                    break;
                case "power":
                    $result = pow($num1, $num2);
                    break;
                case "percentage":
                    $result = ($num1 * $num2) / 100;
                    break;
                case "sqrt":
                    $result = sqrt($num1);
                    break;
                case "log":
                    $result = log($num1, $num2);
                    break;
                default:
                    $result = "Invalid operation";
            }

            echo "<p>Result: $result</p>";
        }
        ?>
    </div>
</body>
</html>
