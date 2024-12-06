
<div class="conteneur-question">
    <?php foreach ($questions as &$question) : ?>
        <div class="contenu-question">
            <div class="question">
                <p><?= esc($question['question']); ?></p>
                <button onclick="afficherReponse(this)">+</button>
            </div>
            <div class="reponse">
                <p><?= esc($question['reponse']); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- Affichage des liens de pagination -->
<div id="paginationQuestion">
    <?= $pagerQuestions->links('Question', 'custom') ?>
</div>

<script src="/assets/js/fctQuestions.js"></script>

