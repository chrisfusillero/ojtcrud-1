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
    <div class="card-header bg-secondary text-white">
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

                <div class="card-header bg-info text-white">
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


document.addEventListener('DOMContentLoaded', function() {
    const questionItems = document.querySelectorAll('.question-item');

    questionItems.forEach(item => {
        item.addEventListener('click', function() {
            const questionId = this.getAttribute('data-id');

            fetch(`<?= base_url('index.php/admin_Main/get_question/'); ?>${questionId}`)
                .then(res => res.json())
                .then(resp => {
                    if(resp.status === 'success' && resp.data) {
                        const data = resp.data; // the question object

                        // Update the select and textarea
                        const typeSelect = document.querySelector('select[name="quiz_type"]');
                        const questionTextarea = document.querySelector('textarea[name="question"]');
                        typeSelect.value = data.question_type || '';
                        questionTextarea.value = data.question || '';

                        // Hide all sections first
                        document.getElementById('multiple_choice_section').style.display = 'none';
                        document.getElementById('true_false_section').style.display = 'none';
                        document.getElementById('identification_section').style.display = 'none';
                        document.getElementById('enumeration_section').style.display = 'none';

                        // Show the correct section and populate choices
                        if(data.question_type === 'multiple_choice') {
                            document.getElementById('multiple_choice_section').style.display = 'block';
                            const container = document.getElementById('choices_container');
                            container.innerHTML = '';

                            if(Array.isArray(data.choices)) {
                                data.choices.forEach((c, i) => {
                                    container.innerHTML += `
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">
                                                <input type="radio" name="mc_correct" value="${i}" ${c === data.answer ? 'checked' : ''}>
                                            </span>
                                            <input type="text" class="form-control" name="choices[]" value="${c}">
                                        </div>
                                    `;
                                });
                            }
                        } else if(data.question_type === 'true_false') {
                            document.getElementById('true_false_section').style.display = 'block';
                            const trueInput = document.querySelector('input[name="tf_answer"][value="True"]');
                            const falseInput = document.querySelector('input[name="tf_answer"][value="False"]');
                            if(data.answer === 'True') trueInput.checked = true;
                            if(data.answer === 'False') falseInput.checked = true;
                        } else if(data.question_type === 'identification') {
                            document.getElementById('identification_section').style.display = 'block';
                            document.querySelector('input[name="identification_answer"]').value = data.answer || '';
                        } else if(data.question_type === 'enumeration') {
                            document.getElementById('enumeration_section').style.display = 'block';
                            const enumContainer = document.getElementById('enum_container');
                            enumContainer.innerHTML = '';
                            if(Array.isArray(data.choices)) {
                                data.choices.forEach(ans => {
                                    enumContainer.innerHTML += `<input type="text" class="form-control mt-2" name="enumeration_answers[]" value="${ans}">`;
                                });
                            }
                        }

                        // Optional: scroll to edit card
                        const editCard = document.querySelector('.col-md-8 .card');
                        editCard.scrollIntoView({ behavior: 'smooth', block: 'start' });

                    } else {
                        alert(resp.message || 'Failed to load question.');
                    }
                })
                .catch(err => console.error(err));
        });
    });
});


</script>

</body>