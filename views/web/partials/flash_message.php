

<?php if(App\FlashMessage::getFlash()!=null): ?>
<div class=" m-5 alert alert-<?=App\FlashMessage::getFlash()->getType()?>" role="alert">
<?=App\FlashMessage::getFlash()->getMessage()?>
</div>
<?php unset($_SESSION['flash']); ?>
<?php endif; ?>