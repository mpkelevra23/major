<p class="answer_caption caption"><?= $answer ?></p>
<?php if (!empty($palindromeList)) : ?>
    <ol class="answer_list list">
        <?php foreach ($palindromeList as $key => $palindrome): ?>
            <?php if (is_array($palindrome)) : ?>
                <li><?= $key; ?>
                    <ol class="answer_list list">
                        <?php foreach ($palindrome as $value): ?>
                            <li><?= $value; ?></li>
                        <?php endforeach; ?>
                    </ol>
                </li>
            <?php else: ?>
                <li><?= $palindrome; ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>
<?php endif; ?>