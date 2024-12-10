<?php 
	$title = "Saiyan's Coaching - Question Admin";
	$style = "stlQuestion.css";
	$navbar = "stlNavbar.css";	
    include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php';
?>

<div class="conteneur-admin-question">

    <div class="recherche">
        <?= form_open('/admin/rechercherQuestion', ['method' => 'post']); ?>
            <?= csrf_field() ?>
            <?= form_label('<h5>Rechercher :</h5>', 'recherche'); ?>
            <?= form_input('recherche',isset($_SESSION['rechercheQuestion']) ? $_SESSION['rechercheQuestion'] : '',['id' => 'recherche', 'onchange' => 'this.form.submit()']); ?>
        <?= form_close(); ?>
    </div>

    <div class="contenu-admin-question">
        <div class="tableau-admin-question">
            <table>
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Reponse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($questions as $question) : ?>
                        <tr>
                            <td><?= $question['question'] ?></td>
                            <td><?= $question['reponse'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/question/' . $question['id']) ?>">Modifier</a> |
                                <a href="<?= base_url('admin/supprQuestion/' . $question['id']) ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="<?= base_url('admin/question/ajouter') ?>">Ajouter une question</a>

        <div id="paginationQuestion">
            <?= $pagerQuestions->links('Question', 'custom') ?>
        </div>
    </div>

</div>



<?php include __DIR__ . '/../templates/footerAdmin.php'; ?>