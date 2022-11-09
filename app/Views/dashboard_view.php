<?= $this->extend("layouts/base_view") ?>

<?= $this->section("content") ?>
<div class="container-fluid px-4">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/responsive.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/scroller.bootstrap5.min.css" />

    <h1 class="my-3">Dashboard</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    Login Activity
                </div>
                <div class="card-body">
                    <table id="login_log_table" class="table table-striped table-hover table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>IP</th>
                                <th>Platform</th>
                                <th>OS</th>
                                <th>Login Time</th>
                                <th>Logout Time</th>
                            </tr>
                        </thead>
                        <?php //print_r($yo) 
                        ?>
                        <tbody>
                            <?php foreach ($login_activity as $login_log) { ?>
                                <tr>
                                    <td><?= $login_log['name'] ?></td>
                                    <td><?= $login_log['email'] ?></td>
                                    <td><?= $login_log['ip'] ?></td>
                                    <td><?= $login_log['agent'] ?></td>
                                    <td><?= $login_log['platform'] ?></td>
                                    <td><?= $login_log['login_time'] ?></td>
                                    <td><?= $login_log['logout_time'] ?></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="d-flex card-body display-5">
                    Total People
                    <span class="badge bg-secondary ms-auto"><?= $count_names ?></span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url() ?>/attendance">View Details</a>
                    <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAW0lEQVRIie2VMQ6AIBAECS21RF9qyxul4DljIZ3Q3RoTbh8ws9vchbBEgKSEF6ABhwKegMqTCmSFZAOuLpEtcYlL5pJo6bQjvdvvDnf4FP7JuT7Nmw8kupf5+9z81yZot2e+VwAAAABJRU5ErkJggg==">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="d-flex card-body display-5">
                    Total Months
                    <span class="badge bg-secondary ms-auto"><?= $count_months ?></span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url() ?>/attendance">View Details</a>
                    <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAW0lEQVRIie2VMQ6AIBAECS21RF9qyxul4DljIZ3Q3RoTbh8ws9vchbBEgKSEF6ABhwKegMqTCmSFZAOuLpEtcYlL5pJo6bQjvdvvDnf4FP7JuT7Nmw8kupf5+9z81yZot2e+VwAAAABJRU5ErkJggg==">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <i class="fas fa-chart-area me-1"></i> -->
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAyElEQVRIie2UMQrCMBiFP11108FB5x7FwUk8glcQC97IUnB28DKKTlZoR4fUIX8RQ2xjG4dCH7wlj34v/GkCndqiGRADmfgABD7hCZAbfkjWWLEFXjjyUZCVFKRVH/cbluc+Ck4l2dF9L98VoA/UHM8dmPooAP23ROiZp8DeJ/yvGgJrYGTJxpIN6sJXwA0979CS7yS7Astf4VtA8T7Qp6xNxKGsFbkCNq7wuQF3tQIWLgWXGvDCZxPWsxRU3s4KfTCbPhWdWqAXqAxUU0+GUDEAAAAASUVORK5CYII=">
                    Current Attendance Names
                </div>
                <div class="card-body">
                    <?php foreach ($names as $name) : ?>
                        <span class="badge text-bg-light border border-secondary fs-6"><?= ucwords($name['emp_name']) ?></span>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <i class="fas fa-chart-area me-1"></i> -->
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAf0lEQVRIie2VQQ7AIAgE16aP8/9P0IfgpSTVFAiV9sQkHtYQNoBBIHFSAXQA9PK0K4dI20h+NxHhoCiNQ3OLoCyaHqM28n5egWRQMFfn1aZBGDkDSZsGYZzC/ToLj+6aYcQempadVAH3kwxt8vsr4v5pW1LtsUWF/ieYH0riZgC9bFQot9fLAwAAAABJRU5ErkJggg==">
                    Current Attendance Months
                </div>
                <div class="card-body">
                    <?php foreach ($months as $month) : ?>
                        <span class="badge text-bg-light border border-secondary fs-6"><?= ucwords($month['month']) ?></span>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Login Activity
                    </div>
                    <div class="card-body">
                        <table id="sql_log_table" class="table table-striped table-hover table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Query</th>
                                    <th>Time of Execution</th>
                                </tr>
                            </thead>
                            <?php //print_r($yo) 
                            ?>
                            <tbody>
                                <?php foreach ($sql_logs as $sql_log) { ?>
                                    <tr>
                                        <td><?= $sql_log['user'] ?></td>
                                        <td><?= $sql_log['query'] ?></td>
                                        <td><?= $sql_log['time'] ?></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/js/responsive.bootstrap5.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/js/scroller.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#login_log_table').DataTable();
        $('#sql_log_table').DataTable();
    });
</script>

<?= $this->endSection("content") ?>