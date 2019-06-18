<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Crudavel</title>

    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
  <body>
    <div id="app"></div>

    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
  </body>
</html>
<?php /**PATH E:\aing\Homestead\code\crudavel\resources\views/index.blade.php ENDPATH**/ ?>