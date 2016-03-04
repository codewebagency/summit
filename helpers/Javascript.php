<?php
namespace Helpers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Javascript
 *
 * @author hossein
 */
class Javascript {

    /**
     * 
     * @param Array $params Ajax needed parameters
     */
    public function ajax($params) {
        $data = [];
        if(is_array($params['data']) && count($params['data']) > 0)
        {
            $data = json_encode($params['data']);
        } else 
            $data = json_encode($data);
        ?>
        <script type="text/javascript">
            jQuery(function() { 
            jQuery.ajax({
                url: "<?php echo $params['url']; ?>",
                type: "<?php echo $params['type']; ?>",
                data: <?php echo $data; ?>,
                dataType: "<?php echo $params['dataType']; ?>",
                success: function(data) {
                    console.log(data);
                    jQuery("<?php echo $params['update']; ?>").html(data);
                },
                error: function(e) {
                    console.log(e);
                    jQuery("<?php echo $params['update']; ?>").html("Error occured in request .");
                }
            });
            });
        </script>
        <?php
    }

}
