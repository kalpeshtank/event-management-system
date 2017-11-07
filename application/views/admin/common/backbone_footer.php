<script type="text/javascript" src="<?php echo base_url() ?>js/admin/server/category.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/admin/server/sub_category.js"></script>
<script type="text/javascript" >
    $(function () {
        Category.run();
        SubCategory.run();
        Backbone.history.start();
    });
</script>