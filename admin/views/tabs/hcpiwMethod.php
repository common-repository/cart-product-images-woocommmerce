<?php
if (isset($_POST["cipw_images_submit"])) {

  $cipw_images = sanitize_textarea_field($_POST['cipw_images']);

  update_option("cipw_images_db", $cipw_images, "yes");

    ?>
    <div id="message" class="updated notice is-dismissible">
        <p>Data updated</p>
    </div>
  <?php

}
$value =  get_option('cipw_images_db');

?>

<div class="form-wrap">
    <form method="post" action="">
        <table class="form-table">
            <tbody>
            <tr class="nopad">
                <td>
                    <h3>Handle Images</h3>
                </td>
            </tr>
            <tr class="">
                <th scope="row">
                    <label>Show Images in Cart</label>
                </th>
                <td>
                    <input  id="" class="regular-text code " type="radio"
                           name="cipw_images"
                           value="1" <?php if($value == 1){echo 'checked="checked"';} ?>>

                    <p class="description">
                        Yes</p>
                </td>
                <td>
                    <input id="" class="regular-text code " type="radio"
                           name="cipw_images"
                           value="0" <?php if($value == 0){echo 'checked="checked"';} ?>>

                    <p class="description">
                        No</p>
                </td>
            </tr>

            </tbody>
        </table>
      <?php submit_button("Save Changes", "", "cipw_images_submit"); ?>
    </form>
</div>
