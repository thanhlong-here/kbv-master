<?php
  $acs  = $auth->domains();
  $ids   = array();
?>

<div class="user_access">

  <span class="title" >
      Domains :
  </span>
<?php foreach( $acs as $a ) :
    $ids[]  = $a->domain;
?>
    <span>
      <form action="user/access_remove" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="access" value="{{$a->id}}" >

        <button type="submit" class="btn-danger">
           {{$a->name}}<i class="ft-x"></i>
        </button>
      </form>
    </span>

<?php
endforeach;
    $ds = $domains->whereNotIn('id',$ids);
?>


<?php if( $ds->count() ) : ?>

  <div class="pull-right">
    <form  action="user/access_add" method="post" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="auth" value="{{$user->auth}}">

        <select  name="domain" id="domain" onchange="this.form.submit()" >
            <option value="">______________</option>
            <?php
            foreach ($ds as $dm) {
                echo sprintf('<option value="%s"> %s</option>', $dm->id, $dm->name);// code...
            }
            ?>
        </select>
    </form>
  </div>
<?php endif; ?>
</div>
