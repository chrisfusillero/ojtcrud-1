<style>

body {
  background-image: url('<?php echo base_url("assets/portfolio_image/emeraldgreen.jpg"); ?>');
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

<title>Add Quiz</title>

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

 <header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">

    
    <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/admin_Main'); ?>">
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


<div class="container my-5">
    <h2>Add New Quiz</h2>

    <?php echo form_open('admin_Main/save_quiz'); ?>

        <!-- Quiz Type -->
        <div class="form-group">
            <label for="quiz_type">Quiz Type</label>
            <select class="form-control" id="quiz_type" name="quiz_type" required>
                <option value="multiple_choice">Multiple Choice</option>
                <option value="identification">Identification</option>
                <option value="enumeration">Enumeration</option>
                <option value="true_false">True or False</option>
            </select>
        </div>

        <!-- Question -->
        <div class="form-group">
            <label for="question">Question</label>
            <textarea class="form-control" id="question" name="question" required rows="3"></textarea>
        </div>

        <!-- MULTIPLE CHOICE -->
        <div id="multiple_choice_section">
            <div class="form-group">
                <label>Choices</label>
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <input type="text"
                           class="form-control mt-2"
                           name="choices[]"
                           placeholder="Choice <?php echo $i + 1; ?>">
                <?php endfor; ?>

                <label class="mt-3">Correct Answer</label>
                <input type="text" class="form-control" name="answer">
            </div>
        </div>

        <!-- TRUE OR FALSE -->
        <div id="true_false_section" style="display: none;">
            <label>Correct Answer</label>
            <select class="form-control" name="tf_answer">
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        </div>

        <!-- IDENTIFICATION -->
        <div id="identification_section" style="display: none;">
            <div class="form-group">
                <label for="identification_answer">Correct Answer</label>
                <input type="text" class="form-control" name="identification_answer">
            </div>
        </div>

        <!-- ENUMERATION -->
        <div id="enumeration_section" style="display: none;">
            <label>Enumeration Answers</label>
            <div id="enum_container">
                <input type="text" class="form-control mt-2" name="enumeration_answers[]" placeholder="Answer 1">
            </div>
            <button type="button" id="add_enum" class="btn btn-secondary btn-sm mt-2">Add Answer</button>
        </div>

        <!-- Buttons -->
        <button type="submit" class="btn btn-primary mt-3">Save Quiz</button>

        <a href="<?= base_url('index.php/admin_Main/quizbee'); ?>" 
           class="btn btn-secondary mt-3 ml-2">
           Cancel
        </a>

    <?php echo form_close(); ?>
</div>


<!-- JavaScript to switch question types -->
<script>
    const quizType = document.getElementById('quiz_type');
    const mcSection = document.getElementById('multiple_choice_section');
    const idSection = document.getElementById('identification_section');
    const enumSection = document.getElementById('enumeration_section');
    const tfSection = document.getElementById('true_false_section');

    quizType.addEventListener('change', function() {
        mcSection.style.display   = (this.value === 'multiple_choice') ? 'block' : 'none';
        idSection.style.display   = (this.value === 'identification') ? 'block' : 'none';
        enumSection.style.display = (this.value === 'enumeration') ? 'block' : 'none';
        tfSection.style.display   = (this.value === 'true_false') ? 'block' : 'none';
    });

    // Add more enumeration fields
    document.getElementById('add_enum').addEventListener('click', function() {
        let container = document.getElementById('enum_container');
        let newField = document.createElement('input');
        newField.type = 'text';
        newField.classList.add('form-control', 'mt-2');
        newField.name = 'enumeration_answers[]';
        newField.placeholder = "Another Answer";
        container.appendChild(newField);
    });
</script>



</body> 