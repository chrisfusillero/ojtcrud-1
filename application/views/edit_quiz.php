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

<title>Edit Quiz</title>

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


<div class="container my-4">

    <div class="row">

        <!-- LEFT SIDE — EDIT QUIZ GROUP -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Quiz Group</h5>
                </div>
                <div class="card-body">

                    <?php echo form_open('admin_Main/update_quiz_group/' . $groups['id']); ?>

                        <!-- Group Title -->
                        <div class="form-group">
                            <label>Group Title</label>
                            <input type="text" name="group_title" class="form-control" 
                                   value="<?= htmlentities($groups['group_title']) ?>" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group mt-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"><?= htmlentities($groups['description']) ?></textarea>
                        </div>

                        <!-- TIMER FIELDS -->
                        <div class="form-group mt-3">
                            <label>Time Limit</label>

                            <div class="row">
                                <div class="col-6">
                                    <input type="number" 
                                           name="time_limit_hours" 
                                           class="form-control"
                                           min="0"
                                           value="<?= $groups['time_hours'] ?>"
                                           placeholder="Hours">
                                </div>

                                <div class="col-6">
                                    <input type="number" 
                                           name="time_limit_minutes" 
                                           class="form-control"
                                           min="0"
                                           value="<?= $groups['time_minutes'] ?>"
                                           placeholder="Minutes">
                                </div>
                            </div>

                            <small class="text-muted">Set both to 0 for no time limit.</small>
                        </div>

                        <button class="btn btn-success btn-block mt-3">Update Quiz Group</button>

                    <?php echo form_close(); ?>

                </div>
            </div>

            <!-- LIST OF EXISTING QUESTIONS -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-secondary text-white">
                    <h6 class="mb-0">Questions in This Group</h6>
                </div>

                <div class="card-body" id="questionList">
                    <?php if (empty($quizzes)): ?>
                        <p class="text-muted">No questions added yet.</p>
                    <?php else: ?>
                        <?php foreach ($quizzes as $q): ?>
                            <div class="alert alert-primary">
                                <strong><?= htmlentities($q['question']) ?></strong>
                                <br>
                                <span class="text-muted">
                                    Type: <?= ucfirst(str_replace('_', ' ', $q['type'])) ?>
                                </span>

                                <div class="mt-2">
                                    <a href="<?= base_url('index.php/admin_Main/edit_question/' . $q['id']); ?>" 
                                       class="btn btn-sm btn-info">Edit</a>

                                    <a href="<?= base_url('index.php/admin_Main/delete_question/' . $q['id']); ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Delete this question?');">Delete</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- RIGHT SIDE — EDIT SPECIFIC QUESTION -->
        <div class="col-md-8">
            <div class="card shadow-sm">

                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Edit Question</h5>
                </div>

                <div class="card-body">

                    <?php echo form_open('admin_Main/update_question/' . $question['id']); ?>

                        <!-- Type -->
                        <div class="form-group">
                            <label>Question Type</label>
                            <select class="form-control" id="quiz_type" name="quiz_type">
                                <option value="multiple_choice"  <?= $question['type']=='multiple_choice'?'selected':'' ?>>Multiple Choice</option>
                                <option value="true_false"       <?= $question['type']=='true_false'?'selected':'' ?>>True or False</option>
                                <option value="identification"   <?= $question['type']=='identification'?'selected':'' ?>>Identification</option>
                                <option value="enumeration"      <?= $question['type']=='enumeration'?'selected':'' ?>>Enumeration</option>
                            </select>
                        </div>

                        <!-- Question Text -->
                        <div class="form-group mt-3">
                            <label>Question</label>
                            <textarea class="form-control" name="question" rows="2"><?= $question['question'] ?></textarea>
                        </div>

                        <!-- MULTIPLE CHOICE -->
                        <div id="multiple_choice_section" style="<?= $question['type']=='multiple_choice'?'':'display:none' ?>">

                            <label>Choices</label>
                            <div id="choices_container">
                                <?php foreach ($question['choices'] as $i => $choice): ?>
                                    <div class="input-group mt-2">
                                        <span class="input-group-text">
                                            <input type="radio" name="mc_correct" value="<?= $i ?>" <?= ($choice == $question['answer'])?'checked':'' ?>>
                                        </span>
                                        <input type="text" class="form-control" name="choices[]" value="<?= htmlentities($choice) ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <button type="button" class="btn btn-sm btn-secondary mt-2" id="add_choice_btn">
                                + Add Another Choice
                            </button>
                        </div>

                        <!-- TRUE / FALSE -->
                        <div id="true_false_section" style="<?= $question['type']=='true_false'?'':'display:none' ?>">

                            <label>Correct Answer</label>

                            <div class="form-check mt-2">
                                <input type="radio" name="tf_answer" value="True" class="form-check-input" 
                                       <?= $question['answer']=='True'?'checked':'' ?>>
                                <label class="form-check-label">True</label>
                            </div>

                            <div class="form-check mt-2">
                                <input type="radio" name="tf_answer" value="False" class="form-check-input" 
                                       <?= $question['answer']=='False'?'checked':'' ?>>
                                <label class="form-check-label">False</label>
                            </div>
                        </div>

                        <!-- IDENTIFICATION -->
                        <div id="identification_section" style="<?= $question['type']=='identification'?'':'display:none' ?>">
                            <label>Correct Answer</label>
                            <input type="text" class="form-control" name="identification_answer" 
                                   value="<?= htmlentities($question['answer']) ?>">
                        </div>

                        <!-- ENUMERATION -->
                        <div id="enumeration_section" style="<?= $question['type']=='enumeration'?'':'display:none' ?>">
                            <label>Enumeration Answers</label>
                            <div id="enum_container">
                                <?php foreach ($question['choices'] as $ans): ?>
                                    <input type="text" class="form-control mt-2" name="enumeration_answers[]" value="<?= htmlentities($ans) ?>">
                                <?php endforeach; ?>
                            </div>

                            <button type="button" id="add_enum" class="btn btn-sm btn-secondary mt-2">Add More</button>
                        </div>

                        <button class="btn btn-primary btn-block mt-3">Update Question</button>

                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>

    </div>

</div>

<script>

document.getElementById('quiz_type').addEventListener('change', function() {
    document.getElementById('multiple_choice_section').style.display = this.value === 'multiple_choice' ? 'block' : 'none';
    document.getElementById('true_false_section').style.display      = this.value === 'true_false' ? 'block' : 'none';
    document.getElementById('identification_section').style.display = this.value === 'identification' ? 'block' : 'none';
    document.getElementById('enumeration_section').style.display    = this.value === 'enumeration' ? 'block' : 'none';
});

document.getElementById('add_choice_btn').onclick = () => {
    let c = document.getElementById('choices_container');
    let div = document.createElement('div');
    div.classList.add('input-group','mt-2');
    div.innerHTML = `
        <span class="input-group-text">
            <input type="radio" name="mc_correct">
        </span>
        <input type="text" class="form-control" name="choices[]" placeholder="New Choice">
    `;
    c.appendChild(div);
};

document.getElementById('add_enum').onclick = () => {
    let c = document.getElementById('enum_container');
    let f = document.createElement('input');
    f.type = "text";
    f.classList.add("form-control", "mt-2");
    f.name = "enumeration_answers[]";
    f.placeholder = "Another Answer";
    c.appendChild(f);
};
</script>

</body>