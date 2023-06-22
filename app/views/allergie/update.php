<?php require(APPROOT . '/views/includes/Navbar.php');?>


<h3 class="" style="margin-left: 8rem;"><?= $data['title'] ?></h3>



<?php if (isset($data['updateStatus'])) : ?>
<p><?php echo $data['updateStatus']; ?></p>
<?php else : ?>
<form class="form1" action="<?php echo URLROOT; ?>/allergie/update" method="post">
    <label for="allergieId">Selecteer een allergie:</label>
    <select name="allergieId" id="allergieId">
        <!-- <option selected value="<?= $data['allergieId'] ?>"><?= $data['allergieType'] ?></option> -->
        <?php foreach ($data['allergie'] as $allergie) : ?>
        <option value=""><?php echo $allergie->Naam; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="hidden" name="id" value="<?= $data['allergie'] ?>">
    <input type="submit" value="Update">
</form>
<?php endif; ?>