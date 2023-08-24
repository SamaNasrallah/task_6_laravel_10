
<?php $__env->startSection('MainContent'); ?>
<br>
<?php
use App\Models\Course;
$courses = Course::all();

?>
<a href="<?php echo e(route('course.create')); ?>" class="btn btn-success" style="font-size: 18px">Add Course</a>

<table class="table table-success table-striped" >
    <thead>
    <tr style="text-align: center;">
        <th>ID</th>
        <th>Course Title</th>
        <th>Category</th>
        <th>Hours</th>
        <th>Start Date</th>
        <th>Teacher</th>
        <th>Max Student</th>
        <th>Details</th>
        <th>Student</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($course->id); ?></td>
        <td><?php echo e($course->course_title); ?></td>
        <td><?php echo e($course->category->name); ?></td>
        <td><?php echo e($course->hours); ?></td>
        <td><?php echo e($course->start_date); ?></td>
        <td><?php echo e($course->teacher); ?></td>
        <td><?php echo e($course->max_students); ?></td>
        <td>
            <a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#studentModal<?php echo e($course->id); ?>">Details</a>
        </td>
        
        <div class="modal fade" id="studentModal<?php echo e($course->id); ?>" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel<?php echo e($course->id); ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentModalLabel<?php echo e($course->id); ?>">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Course Title : <?php echo e($course->course_title); ?></p>
                        <p>Category Nama : <?php echo e($course->category->name); ?></p>
                        <p>Hours : <?php echo e($course->hours); ?></p>
                        <p>Start Date : <?php echo e($course->start_date); ?></p>
                        <p>Teacher : <?php echo e($course->teacher); ?></p>
                        <p>max_students : <?php echo e($course->max_students); ?></p>
                        <p>course_price : <?php echo e($course->course_price); ?></p>
                        <p>Details :<?php echo $course->details; ?></p>
                     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <td>
            <a class="btn btn-info" href="<?php echo e(route('register.index',$course->id)); ?>">
                Student
              </a>
        </td>
        <td>   <a class="btn btn-primary" href="<?php echo e(route('course.edit',$course->id)); ?>">
           Edit
         </a>
        </td>
        <td>
            <form action="<?php echo e(route('course.destroy', $course->id)); ?>" method="post">
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
              alert("Delete Course successfully");
          });
        });
     </script>
</tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>