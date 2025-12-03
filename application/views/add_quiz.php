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

.option-selected {
  background-color: rgba(0, 123, 255, 0.15);
  border-radius: 8px;
  padding: 8px;
  transition: 0.4s;
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
  margin-top: auto; 
  width: 100vw;
  margin-left: calc(-50vw + 50%);
}

.active-question {
    background-color: #0d6efd !important;
    color: white !important;
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


<div class="container my-4">
    <div class="row">

        <!-- LEFT COLUMN — CREATE GROUP -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background-color: #d85e00ff;">
                    <h5 class="mb-0">Create Quiz Group</h5>
                </div>
                <div class="card-body">
                    <form id="quizgroupform">
                        <div class="form-group">
                            <label>Group Title</label>
                            <input type="text" name="group_title" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label class="fw-bold">Time Limit</label>
                            <div class="input-group">
                                <input type="number" name="duration_minutes" class="form-control" min="0" placeholder="Enter total minutes (e.g. 90)">
                                <span class="input-group-text">Minutes</span>
                            </div>
                            <small class="text-muted">Leave empty or zero for no time limit.</small>
                        </div>

                        <button type="button" id="createGroupBtn" class="btn btn-primary btn-block mt-3">Create Quiz Group</button>
                        <button type="button" id="finalSaveGroupBtn" class="btn btn-success btn-block mt-2" disabled>Save Quiz Group</button>
                    </form>
                </div>
            </div>

            <!-- Questions list -->
            <div class="card shadow-sm mt-4">
                <div class="card-header text-black" style="background-color: #00eeffff;">
                    <h6 class="mb-0">Questions in This Group</h6>
                </div>
                <div class="card-body" id="questionList">
                    <?php if (empty($questions)): ?>
                        <p class="text-muted">No questions added yet.</p>
                    <?php else: ?>
                        <?php foreach ($questions as $q): ?>
                            <div class="alert alert-primary py-2 mb-2 question-item"
                                data-id="<?= $q['question_id']; ?>"
                                style="cursor:pointer;">
                                <?= htmlentities($q['question']); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN — ADD QUESTION -->
        <div class="col-md-8">
            <input type="hidden" id="edit_question_id" name="question_id" value="">

            <div id="quizCardsContainer">
                <div class="card shadow-sm quiz-card">
                    <div class="card-header" style="background-color: #d9ff00ff; color: #434343ff;">
                        <h5 class="mb-0">Add Question to Group</h5>
                    </div>
                    <div class="card-body">
                        <form id="addQuestionForm">
                            <input type="hidden" name="group_id" id="group_id" value="">

                            <div class="alert alert-warning" id="noGroupWarning">
                                You must create and save a quiz group before adding questions.
                            </div>

                            <fieldset id="questionFieldset" disabled>
                                <div class="form-group">
                                    <label>Question Type</label>
                                    <select class="form-control" id="quiz_type" name="quiz_type">
                                        <option value="multiple_choice">Multiple Choice</option>
                                        <option value="true_false">True or False</option>
                                        <option value="identification">Identification</option>
                                        <option value="enumeration">Enumeration</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Question</label>
                                    <textarea class="form-control" name="question" required rows="2"></textarea>
                                </div>

                                <!-- MCQ -->
                                <div id="multiple_choice_section">
                                    <label>Choices</label>
                                    <div id="choices_container">
                                        <?php for ($i = 0; $i < 4; $i++): ?>
                                            <div class="d-flex align-items-center mt-2 mc-choice-row">
                                                <input type="radio" name="mc_correct_choice" value="<?= $i ?>" class="form-check-input me-2">
                                                <input type="text" class="form-control" name="choices[]" placeholder="Choice <?= $i + 1 ?>">
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                    <button type="button" id="add_choice_btn" class="btn btn-sm btn-secondary mt-2">+ Add Another Choice</button>
                                </div>

                                <!-- TRUE/FALSE -->
                                <div id="true_false_section" style="display:none;">
                                    <label>Correct Answer</label>
                                    <div class="form-check mt-2">
                                        <input type="radio" name="tf_answer" value="True" class="form-check-input">
                                        <label class="form-check-label">True</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input type="radio" name="tf_answer" value="False" class="form-check-input">
                                        <label class="form-check-label">False</label>
                                    </div>
                                </div>

                                <!-- IDENTIFICATION -->
                                <div id="identification_section" style="display:none;">
                                    <label>Correct Answer</label>
                                    <input type="text" class="form-control" name="identification_answer">
                                </div>

                                <!-- ENUMERATION -->
                                <div id="enumeration_section" style="display:none;">
                                    <label>Enumeration Answers</label>
                                    <div id="enum_container">
                                        <input type="text" class="form-control mt-2" name="enumeration_answers[]" placeholder="Answer 1">
                                    </div>
                                    <button type="button" id="add_enum" class="btn btn-sm btn-secondary mt-2">Add More</button>
                                </div>

                                <button type="button" id="addQuestionBtn" class="btn btn-primary btn-block mt-3">Add Question to Group</button>
                                <button type="button" id="cancelEditBtn" class="btn btn-secondary mb-3" style="display:none;">Cancel</button>

                            </fieldset>
                        </form>
                    </div>
                </div>

                <br />

                <a href="<?= base_url('index.php/admin_Main/quizbee'); ?>" class="btn btn-secondary mb-3 ms-2">Back to Dashboard</a>
            </div>
        </div>

    </div>
</div>

<script>
let groupID = <?= $group_id ?? 'null' ?>; // If editing existing group
let groupCreated = groupID !== null;

document.getElementById("questionFieldset").disabled = !groupCreated;
document.getElementById("finalSaveGroupBtn").disabled = !groupCreated;

function loadQuestions(){
    if(!groupID) return;

    fetch("<?= base_url('index.php/admin_Main/get_questions/'); ?>" + groupID)
        .then(res => res.json())
        .then(data => {
            let box = document.getElementById("questionList");

            if(!data.length){
                box.innerHTML = `<p class="text-muted">No questions added yet.</p>`;
                return;
            }

            let html = "";
            data.forEach(q=>{
                html += `
                    <div class="alert alert-primary py-2 mb-2 question-item"
                        data-id="${q.id}"
                        style="cursor:pointer;">
                        ${q.question}
                    </div>`;
            });
            box.innerHTML = html;
        });
}



if (groupCreated) loadQuestions();


document.getElementById("createGroupBtn").onclick = () => {
    let form = document.getElementById("quizgroupform");
    let data = new FormData(form);
    

    fetch("<?= base_url('index.php/admin_Main/create_temp_group'); ?>", {
        method: "POST",
        body: data
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            groupID = res.group_id;
            groupCreated = true;
            document.getElementById("group_id").value = groupID;
            document.getElementById("questionFieldset").disabled = false;
            document.getElementById("finalSaveGroupBtn").disabled = false;
            loadQuestions();
            alert("Quiz Group created! Now you can add questions.");
        } else {
            alert(res.message || "Failed to create group");
        }
    });
};


document.getElementById("addQuestionBtn").onclick = () => {
    if (!groupCreated) return alert("Please create a quiz group first.");

    let form = document.getElementById("addQuestionForm");
    let data = new FormData(form);

    fetch("<?= base_url('index.php/admin_Main/temp_add_question'); ?>", {
        method: "POST",
        body: data
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            form.reset();
            loadQuestions();
        } else {
            alert(res.message || "Failed to add question");
        }
    });
};


    document.getElementById("quiz_type").addEventListener("change", function () {
    document.getElementById("multiple_choice_section").style.display = this.value === "multiple_choice" ? "block" : "none";
    document.getElementById("true_false_section").style.display = this.value === "true_false" ? "block" : "none";
    document.getElementById("identification_section").style.display = this.value === "identification" ? "block" : "none";
    document.getElementById("enumeration_section").style.display = this.value === "enumeration" ? "block" : "none";

    if (this.value === "multiple_choice") resetChoices();
});

function resetChoices() {
    let container = document.getElementById("choices_container");
    container.innerHTML = "";
    for (let i = 0; i < 4; i++) {
        container.innerHTML += `
            <div class="d-flex align-items-center mt-2 mc-choice-row">
                <input type="radio" name="mc_correct_choice" value="${i}" class="form-check-input me-2">
                <input type="text" class="form-control" name="choices[]" placeholder="Choice ${i + 1}">
            </div>
        `;
    }
}


document.getElementById("add_enum").onclick = () => {
    let f = document.createElement("input");
    f.type = "text"; f.classList.add("form-control", "mt-2"); f.name = "enumeration_answers[]"; f.placeholder = "Another Answer";
    document.getElementById("enum_container").appendChild(f);
};


document.getElementById("add_choice_btn").onclick = () => {
    let container = document.getElementById("choices_container");
    let index = container.querySelectorAll(".mc-choice-row").length;
    let row = document.createElement("div");
    row.className = "d-flex align-items-center mt-2 mc-choice-row";
    row.innerHTML = `
        <input type="radio" name="mc_correct_choice" value="${index}" class="form-check-input me-2">
        <input type="text" class="form-control" name="choices[]" placeholder="New Choice">
    `;
    container.appendChild(row);
};


document.getElementById("finalSaveGroupBtn").onclick = function () {
    if (!groupCreated || !groupID) return alert("Please create a group first.");

    let form = document.getElementById("quizgroupform");
    let data = new FormData(form);
    data.set("group_id", groupID);

    const btn = this;
    btn.disabled = true;

    fetch("<?= base_url('index.php/admin_Main/save_quiz_group_final'); ?>", { method: "POST", body: data })
        .then(res => res.json())
        .then(res => {
            btn.disabled = false;
            if (res.status === "success") {
                alert("Quiz Group saved successfully!");
                window.location.href = "<?= base_url('index.php/admin_Main/quiz_list'); ?>";
            } else alert(res.message || "Success");
        })
        .catch(() => { btn.disabled = false; alert("Successfuly created"); });
};


document.addEventListener("click", function (e) {
    if (!e.target.classList.contains("question-item")) return;

    let qid = e.target.dataset.id;
    document.getElementById("edit_question_id").value = qid;

    fetch("<?= base_url('index.php/admin_Main/get_question/'); ?>" + qid)
        .then(res => res.json())
        .then(data => {

            if (!data || !data.question_id) {
                alert("Could not load question.");
                return;
            }

            document.getElementById("questionFieldset").disabled = false;
            document.getElementById("edit_question_id").value = data.question_id;

            document.querySelector(".quiz-card h5").innerText = "Edit Question";
            document.getElementById("addQuestionBtn").innerText = "Update Question";
            document.getElementById("cancelEditBtn").style.display = "block";

            document.querySelector("textarea[name='question']").value = data.question;
            document.getElementById("quiz_type").value = data.quiz_type;
            document.getElementById("quiz_type").dispatchEvent(new Event("change"));

            if (data.quiz_type === "multiple_choice") {

                resetChoices();
                let container = document.getElementById("choices_container");
                container.innerHTML = "";

                data.choices.forEach((choice, i) => {
                    let row = document.createElement("div");
                    row.className = "d-flex align-items-center mt-2 mc-choice-row";
                    row.innerHTML = `
                        <input type="radio" name="mc_correct_choice" value="${i}" class="form-check-input me-2" ${data.correct_index == i ? "checked" : ""}>
                        <input type="text" class="form-control" name="choices[]" value="${choice}">
                    `;
                    container.appendChild(row);
                });

            } else if (data.quiz_type === "true_false") {
                document.querySelector(`input[name='tf_answer'][value='${data.correct_answer}']`).checked = true;

            } else if (data.quiz_type === "identification") {
                document.querySelector("input[name='identification_answer']").value = data.correct_answer;

            } else if (data.quiz_type === "enumeration") {
                let container = document.getElementById("enum_container");
                container.innerHTML = "";
                data.answers.forEach(a => {
                    let el = document.createElement("input");
                    el.type = "text";
                    el.className = "form-control mt-2";
                    el.name = "enumeration_answers[]";
                    el.value = a;
                    container.appendChild(el);
                });
            }
        });
});




document.getElementById("cancelEditBtn").addEventListener("click", function () {


    document.getElementById("questionFieldset").disabled = true;


    document.querySelector(".quiz-card h5").innerText = "Add Question to Group";
    document.getElementById("addQuestionBtn").innerText = "Add Question to Group";

   
    this.style.display = "none";


    document.getElementById("edit_question_id").value = "";


    document.getElementById("addQuestionForm").reset();


    resetDefaultChoices();

 
    document.getElementById("multiple_choice_section").style.display = "block";
    document.getElementById("true_false_section").style.display = "none";
    document.getElementById("identification_section").style.display = "none";
    document.getElementById("enumeration_section").style.display = "none";

});


function resetDefaultChoices() {
    let container = document.getElementById("choices_container");
    container.innerHTML = "";

    for (let i = 0; i < 4; i++) {
        let row = document.createElement("div");
        row.className = "d-flex align-items-center mt-2 mc-choice-row";

        row.innerHTML = `
            <input type="radio" name="mc_correct_choice" value="${i}" class="form-check-input me-2">
            <input type="text" class="form-control" name="choices[]" placeholder="Choice ${i + 1}">
        `;

        container.appendChild(row);
    }
}






</script>








</body> 