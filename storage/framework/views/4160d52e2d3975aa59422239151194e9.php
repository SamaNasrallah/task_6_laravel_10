
<?php $__env->startSection('MainContent'); ?>
<br>
<table class="table table-success table-striped">
    <thead>

    <?php
     use App\Models\Course;
     $courses = Course::all();
 
    ?>
    <tr style="text-align: center;">
        <th>Course Title</th>
        <th>Classification</th>
        <th>Details</th>
        <th>Hours</th>
        <th>Start Date</th>
        <th>Teacher</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($course->course_title); ?></td>
        <td><?php echo e($course->classification); ?></td>
        <td><?php echo e($course->details); ?></td>
        <td><?php echo e($course->hours); ?></td>
        <td><?php echo e($course->start_date); ?></td>
        <td><?php echo e($course->teacher); ?></td>
        <td> <a class="btn btn-primary" href="<?php echo e(url('admin/edit/'.$course->id)); ?>">Edit</a>  
        </td>
        <td>
            <form action="<?php echo e(route('admin.destroy',$course->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Delete</button>
                 </form>

        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/admin/show.blade.php ENDPATH**/ ?>