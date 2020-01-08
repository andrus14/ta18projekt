<?php require('partials/head.php'); ?>

<h1>Riigid</h1>

<?php if ( !isset($country->id) ) { ?>

<form method="POST" action="/addcountry">
    <label for="country_name">Lisa:</label>
    <br>
    <input name="country_name">
</form>

<?php } else { ?>

<form method="POST" action="/editcountry">
    <label for="country_name">Muuda:</label>
    <br>
    <input type="hidden" name="id" value="<?php echo $country->id; ?>">
    <input name="country_name" value="<?php echo $country->name; ?>">
    <input type="submit" name="submit" value="Salvesta">
</form>

<?php } ?>


<?php if ( $message ) { ?>
    <div><?php echo $message; ?></div>
<?php } ?>

<table style="margin-top: 40px;">
<?php foreach ( $countries as $country ) { ?>
    <tr>
        <td><?php echo $country->name;?></td>
        <td><a href="countries?action=edit&id=<?php echo $country->id; ?>">muuda</a></td>
        <td><a href="countries/delete?id=<?php echo $country->id; ?>">kustuta</a></td>
    </tr>
<?php } ?>
</table>

<?php require('partials/footer.php'); ?>