<style>
body {
    background-image: url('<?php echo base_url("assets/portfolio_image/skyblue.jpg"); ?>');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  font-size: 16px;
  margin: 0;
  padding-top: 70px;
  height: 100vh;
  display: flex;
  flex-direction: column;
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

.table td,
.table th {
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
  margin-top: auto; 
}


.container.my-5 {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center; 
  align-items: center; 
}


.intro-card {
  text-align: center;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  background-color: white;
  width: 80%; 
  max-width: 600px; 
}

.intro-card h2 {
  font-size: 2.5em;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

.intro-card p {
  font-size: 1.1em;
  color: #666;
  margin-bottom: 20px;
}

.intro-card .btn-primary {
  padding: 12px 24px;
  font-size: 1.2em;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.intro-card .btn-primary:hover {
  background-color: #0056b3;
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

  .project-tile {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    cursor: pointer;
    border-radius: 12px;
    overflow: hidden;
  }

  .project-tile:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
  }

  .project-tile img {
    height: 160px;
    object-fit: cover;
  }

  .quiz-box {
    background: #fff;
    border: 1px solid #e3e3e3;
  }

  @media (max-width: 768px) {
    .quiz-box {
      padding: 20px;
    }
  }
}
</style>
</head>

<title>Quiz Bee</title>


<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

 <header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">

    
    <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/welcome'); ?>">
      Blogspot101
    </a>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">

        
        <li class="nav-item me-2">
          <a class="nav-link fw-medium ms-2" href="<?= base_url('index.php/welcome'); ?>">Home</a>
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
              <a class="dropdown-item" href="<?= base_url('index.php/welcome/settings'); ?>">Settings</a>
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
    <h2 class="mb-4">Quiz — Answer the Questions</h2>

    <?php echo form_open('quiz/submit', ['id' => 'quizForm']); ?>

    <?php if (!empty($quizzes)): ?>
        <div id="quizContainer">

            <?php $index = 0; ?>
            <?php foreach ($quizzes as $q): ?>
                <?php 
                    $type = strtolower(trim($q['type']));
                    $choices = isset($q['choices']) ? json_decode($q['choices'], true) : [];
                ?>

                <div class="question-card card mb-4" 
                     data-question-index="<?php echo $index; ?>"
                     style="<?php echo $index === 0 ? '' : 'display:none;' ?>">

                    <div class="card-body">

                        <h5 class="mb-3"><strong>Question <?php echo $index + 1; ?></strong></h5>

                        <p><?php echo $q['question']; ?></p>
                        <input type="hidden" name="question_id[]" value="<?php echo $q['id']; ?>">

                        <!-- MULTIPLE CHOICE -->
                        <?php if ($type === 'multiple_choice' || $type === 'multiple choice'): ?>
                            
                            <?php if (!empty($choices)): ?>
                                <?php foreach ($choices as $choice): ?>
                                    <div class="form-check">
                                        <input class="form-check-input answer-input"
                                               type="radio"
                                               name="answer[<?= $q['id'] ?>]"
                                               value="<?= htmlspecialchars($choice) ?>">
                                        <label class="form-check-label"><?= htmlspecialchars($choice) ?></label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>


                        <!-- TRUE/FALSE -->
                        <?php elseif ($type === 'true_false'): ?>

                            <div class="form-check">
                                <input class="form-check-input answer-input"
                                       type="radio"
                                       name="answer[<?= $q['id'] ?>]"
                                       value="True">
                                <label class="form-check-label">True</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input answer-input"
                                       type="radio"
                                       name="answer[<?= $q['id'] ?>]"
                                       value="False">
                                <label class="form-check-label">False</label>
                            </div>


                        <!-- IDENTIFICATION -->
                        <?php elseif ($type === 'identification'): ?>

                            <input type="text"
                                   class="form-control answer-input"
                                   name="answer[<?= $q['id'] ?>]"
                                   placeholder="Your answer">


                        <!-- ENUMERATION -->
                        <?php elseif ($type === 'enumeration'): ?>

                            <textarea class="form-control answer-input"
                                      name="answer[<?= $q['id'] ?>]"
                                      placeholder="Separate with commas"></textarea>


                        <?php endif; ?>
                    </div>
                </div>

                <?php $index++; ?>
            <?php endforeach; ?>

        </div>

     
        <button type="submit" class="btn btn-primary btn-lg" id="submitButton" style="display:none;">
            Submit Answers
        </button>

        <button type="button" class="btn btn-secondary btn-lg ms-2"
                onclick="window.location.href='<?= base_url('index.php/welcome/quizbee_user'); ?>'">
            Back to Dashboard
        </button>

    <?php else: ?>
        <div class="alert alert-warning">No questions available.</div>
    <?php endif; ?>

    <?php echo form_close(); ?>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {

    let current = 0;
    const total = $('.question-card').length;

    function showQuestion(index) {
        $('.question-card').hide();
        $(`.question-card[data-question-index="${index}"]`).show();

        if (index === total - 1) {
            $('#submitButton').show();
        }
    }

    
    $(document).on('change', '.answer-input', function() {
        if (current < total - 1) {
            current++;
            showQuestion(current);
        }
    });

});
</script>




</body>