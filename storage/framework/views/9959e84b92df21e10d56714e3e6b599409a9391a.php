<?php $__env->startSection('content'); ?>
<div class="main" style="min-height:600px;display:flex;align-items:center;padding:20px;">
    <div class="data-table-area mg-b-15" style="margin-left:210px;width:100%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th>Serial no.</th>
                                            <th>Student Id</th>
                                            <th>Name</th>
                                            <th>Book Id</th>
                                            <th>Book Title</th>
                                            <th>Author</th>
                                            <th>Issue Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($bookissue)): ?>
                                        <?php
                                        $to = Carbon\Carbon::now();
                                        $i = 0;
                                        ?>
                                        <?php $__currentLoopData = $bookissue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $i++;
                                        $returned = \Carbon\Carbon::parse($item->return_date);
                                        $diff_in_days = $to->diffInDays($returned);

                                        ?>


                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td><?php echo e($item->student->dept_id); ?></td>
                                            <td><?php echo e($item->student->name); ?></td>
                                            <td><?php echo e($item->book->book_id); ?></td>
                                            <td><?php echo e($item->book->book_title); ?></td>
                                            <td><?php echo e($item->book->author); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($item->issue_date)->format('j F, Y')); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($item->return_date)->format('j F, Y')); ?></td>
                                            <?php
                                            if($to > $returned){
                                            echo '<td style="background-color:red;color:#fff;">Time Exceeded !<br> <span class="text-center">-'.$diff_in_days.' days</span>
                                            <td>';
                                                }else if($diff_in_days <= 3){ echo '<td style="background-color:salmon;color:#000;">' .$diff_in_days.' Days Remaining !<td>';
                                                    }else{
                                                    echo '
                                            <td>'.$diff_in_days.' Days Remaining
                                            <td>';
                                                }
                                                ?>
                                            <td>
                                                <?php if($item->checked == 1): ?>
                                                <a class="btn btn-info" style="color: currentColor;cursor: not-allowed;opacity: 0.5;text-decoration: none;">Returened!(at <?php echo e(date('d-m-Y', strtotime($item->checked_date))); ?>) </a>
                                                <?php endif; ?>
                                                <?php if($item->checked == 0): ?>
                                                <a href="<?php echo e(route('return.book',['id' => $item->id])); ?>" class="btn btn-info" style="margin-bottom:4px;">Returned</a>
                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo e($item->id); ?>" style="margin-bottom:4px;"> Send Message </a>
                                                <?php endif; ?>

                                                <a href="" class="btn btn-info" style="margin-bottom:4px;">Update</a>
                                                <a href="" class="btn btn-danger" style="margin-bottom:4px;">Delete</a>


                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div id="myModal<?php echo e($item->id); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Send Message to the user to remember his/her book returned date: </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('send.msg')); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <textarea name="msg" id="" style="width:100%;" rows="10"> <?php
                                                                if($to > $returned){
                                                            ?>
                                                                Dear <?php echo e($item->student->name); ?>, You issued book <?php echo e($item->book->book_title); ?> at <?php echo e(\Carbon\Carbon::parse($item->issue_date)->format('j F, Y')); ?> is exceed returned time at <?php echo e(\Carbon\Carbon::parse($item->return_date)->format('j F, Y')); ?>.
                                                            <?php
                                                                }else{
                                                            ?>
                                                                Dear <?php echo e($item->student->name); ?>, You issued book <?php echo e($item->book->book_title); ?> at <?php echo e(\Carbon\Carbon::parse($item->issue_date)->format('j F, Y')); ?> and it should be returned in <?php echo e(\Carbon\Carbon::parse($item->return_date)->format('j F, Y')); ?>.
                                                                <?php
                                                            }
                                                            ?>
                                                        </textarea>
                                                            <input type="submit" value="Send" class="btn btn-warning">
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->
</div>
<style>
    .fixed-table-loading {
        display: none;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Simple-Library-Management-System-for-Librarian-with-Laravel-\resources\views/book_issue/view.blade.php ENDPATH**/ ?>