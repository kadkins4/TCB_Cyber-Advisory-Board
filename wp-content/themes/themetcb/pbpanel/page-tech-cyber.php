<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
get_template_part('pbpanel/header');
include '../wp-content/themes/thecipherbrief/pbpanel/option.php';
//    echo getcwd();
?>
    <div class="pbpanel-column">
        <div class="pbpanel-box">
            <h2><?php echo 'Tech/Cyber briefs'; ?></h2>
        </div>
        <div class="pbpanel-box">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="infoClear">
                    <label for="pbpanel_exclusive_1"><?php echo 'Post (1)'; ?></label>
                    <span class="helptext">Enter article title</span>
                    <label for="pbpanel_exclusive_1">
                        <input type="text" value="<?php echo $option['tech_cyber'][0]; ?>"  name="tech_cyber_1" id="pbpanel_exclusive_1" class="pbpanelAutocomplite"/>
                        <input type="hidden" value="<?php echo $option['pbpanel_tech_cyber'][0]; ?>" name="pbpanel_tech_cyber_1"/>
                    </label>
                    <div class="itemsInfo">
                        <?php echo getArticle(IsSet($getFeatures[$option['pbpanel_tech_cyber'][0]]) ? $getFeatures[$option['pbpanel_tech_cyber'][0]] : array());?>
                    </div>
                </div>
                <hr>
                <div class="infoClear">
                    <label for="pbpanel_exclusive_2"><?php echo 'Post (2)'; ?></label>
                    <span class="helptext">Enter article title</span>
                    <label for="pbpanel_exclusive_2">
                        <input type="text" value="<?php echo $option['tech_cyber'][1]; ?>"  name="tech_cyber_2" id="pbpanel_exclusive_2" class="pbpanelAutocomplite"/>
                        <input type="hidden" value="<?php echo $option['pbpanel_tech_cyber'][1]; ?>" name="pbpanel_tech_cyber_2"/>
                    </label>
                    <div class="itemsInfo">
                        <?php echo getArticle(IsSet($getFeatures[$option['pbpanel_tech_cyber'][1]]) ? $getFeatures[$option['pbpanel_tech_cyber'][1]] : array());?>
                    </div>
                </div>
                <p><input type="submit" name="update_options" value="<?php echo 'Save tech / cyber'; ?>" class="pbpanel-button pbpanel-button-color-1"></p>
            </form>
        </div>
    </div>

<?php
get_template_part('pbpanel/footer');