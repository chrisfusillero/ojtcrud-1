<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">


  <script src="<?php echo base_url("assets/js/jquery-3.7.1.min.js"); ?>"></script>


  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

  
  <script type="text/javascript">
    window.history.forward();
    function noBack() { 
      window.history.forward(); 
    }
  </script>

<style>

body {
  background-color: #a80000ff;
  color: #ffffff;
  background-size: cover;         
  background-position: center;    
  background-repeat: no-repeat;   
  background-attachment: fixed;   
  font-size: 16px;
  margin: 0;
  padding-top: 70px; 
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


.table {
  width: 100%;
  margin: 20px auto;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}
.table td, .table th {
  word-wrap: break-word;
  white-space: normal;
  padding: 12px;
  vertical-align: middle;
}


.hero-section {
  position: relative;
  color: white;
  padding: 80px 20px;
  text-align: center;
  min-height: 80vh;   
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
  background-size: cover;
  background-position: center;
  margin-top: -56px;
}

.navbar-toggler:hover {
  transform: scale(1.1); 
  transition: transform 0.2s ease-in-out; 
}

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

.navbar-toggler:hover {
  animation: pulse 1s infinite;
}

.col-md-4 {
  margin-bottom: 30px; 
}


.footer {
  background-color: #f8f9fa;
  padding: 20px;
  text-align: center;
  font-size: 1em;
  margin-top: 50px;
}


@media (max-width: 991px) {
  .hero-section {
    min-height: 60vh;
    padding: 60px 15px;
  }
  .hero-section h1 {
    font-size: 2rem;
  }
  .hero-section p {
    font-size: 1rem;
  }
}

@media (max-width: 768px) {
  body {
    font-size: 14px;
  }
  .navbar-brand {
    font-size: 1.2rem;
  }
  .navbar-nav .nav-link {
    font-size: 0.9rem;
  }
  .profile-img {
    width: 120px;
    height: 120px;
  }
  .portfolio-section {
    padding: 15px;
  }
}

@media (max-width: 576px) {
  .hero-section h1 {
    font-size: 1.5rem;
  }
  .hero-section p {
    font-size: 0.9rem;
  }
  .footer {
    font-size: 0.9rem;
  }
}

</style>  
</head>

<title>Edit Quiz</title>

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

 <header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">

    
    <a class="navbar-brand fw-bold" style="color: #616161ff;" href="<?= base_url('index.php/admin_Main'); ?>">
      DigiCrud101
    </a>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">

        
        <li class="nav-item me-2">
          <a class="nav-link fw-medium ms-2" href="<?= base_url('index.php/admin_Main'); ?>">Home</a>
        </li>

        
        <li class="nav-item me-2">
          <a class="nav-link fw-medium ms-2" href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Accounts</a>
        </li>

        
        <li class="nav-item me-2">
          <a class="nav-link fw-medium ms-2" href="<?= base_url('index.php/admin_Main/admin_projects'); ?>">Projects</a>
        </li>

        
        <li class="nav-item me-2">
          <span class="navbar-text me-2">
            👤 <strong><?= isset($firstname) || isset($lastname) ? ($firstname ?? '') . ' ' . ($lastname ?? '') : 'Guest'; ?></strong>
          </span>
        </li>

       
        <li class="nav-item dropdown">
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="<?= base_url('index.php/admin_Main/admin_settings'); ?>">Settings</a>
            </li>
            <li>
              <a class="dropdown-item text-danger" href="<?= base_url('index.php/AuthLogin'); ?>">
                Log Out
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </div>

  </div>
</nav>

</header>

<div class="container mt-4">
    <h3>Edit Question</h3>

    <form method="post" action="<?= base_url('index.php/admin_Main/update_question') ?>">

        <input type="hidden" name="question_id" value="<?= $question['id'] ?>">

        <!-- QUESTION TYPE -->
        <div class="mb-3">
            <label>Question Type</label>
            <select id="question_type" name="question_type" class="form-control" required>
                <option value="multiple_choice" <?= $question['question_type']=='multiple_choice'?'selected':'' ?>>Multiple Choice</option>
                <option value="true_false" <?= $question['question_type']=='true_false'?'selected':'' ?>>True/False</option>
                <option value="identification" <?= $question['question_type']=='identification'?'selected':'' ?>>Identification</option>
                <option value="enumeration" <?= $question['question_type']=='enumeration'?'selected':'' ?>>Enumeration</option>
            </select>
        </div>

        <!-- QUESTION TEXT -->
        <div class="mb-3">
            <label>Question</label>
            <textarea name="question" class="form-control" required><?= $question['question'] ?></textarea>
        </div>


        <!-- ===================== MULTIPLE CHOICE SECTION ===================== -->
        <div id="section_multiple_choice" class="question-section mb-3">

            <label class="form-label">Choices</label>

            <div id="choices_container">
                <?php 
                    $choices = !empty($question['choices']) ? json_decode($question['choices'], true) : [];
                    if (!is_array($choices)) $choices = [];
                    $numChoices = max(4, count($choices));

                    for ($i=0; $i < $numChoices; $i++):
                        $value = $choices[$i] ?? "";
                        $checked = ($question['answer'] == $i) ? "checked" : "";
                ?>

                <div class="d-flex align-items-center mt-2 mc-choice-row">
                    <input type="radio" 
                           class="form-check-input me-2"
                           name="mc_correct_choice" 
                           value="<?= $i ?>" 
                           <?= $checked ?>>

                    <input type="text" 
                           class="form-control" 
                           name="choices[]" 
                           value="<?= htmlentities($value) ?>"
                           placeholder="Choice <?= $i+1 ?>">
                </div>

                <?php endfor; ?>
            </div>

            <button type="button" id="add_choice_btn" class="btn btn-sm btn-secondary mt-2">+ Add Choice</button>
        </div>



        <!-- ===================== TRUE/FALSE SECTION ===================== -->
        <div id="section_true_false" class="question-section mb-3">

            <label>Correct Answer</label><br>

            <label>
                <input type="radio" name="tf_answer" value="True"
                    <?= ($question['answer'] == "True") ? "checked" : "" ?>>
                True
            </label>

            &nbsp;&nbsp;

            <label>
                <input type="radio" name="tf_answer" value="False"
                    <?= ($question['answer'] == "False") ? "checked" : "" ?>>
                False
            </label>

        </div>



        <!-- ===================== IDENTIFICATION SECTION ===================== -->
        <div id="section_identification" class="question-section mb-3">
            <label>Correct Answer</label>
            <input type="text" 
                   name="identification_answer" 
                   value="<?= htmlentities($question['answer']) ?>"
                   class="form-control">
        </div>



        <!-- ===================== ENUMERATION SECTION ===================== -->
        <div id="section_enumeration" class="question-section mb-3">

            <label>Enumeration Answers</label>

            <div id="enum_container">

                <?php 
                    $answers = json_decode($question['answer'], true);
                    if (!is_array($answers)) $answers = [''];

                    foreach ($answers as $i => $ans):
                ?>

                <div class="d-flex mt-2 enum-row">
                    <input type="text"
                           class="form-control"
                           name="enumeration_answers[]"
                           value="<?= htmlentities($ans) ?>"
                           placeholder="Answer <?= $i+1 ?>">

                    <button type="button" class="btn btn-danger btn-sm ms-2 remove-enum-btn">x</button>
                </div>

                <?php endforeach; ?>

            </div>

            <button type="button" id="add_enum_btn" class="btn btn-sm btn-secondary mt-2">+ Add Answer</button>

        </div>


        <!-- SUBMIT -->
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="<?= base_url('index.php/admin_Main/quiz_list') ?>" class="btn btn-secondary">Back</a>

    </form>
</div>




<!-- ========================================================= -->
<!-- JAVASCRIPT TO CONTROL SECTIONS -->
<!-- ========================================================= -->
<script>
// ---------------- SHOW/HIDE SECTIONS BASED ON QUESTION TYPE ----------------
function showSection(type) {
    document.querySelectorAll('.question-section').forEach(s => s.style.display = 'none');

    if (type === "multiple_choice") {
        document.getElementById("section_multiple_choice").style.display = 'block';
    }
    if (type === "true_false") {
        document.getElementById("section_true_false").style.display = 'block';
    }
    if (type === "identification") {
        document.getElementById("section_identification").style.display = 'block';
    }
    if (type === "enumeration") {
        document.getElementById("section_enumeration").style.display = 'block';
    }
}

// Initial load
showSection(document.getElementById("question_type").value);

// When dropdown changes
document.getElementById("question_type").addEventListener("change", function() {
    showSection(this.value);
});


// ---------------- ADD MULTIPLE CHOICE CHOICE ----------------
document.getElementById("add_choice_btn").addEventListener("click", function() {
    const container = document.getElementById("choices_container");
    const count = container.querySelectorAll(".mc-choice-row").length;

    const row = document.createElement("div");
    row.classList.add("d-flex", "align-items-center", "mt-2", "mc-choice-row");

    row.innerHTML = `
        <input type="radio" 
               name="mc_correct_choice"
               value="${count}"
               class="form-check-input me-2">
        <input type="text"
               class="form-control"
               name="choices[]"
               placeholder="Choice ${count+1}">
    `;

    container.appendChild(row);
});



document.getElementById("add_enum_btn").addEventListener("click", function() {
    const container = document.getElementById("enum_container");
    const count = container.querySelectorAll(".enum-row").length;

    const row = document.createElement("div");
    row.classList.add("d-flex", "mt-2", "enum-row");

    row.innerHTML = `
        <input type="text"
               class="form-control"
               name="enumeration_answers[]"
               placeholder="Answer ${count+1}">
        <button type="button" class="btn btn-danger btn-sm ms-2 remove-enum-btn">x</button>
    `;

    container.appendChild(row);
});


document.addEventListener("click", function(e) {
    if (e.target.classList.contains("remove-enum-btn")) {
        e.target.parentElement.remove();
    }
});
</script>







</body>

</html>