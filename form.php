<?php require_once "./connect.php" ?>
<?php require_once "./getApi.php" ?>
<form class="mt-5 flex justify-center " method="POST">
    <input type="text" name="name" value="<?= $chname ?>" placeholder="Search Info About Harry Potter Character" class="input input-bordered input-info w-full max-w-xs " />
    <button type="submit" class="btn btn-outline">Search</button>
</form>
<?php if(!empty($name_error)) : ?>
<div class="alert alert-error shadow-lg">
  <div>
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
    <span>Error! Charachter wasn't found</span>
  </div>
</div>
<?php endif ; ?>


