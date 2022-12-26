<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

    <h1>Students</h1>
    <div class="bar">
        <!-- Add new student -->
        <a class="addNew" href=<?php echo base_url('experts/addStudentPage/');?>>Add New Student</a>

        <input type="hidden" id="URL" name="URL" value="<?php echo base_url();?>/experts/studentOverview/">
        <!-- Filter -->
        <select name="Filter" id="filter" onchange="filterStudents(users, this.value)">
            <option disabled selected value>Filter</option>
            <option value="disable filter"> Disable filter</option>
            <?php foreach ($teachers as $teacher):?>
                <option value="<?=$teacher->firstname?>"> <?=$teacher->firstname?> </option>
            <?php endforeach;?>

        </select>

        <!-- Searchbar -->
        <input type="text" id="myInput" onkeyup="search()" placeholder="Search">
    </div>

    <script type="text/javascript">
        var users = <?php echo json_encode($students); ?>;
    </script>
    <script type="text/javascript" src="<?=base_url()?>/public/js/filter.js"></script>

    <ul class="studentList" id="list">
        <?php foreach ($students as $person):?>
            <li class="studentListItem">
                <a href="<?php echo base_url('experts/studentOverview/'.$person->idStudents);?>">
                    <div class="roundProfilePic">
                        <img src="/public/assets/avatars/1.svg" alt="User Icon">
                    </div>
                    <h4><?=$person->firstname?><br><?=$person->lastname?></h4>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
<?= $this->endSection() ?>

