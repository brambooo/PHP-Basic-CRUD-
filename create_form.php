<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 12-7-2016
 * Time: 10:24
 */

?>

<form id="CreateProductForm" action="#" method="post" border="0">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Naam</td>
            <td><input type='text' name='name' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Beschrijving</td>
            <td><textarea name='description' class='form-control' required></textarea></td>
        </tr>
        <tr>
            <td>Prijs</td>
            <td><input type='number' min='1' name='price' class='form-control' required /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Product toevoegen" class="btn btn-primary">
            </td>
        </tr>
    </table>
</form>
