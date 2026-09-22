<?php $__env->startPush('styles'); ?>
<style>
    .ap-leads-table-wrap {
        background: var(--ap-surface, #ffffff);
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: var(--ap-radius, 12px);
        overflow: hidden;
    }

    .ap-leads-table-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 16px 18px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        background: #ffffff;
    }

    .ap-leads-table-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ap-leads-table-title-icon {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 15px;
    }

    .ap-leads-table-title h6 {
        margin: 0;
        color: #111827;
        font-size: 14px;
        font-weight: 700;
    }

    .ap-leads-table-title span {
        display: block;
        margin-top: 2px;
        color: #6b7280;
        font-size: 12px;
    }

    .ap-leads-count {
        min-width: 30px;
        padding: 4px 9px;
        border-radius: 999px;
        background: #f3f4f6;
        color: #4b5563;
        font-size: 11px;
        font-weight: 700;
        text-align: center;
    }

    .ap-leads-table-scroll {
        width: 100%;
        overflow-x: auto;
    }

    .ap-leads-table {
        width: 100%;
        min-width: 1100px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .ap-leads-table thead th {
        padding: 12px 14px;
        background: #f8fafc;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        color: #6b7280;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        white-space: nowrap;
    }

    .ap-leads-table tbody td {
        padding: 14px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        color: #374151;
        font-size: 13px;
        background: #fff;
    }

    .ap-leads-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .ap-leads-table tbody tr {
        transition: background .15s ease;
    }

    .ap-leads-table tbody tr:hover td {
        background: #fafbff;
    }

    .ap-lead-id {
        color: #6b7280;
        font-size: 12px;
        font-weight: 700;
    }

    .ap-lead-client {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 180px;
    }

    .ap-lead-avatar {
        width: 36px;
        height: 36px;
        flex: 0 0 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .ap-lead-client-name {
        color: #111827;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.35;
    }

    .ap-lead-client-company {
        margin-top: 2px;
        color: #9ca3af;
        font-size: 11px;
    }

    .ap-lead-contact {
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 170px;
    }

    .ap-lead-contact a {
        color: #4f46e5;
        text-decoration: none;
        font-size: 12px;
        font-weight: 500;
    }

    .ap-lead-contact a:hover {
        color: #3730a3;
        text-decoration: underline;
    }

    .ap-lead-phone {
        color: #6b7280;
        font-size: 12px;
    }

    .ap-lead-budget {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 7px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        color: #374151;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .ap-lead-services {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
        max-width: 210px;
    }

    .ap-lead-service {
        display: inline-flex;
        align-items: center;
        padding: 4px 8px;
        border-radius: 999px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .ap-lead-service-more {
        display: inline-flex;
        align-items: center;
        padding: 4px 7px;
        border-radius: 999px;
        background: #f3f4f6;
        color: #6b7280;
        font-size: 10px;
        font-weight: 700;
    }

    .ap-lead-agreement {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .ap-lead-agreement.agreed {
        background: #ecfdf5;
        color: #047857;
    }

    .ap-lead-agreement.not-agreed {
        background: #fef2f2;
        color: #b91c1c;
    }

    .ap-lead-date {
        color: #6b7280;
        font-size: 11px;
        white-space: nowrap;
    }

    .ap-lead-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 10px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .ap-lead-status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .ap-lead-status-new {
        background: #eff6ff;
        color: #1d4ed8;
    }

    .ap-lead-status-new .ap-lead-status-dot {
        background: #3b82f6;
    }

    .ap-lead-status-contacted {
        background: #fffbeb;
        color: #b45309;
    }

    .ap-lead-status-contacted .ap-lead-status-dot {
        background: #f59e0b;
    }

    .ap-lead-status-qualified {
        background: #ecfdf5;
        color: #047857;
    }

    .ap-lead-status-qualified .ap-lead-status-dot {
        background: #10b981;
    }

    .ap-lead-status-default {
        background: #f3f4f6;
        color: #4b5563;
    }

    .ap-lead-status-default .ap-lead-status-dot {
        background: #9ca3af;
    }

    .ap-lead-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 6px;
    }

    .ap-lead-action {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: #fff;
        color: #6b7280;
        text-decoration: none;
        transition: all .15s ease;
    }

    .ap-lead-action:hover {
        color: #4338ca;
        border-color: #c7d2fe;
        background: #eef2ff;
    }

    .ap-leads-empty {
        padding: 55px 20px;
        text-align: center;
    }

    .ap-leads-empty-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #f3f4f6;
        color: #9ca3af;
        font-size: 20px;
    }

    .ap-leads-empty h6 {
        margin: 0 0 5px;
        color: #374151;
        font-size: 14px;
        font-weight: 700;
    }

    .ap-leads-empty p {
        margin: 0;
        color: #9ca3af;
        font-size: 12px;
    }

    .ap-leads-pagination {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 14px 18px;
        border-top: 1px solid var(--ap-border, #e5e7eb);
        background: #fff;
    }

    .ap-leads-pagination-info {
        color: #9ca3af;
        font-size: 11px;
    }

    .ap-leads-pagination .pagination {
        margin: 0;
    }

    @media (max-width: 767.98px) {
        .ap-leads-table-header {
            padding: 14px;
        }

        .ap-leads-pagination {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
<?php $__env->stopPush(); ?>


<?php
    $items = $items ?? collect();

    $statusClass = match($status ?? '') {
        'New Lead' => 'ap-lead-status-new',
        'Contacted' => 'ap-lead-status-contacted',
        'Qualified' => 'ap-lead-status-qualified',
        default => 'ap-lead-status-default',
    };

    $statusIcon = match($status ?? '') {
        'New Lead' => 'bi-person-plus',
        'Contacted' => 'bi-telephone',
        'Qualified' => 'bi-check-circle',
        default => 'bi-person',
    };
?>


<div class="ap-leads-table-wrap">

    

    <div class="ap-leads-table-header">

        <div class="ap-leads-table-title">

            <span class="ap-leads-table-title-icon">
                <i class="bi <?php echo e($statusIcon); ?>"></i>
            </span>

            <div>
                <h6><?php echo e($status ?? 'Leads'); ?></h6>

                <span>
                    Customer leads in this stage
                </span>
            </div>

        </div>

        <span class="ap-leads-count">
            <?php echo e($items->count()); ?>

        </span>

    </div>


    

    <?php if($items->count()): ?>

        <div class="ap-leads-table-scroll">

            <table class="ap-leads-table">

                <thead>
                    <tr>
                        <th style="width: 70px;">ID</th>
                        <th>Client</th>
                        <th>Contact</th>
                        <th>Budget</th>
                        <th>Services</th>
                        <th>Agreement</th>
                        <th>Submitted</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $clientName = $item->full_name ?: 'Unknown Client';

                            $nameParts = preg_split(
                                '/\s+/',
                                trim($clientName)
                            );

                            $initials = '';

                            foreach (array_slice($nameParts, 0, 2) as $part) {
                                $initials .= strtoupper(substr($part, 0, 1));
                            }

                            $services = is_array($item->services)
                                ? $item->services
                                : [];

                            $visibleServices = array_slice($services, 0, 2);
                            $remainingServices = max(
                                count($services) - count($visibleServices),
                                0
                            );
                        ?>

                        <tr>

                            
                            <td>
                                <span class="ap-lead-id">
                                    #<?php echo e($item->id); ?>

                                </span>
                            </td>


                            
                            <td>

                                <div class="ap-lead-client">

                                    <span class="ap-lead-avatar">
                                        <?php echo e($initials ?: 'CL'); ?>

                                    </span>

                                    <div>

                                        <div class="ap-lead-client-name">
                                            <?php echo e($clientName); ?>

                                        </div>

                                        <?php if($item->company): ?>
                                            <div class="ap-lead-client-company">
                                                <i class="bi bi-building me-1"></i>
                                                <?php echo e($item->company); ?>

                                            </div>
                                        <?php endif; ?>

                                    </div>

                                </div>

                            </td>


                            
                            <td>

                                <div class="ap-lead-contact">

                                    <?php if($item->email): ?>
                                        <a href="mailto:<?php echo e($item->email); ?>">
                                            <i class="bi bi-envelope me-1"></i>
                                            <?php echo e($item->email); ?>

                                        </a>
                                    <?php else: ?>
                                        <span class="ap-lead-phone">
                                            —
                                        </span>
                                    <?php endif; ?>

                                    <?php if($item->full_phone): ?>
                                        <span class="ap-lead-phone">
                                            <i class="bi bi-telephone me-1"></i>
                                            <?php echo e($item->full_phone); ?>

                                        </span>
                                    <?php endif; ?>

                                </div>

                            </td>


                            
                            <td>

                                <?php if($item->budget): ?>

                                    <span class="ap-lead-budget">
                                        <i class="bi bi-wallet2 me-1"></i>
                                        <?php echo e(strtoupper($item->budget)); ?>

                                    </span>

                                <?php else: ?>
                                    <span class="text-muted-ap">—</span>
                                <?php endif; ?>

                            </td>


                            
                            <td>

                                <?php if(count($visibleServices)): ?>

                                    <div class="ap-lead-services">

                                        <?php $__currentLoopData = $visibleServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <span class="ap-lead-service">
                                                <?php echo e($service); ?>

                                            </span>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($remainingServices > 0): ?>

                                            <span
                                                class="ap-lead-service-more"
                                                title="<?php echo e(implode(', ', array_slice($services, 2))); ?>"
                                            >
                                                +<?php echo e($remainingServices); ?>

                                            </span>

                                        <?php endif; ?>

                                    </div>

                                <?php else: ?>

                                    <?php if($item->other_service): ?>

                                        <span class="ap-lead-service">
                                            <?php echo e($item->other_service); ?>

                                        </span>

                                    <?php else: ?>

                                        <span class="text-muted-ap">
                                            —
                                        </span>

                                    <?php endif; ?>

                                <?php endif; ?>

                            </td>


                            
                            <td>

                                <?php if($item->agreement): ?>

                                    <span class="ap-lead-agreement agreed">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Agreed
                                    </span>

                                <?php else: ?>

                                    <span class="ap-lead-agreement not-agreed">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Not Agreed
                                    </span>

                                <?php endif; ?>

                            </td>


                            
                            <td>

                                <span class="ap-lead-date">

                                    <?php if($item->created_at): ?>

                                        <?php echo e($item->created_at->format('d M Y')); ?>


                                        <br>

                                        <span class="text-muted-ap">
                                            <?php echo e($item->created_at->format('h:i A')); ?>

                                        </span>

                                    <?php else: ?>
                                        —
                                    <?php endif; ?>

                                </span>

                            </td>


                            
                            <td>

                                <span class="ap-lead-status <?php echo e($statusClass); ?>">

                                    <span class="ap-lead-status-dot"></span>

                                    <?php echo e($item->status ?: ($status ?? 'Unknown')); ?>


                                </span>

                            </td>


                            
                            <td>

                                <div class="ap-lead-actions">

                                    <a
                                        href="<?php echo e(route('admin.proposals.show', $item->id)); ?>"
                                        class="ap-lead-action"
                                        title="View Lead"
                                        aria-label="View Lead"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>


        

        <?php if(method_exists($items, 'links')): ?>

            <div class="ap-leads-pagination">

                <div class="ap-leads-pagination-info">
                    Showing
                    <?php echo e($items->firstItem() ?? 0); ?>

                    to
                    <?php echo e($items->lastItem() ?? 0); ?>

                    of
                    <?php echo e($items->total() ?? $items->count()); ?>

                    leads
                </div>

                <div>
                    <?php echo e($items->links('pagination::bootstrap-5')); ?>

                </div>

            </div>

        <?php endif; ?>


    <?php else: ?>

        

        <div class="ap-leads-empty">

            <div class="ap-leads-empty-icon">
                <i class="bi bi-inbox"></i>
            </div>

            <h6>
                No <?php echo e(strtolower($status ?? 'leads')); ?> found
            </h6>

            <p>
                There are currently no leads in this stage.
            </p>

        </div>

    <?php endif; ?>

</div>
<?php /**PATH D:\Laravel\Aazz-Agency\resources\views/partials/admin_partials_002/toasts.blade.php ENDPATH**/ ?>