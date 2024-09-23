<?php
$block_wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'alignfull',
]);
$normalPath = "M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z";
$invertedPath = "M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z";

$topTransform = 'scaleX(' . ($attributes['topFlipX'] ? '-1' : '1') . ') rotate(' . ($attributes['topFlipY'] ? '180deg' : '0') . ')';
$bottomTransform = 'scaleX(' . ($attributes['bottomFlipX'] ? '-1' : '1') . ') rotate(' . ($attributes['bottomFlipY'] ? '180deg' : '0') . ')';
//wp_send_json($content);
?>
<div <? echo $block_wrapper_attributes; ?>>
    <div class="curve top-curve"
        style="display: <?= $attributes['enableTopCurve'] ? 'block' : 'none'; ?>;
        transform: <?= $topTransform ?>;
    height: <?= $attributes['topHeight']; ?>px;">
        <svg preserveAspectRatio="none" viewBox="0 0 1200 120" style="
    height: <?= $attributes['topHeight']; ?>px;
    width: <?= $attributes['topWidth']; ?>%;">
            <path fill="<?= $attributes['topColor'] ?? 'white'; ?>" d="<?= $attributes['topFlipY'] ? $invertedPath : $normalPath; ?>"></path>
        </svg>
    </div>
    <?= $content ?>
    <div class="curve bottom-curve"
        style="display: <?= $attributes['enableBottomCurve'] ? 'block' : 'none'; ?>;
        transform: <?= $topTransform ?>;
    height: <?= $attributes['bottomHeight']; ?>px;">
        <svg preserveAspectRatio="none" viewBox="0 0 1200 120" style="
    height: <?= $attributes['bottomHeight']; ?>px;
    width: <?= $attributes['bottomWidth']; ?>%;">
            <path fill="<?= $attributes['bottomColor'] ?? 'white'; ?>" d="<?= $attributes['bottomFlipY'] ? $invertedPath : $normalPath; ?>"></path>
        </svg>
    </div>
</div>