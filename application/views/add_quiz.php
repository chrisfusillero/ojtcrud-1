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


<div class="container my-4">
    <div class="row">

        <!-- LEFT COLUMN — CREATE GROUP -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
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

                        <!-- TIME LIMIT -->
                        <div class="form-group mt-3">
                            <label class="fw-bold">Time Limit</label>

                            <div class="input-group">
                                <input type="number"
                                      name="duration_minutes"
                                      class="form-control"
                                      min="0"
                                      placeholder="Enter total minutes (e.g. 90)">
                                <span class="input-group-text">Minutes</span>
                            </div>

                            <small class="text-muted">
                                Leave empty or zero for no time limit.
                            </small>
                        </div>

                        <button type="button" id="createGroupBtn" class="btn btn-primary btn-block mt-3">
                            Create Quiz Group
                        </button>

                        <button type="button" id="finalSaveGroupBtn" class="btn btn-success btn-block mt-2" disabled>
                            Save Quiz Group
                        </button>

                    </form>

                </div>
            </div>

            <!-- GROUP QUESTIONS PREVIEW -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-secondary text-white">
                    <h6 class="mb-0">Questions in This Group</h6>
                </div>
                <div class="card-body" id="questionList">
                    <p class="text-muted">Create a group first.</p>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN — ADD QUESTION -->
        <div class="col-md-8">

            <div id="quizCardsContainer">

                <div class="card shadow-sm quiz-card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Add Question to Group</h5>
                    </div>

                    <div class="card-body">

                        <form id="addQuestionForm">

                            <!-- GROUP ID injected AFTER saving group -->
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
                                                <input type="radio" name="mc_correct_choice"
                                                    value="<?= $i ?>" class="form-check-input me-2">

                                                <input type="text" class="form-control"
                                                    name="choices[]" placeholder="Choice <?= $i + 1 ?>">
                                            </div>
                                        <?php endfor; ?>
                                    </div>

                                    <button type="button" id="add_choice_btn"
                                            class="btn btn-sm btn-secondary mt-2">
                                        + Add Another Choice
                                    </button>
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
                                    <button type="button" id="add_enum" class="btn btn-sm btn-secondary mt-2">
                                        Add More
                                    </button>
                                </div>

                                <button type="button" id="addQuestionBtn"
                                        class="btn btn-primary btn-block mt-3">
                                    Add Question to Group
                                </button>

                            </fieldset>

                        </form>

                    </div>

                </div>

                <br />

                <a href="<?= base_url('index.php/admin_Main/quizbee'); ?>" class="btn btn-secondary mb-3 ms-2">
                    Back to Dashboard
                </a>

            </div>

        </div>

    </div>
</div>


<script>
let groupID = null; 
let groupCreated = false;


document.getElementById("createGroupBtn").onclick = function () {
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

            loadTempQuestions();
            alert("Quiz Group created! Now you can add questions.");
        } else {
            alert(res.message || "Failed to create group");
        }
    })
    .catch(() => alert("Error creating group"));
};


document.getElementById("addQuestionBtn").onclick = function () {
    if (!groupCreated) {
        alert("Please create a quiz group first.");
        return;
    }

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
            loadTempQuestions();
        } else {
            alert(res.message || "Failed to add question");
        }
    })
    .catch(() => alert("Error adding question"));
};


function loadTempQuestions() {
    if (!groupCreated) return;

    fetch("<?= base_url('index.php/admin_Main/get_temp_questions/'); ?>" + groupID)
        .then(res => res.json())
        .then(data => {
            let box = document.getElementById("questionList");

            if (!data.length) {
                box.innerHTML = `<p class="text-muted">No questions added yet.</p>`;
                return;
            }

            let html = "";
            data.forEach(q => {
                html += `
                    <div class="border p-2 mb-2">
                        <strong>${q.question}</strong><br>
                        <small class="text-muted">${q.type}</small>
                    </div>
                `;
            });

            box.innerHTML = html;
        });
}


document.getElementById("quiz_type").addEventListener("change", function () {
    document.getElementById("multiple_choice_section").style.display =
        this.value === "multiple_choice" ? "block" : "none";

    document.getElementById("true_false_section").style.display =
        this.value === "true_false" ? "block" : "none";

    document.getElementById("identification_section").style.display =
        this.value === "identification" ? "block" : "none";

    document.getElementById("enumeration_section").style.display =
        this.value === "enumeration" ? "block" : "none";
});


document.getElementById("add_enum").onclick = () => {
    let f = document.createElement("input");
    f.type = "text";
    f.classList.add("form-control", "mt-2");
    f.name = "enumeration_answers[]";
    f.placeholder = "Another Answer";
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
    if (!groupCreated || !groupID) {
        alert("Please create a group first.");
        return;
    }

    let form = document.getElementById("quizgroupform");
    let data = new FormData(form);
    data.set("group_id", groupID); 


    const btn = this;
    btn.disabled = true;

    fetch("<?= base_url('index.php/admin_Main/save_quiz_group_final'); ?>", {
        method: "POST",
        body: data
    })
    .then(res => res.json())
    .then(res => {
        btn.disabled = false;

        if (res.status === "success") {
            alert("Quiz Group saved successfully!");
            window.location.href = "<?= base_url('index.php/admin_Main/quiz_list'); ?>";
        } else {
            alert(res.message || "Failed to save quiz group");
        }
    })
    .catch(() => {
        btn.disabled = false;
        alert("Error saving quiz group");
    });
};



document.getElementById("questionFieldset").disabled = true;
document.getElementById("finalSaveGroupBtn").disabled = true;

</script>







</body> 