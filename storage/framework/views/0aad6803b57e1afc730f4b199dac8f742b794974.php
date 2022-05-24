<?php $__env->startSection('content'); ?>
<div class="main" style="min-height:600px;display:flex;align-items:center;padding:20px;">

    <form class="form-horizontal form-label-left" style="width:100%;" novalidate action="<?php echo e(route('storeissue.book')); ?>"
        method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="hidden" value="<?php echo e($id); ?>" name="book_id">

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-top:0px;" for="student_id">Student Id <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="chosen-select" tabindex="2" data-placeholder="Select Registered Student" name="student_id" value="<?php echo e(old('student_id')); ?>">
            <option value=""></option>

            <?php if(isset($student)): ?>

                <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>">
                        <?php echo e($item->dept_id); ?> ( <?php echo e($item->name); ?> )
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

        </select>
    </div>
</div>


<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-3">Issue Date<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="date" value="<?php echo e(old('issue_date')); ?>" name="issue_date" class="form-control" required="required">
    </div>
</div>

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-3">Return Date<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="date" value="<?php echo e(old('return_date')); ?>" name="return_date" class="form-control" required="required">
    </div>
</div>



<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <button id="send" type="submit" class="btn btn-success">Issue Book</button>
    </div>
</div>
</form>
</div>

<style>
    .chosen-single{
        height: 30px !important;
    }
    .chosen-single span{
        height: 100% !important;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Simple-Library-Management-System-for-Librarian-with-Laravel-\resources\views/book_issue/create.blade.php ENDPATH**/ ?>