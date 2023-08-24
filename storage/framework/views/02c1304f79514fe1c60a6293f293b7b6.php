
<?php $__env->startSection('MainContent'); ?>

<div class="row form-container">
    <div class="col-md-12" >
        <h2>Course Details <?php echo e($course->category->name); ?>  :</h2>
       <h4 style="color: rgb(48, 48, 175)"> Course Title  : <span style="color: black"><?php echo e($course->course_title); ?></span> </h4>
       <h4 style="color: rgb(48, 48, 175)">Category Name : <span style="color: black"> <?php echo e($course->category->name); ?></span></h4>
       <h4 style="color: rgb(48, 48, 175)">Hours : <span style="color: black"><?php echo e($course->hours); ?></span></h4>
       <h4 style="color: rgb(48, 48, 175)">Teacher : <span style="color: black"><?php echo e($course->teacher); ?></span></h4>
       <h4 style="color: rgb(48, 48, 175)">Details : <?php echo $course->details; ?></h4>
    
    
    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/admin/details.blade.php ENDPATH**/ ?>