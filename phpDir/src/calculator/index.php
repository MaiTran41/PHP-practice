<?php

require_once 'calculator.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Simple PHP Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="calculator">
        <h1>PHP Calculator</h1>

        <form method="post" action="<?php echo htmlspecialchars(
            $_SERVER['PHP_SELF'],
        ); ?>">
            <div class="form-group">
                <label for="num1">First Number:</label>
                <input type="number" name="num1" id="num1" value="<?php echo $num1_original; ?>" step="any" required>
            </div>

            <div class="form-group">
                <label for="operation">Operation:</label>
                <select name="operation" id="operation">
                    <option value="add" <?php if ($operation == 'add') {
                        echo 'selected';
                    } ?>>Addition (+)</option>
                    <option value="subtract" <?php if (
                        $operation == 'subtract'
                    ) {
                        echo 'selected';
                    } ?>>Subtraction (-)</option>
                    <option value="multiply" <?php if (
                        $operation == 'multiply'
                    ) {
                        echo 'selected';
                    } ?>>Multiplication (×)</option>
                    <option value="divide" <?php if ($operation == 'divide') {
                        echo 'selected';
                    } ?>>Division (÷)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="num2">Second Number:</label>
                <input type="number" name="num2" id="num2" value="<?php echo $num2; ?>" step="any" required>
            </div>

            <button type="submit">Calculate</button>
        </form>

        <?php if ($error != ''): ?>
            <div class="error">
                <p><?php echo $error; ?></p>
            </div>
        <?php endif; ?>

        <?php if ($result !== '' && $error == ''): ?>
            <div class="result">
                <h3>Result</h3>
                <p id="result-number">
                    <?php echo $result; ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>