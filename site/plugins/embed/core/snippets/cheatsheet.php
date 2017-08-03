<?php if(is_array($entries)) : ?>
  <table class="field-embed-cheatsheet__table">
    <tr class="field-embed-cheatsheet__th">
      <td>URL parameter</td>
      <td>Description</td>
    </tr>
    <?php foreach($entries as $entry) : ?>
      <tr>
        <td><?= $entry[0] ?></td>
        <td><?= $entry[1] ?></td>
      </tr>
    <?php endforeach ?>
  </table>
<?php endif ?>
