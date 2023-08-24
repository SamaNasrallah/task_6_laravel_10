
<?php $__env->startSection('MainContent'); ?>
<br>
<?php
use App\Models\Student;
$students = Student::all();
?>
<a href="<?php echo e(route('student.create')); ?>" class="btn btn-success" style="font-size: 18px">Add Student</a>

<table id="myTable" class="table table-success table-striped" >
    <thead>
    <tr style="text-align: center;">
        <th>ID</th>
        <th>Name Arabic</th>
        <th>Name English</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Is Active</th>
        <th>Details</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($student->id); ?></td>
        <td><?php echo e($student->name_arabic); ?></td>
        <td><?php echo e($student->name_english); ?></td>
        <td><?php echo e($student->email); ?></td>
        <td><?php echo e($student->phone); ?></td>
        <td><?php echo e($student->address); ?></td>
        <td>
            <div class="activation-icon">
                <form action="<?php echo e(route('student.toggleActivation', $student->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <button type="submit" class="btn-activation" id="btn-activation_<?php echo e($student->id); ?>">
                        <?php if($student->is_active): ?>
                            <i class="fas fa-check-circle" style="font-size: 20px;"></i> 
                        <?php else: ?>
                            <i class="fas fa-times-circle" style="font-size: 20px;"></i> 
                        <?php endif; ?>
                    </button>
                </form>
            </div>
        </td>
        <td>
            <a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#studentModal<?php echo e($student->id); ?>">Details</a>
        </td>
        
        <div class="modal fade" id="studentModal<?php echo e($student->id); ?>" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel<?php echo e($student->id); ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentModalLabel<?php echo e($student->id); ?>">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Name Arabic : <?php echo e($student->name_arabic); ?></p>
                        <p>Nama English : <?php echo e($student->name_english); ?></p>
                        <p>BOD : <?php echo e($student->birth_date); ?></p>
                        <p>Educational_stage : <?php echo e($student->educational_stage); ?></p>
                        <p>Major : <?php echo e($student->major); ?></p>
                        <p>Phone : <?php echo e($student->phone); ?></p>
                        <p>Email: <?php echo e($student->email); ?></p>
                        <p>Address: <?php echo e($student->address); ?></p>
                        <p>Details: <?php echo e($student->details); ?></p>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <td>   
            <?php if($student->is_active): ?>
            <a class="btn btn-primary" href="<?php echo e(route('student.edit',$student->id)); ?>">
           Edit
         </a>
         <?php else: ?>
         <a class="btn btn-primary">
            <span class="badge" style="background-color: gray;">Edit</span>
        </a>
      <?php endif; ?>
        </td>
        <td>
            <form action="<?php echo e(route('student.destroy', $student->id)); ?>" method="post">
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
<script>
    $(document).ready(function () {
  $('#myTable').DataTable({
    "paging": true,
    "ordering": true,
    "searching": true,
    "initComplete": function () {
        $('#myTable').css('width', '80%');
        $('#myTable_wrapper').css('margin-left', '100px');
    }
  });
});
</script>


</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MI\Desktop\laravel\task3\resources\views/student/veiwSt.blade.php ENDPATH**/ ?>