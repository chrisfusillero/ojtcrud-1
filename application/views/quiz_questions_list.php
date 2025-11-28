
<body onload="noBack();" onpageshow="if(event.persisted) noBack();" onunload="">

<title>Quiz Bee Questions List</title>

<header class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">

    <a class="navbar-brand fw-bold text-primary" href="<?= base_url('index.php/admin_Main'); ?>">
      DigiCrud101
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center me-3">


        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main'); ?>">Home</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_crud'); ?>">Accounts</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_projects'); ?>">Projects</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link fw-medium" href="<?= base_url('index.php/admin_Main/admin_settings'); ?>">
              👤 <strong><?= isset($firstname) || isset($lastname) ? ($firstname ?? '') . ' ' . ($lastname ?? '') : 'Guest'; ?></strong>
          </a>
        </li>


        
        <li class="nav-item dropdown">
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
            Menu
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?= base_url('index.php/admin_Main/admin_settings'); ?>">Settings</a></li>
            <li><a class="dropdown-item text-danger" href="<?= base_url('index.php/AuthLogin'); ?>">Log Out</a></li>
          </ul>
        </li>

      </ul>
    </div>

  </div>
</nav>
</header>

<body>

<div class="container my-5">
    <h2 class="mb-4"><?= htmlentities($group['group_title'] ?? 'Untitled Group') ?></h2>
    <p><?= htmlentities($group['description'] ?? '') ?></p>

    <a href="<?= base_url('index.php/admin_Main/edit_quiz/' . $group['group_id']) ?>" class="btn btn-primary mb-3">Edit Group</a>
    <a href="<?= base_url('index.php/admin_Main/quiz_list') ?>" class="btn btn-secondary mb-3 ms-2">Back to Quiz List</a>

    <?php if (!empty($questions)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Type</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($questions as $i => $q): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlentities($q['question']) ?></td>
                    <td><?= htmlentities($q['question_type']) ?></td>
                    <td><?= htmlentities($q['answer']) ?></td>
                    <td>
                        <a href="<?= base_url('index.php/admin_Main/edit_quiz_question/' . $q['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('index.php/admin_Main/delete_quiz_question/' . $q['id'] . '/' . $group['group_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this question?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No questions found in this group.</p>
    <?php endif; ?>
</div>

<div class="footer">
<p>&copy; <?php echo date("Y"); ?> Admin Site. All Rights Reserved.</p>
</div>


</body>

</html>
