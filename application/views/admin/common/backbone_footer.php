<script type="text/javascript" src="<?php echo base_url() ?>js/admin/server/category.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/admin/server/sub_category.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/admin/server/event_create.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/admin/server/user.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/admin/server/student_master.js"></script>
<script type="text/javascript" >
    $(function () {
        Category.run();
        SubCategory.run();
        EventCreate.run();
        UserData.run();
        StudentMaster.run();
        Backbone.history.start();
    });
</script>