

<?php require APPROOT . '/views/includes/header.php'; ?>
<h1 class="text-center">Update Allergy for Family</h1>

<?php if (isset($data['updateStatus'])) : ?>
  <p><?php echo $data['updateStatus']; ?></p>
<?php else : ?>
  <form class="form1" action="<?php echo URLROOT; ?>/families/update/<?php echo $data['family']->id; ?>" method="post">
    <label for="allergieId">Select Allergy:</label>
    <select name="allergieId" id="allergieId">
      <?php foreach ($data['allergies'] as $allergy) : ?>
        <option value="<?php echo $allergy->id; ?>"><?php echo $allergy->Type; ?></option>
      <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" value="Update Allergy">
  </form>
<?php endif; ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>