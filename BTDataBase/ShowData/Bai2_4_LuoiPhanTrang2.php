<?php if ($Current_Page >= 3) { ?>
    <a href="?per_page=<?=$QuantityItemPage?>&page=1">First</a>
<?php }?>

<?php for ($i=1; $i <= $totalPages; $i++) { ?>
    <?php if($i==$Current_Page){ ?>
        <strong><a class="selected" href="#"><?=$i?></a></strong>
    <?php } else {?>
        <?php if($i > $Current_Page-2 && $i < $Current_Page+2){?>
            <a href="?per_page=<?=$QuantityItemPage?>&page=<?=$i?>"><?=$i?></a>
            <?php ;} ?>
    <?php ;}?>
<?php } ?>

<?php if($Current_Page <= $totalPages - 2) { ?>
    <a href="?per_page=<?=$QuantityItemPage?>&page=<?=$totalPages?>">Last</a>
<?php ;}?>