<p> <?php _e('Search event between','sagenda-wp') ?> : </p>
<?php
piklist('field', array(
  'type' => 'datepicker'
  ,'scope' => 'post'
  ,'field' => 'start_date'
  ,'label' => 'From'
  ,'description' => 'Click in box to define when your search starts'
  ,'attributes' => array(
    'class' => 'text'
  )
  ,'options' => array(
    'dateFormat' => 'M d, yy'
    ,'firstDay' => '0'
  )
));

piklist('field', array(
  'type' => 'datepicker'
  ,'scope' => 'post'
  ,'field' => 'end_date'
  ,'label' => _e('To')
  ,'description' => 'Click in box to define when your search ends'
  ,'attributes' => array(
    'class' => 'text'
  )
  ,'options' => array(
    'dateFormat' => 'M d, yy'
    ,'firstDay' => '0'
  )
)); ?>


<!-- TODO : can we change this with twitter bootstrap ? -->
<table style="width:100%;border-style:none;">
  <tr>
    <td style="border-style:none;">
      <?php piklist('field', array(
        'type' => 'submit'
        ,'field' => 'submit'
        ,'value' => 'search'
      )); ?>
    </td>
    <td style="border-style:none;">
      <?php piklist('field', array(
        'type' => 'submit'
        ,'field' => 'submit'
        ,'value' => 'Enable multi-booking'
      )); ?>
    </td>
  </tr>
</table>
