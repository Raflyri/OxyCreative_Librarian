<?php $__env->startSection('content'); ?>
<div class="main" style="min-height:600px;display:flex;align-items:center;padding:20px;">

    <form class="form-horizontal form-label-left" style="width:100%;margin-left:60px;" novalidate action="<?php echo e(route('store.book')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="book_id">Book ID
                <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="dept_id" value="<?php echo e(old('book_id')); ?>" class="form-control col-md-7 col-xs-12" name="book_id" required="required" type="number">
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="book_title">Book Title <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" value="<?php echo e(old('book_title')); ?>" class="form-control col-md-7 col-xs-12" name="book_title" required="required" type="text">
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author">Author<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" value="<?php echo e(old('author')); ?>" class="form-control col-md-7 col-xs-12" name="author" required="required" type="text">
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="book_dept">Department of Book<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" value="<?php echo e(old('book_dept')); ?>" name="book_dept" required="required">
                    <option value="" disabled selected>Choose option</option>
                    <option value="FIKTI">Computer Science and information technology</option>
                    <option value="ACC">Economy, Management, Accountancy</option>
                    <option value="CE">Civil Engineering and Planning Architecture</option>
                </select>
            </div>
        </div>
        
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Book Description(Optional)<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="description" id="" style="width:100%;" rows="10"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button id="send" type="submit" class="btn btn-success">Add New Book</button>
            </div>
        </div>




    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Simple-Library-Management-System-for-Librarian-with-Laravel-\resources\views/book/create.blade.php ENDPATH**/ ?>