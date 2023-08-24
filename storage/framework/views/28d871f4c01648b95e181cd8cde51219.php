<link rel="stylesheet"  href="<?php echo e(asset('css/styleAd.css')); ?>">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
 
<div class="course-price">
    Course Price : 
    <?php $__currentLoopData = $course_student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!isset($currentCoursePrice) || $currentCoursePrice !== $corr->courseStudent->course->course_price): ?>
            <?php echo e($corr->courseStudent->course->course_price); ?>

            <?php
                $currentCoursePrice = $corr->courseStudent->course->course_price;
            ?>
            <?php break; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="amount-paid">
    Amount Paid : 
    <?php $__currentLoopData = $course_student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!isset($currentAmountPaid) || $currentAmountPaid !== $corr->courseStudent->amount_paid): ?>
            <?php echo e($corr->courseStudent->amount_paid); ?>

            <?php
                $currentAmountPaid = $corr->courseStudent->amount_paid;
            ?>
            <?php break; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<table  class="table table-success table-striped">

    <thead>
    <tr style="text-align: center;">
        <th>amount</th>
        <th>payment_date</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    <?php $__currentLoopData = $course_student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <tr>
        <td><?php echo e($corr->amount); ?></td>
        <td><?php echo e($corr->payment_date); ?></td>
        <td>
            <form action="<?php echo e(route('payment.destroy', $corr->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" id="btn-delete-co">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script>
        $(document).ready(function() {
           $("#btn-delete-co").click(function() {
              alert("Payment Deleted successfully");
          });
        });
     </script>
</tbody>

</table>

<?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/admin/viewPay.blade.php ENDPATH**/ ?>