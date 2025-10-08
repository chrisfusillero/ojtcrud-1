<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.7.1.min.js"); ?>"></script>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>

    <style>
        
body {
  font-family: 'Segoe UI', Arial, sans-serif;
  background-color: #f5f5f5;
  color: #333;
  margin: 0;
  padding-top: 90px; 
  display: flex;
  flex-direction: column;
  align-items: center;
  min-height: 100vh;
}


.header {
  background-color: #fff;
  color: #222;
  font-family: 'Poppins', sans-serif; 
  padding: 10px 0;
  text-align: center;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 100;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}



.calculator {
  font-family: 'Roboto Mono', monospace; 
  width: 100%;
  max-width: 400px;
  background-color: #222;
  border-radius: 12px;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  margin: 30px 0;
}


.display {
  background-color: #333;
  padding: 20px;
  text-align: right;
}

.display .expression {
  font-size: 1.2em;
  color: #aaa;
  min-height: 1.2em;
  word-wrap: break-word;
}

.display .result {
  font-size: 3em;
  border: none;
  outline: none;
  background-color: transparent;
  width: 100%;
  text-align: right;
  color: #fff;
}


.buttons {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1px;
  background-color: #333;
}

.buttons button {
  border: none;
  padding: 20px;
  font-size: 1.5em;
  cursor: pointer;
  background-color: #555;
  color: #fff;
  transition: background 0.2s ease;
}

.buttons button:hover {
  background-color: #777;
}


.clear,
.number,
.decimal {
  background-color: #555;
}

.operator,
.equals {
  background-color: #ff9800;
  color: #fff;
}

.zero {
  grid-column: span 2;
}


@media (max-width: 768px) {
  body {
    padding-top: 80px;
  }

  .calculator {
    max-width: 100%;
  }

  .display .result {
    font-size: 2.2em;
  }

  .buttons button {
    padding: 15px;
    font-size: 1.2em;
  }
}

@media (max-width: 576px) {
  body {
    padding-top: 70px;
  }

  .display .result {
    font-size: 2em;
  }

  .buttons button {
    padding: 12px;
    font-size: 1em;
  }
}


    </style>
</head>

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/welcome'); ?>">DigiCrud101</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="<?= base_url('index.php/welcome'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="<?= base_url('index.php/welcome/crud_details'); ?>">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="<?= base_url('index.php/welcome/calculator'); ?>">Calculator</a>
                        </li>
                        <li class="nav-item ms-3">
                            <span class="navbar-text">
                                👤 <strong><?= isset($firstname) || isset($lastname) ? ($firstname ?? '') . ' ' . ($lastname ?? '') : 'Guest'; ?></strong>
                            </span>
                        </li>

                        <li class="nav-item dropdown">
                            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('index.php/welcome/settings'); ?>">Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="<?= base_url('index.php/AuthLogin'); ?>">
                                        Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <br />
    <br />
    <br>

    <div class="calculator">
        <div class="display">
            <div class="expression">
                <?php echo isset($expression) ? htmlspecialchars($expression) : ''; ?>
            </div>
            <input type="text" class="result" value="<?php echo isset($result) ? htmlspecialchars($result) : '0'; ?>" disabled>
        </div>
        <div class="buttons">
            <button class="clear" value="C">C</button>
            <button class="operator plus-minus" value="+/-">+/-</button>
            <button class="operator percent" value="%">%</button>
            <button class="operator divide" value="÷">÷</button>

            <button class="number" value="7">7</button>
            <button class="number" value="8">8</button>
            <button class="number" value="9">9</button>
            <button class="operator multiply" value="x">x</button>

            <button class="number" value="4">4</button>
            <button class="number" value="5">5</button>
            <button class="number" value="6">6</button>
            <button class="operator subtract" value="-">-</button>

            <button class="number" value="1">1</button>
            <button class="number" value="2">2</button>
            <button class="number" value="3">3</button>
            <button class="operator add" value="+">+</button>

            <button class="number zero" value="0">0</button>
            <button class="decimal" value=",">,</button>
            <button class="equals" value="=">=</button>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const resultInput = document.querySelector('.result');
    const expressionDiv = document.querySelector('.expression');
    const buttons = document.querySelector('.buttons');

    let currentExpression = '';
    let currentResult = '';

    function updateDisplay() {
        resultInput.value = currentResult || '0';
        expressionDiv.textContent = currentExpression;
    }

  function handleNumberClick(number) {
    if (currentResult === '0') {
        currentResult = number;  
    } else {
        currentResult += number; 
    }
    updateDisplay();
}


    function handleOperatorClick(operator) {
        if (currentResult !== '') {
            currentExpression += currentResult + operator;
            currentResult = '';
            updateDisplay();
        }
    }

    function handleDecimalClick() {
        if (!currentResult.includes('.')) {
            currentResult += '.';
            updateDisplay();
        }
    }

    function handleClearClick() {
        currentExpression = '';
        currentResult = '';
        updateDisplay();
    }

    function handleEqualsClick() {
        let completeExpression = currentExpression + currentResult;

        
        completeExpression = completeExpression
            .replace(/x/g, '*')
            .replace(/÷/g, '/');

        
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo base_url('index.php/welcome/calculator'); ?>';

        const expressionInput = document.createElement('input');
        expressionInput.type = 'hidden';
        expressionInput.name = 'expression';
        expressionInput.value = completeExpression;

        form.appendChild(expressionInput);
        document.body.appendChild(form);
        form.submit();
    }

    buttons.addEventListener('click', function (event) {
        const target = event.target;

        if (target.classList.contains('number')) {
            handleNumberClick(target.value);
        } else if (target.classList.contains('operator')) {
            handleOperatorClick(target.value);
        } else if (target.classList.contains('decimal')) {
            handleDecimalClick();
        } else if (target.classList.contains('clear')) {
            handleClearClick();
        } else if (target.classList.contains('equals')) {
            handleEqualsClick();
        }
    });

    updateDisplay();

    
    <?php if(isset($result)): ?>
        currentResult = <?php echo json_encode($result); ?>;
        updateDisplay();
    <?php endif; ?>
});
</script>

</body>
</html>

