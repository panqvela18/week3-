
<?php if (!empty($name_matched)) : ?>

<div class="overflow-x-auto">
  <table class="table table-compact w-full">
    <thead>
      <tr>
        <th></th> 
        <th>Name</th> 
        <th>Gender</th> 
        <th>House</th> 
        <th>Ancestry</th> 
        <th>Actor</th> 
      </tr>
    </thead> 
    <tbody>
      <tr>
        <th>1</th> 
        <td><?= $name ?></td> 
        <td><?= $gender ?></td> 
        <td><?= $house ?></td> 
        <td><?= $ancestry ?></td> 
        <td><?= $actor ?></td> 
        
      </tr>
      
    <tfoot>
      <tr>
      <th></th> 
        <th>Name</th> 
        <th>Gender</th> 
        <th>House</th> 
        <th>Ancestry</th> 
        <th>Actor</th> 
      </tr>
    </tfoot>
  </table>
</div>

<?php endif; ?>