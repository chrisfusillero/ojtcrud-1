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
                <div class="card-header text-white" style="background-color: #c40208ff;">
                    <h5 class="mb-0">Edit Quiz Group</h5>
                </div>
                <div class="card-body">

                    <?php echo form_open('admin_Main/update_quiz_group/' . $group['group_id']); ?>

                        <!-- Group Title -->
                        <div class="form-group">
                            <label>Group Title</label>
                            <input type="text" name="group_title" class="form-control" 
                                   value="<?= htmlentities($group['group_title']) ?>" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group mt-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"><?= htmlentities($group['description']) ?></textarea>
                        </div>

                        <!-- TIMER FIELDS -->
                        <div class="form-group mt-3">
                            <label class="fw-bold">Time Limit</label>

                            <div class="input-group">
                                <input type="number"
                                      name="duration_minutes"
                                      class="form-control"
                                      min="0"
                                      placeholder="Enter total minutes (e.g. 90)"
                                      value="<?= htmlentities($group['duration_minutes'] ?? '') ?>">
                                <span class="input-group-text">Minutes</span>
                            </div>

                            <small class="text-muted">
                                Leave empty or zero for no time limit.
                            </small>
                        </div>

                        <button class="btn btn-success btn-block mt-3">Update Quiz Group</button>
                        <br />
                        <br />
                        <a href="<?= base_url('index.php/admin_Main/quiz_list'); ?>" class="btn btn-secondary mb-3 ms-2">Back to Dashboard</a>

                    <?php echo form_close(); ?>

                </div>
            </div>

            <!-- LIST OF EXISTING QUESTIONS -->
            <div class="card shadow-sm mt-4">
    <div class="card-header text-white" style="background-color: #ff0000ff;">
        <h6 class="mb-0">Questions in This Group</h6>
    </div>

    <div class="card-body" id="questionList">
                <?php if (empty($questions)): ?>
                    <p class="text-muted">No questions added yet.</p>
                <?php else: ?>
                    <?php foreach ($questions as $q): ?>
                        <div class="alert alert-primary py-2 mb-2 question-item"
                            data-id="<?= $q->id; ?>"
                            style="cursor:pointer;">
                            <?= htmlentities($q->question); ?>
                            <br>
                            <small class="text-muted">Type: <?= ucfirst(str_replace('_', ' ', $q->question_type)) ?></small>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        </div>

        <!-- RIGHT SIDE — EDIT SPECIFIC QUESTION -->
        <div class="col-md-8">
            <div class="card shadow-sm">

                <div class="card-header text-white" style="background-color: #c40208ff;">
                    <h5 class="mb-0">Edit Question</h5>
                </div>

                <div class="card-body">

                    <?php if (isset($question) && !empty($question)): ?>
                        <?php echo form_open('admin_Main/update_question/' . $question['id']); ?>

                        <!-- Type -->
                        <div class="form-group">
                            <label>Question Type</label>
                            <select class="form-control" id="quiz_type" name="quiz_type">
                                <option value="multiple_choice"  <?= ($question['type']=='multiple_choice')?'selected':'' ?>>Multiple Choice</option>
                                <option value="true_false"       <?= ($question['type']=='true_false')?'selected':'' ?>>True or False</option>
                                <option value="identification"   <?= ($question['type']=='identification')?'selected':'' ?>>Identification</option>
                                <option value="enumeration"      <?= ($question['type']=='enumeration')?'selected':'' ?>>Enumeration</option>
                            </select>
                        </div>

                        <!-- Question Text -->
                        <div class="form-group mt-3">
                            <label>Question</label>
                            <textarea class="form-control" name="question" rows="2"><?= htmlentities($question['question']) ?></textarea>
                        </div>

                        <!-- MULTIPLE CHOICE -->
                        <div id="multiple_choice_section" style="<?= ($question['type']=='multiple_choice')?'':'display:none' ?>">

                            <label>Choices</label>
                            <div id="choices_container">
                                <?php if (!empty($question['choices']) && is_array($question['choices'])): ?>
                                    <?php foreach ($question['choices'] as $i => $choice): ?>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">
                                                <input type="radio" name="mc_correct" value="<?= $i ?>" <?= ($choice == $question['answer'])?'checked':'' ?>>
                                            </span>
                                            <input type="text" class="form-control" name="choices[]" value="<?= htmlentities($choice) ?>">
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                            <button type="button" class="btn btn-sm btn-secondary mt-2" id="add_choice_btn">
                                + Add Another Choice
                            </button>
                        </div>

                        <!-- TRUE / FALSE -->
                        <div id="true_false_section" style="<?= ($question['type']=='true_false')?'':'display:none' ?>">

                            <label>Correct Answer</label>

                            <div class="form-check mt-2">
                                <input type="radio" name="tf_answer" value="True" class="form-check-input" 
                                       <?= ($question['answer']=='True')?'checked':'' ?>>
                                <label class="form-check-label">True</label>
                            </div>

                            <div class="form-check mt-2">
                                <input type="radio" name="tf_answer" value="False" class="form-check-input" 
                                       <?= ($question['answer']=='False')?'checked':'' ?>>
                                <label class="form-check-label">False</label>
                            </div>
                        </div>

                        <!-- IDENTIFICATION -->
                        <div id="identification_section" style="<?= ($question['type']=='identification')?'':'display:none' ?>">
                            <label>Correct Answer</label>
                            <input type="text" class="form-control" name="identification_answer" 
                                   value="<?= htmlentities($question['answer'] ?? '') ?>">
                        </div>

                        <!-- ENUMERATION -->
                        <div id="enumeration_section" style="<?= ($question['type']=='enumeration')?'':'display:none' ?>">
                            <label>Enumeration Answers</label>
                            <div id="enum_container">
                                <?php if (!empty($question['choices']) && is_array($question['choices'])): ?>
                                    <?php foreach ($question['choices'] as $ans): ?>
                                        <input type="text" class="form-control mt-2" name="enumeration_answers[]" value="<?= htmlentities($ans) ?>">
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                            <button type="button" id="add_enum" class="btn btn-sm btn-secondary mt-2">Add More</button>
                        </div>

                        <button class="btn btn-primary btn-block mt-3">Update Question</button>

                        <?php echo form_close(); ?>

                    <?php else: ?>
                        <p class="text-muted">Select a question to edit from the left list.</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', () => {

    // --- Handle quiz type change ---
    const quizTypeSelect = document.getElementById('quiz_type');
    if (quizTypeSelect) {
        quizTypeSelect.addEventListener('change', function() {
            document.getElementById('multiple_choice_section').style.display = this.value === 'multiple_choice' ? 'block' : 'none';
            document.getElementById('true_false_section').style.display      = this.value === 'true_false' ? 'block' : 'none';
            document.getElementById('identification_section').style.display = this.value === 'identification' ? 'block' : 'none';
            document.getElementById('enumeration_section').style.display    = this.value === 'enumeration' ? 'block' : 'none';

            if (this.value === 'multiple_choice') resetChoices();
        });
    }

    // --- Add Multiple Choice row ---
    const addChoiceBtn = document.getElementById('add_choice_btn');
    if (addChoiceBtn) {
        addChoiceBtn.addEventListener('click', () => {
            const container = document.getElementById('choices_container');
            const index = container.querySelectorAll('.mc-choice-row').length;
            const row = document.createElement('div');
            row.className = 'd-flex align-items-center mt-2 mc-choice-row';
            row.innerHTML = `
                <input type="radio" name="mc_correct_choice" value="${index}" class="form-check-input me-2">
                <input type="text" class="form-control" name="choices[]" placeholder="New Choice">
            `;
            container.appendChild(row);
        });
    }

    // --- Add Enumeration row ---
    const addEnumBtn = document.getElementById('add_enum');
    if (addEnumBtn) {
        addEnumBtn.addEventListener('click', () => {
            const container = document.getElementById('enum_container');
            const input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mt-2';
            input.name = 'enumeration_answers[]';
            input.placeholder = 'Another Answer';
            container.appendChild(input);
        });
    }

    // --- Reset choices for multiple choice ---
    function resetChoices() {
        const container = document.getElementById('choices_container');
        container.innerHTML = '';
        for (let i = 0; i < 4; i++) {
            const div = document.createElement('div');
            div.className = 'd-flex align-items-center mt-2 mc-choice-row';
            div.innerHTML = `
                <input type="radio" name="mc_correct_choice" value="${i}" class="form-check-input me-2">
                <input type="text" class="form-control" name="choices[]" placeholder="Choice ${i+1}">
            `;
            container.appendChild(div);
        }
    }

    // --- Event delegation for question items ---
    const questionList = document.getElementById('questionList');
    if (questionList) {
        questionList.addEventListener('click', (e) => {
            const card = e.target.closest('.question-item');
            if (!card) return;

            const qid = card.dataset.id;
            let details = card.querySelector('.question-details');

            if (!details) {
                details = document.createElement('div');
                details.className = 'question-details mt-2';
                card.appendChild(details);
            }

            const isVisible = details.style.display === 'block';
            details.style.display = isVisible ? 'none' : 'block';

            if (!isVisible) {
                // Fetch question details
                fetch(`<?= base_url('index.php/admin_Main/get_question/'); ?>${qid}`)
                    .then(res => res.json())
                    .then(resp => {
                        if (resp.status === 'success' && resp.data) {
                            const q = resp.data;
                            details.innerHTML = `
                                <strong>Type:</strong> ${q.question_type}<br>
                                <strong>Answer:</strong> ${q.answer}<br>
                                <button class="btn btn-sm btn-warning mt-2 edit-btn" data-id="${qid}">
                                    Edit This Question
                                </button>
                            `;
                        } else {
                            details.innerHTML = `<p class="text-danger">Failed to load question details.</p>`;
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        details.innerHTML = `<p class="text-danger">Error fetching data.</p>`;
                    });
            }
        });

        // --- Delegated click for dynamically added edit buttons ---
        questionList.addEventListener('click', (e) => {
            const editBtn = e.target.closest('.edit-btn');
            if (!editBtn) return;
            const qid = editBtn.dataset.id;
            populateEditForm(qid);
        });
    }

    // --- Populate main edit form ---
    function populateEditForm(questionId) {
        fetch(`<?= base_url('index.php/admin_Main/get_question/'); ?>${questionId}`)
            .then(res => res.json())
            .then(resp => {
                if (resp.status === 'success' && resp.data) {
                    const q = resp.data;

                    // Populate fields
                    const form = document.querySelector('form'); // adjust if multiple forms
                    form.querySelector('input[name="question_id"]').value = q.id;
                    form.querySelector('textarea[name="question"]').value = q.question;
                    form.querySelector('select[name="quiz_type"]').value = q.question_type;

                    document.getElementById('multiple_choice_section').style.display = q.question_type === 'multiple_choice' ? 'block' : 'none';
                    document.getElementById('true_false_section').style.display = q.question_type === 'true_false' ? 'block' : 'none';
                    document.getElementById('identification_section').style.display = q.question_type === 'identification' ? 'block' : 'none';
                    document.getElementById('enumeration_section').style.display = q.question_type === 'enumeration' ? 'block' : 'none';

                    // Populate multiple choice
                    if (q.question_type === 'multiple_choice' && Array.isArray(q.choices)) {
                        const container = document.getElementById('choices_container');
                        container.innerHTML = '';
                        q.choices.forEach((c, i) => {
                            container.innerHTML += `
                                <div class="input-group mt-2">
                                    <span class="input-group-text">
                                        <input type="radio" name="mc_correct_choice" value="${i}" ${c === q.answer ? 'checked' : ''}>
                                    </span>
                                    <input type="text" class="form-control" name="choices[]" value="${c}">
                                </div>
                            `;
                        });
                    }

                    // Populate enumeration
                    if (q.question_type === 'enumeration' && Array.isArray(q.choices)) {
                        const container = document.getElementById('enum_container');
                        container.innerHTML = '';
                        q.choices.forEach(ans => {
                            container.innerHTML += `<input type="text" class="form-control mt-2" name="enumeration_answers[]" value="${ans}">`;
                        });
                    }

                } else {
                    alert(resp.message || "Failed to load question for editing.");
                }
            })
            .catch(err => console.error(err));
    }

});
</script>


</body>