<?php
    $items=['Index' => '/', 
        'Médecins' => '/doctors.php', 
        'Patients' => '/patients.php',
        'Rendez-vous' => '/rendezvous.php',
        'Spécialités' => '/speciality.php'];
    // Attention à définir une valeur pour le lien actif
?>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php foreach ($items as $label => $url): ?>
        <li class="nav-item">
            <a class="nav-link<?= $label == $actif?' active':'' ?>" href="<?= $url ?>"><?= $label ?></a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>
</header>
<main>