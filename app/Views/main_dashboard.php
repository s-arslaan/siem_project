<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/favicon.ico">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/toastr.min.css" rel="stylesheet" />
    <!-- fa -->
    <!-- <script src="<?php //base_url() 
                        ?>/assets/js/all.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/responsive.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/scroller.bootstrap5.min.css" />
    <style>
        .nav-pills .nav-item .nav-link {
            background-color: #212529 !important;
            color: white;
        }

        .nav-pills .nav-item .nav-link.active,
        .bg-green {
            /* background-color: red !important; */
            color: lightblue;
        }
    </style>
</head>

<body class="">

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark text-white py-0">
        <div class="container pt-3">
            <div class="row w-100">
                <div class="d-flex justify-content-center display-4">
                    SIEM Dashboard
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <!-- <div class="p-2 bg-info">Flex item 1</div> -->

                    <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link mx-3 px-3 active" id="pills-ofn-tab" data-bs-toggle="pill" data-bs-target="#pills-ofn" type="button" role="tab" aria-controls="pills-ofn" aria-selected="true">Offenses</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link mx-3 px-3" id="pills-log-tab" data-bs-toggle="pill" data-bs-target="#pills-log" type="button" role="tab" aria-controls="pills-log" aria-selected="true">Log Activity</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link mx-3 px-3" id="pills-na-tab" data-bs-toggle="pill" data-bs-target="#pills-na" type="button" role="tab" aria-controls="pills-na" aria-selected="false">Network Activity</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link mx-3 px-3" id="pills-ast-tab" data-bs-toggle="pill" data-bs-target="#pills-ast" type="button" role="tab" aria-controls="pills-ast" aria-selected="false">Assets</button>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </nav>

    <div class="container-fluid my-4">
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-ofn" role="tabpanel" aria-labelledby="pills-ofn-tab">
                <!-- THIS IS AIR -->
                <div class="row">
                    <div class="col-md-12 py-3 border">
                        <!-- <table id="log_table" class="table table-striped table-hover table-bordered dt-responsive nowrap"> -->
                        <table id="ofn_table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Offense ID</th>
                                    <th>Description</th>
                                    <th>Offense Type</th>
                                    <th>Offense Source</th>
                                    <th>Magnitude</th>
                                    <th>Source IP</th>
                                    <th>Dest IP</th>
                                    <th>User</th>
                                    <th>Log Source</th>
                                    <th>Events</th>
                                    <th>Flows</th>
                                    <th>Start Date</th>
                                    <th>Last Event</th>
                                </tr>
                            </thead>
                            <?php //print_r($yo) 
                            ?>
                            <tbody>
                                <?php foreach ($offenses as $off) { ?>
                                    <tr>
                                        <td><?= $off['off_id'] ?></td>
                                        <td><?= $off['description'] ?></td>
                                        <td><?= $off['offense_type'] ?></td>
                                        <td><?= $off['offense_source'] ?></td>
                                        <td><?= $off['magnitude'] ?></td>
                                        <td><?= $off['source_ip'] ?></td>
                                        <td><?= $off['dest_ip'] ?></td>
                                        <td><?= $off['user'] ?></td>
                                        <td><?= $off['log_source'] ?></td>
                                        <td><?= $off['events'] ?></td>
                                        <td><?= $off['flows'] ?></td>
                                        <td><?= $off['start_date'] ?></td>
                                        <td><?= $off['last_event'] ?></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            
            <div class="tab-pane fade" id="pills-log" role="tabpanel" aria-labelledby="pills-log-tab">
                <!-- THIS IS AIR -->
                <div class="row">
                    <div class="col-md-12 py-3 border">
                        <!-- <table id="log_table" class="table table-striped table-hover table-bordered dt-responsive nowrap"> -->
                        <table id="log_table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Log Source</th>
                                    <th>Event Count</th>
                                    <th>Low Level Category</th>
                                    <th>Timestamp</th>
                                    <th>Source IP</th>
                                    <th>Source Port</th>
                                    <th>Destination IP</th>
                                    <th>Destination Port</th>
                                </tr>
                            </thead>
                            <?php //print_r($yo) 
                            ?>
                            <tbody>
                                <?php foreach ($log_activity as $log) { ?>
                                    <tr>
                                        <td><?= $log['event_name'] ?></td>
                                        <td><?= $log['log_source'] ?></td>
                                        <td><?= $log['event_count'] ?></td>
                                        <td><?= $log['low_category'] ?></td>
                                        <td><?= $log['timestamp'] ?></td>
                                        <td><?= $log['source_ip'] ?></td>
                                        <td><?= $log['source_port'] ?></td>
                                        <td><?= $log['destination_ip'] ?></td>
                                        <td><?= $log['destination_port'] ?></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="pills-na" role="tabpanel" aria-labelledby="pills-na-tab">
                <!-- THIS IS SEA -->
                <div class="row">
                    <div class="col-md-12 py-3 border">
                        <!-- <table id="log_table" class="table table-striped table-hover table-bordered dt-responsive nowrap"> -->
                        <table id="netlog_table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Flow Type</th>
                                    <th>Source Bytes</th>
                                    <th>Application</th>
                                    <th>First Packet Time </th>
                                    <th>Source IP</th>
                                    <th>Source Port</th>
                                    <th>Last Packet Time</th>
                                    <th>Destination IP</th>
                                    <th>Destination Port</th>
                                    <th>Protocol</th>
                                    <th>Destination Bytes</th>
                                </tr>
                            </thead>
                            <?php //print_r($yo) 
                            ?>
                            <tbody>
                                <?php foreach ($network_activity as $netlog) { ?>
                                    <tr>
                                        <td><?= $netlog['flow_type'] ?></td>
                                        <td><?= $netlog['source_bytes'] ?></td>
                                        <td><?= $netlog['application'] ?></td>
                                        <td><?= $netlog['first_pkt_time'] ?></td>
                                        <td><?= $netlog['source_ip'] ?></td>
                                        <td><?= $netlog['source_port'] ?></td>
                                        <td><?= $netlog['last_pkt_time'] ?></td>
                                        <td><?= $netlog['destination_ip'] ?></td>
                                        <td><?= $netlog['destination_port'] ?></td>
                                        <td><?= $netlog['protocol'] ?></td>
                                        <td><?= $netlog['destination_bytes'] ?></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="pills-ast" role="tabpanel" aria-labelledby="pills-ast-tab">
                <!-- THIS IS SEA -->
                <div class="row">
                    <div class="col-md-12 py-3 border">
                        <!-- <table id="log_table" class="table table-striped table-hover table-bordered dt-responsive nowrap"> -->
                        <table id="ast_table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Asset ID</th>
                                    <th>IP Address</th>
                                    <th>Asset Name</th>
                                    <th>OS</th>
                                    <th>cvss</th>
                                    <th>Vulnerabilities</th>
                                    <th>Services</th>
                                    <th>Last User</th>
                                    <th>User last Seen</th>
                                </tr>
                            </thead>
                            <?php //print_r($yo) 
                            ?>
                            <tbody>
                                <?php foreach ($assets as $ast) { ?>
                                    <tr>
                                        <td><?= $ast['asset_id'] ?></td>
                                        <td><?= $ast['ip_address'] ?></td>
                                        <td><?= $ast['asset_name'] ?></td>
                                        <td><?= $ast['os'] ?></td>
                                        <td><?= $ast['cvss'] ?></td>
                                        <td><?= $ast['vulnerabilities'] ?></td>
                                        <td><?= $ast['services'] ?></td>
                                        <td><?= $ast['last_user'] ?></td>
                                        <td><?= $ast['last_seen'] ?></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; SIEM <?= date("Y") ?></div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>


    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/scroller.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            const len = 20;
            $('#log_table').DataTable({"pageLength": len});
            $('#netlog_table').DataTable({"pageLength": len});
            $('#ofn_table').DataTable({"pageLength": len});
            $('#ast_table').DataTable({"pageLength": len});
        });
    </script>

    <script>
        $(document).ready(function() {

            toastr.options.positionClass = "toast-top-center";
            toastr.options.timeOut = 2000;
            toastr.options.extendedTimeOut = 1000;

            <?php if (session()->getTempdata('success')) : ?>
                toastr.success(<?= "'" . session()->getTempdata('success') . "'"; ?>);
                <?php session()->removeTempdata('success'); ?>
            <?php endif; ?>

            <?php if (session()->getTempdata('error')) : ?>
                toastr.error(<?= "'" . session()->getTempdata('error') . "'"; ?>);
                <?php session()->removeTempdata('error'); ?>
            <?php endif; ?>

            let url = '<?= current_url() ?>';
            // if (url.match(/\/dashboard$/)) {
            //     $(".nav .nav-link:eq(0)").addClass('active');
            //     $(".nav .nav-link:eq(0) path").attr("fill", "rgba(255,255,255,1)");
            // } else if (url.match(/\/attendance$/)) {
            //     $(".nav .nav-link:eq(1)").addClass('active');
            //     $(".nav .nav-link:eq(1) path").attr("fill", "rgba(255,255,255,1)");
            // } else if (url.match(/\/timings$/)) {
            //     $(".nav .nav-link:eq(2)").addClass('active');
            //     $(".nav .nav-link:eq(2) path").attr("fill", "rgba(255,255,255,1)");
            // }
        });
    </script>
</body>

</html>